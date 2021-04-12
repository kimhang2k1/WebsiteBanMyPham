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
        'Email',
        'MatKhau',
    ];
    public static function create(
        $TenKH,
        $Email,
        $MatKhau
    ) {
        $kh= new KhachHang();
        $kh->TenKhachHang = $TenKH;
        $kh->Email = $Email;
        $kh->MatKhau = $MatKhau;
        $kh->save();
    }
    public $timestamps = false;



}
