<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    use HasFactory;
    protected $table = 'giohang';
    protected $fillable = [
        'STT',
        'IDKhachHang',
        'Guest',
        'IDSanPham',
        'IDMau',
        'SoLuong'
    ];
    public static function create(
        $IDKhachHang ,
        $Guest,
        $IDSanPham,
        $IDMau,
        $SoLuong
    ) {
        $gh= new Giohang();
        $gh->IDKhachHang = $IDKhachHang;
        $gh->Guest = $Guest;
        $gh->IDSanPham = $IDSanPham;
        $gh->IDMau = $IDMau;
        $gh->SoLuong = $SoLuong;
        $gh->save();
    }
    public $timestamps = false;
}