<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = "donhang";
    protected $fillable = [
        'IDKhachHang',
        'NgayDatHang',
        'NgayGiaoHang',
        'IDDiaChi',
        'TrangThai'
    ];
    public static function create(
        $IDKhachHang,
        $NgayDatHang,
        $NgayGiaoHang,
        $IDDiaChi,
        $TrangThai
    ) {
        $order= new DonHang();
        $order->IDKhachHang = $IDKhachHang;
        $order->NgayDatHang = $NgayDatHang;
        $order->NgayGiaoHang = $NgayGiaoHang;
        $order->IDDiaChi = $IDDiaChi;
        $order->TrangThai = $TrangThai;
        $order->save();
    }
    public $timestamps = false;

}
