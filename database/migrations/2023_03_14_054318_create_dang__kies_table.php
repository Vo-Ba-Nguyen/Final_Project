<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangKiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_kies', function (Blueprint $table) {
            $table->id();
            $table->string("ho_va_ten");
            $table->integer("gioi_tinh");
            $table->string("email");
            $table->string("so_dien_thoai");
            $table->string("password");
            $table->string("ngay_sinh");
            $table->string("dia_chi");
            $table->integer("is_block")->default(0);
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
        Schema::dropIfExists('dang__kies');
    }
}
