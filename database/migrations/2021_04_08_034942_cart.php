<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cart extends Migration
{
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->increments('STT');
            $table->string('IDKhachHang',50)->index()->nullable();
            $table->string('Guest',50)->nullable();
            $table->string('IDSanPham',50)->index()->nullable();
            $table->integer('soLuong');
            $table->foreign('IDSanPham')->references('IDSanPham')->on('sanpham')->onDelete('cascade');
            $table->foreign('IDKhachHang')->references('IDKhachHang')->on('khachhang')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('giohang');
    }
}
