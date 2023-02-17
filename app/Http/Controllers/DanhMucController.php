<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    public function index()
    {
        $danh_muc = DanhMuc::get();
        return view('admin.page.Danh_Muc.index', compact('danh_muc'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        DanhMuc::create($data);

        return response()->json([
            'status'    => true,
            'message'   => "Bạn đã thêm mới thành công danh mục!"
        ]);
    }

    public function getData()
    {
    $danhMuc = 'SELECT a.*, b.ten_danh_muc as ten_danh_muc_cha
                FROM `danh_mucs` a LEFT JOIN `danh_mucs` b
                on a.id_danh_muc_cha = b.id';
        $data = DB::select($danhMuc);
        // dd($data);
        return response()->json([
            'data' => $data,
        ]);
    }

}
