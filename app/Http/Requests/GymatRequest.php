<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymatRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|numeric|min:7',
            'gym_package_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'يجب إضافة إسم!',
            'name.string' => 'يجب أن يكون الإسم نصاً',
            'phone.required' => 'يجب إضافة رقم الهاتف!',
            'phone.numeric' => 'رقم الهاتف يتكون من أرقام فقط',
            'phone.min' => 'خطأ في طول رقم الهاتف',
            'gym_package_id.required' => 'يجب تحديد الباقة!',
            'gym_package_id.numeric' => 'خطأ في بيانات الباقة!',
        ];
    }
}
