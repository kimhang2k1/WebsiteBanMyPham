<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
    public function getProduct() {
        $product = DB::table('sanpham')
        ->select(DB::raw(' DISTINCT mausanpham.IDMau,sanpham.IDSanPham, TenSanPham, GiaSP,TenNhom,TenMau, sanpham.HinhAnh, TenThuongHieu,NgaySanXuat, NgayHetHan'))
        ->JOIN('nhomsanpham', 'sanpham.IDNhomSP','nhomsanpham.IDNhomSP')
        ->leftJOIN('sanphamchitiet', 'sanphamchitiet.IDSanPham','sanpham.IDSanPham')
        ->leftJOIN('mausanpham', 'sanphamchitiet.IDMau','mausanpham.IDMau')
        ->JOIN('thuonghieu', 'sanpham.IDThuongHieu','thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();
        return view('admin/home')->with('product', $product);
    }
}
