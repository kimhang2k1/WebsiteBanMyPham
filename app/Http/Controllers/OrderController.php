<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DiaChiGiaoHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\ThongTinKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function addOrder(Request $request) {
            $id = Session::get('user')[0]->IDKhachHang;
            $ttkh = KhachHang::where('IDKhachHang', '=', $id)->get();
            $dh = DiaChiGiaoHang::where('IDKhachHang', '=', $id)->get();
            $dc = ThongTinKhachHang::whereRaw("IDKhachHang = '".$id."' and not ID = '".$dh[0]->ID."'")->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();

            $diaChi = DiaChiGiaoHang::where('diachigiaohang.IDKhachHang', '=', $id)->JOIN('thongtinkhachhang', 'diachigiaohang.ID', '=', 'thongtinkhachhang.ID')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();
            $quan = DB::table('quanhuyen')->get();
            $thanhPho = DB::table('tinhthanhpho')->get();
            $xa = DB::table('xa')->get();
    
            $input = ThongTinKhachHang::where('IDKhachHang', '=', $id)->where('ID', '=', $request->id)->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get(); 
    
            $bill = DonHang::where('IDKhachHang', '=', $id)->groupBy('chitietdonhang.IDDonHang')->JOIN('chitietdonhang', 'donhang.IDDonHang','=', 'chitietdonhang.IDDonHang')
            ->JOIN('sanpham', 'chitietdonhang.IDSanPham', '=','sanpham.IDSanPham')->leftJOIN('mausanpham', 'mausanpham.IDMau', '=', 'chitietdonhang.IDMau')
            ->get();
            
            $currentDateTime = date('Y-m-d H:i:s');
            $order = DB::select("SELECT IDDonHang FROM donhang ORDER BY IDDonHang DESC");
            $IDDiaChiGiaoHang = Session::get('diaChiGiaoHang')[0]->ID;
            if(count($order) > 0) {
                $string = $order[0]->IDDonHang;
                $data = explode('DELTA',$string);
                $number = $data[1];
                $number++;
                DonHang::create('DELTA'.$number,$id,$currentDateTime, NULL, $IDDiaChiGiaoHang, NULL);
            }
            else {
                $string = "DELTA1000000";
                $data = explode('DELTA',$string);
                $number = $data[1];
                $number++;
                DonHang::create('DELTA'.$number,$id,$currentDateTime, NULL, $IDDiaChiGiaoHang, NULL);
            }
           
                
            $product_order = Session::get('order-product');
            if (count($product_order) > 0) {
                foreach ($product_order as $key => $value) {
                $newArray[$key] = DB::table('giohang')->leftJoin('mausanpham', 'mausanpham.IDMau', 'giohang.IDMau')
                ->JOIN('sanpham', 'giohang.IDSanPham', 'sanpham.IDSanPham')
                ->where('IDKhachHang', '=', $id)
                ->where('giohang.STT','=', $value)
                ->get()[0];
                $dh = DB::table('donhang')->select(DB::raw('IDDonHang'))->where('IDKhachHang', '=', $id)->orderBy('IDDonHang', 'DESC')->limit(1)->get();
                    ChiTietDonHang::create($dh[0]->IDDonHang,$newArray[$key]->IDSanPham, $newArray[$key]->IDMau, $newArray[$key]->SoLuong,
                    $newArray[$key]->GiaSP, $newArray[$key]->GiaSP * $newArray[$key]->SoLuong);
                
                    DB::table('giohang')
                    ->where('IDKhachHang', '=', $id)
                    ->where('giohang.STT','=', $value)
                    ->delete();
                }
                return view('profile-customer')->with('ttkh', $ttkh)->with('dc', $dc)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan)
                ->with('diaChi', $diaChi)->with('input', $input)->with('bill', $bill);
            
            }
        }
       
    }

