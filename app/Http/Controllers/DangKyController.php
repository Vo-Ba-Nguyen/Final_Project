<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Jobs\SendWelcomeEmail;
use App\Models\ChiTietDonHang;
use App\Models\Dang_Ky;
use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Guid\Guid;
use Illuminate\Support\Str;

class DangKyController extends Controller
{

    public function homePage(){
        $san_pham = SanPham::where('is_open', '>', 0)->get();
        $best_seller = SanPham::where('gia_khuyen_mai', '<', 200000)
                              ->where('is_open', '>', 0)
                              ->get();
        $special_offer = SanPham::where('gia_khuyen_mai', '>', 200000)
                              ->where('is_open', '>', 0)
                              ->get();

        $favorites_list = SanPham::where('is_open', 2)
                              ->get();
        return view('Home.Page.homePage', compact('san_pham', 'best_seller', 'special_offer', 'favorites_list'));
    }

    public function register(){

        return view('Home.Page.Register');
    }

    public function loginView(){

        return view('Home.Page.Login');
    }

    public function createAccountUser(RegisterUserRequest $request){

        $user = $request->all();
        $hash = Str::uuid(); // tạo ra 1 biến tên hash kiểu string có 36 ký tự không trùng với nhau
        $user['hash_mail'] = $hash;
        $user['password'] = bcrypt($request->password);
        Dang_Ky::create($user);

        $dataMail['ho_va_ten'] = $request->ho_va_ten;
        $dataMail['email']     = $request->email;
        $dataMail['hash_mail'] = $hash;

        SendWelcomeEmail::dispatch($dataMail);

        return response()->json([
            'statusUserAccount'  => true,
        ]);
    }

    public function login(LoginUserRequest $request){

        $dataUser['email'] = $request->email;
        $dataUser['password'] = $request->password;
        $check = Auth::guard('customers')->attempt($dataUser);
        if($check) {
            $customers = Auth::guard('customers')->user();
            if($customers->is_block == 0) {
                toastr()->error("Bạn chưa kích hoạt tài khoản, vui lòng kiểm tra email!");
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

    public function logout()
    {
        Auth::guard('customers')->logout();
        return redirect('/homepage/index');
    }

    public function cartView(){

        return view('Home.Page.cart');
    }

    public function cartData(){
        $data = ChiTietDonHang::where('id_don_hang', 0)
                              ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
                              ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh', 'san_phams.gia_khuyen_mai')
                              ->get();
        $total = ChiTietDonHang::where('id_don_hang', 0)->sum('thanh_tien');
        return response()->json([
            'data'  =>  $data,
            'total' =>  $total,
        ]);
    }

    public function cartTotal(){
        $total = ChiTietDonHang::where('id_don_hang', 0)->sum('thanh_tien');

        return response()->json([
            'total' =>  $total,
        ]);
    }

    public function updateQty(Request $request) {
        $data = $request->all();
        $san_pham = ChiTietDonHang::find($data['id']);
        $san_pham->so_luong = $data['so_luong'];
        $san_pham->thanh_tien = $san_pham->so_luong * $san_pham->don_gia;
        $san_pham->save();
    }

    public function viewBill()
    {
        return view('Home.Page.listBill');
    }

    public function dataBill()
    {
        $data = DonHang::all();

        return response()->json([
            'data'  =>  $data
        ]);
    }

    public function detailBill($id)
    {
        return view('Home.Page.detailBill');
    }

    public function dataBillDetail(Request $request)
    {
        $data = $request->all();
        $list_sp = ChiTietDonHang::where('id_don_hang', $data['id'])
                                ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
                                ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh', 'san_phams.gia_khuyen_mai')
                                ->get();
        $checkout = DonHang::where('id', $data['id'])->first();

        return response()->json([
            'data'      =>  $list_sp,
            'checkout'  =>  $checkout,
        ]);
    }

    public function detail($id)
    {
        $san_pham = SanPham::find($id);

        if($san_pham){
            return response()->json([
                'detail_sp' => $san_pham
            ]);
        }
    }

    public function detailProduct($id)
    {
        $san_pham = SanPham::where('id', $id)
                            ->where('is_open', '>', 0)
                            ->first();
        if($san_pham){
            return view('Home.Page.detailProduct', compact('san_pham'));
        } else {
            return redirect('/homepage/index');
        }
    }

    public function loadMenu()
    {
        $danh_muc = DanhMuc::where('id_danh_muc_cha', 0)
                            ->where('is_open', 1)
                            ->get();
        $danh_muc_con = DanhMuc::where('id_danh_muc_cha', '<>', 0)
                                ->where('is_open', 1)
                                ->get();
        $san_pham = SanPham::where('is_open', 1)
                            ->take(4)
                            ->get();

        return response()->json([
            'danh_muc'      =>   $danh_muc,
            'danh_muc_con'  =>   $danh_muc_con,
            'san_pham'      =>   $san_pham,
        ]);
    }

    public function listProduct($id)
    {
        $san_pham = SanPham::where('id_danh_muc_con', $id)
                            ->where('is_open', '>', 0)
                            ->get();

        $best_seller = SanPham::where('id_danh_muc_con', $id)
                            ->where('gia_khuyen_mai', '<', 200000)
                            ->where('is_open', '>', 0)
                            ->get();

        $special_offer = SanPham::where('id_danh_muc_con', $id)
                            ->where('gia_khuyen_mai', '>', 200000)
                            ->where('is_open', '>', 0)
                            ->get();

        $favorites_list = SanPham::where('id_danh_muc_con', $id)
                                ->where('is_open', 2)
                                ->get();

        return view('Home.Page.listProduct', compact('san_pham', 'best_seller', 'special_offer', 'favorites_list'));
    }

    public function actionActive($hash_mail)
    {
        $account = Dang_Ky::where('hash_mail', $hash_mail)->first();
        if($account && $account->is_block == 0) {
            $account->is_block = 1;
            $account->hash_mail = null;
            $account->save();
            toastr()->success('Đã kích hoạt tài khoản thành công!');
        } else {
            toastr()->error('Thông tin không chính xác!');
        }

        return redirect('/homepage/login');
    }
}
