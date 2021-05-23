<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllProductController extends Controller
{
    public function addProduct(Request $request)
    {

        if ($request->has('fileImage')) {
            $file_path = "public/img";
            $images = $request->file('fileImage');
            $file = $images->getClientOriginalName();
            $path = $request->file('fileImage')->storeAs($file_path, $file);

            $all_product = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->limit(1)->get();
            $string = $all_product[0]->IDSanPham;
            $data = explode('SP', $string);
            $number = $data[1];
            $number++;
            Product::create(
                'SP0000' . $number,
                $request->nameProduct,
                $file,
                $request->price,
                $request->price_1,
                $request->amount,
                $request->groupProduct,
                $request->thuongHieu,
                $request->decription,
                $request->sx,
                $request->hh,
                $request->tl
            );
        }
        return redirect()->to('admin/home');
    }
    public function getFormProduct(Request $request)
    {
        $category = DB::table('nhomsanpham')->get();
        $getProduct = Product::JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')
            ->where('IDSanPham', '=', $request->IDSanPham)->get();
        $th = DB::table('thuonghieu')->get();
        return view('/admin/component/form-edit-product')->with('getProduct', $getProduct)->with('category', $category)->with('th', $th);
    }

    public function editFormProduct(Request $request)
    {
        if ($request->has('fileImage')) {
            $file_path = "public/img";
            $images = $request->file('fileImage');
            $file = $images->getClientOriginalName();
            $path = $request->file('fileImage')->storeAs($file_path, $file);


            DB::update(
                "update sanpham set TenSanPham =  ?, HinhAnh = ?, GiaSP = ?, IDNhomSP = ? , IDThuongHieu = ?, MoTa = ?, NgaySanXuat = ?, NgayHetHan = ?,TrongLuong = ?, TrangThai = ? where  IDSanPham = ? ",
                [
                    $request->nameProduct, $file, $request->price, $request->groupProduct, $request->thuongHieu, $request->decription, $request->sx,
                    $request->hh, $request->tl, $request->status, $request->IDSP
                ]
            );
            $product_detail = DB::table('sanphamchitiet')
                ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong,GiaNhap,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
                ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();

            $product = DB::table('sanpham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->whereNotIn('IDSanPham', function ($query) {
                    $query->select('IDSanPham')->from('sanphamchitiet');
                })->get();
            return view('admin/component/ProductManagement')->with('product', $product);
        } else {
            DB::update(
                "update sanpham set TenSanPham =  ?, GiaSP = ?, IDNhomSP = ? , IDThuongHieu = ?, 
            MoTa = ?,NgaySanXuat = ?, NgayHetHan = ?,TrongLuong = ?, TrangThai = ? where  IDSanPham = ? ",
                [
                    $request->nameProduct, $request->price, $request->groupProduct, $request->thuongHieu, $request->decription, $request->sx,
                    $request->hh, $request->tl, $request->status, $request->IDSP
                ]
            );
            $product_detail = DB::table('sanphamchitiet')
                ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong,GiaNhap,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
                ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();

            $product = DB::table('sanpham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->whereNotIn('IDSanPham', function ($query) {
                    $query->select('IDSanPham')->from('sanphamchitiet');
                })->get();

            return view('admin/component/ProductManagement')->with('product', $product)->with('product_detail', $product_detail);
        }
    }
    public function deleteProductOne(Request $request)
    {
        DB::table('sanphamchitiet')->where('IDSanPhamCT', '=', $request->IDSPCT)->delete();
        $product_detail = DB::table('sanphamchitiet')
            ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong,GiaNhap,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
            ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();

        $product = DB::table('sanpham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
            ->whereNotIn('IDSanPham', function ($query) {
                $query->select('IDSanPham')->from('sanphamchitiet');
            })->get();
        return view('/admin/component/ProductManagement')->with('product_detail', $product_detail)->with('product', $product);
    }
    public function deleteProductTwo(Request $request)
    {
        DB::table('sanpham')->where('IDSanPham', '=', $request->IDSP)->delete();
        $product_detail = DB::table('sanphamchitiet')
            ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham,soluong,GiaNhap,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
            ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();

        $product = DB::table('sanpham')
            ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
            ->whereNotIn('IDSanPham', function ($query) {
                $query->select('IDSanPham')->from('sanphamchitiet');
            })->get();
        return view('/admin/component/ProductManagement')->with('product_detail', $product_detail)->with('product', $product);
    }
    public function getSearchProduct(Request $request)
    {
        if ($request->ID != NULL && $request->IDNSP == NUll) {
            $product_detail = DB::table('sanphamchitiet')
                ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham,soluong, GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
                ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')
                ->whereRaw("sanpham.IDSanPham LIKE '%" . $request->ID . "%' OR TenSanPham LIKE '%" . $request->ID . "%' ")->orderby('sanpham.IDSanPham', 'ASC')->get();


            $product = DB::table('sanpham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')
                ->whereRaw("IDSanPham LIKE '%" . $request->ID . "%'
        OR TenSanPham LIKE '%" . $request->ID . "%' ")
                ->whereNotIn('IDSanPham', function ($query) {
                    $query->select('IDSanPham')->from('sanphamchitiet');
                })->get();

            return view('/admin/component/ProductManagement')->with('product_detail', $product_detail)->with('product', $product);
        } else if ($request->ID != NULL && $request->IDNSP != NULL) {
            $product_detail = DB::table('sanphamchitiet')
                ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
                ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->whereRaw("sanpham.IDNhomSP = '" . $request->IDNSP . "' and sanpham.IDSanPham LIKE '%" . $request->ID . "%' OR TenSanPham LIKE '%" . $request->ID . "%' and sanpham.IDNhomSP = '" . $request->IDNSP . "' ")->get();

            $product = DB::table('sanpham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->whereRaw("sanpham.IDNhomSP = '" . $request->IDNSP . "' and sanpham.IDSanPham LIKE '%" . $request->ID . "%' OR TenSanPham LIKE '%" . $request->ID . "%' and sanpham.IDNhomSP = '" . $request->IDNSP . "' ")
                ->whereNotIn('IDSanPham', function ($query) {
                    $query->select('IDSanPham')->from('sanphamchitiet');
                })->get();
                return view('/admin/component/ProductManagement')->with('product_detail', $product_detail)->with('product', $product);
        } else if ($request->IDNSP == NULL && $request->ID == NULL) {
            $product_detail = DB::table('sanphamchitiet')
                ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong,GiaNhap,GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
                ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();

            $product = DB::table('sanpham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->whereNotIn('IDSanPham', function ($query) {
                    $query->select('IDSanPham')->from('sanphamchitiet');
                })->get();
                return view('/admin/component/ProductManagement')->with('product_detail', $product_detail)->with('product', $product);
        } else {
            $product_detail = DB::table('sanphamchitiet')
                ->select(DB::raw(' DISTINCT mausanpham.IDMau, sanpham.IDSanPham, IDSanPhamCT, TenSanPham, soluong, GiaSP,TenNhom,TenMau, sanpham.HinhAnh,TenThuongHieu,NgaySanXuat, NgayHetHan'))
                ->leftJOIN('sanpham', 'sanphamchitiet.IDSanPham', 'sanpham.IDSanPham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('mausanpham', 'sanphamchitiet.IDMau', 'mausanpham.IDMau')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->where('sanpham.IDNhomSP', '=', $request->IDNSP)->get();

            $product = DB::table('sanpham')
                ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')
                ->where('sanpham.IDNhomSP', '=', $request->IDNSP)
                ->whereNotIn('IDSanPham', function ($query) {
                    $query->select('IDSanPham')->from('sanphamchitiet');
                })->get();
            return view('/admin/component/ProductManagement')->with('product_detail', $product_detail)->with('product', $product);
        }
    }
}
