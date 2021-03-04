<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product-detail.css'>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <div id="header">
        <div class="header-bar">
            <div class="left">
                <img src="./img/logo.PNG"></img>
            </div>
            <div class="menu">
                <ul>
                    <a href="#">
                        <li class="active">TRANG CHỦ</li>
                    </a>
                    <a href="#">
                        <li>GIỚI THIỆU</li>
                    </a>
                    <li onclick="window.location.href=''">SẢN PHẨM <i class="fas fa-angle-down"></i>
                        <ul class="catalogues">
                            <a href = "#"><li class="sub">Trang Điểm</li></a>
                            <a href = "#"><li class="sub">Son môi</li></a>
                            <a href = "#"><li class="sub">Chăm sóc cơ thể</li></a>
                            <a href= "#"><li class="sub">Chăm sóc tóc</li></a>
                            <a href = "#"><li class="sub">Chăm sóc mặt</li></a>
                        </ul>
    
                    </li> 
                    <a href="#">
                        <li>TIN TỨC</li>
                    </a>
                    <a href="#">
                        <li>LIÊN HỆ</li>
                    </a>
                </ul>
            </div>
            <div class="right">
                <div class="account">
                    <img src="img/user.png"></img>
                    <div class="account-1">
                        <a href="#">
                            <p>Đăng Nhập</p>
                        </a>
                        <a href="#">
                            <p>Đăng Ký</p>
                        </a>
                    </div>
                </div>
                <div class="cart">
                    <img src="img/bag.png"></img>
                    <span>0</span>
                </div>
                <div class="search-bar">
                    <img src="img/search_icon.png"></img>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-f7f7f7 flex items-center h-10">
        <div class="w-4/5 m-auto">
            <p class="text-707070"><a href="#">Trang Chủ &nbsp;&nbsp;</a><i class="fas fa-chevron-right"></i><a
                    href="#"> &nbsp;&nbsp;Chăm sóc mặt &nbsp;&nbsp;</a><i class="fas fa-chevron-right"></i><a href="#">
                    &nbsp;&nbsp;Dầu dưỡng da Phytoceuticals Argan</a></p>
        </div>
    </div>
    <div class="w-full shadow-xl py-2 pb-16">
        <div class="w-4/5 m-auto ">
            <div class="flex">
                <div class="w-3/4 flex pt-4">
                    <div class="w-80 mr-4">
                        <img class="border-2 border-gray-200 w-80 h-80 my-4" src="img/son/son_1.jpg">
                        <ul class="inline-flex">
                            <li><img src="img/detail_4.jpg"></li>
                            <li><img src="img/detail_1.jpg"></li>
                            <li><img src="img/detail_2.jpg"></li>
                            <li><img src="img/detail_3.jpg"></li>
                        </ul>
                    </div>
                    <div class="information my-4 ml-4">
                        <div class="name">
                            <p class="font-sans text-2xl font-bold">Son Ba Màu Maybelline Bitten 3.9g</p>
                        </div>
                        <div class="py-2">
                            <ul class="inline-flex">
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                                <li><i class=" orange fas fa-star"></i></li>
                            </ul>
                            <span class="mx-4 text-707070">Thương Hiệu :<span class="text-black px-2">Đang Cập
                                    Nhật</span></span>
                        </div>
                        <hr class="w-full">
                        <div class="price my-2">
                            <span class="text-red-500 text-3xl font-semibold">140,000đ</span>
                            <strike class="text-707070 text-xl ">150,000đ</strike>
                        </div>
                        <div class="infor-product w-120">
                            <p><span class="font-bold ">Son Ba Màu Maybelline Bitten 3.9g</span> - Kết cấu ba màu độc
                                đáo
                                tạo
                                hiệu ứng môi ombre
                                3D thời thượng, màu sắc loang nước sống động cho đôi môi căng mọng đẹp tự nhiên. Công
                                thức
                                Ultra creamy dưỡng ẩm môi suốt 12h liền. </p>
                        </div>
                        <div class="amount flex my-8">
                            <button class="absolute pl-3 h-12"><i class="fa fa-caret-down"
                                    style="color:#9c9c9c;"></i></button>
                            <input class="w-24 border-2 border-gray-100 text-center h-12 rounded-full" type="text"
                                value="1">
                            <button class="absolute left-37 h-12"><i class="fa fa-caret-up"
                                    style="color:#9c9c9c;"></i></button></p>
                            <button
                                class="rounded-full font-bold font-serif border-2 border-red-600 text-red-600 w-3/5 mx-4 hover:bg-red-600 hover:text-white "
                                type="submit">Thêm Vào Giỏ </button>
                        </div>
                    </div>
                </div>
                <div class="ml-20 mt-8 border-2 border-gray-100">
                    <div class="title-singer text-center text-xl font-family">
                        <h2 class = "mt-4">CAM KẾT VỚI KHÁCH HÀNG</h2>
                        <hr class = " m-auto mt-1.5">
                    </div>
                    <div class = "infor-commitment mt-4">
                        <div class = "content-commitment flex">
                           <div class = "icon">
                               <img src = "img/icon-chat-luong.png" class="p-2 w-48">
                           </div>
                           <div class = "text-sm ml-1.5">
                               <p>MỸ PHẨM 100% CHÍNH HÃNG</p>
                               <p>Chất lượng sản phẩm luôn được chứng nhận bằng sự tin cậy của Khách Hàng suốt nhiều năm qua</p>
                           </div>
                        </div>
                        <div class = "content-commitment flex mt-8">
                            <div class = "icon">
                                <img src = "img/chinhsachvanchuyen.png" class="p-2 w-24">
                            </div>
                            <div class = "text-sm mr-3.5">
                                <p>MIỄN PHÍ GIAO HÀNG</p>
                                <p>Freeship với đơn hàng trên 200k toàn quốc</p>
                            </div>
                         </div>
                         <div class = "content-commitment flex mt-4">
                            <div class = "icon">
                                <img src = "img/gift-546-288499.jpg" class="p-2 w-48">
                            </div>
                            <div class = "text-sm mt-4">
                                <p>TRI ÂN KHÁCH HÀNG</p>
                                <p>Với các chương trình khuyến mãi, các sự kiện & quà tặng đặc biệt vô cùng hấp dẫn</p>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="decription-detail my-10">
                <div class="title">
                    <ul class="w-full font-serif inline-flex text-2xl border-t-2 border-b-2 py-4">
                        <li class="mr-12">
                            <h3>Thông Tin</h3>
                        </li>
                        <li class="mr-12">
                            <h3>Hướng dẫn mua hàng</h3>
                        </li>
                        <li>
                            <h3>Đánh Giá</h3>
                        </li>
                    </ul>
                </div>
                <div class="decription-infor border-b-2 pb-12">
                    <p class="pb-8 pt-4"><span class="font-bold ">Son Ba Màu Maybelline Bitten 3.9g</span> - Kết cấu ba
                        màu độc đáo tạo
                        hiệu ứng môi ombre
                        3D thời thượng, màu sắc loang nước sống động cho đôi môi căng mọng đẹp tự nhiên. Công thức
                        Ultra creamy dưỡng ẩm môi suốt 12h liền. </p>
                    <p class="font-bold pb-2">Tính năng sản phẩm</p>
                    <ul class="list-disc px-10 pb-8">
                        <li>Hiệu ứng loang màu nước tạo nên màu sắc sống động cho đôi môi đẹp tự nhiên.</li>
                        <li>Công thức Ultra Creamy cho đôi môi căng mọng, dưỡng ẩm môi suốt 12h liền.</li>
                        <li>3 Shades màu OMBRE từ đậm sang nhạt trong 1 cây son tạo hiệu ứng ombre môi chỉ với 1 lần tô
                            son.</li>
                    </ul>
                    <p class="font-bold pb-2">Loại da phù hợp</p>
                    <p class="pb-8">Thích hợp mọi loại da</p>
                    <p class="font-bold pb-2">Màu sắc</p>
                    <ul class="list-disc px-10">
                        <li>Son Ba Màu Maybelline Bitten - OR01</li>
                        <li>Son Ba Màu Maybelline Bitten - RD01</li>
                        <li>Son Ba Màu Maybelline Bitten - PK01</li>
                        <li>Son Ba Màu Maybelline Bitten - RD03</li>
                    </ul>
                </div>
            </div>
            <div class="favorite-product">
                <div class="title-favorite-product text-center">
                    <img class="m-auto" src="img/flower.png">
                    <p class="text-3xl font-mono py-2">Có thể bạn sẽ thích</p>
                    <p class="font-mono text-xl pb-4">Sản phẩm được khách hàng lựa chọn thêm</p>
                    <hr class="w-16 m-auto rounded-full border-94e3df h-1.5">
                </div>
                <div class="product flex justify-around mt-12">
                    <div class="items text-center w">
                        <div class="images box-shadow">
                            <img src="img/1.jpg">
                        </div>
                        <div class="product-name mt-4">
                            <h3 class="text-xl font-serif-1">Sữa tắm Victoria’s Secret...</h3>
                        </div>
                        <div class="price leading-75">
                            <span class="text-lg text-ef2c2c font-bold font-family">560.000₫</span>
                            <strike class="text-sm text-8d90a6">670.000₫</strike>
                        </div>
                        <div class="btn">
                            <a href="#">
                                <p
                                    class="rounded-full border-2 border-red-600 text-red-600 w-48 ml-12 leading-9 font-bold font-family hover:background-94e3df">
                                    THÊM VÀO GIỎ</p>
                            </a>
                        </div>

                    </div>
                    <div class="items text-center w">
                        <div class="images box-shadow">
                            <img src="img/2.jpg">
                        </div>
                        <div class="product-name mt-4">
                            <h3 class="text-xl font-serif-1">Kem chống nắng AHA</h3>
                        </div>
                        <div class="price leading-75">
                            <span class="text-lg text-ef2c2c font-bold font-family">350.000₫</span>
                            <strike class="text-sm text-8d90a6">370.000₫</strike>
                        </div>
                        <div class="btn">
                            <a href="#">
                                <p
                                    class="rounded-full border-2 border-red-600 text-red-600 w-48 ml-12 leading-9 font-bold font-family hover:background-94e3df">
                                    THÊM VÀO GIỎ</p>
                            </a>
                        </div>

                    </div>
                    <div class="items text-center w">
                        <div class="images box-shadow">
                            <img src="img/3.jpg">
                        </div>
                        <div class="product-name mt-4">
                            <h3 class="text-xl font-serif-1">Kem dưỡng da AHA</h3>
                        </div>
                        <div class="price leading-75">
                            <span class="text-lg text-ef2c2c font-bold font-family">420.000₫</span>
                            <strike class="text-sm text-8d90a6">450.000₫</strike>
                        </div>
                        <div class="btn">
                            <a href="#">
                                <p
                                    class="rounded-full border-2 border-red-600 text-red-600 w-48 ml-12 leading-9 font-bold font-family hover:background-94e3df">
                                    THÊM VÀO GIỎ</p>
                            </a>
                        </div>

                    </div>
                    <div class="items text-center w">
                        <div class="images box-shadow">
                            <img src="img/4.jpg">
                        </div>
                        <div class="product-name mt-4">
                            <h3 class="text-xl font-serif-1">Dầu dưỡng da Phytoceuticals...</h3>
                        </div>
                        <div class="price leading-75">
                            <span class="text-lg text-ef2c2c font-bold font-family">169.000₫</span>
                            <strike class="text-sm text-8d90a6">196.000₫</strike>
                        </div>
                        <div class="btn">
                            <a href="#">
                                <p
                                    class="rounded-full border-2 border-red-600 text-red-600 w-48 ml-12 leading-9 font-bold font-family hover:background-94e3df">
                                    THÊM VÀO GIỎ</p>
                            </a>
                        </div>

                    </div>
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
    <div id="footer">
        <div class="site-footer">
            <div class="row-footer-1">
                <div class="row-title-footer">
                    <p>ĐỊA CHỈ</p>
                    <hr>
                </div>
                <div class="row-content-footer">
                    <div class="row-icon-footer">
                        <p><i class="fas fa-phone-alt"></i></i></p>
                        <p><i class="fa fa-map-marker"></i></p>
                        <p><i class="fa fa-envelope"></i></p>
                    </div>
                    <div class="row-content-infor">
                        <p>0123456789</p>
                        <p>Thăng Bình, Quảng Nam</p>
                        <p>ttkhang.19i@cit.udn.vn</p>
                    </div>
                </div>
            </div>
            <div class="row-footer-1">
                <div class="row-title-footer">
                    <p>HƯỚNG DẪN</p>
                    <hr>
                </div>
                <div class="row-content-footer">
                    <div class="row-content-infor">
                        <p>Trang Chủ</p>
                        <p>Giới Thiệu</p>
                        <p>Sản Phẩm</p>
                        <p>Tin Tức</p>
                        <p>Liên Hệ</p>
                    </div>
                </div>
            </div>
            <div class="row-footer-1">
                <div class="row-title-footer">
                    <p>CHÍNH SÁCH</p>
                    <hr>
                </div>
                <div class="row-content-footer">
                    <div class="row-content-infor">
                        <p>Trang Chủ</p>
                        <p>Giới Thiệu</p>
                        <p>Sản Phẩm</p>
                        <p>Tin Tức</p>
                        <p>Liên Hệ</p>
                    </div>
                </div>
            </div>
            <div class="row-footer-1">
                <div class="row-title-footer">
                    <p>CÂU HỎI THƯỜNG GẶP</p>
                    <hr>
                </div>
                <div class="row-content-footer">
                    <div class="row-content-infor">
                        <p>Trang Chủ</p>
                        <p>Giới Thiệu</p>
                        <p>Sản Phẩm</p>
                        <p>Tin Tức</p>
                        <p>Liên Hệ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>