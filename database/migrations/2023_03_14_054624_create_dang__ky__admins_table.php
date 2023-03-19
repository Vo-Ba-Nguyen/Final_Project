<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangKyAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_ky_admins', function (Blueprint $table) {
            $table->id();
            $table->string("ho_va_ten");
            $table->string("email");
            $table->string("so_dien_thoai");
            $table->string("password");
            $table->string("ngay_sinh");
            $table->string("dia_chi");
            $table->integer("is_block")->default(0);
            $table->integer("is_email")->default(0);
            $table->string("hash_code");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dang__ky__admins');
    }
}