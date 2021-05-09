<div class="form">
    <h2 class="p-4 text-xl font-bold">Quản Lí Tài Khoản</h2>
</div>
<div class="w-full flex">
    <div class="pl-4 flex">
        <div class="input-search mr-1">
            <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search" placeholder="Mã / Tên Khách Hàng">
        </div>
        <div class="search">
            <button class="w-12 text-white rounded-sm" type="button" style="border:1px solid #2e6da4;height: 34px;background-color:#2e6da4 ;"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>
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