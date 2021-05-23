
<table class="m-4" style="font-size:14px;">
    <tr class="font-bold">
        <td>ID Khách Hàng</td>
        <td>Tên Khách Hàng</td>
        <td>Địa Chỉ</td>
        <td>SĐT</td>
    </tr>
    @foreach($customer as $kh)
    <tr>
        <td>{{ $kh->IDKhachHang }}</td>
        <td>{{ $kh->HoTen }}</td>
        <td class="px-40 text-left">{{ $kh->SoNha }},{{ $kh->TenXa }},{{ $kh->TenQuan }},{{ $kh->TenThanhPho}}</td>
        <td>{{ $kh->SDT }}</td>
    </tr>
    @endforeach
</table>