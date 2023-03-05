<?php

namespace App\Http\Controllers;

use App\Models\XuatXu;
use Facade\FlareClient\View;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\View\View as IlluminateViewView;
use PhpParser\Node\Stmt\Return_;

class XuatXuController extends Controller
{
    public function index() {

        $xuat_xu = XuatXu::get();

        return view('admin.page.Xuat_Xu.index');
    }
    public function store(Request $request) {

        $data_origin = $request->all();

        XuatXu::create($data_origin);

        return response()->json([
            'status' => true,
            'message' => "Thêm mới thành công!"
        ]);
    }
    public function getDataOrigin() {
        $xuat_xu = XuatXu::get();

        return response() -> json([
            'data_origin' =>$xuat_xu,
        ]);
    }
    public function updateDataOrigin(Request $request){
        $data_origin = $request->all();

        $xuat_xu = XuatXu::where('id', $request->id)->first();
        $xuat_xu->update($data_origin);

        return response() -> json([
            'data_origin' => true,
        ]);
    }
    public function deleteDataOrigin(Request $request){

        XuatXu::where('id', $request->id)->first()->delete();

        return response() -> json([
            'data_origin' =>true,
        ]);
    }
}
