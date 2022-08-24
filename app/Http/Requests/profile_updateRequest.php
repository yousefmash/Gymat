<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profile_updateRequest extends FormRequest
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
            'phone' => 'numeric|min:7',
            'weight' => 'numeric',
        ];
    }

    public function messages()
    {
        return[
            'phone.numeric' => 'رقم الهاتف يتكون من أرقام فقط',
            'phone.min' => 'خطأ في طول رقم الهاتف',
            'weight.numeric' => 'الوزن يجب أن يكون رقم!',
        ];
    }
}
