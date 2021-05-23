
<table class="m-4" style="font-size:14px;">
    <tr class="font-bold">
        <td>ID Khách Hàng</td>
        <td>Tên Đăng Nhập</td>
        <td>Email</td>
        <td>Mật Khẩu</td>
    </tr>
    @foreach($acc as $a)
    <tr>
        <td>{{ $a->IDKhachHang}}</td>
        <td>{{ $a->TenDangNhap}}</td>
        <td class="px-20">{{ $a->Email}}</td>
        <td class="px-40">{{ $a->MatKhau}}</td>
    </tr>
    @endforeach
</table>