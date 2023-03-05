<?php

namespace App\Http\Controllers;

use App\Models\Hang;
use Illuminate\Http\Request;

class HangController extends Controller
{
    public function index(){
        $hang = Hang::get();

        return view('admin.page.Hang.index');
    }

    public function store(Request $request) {

        $data_firms = $request->all();
        Hang::create($data_firms);

        return response()->json([
            'status' => 'success',
            'message' => " Thêm mới Thành Công!"
        ]);
    }

    public function getDataFirms(){

        $hang = Hang::get();

        return response()->json([
            'dataFirms' => $hang,
        ]);
    }

    public function updateFirms(Request $request){

        $data_firms = $request->all();

        $firms = Hang::where('id', $request->id)->first();
        $firms->update($data_firms);

        return response()->json([
            'status_firms' => true,
        ]);
    }

        public function deleteFirms(Request $request){

            Hang::where('id', $request->id)->first()->delete();

            return response()->json([
                'status_firms' => true,
            ]);
    }
    public function changeStatusFirms(Request $request){

        $statusHang = Hang::where('id', $request->id)->first();

        if($statusHang->is_open == 1){
            $statusHang->is_open = 0 ;
        } else {
            $statusHang->is_open =1;
        }

        $statusHang->save();
    }

}
