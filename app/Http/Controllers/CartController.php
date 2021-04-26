<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use App\Models\DiaChiGiaoHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use App\Models\Giohang;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
  
    public function getProductInCart(Request $request) {
       
        $id = Session::get('user')[0]->IDKhachHang;
        $product_pay = session()->has('product-pay') ? Session::get('product-pay') : array();
        Session::forget('product-pay');
        if (count($product_pay) > 0) {
            $newArray = array();
            foreach ($product_pay as $key => $value) {
                $newArray[$key] = DB::table('giohang')->leftJoin('mausanpham', 'mausanpham.IDMau', 'giohang.IDMau')
                ->JOIN('sanpham', 'giohang.IDSanPham', 'sanpham.IDSanPham')
                ->where('IDKhachHang', '=', $id)
                ->where('giohang.STT','=', $value)
                ->get()[0];
            }
           
          
            $diaChi = DB::table('thongtinkhachhang')->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
             ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
             ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->where('IDKhachHang', '=',$id)->get();
    
             $quan = DB::table('quanhuyen')->where('IDThanhPho','=', NULL)->get();

             $thanhPho = DB::table('tinhthanhpho')->get();

             $xa = DB::table('xa')->where('IDQuan','=',NULL)->get();

             $diaChiGiaoHang = DB::table('diachigiaohang')->JOIN('thongtinkhachhang', 'thongtinkhachhang.ID','=', 'diachigiaohang.ID')
             ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
             ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
             ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')
             ->where('diachigiaohang.IDKhachHang', '=',$id)->get();
             Session::put('diaChiGiaoHang', $diaChiGiaoHang);
             
            
             return view('pay')->with('order', $newArray)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan)
             ->with('diaChi', $diaChi)->with('diaChiGiaoHang', $diaChiGiaoHang);
        }
           
    }

    public function getQuanHuyen(Request $request) {

            $huyen = DB::table('quanhuyen')->where('IDThanhPho', '=', $request->id)->get();
            $view = "";
        
            foreach ($huyen as $key => $value) {
                $view .= '<option value="'. $value->IDQuan . '">' . $value->TenQuan. '</option>';
              }
            return $view;
        
    }
    public function getXa(Request $request) {

        $xa = DB::table('xa')->where('IDQuan', '=', $request->id)->get();
        $view = "";
        foreach ($xa as $key => $value) {
            $view .= '<option value="'. $value->IDXa . '">' . $value->TenXa. '</option>';
        }
        return $view;
    
}
    

}
