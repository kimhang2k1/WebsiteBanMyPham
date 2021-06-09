<!DOCTYPE html>
<head>
    <title>Đăng Ký Tài Khoản</title>
    <link rel="stylesheet" type="text/css" href="css/regist.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

</head>
<body>
    @include('User/layout/header')
    <div id = "form-login">
        <div class = "login-web">
            <div class = "part-left">
                <img src = "img/bg_login.jpg">
            </div>
            <div class = "form-login">
               <div class = "title-form-login">
                   <h1>Đăng Ký</h1>
               </div>
               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style = "padding:0;">
                        @foreach ($errors->all() as $error)
                            <li style = "list-style: none; padding: 10px; background: pink;color: red;
                           "><i class="fas fa-exclamation-triangle" style = "padding-right:10px;"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
               <form method = "POST" action = "xulidangki">
               {{ csrf_field() }}
               <div class = "form-input-login">
                  <p>Email <span>*</span> </p>
                  <p></p><input type="email" name = "email" placeholder="Email" value = "@isset($register){{$register['email']}}@endisset"></p>
                  <p>Mật Khẩu <span>*</span></p>
                  <p><input type = "password" name = "password" placeholder="Mật Khẩu" value ="@isset($register){{$register['password']}}@endisset"></p>
                  <p> Nhập lại Mật Khẩu <span>*</span></p>
                  <p><input type = "password" name = "password_clone" placeholder="Nhập lại Mật Khẩu" value ="@isset($register){{$register['password_clone']}}@endisset"></p>
                  <p><button type="submit">ĐĂNG KÝ</button></p>        
               </div>
               </form>
               <div class = "account-not-register">
                   <p>Đã có tài khoản đăng nhập <u><a href="#" style="color: red;">tại đây</a></u></p>
               </div>
            </div>
        </div>
    </div>
    @include('User/layout/footer')
   
</body>
</html>