<?php

use App\Http\Controllers\DanhMucController;
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


Route::get('/admin/danh-muc/index', [DanhMucController::class,'index']);
Route::post('/admin/danh-muc/index', [DanhMucController::class,'store']);
Route::get('/admin/danh-muc/data', [DanhMucController::class,'getData']);
Route::post('/admin/danh-muc/update', [DanhMucController::class,'updateData']);
Route::post('/admin/danh-muc/delete', [DanhMucController::class,'deleteData']);
