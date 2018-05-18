<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class DiscountRequest extends FormRequest
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
                    'start' => 'required',
                    'end' => 'required',
                ];

                return $rules;
            case config('custom.form.edit'):
                $rules = [
                    'name' => 'required',
                    'start' => 'required',
                    'end' => 'required',
                ];
                
                return $rules;
        }
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('validation.required'),
            'start.required' => Lang::get('validation.required'),
            'end.required' => Lang::get('validation.required'),
        ];
    }
}
