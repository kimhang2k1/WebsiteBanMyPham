<div class="form">
    <h2 class="p-4 text-xl font-bold">Quản Lí Danh Mục Sản Phẩm</h2>
</div>
<div class="w-full flex">
<div class="pl-4 flex" style="width: 80%;">
        <div class="input-search mr-1">
            <input class=" pl-4 w-60 leading-8 rounded-md" style="border:1px solid #ccc;" type="text" name="search" placeholder="Mã / Tên Sản Phẩm">
        </div>
        <div class="search">
            <button class="w-12 text-white rounded-sm" type="button" style="border:1px solid #2e6da4;height: 34px;background-color:#2e6da4 ;"><i class="fas fa-search"></i></button>
        </div>

    </div>
    <div class="flex" style="width: 20%;">
        <div class="insert ">
            <button class="ring-2 text-white w-40 leading-8 rounded-sm" style="background-color:#2e6da4;font-size:17px;" type="button">
                <i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Thêm</button>
        </div>
    </div>
</div>
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