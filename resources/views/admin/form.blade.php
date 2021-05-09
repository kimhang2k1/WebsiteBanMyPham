<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
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
    </style>
</head>

<body>
    <div style="border:1px solid #ccc;width: 42%;">
        <div class="title w-full font-serif p-4 text-white" style="background-color: #2e6da4;">
            <h2>Thêm Sản Phẩm Mới</h2>
        </div>
        <div class="container w-full mt-4 font-timenewroman pl-4 pb-12">
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;"> Danh Mục </span>
                <select class="w-40 h-8 rounded-md pl-4 ml-10">
                    <option value="">Son Môi</option>
                </select>
            </div>
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;">Sản Phẩm</span>
                <input class="w-40 leading-8 rounded-md pl-4 ml-11" type="text" name="IDSP" value="SP00007">
                <input class="w-80 rounded-md leading-8 pl-4 ml-4" type="text" name="name-product" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;">Thương Hiệu </span>
                <select class="w-40 h-8 rounded-md pl-4 ml-6">
                    <option value="">Black Rouge</option>
                </select>
            </div>
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;">Giá Sản Phẩm </span>
                <input class="w-80 rounded-md leading-8 pl-4 ml-4" type="text" name="price" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;"> Mô tả </span>
                <textarea class="w-80 h-32 rounded-md" style="margin-left:4.5rem;"></textarea>
            </div>
            <div class="flex mb-4 w-3/5 m-auto">
                <button class="pl-4 pr-4 text-white" type="button" style="background-color: #2e6da4;border:1px solid #2e6da4;">Upload Ảnh</button>
            </div>
            <div class=" mb-4">
                <span class="italic">Nếu muốn thêm ảnh để mô tả sản phẩm thì vui lòng bấm vào đây </span>
                <button class="pl-4 pr-4 text-white ml-4" type="button" style="background-color: #2e6da4;border:1px solid #2e6da4;">Thêm Ảnh</button>
            </div>
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;"> Ngày Sản Xuất </span>
                <input class="w-80 rounded-md leading-8 pl-4 ml-4" type="date" name="sx">
            </div>
            <div class="flex mb-4">
                <span class="font-bold" style="color:#2e6da4;">Ngày Hết Hạn </span>
                <input class="w-80 rounded-md leading-8 pl-4 ml-6" type="date" name="hh">
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
                <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="button" style="background-color: #2e6da4;border:1px solid #2e6da4;">Lưu</button>
                <button class="pl-8 pr-8 pb-1 pt-1  text-current ml-4" type="button" style="border:1px solid #ccc;">Bỏ qua</button>
            </div>
        </div>
    </div>
</body>

</html>