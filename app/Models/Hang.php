<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    use HasFactory;

    protected $table = 'hangs';

    protected $fillable = [
            "ten_hang",
            "slug_hang",
            "id_xuat_xu",
            "is_open",
    ];
}
