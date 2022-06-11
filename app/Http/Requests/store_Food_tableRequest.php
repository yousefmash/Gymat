<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store_Food_tableRequest extends FormRequest
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
            'days' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'days.required' => 'يجب إضافة عدد الأيام !',
            'days.numeric' => 'عدد الأيام يتكون من أرقام فقط',
        ];
    }
}