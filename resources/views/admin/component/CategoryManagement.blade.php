
<table class="m-4" style="font-size:14px;">
    <tr class="font-bold">
        <td>Mã Nhóm Sản Phẩm</td>
        <td>Tên Nhóm</td>
    </tr>
    @foreach($category as $c)
    <tr>
        <td>{{ $c->IDNhomSP}}</td>
        <td>{{ $c->TenNhom}}</td>
    </tr>
    @endforeach
</table>