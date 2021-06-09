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
    public function getInfor(Request $request)
    {
        $product_detail = DB::table('sanphamchitiet')
            ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong,GiaNhap,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
            ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();

        $product = DB::table('sanpham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
            ->whereNotIn('IDSanPham', function ($query) {
                $query->select('IDSanPham')->from('sanphamchitiet');
            })->get();


        $all_product = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->limit(1)->get();
        // select dữ liệu cho quản lí đơn hàng
        $order = DonHang::select(DB::raw('donhang.IDDonHang, HoTen, SDT, TenSanPham, TenMau, chitietdonhang.SoLuong, NgayDatHang, NgayGiaoHang, donhang.TrangThai,SoNha, TenThanhPho, TenQuan, TenXa'))
            ->leftJOIN('diachigiaohang', 'diachigiaohang.IDDiaChi', 'donhang.IDDiaChi')
            ->JOIN('chitietdonhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
            ->leftJOIN('thongtinkhachhang', 'thongtinkhachhang.ID', 'donhang.IDDiaChi')
            ->leftJOIN('sanpham', 'sanpham.IDSanPham', 'chitietdonhang.IDSanPham')
            ->leftJOIN('mausanpham', 'mausanpham.IDMau', 'chitietdonhang.IDMau')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->get();

        // lấy dữ liệu cho bảng quản lí tài khoản
        $acc = KhachHang::get();

        //lấy dữ liệu cho bảng quản lý khách hàng
        $customer = ThongTinKhachHang::leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->get();


        //lấy dữ liệu cho bảng quản lí danh mục sản phẩm
        $category = DB::table('nhomsanpham')->get();

        //đếm số lượng sản phẩm
        $countProduct = DB::table('sanpham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->leftJOIN('sanphamchitiet', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
            ->leftJOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();


            // tổng doanh thu trong ngày 
      
        $totalDate = DB::table('chitietdonhang')->JOIN('donhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
            ->whereRaw("CAST(NgayDatHang AS DATE) = ? ", [date('Y-m-d')])
            ->sum('ThanhTien');

            $orderToday = DonHang::select(DB::raw('donhang.IDDonHang, HoTen, SDT, TenSanPham, TenMau, chitietdonhang.SoLuong, NgayDatHang,SoNha, TenThanhPho, TenQuan, TenXa'))
            ->leftJOIN('diachigiaohang', 'diachigiaohang.IDDiaChi', 'donhang.IDDiaChi')
            ->JOIN('chitietdonhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
            ->leftJOIN('thongtinkhachhang', 'thongtinkhachhang.ID', 'donhang.IDDiaChi')
            ->leftJOIN('sanpham', 'sanpham.IDSanPham', 'chitietdonhang.IDSanPham')
            ->leftJOIN('mausanpham', 'mausanpham.IDMau', 'chitietdonhang.IDMau')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->whereRaw("CAST(NgayDatHang AS DATE) = ? ", [date('Y-m-d')])->get();

        // tổng hóa đơn trong ngày 
        $billToday = DonHang::whereRaw("CAST(NgayDatHang AS DATE) = ? ", [date('Y-m-d')])->get();

        // đếm khách hàng
        $kh = DB::table('khachhang')->get();


        // lấy dữ liệu trong bảng thương hiệu
        $th = DB::table('thuonghieu')->get();

        $getProduct = Product::where('IDSanPham', '=', $request->IDSanPham)->get();

        $check = DB::table('donhang')->select(DB::raw('TrangThai, COUNT(TrangThai) as count'))->groupBy('TrangThai')->get();
        $data = [];
        foreach($check as $row) {
            $data['label'][] = $row->TrangThai;
            $data['data'][] = (int) $row->count;
          }
       


        return view('admin/home')->with('product', $product)->with('order', $order)->with('acc', $acc)->with('customer', $customer)
            ->with('category', $category)->with('countProduct', $countProduct)->with('totalDate', $totalDate)->with('bill', $billToday)
            ->with('kh', $kh)->with('all_product', $all_product)->with('th', $th)->with('getProduct', $getProduct)->with('product_detail', $product_detail)
            ->with('data', json_encode($data))->with('orderToday', $orderToday);
    }
}
