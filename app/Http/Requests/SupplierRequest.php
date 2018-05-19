<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class SupplierRequest extends FormRequest
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
            'address' => 'required',
            'phone' => 'required',
            'email' => 'email|required|unique:suppliers',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('validation.required'),
            'address.required' => Lang::get('validation.required'),
            'phone.required' => Lang::get('validation.required'),
            'email.required' => Lang::get('validation.required'),
            'email.email' => Lang::get('validation.email'),
            'email.unique' => Lang::get('validation.unique'),
        ];
    }
}
