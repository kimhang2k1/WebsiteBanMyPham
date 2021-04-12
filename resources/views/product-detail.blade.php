<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel='stylesheet' type='text/css'  href='/css/product-detail.css'>
    <link rel='stylesheet' type='text/css'  href='/css/header.css'>
    <script src="/js/process.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/ajax.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    @include('layout/header')
    <div class="title">
        <div class="title-bar">
            @foreach($title as $product)
            <p><a href="#">Trang Chủ &nbsp;&nbsp;</a><i class="fas fa-chevron-right"></i><a
                    href="#"> &nbsp;&nbsp;{{ $product->TenNhom}} &nbsp;&nbsp;</a><i class="fas fa-chevron-right"></i><a href="#">
                    &nbsp;&nbsp;{{ $product->TenSanPham }}</a></p>
            @endforeach
        </div>
    </div>
    <div class="information-product">
        <div class="container">
            <div class="infor">
            @foreach($InformationProduct as $product)
                <div class="content-left">
                    <div class="image-product">
                        <img src="/img/{{ $product->HinhAnh }}" id = "images">
                        <div class = "image-decription-product" style="position:relative;margin-top:-1rem;">
                       
                        @if (count($images_product) == 0)
                    
                        @else
                        <span  onclick="previousImage()"><i class="fas fa-chevron-circle-left" 
                        style="font-size: 33px;cursor: pointer;
                        position: absolute;top: 50%;z-index: 1000;left:0;color:gray;"></i>
                        </span>
                        <br>    
                        <span onclick="nextImage()"><i class="fas fa-chevron-circle-right" style="font-size: 33px; cursor: pointer;position: absolute;top: 50%;z-index: 1000;right:0;color:gray;"></i></span>        
                            <ul id="image-decription-productss" style = "max-width: 344px;display:inline-flex;position:relative;list-style:none;padding:0;margin:0;overflow-x:hidden;">
                                @foreach($images_product as $Images)
                                <li><img id="{{ $Images->IDMau }}" src="/img/{{ $Images->HinhAnh }}"onclick="onHover(this)" onmouseover = "onHover(this)" onmouseout = "offHover(this)"></li>
                                @endforeach
                               
                            </ul>
                        @endif         
                        </div>
                    </div>
                    <div class="information">
                        <div class="name">
                            <p style = "margin:0;">{{ $product->TenSanPham }}</p>
                        </div>
                        <div class="rate">
                            <ul style = "display:inline-flex;list-style:none;color: orange;">
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                            </ul>
                            <span>Thương Hiệu :<span style ="margin-left:0.5rem;margin-right:0.5rem">
                            @foreach($brand as $th)
                                </span>{{ $th->TenThuongHieu }}</span>
                            @endforeach
                        </div>
                        <div class="price">
                            <span>{{ number_format($product->GiaSP)}}</span>
                        </div>
                        <div class="color-product">
                         
                            @foreach($ColorProduct as $color)
                             <button onclick="changeColor('{{ $color->IDMau }}')" id = "color"> {{ $color->TenMau }}</button>
                            @endforeach
                        </div>
                        <div class="amount">   
                            <div class = "form-amount">
                                      <span style = "margin-right: 1rem; line-height: 2rem;font-size:17px; color: grey;">Số Lượng : </span>
                                     <button onclick = "decrease()"> - </button>
                                     <input type = "text"  id = amount value = "1">
                                     <button onclick = "increase()"> + </button>
                            </div>
                            <input type="hidden" id="idColor" value="">
                            <div class = "buy-product-detail">
                            <p style = "margin-top:2rem;">
                                <span onclick="addCart('{{ $product->IDSanPham }}')"><i class="fas fa-cart-plus" style = "padding-right: 1rem; font-size: 16px;"></i>Thêm vào giỏ hàng </span>
                                <a href = "" style = "background-color:red;color:#fff;">Mua Ngay </a>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="commitment">
                    <div class="title-singer">
                        <h2 style = "margin-top:1rem;">CAM KẾT VỚI KHÁCH HÀNG</h2>
                        <hr style = "margin:auto; margin-top:0.375rem;">
                    </div>
                    <div class = "infor-commitment">
                        <div class = "content-commitment">
                           <div class = "icon">
                               <img src = "/img/icon-chat-luong.png">
                           </div>
                           <div class = "row-content-commitment">
                               <p>MỸ PHẨM 100% CHÍNH HÃNG</p>
                               <p>Chất lượng sản phẩm luôn được chứng nhận bằng sự tin cậy của Khách Hàng suốt nhiều năm qua</p>
                           </div>
                        </div>
                        <div class = "content-commitment" style = "margin-top:1rem;">
                            <div class = "icon">
                                <img src = "/img/chinhsachvanchuyen.png">
                            </div>
                            <div class = "row-content-commitment">
                                <p>MIỄN PHÍ GIAO HÀNG</p>
                                <p>Freeship với đơn hàng trên 200k toàn quốc</p>
                            </div>
                         </div>
                         <div class = "content-commitment"  style = "margin-top:1rem;">
                            <div class = "icon">
                                <img src = "/img/gift-546-288499.jpg">
                            </div>
                            <div class = "row-content-commitment">
                                <p>TRI ÂN KHÁCH HÀNG</p>
                                <p>Với các chương trình khuyến mãi, các sự kiện & quà tặng đặc biệt vô cùng hấp dẫn</p>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="decription-detail">
                <div class="title-decription-product">
                   <h2> Mô Tả Sản Phẩm </h2>
                </div>
                <div class= "row-decription">
                    <div class="decription-infor">
                        @foreach($InformationProduct as $product)
                        <span>  {!! $product->MoTa !!}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="favorite-product">
                <div class="title-favorite-product" style = "text-align:center;">
                    <img style="margin:auto;" src="/img/flower.png">
                    <p>Có thể bạn sẽ thích</p>
                    <p style = "font-family: monospace; font-size: 16px; color: #292929;  font-weight: 400;">Sản phẩm được khách hàng lựa chọn thêm</p>
                    <hr>
                </div>
                <div class = "product">
                    @foreach($productID as $product)
                    <div class="product-frame">
                        <div class="images-product">
                             <a href = ""> <img src="/img/{{ $product->HinhAnh }}"></a>
                        </div>
                        <div class="product-name">
                            <h3>
                            <a href = "" style = "text-decoration:none;color:black;"><p>{{ $product->TenSanPham }}</p></a>
                            </h3>
                        </div>
                        <div class="price-product">
                            <span>{{ number_format($product->GiaSP) }}<u>đ</u></span>
                        </div>
                        <div class="button-cart">
                            <a href="#">
                                <p>THÊM VÀO GIỎ</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="sign-up-for">
        <div class="registration">
            <div class="content-registration">
                <h2>
                    <p>Đăng ký nhận tin</p>
                </h2>
                <span>Bạn có thể đăng ký nhận tin khuyến mãi bất cứ lúc nào, những thông tin sẽ được gửi tới bạn nhanh
                    nhất.</span>
            </div>
            <div class="input-email-registration">
                <input type="text" placeholder="Nhập email của bạn">
                <a href="#"><i class="fas fa-paper-plane"></i> ĐĂNG KÝ</a>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>
</html>