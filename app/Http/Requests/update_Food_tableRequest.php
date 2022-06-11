<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class update_Food_tableRequest extends FormRequest
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
            'add_mael' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'add_mael.required' => 'يجب إضافة الوجبة !',
            'add_mael.numeric' => 'خطأ في إدخال الوجبة',
        ];
    }
}