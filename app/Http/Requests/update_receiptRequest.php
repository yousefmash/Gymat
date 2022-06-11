<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class update_receiptRequest extends FormRequest
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
            'receipt_num' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'receipt_num.required' => 'يجب إضافة رقم الإيصال !',
            'receipt_num.numeric' => 'يجب أن يكون الرقم الإيصال رقم',
        ];
    }
}