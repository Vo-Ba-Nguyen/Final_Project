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
}
