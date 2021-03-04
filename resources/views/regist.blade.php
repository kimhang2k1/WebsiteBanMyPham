<!DOCTYPE html>
<head>
    <title>Đăng Ký Tài Khoản</title>
    <link rel="stylesheet" type="text/css" href="css/regist.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

</head>
<body>
    @include('layout/header')
    <div id = "form-login">
        <div class = "login-web">
            <div class = "part-left">
                <img src = "img/bg_login.jpg">
            </div>
            <div class = "form-login">
               <div class = "title-form-login">
                   <h1>Đăng Ký</h1>
               </div>
               <form method = "POST" action = "xulidangki">
               {{ csrf_field() }}
               <div class = "form-input-login">
                  <p>Họ Tên <span>*</span> </p>
                  <p><input type="text" name = "name_user" placeholder="Họ Tên"></p>
                  <p>Email <span>*</span> </p>
                  <p></p><input type="text" name = "email" placeholder="Email"></p>
                  <p>Mật Khẩu <span>*</span></p>
                  <p><input type = "password" name = "password" placeholder="Mật Khẩu"></p>
                  <p>Điện thoại <span>*</span></p>
                  <p><input type = "text" name = "phone" placeholder="SDT"></p>
                  <p>Địa Chỉ <span>*</span></p>
                  <p><input type = "text" name = "address" placeholder="Địa Chỉ"></p>
                  <p><button type="submit">ĐĂNG KÝ</button></p>        
               </div>
               </form>
               <div class = "account-not-register">
                   <p>Đã có tài khoản đăng nhập <u><a href="#" style="color: red;">tại đây</a></u></p>
               </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
   
</body>
</html>