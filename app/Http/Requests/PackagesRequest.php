<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackagesRequest extends FormRequest
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
            'price' => 'required|integer',
            'workout_days' => 'required|integer',
            'duration' => 'required|integer',
            'sauna' => 'nullable|numeric',
            'steam' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'يجب إضافة إسم!',
            'name.string' => 'يجب أن يكون الإسم نص',
            'price.required' => 'يجب إضافة السعر !',
            'price.integer' => 'السعر يتكون من أرقام فقط',
            'workout_days.required' => 'يجب إضافة عدد أيام التمارين !',
            'workout_days.integer' => 'عدد أيام التمارين يتكون من أرقام فقط',
            'duration.required' => 'يجب إضافة عدد أيام الاشتراك !',
            'duration.integer' => 'عدد أيام التمارين يتكون من أرقام فقط',
            'sauna.numeric' => 'يجب أن يكون جلسات الساونا رقم',
            'steam.numeric' => 'يجب أن يكون جلسات البخار رقم',
        ];
    }
}
