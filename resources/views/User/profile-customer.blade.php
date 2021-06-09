<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/profile.js"></script>
    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
</head>

<body>
    @include('User/layout/header')
    <div class="profile" style="background-color: #f5f5f5;padding-bottom: 2rem;">
        <div class="page-profile" style="display: flex;">
            <div class="page-left-profile" style="width: 20%;">
                <div class="account-customer" style="display:flex;">
                    @if(session()->has('user'))
                    <div class="images-account">
                        <img src="/img/account_circle_grey_192x192.png" style="width: 48px;padding-top:1rem;">
                    </div>

                    <div class="infor-account" style="margin-top: 19px; line-height: 23px; margin-left: 6px;">
                        <p style="font-weight: bold;margin:0;">{{ Session::get('user')[0]->Email}}</p>
                        <p style="color:grey;margin:0;"><i class="fas fa-edit"></i> Sửa Hồ Sơ</p>
                    </div>
                    @endif
                </div>
                <div class="content-profile" style="margin-top:2rem;padding-left:10px;line-height:2rem;display:block;">
                    <div class="infor-account-customer" style="font-size:17px;">
                        <div class="title-infor-account" style="display:flex;">
                            <img src="/img/3065_man_c-512.png" style="width: 22px;height:22px;">
                            <p style="margin: 0;line-height: 24px;  padding-left: 10px;cursor: pointer;" onclick="openProfile()">Tài khoản của tôi</p>
                        </div>
                        <div class="content-file" style="padding-left: 1rem;display:none;">
                            <ul style="list-style: none;padding-left: 1rem;line-height: 30px;cursor: pointer;">
                                <li onclick=" openInformationCustomer()">Hồ Sơ</li>
                                <li onclick="openFormResetAddress()">Địa Chỉ</li>
                                <li onclick="openFormChangePassword()">Đổi Mật Khẩu</li>

                            </ul>
                        </div>

                    </div>
                    <div class="purchase-menu" style="display:flex;padding-left:5px;">
                        <i class="fas fa-file-invoice" style="color: deepskyblue;line-height: 3rem;font-size:18px;"></i>
                        <p style="margin:0;padding-left:1rem;line-height: 3rem;cursor: pointer;" onclick=" openFormAllBillProduct()">Đơn mua</p>
                    </div>
                </div>
            </div>
            <div class="page-right-profile">
                <div class="profile-personal-information" style="padding-left: 1rem;padding-top:1rem;">
                    <div class="title-infor-profile" style="border-bottom:1px solid #ccc;">
                        <span style="font-size:18px;">Hồ Sơ Của Tôi</span>
                        <p style="color:gray;">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class="content-my-profile" style="margin-top: 1rem;line-height: 3rem;font-size: 15px;color: gray;">
                        @foreach($ttkh as $kh)
                        <div class="email">
                            Email <span style="padding-left: 9.875em;color:black;">{{$kh->Email}} </span>
                        </div>
                        <div class="change-email">
                            Email mới <input type="text" style="width: 460px; height: 35px;margin-left:7.5rem;">
                        </div>
                        <div class="btn-change" style="width: 50%;margin:auto;">
                            <button type=button>Lưu</button>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="change-password" style="padding-left:1rem;padding-top:1rem;display:none;">
                    <div class="title-infor-password" style="border-bottom:1px solid #ccc;">
                        <span style="font-size:18px;">Đổi Mật Khẩu</span>
                        <p style="color:gray;">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                    </div>
                    <div class="infor-change-password">
                        <div class="password-old">
                            Mật Khẩu Hiện Tại <input type="password" style="margin-left:1rem;">
                        </div>
                        <div class="password-new">
                            Mật Khẩu Mới <input type="password" style="margin-left:3rem;">
                        </div>
                        <div class="confirm-password">
                            Xác nhận mật khẩu <input type="password" style="margin-left:0.75rem;">
                        </div>
                        <div class="btn-change-password" style="width: 45%;margin:auto;">
                            <button type="button">Xác nhận</button>
                        </div>
                    </div>
                </div>
                <div class="reset-address" style="padding-left: 1rem;display:none;">
                    <div class="title-reset-address" style="border-bottom: 1px solid #ccc;padding:15px;font-size: 20px;">
                        Địa Chỉ Của Tôi
                    </div>
                    <div id="all-address">
                        @include('User/component/allMyAddress', ['dc' => $dc, 'diaChi'=> $diaChi])
                    </div>
                </div>
                <div class="bill-buy-product" style="display:none;">
                    <div style="border:1px solid #ccc;">
                        <div class="title-bill" style="font-size:20px;padding:15px;display:flex;width: 40%;margin:auto;">
                            <img src="/img/bill.png" style="width: 35px;height:35px;">
                            <p style="margin:0;line-height:38px;"> Tất Cả Các Đơn Hàng Đã Mua</p>
                        </div>
                    </div>
                    <div id = "billcustomer">
                        @include('User/component/bill', ['order' => $order, 'bill' => $bill])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('User/layout/footer')
    <div class="insert-address" id="edit-address" style="display: none;">
        @include('User/component/form-edit-address', ['thanhPho' => $thanhPho, 'quan' => $quan, 'xa' => $xa, 'input' => $input])
    </div>
</body>

</html>