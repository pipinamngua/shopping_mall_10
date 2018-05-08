<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class UserRequest extends FormRequest
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
        $formType = $this->input('formType');
        switch ($formType) {
            case config('custom.form.create'):
                $rules = [
                    'name' => 'required',
                    'email' => 'email|required|unique:users',
                    'password' => 'nullable|string|min:6',
                    'phone' => 'required',
                    'dob' => 'required',
                    'avatar' => 'image|mimes:jpg,jpeg,bmp,png|max:2000'
                ];

                return $rules;
            case config('custom.form.edit'):
                $rules = [
                    'name' => 'required',
                    'email' => 'email|required',
                    'password' => 'nullable|string|min:6',
                    'phone' => 'required',
                    'dob' => 'required',
                    'avatar' => 'image|mimes:jpg,jpeg,bmp,png|max:2000'
                ];
                
                return $rules;
        }
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('validation.required'),
            'email.email' => Lang::get('validation.email'),
            'email.required' => Lang::get('validation.required'),
            'email.unique' => Lang::get('validation.unique'),
            'password.string' => Lang::get('validation.string'),
            'password.min' => Lang::get('validation.string', ['min' => 6]),
            'phone.required' => Lang::get('validation.required'),
            'dob.required' => Lang::get('validation.required'),
            'avatar.image' => Lang::get('validation.image'),
            'avatar.mimes' => Lang::get('validation.mimes', ['value' => 'jpg,jpeg,bmp,png']),
            'avatar.max' => Lang::get('validation.max.file', ['max' => 2000]),
        ];
    }
}
