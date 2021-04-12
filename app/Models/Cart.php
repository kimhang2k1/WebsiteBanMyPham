<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = [
        'STT',
        'IDDonHang',
        'IDSanPham',
        'SoLuong',
        'GiaSP',
        'ThanhTien',
    ];
    public static function create(
        $STT ,
        $IDDonHang,
        $IDSanPham,
        $SoLuong,
        $GiaSP,
        $ThanhTien
    ) {
        $cart= new Cart();
        $cart->STT = $STT;
        $cart->IDDonHang = $IDDonHang;
        $cart->IDSanPham = $IDSanPham;
        $cart->SoLuong = $SoLuong;
        $cart->GiaSP= $GiaSP;
        $cart->ThanhTIen = $ThanhTien;
        $cart->save();
    }
    public $timestamps = false;
}
