<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class CreateSocialLinksRequest extends FormRequest
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
            'email'=>'nullable|email',
            'address'=>'nullable|string',
            'mobile'=>'nullable|numeric',
            'mail_office' => 'nullable|email',
            'youtube' => 'nullable|string|url',
            'fb' => 'nullable|string|url',
            'linkedIn' => 'nullable|string|url',
            'instagram' => 'nullable|string|url',
            'twitter' => 'nullable|string|url',
        ];
    }
}
