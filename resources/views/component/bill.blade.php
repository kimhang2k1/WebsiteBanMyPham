<div style="border:1px solid #ccc;"> 
                    <div class  = "title-bill" style="font-size:20px;padding:15px;display:flex;width: 40%;margin:auto;">
                        <img src = "/img/bill.png" style="width: 35px;height:35px;">
                        <p style="margin:0;line-height:38px;"> Tất Cả Các Đơn Hàng Đã Mua</p>
                    </div>
                 </div>
                 @foreach($bill as $b)
                 <div class = "infor" style="padding-left: 1rem;">
                    <p style="margin:0;margin-top: 1rem;">ID Đơn Hàng : {{ $b->IDDonHang }}</p>
                 </div>
                 <div>
                 <div class = "information-bill-product">
                     <div class = "images">
                         <img src = "/img/{{$b->HinhAnh}}" style="width: 80px;">
                     </div>
                     <div style="display: flex;width: 100%;">
                        <div class = "content-bill-product" style="margin-top: -10px; line-height: 9px; padding-left: 10px;width: 80%;">
                            <div class ="name-bill">
                                <p>{{ $b->TenSanPham }}</p>
                            </div>
                            <div class = "classification-of-goods" style="font-size:15px;color:grey;">
                                Phân loại hàng : <span>{{ $b->TenMau }}</span>
                            </div>
                            <div class = "number-product">
                                <p>x<span style="padding-left:3px;">{{ $b->SoLuong }}</span></p>
                            </div>
                        </div>
                        <div class  = "price-product" style="width: 20%;">
                              <span style="color: orangered; font-size: 15px;">₫{{number_format($b->GiaSP)}}</span>
                        </div>
                     </div>
                 </div>
                 <div class = "page-bill-product">
                     <div class = "date-order">
                        Ngày Đặt Hàng : <span>{{ $b->NgayDatHang }}</span>
                     </div>
                     <div class  = "total-product" style="width: 37%; float: right;line-height: 5rem;display:flex;">
                        <img src="/img/ok.png" style="width: 22px;height:22px;margin-top: 32px;margin-right: 10px;"> 
                        <div style="font-size:15px;">Tổng Số Tiền : <span style="color:orangered;font-size:27px;">₫121.000</span></div>
                     </div>
                 </div>
                 </div>
                 @endforeach
                