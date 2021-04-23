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
    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
</head>
<body>
    @include('layout/header')
    <div class = "profile">
         <div class  = "page-profile">
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
                  <div class = "content-profile" style="margin-top:2rem;color:grey;padding-left:10px;">
                      <div class = "infor-account-customer" style="font-size:17px;">
                          <div class  = "title-infor-account" style="display:flex;">
                               <img src = "/img/3065_man_c-512.png" style="width: 22px;height:22px;">
                               <p style="margin: 0;line-height: 24px;  padding-left: 5px;">Tài khoản của tôi</p>
                          </div>
                          <div class = "content-file" style="padding-left: 1rem;">
                              <ul style="list-style: none;padding-left: 1rem;line-height: 30px">
                                  <li>Hồ Sơ</li>
                                  <li>Địa Chỉ</li>
                              </ul>
                          </div>
                         
                      </div>
                      <div class = "purchase-menu" style="display:flex;">
                          <i class="fas fa-file-invoice" style="color: deepskyblue;"></i>
                          <p style="margin:0;padding-left:1rem;">Đơn mua</p>
                          </div>
                  </div>
                </div>
           </div>
    </div>
</body>
</html>