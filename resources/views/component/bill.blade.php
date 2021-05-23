<?php

use Illuminate\Support\Facades\DB;
$sum = 0;
?>
@foreach($order as $o)
<div class="all-order">
    <div class="infor" style="padding-left: 1rem;font-size:14px;">
        <p style="margin:0;margin-top: 1rem;"><i class="fas fa-file-invoice" style="padding-right:10px;"></i>ID Đơn Hàng : {{ $o->IDDonHang }}</p>
    </div>
    <?php
    $billProduct = DB::table('donhang')->where('donhang.IDDonHang', '=', $o->IDDonHang)
        ->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
        ->JOIN('sanpham', 'chitietdonhang.IDSanPham', '=', 'sanpham.IDSanPham')
        ->leftJOIN('mausanpham', 'mausanpham.IDMau', '=', 'chitietdonhang.IDMau')
        ->get();
    ?>
    <div>
        @foreach($billProduct as $b)
        <div class="information-bill-product">
            <div class="images">
                <img src="/img/{{$b->HinhAnh}}" style="width: 80px;">
            </div>
            <div style="display: flex;width: 100%;">
                <div class="content-bill-product" style="margin-top: -10px; line-height: 9px; padding-left: 10px;width: 80%;">
                    <div class="name-bill">
                        <p>{{ $b->TenSanPham }}</p>
                    </div>
                    <div class="classification-of-goods" style="font-size:15px;color:grey;">
                        Phân loại hàng : <span>{{ $b->TenMau }}</span>
                    </div>
                    <div class="number-product">
                        <p>x<span style="padding-left:3px;">{{ $b->SoLuong }}</span></p>
                    </div>
                </div>
                <div class="price-product" style="width: 20%;">
                    <span style="color: orangered; font-size: 15px;">₫{{number_format($b->GiaSP)}}</span>
                </div>
            </div>
        </div>
        <?php 
         $total = DB::table('chitietdonhang')->where('IDDonHang', '=', $o->IDDonHang)->sum('ThanhTien');
        
           
        ?>
        @endforeach  
        <?php
            $check = DB::table('donhang')->where('IDDonHang', '=', $o->IDDonHang)->where('TrangThai', '=', 'Đã Giao Hàng')->get();

         ?>
         @if(count($check) > 0)
         <div class="page-bill-product">
            <div class="date-order">
                Ngày Đặt Hàng : <span>{{ $o->NgayDatHang }}</span>
            </div>
            <div class="total-product" style="width: 40%;float: right;text-align: right; padding-right: 1rem;">
                <div style="display:flex;margin-bottom: 1rem; margin-top: 1rem;  float: right;">
                    <img src="/img/ok.png" style="width: 22px;height:22px;margin-top: 9px;margin-right: 10px;">
                    <div style="font-size:15px;">Tổng Số Tiền : <span style="color:orangered;font-size:27px;">{{ number_format($total)}}</span></div>
                </div>
                <div class = "accept-order">
                   <button type = "button">Mua Lần Nữa</button>
                </div>
            </div>
        </div>
        @else 
        <div class="page-bill-product">
            <div class="date-order">
                Ngày Đặt Hàng : <span>{{ $o->NgayDatHang }}</span>
            </div>
            <div class="total-product" style="width: 40%;float: right;text-align: right; padding-right: 1rem;">
                <div style="display:flex;margin-bottom: 1rem; margin-top: 1rem;  float: right;">
                    <img src="/img/ok.png" style="width: 22px;height:22px;margin-top: 9px;margin-right: 10px;">
                    <div style="font-size:15px;">Tổng Số Tiền : <span style="color:orangered;font-size:27px;">{{ number_format($total)}}</span></div>
                </div>
                <div class = "accept-order">
                   <button type = "button" onclick = "acceptProduct('{{ $o->IDDonHang }}')">Đã Nhận Được Hàng</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endforeach
