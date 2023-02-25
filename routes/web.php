<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Category
Route::get('/admin/danh-muc/index', [DanhMucController::class,'index']);
Route::post('/admin/danh-muc/index', [DanhMucController::class,'store']);
Route::get('/admin/danh-muc/data', [DanhMucController::class,'getData']);
Route::post('/admin/danh-muc/update', [DanhMucController::class,'updateData']);
Route::post('/admin/danh-muc/delete', [DanhMucController::class,'deleteData']);
Route::post('/admin/danh-muc/statusChange', [DanhMucController::class,'statusChange']);


//Product
Route::get('/admin/san-pham/index', [SanPhamController::class,'index']);
Route::post('/admin/san-pham/index', [SanPhamController::class,'store']);
Route::get('/admin/san-pham/getDataProduct', [SanPhamController::class,'getDataProduct']);
Route::post('/admin/san-pham/updateDataProduct', [SanPhamController::class,'updateDataProduct']);
Route::post('/admin/san-pham/deleteDataProduct', [SanPhamController::class,'deleteDataProduct']);
