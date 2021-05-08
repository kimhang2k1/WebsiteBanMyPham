<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProcessLoginController extends Controller
{
    public function getLogin(Request $request) {
        $account = DB::table('admin')->where('TenDangNhap', '=', $request->username)->where('MatKhau', '=', $request->pass)->get();
 
        if(count($account) == 0) {
            return redirect()->to('/admin/login')->send();
        }
        else {
            Session::put('account', $account);
            return redirect()->to('/admin/home')->send()->with('acc');
        }
     }
}
