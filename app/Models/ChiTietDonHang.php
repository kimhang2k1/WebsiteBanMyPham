<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = [
        'IDDonHang',
        'IDSanPham',
        'IDMau',
        'SoLuong',
        'GiaSP',
        'ThanhTien',
    ];
    public static function create(
        $IDDonHang,
        $IDSanPham,
        $IDMau,
        $SoLuong,
        $GiaSP,
        $ThanhTien
    ) {
        $cart= new ChiTietDonHang();
        $cart->IDDonHang = $IDDonHang;
        $cart->IDSanPham = $IDSanPham;
        $cart->IDMau = $IDMau;
        $cart->SoLuong = $SoLuong;
        $cart->GiaSP= $GiaSP;
        $cart->ThanhTIen = $ThanhTien;
        $cart->save();
    }
    public $timestamps = false;
}
