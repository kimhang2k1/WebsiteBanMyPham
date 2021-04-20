<div class = "title-address" style = "color: #ee4d2d;font-size: 20px;">
    <i class="fas fa-map-marker-alt" style = "padding-right:1rem;"></i> <span> Địa Chỉ Nhận Hàng</span>
</div>
@if(count($addressDefault) > 0)
@foreach($addressDefault as $dc)
<div class = "content-delivery-address" style = "display:flex;">
    <div class  = "name-customer">
        <p>{{ $dc->HoTen}} <span>(+84)&nbsp;&nbsp;{{ $dc->SDT }}</span></p>
    </div>
    <div class  ="address-customer" style = "width:50%;">
    <p> {{$dc->SoNha}},{{$dc->TenXa}},{{ $dc->TenQuan}},{{$dc->TenThanhPho}}</p>
    </div>
</div>
@endforeach
@endif
<div class  = "change-address" style = "line-height:50px;">
        <span onclick="loadDeliveryAddress()"  style = "text-decoration: none;color: #05a;font-size: 17px;cursor: pointer;">THAY ĐỔI</span>
</div>