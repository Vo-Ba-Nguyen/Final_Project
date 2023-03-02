<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XuatXu extends Model
{
    use HasFactory;

    protected $table = 'xuat_xus';


    protected $fillable = [
            "ten_nuoc",
            "slug_nuoc",
    ];
}
