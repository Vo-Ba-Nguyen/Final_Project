<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email'         => 'required|email',
            'password'      => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'required'  =>  ':attribute không được để trống',
            'min'       =>  ':attribute quá ít ký tự',
            'email'     => ':attribute phải dưới dạng email',
        ];
    }

    public function attributes()
    {
        return [
            'email'    => 'Email',
            'password' => 'Mật Khẩu',
        ];
    }
}
