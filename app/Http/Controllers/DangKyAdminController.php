<?php

namespace App\Http\Controllers;

use App\Models\Dang_Ky_Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangKyAdminController extends Controller
{
    public function registerView(){

        return view('admin.Register');
    }

    public function loginView(){
        return view('admin.Login');
    }

    public function login(Request $request)
    {

        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $check = Auth::guard('admins')->attempt($data);
        if($check) {
            $admin = Auth::guard('admins')->user();
            if($admin->is_block == 1) {
                toastr()->error("Tài khoản đã bị khóa!");
                Auth::guard('admins')->logout();
            } else if($admin->is_email == 1) {
                toastr()->warning("Tài khoản chưa được kích hoạt!");
                Auth::guard('admins')->logout();
            } else {
                toastr()->success("Đã đăng nhập thành công!");
                return response()->json([
                    'status'    =>  true,
                ]);
            }
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
            return response()->json([
                'status'    =>  false,
            ]);
        }
    }

    public function createNewAccount(Request $request) {

        $dataAdmin = $request->all();
        $dataAdmin['password'] = bcrypt($request->password);

        Dang_Ky_Admin::create($dataAdmin);

        return response()->json([
            'statusAdmin' => true,
        ]);
    }

}