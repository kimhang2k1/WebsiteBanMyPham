<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllProductController extends Controller
{
    public function addProduct(Request $request) {

        if($request->has('fileImage')) {
             $file_path = "public/img";
             $images = $request->file('fileImage');
             $file = $images->getClientOriginalName();
             $path = $request->file('fileImage')->storeAs($file_path, $file);
             
             $all_product = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->limit(1)->get();
             $string = $all_product[0]->IDSanPham;
             $data = explode('SP',$string);
             $number = $data[1];
             $number++;
             Product::create('SP0000'.$number, $request->nameProduct,  $file,
             $request->price, $request->groupProduct, $request->thuongHieu, $request->decription, $request->sx, $request->hh, $request->tl);
     
        }
        return redirect()->to('admin/home');
        
        
    }
    public function getFormProduct(Request $request) {
        $category = DB::table('nhomsanpham')->get();
        $getProduct = Product::JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'nhomsanpham.IDThuongHieu')
        ->where('IDSanPham', '=', $request->IDSanPham)->get();
        $th = DB::table('thuonghieu')->get();
        return view('/admin/component/form-edit-product')->with('getProduct', $getProduct)->with('category', $category)->with('th', $th );
    }

    public function editFormProduct(Request $request) {
        if($request->has('fileImage')) {
            $file_path = "public/img";
            $images = $request->file('fileImage');
            $file = $images->getClientOriginalName();
            $path = $request->file('fileImage')->storeAs($file_path, $file);
            
            DB::update("update sanpham set TenSanPham =  ?, HinhAnh = ?, GiaSP = ?, IDNhomSP = ? , IDThuongHieu = ?, MoTa = ?
            NgaySanXuat = ?, NgayHetHan = ?,TrongLuong = ? where  IDSanPham = ? ", 
            [$request->nameProduct, $file ,$request->price, $request->groupProduct,$request->thuongHieu, $request->decription, $request->sx, $request->hh, $request->tl, $request->IDSP]);
    
       }
       
    }
}
