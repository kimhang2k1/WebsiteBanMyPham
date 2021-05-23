<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessOrderManagemnet extends Controller
{
    public function getSearchOrder(Request $request) {
        if($request->IDDonHang == NULL) {
            $order = DonHang::select(DB::raw('donhang.IDDonHang, HoTen, SDT, TenSanPham, TenMau, chitietdonhang.SoLuong, NgayDatHang, NgayGiaoHang, donhang.TrangThai,SoNha, TenThanhPho, TenQuan, TenXa'))
            ->leftJOIN('diachigiaohang', 'diachigiaohang.IDDiaChi', 'donhang.IDDiaChi')
            ->JOIN('chitietdonhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
            ->leftJOIN('thongtinkhachhang', 'thongtinkhachhang.ID', 'donhang.IDDiaChi')
            ->leftJOIN('sanpham', 'sanpham.IDSanPham', 'chitietdonhang.IDSanPham')
            ->leftJOIN('mausanpham', 'mausanpham.IDMau', 'chitietdonhang.IDMau')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->get();
            return view('/admin/component/OrderManagement')->with('order', $order);
        }
        else {
            $order = DonHang::select(DB::raw('donhang.IDDonHang, HoTen, SDT, TenSanPham, TenMau, chitietdonhang.SoLuong, NgayDatHang, NgayGiaoHang, donhang.TrangThai,SoNha, TenThanhPho, TenQuan, TenXa'))
            ->leftJOIN('diachigiaohang', 'diachigiaohang.IDDiaChi', 'donhang.IDDiaChi')
            ->JOIN('chitietdonhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
            ->leftJOIN('thongtinkhachhang', 'thongtinkhachhang.ID', 'donhang.IDDiaChi')
            ->leftJOIN('sanpham', 'sanpham.IDSanPham', 'chitietdonhang.IDSanPham')
            ->leftJOIN('mausanpham', 'mausanpham.IDMau', 'chitietdonhang.IDMau')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->where('donhang.IDDonHang', '=', $request->IDDonHang)->get();
            return view('/admin/component/OrderManagement')->with('order', $order);
        }
       
       

    }
}
