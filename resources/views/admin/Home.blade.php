<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/Admin/home.css">
    <title>Document</title>
</head>

<body>
    <div class="w-full flex">
        <div class=" bg-2A3F54 text-sm" style="width: 20%;">
            <div class="logo w-96 pl-4 pt-1 pb-1.5">
                <img src="/img/logo.png" class="w-2/5">
            </div>
            <div class="w-full flex pl-3.5 mt-4">
                <div class="user">
                    <img src="/img/admin.png" class="w-20">
                </div>
                <div class="w-full ml-2 font-serif text-white pt-3">
                    <p class="text-sm text-gray-200">Xin Chào</p>
                    <p class="font-bold">Admin</p>
                </div>
            </div>
            <div class="w-full mt-4">
                <div class  = "w-full text-white py-4 bg-black pl-4">
                    CHỨC NĂNG HỆ THỐNG
                </div>
                <div class="home w-full p-4 border-b-2  hover:bg-gray-300 " style="border-bottom:1px solid #ccc;">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="w-full">
                            Bảng Điều Khiển
                        </div>
                    </div>
                </div>
                <div class="manage w-full p-4 hover:bg-gray-300" style="border-bottom:1px solid #ccc;">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                             <i class="fas fa-tasks"></i>
                        </div>
                        <div class="w-full">
                            Quản lý sản phẩm
                        </div>
                    </div>
                </div>
                <div class="order w-full p-4 border-b-2 hover:bg-gray-300" style="border-bottom:1px solid #ccc;">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="w-full">
                            Quản lý đơn hàng
                        </div>
                    </div>
                </div>
                <div class="customer w-full p-4 border-b-2 hover:bg-gray-300" style="border-bottom:1px solid #ccc;">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <i class="fas fa-user-alt"></i>
                        </div>
                        <div class="w-full">
                            Quản lý khách hàng
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "w-4/5">
           <div class = "w-full" style = "height: 4.25rem;background-color: #2A3F54;">
                <div class = "text-white pr-8 pl-3" style="float:right;line-height: 4rem;">
                    Admin
                </div>
                <div class = "pt-4" style= "float:right" >
                    <img src = "/img/admin.png" class = "w-8">
                </div>
           </div>
           <div class = "w-full flex">
               <div class = "w-1/4 pl-20 pt-8 pb-8 pr-4 text-right text-white text-xl m-4" style="border:1px solid orangered;background-color: orangered;">
                   <span>0</span>
                   <p>Tổng số sản phẩm</p>
               </div>
               <div class = "w-1/4  pt-8 pb-8 pr-4 text-right text-white text-xl m-4" style="border:1px solid green;background-color: green;">
                   <span>0</span>
                   <p>Tổng doanh thu trong ngày</p>
               </div>
               <div class = "w-1/4  pt-8 pb-8 pr-4 text-right text-white text-xl m-4" style="border:1px solid blue;background-color: blue;">
                   <span>0</span>
                   <p>Tổng Hóa Đơn Trong Ngày</p>
               </div>
           </div>
        </div>
    </div>
</body>
</html>