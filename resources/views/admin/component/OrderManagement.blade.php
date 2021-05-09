<div class="form">
    <h2 class="p-4 text-xl font-bold">Quản Lí Đơn Hàng</h2>
</div>
<div class="w-full flex">
    <div class="pl-4 flex" style="width: 70%;">
        <div class="input-search mr-1">
            <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search" placeholder="Mã Đơn Hàng">
        </div>
        <div class="search">
            <button class="w-12 text-white rounded-sm" type="button" style="border:1px solid #2e6da4;height: 34px;background-color:#2e6da4 ;"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>
<div class="max-w-full overflow-x-auto w-full ml-1 mt-4">
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
            <td>Ngày Giao Hàng</td>
            <td>Trạng Thái</td>
            <td>Tác Vụ</td>
        </tr>
        @foreach($order as $o)
        <tr>
            <td>{{ $o->IDDonHang}}</td>
            <td>{{ $o->HoTen}}</td>
            <td>0{{ $o->SDT}}</td>
            <td>{{ $o->SoNha}}, {{ $o->TenXa}}, {{ $o->TenQuan}},{{ $o->TenThanhPho}}</td>
            <td>{{ $o->TenSanPham}}</td>
            <td>{{ $o->TenMau}}</td>
            <td>{{ $o->SoLuong}}</td>
            <td>{{ $o->NgayDatHang}}</td>
            <td>{{ $o->NgayGiaoHang}}</td>
            <td><span class="rounded-full text-white" style="background-color: lightseagreen;border:0;padding:6px;">Đã Giao Hàng</span></td>
            <td class="text-xl">
                <i class="fas fa-pen-square" style="padding:8px;color:#2e6da4;"></i>
                <i class="fas fa-trash-alt" style="color:red;"></i>
            </td>
        </tr>
        @endforeach
    </table>
</div>