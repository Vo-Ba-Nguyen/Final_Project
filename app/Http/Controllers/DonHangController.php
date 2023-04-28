<?php

namespace App\Http\Controllers;

use App\Jobs\XacNhanDonHangJob;
use App\Models\ChiTietDonHang;
use App\Models\Dang_Ky;
use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DonHangController extends Controller
{
    public function addCart(Request $request)
    {
        $san_pham = SanPham::find($request['id']);
        if(!$san_pham) {
            return response()->json([
                'status'    =>   0,
            ]);
        }
        $chi_tiet_sp = ChiTietDonHang::where('id_san_pham', $request['id'])
                                     ->where('id_don_hang', 0)
                                     ->first();
        if(isset($request['so_luong'])){
            if($chi_tiet_sp){
                $chi_tiet_sp->so_luong = $chi_tiet_sp->so_luong + $request['so_luong'];
                $chi_tiet_sp->thanh_tien = $chi_tiet_sp->don_gia * $chi_tiet_sp->so_luong;
                $chi_tiet_sp->save();
            } else {
                ChiTietDonHang::create([
                    'id_san_pham'   => $request['id'],
                    'id_khach_hang' => Auth::guard('customers')->user()->id,
                    'so_luong'      => $request['so_luong'],
                    'don_gia'       => $san_pham->gia_khuyen_mai,
                    'thanh_tien'    => $request['so_luong'] * $san_pham->gia_khuyen_mai,
                    'ten_san_pham'  => $san_pham->ten_san_pham,
                ]);
            }
        } else {
            if($chi_tiet_sp){
                $chi_tiet_sp->so_luong++;
                $chi_tiet_sp->thanh_tien = $chi_tiet_sp->don_gia * $chi_tiet_sp->so_luong;
                $chi_tiet_sp->save();
            } else {
                ChiTietDonHang::create([
                    'id_san_pham'   => $request['id'],
                    'id_khach_hang' => Auth::guard('customers')->user()->id,
                    'so_luong'      => 1,
                    'don_gia'       => $san_pham->gia_khuyen_mai,
                    'thanh_tien'    => $san_pham->gia_khuyen_mai,
                    'ten_san_pham'  => $san_pham->ten_san_pham,
                ]);
            }
        }

        return response()->json([
            'status'    =>   1,
        ]);
    }

    public function addHeart(Request $request)
    {
        $data = $request->all();

        $san_pham = SanPham::find($data['id']);
        if($san_pham->is_open == 1) {
            $san_pham->is_open = 2;
            $san_pham->save();

            return response()->json([
                'status'    =>  1
            ]);
        } else {
            $san_pham->is_open = 1;
            $san_pham->save();

            return response()->json([
                'status'    =>  2
            ]);
        }
    }

    public function loadCart()
    {
        $cart = ChiTietDonHang::where('id_don_hang', 0)
                              ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
                              ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh', 'san_phams.gia_khuyen_mai')
                              ->get();

        $count_cart = ChiTietDonHang::where('id_don_hang', 0)->count();
        $thanh_tien = ChiTietDonHang::where('id_don_hang', 0)->sum('thanh_tien');

        return response()->json([
            'cart'  =>  $cart,
            'thanh_tien'  =>  $thanh_tien,
            'count_cart'  =>  $count_cart
        ]);
    }

    public function deleteSPCart(Request $request)
    {
        $data = $request->all();
        $san_pham = ChiTietDonHang::find($data['id']);
        if($san_pham){
            $san_pham->delete();
            $status = 1;
        } else {
            $status = 0;
        }
        return response()->json([
            'status'    =>  $status
        ]);
    }

    public function create(Request $request)
    {
        $user =Auth::guard('customers')->user();
        $data = $request->all();
        $data['ho_va_ten'] = $user->ho_va_ten;

        $parts = explode(" ", $user->ho_va_ten);
        if (count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else {
            $firstname = $user->ho_va_ten;
            $lastname = " ";
        }

        $data['ho_lot'] = $firstname;
        $data['ten_khach'] = $lastname;
        $data['email'] = $user->email;
        $data['so_dien_thoai'] =$user->so_dien_thoai;
        $data['dia_chi'] =$user->dia_chi;
        $data['id_khach_hang'] = $user->id;
        $data['is_thanh_toan'] = 1;
        $data['giao_hang'] = 0;
        $data['hash_don_hang'] = 'DHBBM' . 1359;

        $donhang = DonHang::create($data);
        $num = 1359 + $donhang->id;
        $donhang->hash_don_hang = 'DHBBM' . $num;
        $donhang->save();

        $gioHang = ChiTietDonHang::where('id_don_hang', 0)
                                ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
                                ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh', 'san_phams.id as id_sp')
                                ->get();

        $info['nguoi_mua']  = Auth::guard('customers')->user()->ho_va_ten;
        $info['nguoi_nhan'] = $data['ho_va_ten'];
        $info['dia_chi']    = $data['dia_chi'];
        $info['email']      = $data['email'];
        $info['tong_tien']  = $data['tong_thanh_toan'];
        $info['ma_don']     = $data['hash_don_hang'];

        XacNhanDonHangJob::dispatch($info, $gioHang);

        foreach($gioHang as $value){
            $value->id_don_hang = $donhang->id;
            $value->save();
        }

        return response()->json([
            'status'    =>  1
        ]);
    }
}
