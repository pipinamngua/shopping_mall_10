<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

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
        return [
            'name' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'price_in' => 'required|numeric|min:1',
            'price_out' => 'required|numeric|min:1',
            'description' => 'required',
            'status' => 'required',
            'quantity' => 'required|numeric|min:0|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('validation.required'),
            'category_id.required' => Lang::get('validation.required'),
            'supplier_id.required' => Lang::get('validation.required'),
            'price_in.required' => Lang::get('validation.required'),
            'price_out.required' => Lang::get('validation.required'),
            'price_in.numeric' => Lang::get('validation.required'),
            'price_out.numeric' => Lang::get('validation.required'),
            'price_in.min' => Lang::get('validation.required'),
            'price_out.min' => Lang::get('validation.required'),
            'description.required' => Lang::get('validation.required'),
            'status.required' => Lang::get('validation.required'),
            'quantity.required' => Lang::get('validation.required'),
            'quantity.numeric' => Lang::get('validation.required'),
            'quantity.min' => Lang::get('validation.required'),
            'quantity.integer' => Lang::get('validation.required'),
        ];
    }
}
