<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store_receiptRequest extends FormRequest
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
            'receipt_num' => 'required|integer',
            'user' => 'required',
            'user_type' => 'required',
            'receipt_type' => 'required',
            'value' => 'required|integer',
        ];
    }

    public function messages()
    {
        return[
            'receipt_num.required' => 'يجب إضافة رقم إيصال!',
            'receipt_num.integer' => 'رقم إيصال يجب أن يكون رقم',
            'user.required' => 'يجب إدخال بيانات المشترك',
            'user_type.required' => 'يجب تحديد نوع المشترك',
            'receipt_type.required' => 'يجب تحديد نوع الإيصال',
            'value.required' => 'يجب إضافة قيمة الإيصال !',
            'value.integer' => 'قيمة الإيصال يجب أن يكون رقم',
        ];
    }
}