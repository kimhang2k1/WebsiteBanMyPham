<!DOCTYPE html>

<head>
    <title>Liên Hệ</title>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


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
    <div class="w-4/5 m-auto flex text-center">
        <div class="contact text-center">
            <p class="font-normal md:font-bold text-3xl san-serif py-9 ">Liên Hệ Với Chúng Tôi</p>
            <p class="text-gray-400 w-3/5 m-auto">Để liên hệ và nhận các thông in khuyến mại sớm nhất, xin vui lòng điền đầy đủ
                thông tin của bạn vào form dưới đây.
                Chúng tôi sẽ liên lạc lại với bạn trong thời gian sớm nhất</p>
            <div class="form-contact">
                <input class="rounded-full py-3 px-6 border-2 border-gray-300 my-5 w-72" type="text"
                    placeholder="Họ và tên">
                <input class="rounded-full py-3 px-6 border-2 border-gray-300 my-5 mx-2 w-72" type="text"
                    placeholder="Số điện thoại">
                <p><input class="rounded-full py-3 px-6 border-2 border-gray-300 w-1/2" type="text" placeholder="Email">
                </p>
                <p><input class="rounded-lg px-6 py-3 border-2 border-gray-300 my-5 w-1/2 h-32 " type="text"
                        placeholder="Nội dung"></p>
            </div>
            <div class="btn-contact">
                <button class="rounded-full px-6 py-3 bg-green-300 text-white" type="submit">Gửi liên hệ</button>
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
    </div>
</body>

</html>