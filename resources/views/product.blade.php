<!DOCTYPE html>
<head>
    <title>Delta Comestic - Shop Mỹ Phẩm Hàn Quốc Tốt Uy Tín</title>
    <link rel="stylesheet" type="text/css" href="/css/product.css">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/ajax.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    @include ('layout/header')
    <div id = "title">
        <div class = "title-bar">
            <p><a href = "index.html">Trang chủ</a> &nbsp;&nbsp; <i class="fas fa-chevron-right"></i>&nbsp;&nbsp; <a href = "#">Tất cả sản phẩm</a></p>
        </div>
    </div>
    <div id = "main">
        <div class = "product">
            <div class = "left-part">
                 <div class = "product-category">
                        <p><h2>Danh Mục Sản Phẩm</h2></p>
                         <ul>
                         
                             <li>Trang Chủ</li>
                             <li>Giới Thiệu</li>
                             <li>Sản Phẩm</li>
                             <li>Tin Tức</li>
                             <li>Liên Hệ</li>
                         </ul>
                 </div>
                 <div class = "favorite-product">
                     <h2>Có thể bạn sẽ thích</h2>
                     @foreach($like as $sp)
                     <div class = "favorite-product-information">
                        <div class = "images-product">
                            <img src = "/img/{{ $sp->HinhAnh }}">
                        </div>
                        <div class = "information-product">
                            <div class = "product-name">
                                <p> {{ $sp->TenSanPham }}</p>
                            </div>
                            <div class = "product-price">
                                <span> {{ number_format($sp->GiaSP) }}</span>
                            </div>
                        </div>
                     </div>
                     @endforeach
                </div>
                 <div class = "brand">
                      <h2>Thương Hiệu</h2>
                       <div class = "content-brand">
                    
                       @foreach($thuongHieu as $th)
                            <p><input type="radio" name = "brandProduct" 
                            value="{{ $th->IDThuongHieu }}" onchange = "brand()" > {{ $th->TenThuongHieu }}</p>
                        @endforeach
                       </div>
                 </div>
            </div>
            <div class = "container">
                <div class = "title-all-product">
                    <h2>Tất Cả Sản Phẩm</h2>
                    <h3>Ưu tiên xem : &nbsp;&nbsp;
                        @php 
                        $path = url()->current();
                        @endphp
                        @if (count(explode('/',parse_url($path)['path'])) == 3) 
                        @php 
                        $id = explode('/',parse_url($path)['path'])[2]
                        @endphp
                        <select id = "sort" name="sort" onchange ="sortby('{{ $id }}')">
                          <option  onchange ="sortby('{{ $id }}')" value = "Mặc định">Mặc định</option>
                          <option  onchange ="sortby('{{ $id }}')" value = "ASC">Giá Tăng Dần</option>
                          <option   onchange ="sortby('{{ $id }}')" value = "DESC">Giá Giảm Dần</option>
                       </select>
                        @else
                        <select id = "sort" name="sort" onchange ="sortby()">
                          <option onchange = "sortby()" value = "Mặc định">Mặc định</option>
                          <option onchange="sortby()" value = "ASC">Giá Tăng Dần</option>
                          <option  onchange="sortby()" value = "DESC">Giá Giảm Dần</option>
                       </select>
                        @endif
                       
                    </h3>
                </div>
                <div class = "all-product">
                @include('component/allProduct',['productbyId' => $productbyId])
                </div>
            </div>
        </div>
    </div>
    @include ('layout/footer')

</body>
</html>