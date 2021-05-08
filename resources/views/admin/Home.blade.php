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
    <script src="/js/process-admin.js"></script>
    <title>Document</title>
    <style>
        table tr td {
            line-height: 2rem;
            border: 1px solid #ccc;
            text-align: center;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        tr {
            text-align: center;
        }

        th {
            width: 1%;
            white-space: nowrap;
            text-align: center;
        }

        td {
            width: 1%;
            white-space: nowrap;
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
              {{ Session::get('account')[0]->Ten}}
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
                    <p class="font-bold">      {{ Session::get('account')[0]->Ten}}</p>
                    <p class="text-sm text-gray-200">      {{ Session::get('account')[0]->Email}}</p>

                </div>
            </div>
            <div class="w-full mt-4">
                <div class="w-full text-white py-4 pl-4" style="background-color: cadetblue;">
                    CHỨC NĂNG HỆ THỐNG
                </div>
                <div class="home w-full p-4  hover:bg-gray-300 " onclick="openManagement(0)">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <span class="material-icons">
                                leaderboard
                            </span>
                        </div>
                        <div class="w-full">
                            Bảng Điều Khiển
                        </div>
                    </div>
                </div>
                <div class="manage w-full p-4 hover:bg-gray-300" onclick="openManagement(1)">
                    <div class="w-full flex text-white" style="padding-left: 3px;">
                        <div class="icon pr-3.5">
                            <span class="material-icons">
                                description
                            </span>

                        </div>
                        <div class="w-full">
                            Quản lý sản phẩm
                        </div>
                    </div>
                </div>
                <div class="order w-full p-4  hover:bg-gray-300" onclick="openManagement(2)">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <span class="material-icons">
                                print
                            </span>

                        </div>
                        <div class="w-full">
                            Quản lý đơn hàng
                        </div>
                    </div>
                </div>
                <div class="customer w-full p-4 hover:bg-gray-300" onclick="openManagement(3)">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <span class="material-icons">
                                manage_accounts
                            </span>
                        </div>
                        <div class="w-full">
                            Quản lý khách hàng
                        </div>
                    </div>
                </div>
                <div class="customer w-full p-4  hover:bg-gray-300" onclick="openManagement(4)">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <span class="material-icons">
                                supervisor_account
                            </span>
                        </div>
                        <div class="w-full">
                            Quản lý tài khoản
                        </div>
                    </div>
                </div>
                <div class="customer w-full p-4 hover:bg-gray-300" onclick="openManagement(5)">
                    <div class="w-full flex text-white">
                        <div class="icon pr-3.5">
                            <span class="material-icons">
                                dashboard
                            </span>
                        </div>
                        <div class="w-full">
                            Quản lý danh mục sản phẩm
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-4/5">
            <div class="w-full flex justify-evenly  m-4 font-timenewroman managements" id="statistical">
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
            <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                @include('admin/component/ProductManagement', ['product' =>$product])
            </div>
            <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                @include('admin/component/OrderManagement')
            </div>
            <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                @include('admin/component/AccountManagement')
            </div>
            <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                @include('admin/component/CustomerManagement')
            </div>
            <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                @include('admin/component/CategoryManagement')
            </div>

        </div>
    </div>
</body>

</html>