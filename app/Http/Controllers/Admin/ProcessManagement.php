<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\ThongTinKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessManagement extends Controller
{
    public function getSearchAccount(Request $request) {
        if($request->IDKhachHang == NULL) {
            $acc = KhachHang::get();
            return view('/admin/component/AccountManagement')->with('acc', $acc);
        }
        else {
            $acc = KhachHang::where('IDKhachHang', '=', $request->IDKhachHang )->get();
            return view('/admin/component/AccountManagement')->with('acc', $acc);
        }
       
    }
    public function getSearchCustomer(Request $request) {
        if($request->IDKH == NULL) {
            $customer = ThongTinKhachHang::leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->get();
            return view('/admin/component/CustomerManagement')->with('customer', $customer);
        }
        else {
            $customer = ThongTinKhachHang::leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa', '=', 'xa.IDXa')->where('IDKhachHang', '=', $request->IDKH)->get();
            return view('/admin/component/CustomerManagement')->with('customer', $customer);
        }
       
       
    }
    public function getSearchCategory(Request $request) {
        if($request->id == NULL) {
            $category = DB::table('nhomsanpham')->get();
            return view('/admin/component/CategoryManagement')->with('category', $category);
        }
        else {
            $category = DB::table('nhomsanpham')->where('IDNhomSP', '=', $request->id)->get();
            return view('/admin/component/CategoryManagement')->with('category', $category);
        }
       
       
    }
}
