<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pay.css">
    <link rel="stylesheet" href="/css/form-add-address.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/ajax.js"></script>
    <script src="/js/modal.js"></script>

    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
</head>
<body>
    @include('layout/header')
    <div id = "row-address">
        <div class = "payment">
            <div class = "address">
                <div class = "title-address" style = "color: #ee4d2d;font-size: 20px;">
                    <i class="fas fa-map-marker-alt" style = "padding-right:1rem;"></i> <span> Địa Chỉ Nhận Hàng</span>
                </div>
                <div class = "content-delivery-address" style = "display:flex;">
                    <div class  = "name-customer">
                        <p>Trà Thị Kim Hằng - <span>0987654321</span></p>
                    </div>
                    <div class  ="address-customer" style = "width:50%;">
                    <p> 470 Trần Đại Nghĩa,Hòa Hải,Ngũ Hành Sơn,Đà Nẵng</p>
                    </div>
                    <div class  = "change-address" style = "line-height:50px;">
                        <span onclick="loadDeliveryAddress()"  style = "text-decoration: none;color: #05a;font-size: 17px;cursor: pointer;">THAY ĐỔI</span>
                    </div>
                </div>
            </div> 
            <div class  = "row-address">
                @include('component/delivery-address')
            </div>
            <div class = "information-product-order">
                <div class  ="order">
                    <div class = "row-title-infor-product" style = "display:flex;padding:15px;font-size:18px;color:#bbb;">
                        <div class  = "name-product-order" style = "width:55%;font-size:19px;color:black;" >Sản Phẩm</div>
                        <div class  = "price-product-order" style = "width:15%;">Đơn Giá</div>
                        <div class = "amount-product-order" style = "width:15%;">Số Lượng</div>
                        <div class = "total-product" style= "width:15%;">Thành Tiền</div>
                    </div>
                    @foreach($order as $o) 
                    <div class = "the-items-order" style= "display:flex;padding:15px;font-size:17px;">
                        <div class  = "items-order" style= "display:flex;width:55%;">
                            <div class = "number-order" style = "line-height: 4em;padding-right: 2rem;">
                                 1
                            </div>
                            <div class = "images-items-order" style="padding-right:1rem;">
                                <img src= "/img/{{ $o->HinhAnh}}" style ="width:80px;">
                            </div>
                            <div class = "name-items" style= "line-height:5em;">
                               {{ $o->TenSanPham }}
                            </div>
                        </div>
                        <div class  = "price-items-order" style = "text-align: center;line-height: 4.5em;  width: 15%;">{{ number_format($o->GiaSP) }}</div>
                        <div class = "amount-items-order">{{ $o->SoLuong }}</div>
                        <div class = "total-items" style= "width:15%;line-height: 4.5em;" id = "totalProduct">{{ number_format( $o->GiaSP *  $o->SoLuong ) }} </div>
                       
                    </div>
                    @endforeach
                </div>
            </div>  
            <div class  = "total-buy-product">  
               <p style= "color:grey;">Tổng số tiền : <span style = "color: #ef2c2c; font-size: 25px; font-family: sans-serif;" id = "totalMoney"></span> </p>
               <div class = "btn-order-product" style= "display:flex;">
                   <p style = "padding-right: 22rem; font-size: 14px;">Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều Khoản của Shop</p>
                   <button type = "submit">Đặt Hàng </button>
                </div>
            </div>
        </div>
     </div>
     
     @include('layout/footer')
     <div class = "insert-address" id="myModal" >
            <div class = "title-add-address">
               <h2> Thêm 1 Địa Chỉ Mới </h2>
            </div>
            <div class = "form-input-add-address">
                <div class = "input-name">
                    <input type = "text" name = "name" placeholder = "Họ Tên">
                </div>
                <div class = "input-phone">
                    <input type = "text" name = "phone" placeholder = "Số điện thoại">
                </div>
                <div class = "input-district1">
                  
                    <select onchange="loadThanhPho(this)"  id = "district-1" >
                        <option value = ""></option>
                    @foreach($thanhPho as $TP)
                        <option   value = " {{ $TP->IDThanhPho }} ">{{ $TP->TenThanhPho}}</option>
                    @endforeach
                    </select>
                </div>
                <div class = "input-district2">
                  <select id = "district-2" onchange="loadXa(this)">
                        <option value = ""></option>
                   @foreach($quan as $q)
                        <option name = "district-2" value = "{{ $q->IDQuan }}">{{ $q->TenQuan}}</option>
                    @endforeach
                  </select>
                </div>
                <div class = "input-district3">
                    <select id = "district-3">
                    <option value = ""></option>
                        <@foreach($xa as $x)
                        <option name = "district">{{ $x->TenXa}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class = "btn" style = "display: flex; margin-top: 1rem; width: 50%;float: right;">
                <div class = "btn-return">
                    <span onclick = "closeModal()" style="padding-right:1rem;cursor: pointer;">TRỞ LẠI </span>
                </div>
                <div class = "btn-complete">
                    <a href = "">HOÀN THÀNH</a>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>