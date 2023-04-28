<?php

namespace App\Models;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Dang_Ky extends Authenticatable
{
    use HasFactory;

    protected $table = 'dang_kies';

    protected $fillable = [
        "ho_va_ten",
        "gioi_tinh",
        "email",
        "so_dien_thoai",
        "password",
        "ngay_sinh",
        "dia_chi",
        "is_block",
        "hash_mail",
    ];
}
