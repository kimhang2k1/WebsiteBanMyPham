<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function addOrder() {
        $idDonHang = Session::get('donhang')[0]->IDDonHang;
        $id = Session::get('user')[0]->IDKhachHang;
        $product_pay = session()->has('product-pay') ? Session::get('product-pay') : array();
        if (count($product_pay) > 0) {
            $newArray = array();
            foreach ($product_pay as $key => $value) {
            $newArray[$key] = DB::table('giohang')->leftJoin('mausanpham', 'mausanpham.IDMau', 'giohang.IDMau')
            ->JOIN('sanpham', 'giohang.IDSanPham', 'sanpham.IDSanPham')
            ->where('IDKhachHang', '=', $id)
            ->where('giohang.STT','=', $value)
            ->get()[0];
            
            ChiTietDonHang::create($idDonHang,$newArray[$key]->IDSanPham, $newArray[$key]->IDMau, $newArray[$key]->SoLuong,
                $newArray[$key]->GiaSP, $newArray[$key]->GiaSP * $newArray[$key]->SoLuong);
                
            }
        }
        else {

        }
    }
}
