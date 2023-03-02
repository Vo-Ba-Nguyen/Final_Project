<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class SanPhamController extends Controller
{
    public function index(){

        $san_pham = SanPham::get();
        return view('admin.page.San_Pham.index');
    }
    public function store(Request $request){

            $dataProduct = $request->all();

            SanPham::create($dataProduct);

            return response()->json([
                    'status' => true,
                    'message' => "Thêm mới sản phẩm thành công"
            ]);
    }

    public function getDataProduct(){
        $san_pham = SanPham::get();

        return response()->json([
            'dataProduct' => $san_pham,
        ]);
    }
    public function updateDataProduct(Request $request){
        $dataProduct = $request->all();
        $san_pham = SanPham::where('id', $request->id)->first();
        $san_pham->update($dataProduct);


        return response()->json([
            'statusProduct' => true,
        ]);
    }
    public function deleteDataProduct(Request $request){

        SanPham::where('id', $request->id)->first()->delete();

        return response()->json([
            'status' => true,
        ]);
    }
    public function changeStatusProduct(Request $request){
        $statusSanPham = SanPham::where('id', $request->id)->first();

        if($statusSanPham->is_open==1){
            $statusSanPham->is_open = 0;
        } else {
            $statusSanPham->is_open = 1;
        }
        $statusSanPham->save();
    }
    
}
