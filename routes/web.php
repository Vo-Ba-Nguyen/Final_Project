<?php

use App\Http\Controllers\ChiTietNhapKhoController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HangController;
use App\Http\Controllers\HoaDonNhapKhoController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\XuatXuController;
use App\Models\Hoa_Don_Nhap_Kho;
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
Route::post('/admin/san-pham/changeStatusProduct', [SanPhamController::class,'changeStatusProduct']);


//Origin
Route::get('/admin/xuat-xu/index', [XuatXuController::class, 'index']);
Route::post('/admin/xuat-xu/index', [XuatXuController::class, 'store']);
Route::get('/admin/xuat-xu/getDataOrigin', [XuatXuController::class, 'getDataOrigin']);
Route::post('/admin/xuat-xu/updateDataOrigin', [XuatXuController::class, 'updateDataOrigin']);
Route::post('/admin/xuat-xu/deleteDataOrigin', [XuatXuController::class, 'deleteDataOrigin']);

//firms
Route::get('/admin/hang/index', [HangController::class, 'index']);
Route::post('/admin/hang/index', [HangController::class, 'store']);
Route::get('/admin/hang/getDataFirms', [HangController::class,'getDataFirms']);
Route::post('/admin/hang/updateFirms', [HangController::class,'updateFirms']);
Route::post('/admin/hang/deleteFirms', [HangController::class,'deleteFirms']);
Route::post('admin/hang/changeStatusFirms', [HangController::class,'changeStatusFirms']);

//Product Details
Route::get('/admin/product-details/index', [ChiTietNhapKhoController::class, 'index']);
Route::post('/admin/product-details/create-detail', [ChiTietNhapKhoController::class, 'createProductsDetail']);
Route::post('/admin/product-details/create', [ChiTietNhapKhoController::class, 'createBill']);
Route::get('/admin/product-details/data', [ChiTietNhapKhoController::class, 'getData']);
Route::post('/admin/product-details/updateDetail', [ChiTietNhapKhoController::class, 'updateDetail']);
Route::post('/admin/product-details/deleteDetail', [ChiTietNhapKhoController::class, 'deleteDetail']);

//Bill Information
Route::get('/admin/bill-infor/index',[ HoaDonNhapKhoController::class, 'index']);
Route::get('/admin/bill-infor/getDataBill',[ HoaDonNhapKhoController::class, 'getDataBill']);
Route::get('/admin/bill-infor/viewDetailsBill/{id}',[ HoaDonNhapKhoController::class, 'viewDetailsBill']);
Route::post('/admin/bill-infor/deleteBill', [ HoaDonNhapKhoController::class, 'deleteBill']);
