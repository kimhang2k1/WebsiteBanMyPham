<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminat\Http\Request;
use App\Models\KhachHang;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/trangchu',function() {
    $product = DB::table('sanpham')->get();
    return view('index')->with('product',$product);
});

Route::post('/xilidangki',[registController::class, 'creatAccount']);

Route::get('/dangkytaikhoan', [registController::class, 'view']);


Route::get('/dangnhap', function(){
    return view('login');
}); 

Route::post('/dangnhap', [loginController::class , 'loginAccount'])->name('login');

