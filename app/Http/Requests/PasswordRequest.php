<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|current_password:web',
            'new_password' => ['required', 'string', 'min:8'],
            're_password' => ['required', 'same:new_password'],
        ];
    }

    public function messages()
    {
        return[
            'password.required' => 'يجب إضافة كلمة سر جديدة!',
            'password.current_password' => 'كلمة المرور القديمة غير متطابقة',
            'new_password.required' => 'يجب إضافة كلمة سر جديدة!',
            'new_password.string' => 'يجب أن تحتوي كلمة السر الجديدة على نص',
            'new_password.min' => 'يجب أن تكون كلمة السر الجديدة أكبر من 8',
            're_password.required' => 'يجب إدخال كلمة السر الجديدة مجدداً!',
            're_password.same' => 'كلمة المرور الجديدة غير متطابقة',
        ];
    }
}
