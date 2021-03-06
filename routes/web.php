<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\AllProductController;
use App\Http\Controllers\User;
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
use App\Models\DiaChiGiaoHang;
use App\Models\ThongTinKhachHang;

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
    $product_1 = DB::table('sanpham')->get();
    $category = DB::table('nhomsanpham')->limit(4)->get();
    return view('User/index')->with('product',$product)->with('product_1', $product_1)->with('category', $category);
});

Route::post('/xulidangki',[User\registController::class, 'creatAccount']);

Route::get('/dangkytaikhoan', [User\registController::class, 'view']);


Route::get('/dangnhap', function(){
    return view('User/login');
}); 

Route::post('/xulydangnhap', [User\loginController::class , 'loginAccount']);

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

    return view('User/product')->with('productbyId',$product)->with('thuongHieu', $thuongHieu)->with('like', $likeProduct);
});
Route::get('/sanpham/{id}', [User\productController::class, 'getSanPhambyID']);

Route::get('/gioithieu', function(){
    return view('User/about-us');
});

Route::get('sanpham/thongtinsanpham/{idSanPham}&&{idNSP}',[User\productController::class, 'getSanPhamChiTiet']);


Route::get('sanphamsapxep', [User\productController::class, 'sapXepGia']);

Route::get('sanphamtheothuonghieu', [User\productController::class, 'getSanPhambyThuongHieu']);

Route::get('gio-hang', function(Request $request) {
   Session::forget('product-pay');
    $id = Session::get('user')[0]->IDKhachHang;
    $cart = DB::table('giohang')->JOIN('sanpham', 'giohang.IDSanPham', '=', 'sanpham.IDSanPham')
    ->leftJoin('mausanpham', 'mausanpham.IDMau', '=', 'giohang.IDMau')->where('IDKhachHang', '=', Session::get('user')[0]->IDKhachHang)->get();
    return view('User/cart')->with('cart', $cart);
});


Route::get('/checkout-page', [User\CartController::class, 'getProductInCart']);

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
                'view' => "" .  view('User/component/item-cart')->with('gh',$cart[0]),
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
                'view' => "" .  view('User/component/item-cart')->with('gh',$cart[0]),
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
                return view('User/component/not-cart');
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
                return view('User/component/not-cart');
            }   
            else { 
                DB::table('giohang')->where('IDKhachHang','=', $id)->where('IDSanPham','=', $request->IDSanPham )->delete();
            return '';    
        }
        
          }
        }
});

Route::get('/load-thanh-pho', [User\CartController::class, 'getQuanHuyen'] );
Route::get('/load-xa', [User\CartController::class, 'getXa']);

Route::get("them-san-pham-thanh-toan",function(Request $request){
     
    if (session()->has('product-pay') && session()->has('order-product')){
        $product_pay = Session::get('product-pay');
        $product_order = Session::get('order-product');
        $product_pay[$request->id] = $request->id;
        $product_order[$request->id] = $request->id;
        Session::put('product-pay',$product_pay);
        Session::put('order-product',$product_order);
    }
    else {
        $product_pay = array();
        $product_pay[$request->id] = $request->id;
        Session::put('product-pay',$product_pay);
        $product_order = array();
        $product_order[$request->id] = $request->id;
        Session::put('order-product',$product_order);
    }
    return json_encode(Session::get('product-pay'));
});
Route::get("xoa-san-pham-thanh-toan",function(Request $request){

    if (session()->has('product-pay') && session()->has('order-product')) {
        $product_pay = Session::get('product-pay');
        $product_order = Session::get('order-product');
        foreach ($product_pay as $key => $value) {
            if ($value == $request->id) 
                unset($product_pay[$key]);
        } 
        foreach ($product_order as $key => $value) {
            if ($value == $request->id) 
                unset($product_order[$key]);
        }

        if (count($product_pay) > 0) 
        Session::put('product-pay',$product_pay);
        else 
        Session::forget('product-pay');
    }
});

Route::get('sua-so-luong-san-pham', function(Request $request) {
    $id = Session::get('user')[0]->IDKhachHang;
    DB::update("update giohang set SoLuong = ?  where IDKhachHang = ? and STT = ? ",[$request->num,$id,$request->STT]);   
});

Route::get('them-dia-chi-giao-hang', [User\XuLiAdressController::class, 'addDiaChi']); 

Route::get('get-address', [User\XuLiAdressController::class, 'getDiaChiDefault']);

Route::get('/profile', [User\profileController::class, 'getProfile',]);
Route::get('/get-thanh-pho', [User\profileController::class, 'getQuanHuyen']);
Route::get('/get-xa', [User\profileController::class, 'getXa']);

Route::get('/get-information-customer', [User\profileController::class, 'getInput']);
Route::get('/edit-profile', function() {
    return view('User/component/edit-profile');
});

Route::get('xu-li-don-dat-hang', [User\OrderController::class, 'addOrder']);

Route::get('sua-dia-chi', [User\profileController::class, 'editAddressCustomer']);

Route::get('/thay-doi-dia-chi', [User\profileController::class, 'editDefaultAddress']);

Route::get('check-order-customer', [User\profileController::class, 'checkBill']);



// ADMIN

Route::get('/admin/login', function() {
    return view('admin/login');
});

Route::get('/admin/home', function() {
    return view('admin/home');
});

Route::post('/admin/xulidangnhap', [Admin\ProcessLoginController::class, 'getLogin']);

Route::get('/admin/home', [Admin\ManagementController::class, 'getInfor']);

Route::get('/oke', function() {
    return view('admin/form');
});

Route::get('file',[Admin\FileController::class, 'index']);
Route::post('file',[Admin\FileController::class, 'doUpload']);



Route::post('/admin/them-san-pham', [Admin\AllProductController::class, 'addProduct']);

Route::get('/admin/edit-product', [Admin\AllProductController::class, 'getFormProduct']);

Route::post('/admin/sua-san-pham', [Admin\AllProductController::class, 'editFormProduct']);

Route::get('/admin/xoa-san-pham', [Admin\AllProductController::class, 'deleteProductOne']);
Route::get('/admin/delete-product', [Admin\AllProductController::class, 'deleteProductTwo']);

Route::get('/admin/search-product', [Admin\AllProductController::class, 'getSearchProduct']);
Route::get('/admin/search-order', [Admin\ProcessOrderManagemnet::class, 'getSearchOrder']);

Route::get('/admin/search-account', [Admin\ProcessManagement::class, 'getSearchAccount']);
Route::get('/admin/search-customer', [Admin\ProcessManagement::class, 'getSearchCustomer']);
Route::get('/admin/search-category', [Admin\ProcessManagement::class, 'getSearchCategory']);