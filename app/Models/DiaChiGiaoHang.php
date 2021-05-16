<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiGiaoHang extends Model
{
    use HasFactory;
    protected $table = "diachigiaohang";
    protected $fillable = [
        'IDDiaChi',
        'IDKhachHang', 
        'TrangThai'

    ];
    public static function create(
        $IDDiaChi,
        $IDKhachHang,
        $TrangThai
    ) {
        $diaChiGiaoHang= new DiaChiGiaoHang();
        $diaChiGiaoHang->IDDiaChi = $IDDiaChi;
        $diaChiGiaoHang->IDKhachHang = $IDKhachHang;
        $diaChiGiaoHang->TrangThai = $TrangThai;
        $diaChiGiaoHang->save();
    }
    public $timestamps = false;

}
