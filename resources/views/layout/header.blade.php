<?php

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;
?>
<div id="header">
        <div class="header-bar">
            <div class="left">
                <img src="/img/logo.PNG"></img>
            </div>
            <div class="menu">
                <ul>
                   <a href="{{ url('trangchu') }}"><li class="active">TRANG CHỦ</li></a>
                   <a href = "{{ url('gioithieu') }}"><li>GIỚI THIỆU</li></a>
                   <li onclick="window.location.href='{{ url('sanpham')}}'">SẢN PHẨM <i class="fas fa-angle-down"></i>
                      
                        <ul class="catalogues">
                        @foreach($loai_sp as $sp) 
                            <a href = "{{ url('sanpham/'.$sp->IDNhomSP) }}"><li>{{ $sp->TenNhom}}</li></a>
                         @endforeach
                        </ul>
                      
                    </li> 
                    <a href="#"><li>TIN TỨC</li></a>
                    <a href="contact.php"><li>LIÊN HỆ</li></a>
                </ul>
            </div>
         
            <div class="right">
                <div class="account">
                @if(session()->has('user')) 
                    <ul style = "display:inline-flex;list-style:none;margin:0;">
                        <li><i class="fas fa-user-circle" style ="font-size:30px;"></i></li>
                        <li style = "line-height:30px;padding-left:10px;font-size:17px;"><span> {{Session::get('user')[0]->TenDangNhap}}</span></li>
                   </ul>
                    <div class = "account-1" >
                       <a href = "dangxuat"><p>Đăng Xuất</p></a>
                    </div>
                    @else
                    <ul style = "display:inline-flex;list-style:none;line-height:0;">  
                        <li><a href = "{{ url('dangnhap') }}">Đăng Nhập </a></li>
                        <li style = "padding:0 7px;"> / </li>
                        <li><a href = "{{ url('dangkytaikhoan') }}">Đăng Ký </a></li>
                    </ul>    
                    @endif
                </div>
                @if (session()->has('user'))
                <div class="cart">
                   <a href = "{{ url('gio-hang') }}"><img src="/img/bag.png"></a> 
                    <?php
                         $cart = DB::table('giohang')->where('IDKhachHang', '=', Session::get('user')[0]->IDKhachHang)->get();
                         if(count($cart) > 5) {
                            $gioHang = DB::table('giohang')->JOIN('sanpham', 'giohang.IDSanPham', '=', 'sanpham.IDSanPham')
                            ->WHERE('IDKhachHang', '=',Session::get('user')[0]->IDKhachHang )->LIMIT(5)->get();
                         }
                         else {
                            $gioHang = DB::table('giohang')->JOIN('sanpham', 'giohang.IDSanPham', '=', 'sanpham.IDSanPham')
                            ->WHERE('IDKhachHang', '=',Session::get('user')[0]->IDKhachHang )->get();
                         }
                       
                     ?>
                    <span id="numcart">{{ count($cart) }}</span>
                    @if(count($cart) > 0)
                    <div class = "row-shopping-cart">      
                    <p style = "font-size: 18px;color: #ccc;">Sản Phẩm Mới Thêm</p>
                           <div style="width: 100%;" id="myCart">
                           @foreach ($gioHang as $gh)
                            <div class = "row-all-product-cart" style = "display:flex;margin-bottom:1rem;">
                                <div class = "images-product-cart" style ="padding-right:1rem;">
                                    <img src = "/img/{{ $gh->HinhAnh }}" style = "width:40px;">
                                </div>
                                <div class = "name-product-cart" style = "font-size:17px;line-height:2rem;">
                                    <p>{{ $gh->TenSanPham }}</p>
                                </div>
                                <div class = "price-product-cart">
                                    <p style = "margin: 0;color:orangered;font-size:18px;">₫{{ number_format( $gh->GiaSP) }}</p>
                                </div>
                            </div>
                            @endforeach
                            </div>
                            <p> 
                            <div class = "btn-look-cart">
                                <button type = "button">Xem Giỏ Hàng</button>
                            </div>
                    </div>
                    @else 
                    <div class = "row-shopping-cart" style="text-align: center;">
                    <div class = "Image-not-add-cart">
                        <img src = "/img/cart.png" style="width: 40px;">
                         </div>
                         <div class = "content">
                               Chưa có sản phẩm nào
                         </div>
                    </div>
                    @endif
                </div>
                    @else
                    <div class="cart">
                    <a href="{{ url('gio-hang') }}"><img src="/img/bag.png"></a>
                    <span id="numcart">0</span>
                    <div class = "row-shopping-cart">
                         <p style = "font-size: 18px;color: #ccc;">Sản Phẩm Mới Thêm</p>
                         
                         <p style="text-align:center;font-size:18px;"> Chưa có sản phẩm nào</p>   
                    </div>
                </div>
                    @endif
                
              
                <div class="search-bar">
                    <img src="/img/search_icon.png"></img>
                </div>
            </div>
        </div>
    </div>
  