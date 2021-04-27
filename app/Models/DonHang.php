<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = "donhang";
    protected $fillable = [
        'IDDonHang',
        'IDKhachHang',
        'NgayDatHang',
        'NgayGiaoHang',
        'IDGiaoHang',
        'TrangThai'
    ];
    public static function create(
        $IDDonHang,
        $IDKhachHang,
        $NgayDatHang,
        $NgayGiaoHang,
        $IDGiaoHang,
        $TrangThai
    ) {
        $order= new DonHang();
        $order->IDDonHang = $IDDonHang;
        $order->IDKhachHang = $IDKhachHang;
        $order->NgayDatHang = $NgayDatHang;
        $order->NgayGiaoHang = $NgayGiaoHang;
        $order->IDGiaoHang = $IDGiaoHang;
        $order->TrangThai = $TrangThai;
        $order->save();
    }
    public $timestamps = false;

}
