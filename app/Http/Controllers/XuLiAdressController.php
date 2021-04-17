<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use App\Models\Giohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class XuLiAdressController extends Controller
{
    
    public function addDiaChi(Request $request) {
        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d H:i:s');
        $id = Session::get('user')[0]->IDKhachHang;
        DiaChi::create($id, $request->HoTen, $date, $request->IDXa, $request->IDQuan, $request->IDThanhPho,
         $request->SDT, $request->SoNha, NULL);
         $diaChi = DB::table('donhang')->leftJOIN('tinhthanhpho', 'donhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
         ->leftJOIN('quanhuyen', 'donhang.IDQuan','=','quanhuyen.IDQuan')
         ->leftJOIN('xa', 'donhang.IDXa','=','xa.IDXa')->where('IDKhachHang', '=',$id)->get();
         return view('component/delivery-address')->with('diaChi', $diaChi);
    }

    public function getDiaChiKhachHang() {
        $id = Session::get('user')[0]->IDKhachHang;
        
       
    }
}
