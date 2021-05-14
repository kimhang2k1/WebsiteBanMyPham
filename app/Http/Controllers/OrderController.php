<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DiaChiGiaoHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\ThongTinKhachHang;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function addOrder(Request $request) {
            $id = Session::get('user')[0]->IDKhachHang;        
           $currentDateTime = date('Y-m-d H:i:s');
           $datetime = new DateTime($currentDateTime);
           $datetime->modify('+2 day');
            $order = DB::select("SELECT IDDonHang FROM donhang ORDER BY IDDonHang DESC");
            $IDDiaChiGiaoHang = Session::get('diaChiGiaoHang')[0]->IDDiaChi;
            if(count($order) > 0) {
                $string = $order[0]->IDDonHang;
                $data = explode('DELTA',$string);
                $number = $data[1];
                $number++;
                DonHang::create('DELTA'.$number,$id,$currentDateTime, $datetime->format('Y-m-d H:i:s'), $IDDiaChiGiaoHang, NULL);
            }
            else {
                $string = "DELTA1000000";
                $data = explode('DELTA',$string);
                $number = $data[1];
                $number++;
                DonHang::create('DELTA'.$number,$id,$currentDateTime, $datetime->format('Y-m-d H:i:s'), $IDDiaChiGiaoHang, NULL);
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
                return redirect()->to('profile')->send();
            
            }
        }
       
    }

