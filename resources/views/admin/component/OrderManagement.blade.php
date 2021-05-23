
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
            <td> 
            @if($o->TrangThai == "Đã Giao Hàng")
                <span class="rounded-full text-white" style="background-color:lightseagreen;border:0;padding:6px;">{{ $o->TrangThai }}</span>
            @elseif($o->TrangThai == "Chưa Giao Hàng") 
               <span class="rounded-full text-white" style="background-color:lightcoral;border:0;padding:6px;">{{ $o->TrangThai }}</span>
            @endif
            </td>

        </tr>
        @endforeach
    </table>
</div>