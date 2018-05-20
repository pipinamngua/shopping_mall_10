<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use lang;

class ImageRequest extends FormRequest
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
            'product_id' => 'required',
            'url' => 'image|mimes:jpg,jpeg,bmp,png|max:2000',
            'main_image' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => Lang::get('validation.required'),
            'url.image' => Lang::get('validation.image'),
            'url.mimes' => Lang::get('validation.mimes', ['value' => 'jpg,jpeg,bmp,png']),
            'url.max' => Lang::get('validation.max.file', ['max' => 2000]),
            'main_image.required' => Lang::get('validation.required'),
            'main_image.boolean' => Lang::get('validation.required'),
        ];
    }
}
