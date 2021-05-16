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
        $getProduct = Product::JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')
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
        
        
                DB::update("update sanpham set TenSanPham =  ?, HinhAnh = ?, GiaSP = ?, IDNhomSP = ? , IDThuongHieu = ?, MoTa = ?, NgaySanXuat = ?, NgayHetHan = ?,TrongLuong = ?, TrangThai = ? where  IDSanPham = ? ", 
                [$request->nameProduct, $file ,$request->price, $request->groupProduct,$request->thuongHieu, $request->decription,$request->sx, 
                $request->hh, $request->tl, $request->status, $request->IDSP]);
            
            $product = DB::table('sanpham')
            ->select(DB::raw(' DISTINCT mausanpham.IDMau,sanpham.IDSanPham, TenSanPham, GiaSP,TenNhom,TenMau, sanpham.HinhAnh, TenThuongHieu,NgaySanXuat, NgayHetHan'))
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP','nhomsanpham.IDNhomSP')
            ->leftJOIN('sanphamchitiet', 'sanphamchitiet.IDSanPham','sanpham.IDSanPham')
            ->leftJOIN('mausanpham', 'sanphamchitiet.IDMau','mausanpham.IDMau')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu','thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();
            $category = DB::table('nhomsanpham')->get();
    
            return view('admin/component/ProductManagement')->with('product', $product)->with('category', $category);
            
       }
       else {
            DB::update("update sanpham set TenSanPham =  ?, GiaSP = ?, IDNhomSP = ? , IDThuongHieu = ?, 
            MoTa = ?,NgaySanXuat = ?, NgayHetHan = ?,TrongLuong = ?, TrangThai = ? where  IDSanPham = ? ", 
            [$request->nameProduct,$request->price, $request->groupProduct,$request->thuongHieu, $request->decription,$request->sx, 
            $request->hh, $request->tl, $request->status, $request->IDSP]);
        $product = DB::table('sanpham')
        ->select(DB::raw(' DISTINCT mausanpham.IDMau,sanpham.IDSanPham, TenSanPham, GiaSP,TenNhom,TenMau, sanpham.HinhAnh, TenThuongHieu,NgaySanXuat, NgayHetHan'))
        ->JOIN('nhomsanpham', 'sanpham.IDNhomSP','nhomsanpham.IDNhomSP')
        ->leftJOIN('sanphamchitiet', 'sanphamchitiet.IDSanPham','sanpham.IDSanPham')
        ->leftJOIN('mausanpham', 'sanphamchitiet.IDMau','mausanpham.IDMau')
        ->JOIN('thuonghieu', 'sanpham.IDThuongHieu','thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();
        $category = DB::table('nhomsanpham')->get();
        return view('admin/component/ProductManagement')->with('product', $product)->with('category', $category);
       }     
    }
}
