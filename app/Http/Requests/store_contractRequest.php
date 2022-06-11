<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store_contractRequest extends FormRequest
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
            'package' => 'required|numeric',
            'coach' => 'required|numeric',
            'discount' => 'integer',
        ];
    }

    public function messages()
    {
        return[
            'package.required' => 'يجب تحديد نوع الباقة!',
            'package.numeric' => 'خطأ في تحديد نوع الباقة',
            'coach.required' => 'يجب تحديد المدرب!',
            'coach.required' => 'خطأ في تحديد المدرب',
            'discount.integer' => 'الخصم يجب أن يكون رقم',
        ];
    }
}
