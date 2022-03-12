<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line_1' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',
            'zipcode' => 'required|string',
            'user_id' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'discount' => 'required|numeric',
            'tax' => 'required|numeric',
            'total' => 'required|numeric',
            // 'status' => 'required|in:ordered , delivered , canceled',
            'is_shipping_different' => 'required|boolean',
            'payment_method' => 'required',
            'car'
        ];
    }
}
