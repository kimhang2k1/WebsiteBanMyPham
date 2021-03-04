<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function loginAccount(Request $request) {
      $email = $request->email;
      $password = $request->password;

      $data = khachhang::where('Email', '=', $email)->where('MatKhau', '=', $password)->get();
    
      if($data[0]->Email == $email && $data[0]->MatKhau == $pass) {
            return view('index');
      }
      else {
          return view('login');
      }
      
    }
}
