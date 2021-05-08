<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Đăng Nhập</title>

</head>
<body style="background-color: silver;">
    <div class = "container p-40 ">
       <div class = " w-1/2 m-auto border-2 border-grey-400 pt-4 pb-4 bg-white shadow-xl">
            <div class = "w-1/4 m-auto">
                <img src= "/img/logo.png" class = "w-full">
            </div> 
            <form action = "xulidangnhap" method="POST">
            {{ csrf_field() }}
                <div class = "text-center font-serif mt-10">
                    <p>Tên Đăng Nhập <input type="text" name = "username" placeholder="Nhập tên đăng nhập" class = "border-2 border-grey-500 px-10 py-2 ml-1 "></p>
                    <p>Mật Khẩu <input type="password" name = "pass"  placeholder = "Mật Khẩu" value = "" class = "border-2 border-grey-500 px-10 py-2 ml-11 mt-3"></p>
                </div>
                <div class = "btn text-center font-serif">
                    <button type = "submit" class = "border-2 border-blue-400 bg-blue-400 p-2 text-white rounded-md my-4 mx-4 ml-20">Đăng Nhập</button>
                </div>
            </form>
       </div>
    </div>
</body>
</html>