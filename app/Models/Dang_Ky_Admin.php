<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dang_Ky_Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'dang_ky_admins';

    protected $fillable = [
        "ho_va_ten",
        "email",
        "so_dien_thoai",
        "password",
        "ngay_sinh",
        "dia_chi",
        "is_block",
        "is_email",
        "hash_code",
    ];
}