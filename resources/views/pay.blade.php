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
    <script src = "/js/addAdress.js"></script>

    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
</head>
<body>
    @include('layout/header')
    <div id = "row-address">
        <div class = "payment">
            @if(count($diaChi) < 0) 
               <div class = "insert-address" id="myModal" style="display:block;" >
                     @include('component/form-add-address', ['thanhPho' => $thanhPho, 'quan' => $quan, 'xa' => $xa])
              </div>
                <!-- <div class  = "row-address-customer" id = "myAddress" style = "display:none;">
                    @include('component/delivery-address', ['diaChi' => $diaChi])
                </div> -->
                <!-- <div class = "address" id = "default-address"style = "display:block;" >
                      @include('component/addressCustomer', ['donhang' => $donhang])
                    </div> -->
            @else 
                @if(count($donhang) > 0)
                    <div class = "address" id = "default-address"style = "display:block;" >
                      @include('component/addressCustomer', ['donhang' => $donhang])
                    </div> 
                    <div class  = "row-address-customer" id = "myAddress" style = "display:none;">
                        @include('component/delivery-address', ['diaChi' => $diaChi])
                    </div>
                    <div class = "insert-address" id="myModal" style="display:none;" >
                     @include('component/form-add-address', ['thanhPho' => $thanhPho, 'quan' => $quan, 'xa' => $xa])
                   </div>
                @else 
                    <div class = "address" id = "default-address"style = "display:none;" >
                    @include('component/addressCustomer', ['donhang' => $donhang])
                    </div> 
                    <div class  = "row-address-customer" id = "myAddress" style = "display:block;">
                        @include('component/delivery-address', ['diaChi' => $diaChi])
                    </div>
                @endif
            @endif
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
                            <div class = "images-items-order" style="padding-right:1rem;">
                                <img src= "/img/{{ $o->HinhAnh}}" style ="width:80px;">
                            </div>
                            <div class = "name-items" style= "line-height:5em;white-space: nowrap;text-overflow:ellipsis;overflow: hidden;width:50%;">
                              <a href = "#" style="text-decoration: none;color: black;"> {{ $o->TenSanPham }}</a>
                            </div>
                            @if($o->IDMau != NULL)
                            <div class = "product-type" style="margin-left:0.5rem;line-height: 5rem;color:grey;">
                                Loại: {{ $o->TenMau}} 
                            </div>
                            @else 
                            <div class = "product-type">
                                
                            </div>
                            @endif
                        </div>
                        <div class  = "price-items-order" style = "text-align: center;line-height: 4.5em;  width: 15%;">{{ number_format($o->GiaSP) }}</div>
                        <div class = "amount-items-order">{{ $o->SoLuong }}</div>
                        <div class = "total-items" style= "width:15%;line-height: 4.5em;" id = "totalProduct">{{ number_format( $o->GiaSP *  $o->SoLuong ) }} </div>
                       
                    </div>
                    @endforeach
                    <?php 
                       $sum = 0;
                       foreach ($order as $key => $value) {
                         $thanhTien = $order[$key]->GiaSP * $order[$key]->SoLuong;
                          $sum += $thanhTien;
                       }
                       
                    
                    ?>
                </div>
            </div>  
            <div class  = "total-buy-product">  
            <div class="infor-money-order-items">
                   <div class="row-infor-name-money" style="grid-row-start: 1;grid-row-end: 1;height: 40px;">
                        Tổng số tiền 
                   </div>
                   <div class="row-infor-total-money-items" style="grid-column-start: 3;grid-column-end: 6;">
                          ₫{{ number_format($sum)}}
                   </div>
                   <div class="row-infor-name-money" style="grid-row-end: 8;grid-row-start: 3;">
                        Tổng thanh toán
                   </div>
                   <div class="row-infor-total-money-items" style=" grid-row-start: 2; grid-column-start: 5;grid-column-end: 5; ">
                           ₫{{ number_format(25000)}}
                   </div>
                   <div class="row-infor-name-money" style="grid-row-start: 2;grid-row-end: 3;height: 40px;">
                       Phí vận chuyển 
                   </div>
                   <div class="row-infor-total-money-items" style="grid-column-start: 5;grid-column-end: 5;font-size:29px;color:#ee4d2d;">
                           <span>₫</span>{{ number_format($sum + 25000)}}
                   </div>
               </div>
            </div>
            <div class = "btn-order-product" style= "display: flex;  padding: 15px;border: 1px solid #f1f0ed;border-top: none; background-color: #fffefb;">
                   <p style = "padding-right: 22rem; font-size: 18px;">Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều Khoản của Shop</p>
                   <button type = "submit">Đặt Hàng </button>
                </div>
        </div>
     </div>
     
     @include('layout/footer')
        @if(count($diaChi) > 0) 
        <div class = "insert-address" id="myModal" style="display: none;"  >
            @include('component/form-add-address', ['thanhPho' => $thanhPho, 'quan' => $quan, 'xa' => $xa])
        </div>
        @else 
        <div class = "insert-address" id="myModal" style="display: block;"  >
            @include('component/form-add-address', ['thanhPho' => $thanhPho, 'quan' => $quan, 'xa' => $xa])
        </div>
        @endif
    </div>
   
</body>
</html>