<?php

namespace App\Http\Requests\Order;


use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'firstname' => 'sometimes|string',
            'lastname' => 'sometimes|string',
            'mobile' => 'sometimes|numeric',
            'email' => 'sometimes|email',
            'line_1' => 'sometimes|string',
            'city' => 'sometimes|string',
            'province' => 'sometimes|string',
            'country' => 'sometimes|string',
            'zipcode' => 'sometimes|string',
            'user_id' => 'sometimes|numeric',
            'subtotal' => 'sometimes|numeric',
            'discount' => 'sometimes|numeric',
            'tax' => 'sometimes|numeric',
            'total' => 'sometimes|numeric',
            // 'status' => 'sometimes|in:ordered , delivered , canceled',
            'is_shipping_different' => 'sometimes|boolean',
        ];
    }
}
