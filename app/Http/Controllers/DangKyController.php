<?php

namespace App\Http\Controllers;

use App\Models\Dang_Ky;
use Illuminate\Http\Request;

class DangKyController extends Controller
{

    public function homePage(){

        return view('Home.Share.master');
    }

    public function register(){

        return view('Home.Page.Register');
    }

}