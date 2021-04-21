<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use App\Models\DonHang;
use App\Models\Giohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Type\NullType;

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
            if($id == NULL) {
                DonHang::create($id,NULL, NULL,NULL, NULL);
            }
           
                DiaChi::create($request->HoTen, $request->phone, $request->IDThanhPho, $request->IDQuan, $request->IDXa, $request->SoNha, $id);
            $diaChi = DB::table('diachi')->leftJOIN('tinhthanhpho', 'diachi.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachi.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachi.IDXa','=','xa.IDXa')->where('IDKhachHang', '=',$id)->get();
              
            return response()->json([
                'view' => "" . view('component/delivery-address')->with('diaChi', $diaChi)]);
            }
            
           
        
    
      
 
        
    
}
    public function getDiaChiDefault(Request $request) {
         $id = Session::get('user')[0]->IDKhachHang;

            DB::update("update donhang set IDDiaChi = ?  where IDKhachHang = ? ",[$request->IDDiaChi,$id]); 
            $donhang = DB::table('donhang')->JOIN('diachi', 'diachi.IDDiaChi','=', 'donhang.IDDiaChi')
            ->leftJOIN('tinhthanhpho', 'diachi.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachi.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachi.IDXa','=','xa.IDXa')
            ->where('donhang.IDKhachHang', '=',$id)->get();
            return view('component/addressCustomer')->with('donhang', $donhang);
    
       
      
    }
}
