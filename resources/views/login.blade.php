<!DOCTYPE html>
<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
                   <h1>Đăng Nhập</h1>
               </div>
               <form method = "POST" action = "{{route('login')}}">
               <div class = "form-input-login">
                  <p>Email <span>*</span> </p>
                  <p><input type="text" name = "email" placeholder="example@gmail.com"></p>
                  <p>Mật Khẩu <span>*</span></p>
                  <p><input type = "password" name = "password" placeholder="Mật Khẩu"></p>
                  <p><button type="submit">ĐĂNG NHẬP</button></p>
                </form>
               </div>
               <div class = "account-not-register">
                   <p><a href="#">Quên Mật Khẩu</a></p>
                   <p>Chưa có tài khoản đăng ký <u><a href="regist.html" style="color: red;">tại đây</a></u></p>
               </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>
</html>