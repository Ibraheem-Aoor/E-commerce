<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\GeneralApiTrait;
use Illuminate\Http\Request;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use GeneralApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::guard('sanctum')->user();
        // return $this->returnData("All Orders" , Order::all() , 'success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->all());
        if($request->payment_method == 'card')
            $this->validateCardData($request);
        $this->makeShipping($request , $order->id);
        $this->makeTransaction($order->id , $request->payment_method);
        return $order;
        return $this->returnSuccessMessage('Order Created Successfully' , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $this->returnData('Order: ' , $order , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        return $this->returnSuccessMessage('Order Updated Successfully' , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return $this->returnSuccessMessage('Order Deleted Successfully' , 200);
    }

    public function validateCardData($request)
    {
        return  $request->validate([
            'card_number'=>'required|numeric' ,
            'card_exp_year' => 'required|numeric',
            'card_exp_month' => 'required|numeric',
            'card_cvv' => 'required|numeric',
        ]);
    }

    protected function makeShipping($request , $orderId)
    {
        Shipping::create([
            'firstname' => $request->firstname ,
            'lastname' => $request->lastname ,
            'mobile' => $request->mobile ,
            'email' => $request->email ,
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'city' => $request->city ,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'province' => $request->city,
            'order_id' => $orderId,
        ]);
    }

    public function makeTransaction($orderId , $paymentMetohd)
    {
        Transaction::create([
            'user_id' => Auth::guard('sanctum')->id(),
            'order_id' => $orderId,
            'mode' => $paymentMetohd,
            'status' => 'pending',
        ]);
    }
}
