<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_phams';

    protected $fillable = [
            "ten_san_pham",
            "slug_san_pham",
            "id_danh_muc_con",
            "id_hang",
            "mo_ta",
            "gia_ban",
            "gia_khuyen_mai",
            "hinh_anh",
            "so_luong",
            "is_open",
    ];
}
