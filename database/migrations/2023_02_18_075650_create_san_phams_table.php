<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string("ten_san_pham");
            $table->string("slug_san_pham");
            $table->integer("id_danh_muc_con");
            $table->integer("id_hang");
            $table->string("mo_ta");
            $table->integer("gia_ban");
            $table->integer("gia_khuyen_mai");
            $table->string("hinh_anh");
            $table->integer("so_luong");
            $table->integer("is_open");
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
        Schema::dropIfExists('san_phams');
    }
}
