<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Validator;

class registController extends Controller
{
   public function creatAccount(Request $request ) {
     $validator =  Validator::make($request->all(),[
         'name_user' => array('required'),     
         'email' =>array('required','email', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@gmail.com$/'),
         'password' => array('required','min:6')


      ], $message = 
      [
         'name_user.required' => 'Họ tên không được để trống!!',
         'email.required' =>'Email không được để trống',
         'email.regex' => 'Email không đúng định dạng',
         'email.email'=> 'Email đã có người sử dụng',
         'password.required' => 'Mật khẩu không được để trống',
         'password.min' => 'Mật khẩu ít nhất 6 ký tự'
      ]);
      if ($validator->fails()) {
         $errors = $validator->errors();
          return view('regist')->withErrors($errors)->with('register', $request->all());
       }
       else {
      KhachHang::create(
         $request->name_user,
         $request->email,
         md5($request->password)
     );
     return redirect()->to('dangnhap')->send();
   }
    
     
   }
   public function view() {
      return view('regist');
   }
}
