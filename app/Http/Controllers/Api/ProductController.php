<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Traits\GeneralApiTrait;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    use GeneralApiTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->returnData('All_Products' , $products , 'succees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       $product = Product::create($request->all());
            // 'image' => $imageName,
        return $this->returnSuccessMessage('Product Created Successfully' , 200);
    }

    /**'
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->returnData('data' , $product , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->has('name') ? $request->name : $product->name,
            'slug' => $request->has('slug') ? $request->slug : $product->slug,
            'short_description' => $request->has('short_description') ? $request->slug : $product->slug,
            'description' => $request->has('description') ? $request->description : $product->description,
            'category_id' => $request->has('category_id') ? $request->category_id : $product->category_id,
            'sale_price' => $request->has('sale_price') ? $request->sale_price : $product->sale_price,
            'featured' => $request->has('featured') ? $request->featured : $product->featured,
            'stock_status' => $request->has('stock_status') ? $request->stock_status : $product->stock_status,
            'quanitiy' => $request->has('quanitiy') ? $request->quanitiy : $product->quanitiy,
            'sku' => $request->has('sku') ? $request->sku : $product->sku,
        ]);
        return $this->returnSuccessMessage('Product Updated Successfully' , 200);
    }

    // return the value of the filed either from the request or the old value


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->returnSuccessMessage('Product Deleted Successfully' , 200);
    }


}
