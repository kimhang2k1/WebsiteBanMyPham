<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use App\Models\Giohang;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
  
    public function getProductInCart() {
        $id = Session::get('user')[0]->IDKhachHang;
        $product_pay = Session::get('product-pay');
       if (count($product_pay) > 0) {
        $newArray = array();
        foreach ($product_pay as $key => $value) {
            $newArray[$key] = DB::table('giohang')->leftJoin('mausanpham', 'mausanpham.IDMau', 'giohang.IDMau')
            ->JOIN('sanpham', 'giohang.IDSanPham', 'sanpham.IDSanPham')
            ->where('IDKhachHang', '=', $id)
            ->where('giohang.STT','=', $value)
            ->get()[0];
        // Session::forget('product-pay');
     
        }
        $diaChi = DB::table('donhang')->leftJOIN('tinhthanhpho', 'donhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
        ->leftJOIN('quanhuyen', 'donhang.IDQuan','=','quanhuyen.IDQuan')
        ->leftJOIN('xa', 'donhang.IDXa','=','xa.IDXa')->where('IDKhachHang', '=',$id)->get();
        $quan = DB::table('quanhuyen')->where('IDThanhPho','=', NULL)->get();
        $thanhPho = DB::table('tinhthanhpho')->get();
        $xa = DB::table('xa')->where('IDQuan','=',NULL)->get();
        return view('pay')->with('order', $newArray)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan)->with('diaChi', $diaChi);
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
