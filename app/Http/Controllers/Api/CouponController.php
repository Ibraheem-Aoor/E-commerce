<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CreateCouponRequest;
use App\Http\Requests\Coupon\UpdateCouponRequst;
use App\Models\Coupon;
use App\Traits\GeneralApiTrait;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    use GeneralApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->returnData("All Copouns:" ,Coupon::all() , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponRequest $request)
    {
        Coupon::create($request->all());
        return $this->returnSuccessMessage('Coupon Created Successfully' , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return $this->returnData('data' , $coupon , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequst $request,  Coupon $coupon)
    {
        $coupon->update($request->all());
        return $this->returnSuccessMessage('Coupon Updated Successfully' , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return $this->returnSuccessMessage('Coupon Deleted  Successfully' , 200);
    }
}
