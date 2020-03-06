<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionRequest extends FormRequest
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
            'password' => 'min:6 |max:255',
            'repassword' => 'required|same:password',
            'email' => 'unique:receptions,email'
        ];
    }
    public function messages()
    {
       return [
        'email.unique'=> "Email đã tồn tại .",
        'repassword.same'=> "Mật khẩu không trùng khớp .",
        'password.min'=> "Mật khẩu tối thiểu 6 ký tự .",
        'password.max'=> "Mật khẩu tối đa 255 ký tự ."
       ];
    }
}
