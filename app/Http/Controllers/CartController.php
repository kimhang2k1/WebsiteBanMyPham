<?php

namespace App\Http\Controllers;

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
        Session::forget('product-pay');
       
        }
        
        
        
        $quan = DB::table('quan/huyen')->where('IDThanhPho','=', NULL)->get();
        $thanhPho = DB::table('tinh/thanhpho')->get();
        $xa = DB::table('xa')->where('IDQuan','=',NULL)->get();

        return view('pay')->with('order', $newArray)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan);
       }
            
    }

    public function getQuanHuyen(Request $request) {

            $huyen = DB::table('quan/huyen')->where('IDThanhPho', '=', $request->id)->get();
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
