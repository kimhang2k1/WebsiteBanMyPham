<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThuongHieuController extends Controller
{
    public function getThuongHieu() {
        
        return view('product');
    }
}
