<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/css/profile.css">
    <script src="/js/profile.js"></script>
    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
</head>
<body>
    @include('layout/header')
    <div class = "profile" style="background-color: #f5f5f5;height: 1200px;">
         <div class  = "page-profile" style="display: flex;">
            <div class = "page-left-profile" style="width: 20%;">
                 <div class="account-customer" style="display:flex;">
                    @if(session()->has('user'))
                       <div class = "images-account">
                            <img src="/img/account_circle_grey_192x192.png" style="width: 48px;padding-top:1rem;">
                       </div>
                      
                       <div class = "infor-account" style="margin-top: 19px; line-height: 23px; margin-left: 6px;">
                            <p style = "font-weight: bold;margin:0;">{{ Session::get('user')[0]->TenDangNhap}}</p>
                            <p style="color:grey;margin:0;"><i class="fas fa-edit"></i> Sửa Hồ Sơ</p>
                       </div>
                    @endif
                 </div>
                  <div class = "content-profile" style="margin-top:2rem;padding-left:10px;line-height:2rem;display:block;">
                      <div class = "infor-account-customer" style="font-size:17px;">
                          <div class  = "title-infor-account" style="display:flex;">
                               <img src = "/img/3065_man_c-512.png" style="width: 22px;height:22px;">
                               <p style="margin: 0;line-height: 24px;  padding-left: 10px;cursor: pointer;" onclick="openProfile()" >Tài khoản của tôi</p>
                          </div>
                          <div class = "content-file" style="padding-left: 1rem;display:none;">
                              <ul style="list-style: none;padding-left: 1rem;line-height: 30px;cursor: pointer;">
                                  <li onclick =" openInformationCustomer()">Hồ Sơ</li>
                                  <li onclick = "openFormResetAddress()">Địa Chỉ</li>
                                  <li onclick ="openFormChangePassword()">Đổi Mật Khẩu</li>
                                  
                              </ul>
                          </div>
                         
                      </div>
                      <div class = "purchase-menu" style="display:flex;padding-left:5px;">
                          <i class="fas fa-file-invoice" style="color: deepskyblue;line-height: 3rem;font-size:18px;"></i>
                          <p style="margin:0;padding-left:1rem;line-height: 3rem;cursor: pointer;" onclick=" openFormAllBillProduct()">Đơn mua</p>
                          </div>
                  </div>
           </div>
           <div class = "page-right-profile">
             <div class  = "profile-personal-information" style="padding-left: 1rem;padding-top:1rem;">
                <div class = "title-infor-profile" style = "border-bottom:1px solid #ccc;">
                        <span style="font-size:18px;">Hồ Sơ Của Tôi</span>
                        <p style="color:gray;">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class = "content-my-profile" style="margin-top: 1rem;line-height: 3rem;font-size: 15px;color: gray;" >
                        <div class = "user-name">
                            Tên Đăng Nhập <span style="padding-left: 5rem;color:black;">trieuditu2k3</span>
                        </div>
                        <div class = "email">
                            Email  <span style="padding-left: 9.875em;color:black;">trieuditu@gmail.com </span>
                        </div>
                        <div class = "change-email">
                            Email mới  <input type = "text" style="width: 460px; height: 35px;margin-left:7.5rem;">
                        </div>
                        <div class = "btn-change" style="width: 50%;margin:auto;">
                            <button type = button>Lưu</button>
                        </div>
                    </div>
             </div>
             <div class  = "change-password" style="padding-left:1rem;padding-top:1rem;display:none;">
                <div class = "title-infor-password" style = "border-bottom:1px solid #ccc;">
                        <span style="font-size:18px;">Đổi Mật Khẩu</span>
                        <p style="color:gray;">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                </div>
                <div class = "infor-change-password" >
                    <div class  = "password-old">
                        Mật Khẩu Hiện Tại  <input type = "text" style="margin-left:1rem;">
                    </div>
                    <div class  = "password-new">
                        Mật Khẩu Mới  <input type="text"style="margin-left:3rem;">
                    </div>
                    <div class  = "confirm-password">
                        Xác nhận mật khẩu <input type="text" style="margin-left:0.75rem;">
                    </div>
                    <div class  = "btn-change-password" style="width: 45%;margin:auto;">
                        <button type = "button">Xác nhận</button>
                    </div>
                </div>
             </div>
             <div class  = "reset-address" style="padding-left: 1rem;display:none;">
                  <div class = "title-reset-address" style="border-bottom: 1px solid #ccc;padding:15px;font-size: 20px;">
                      Địa Chỉ Của Tôi
                  </div>
                  <div class  = "content-change-address" style="display: flex;line-height: 2rem;font-size:15px;margin-top: 1rem;">
                      <div class = "infor-all-address-customer" style="width: 50%;margin:auto;">
                          <div class = "first-last-name">
                              Họ & Tên  <span style="padding-left:2rem;">Triệu Di Tú</span>
                          </div>
                          <div class = "number-phone">
                              Số điện thoại  <span style="padding-left:1rem;">(+84)&nbsp;98765432</span>
                          </div>
                          <div class  = "address" style="display: flex;">
                              Địa chỉ 
                              <div style="max-width: 40%;padding-left: 3.3675rem;">Thôn Chợ Kiến,Xã Cô Tô,Huyện Trí Tôn,An Giang</div>
                          </div>
                      </div>  
                      <div class  = "edit-delete-address" style="display: flex;width: 30%;">
                          <div class  = "edit-address" style="padding-right: 1rem;">
                              <span>Sửa</span>
                          </div>
                          <div class  = "delete-address">
                              <span>Xóa</span>
                          </div>
                      </div>
                  </div>
             </div>
             <div class  = "bill-buy-product" style="display:none;">
                @include('component/bill')
             </div>
           </div>
    </div>
</div>
</body>
</html>