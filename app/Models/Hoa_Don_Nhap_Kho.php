<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoa_Don_Nhap_Kho extends Model
{
    use HasFactory;

    protected $table = 'hoa_don_nhap_khos';

    protected $fillable = [
        'id_don_hang',
        'hash_code',
        'tong_tien',
        'tong_so_luong_san_pham',
        'tinh_trang_thanh_toan',
        'hinh_thuc_thanh_toan',
        'is_nhap_kho',
    ];
}
