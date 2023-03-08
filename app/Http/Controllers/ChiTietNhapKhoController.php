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

    public function createDetail(Request $request)
    {
        $data = $request->all();
        $tang_soluong = Chi_Tiet_Nhap_Kho::join('hoa_don_nhap_khos', 'chi__tiet__nhap__khos.id_hoa_don_nhap_kho', 'hoa_don_nhap_khos.id')
                                        ->where('chi__tiet__nhap__khos.id_san_pham', $request->id)
                                        ->where('hoa_don_nhap_khos.is_nhap_kho', 0)
                                        ->select('chi__tiet__nhap__khos.*')
                                        ->first();
        if($tang_soluong){
            $tang_soluong->so_luong_san_pham_nhap = $tang_soluong->so_luong_san_pham_nhap + 1;
            $tang_soluong->save();
        }else{
            $find_warehouse_invoices = Hoa_Don_Nhap_Kho::where('is_nhap_kho', 0)->first();
            if(!$find_warehouse_invoices){
                $warehouse_invoices = Hoa_Don_Nhap_Kho::latest()->first();
                if($warehouse_invoices){
                    $data['id_don_hang'] =  1000 + $warehouse_invoices->id;
                }else{
                    $data['id_don_hang'] =  1000;
                }

                $data['hash_code'] = Str::uuid();
                $warehouse = Hoa_Don_Nhap_Kho::create($data);
                Chi_Tiet_Nhap_Kho::create([
                    'id_san_pham' => $request->id,
                    'ten_san_pham' => $request->ten_san_pham,
                    'id_hoa_don_nhap_kho' => $warehouse->id,
                    'so_luong_san_pham_nhap' => 1,
                    'don_gia_nhap' => 0,
                ]);
            }else{
                Chi_Tiet_Nhap_Kho::create([
                    'id_san_pham' => $request->id,
                    'ten_san_pham' => $request->ten_san_pham,
                    'id_hoa_don_nhap_kho' => $find_warehouse_invoices->id,
                    'so_luong_san_pham_nhap' => 1,
                    'don_gia_nhap' => 0,
                ]);
            }
        }

        return response()->json([
            'status' => 1,
        ]);
    }

    public function getData()
    {
        // $data = Chi_Tiet_Nhap_Kho::join('hoa_don_nhap_khos', 'chi__tiet__nhap__khos.id_hoa_don_nhap_kho', 'hoa_don_nhap_khos.id')
        //                             ->where('hoa_don_nhap_khos.is_nhap_kho', 0)
        //                             ->select('chi__tiet__nhap__khos.*')
        //                             ->get();

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
}
