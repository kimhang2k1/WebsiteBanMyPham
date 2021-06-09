<div class = "title-address" style = "color: #ee4d2d;font-size: 20px;">
                <i class="fas fa-map-marker-alt" style = "padding-right:1rem;"></i> <span> Địa Chỉ Nhận Hàng</span>
            </div>

            @foreach($diaChiGiaoHang as $dh)
            <div class = "content-delivery-address" style = "display:flex;">
                <div class  = "name-customer">
                    <p>{{ $dh->HoTen}} <span>(+84)&nbsp;&nbsp;{{ $dh->SDT }}</span></p>
                </div>
                <div class  ="address-customer" style = "width:50%;">
                <p> {{$dh->SoNha}},{{$dh->TenXa}},{{ $dh->TenQuan}},{{$dh->TenThanhPho}}</p>
                </div>
            </div>
            @endforeach
      
                         <div class  = "change-address" style = "line-height:50px;">
                    <span onclick="loadDeliveryAddress()"  style = "text-decoration: none;color: #05a;font-size: 17px;cursor: pointer;">THAY ĐỔI</span>
            </div>