<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    public function index()
    {
        $danh_muc = DanhMuc::where('id_danh_muc_cha', 0)
                            ->get();
        return view('admin.page.Danh_Muc.index', compact('danh_muc'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        DanhMuc::create($data);

        return response()->json([
            'status'    => true,
            'message'   => "Thêm mới thành công!"
        ]);
    }

    public function getData()
    {
        $danhMuc = 'SELECT a.*, b.ten_danh_muc as ten_danh_muc_cha
                FROM `danh_mucs` a LEFT JOIN `danh_mucs` b
                on a.id_danh_muc_cha = b.id';
        $data = DB::select($danhMuc);

        return response()->json([
            'data' => $data,
        ]);
    }

    public function getDanhMucCon()
    {
        $data = DanhMuc::where('id_danh_muc_cha', '<>', 0)
                        ->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function updateData(Request $request){
        $data = $request->all();
        $danh_muc = DanhMuc::where('id', $request->id)->first();
        $danh_muc->update($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function deleteData(Request $request){
        DanhMuc::where('id', $request->id)->first()->delete();

        return response()->json([
            'status' => true,
        ]);
    }
    public function statusChange(Request $request){
        $status = DanhMuc::where('id', $request->id)->first();
        // $status->is_open = !$status->is_open;
        if($status->is_open==1){
            $status->is_open = 0;
        }
        else
        {
            $status->is_open = 1;
        }
        $status->save();
    }

    public function search(Request $request)
    {
        $search = $request->all();
        $data = DanhMuc::where('danh_mucs.is_open', 1)
                        ->join('danh_mucs as a', 'danh_mucs.id_danh_muc_cha', 'a.id')
                        ->where(function ($query) use ($search) {
                            $query->where('danh_mucs.ten_danh_muc', 'like', '%' . $search['search'] . '%');
                        })
                        ->select('danh_mucs.*', 'a.ten_danh_muc as ten_danh_muc_cha')
                        ->get();

        return response()->json([
            'data'  =>  $data
        ]);
    }
}
