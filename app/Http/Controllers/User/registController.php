<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class registController extends Controller
{
   public function creatAccount(Request $request)
   {
      $validator =  Validator::make($request->all(), [
         'email' => array('required', 'email', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@gmail.com$/'),
         'password' => array('required', 'min:6'),
         'password_clone' => array('required', 'same:password')


      ], $message =
         [
            'email.required' => 'Email không được để trống',
            'email.regex' => 'Email không đúng định dạng',
            'email.email' => 'Email đã có người sử dụng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password_clone.required' => 'Mật khẩu không được để trống',
            'password_clone.same' => 'Mật khẩu không được đúng vui lòng nhập lại'
            

         ]);
      if ($validator->fails()) {
         $errors = $validator->errors();
         return view('regist')->withErrors($errors)->with('register', $request->all());
      } else {
         if (md5($request->password) !=  md5($request->password_clone)) {
            return redirect()->to('dangkytaikhoan');
         } else {
            $kh = DB::select('SELECT IDKhachHang FROM khachhang ORDER BY IDKhachHang DESC');
            if (count($kh) > 0) {
               $string = $kh[0]->IDKhachHang;
               $customer = explode('KH', $string);
               $number = $customer[1];
               $number++;
               KhachHang::create(
                  'KH' . $number,
                  $request->email,
                  md5($request->password)
               );
               return redirect()->to('dangnhap')->send();
            } else {
               $string = "KH1000000";
               $customer = explode('KH', $string);
               $number = $customer[1];
               $number++;
               KhachHang::create(
                  'KH' . $number,
                  $request->email,
                  md5($request->password)
               );
               return redirect()->to('dangnhap')->send();
            }
         }
      }
   }
   public function view()
   {
      return view('User/regist');
   }
}
