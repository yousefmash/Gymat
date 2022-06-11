<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'title' => 'required|string',
            'target' => 'required',
            'content' => 'required|string',
            'end_at' => 'required',
            'user_id' => 'required_if:target,==,user|string',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'يجب إضافة عنوان!',
            'title.string' => 'العنوان يجب أن يكون نص',
            'target.required' => 'يجب تحديد المرسل له !',
            'content.required' =>  'يجب إضافة المحتوى!',
            'content.string' => 'المحتوى يجب أن يكون نص',
            'end_at.required' => 'يجب تحديد تاريخ الإنتهاء',
            'user_id.required_if' => 'يجب تحديد المشترك',
            'user_id.numeric' => 'معرف المشترك يجب أن يكون رقم',
        ];
    }
}
