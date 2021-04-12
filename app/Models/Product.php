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
        'IDNhaCungCap',
        'MoTaSP'
    ];
}
