<?php

use App\Http\Controllers\ChiTietNhapKhoController;
use App\Http\Controllers\DangKyAdminController;
use App\Http\Controllers\DangKyController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\HangController;
use App\Http\Controllers\HoaDonNhapKhoController;
use App\Http\Controllers\PayPalController;
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
Route::get('/admin/danh-muc/data-con', [DanhMucController::class,'getDanhMucCon']);
Route::post('/admin/danh-muc/update', [DanhMucController::class,'updateData']);
Route::post('/admin/danh-muc/delete', [DanhMucController::class,'deleteData']);
Route::post('/admin/danh-muc/statusChange', [DanhMucController::class,'statusChange']);
Route::post('/admin/danh-muc/search', [DanhMucController::class,'search']);


//Product
Route::get('/admin/san-pham/index', [SanPhamController::class,'index']);
Route::post('/admin/san-pham/index', [SanPhamController::class,'store']);
Route::get('/admin/san-pham/getDataProduct', [SanPhamController::class,'getDataProduct']);
Route::post('/admin/san-pham/search', [SanPhamController::class,'search']);
Route::post('/admin/san-pham/updateDataProduct', [SanPhamController::class,'updateDataProduct']);
Route::post('/admin/san-pham/deleteDataProduct', [SanPhamController::class,'deleteDataProduct']);
Route::post('/admin/san-pham/changeStatusProduct', [SanPhamController::class,'changeStatusProduct']);


//Origin
Route::get('/admin/xuat-xu/index', [XuatXuController::class, 'index']);
Route::post('/admin/xuat-xu/index', [XuatXuController::class, 'store']);
Route::post('/admin/xuat-xu/search', [XuatXuController::class, 'search']);
Route::get('/admin/xuat-xu/getDataOrigin', [XuatXuController::class, 'getDataOrigin']);
Route::post('/admin/xuat-xu/updateDataOrigin', [XuatXuController::class, 'updateDataOrigin']);
Route::post('/admin/xuat-xu/deleteDataOrigin', [XuatXuController::class, 'deleteDataOrigin']);

//firms
Route::get('/admin/hang/index', [HangController::class, 'index']);
Route::post('/admin/hang/index', [HangController::class, 'store']);
Route::get('/admin/hang/getDataFirms', [HangController::class,'getDataFirms']);
Route::post('/admin/hang/search', [HangController::class,'search']);
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


Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// Register for Admin
Route::get('/admin/register/index', [DangKyAdminController::class, 'registerView']);
Route::post('/admin/register/createNewAccount', [DangKyAdminController::class, 'createNewAccount']);
Route::get('/admin/register/getDataAdmin', [DangKyAdminController::class, 'getDataAdmin']);
// Login for Admin
Route::get('/admin/login/index', [DangKyAdminController::class, 'loginView']);
Route::post('/admin/login/index', [DangKyAdminController::class, 'login']);


// HomePage
Route::get('/homepage/index', [DangKyController::class, 'homePage']);
Route::get('/homepage/register', [DangKyController::class, 'register']);
Route::get('/homepage/login', [DangKyController::class, 'loginView']);
Route::get('/homepage/detail/{id}', [DangKyController::class, 'detail']);
Route::get('/homepage/load-cart', [DonHangController::class, 'loadCart']);
Route::post('/homepage/createAccount', [DangKyController::class, 'createAccountUser']);
Route::post('/homepage/login', [DangKyController::class, 'login']);
Route::get('/homepage/logout', [DangKyController::class, 'logout']);
Route::get('/homepage/load-menu', [DangKyController::class, 'loadMenu']);
Route::post('/homepage/add-cart', [DonHangController::class, 'addCart']);
Route::post('/homepage/add-heart', [DonHangController::class, 'addHeart']);
Route::post('/homepage/delete-sp-cart', [DonHangController::class, 'deleteSPCart']);
Route::post('/homepage/create', [DonHangController::class, 'create']);

//Active tài khoản
Route::get('/active/{hash_mail}', [DangKyController::class, 'actionActive']);

//Cart
Route::get('/homepage/cart', [DangKyController::class, 'cartView']);
Route::get('/homepage/data-cart', [DangKyController::class, 'cartData']);
Route::get('/homepage/total-cart', [DangKyController::class, 'cartTotal']);
Route::post('/homepage/update-qty', [DangKyController::class, 'updateQty']);

//Bill
Route::get('/homepage/bill', [DangKyController::class, 'viewBill']);
Route::get('/homepage/bill/data', [DangKyController::class, 'dataBill']);
Route::get('/homepage/bill-detail/{id}', [DangKyController::class, 'detailBill']);
Route::post('/homepage/bill-detail/data', [DangKyController::class, 'dataBillDetail']);

//DetailProduct
Route::get('/homepage/detail-product/{id}', [DangKyController::class, 'detailProduct']);

//ListProduct
Route::get('/homepage/product/{id}', [DangKyController::class, 'listProduct']);

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
