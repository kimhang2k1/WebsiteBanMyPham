<div class = "row-all-product-cart" style = "display:flex;margin-bottom:1rem;">
    <div class = "images-product-cart" style ="padding-right:1rem;">
        <img src = "/img/{{ $gh->HinhAnh }}" style = "width:40px;">
    </div>
    <div class = "name-product-cart" style = "font-size:17px;line-height:2rem;">
        <p>{{ $gh->TenSanPham }}</p>
    </div>
    <div class = "price-product-cart">
        <p style = "margin: 0;color:orangered;font-size:18px;">₫{{ number_format( $gh->GiaSP) }}</p>
    </div>
</div>