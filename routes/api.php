<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('demo',function() {
    $id = DB::select('SELECT IDKhachHang FROM khachhang');
     $string = $id[0]->IDKhachHang;
    $data = explode('KH',$string);
    $number = $data[1];
    $number++;
    return "KH".$string;
});
