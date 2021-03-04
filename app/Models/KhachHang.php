<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $fillable = [
        'TenKhachHang',
        'DiaChi',
        'SDT',
        'Email',
        'MatKhau',
    ];
    public static function create(
        $TenKH,
        $DiaChi,
        $SoDienThoai,
        $Email,
        $MatKhau
    ) {
        $kh= new KhachHang();
        $kh->TenKhachHang = $TenKH;
        $kh->DiaChi = $DiaChi;
        $kh->SDT = $SoDienThoai;
        $kh->Email = $Email;
        $kh->MatKhau = $MatKhau;
        $kh->save();
    }
    public $timestamps = false;



}
