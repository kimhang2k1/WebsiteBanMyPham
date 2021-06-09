<div class="max-w-full overflow-x-auto w-full ml-1 mt-4" style = "height:40em;">
<table class="w-full text-xm" style="font-size:14px;">
    <tr class="font-bold">
        <td>ID Khách Hàng</td>
        <td>Email</td>
        <td>Mật Khẩu</td>
    </tr>
    @foreach($acc as $a)
    <tr>
        <td>{{ $a->IDKhachHang}}</td>
        <td class="px-20">{{ $a->Email}}</td>
        <td class="px-40">{{ $a->MatKhau}}</td>
    </tr>
    @endforeach
</table>
</div>