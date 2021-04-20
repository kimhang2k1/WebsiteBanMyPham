<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use App\Models\Giohang;
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
        DiaChi::create($id, $request->HoTen,NULL, $request->IDXa, $request->IDQuan, $request->IDThanhPho,
         $request->phone, $request->SoNha, NULL);
        $diaChi = DB::table('donhang')->leftJOIN('tinhthanhpho', 'donhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
         ->leftJOIN('quanhuyen', 'donhang.IDQuan','=','quanhuyen.IDQuan')
         ->leftJOIN('xa', 'donhang.IDXa','=','xa.IDXa')->where('IDKhachHang', '=',$id)->get();
        return response()->json([
        'view' => "" . view('component/delivery-address')->with('diaChi', $diaChi)]);
 
        }
    }

    public function getDiaChiDefault(Request $request) {
        $addressDefault = DB::table('donhang')->leftJOIN('tinhthanhpho', 'donhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
         ->leftJOIN('quanhuyen', 'donhang.IDQuan','=','quanhuyen.IDQuan')
         ->leftJOIN('xa', 'donhang.IDXa','=','xa.IDXa')->where('IDDonHang', '=',$request->IDDonHang)->get();
         Session::put('addressDefault', $addressDefault);
       return view('component/addressCustomer')->with('addressDefault', $addressDefault);

      
    }
}
