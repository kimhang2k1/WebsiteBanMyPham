<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function getSanPhambyID($id) {
        $thuongHieu = DB::table('thuonghieu')->get();
        $product = DB::table('sanpham')->whereRaw("IDNhomSP LIKE '%" . $id ."%'")->get();
        $likeProduct = DB::table('sanpham')->limit(2)->get();
        return view('User/product')->with('productbyId', $product)->with('thuongHieu', $thuongHieu)->with('like', $likeProduct);
    }
     
    public function getSanPhamChiTiet($idSanPham, $idNSP) {

        // hiển thị màu sản phẩm
        $color_product = DB::table('sanphamchitiet')->select(DB::raw('DISTINCT sanphamchitiet.IDMau, TenMau'))
        ->JOIN('mausanpham', 'sanphamchitiet.IDMau', '=', 'mausanpham.IDMau')
        ->WHERE('sanphamchitiet.IDSanPham', '=', $idSanPham)->get();
      
        // hiển thị sản phẩm theo nhóm sản phẩm
        $product = DB::table('sanpham')->whereRaw("not IDSanPham = '".$idSanPham."' and IDNhomSP = '".$idNSP."'")->get();

        // hiển thị thương hiệu theo sản phẩm
        $brand = DB::table('sanpham')->select('TenThuongHieu')
        ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')
        ->WHERE('IDSanPham', '=', $idSanPham)->get();

        // load ảnh sản phẩm
        $image_product_detail = DB::table('sanphamchitiet')->where('IDSanPham', '=',$idSanPham)->get();

        // hiển thị thông tin sản phẩm
        $product_detail = DB::table('sanpham')->where('IDSanPham','=',$idSanPham)->get();

        $title =  DB::table('sanpham')
        ->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
        ->WHERE('IDSanPham', '=', $idSanPham)->get();

        
        return view('User/product-detail')->with('InformationProduct', $product_detail)->with('ColorProduct', $color_product)
        ->with('images_product', $image_product_detail)->with('brand', $brand)->with('productID', $product)->with('title', $title);
    }

    public function sapXepGia(Request $request) {
        if ($request->id == NULL) {
            if ($request->LoaiSapXep == "ASC")
            {
                $sort_up = DB::table('sanpham')->orderby('GiaSP', 'ASC')->get();
                return view('User\component\allProduct')->with('productbyId', $sort_up);
            }
            else if($request->LoaiSapXep == "DESC") {
                $sort_up = DB::table('sanpham')->orderby('GiaSP', 'DESC')->get();
            return view('User\component\allProduct')->with('productbyId', $sort_up);
            }
            else if($request->LoaiSapXep == "Mặc định"){
                $sort_up = DB::table('sanpham')->get();
                return view('User\component\allProduct')->with('productbyId', $sort_up);
            }
        }
        else {
            if ($request->LoaiSapXep == "ASC")
            {
                $sort_up = DB::table('sanpham')->where('IDNhomSP','=', $request->id)
                ->orderby('GiaSP', 'ASC')->get();
                return view('User\component\allProduct')->with('productbyId', $sort_up);
            }
            else if($request->LoaiSapXep == "DESC") {
                $sort_up = DB::table('sanpham')->where('IDNhomSP','=', $request->id)
                ->orderby('GiaSP', 'DESC')->get();
                return view('User\component\allProduct')->with('productbyId', $sort_up);
            }
            else if($request->LoaiSapXep == "Mặc định"){
                $sort_up = DB::table('sanpham')->where('IDNhomSP','=', $request->id)->get();
                return view('User\component\allProduct')->with('productbyId', $sort_up);
            }
        }
    }

    public function sapXepGiabyIDNhomSP(Request $request, $idNSP) {
        if ($request->LoaiSapXep == "ASC")
        {
            $sort_up = DB::table('sanpham')->where('IDNhomSP','=', $idNSP)->orderby('GiaSP', 'ASC')->get();
        return view('User\component\allProduct')->with('productbyId', $sort_up);
        }
        else if($request->LoaiSapXep == "DESC") {
            $sort_up = DB::table('sanpham')->where('IDNhomSP','=', $idNSP)->orderby('GiaSP', 'DESC')->get();
        return view('User\component\allProduct')->with('productbyId', $sort_up);
        }
        else if($request->LoaiSapXep == "Mặc định"){
            $sort_up = DB::table('sanpham')->where('IDNhomSP','=', $idNSP)->get();
            return view('User\component\allProduct')->with('productbyId', $sort_up);
        }
    }



    public function getSanPhambyThuongHieu(Request $request) {
            $th = DB::table('sanpham')->where('IDThuongHieu', '=',$request->id)->get();
            return view('User\component\allProduct')->with('productbyId', $th);
        
    }

    
}
