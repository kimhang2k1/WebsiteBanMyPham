<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    use HasFactory;
    protected $table = "diachi";
    protected $fillable = [
        'HoTen',
        'SDT',
        'IDThanhPho',
        'IDQuan',
        'IDXa',
        'SoNha',
        'IDKhachHang'
    ];
    public static function create(
        $HoTen,
        $SDT,
        $IDThanhPho,
        $IDQuan,
        $IDXa,
        $SoNha,
        $IDKhachHang
    ) {
        $dc= new DiaChi();
        $dc->HoTen = $HoTen;
        $dc->SDT = $SDT;
        $dc->IDThanhPho = $IDThanhPho;
        $dc->IDQuan = $IDQuan;
        $dc->IDXa = $IDXa;
        $dc->SoNha = $SoNha;
        $dc->IDKhachHang = $IDKhachHang;
        $dc->save();
    }
    public $timestamps = false;

}
