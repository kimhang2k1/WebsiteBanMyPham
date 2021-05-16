<div class="title w-full font-serif p-4 text-white" style="background-color: #2e6da4;">
    <h2>Thêm Sản Phẩm Mới</h2>
</div>

<form action="" enctype="multipart/form-data" id = "myForm">
    @foreach($getProduct as $product)
    <div class="container w-full mt-4 font-timenewroman pl-4 pb-12">
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;"> Danh Mục </span>
            <select class="w-40 h-8 rounded-md pl-4 ml-10" name="groupProduct">
                <option value="">{{ $product->TenNhom}}</option>
                @foreach($category as $nsp)
                @if ($nsp->IDNhomSP == $product->IDNhomSP)
                <option value="{{ $nsp->IDNhomSP }}" selected>{{ $nsp->TenNhom }}</option>
                @else
                <option value="{{ $nsp->IDNhomSP }}">{{ $nsp->TenNhom }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;">Sản Phẩm</span>
            <input class="w-40 leading-8 rounded-md pl-4 ml-11" type="text" name="IDSP" id="IDSP" value="{{ $product->IDSanPham  }}" disabled>
            <input class="w-80 rounded-md leading-8 pl-4 ml-4" type="text" name="nameProduct" placeholder="Nhập tên sản phẩm" value="{{ $product->TenSanPham }}">
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;">Thương Hiệu </span>

            <select class="w-40 h-8 rounded-md pl-4 ml-6" name="thuongHieu">    
                @foreach($th as $t)
                @if ($t->IDThuongHieu == $product->IDThuongHieu)
                <option value="{{ $t->IDThuongHieu }}" selected>{{ $t->TenThuongHieu }}</option>
                @else
                <option value="{{ $t->IDThuongHieu }}">{{ $t->TenThuongHieu }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;">Giá Sản Phẩm </span>
            <input class=" money w-80 rounded-md leading-8 pl-4 ml-4" type="text" name="price" placeholder="Nhập giá sản phẩm" value="{{ $product->GiaSP}}">
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;"> Mô tả </span>
            <textarea class="w-60 h-20 rounded-md" style="margin-left:4.5rem;" name="decription">{{ $product->MoTa}}</textarea>
        </div>
        <div class=" mb-4 w-3/5 m-auto">
            <input type="file" name="fileImage"  id="fileImageclone" onchange="ImagesFile()" style="border:0;" >
            <img id = "hinhanh" src = "/img/{{ $product->HinhAnh }}" style = "width: 10rem;border:1px solid #ccc; margin-top:1rem; ">
            <div id="displayImage" style="width: 10rem;border:1px solid #ccc;margin-top:1rem;"></div>
        </div>
        <div class=" mb-4">
            <span class="italic">Nếu muốn thêm ảnh để mô tả sản phẩm thì vui lòng bấm vào đây </span>
            <input  type="file" name = "image[]" style="border:0;" multiple>
            <select class="w-40 h-8 rounded-md pl-4 ml-6" name="color">
                <option value="">Đỏ Đất</option>     
                <option value="">Thêm Màu</option>
            </select>
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;"> Ngày Sản Xuất </span>
            <input class="w-40 rounded-md leading-8 pl-4 ml-4" type="date" name="sx" value="{{ $product->NgaySanXuat }}">
            <span class=" ml-4 leading-8 font-bold" style="color:#2e6da4;">Ngày Hết Hạn </span>
            <input class="w-40 rounded-md leading-8 pl-4 ml-6" type="date" name="hh" value="{{ $product->NgayHetHan }}">
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;"> Trọng Lượng </span>
            <input class="w-80 rounded-md leading-8 pl-4 ml-7" type="text" name="tl" value="{{ $product->TrongLuong }}">
        </div>
        <div class="flex mb-4">
            <span class="font-bold" style="color:#2e6da4;">Trạng Thái </span>
            <select class="w-40 h-8 rounded-md pl-4 ml-11" name = "status">
                <option value="">Còn Hàng</option>
            </select>
        </div>
        <div class="float-right mb-4 pr-4">
            <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="button" style="background-color: #2e6da4;border:1px solid #2e6da4;" onclick="editProduct()">Lưu</button>
            <button class="pl-8 pr-8 pb-1 pt-1  text-current ml-4" type="button" style="border:1px solid #ccc;" onclick="closeFormEditProduct()">Bỏ qua</button>
        </div>
    </div>
    @endforeach
</form>