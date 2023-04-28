<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chi_Tiet_Nhap_Kho extends Model
{
    use HasFactory;

    protected $table = 'chi__tiet__nhap__khos';

    protected $fillable = [
        "id_san_pham",
        "ten_san_pham",
        "so_luong_san_pham_nhap",
        "don_gia_nhap",
        "id_hoa_don_nhap_kho",
    ];
}
