<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'calories' => 'required|numeric',
            'details' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'يجب إضافة إسم!',
            'name.string' => 'يجب أن يكون الإسم نص',
            'calories.required' => 'يجب إضافة السعرات !',
            'calories.numeric' => 'السعرات يتكون من أرقام فقط',
            'details.required' => 'يجب إضافة تفاصيل الوجبة !',
        ];
    }
}
