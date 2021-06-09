<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function loginAccount(Request $request) {
      $email = $request->email;
      $password = $request->password;
    
     
      $data = DB::table('khachhang')->where('Email', '=', $email)
      ->where('MatKhau', '=',md5($password))->get();

      if (count($data) == 0) {
        return redirect()->to('dangnhap')->send()->with('account', $data);
    }
      else 
      {
        Session::put('user',$data);
        return redirect()->to('trangchu')->send();
      }
         
    
  }
  
}
