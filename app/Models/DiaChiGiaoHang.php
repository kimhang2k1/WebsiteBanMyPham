<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiGiaoHang extends Model
{
    use HasFactory;
    protected $table = "diachigiaohang";
    protected $fillable = [
        'ID',
        'IDKhachHang', 
        'TrangThai'

    ];
    public static function create(
        $ID,
        $IDKhachHang,
        $TrangThai
    ) {
        $diaChiGiaoHang= new DiaChiGiaoHang();
        $diaChiGiaoHang->ID = $ID;
        $diaChiGiaoHang->IDKhachHang = $IDKhachHang;
        $diaChiGiaoHang->TrangThai = $TrangThai;
        $diaChiGiaoHang->save();
    }
    public $timestamps = false;

}
