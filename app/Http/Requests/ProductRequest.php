<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->isMethod('post'))
            $isRequired = 'required';
        else
            $isRequired = 'sometimes';
        return [
            'name' => $isRequired.'|max:255',
            'short_description' => $isRequired.'|max:255',
            'description' => 'nullable|string',
            'category_id' => $isRequired.'|numeric',
            'regular_price' => $isRequired.'|numeric',
            'sale_price' => 'numeric|nullable',
            'featured' => $isRequired.'|in: true , false',
            'stock_status' => $isRequired.'|in: instock , outofstock',
            'quanitiy' => $isRequired.'|numeric',
            'sku' => $isRequired.'|max:255',
            // 'primaryImage' => 'nullable|image|mimes:jpg,png,*',
        ];
    }
}
