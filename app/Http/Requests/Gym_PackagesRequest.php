<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Gym_PackagesRequest extends FormRequest
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
            'users_number' => 'required|integer',
            'duration' => 'required|integer',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'يجب إضافة إسم!',
            'name.string' => 'يجب أن يكون الإسم نص',
            'price.required' => 'يجب إضافة السعر !',
            'price.integer' => 'السعر يتكون من أرقام فقط',
            'users_number.required' => 'يجب إضافة عدد المشتركين !',
            'users_number.integer' => 'عدد المشتركين يتكون من أرقام فقط',
            'duration.required' => 'يجب إضافة عدد أيام الإشتراك !',
            'duration.integer' => 'عدد أيام الإشتراك يتكون من أرقام فقط',
        ];
    }
}
