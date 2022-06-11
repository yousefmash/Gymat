<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User_SearchRequest extends FormRequest
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
            'user' => 'required',
            'user_type' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'user.required' => 'يجب إدخال بيانات المشترك',
            'user_type.required' => 'يجب تحديد نوع المشترك',
        ];
    }
}
