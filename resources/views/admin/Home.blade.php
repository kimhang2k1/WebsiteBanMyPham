<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/Admin/home.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/process-admin.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <title>Trang Chủ</title>
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

        input {
            border: 1px solid #ccc;
        }

        select {
            border: 1px solid #ccc;
        }

        .font-timenewroman {
            font-family: 'Times New Roman', Times, serif;
        }

        textarea {
            border: 1px solid #ccc;
        }

        #pie-chart {
            height: 400px;
        }
    </style>
</head>

<body>
    <div class="w-full">
        <div class="w-full flex">
            <div class="logo w-1/4 text-xl text-white pl-3 " style="line-height: 4rem;background-color: steelblue;">
                DELTA COMESTIC MANAGEMENT
            </div>
            <div class="w-3/4" style="height: 4.25rem;background-color: steelblue;">
                <div class="text-white pr-8 pl-3" style="float:right;line-height: 4rem;">
                    {{ Session::get('account')[0]->HoTen}}
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
                        <p class="font-bold"> {{ Session::get('account')[0]->HoTen}}</p>
                        <p class="text-sm text-gray-200"> {{ Session::get('account')[0]->Email}}</p>

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
                                Quản Lý Sản Phẩm
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
                                Quản Lý Đơn Hàng
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
                                Quản Lý Tài Khoản
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
                                Quản Lý Khách Hàng
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
                <div class=" managements" id="statistical">
                    <div class="w-full flex justify-evenly  m-4 font-timenewroman">
                        <div class="w-60 rounded-lg pl-4 pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex" style="border:1px solid cornflowerblue;
               background-color: cornflowerblue;">
                            <div class="w-1/4 pt-3">
                                <img src="/img/box.png" class="w-12">
                            </div>
                            <div class="w-3/4 ">
                                <span class="text-3xl">{{count($countProduct)}}</span>
                                <p>Tổng sản phẩm</p>
                            </div>
                        </div>
                        <div class="w-80 rounded-lg  pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex" style="border:1px solid palevioletred;
               background-color:palevioletred;">
                            <div class="w-2/12 pt-4">
                                <img src="/img/money.png" class="w-12">
                            </div>
                            <div class="w-4/5 ">
                                <span class="text-3xl">{{ number_format($totalDate) }}</span>
                                <p>Tổng doanh thu trong ngày</p>
                            </div>
                        </div>
                        <div class="w-1/4 rounded-lg pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl" style="border:1px solid cadetblue;background-color: cadetblue;">
                            <span class="text-3xl">{{count($bill)}}</span>
                            <p>Tổng Hóa Đơn Trong Ngày</p>
                        </div>
                        <div class="w-1/4 rounded-lg pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl" style="border:1px solid brown;background-color: brown;">
                            <span class="text-3xl"> {{ count($kh) }}</span>
                            <p>Tổng Khách Hàng </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            <canvas id="pie-chart"></canvas>
                        </div>
                        <div class="w-1/2 mt-1">
                            <p class = "text-center font-bold font-timenewroman" style="font-size:18px;">Các Đơn Hàng Trong Ngày Hôm Nay</p>
                            <div class="max-w-full overflow-x-auto ml-1 mt-4 font-timenewroman" style="border:1px solid #ccc;border:1px solid #ccc;width: 95%;">
                                <table class="w-full text-xm">
                                    <tr class="font-bold">
                                        <td>ID Đơn Hàng</td>
                                        <td>Tên Khách Hàng</td>
                                        <td>SĐT</td>
                                        <td>Địa Chỉ Giao Hàng</td>
                                        <td>Tên Sản Phẩm</td>
                                        <td>Loại Sản Phẩm</td>
                                        <td>Số Lượng</td>
                                        <td>Ngày Đặt Hàng</td>
                                    </tr>
                                    @foreach($orderToday as $o)
                                    <tr>
                                        <td>{{ $o->IDDonHang}}</td>
                                        <td>{{ $o->HoTen}}</td>
                                        <td>0{{ $o->SDT}}</td>
                                        <td>{{ $o->SoNha}}, {{ $o->TenXa}}, {{ $o->TenQuan}},{{ $o->TenThanhPho}}</td>
                                        <td>{{ $o->TenSanPham}}</td>
                                        <td>{{ $o->TenMau}}</td>
                                        <td>{{ $o->SoLuong}}</td>
                                        <td>{{ $o->NgayDatHang}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Sản Phẩm</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex" style="width: 70%;">
                            <div class="input-search">
                                <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search" placeholder="Mã / Tên Sản Phẩm" oninput="getSearchProduct(this)">
                            </div>
                            <div class="select">
                                <select class=" category-product w-40 mx-4 pl-4 rounded-md" style="border:1px solid #ccc;height:35px;" name="category" onchange="getSearchProduct()">
                                    <option value="">Tất Cả</option>
                                    @foreach($category as $cat)
                                    <option value="{{ $cat->IDNhomSP }}">{{ $cat->TenNhom}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <div class="flex" style="width: 30%;">
                            <div class="insert ">
                                <button class="ring-2 text-white w-40 leading-8 rounded-sm" style="background-color:#2e6da4;font-size:17px;" type="button" onclick="openModalAddProduct()">
                                    <i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Thêm sản phẩm </button>
                            </div>
                            <div class="file ml-4">
                                <button class="text-white w-40 leading-8 rounded-sm" style="background-color:green;font-size:17px;border:0;" type="button">
                                    <i class="fas fa-file-excel"></i> &nbsp;&nbsp;Nhập từ file </button>
                            </div>
                        </div>
                    </div>
                    <div id="product">
                        @include('admin/component/ProductManagement', ['product' =>$product, 'product_detail' => $product_detail])
                    </div>
                </div>
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Đơn Hàng</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex" style="width: 70%;">
                            <div class="input-search mr-1">
                                <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search_order" placeholder="Mã Đơn Hàng" oninput="SearchOrder()">
                            </div>
                        </div>
                    </div>
                    <div id="page-order">
                        @include('admin/component/OrderManagement', ['order' => $order])
                    </div>

                </div>
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Tài Khoản</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex">
                            <div class="input-search mr-1">
                                <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search_account" placeholder="Mã Khách Hàng" oninput="SearchAccount()">
                            </div>
                        </div>
                    </div>
                    <div id="page_account">
                        @include('admin/component/AccountManagement', ['acc' => $acc])
                    </div>

                </div>
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Khách Hàng</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex">
                            <div class="input-search mr-1">
                                <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search_customer" placeholder="Mã / Tên Khách Hàng" oninput="SearchCustomer()">
                            </div>

                        </div>
                    </div>
                    <div id="page_customer">
                        @include('admin/component/CustomerManagement', ['customer' => $customer])
                    </div>

                </div>
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements hidden">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Danh Mục Sản Phẩm</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex" style="width: 80%;">
                            <div class="input-search mr-1">
                                <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search_category" placeholder="Mã / Tên Sản Phẩm" oninput="SearchCategory()">
                            </div>

                        </div>
                    </div>
                    <div id="page_category">
                        @include('admin/component/CategoryManagement', ['category' =>$category])
                    </div>


                </div>

            </div>
        </div>
    </div>
    <div class="form-add-product hidden" style="border:1px solid #ccc;width: 42%;height: 90%;overflow-y: auto;">
        <div class="title w-full font-serif p-4 text-white" style="background-color: #2e6da4;">
            <h2>Thêm Sản Phẩm Mới</h2>
        </div>
        <form action="them-san-pham" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="container w-full mt-4 font-timenewroman pl-4 pb-12">
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;"> Danh Mục </span>
                    <select class="w-40 h-8 rounded-md pl-4 ml-10" name="groupProduct">
                        @foreach($category as $nsp)
                        <option value="{{ $nsp->IDNhomSP }}">{{ $nsp->TenNhom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;">Sản Phẩm</span>
                    <input class="w-40 leading-8 rounded-md pl-4 ml-11" type="text" name="IDSP" value="{{ $all_product[0]->IDSanPham  }}" disabled>
                    <input class="w-80 rounded-md leading-8 pl-4 ml-4" type="text" name="nameProduct" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;">Thương Hiệu </span>

                    <select class="w-40 h-8 rounded-md pl-4 ml-6" name="thuongHieu">
                        @foreach($th as $t)
                        <option value="{{ $t->IDThuongHieu }}">{{ $t->TenThuongHieu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;">Giá Gốc </span>
                    <input class=" money w-80 rounded-md leading-8 pl-4 ml-14" type="text" name="price_1" placeholder="Nhập giá gốc sản phẩm">
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;">Giá Bán Ra </span>
                    <input class=" money w-80 rounded-md leading-8 pl-4 ml-8" type="text" name="price" placeholder="Nhập giá sản phẩm">
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;">Số Lượng </span>
                    <input class=" money w-80 rounded-md leading-8 pl-4 ml-12" type="number" name="amount">
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;"> Mô tả </span>
                    <textarea class="w-60 h-20 rounded-md" style="margin-left:4.5rem;" name="decription"></textarea>
                </div>
                <div class="mb-4 w-3/5 m-auto">
                    <input type="file" name="fileImage" required="true" id="fileImage" onchange="ImagesFileAsURL()" style="border:0;">
                    <div id="displayImg" style="width: 10rem;border:1px solid #ccc; margin-top:1rem;"></div>
                </div>
                <div class=" mb-4">
                    <span class="italic">Nếu muốn thêm ảnh để mô tả sản phẩm thì vui lòng bấm vào đây </span>
                    <button class="pl-4 pr-4 text-white ml-4" type="button" style="background-color: #2e6da4;border:1px solid #2e6da4;">Thêm Ảnh</button>
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;"> Ngày Sản Xuất </span>
                    <input class="w-40 rounded-md leading-8 pl-4 ml-4" type="date" name="sx">
                    <span class=" ml-4 leading-8 font-bold" style="color:#2e6da4;">Ngày Hết Hạn </span>
                    <input class="w-40 rounded-md leading-8 pl-4 ml-6" type="date" name="hh">
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;"> Trọng Lượng </span>
                    <input class="w-80 rounded-md leading-8 pl-4 ml-7" type="text" name="tl">
                </div>
                <div class="flex mb-4">
                    <span class="font-bold" style="color:#2e6da4;">Trạng Thái </span>
                    <select class="w-40 h-8 rounded-md pl-4 ml-11">
                        <option value="">Còn Hàng</option>
                    </select>
                </div>
                <div class="float-right mb-4 pr-4">
                    <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="submit" style="background-color: #2e6da4;border:1px solid #2e6da4;">Lưu</button>
                    <button class="pl-8 pr-8 pb-1 pt-1  text-current ml-4" type="button" style="border:1px solid #ccc;" onclick="closeModalAddProduct()">Bỏ qua</button>
                </div>
            </div>
        </form>
    </div>
    <div class="form-edit-product hidden" style="border:1px solid #ccc;width: 42%;height: 90%;overflow-y: auto;">
        @include('admin/component/form-edit-product', ['category' => $category , 'th' => $th, 'getProduct' => $getProduct])
    </div>

</body>
<script>
    $(function() {
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $data; ?>`);
        var ctx = $("#pie-chart");

        //pie chart data
        var data = {
            labels: cData.label,
            datasets: [{
                label: "Bill Count",
                data: cData.data,
                backgroundColor: [
                    "#CC0000",
                    "#FFCC33",
                ],
                borderColor: [
                    "#CC0000",
                    "#FFCC33",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1]
            }]
        };

        //options
        var options = {
            responsive: true,
            maintainAspectRatio: true,
            title: {
                display: true,
                position: "top",
                text: "Biểu Đồ Thống Kê Đơn Hàng",
                fontSize: 16,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            }
        };

        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
            type: "pie",
            data: data,
            options: options
        });

    });
</script>

</html>