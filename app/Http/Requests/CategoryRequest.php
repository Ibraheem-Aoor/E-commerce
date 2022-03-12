<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            $isRequied = 'required';
        else
            $isRequied = 'sometimes';
        return [
            'name' => $isRequied.'|required|string|max:200|unique:categories,name',
            'slug' => 'nullable|string|max:200|unique:categories,slug',
        ];
    }
}
