<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    use HasFactory;
    protected $table = "donhang";
    protected $fillable = [
        'IDKhachHang',
        'HoTen',
        'NgayDatHang',
        'IDXa',
        'IDQuan',
        'IDThanhPho',
        'SDT',
        'SoNha',
        'TrangThai'
    ];
    public static function create(
        $IDKhachHang,
        $HoTen,
        $NgayDatHang,
        $IDXa,
        $IDQuan,
        $IDThanhPho,
        $SDT,
        $SoNha,
        $TrangThai
    ) {
        $address= new DiaChi();
        $address->IDKhachHang = $IDKhachHang;
        $address->HoTen = $HoTen;
        $address->NgayDatHang = $NgayDatHang;
        $address->IDXa = $IDXa;
        $address->IDQuan = $IDQuan;
        $address->IDThanhPho = $IDThanhPho;
        $address->SDT = $SDT;
        $address->SoNha = $SoNha;
        $address->TrangThai = $TrangThai;
        $address->save();
    }
    public $timestamps = false;

}
