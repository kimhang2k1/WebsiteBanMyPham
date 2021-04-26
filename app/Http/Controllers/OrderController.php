<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function addOrder() {
       
        $id = Session::get('user')[0]->IDKhachHang;
        $currentDateTime = date('Y-m-d H:i:s');
        $IDDiaChiGiaoHang = Session::get('diaChiGiaoHang')[0]->ID;
        DonHang::create($id,$currentDateTime, NULL, $IDDiaChiGiaoHang, NULL);
        $product_pay = session()->has('product-pay') ? Session::get('product-pay') : array();
        if (count($product_pay) > 0) {
            $newArray = array();
            foreach ($product_pay as $key => $value) {
            $newArray[$key] = DB::table('giohang')->leftJoin('mausanpham', 'mausanpham.IDMau', 'giohang.IDMau')
            ->JOIN('sanpham', 'giohang.IDSanPham', 'sanpham.IDSanPham')
            ->where('IDKhachHang', '=', $id)
            ->where('giohang.STT','=', $value)
            ->get()[0];
            $dh = DB::select('SELECT IDDonHang FROM donhang  WHERE IDKhachHang  ORDER BY IDDonHang DESC');
            ChiTietDonHang::create($dh[0]->IDDonHang,$newArray[$key]->IDSanPham, $newArray[$key]->IDMau, $newArray[$key]->SoLuong,
                $newArray[$key]->GiaSP, $newArray[$key]->GiaSP * $newArray[$key]->SoLuong);
            }
          
        }
      
       
    }
}
