<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'ho_va_ten'     => 'required|min:3',
            'gioi_tinh'     => 'required|numeric|between:0,2',
            'email'         => 'required|email',
            'so_dien_thoai' => 'required|digits:10',
            'password'      => 'required|min:6',
            're_password'   => 'required|same:password',
            'ngay_sinh'     => 'required|date',
            'dia_chi'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'  =>  ':attribute không được để trống',
            'min'       =>  ':attribute quá ít ký tự',
            'email'     => ':attribute phải dưới dạng email',
            'digits'    => ':attribute phải 10 chữ số',
            'numeric'   => ':attribute phải là số',
            'date'      => ':attribute phải dưới định dạng ngày tháng',
            'same'      => ':attribute không trùng khớp',
        ];
    }

    public function attributes()
    {
        return [
            'ho_va_ten'   =>  'Họ Và Tên',
            'gioi_tinh'  => 'Giới Tính',
            'password' => 'Mật Khẩu',
            're_password' => 'Mật Khẩu',
            'so_dien_thoai'  => 'Số Điện Thoại',
            'ngay_sinh'     => 'Ngày Sinh',
            'dia_chi' => 'Địa Chỉ',
        ];
    }
}
