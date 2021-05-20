
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
        @foreach($product_detail as $pro)
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
            <td>
                <img src="/img/{{ $pro->HinhAnh }}" class="ml-6" style="width: 40px;margin-top:1px;margin-bottom:2px;">
            </td>
            <td>{{ $pro->TenThuongHieu }}</td>
            <td>{{ $pro->NgaySanXuat }}</td>
            <td>{{ $pro->NgayHetHan }}</td>
            <td><span class="rounded-full text-white" style="background-color: lightseagreen;border:0;padding:6px;">Còn Hàng</span></td>
            <td class="text-xl">
                <i class="fas fa-pen-square" style="padding:8px;color:#2e6da4;" onclick="openFormEditProduct('{{ $pro->IDSanPham }}')"></i>
                <i class="fas fa-trash-alt" style="color:red;" onclick="deleteProduct1('{{ $pro->IDSanPhamCT }}')"></i>
            </td>
        </tr>
        @endforeach
        @foreach($product as $pro)
        <tr>
            <td>{{ $pro->IDSanPham}}</td>
            <td>{{ $pro->TenSanPham }}</td>
            <td>{{ $pro->TenNhom }}</td>
            <td>Không có</td>
            <td>{{ $pro->GiaSP }}</td>
            <td>
                <img src="/img/{{ $pro->HinhAnh }}" class="ml-6" style="width: 40px;margin-top:1px;margin-bottom:2px;">
            </td>
            <td>{{ $pro->TenThuongHieu }}</td>
            <td>{{ $pro->NgaySanXuat }}</td>
            <td>{{ $pro->NgayHetHan }}</td>
            <td><span class="rounded-full text-white" style="background-color: lightseagreen;border:0;padding:6px;">Còn Hàng</span></td>
            <td class="text-xl">
                <i class="fas fa-pen-square" style="padding:8px;color:#2e6da4;" onclick="openFormEditProduct('{{ $pro->IDSanPham }}')"></i>
                <i class="fas fa-trash-alt" style="color:red;" onclick="deleteProduct2('{{ $pro->IDSanPham }}')"></i>
            </td>
        </tr>
        @endforeach
    </table>
</div>