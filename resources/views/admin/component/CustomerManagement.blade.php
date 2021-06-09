<div class="max-w-full overflow-x-auto w-full ml-1 mt-4" style = "height:40em;">
  <table class="w-full text-xm"style="font-size:14px;">
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
        <td>0{{ $kh->SDT }}</td>
    </tr>
    @endforeach
</table>
</div>