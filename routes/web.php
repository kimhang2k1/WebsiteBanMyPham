<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Giohang;
use Illuminate\Support\Facades\Route;
use App\Models\KhachHang;
use App\Models\ProductGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Sesion;
use App\Providers\AppServiceProvider;
use Auth;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\DiaChi;

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
    $product = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->get();
    return view('index')->with('product',$product);
});

Route::post('/xulidangki',[registController::class, 'creatAccount']);

Route::get('/dangkytaikhoan', [registController::class, 'view']);


Route::get('/dangnhap', function(){
    return view('login');
}); 

Route::post('/xulydangnhap', [loginController::class , 'loginAccount']);

Route::get('/dangxuat',function() {
    Session::flush();
    return redirect()->to("trangchu");
});
Route::get('/loai-dia-chi', function(){
   
});
Route::get('/sanpham',function() {
    $thuongHieu = DB::table('thuonghieu')->whereRaw(" not IDThuongHieu = 'TH00013' ")->get();
    $product = DB::table('sanpham')->get();
    $likeProduct = DB::table('sanpham')->limit(2)->get();

    return view('product')->with('productbyId',$product)->with('thuongHieu', $thuongHieu)->with('like', $likeProduct);
});
Route::get('/sanpham/{id}', [productController::class, 'getSanPhambyID']);

Route::get('/gioithieu', function(){
    return view('about-us');
});

Route::get('sanpham/thongtinsanpham/{idSanPham}&&{idNSP}',[productController::class, 'getSanPhamChiTiet']);


Route::get('sanphamsapxep', [productController::class, 'sapXepGia']);

Route::get('sanphamtheothuonghieu', [productController::class, 'getSanPhambyThuongHieu']);

Route::get('gio-hang', function(Request $request) {

    $id = Session::get('user')[0]->IDKhachHang;
    $cart = DB::table('giohang')->JOIN('sanpham', 'giohang.IDSanPham', '=', 'sanpham.IDSanPham')
    ->leftJoin('mausanpham', 'mausanpham.IDMau', '=', 'giohang.IDMau')->where('IDKhachHang', '=', Session::get('user')[0]->IDKhachHang)->get();
    return view('cart')->with('cart', $cart);
});


Route::get('/checkout-page', [CartController::class, 'getProductInCart']);

Route::get('them-vao-gio-hang', function(Request $request) {
    if (session()->has('user')) {
     $id = Session::get('user')[0]->IDKhachHang;
     if( isset($request->IDMau))  {
        $cart =  Giohang::where('giohang.IDSanPham','=',$request->IDSanPham)
         ->where('giohang.IDMau','=',$request->IDMau)->where('IDKhachHang','=',$id)->get();
         if (count($cart) <= 0) {
            
            Giohang::create($id,NULL,$request->IDSanPham, $request->IDMau,$request->SoLuong);
            $cart = DB::table('giohang')->JOIN('sanpham', 'giohang.IDSanPham', '=', 'sanpham.IDSanPham')
            ->WHERE('IDKhachHang', '=',$id )->where('IDMau', '=', $request->IDMau)->get();
            return response()->json([
                'view' => "" .  view('component/item-cart')->with('gh',$cart[0]),
                'num' => count(Giohang::where('IDKhachHang','=',$id)->get())
            ]);
         }
         else {
            DB::update("update giohang set SoLuong = '".$request->SoLuong."' + SoLuong where IDSanPham = '".$request->IDSanPham."' and IDMau = '".$request->IDMau."' and IDKhachHang = '".$id."'");
         }
         
     }
     else {
        $cart =  Giohang::where('giohang.IDSanPham','=',$request->IDSanPham)->where('IDKhachHang','=',$id)
        ->get();
        if (count($cart) <= 0) {
            Giohang::create($id,NULL,$request->IDSanPham, $request->IDMau,$request->SoLuong);
            $cart = DB::table('giohang')->JOIN('sanpham', 'giohang.IDSanPham', '=', 'sanpham.IDSanPham')
            ->WHERE('IDKhachHang', '=',$id )->where('giohang.IDsanPham', '=', $request->IDSanPham)->get();
            return response()->json([
                'view' => "" .  view('component/item-cart')->with('gh',$cart[0]),
                'num' => count(Giohang::where('IDKhachHang','=',$id)->get())
            ]);
        }
        
        else {
            DB::update("update giohang set SoLuong = '".$request->SoLuong."' + SoLuong where IDSanPham = '".$request->IDSanPham."' and IDKhachHang = '".$id."'");
        }
        
       }
     }
});

Route::get('/xoa-gio-hang', function(Request $request) {
    if (session()->has('user')) {

        $id = Session::get('user')[0]->IDKhachHang;
        if( isset($request->IDMau))  {
            $num = Giohang::where('IDKhachHang','=',$id)->get();
            if (count($num) <= 1) 
            {
                DB::table('giohang')->where('IDKhachHang','=', $id)->where('IDSanPham','=', $request->IDSanPham )->where('IDMau','=',$request->IDMau)->delete();
                return view('component/not-cart');
            }   
            else { 
                DB::table('giohang')->where('IDKhachHang','=', $id)->where('IDSanPham','=', $request->IDSanPham )->where('IDMau','=',$request->IDMau)->delete();
            return '';    
        }
        }
        else {
            $num = Giohang::where('IDKhachHang','=',$id)->get();
            if (count($num) <= 1) 
            {
                DB::table('giohang')->where('IDKhachHang','=', $id)->where('IDSanPham','=', $request->IDSanPham )->delete();
                return view('component/not-cart');
            }   
            else { 
                DB::table('giohang')->where('IDKhachHang','=', $id)->where('IDSanPham','=', $request->IDSanPham )->delete();
            return '';    
        }
        
          }
        }
});

Route::get('/load-thanh-pho', [CartController::class, 'getQuanHuyen'] );
Route::get('/load-xa', [CartController::class, 'getXa']);

Route::get("them-san-pham-thanh-toan",function(Request $request){
    Session::forget('product-pay');
    if (session()->has('product-pay')) {
        $product_pay = Session::get('product-pay');
        $product_pay[$request->id] = $request->id;
        Session::put('product-pay',$product_pay);

    }
    else {
        $product_pay = array();
        $product_pay[$request->id] = $request->id;
        Session::put('product-pay',$product_pay);
    }
    return json_encode(Session::get('product-pay'));
});
Route::get("xoa-san-pham-thanh-toan",function(Request $request){
    if (session()->has('product-pay')) {
        $product_pay = Session::get('product-pay');
        foreach ($product_pay as $key => $value) {
            if ($value == $request->id) 
                unset($product_pay[$key]);
        }
        if (count($product_pay) > 0) 
        Session::forget('product-pay');
        else 
        Session::forget('product-pay');
    }
});

Route::get('sua-so-luong-san-pham', function(Request $request) {
    $id = Session::get('user')[0]->IDKhachHang;
    DB::update("update giohang set SoLuong = ?  where IDKhachHang = ? and STT = ? ",[$request->num,$id,$request->STT]);   
});

Route::get('them-dia-chi-giao-hang', [XuLiAdressController::class, 'addDiaChi']); 

Route::get('get-address', [XuLiAdressController::class, 'getDiaChiDefault']);

Route::get('/profile', function() {
    return view('profile-customer');
});

Route::get('/edit-profile', function() {
    return view('/component/edit-profile');
});

Route::get('xu-li-don-dat-hang', [OrderController::class, 'addOrder']);
