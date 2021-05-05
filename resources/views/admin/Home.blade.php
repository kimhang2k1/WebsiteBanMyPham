<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/Admin/home.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <title>Document</title>
    <style>
        table tr td {
            line-height: 2rem;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="w-full flex">
        <div class="logo w-1/4 text-xl text-white pl-3 " style="line-height: 4rem;background-color: steelblue;">
            DELTA COMESTIC MANAGEMENT
        </div>
        <div class="w-3/4" style="height: 4.25rem;background-color: steelblue;">
            <div class="text-white pr-8 pl-3" style="float:right;line-height: 4rem;">
                Trà Thị Kim Hằng
            </div>
            <div class="pt-4" style="float:right">
                <img src="/img/admin.png" class="w-8">
            </div>
        </div>
    </div>
    <div class="w-full flex">
        <div class=" bg-2A3F54 text-sm" style="width: 20%;">
            <div class="w-full flex pl-3.5 mt-8">
                <div class="user">
                    <img src="/img/admin.png" class="w-20">
                </div>
                <div class="w-full ml-2 font-timenewroman text-white pt-3">
                    <p class="font-bold">Trà Thị Kim Hằng</p>
                    <p class="text-sm text-gray-200">trahang@gmail.com</p>

                </div>
            </div>
            <div class="w-full mt-4">
                <div class="w-full text-white py-4 pl-4" style="background-color: cadetblue;">
                    CHỨC NĂNG HỆ THỐNG
                </div>
                <div class="home w-full p-4  hover:bg-gray-300 ">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="w-full">
                            Bảng Điều Khiển
                        </div>
                    </div>
                </div>
                <div class="manage w-full p-4 hover:bg-gray-300">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="w-full">
                            Quản lý sản phẩm
                        </div>
                    </div>
                </div>
                <div class="order w-full p-4  hover:bg-gray-300">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="w-full">
                            Quản lý đơn hàng
                        </div>
                    </div>
                </div>
                <div class="customer w-full p-4 border-b-2 hover:bg-gray-300">
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
        <div class="w-4/5" style="background-color: whitesmoke;">
            <div class="w-full flex justify-evenly  m-4 font-timenewroman">
                <div class="w-60 rounded-lg pl-4 pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex" style="border:1px solid cornflowerblue;
               background-color: cornflowerblue;">
                    <div class="w-1/4 pt-3">
                        <img src="/img/box.png" class="w-12">
                    </div>
                    <div class="w-3/4 ">
                        <span class="text-3xl">0</span>
                        <p>Tổng sản phẩm</p>
                    </div>


                </div>
                <div class="w-80 rounded-lg  pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex" style="border:1px solid palevioletred;
               background-color:palevioletred;">
                     <div class="w-2/12 pt-4">
                        <img src="/img/money.png" class="w-12">
                    </div>
                    <div class="w-4/5 ">
                        <span class="text-3xl">0</span>
                        <p>Tổng doanh thu trong ngày</p>
                    </div>
                </div>
                <div class="w-1/4 rounded-lg pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl" style="border:1px solid cadetblue;background-color: cadetblue;">
                    <span class="text-3xl">0</span>
                    <p>Tổng Hóa Đơn Trong Ngày</p>
                </div>
                <div class="w-1/4 rounded-lg pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl" style="border:1px solid brown;background-color: brown;">
                    <span class="text-3xl">0</span>
                    <p>Tổng Khách Hàng </p>
                </div>
            </div>

            <div class = "w-full border-2 border-gray-100 bg-white font-timenewroman">
                 <div class = "form">
                    <h2 class = "p-4 text-xl font-bold">Tất Cả Sản Phẩm</h2>
                 </div>
                  <div class = "w-full pl-4 flex">
                      <div class = "input-search">
                            <input class = " pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type = "text" name = "search" placeholder="Mã / Tên Sản Phẩm">
                      </div>
                      <div class = "select">
                           <select class = "w-40 mx-4 pl-4 rounded-md" style="border:1px solid #ccc;height:35px;">
                               <option value = "">Son Môi</option>
                           </select>
                      </div>
                      <div class = "search">
                          <button class="w-12 text-white rounded-sm" type = "button" style="border:1px solid #2e6da4;height: 34px;background-color:#2e6da4 ;"><i class="fas fa-search"></i></button>
                      </div>
                      <div class = "insert">
                          <button type= "button">Thêm sản phẩm </button>
                      </div>
                  </div>
                  <table class = "m-4" style="width: 98%;font-size:16px;">
                     <tr>
                        <td>ID Sản Phẩm</td>
                        <td>Tên Sản Phẩm</td>
                        <td>Loại Sản Phẩm</td>
                        <td>Giá Sản Phẩm</td>
                        <td>Hình Ảnh</td>
                        <td>Thương Hiệu</td>
                        <td>Ngày Sản Xuất</td>
                        <td>Ngày Hết Hạn</td>
                        <td>Trạng Thái</td>
                        <td>Tác vụ</td>
                        
                     </tr>
                     <tr>
                        <td>SP00001</td>
                        <td>Son Kem Lì Velet Tint Version 1</td>
                        <td>Son Môi</td>
                        <td>121.000</td>
                        <td><img src = "/img/sonBlackRouge.jpg" class = "ml-6" style="width: 40px;margin-top:1px;margin-bottom:2px;"></td>
                        <td>Black Rouge</td>
                        <td>12/4/2020</td>
                        <td>12/4/2021</td>
                        <td><span class = "rounded-full text-white" style="background-color: lightseagreen;border:0;padding:6px;">Còn Hàng</span></td>
                        <td class = "text-xl">
                        <i class="fas fa-edit"style = "padding:8px;color:#2e6da4;"></i>
                        <i class="fas fa-trash-alt" style="color:red;"></i>
                        </td>
                     </tr>
                  </table>
            </div>

        </div>
    </div>
</body>

</html>