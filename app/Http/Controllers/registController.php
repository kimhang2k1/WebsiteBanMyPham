<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;


class registController extends Controller
{
   public function creatAccount(Request $request ) {
      KhachHang::create(
         $request->name_user,
         $request->address,
         $request->phone,
         $request->email,
         $request->password
     );
     redirect('dangnhap'); 
   }
   public function view() {
      return view('regist');
   }
}
