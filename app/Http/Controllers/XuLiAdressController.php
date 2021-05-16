<?php

namespace App\Http\Controllers;


use App\Models\DiaChiGiaoHang;
use App\Models\DonHang;
use App\Models\Giohang;
use App\Models\ThongTinKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class XuLiAdressController extends Controller
{
    
    public function addDiaChi(Request $request) {
         $validator = Validator::make($request->all(), [
            'HoTen' => array('required', 'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'), 
            'phone' =>array('required','regex:((09|03|07|08|05)+([0-9]{8})\b)'),
            'SoNha' => array('required')
   
         ], $message = [
            'HoTen.required' => 'Họ Tên không được để trống',
            'HoTen.regex' => 'Họ tên không đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'SoNha.required' => 'Số Nhà không được để trống'

         ]);
         if ($validator->fails()) 
            return response()->json(['error'=>$validator->errors()->all()]);
             
        else 
       
        {
          
            $id = Session::get('user')[0]->IDKhachHang;
               ThongTinKhachHang::create($request->HoTen, $request->phone, $request->IDThanhPho, $request->IDQuan, $request->IDXa, $request->SoNha, $id);
                $diaChi = DB::table('thongtinkhachhang')->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
                ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
                ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->where('IDKhachHang', '=',$id)->get();
              
            return response()->json([
                'view' => "" . view('component/delivery-address')->with('diaChi', $diaChi)]);
            }
            
           
        
    
      
 
        
    
}
    public function getDiaChiDefault(Request $request) {
         $id = Session::get('user')[0]->IDKhachHang;
         $dcGiaoHang = DiaChiGiaoHang::where('IDKhachHang', '=', $id)->get();
        if(count($dcGiaoHang) > 0)  
        {
            DB::update("update diachigiaohang set IDDiaChi = ?, TrangThai = 'Mặc Định'  where IDKhachHang = ? ",[$request->ID,$id]); 
            $diaChiGiaoHang = DB::table('diachigiaohang')->JOIN('thongtinkhachhang', 'thongtinkhachhang.ID','=', 'diachigiaohang.IDDiaChi')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')
            ->where('diachigiaohang.IDKhachHang', '=',$id)->get();  
        
           return view('component/addressCustomer')->with('diaChiGiaoHang', $diaChiGiaoHang);
        }
        else {
            DiaChiGiaoHang::create($request->ID, $id, 'Mặc Định'); 

            $diaChiGiaoHang = DB::table('diachigiaohang')->JOIN('thongtinkhachhang', 'thongtinkhachhang.ID','=', 'diachigiaohang.IDDiaChi')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')
            ->where('diachigiaohang.IDKhachHang', '=',$id)->get();  
        
        return view('component/addressCustomer')->with('diaChiGiaoHang', $diaChiGiaoHang);
        }
          
        
               
    
       
      
    }
}
