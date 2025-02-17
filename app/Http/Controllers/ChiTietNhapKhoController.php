<?php

namespace App\Http\Controllers;

use App\Models\Chi_Tiet_Nhap_Kho;
use App\Models\Hoa_Don_Nhap_Kho;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class ChiTietNhapKhoController extends Controller
{
    public function index(){

        $nhap_kho = Chi_Tiet_Nhap_Kho::get();
        return view('admin.page.Chi_Tiet_Nhap_Kho.index');
    }

    public function createProductsDetail(Request $request)
    {
        $dataProductsDetails = $request->all();
        $tang_soluong = Chi_Tiet_Nhap_Kho::join('hoa_don_nhap_khos', 'chi__tiet__nhap__khos.id_hoa_don_nhap_kho', 'hoa_don_nhap_khos.id')
                                        ->where('chi__tiet__nhap__khos.id_san_pham', $request->id)
                                        ->where('hoa_don_nhap_khos.is_nhap_kho', 0)
                                        ->select('chi__tiet__nhap__khos.*')
                                        ->first();
        $id_hoa_don = 0;
        if($tang_soluong){
            $id_hoa_don = $tang_soluong->id_hoa_don_nhap_kho;
            $tang_soluong->so_luong_san_pham_nhap = $tang_soluong->so_luong_san_pham_nhap + 1;
            $tang_soluong->save();
        }else{
            $tim_hoa_don = Hoa_Don_Nhap_Kho::where('is_nhap_kho', 0)->first();
            if(!$tim_hoa_don){
                $hon_don_nhap_kho = Hoa_Don_Nhap_Kho::latest()->first();
                if($hon_don_nhap_kho){
                    $dataProductsDetails['id_don_hang'] =  001 + $hon_don_nhap_kho->id;
                }else{
                    $dataProductsDetails['id_don_hang'] =  001;
                }

                $dataProductsDetails['hash_code'] = Str::uuid();
                $nhap_kho = Hoa_Don_Nhap_Kho::create($dataProductsDetails);
                $id_hoa_don = $nhap_kho->id;
                Chi_Tiet_Nhap_Kho::create([
                    'id_san_pham' => $request->id,
                    'ten_san_pham' => $request->ten_san_pham,
                    'id_hoa_don_nhap_kho' => $nhap_kho->id,
                    'so_luong_san_pham_nhap' => 1,
                    'don_gia_nhap' => 0,
                ]);
            }else{
                $id_hoa_don = $tim_hoa_don->id;
                Chi_Tiet_Nhap_Kho::create([
                    'id_san_pham' => $request->id,
                    'ten_san_pham' => $request->ten_san_pham,
                    'id_hoa_don_nhap_kho' => $tim_hoa_don->id,
                    'so_luong_san_pham_nhap' => 1,
                    'don_gia_nhap' => 0,
                ]);
            }
        }

        return response()->json([
            'status' => 1,
            'id_hoa_don' => $id_hoa_don,
        ]);
    }

    public function createBill(Request $request)
    {
        $id_hoa_don = $request->id_hoa_don;
        $chi_tiet_hoa_don = Chi_Tiet_Nhap_Kho::where('id_hoa_don_nhap_kho', $id_hoa_don)->get();
        $so_luong_sp = 0;
        $tong_tien = 0;

        foreach($chi_tiet_hoa_don as $key => $value){
            $so_luong_sp += $value->so_luong_san_pham_nhap;
            $tong_tien += ($value->so_luong_san_pham_nhap * $value->don_gia_nhap);
        }

        $hoa_don = Hoa_Don_Nhap_Kho::find($id_hoa_don);
        $hoa_don->tong_so_luong_san_pham = $so_luong_sp;
        $hoa_don->tong_tien = $tong_tien;
        $hoa_don->is_nhap_kho = 1;
        $hoa_don->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function getData()
    {

        $data = Chi_Tiet_Nhap_Kho::all();
        $hoa_don = Hoa_Don_Nhap_Kho::where('is_nhap_kho', 0)
                                    ->get();
        $res = [];
        foreach($data as $key => $value){
            foreach($hoa_don as $k => $v) {
                if($value->id_hoa_don_nhap_kho == $v->id){
                    array_push($res, $value);
                }
                break;
            }
        }

        return response()->json([
            'data' => $res,
        ]);
    }

    public function updateDetail(Request $request)
    {
        $chi_tiet = Chi_Tiet_Nhap_Kho::find($request->id);
        $chi_tiet->so_luong_san_pham_nhap = $request->so_luong_san_pham_nhap;
        $chi_tiet->don_gia_nhap = $request->don_gia_nhap;
        $chi_tiet->save();
        return response()->json([
            'status' => 1,
        ]);
    }

    public function deleteDetail(Request $request){

        $chi_tiet = Chi_Tiet_Nhap_Kho::where('id', $request->id)->first()->delete();

        return response()->json([
            'statusDelete' => true,
        ]);
    }

}
