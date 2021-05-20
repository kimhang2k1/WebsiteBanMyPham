<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DiaChiGiaoHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\ThongTinKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class profileController extends Controller
{
    public function getProfile(Request $request) {
        $id = Session::get('user')[0]->IDKhachHang;
        $ttkh = KhachHang::where('IDKhachHang', '=', $id)->get();
        $dh = DiaChiGiaoHang::where('IDKhachHang', '=', $id)->get();
        $dc = ThongTinKhachHang::whereRaw("IDKhachHang = '".$id."' and not ID = '".$dh[0]->IDDiaChi."'")->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
        ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
        ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();

        $diaChi = DiaChiGiaoHang::where('diachigiaohang.IDKhachHang', '=', $id)->JOIN('thongtinkhachhang', 'diachigiaohang.IDDiaChi', '=', 'thongtinkhachhang.ID')
        ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
        ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
        ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();
        $quan = DB::table('quanhuyen')->get();
        $thanhPho = DB::table('tinhthanhpho')->get();
        $xa = DB::table('xa')->get();

        $input = ThongTinKhachHang::where('IDKhachHang', '=', $id)->where('ID', '=', $request->id)->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
        ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
        ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get(); 
        $order = DB::table('donhang')->where('IDKhachHang', '=', $id)->get();
        if(count($order) > 0) {
            foreach($order as $key =>$value) {
                    $bill = DB::table('donhang')->where('donhang.IDDonHang', '=', $order[$key]->IDDonHang)
                    ->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
                    ->JOIN('sanpham', 'chitietdonhang.IDSanPham', '=','sanpham.IDSanPham')
                    ->leftJOIN('mausanpham', 'mausanpham.IDMau', '=', 'chitietdonhang.IDMau')
                    ->get();                 
                }
             
               
                 
              
             
            
       
        return view('profile-customer')->with('ttkh', $ttkh)->with('dc', $dc)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan)
        ->with('diaChi', $diaChi)->with('input', $input)->with('bill', $bill)->with('order', $order);
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

    public function getInput(Request $request) {
        $id = Session::get('user')[0]->IDKhachHang;
        $quan = DB::table('quanhuyen')->get();
        $thanhPho = DB::table('tinhthanhpho')->get();
        $xa = DB::table('xa')->get();
        $input = ThongTinKhachHang::where('IDKhachHang', '=', $id)->where('ID', '=', $request->id)->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
        ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
        ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get(); 
        return view('component/form-edit-address')->with('input', $input)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan);
    }
    public function editAddressCustomer(Request $request) {
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
            if($request->IDThanhPho == NULL && $request->IDQuan == NULL && $request->IDXa == NULL) {
                DB::update("update thongtinkhachhang set HoTen = ?, SDT = ?, SoNha = ? where ID = ?
                and IDKhachHang = ? ", [$request->HoTen, $request->phone,$request->SoNha, $request->id, $id]);
            }
            else {
                DB::update("update thongtinkhachhang set HoTen = ?, SDT = ?, IDThanhPho = ?, IDQuan = ?, IDXa = ?, SoNha = ? where ID = ?
                and IDKhachHang = ? ", [$request->HoTen, $request->phone, $request->IDThanhPho, $request->IDQuan, 
                $request->IDXa, $request->SoNha, $request->id, $id]);
            }
            
            $quan = DB::table('quanhuyen')->get();
            $thanhPho = DB::table('tinhthanhpho')->get();
            $xa = DB::table('xa')->get();
            $dh = DiaChiGiaoHang::where('IDKhachHang', '=', $id)->get();
            $dc = ThongTinKhachHang::whereRaw("IDKhachHang = '".$id."' and not ID = '".$dh[0]->ID."'")->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();

            $diaChi = DiaChiGiaoHang::where('diachigiaohang.IDKhachHang', '=', $id)->JOIN('thongtinkhachhang', 'diachigiaohang.ID', '=', 'thongtinkhachhang.ID')
            ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
            ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();
            return response()->json([
                'view' => "" . view('component/allMyAddress')->with('dc', $dc)->with('diaChi', $diaChi)->with('thanhPho', $thanhPho)->with('xa', $xa)->with('quan', $quan)]);
        }
    }

    public function editDefaultAddress(Request $request)
    {
       $id = Session::get('user')[0]->IDKhachHang;
       DB::update("update diachigiaohang set IDDiaChi = ?  where IDKhachHang = ? ",[$request->id,$id]); 
       $dh = DiaChiGiaoHang::where('IDKhachHang', '=', $id)->get();
       $dc = ThongTinKhachHang::whereRaw("IDKhachHang = '".$id."' and not ID = '".$dh[0]->IDDiaChi."'")->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
       ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
       ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();

       $diaChi = DiaChiGiaoHang::where('diachigiaohang.IDKhachHang', '=', $id)->JOIN('thongtinkhachhang', 'diachigiaohang.IDDiaChi', '=', 'thongtinkhachhang.ID')
       ->leftJOIN('tinhthanhpho', 'thongtinkhachhang.IDThanhPho','=','tinhthanhpho.IDThanhPho')
       ->leftJOIN('quanhuyen', 'thongtinkhachhang.IDQuan','=','quanhuyen.IDQuan')
       ->leftJOIN('xa', 'thongtinkhachhang.IDXa','=','xa.IDXa')->get();
       return view('component/allMyAddress')->with('dc', $dc)->with('diaChi', $diaChi);
    }

}
