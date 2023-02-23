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
}
