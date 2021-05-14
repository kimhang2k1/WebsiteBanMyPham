<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\Product;
use App\Models\ThongTinKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function getInfor(Request $request) {
        $product = DB::table('sanpham')
        ->select(DB::raw(' DISTINCT mausanpham.IDMau,sanpham.IDSanPham, TenSanPham, GiaSP,TenNhom,TenMau, sanpham.HinhAnh, TenThuongHieu,NgaySanXuat, NgayHetHan'))
        ->JOIN('nhomsanpham', 'sanpham.IDNhomSP','nhomsanpham.IDNhomSP')
        ->leftJOIN('sanphamchitiet', 'sanphamchitiet.IDSanPham','sanpham.IDSanPham')
        ->leftJOIN('mausanpham', 'sanphamchitiet.IDMau','mausanpham.IDMau')
        ->JOIN('thuonghieu', 'sanpham.IDThuongHieu','thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();


          $all_product = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->limit(1)->get();
        // select dữ liệu cho quản lí đơn hàng
        $order = DonHang::select(DB::raw('donhang.IDDonHang, HoTen, SDT, TenSanPham, TenMau, SoLuong, NgayDatHang, NgayGiaoHang, SoNha, TenThanhPho, TenQuan, TenXa'))
        ->leftJOIN('diachigiaohang', 'diachigiaohang.IDDiaChi', 'donhang.IDDiaChi')
        ->JOIN('chitietdonhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
        ->leftJOIN('thongtinkhachhang', 'thongtinkhachhang.ID', 'donhang.IDDiaChi')
        ->leftJOIN('sanpham', 'sanpham.IDSanPham', 'chitietdonhang.IDSanPham')
        ->leftJOIN('mausanpham', 'mausanpham.IDMau', 'chitietdonhang.IDMau')
        ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
             ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
             ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();

        // lấy dữ liệu cho bảng quản lí tài khoản
        $acc = KhachHang::get();

        //lấy dữ liệu cho bảng quản lý khách hàng
        $customer = ThongTinKhachHang::leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
        ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
        ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();


        //lấy dữ liệu cho bảng quản lí danh mục sản phẩm
        $category = DB::table('nhomsanpham')->get();

        //đếm số lượng sản phẩm
        $countProduct = DB::table('sanpham')
        ->JOIN('nhomsanpham', 'sanpham.IDNhomSP','nhomsanpham.IDNhomSP')
        ->leftJOIN('sanphamchitiet', 'sanphamchitiet.IDSanPham','sanpham.IDSanPham')
        ->leftJOIN('mausanpham', 'sanphamchitiet.IDMau','mausanpham.IDMau')
        ->JOIN('thuonghieu', 'sanpham.IDThuongHieu','thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();
        
        // tổng doanh thu trong ngày 
        $currentDateTime = date('Y-m-d H:i:s');
        $totalDate = DB::table('chitietdonhang')->JOIN('donhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
        ->where('NgayDatHang', '=', $currentDateTime)
        ->sum('ThanhTien');

        // tổng hóa đơn trong ngày 
        $bill = DonHang::where('NgayDatHang', '=',date('Y-m-d H:i:s'))->get();

        // đếm khách hàng
        $kh = DB::table('khachhang')->get();
        

        // lấy dữ liệu trong bảng thương hiệu
        $th = DB::table('thuonghieu')->get();

        $getProduct = Product::where('IDSanPham', '=', $request->IDSanPham)->get();

        return view('admin/home')->with('product', $product)->with('order', $order)->with('acc', $acc)->with('customer', $customer)
        ->with('category', $category)->with('countProduct', $countProduct)->with('totalDate', $totalDate)->with('bill', $bill)
        ->with('kh', $kh)->with('all_product', $all_product)->with('th', $th )->with('getProduct', $getProduct);
    }
}
