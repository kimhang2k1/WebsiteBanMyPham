<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "sanpham";
    protected $fillable = [
        'IDSanPham',
        'TenSanPham',
        'HinhAnh',
        'GiaSP',
        'IDNhomSP',
        'IDThuongHieu',
        'MoTa',
        'NgaySanXuat',
        'NgayHetHan',
        'TrongLuong'
    ];
    public static function create(
        $IDSanPham,
        $TenSanPham,
        $HinhAnh,
        $GiaSP,
        $IDNhomSP,
        $IDThuongHieu,
        $MoTa,
        $NgaySanXuat,
        $NgayHetHan,
        $TrongLuong,
    ) {
        $pro= new Product();
        $pro->IDSanPham = $IDSanPham;
        $pro->TenSanPham = $TenSanPham;
        $pro->HinhAnh = $HinhAnh;
        $pro->GiaSP = $GiaSP;
        $pro->IDNhomSP = $IDNhomSP;
        $pro->IDThuongHieu = $IDThuongHieu;
        $pro->MoTa = $MoTa;
        $pro->NgaySanXuat = $NgaySanXuat;
        $pro->NgayHetHan = $NgayHetHan;
        $pro->TrongLuong = $TrongLuong;
        $pro->save();
    }
    public $timestamps = false;
}
