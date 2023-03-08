<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonNhapKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->string("id_don_hang");
            $table->string("hash_code");
            $table->double("tong_tien")->nullable();
            $table->integer("tong_so_luong_san_pham")->nullable();
            $table->integer("tinh_trang_thanh_toan")->default(0);
            $table->integer("hinh_thuc_thanh_toan")->nullable();;
            $table->integer("is_nhap_kho")->default(0);
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
        Schema::dropIfExists('hoa__don__nhap__khos');
    }
}
