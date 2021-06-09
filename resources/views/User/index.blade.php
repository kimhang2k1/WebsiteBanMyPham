<!DOCTYPE html>

<head>
    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    @include('User/layout/header')
    <div id="advertisement">
        <div class="slide-1">
            <img src="img/slider_1.jpg">
        </div>
        <div class="slide-2">
            <div class="advertisement-1st">
                <img src="img/banner_offset_1.jpg">
            </div>
            <div class="advertisement-2nd">
                <img src="img/banner_offset_2.jpg">
            </div>
        </div>
    </div>
    <div id="product-introduction">
        <div class="about-product">
            <div class="title">
                <h2><span>Giới thiệu</span></h2>
                <div class="title-introduction">
                    <p>Giới thiệu về Delta Comestic Việt Nam</p>
                    <hr>
                </div>
            </div>
            <div class="content">
                <p>Công ty Delta Csosmetic Việt Nam trực tiếp sản xuất các dòng mỹ phẩm thiên nhiên- không theo trào lưu
                    mỹ phẩm công nghiệp hiện hành, công ty đi theo hướng phát triển bền vững, lâu dài các dòng mỹ phẩm
                    được
                    làm handmade “BÀN TAY VÀ KHỐI ÓC CON NGƯỜI” làm chủ thể!
                </p>
            </div>
            <div class="star">
                <p><i class="fas fa-star"></i></p>
                <p><i class="fas fa-star"></i></p>
                <p><i class="fas fa-star"></i></p>
                <p><i class="fas fa-star"></i></p>
                <p><i class="fas fa-star"></i></p>
            </div>
            <div class="product-line">
                <div class="col-title-product">
                    <p>CÁC DÒNG SẢN PHẨM CỦA DELTA COMESTIC VIỆT NAM</p>
                </div>
                <div class="item">
                    <?php
                     use Illuminate\Support\Facades\DB;
                    ?>
                    @foreach($category as $nsp)
                    <div class="col-item-1">
                        <div class="name-product">
                            <p>{{ $nsp->TenNhom }}</p>
                        </div>
                        <?php

                       

                        $countCategory = DB::table('sanpham')->where('IDNhomSP', '=', $nsp->IDNhomSP)->get();
                        ?>
                        <div class="amount-product">
                            <i>{{ count($countCategory)}} sản phẩm</i>
                        </div>
                        <div class="img">
                            <img src="/img/{{ $nsp->AnhSanPham }}">
                        </div>
                    </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="new-product">
        <div class="new-item-product">
            <div class="title">
                <img src="img/flower.PNG">
                <h2><span>Sản phẩm mới</span></h2>
                <div class="title-introduction">
                    <p>Những sản phẩm được khách hàng lựa chọn nhiều nhất</p>
                    <hr>
                    </p>
                </div>
            </div>
            <div class="product">
                @for($i = 0;$i < sizeof($product); $i++) <div class="product-frame">
                    <div class="images-product">
                        <a href="{{ url('sanpham/thongtinsanpham/'.$product[$i]->IDSanPham.'&&'.$product[$i]->IDNhomSP) }}"> <img src="./img/{{ $product[$i]->HinhAnh }}"></a>
                    </div>
                    <div class="product-name">
                        <h3>
                            <a href="{{ url('sanpham/thongtinsanpham/'.$product[$i]->IDSanPham.'&&'.$product[$i]->IDNhomSP) }}" style="text-decoration:none;color:black;">
                                <p>{{ $product[$i]->TenSanPham }}</p>
                            </a>
                        </h3>
                    </div>
                    <div class="price-product">
                        <span>{{ number_format($product[$i]->GiaSP)}}</span>
                    </div>
                    <div class="button-cart">
                        <a href="{{ url('sanpham/thongtinsanpham/'.$product[$i]->IDSanPham.'&&'.$product[$i]->IDNhomSP) }}">
                            <p>Xem Chi Tiết</p>
                        </a>
                    </div>
            </div>
            @endfor

        </div>
    </div>
    </div>
    <div id="distributors">
        <div class="item-distributors">
            <div class="title">
                <img src="img/flower.PNG">
                <h2><span>Nhà phân phối tiêu biểu và đánh giá khách hàng</span></h2>
                <div class="title-introduction">
                    <p>Danh sách các nhà phân phối, các đại lý tiêu biểu và đánh giá của khách hàng về
                        sản phẩm của Delta Cosmetic Việt Nam</p>
                    <hr>
                    </p>
                </div>
            </div>
            <div class="supplier-list">
                <div class="table-supplier-list">
                    <p>Danh sách nhà phân phối & đại lý tiêu biểu</p>
                    <table>
                        <tr>
                            <th><i>Tên</i></th>
                            <th><i>Cấp bậc</i></th>
                            <th><i>Khu vực</i></th>
                        </tr>
                        <tr>
                            <td>Lê Việt Nga</td>
                            <td>NPP Vàng</td>
                            <td>Đà Nẵng</td>
                        </tr>
                        <tr>
                            <td>Nguyễn Thị Hằng</td>
                            <td>NPP</td>
                            <td>Q.Bình Tân</td>
                        </tr>
                        <tr>
                            <td>Nguyễn Thanh Thảo</td>
                            <td>NPP</td>
                            <td>Đà Nẵng</td>
                        </tr>
                        <tr>
                            <td>Thùy Linh</td>
                            <td>Đại Lý</td>
                            <td>Hà Nội</td>
                        </tr>
                        <tr>
                            <td>Hoa Lan</td>
                            <td>Đại Lý</td>
                            <td>Q.Gò Vấp</td>
                        </tr>
                    </table>
                </div>
                <div class="comment-customs">
                    <p>Nhận xét của khách hàng</p>
                    <div class="information-customs">
                        <div class="images-custom">
                            <img src="img/image_dg_3.jpg">
                            <p>Khách hàng</p>
                        </div>
                        <div class="name-custom">
                            <p>Thu Trang</p>
                        </div>
                        <div class="comment">
                            <p>
                                "Sản phẩm dùng rất tốt, hợp cho mọi lứa tuổi, 100% thiên nhiên, rất an toàn".
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="product-trend">
        <div class="the-item-product-trend">
            <div class="title">
                <img src="img/flower.PNG">
                <h2><span>Sản phẩm xu hướng</span></h2>
                <div class="title-introduction">
                    <p>Những sản phẩm được khách hàng lựa chọn nhiều nhất</p>
                    <hr>
                    </p>
                </div>
            </div>
            <div class="product">
                @foreach($product_1 as $pro)
                <div class="product-frame">
                    <div class="images-product">
                        <a href="{{ url('sanpham/thongtinsanpham/'.$pro->IDSanPham.'&&'.$pro->IDNhomSP) }}"> <img src="./img/{{ $pro->HinhAnh }}"></a>
                    </div>
                    <div class="product-name">
                        <h3>
                            <a href="{{ url('sanpham/thongtinsanpham/'.$pro->IDSanPham.'&&'.$pro->IDNhomSP) }}" style="text-decoration: none;color:black;">
                                <p>{{ $pro->TenSanPham }}</p>
                            </a>
                        </h3>
                    </div>
                    <div class="price-product">
                        <span>{{ number_format($pro->GiaSP)}}</span>

                    </div>
                    <div class="button-cart">
                        <a href="{{ url('sanpham/thongtinsanpham/'.$pro->IDSanPham.'&&'.$pro->IDNhomSP) }}">
                            <p>Xem Chi Tiết</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="tips">
        <div class="tips-beauty">
            <div class="title">
                <img src="img/flower.PNG">
                <h2><span>Tin tức & Mẹo</span></h2>
                <div class="title-introduction">
                    <p>Nắm bắt những tin tức & mẹo vặt mới nhất</p>
                    <hr>
                    </p>
                </div>
            </div>
            <div class="news-beauty">
                <div class="beauty">
                    <div class="images-tips-beauty">
                        <img src="img/mat-na-duong-da-4311.jpg">
                    </div>
                    <div class="content-tips">
                        <a href="#">
                            <p>Chị em đua nhau uống colagen để căng da</p>
                        </a>
                    </div>
                    <div class="btn-view">
                        <a href="#">
                            <p>CHI TIẾT <i class="fas fa-chevron-right"></i></p>
                        </a>
                    </div>
                </div>
                <div class="beauty">
                    <div class="images-tips-beauty">
                        <img src="img/dung-nuoc-hoa-hong-39069.jpg">
                    </div>
                    <div class="content-tips">
                        <a href="#">
                            <p>Lớp trang điểm bền màu cả ngày nhờ 5 loại kem lót</p>
                        </a>
                    </div>
                    <div class="btn-view">
                        <a href="#">
                            <p>CHI TIẾT <i class="fas fa-chevron-right"></i></p>
                        </a>
                    </div>
                </div>
                <div class="beauty">
                    <div class="images-tips-beauty">
                        <img src="img/nuoc-hoa-hong.jpg">
                    </div>
                    <div class="content-tips">
                        <a href="#">
                            <p>8 công dụng tuyệt vời của Toner hoa hồng sâm</p>
                        </a>
                    </div>
                    <div class="btn-view">
                        <a href="#">
                            <p>CHI TIẾT <i class="fas fa-chevron-right"></i></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="policy">
        <div class="policies">
            <div class="free-ship">
                <div class="images">
                    <img src="img/imgcs_1.png">
                </div>
                <div class="content-policy">
                    <p>Miễn Phí Ship</p>
                    <span>Cho đơn hàng trên 1 triệu</span>
                </div>
            </div>
            <div class="free-ship">
                <div class="images">
                    <img src="img/imgcs_2.png">
                </div>
                <div class="content-policy">
                    <p>Tư Vấn Miễn Phí</p>
                    <span>Không mua không sao</span>
                </div>
            </div>
            <div class="free-ship">
                <div class="images">
                    <img src="img/imgcs_3.png">
                </div>
                <div class="content-policy">
                    <p>Tri ân</p>
                    <span>Rất nhiều ưu đãi và quà</span>
                </div>
            </div>
            <div class="free-ship" style="border: 0;">
                <div class="images">
                    <img src="img/imgcs_4.png">
                </div>
                <div class="content-policy">
                    <p>24/7 hỗ trợ online</p>
                    <span>Luôn có nhân viên hỗ trợ</span>
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
    @include('User/layout/footer')

</body>

</html>