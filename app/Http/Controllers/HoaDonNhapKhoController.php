<?php

namespace App\Http\Controllers;

use App\Models\Chi_Tiet_Nhap_Kho;
use App\Models\Hoa_Don_Nhap_Kho;
use Illuminate\Http\Request;

class HoaDonNhapKhoController extends Controller
{
   public function index(){
    Hoa_Don_Nhap_Kho::get();

    return view('admin.page.Hoa_Don_Kho.index');
   }

   public function getDataBill(Request $request) {
        $bill = Hoa_Don_Nhap_Kho::get();

        return response()->json([
            'dataBill' => $bill,
        ]);
   }

   public function viewDetailsBill($id) {

    $bill = Chi_Tiet_Nhap_Kho::where('id_hoa_don_nhap_kho', $id)->get();

    return response()->json([
        'dataDetailsBill' => $bill,
    ]);
   }

   public function deleteBill(Request $request) {

    Hoa_Don_Nhap_Kho::where('id', $request->id)->first()->delete();

    return response()->json([
        'statusDeleteBill' => true,
    ]);
   }
}
