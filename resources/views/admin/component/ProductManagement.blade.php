<div class="form">
    <h2 class="p-4 text-xl font-bold">Quản Lí Sản Phẩm</h2>
</div>
<div class="w-full flex">
    <div class="pl-4 flex" style="width: 70%;">
        <div class="input-search">
            <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search" placeholder="Mã / Tên Sản Phẩm">
        </div>
        <div class="select">
            <select class="w-40 mx-4 pl-4 rounded-md" style="border:1px solid #ccc;height:35px;">
                <option value="">Son Môi</option>
            </select>
        </div>
        <div class="search">
            <button class="w-12 text-white rounded-sm" type="button" style="border:1px solid #2e6da4;height: 34px;background-color:#2e6da4 ;"><i class="fas fa-search"></i></button>
        </div>

    </div>
    <div class="flex" style="width: 30%;">
        <div class="insert ">
            <button class="ring-2 text-white w-40 leading-8 rounded-sm" style="background-color:#2e6da4;font-size:17px;" type="button">
                <i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Thêm sản phẩm </button>
        </div>
        <div class="file ml-4">
            <button class="text-white w-40 leading-8 rounded-sm" style="background-color:green;font-size:17px;border:0;" type="button">
                <i class="fas fa-file-excel"></i> &nbsp;&nbsp;Nhập từ file </button>
        </div>
    </div>
</div>
<div class="max-w-full overflow-x-auto w-full ml-1 mt-4" style="height: 30em;">
    <table class="w-full text-xm">
        <tr class="font-bold">
            <td>ID Sản Phẩm</td>
            <td>Tên Sản Phẩm</td>
            <td>Nhóm Sản Phẩm</td>
            <td>Màu Sản Phẩm</td>
            <td>Giá Sản Phẩm</td>
            <td>Hình Ảnh</td>
            <td>Thương Hiệu</td>
            <td>Ngày Sản Xuất</td>
            <td>Ngày Hết Hạn</td>
            <td>Trạng Thái</td>
            <td>Tác vụ</td>
        </tr>
        @foreach($product as $pro)
        <tr>
            <td>{{ $pro->IDSanPham}}</td>
            <td>{{ $pro->TenSanPham }}</td>
            <td>{{ $pro->TenNhom }}</td>
            @if($pro->TenMau == NULL) 
            <td>Không có</td>
            @else 
            <td>{{ $pro->TenMau}}</td>
            @endif
            <td>{{ $pro->GiaSP }}</td>
            <td><img src="/img/{{ $pro->HinhAnh }}" class="ml-6" style="width: 40px;margin-top:1px;margin-bottom:2px;"></td>
            <td>{{ $pro->TenThuongHieu }}</td>
            <td>{{ $pro->NgaySanXuat }}</td>
            <td>{{ $pro->NgayHetHan }}</td>
            <td><span class="rounded-full text-white" style="background-color: lightseagreen;border:0;padding:6px;">Còn Hàng</span></td>
            <td class="text-xl">
                <i class="fas fa-pen-square" style="padding:8px;color:#2e6da4;"></i>
                <i class="fas fa-trash-alt" style="color:red;"></i>
            </td>
        </tr>
        @endforeach
    </table>
</div>