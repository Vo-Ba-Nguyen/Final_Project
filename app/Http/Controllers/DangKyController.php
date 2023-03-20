<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Dang_Ky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangKyController extends Controller
{

    public function homePage(){

        return view('Home.Share.master');
    }

    public function register(){

        return view('Home.Page.Register');
    }

    public function loginView(){

        return view('Home.Page.Login');
    }

    public function createAccountUser(RegisterUserRequest $request){

        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        Dang_Ky::create($user);


        return response()->json([
            'statusUserAccount'  => true,
        ]);
    }

    public function login(Request $request){

        $dataUser['email'] = $request->email;
        $dataUser['password'] = $request->password;
        $check = Auth::guard('customers')->attempt($dataUser);
        if($check) {
            $customers = Auth::guard('customers')->user();
            if($customers->is_block == 1) {
                toastr()->error("Tài khoản đã bị khóa!");
                Auth::guard('customers')->logout();
            } else {
                toastr()->success("Đăng nhập thành công!");
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
}
