<div class = "shopping-cart">
            <div class = "cart">
                <div class = "row-title-cart" style= "display:flex;">
                    <div class  = "product-name" style = "width:50%;color:black;display:flex;">Sản Phẩm
                         <div class = "loai-sp" style = "margin-left: 21em;color: grey;">
                             Loại
                         </div>
                    </div>
                    <div class  = "price" style = "width:12%;">Đơn Giá  </div>
                    <div class  = "amount" style = "width:15%;">Số Lượng </div>
                    <div class  = "total_price" style = "width:10%;">Số Tiền  </div>
                    <div class  = "action" style = "width:15%;">Thao Tác </div>
                </div>
                <form action="">
                @foreach($cart as $giohang)
                <div class = "all-product-cart" id = "{{ $giohang->STT}}delete">
                   <div class = "items-in-cart" id="{{ $giohang->STT }}" style= "display:flex;font-size:17px;padding-top:1rem;">
                        <div class = "check-box-cart" style = "margin-right:1rem;"><input onchange="onchangetoggle(this)" 
                        type = "checkbox" name = "item"  style =" width: 16px; height: 16px;" unchecked data="false" 
                        id="{{$giohang->STT}}Checkbox"></div>
                        <div class  = "items-name" style = "width:45%;color:black;display:flex;">
                           <div class = "images" style = "margin-right:1rem;">
                               <img src = "/img/{{ $giohang->HinhAnh }}" style = "width:80px;">
                            </div>  
                            <div class = "name-product" style = "line-height:1;">
                                <p>{{ $giohang->TenSanPham }}</p>
                                </div>

                            <div class = "classification-of-goods" style = "width: 200px;text-align: center;margin-top: 1rem;">
                                {{ $giohang->TenMau}}
                            </div>
                        </div>
                        <div class  = "items-price" style = "width:15%;margin-top:1rem;text-align:center;"><p style = "margin:0;" id ="{{ $giohang->STT }}money">  {{ number_format($giohang->GiaSP)}}</p></div>
                        <div class  = "items-amount" style = "width:15%;margin-top:1rem;">
                            <button onclick = "decreaseNumber('{{ $giohang->STT }}')" onclick=""> - </button>
                            <input type = "text" id ="{{ $giohang->STT }}amount" value = "{{ $giohang->SoLuong }}" disabled> 
                            <button onclick = "increaseNumber('{{ $giohang->STT }}')"> + </button>
                         </div>
                        <div class  = "items-total_price" style = "width:10%;margin-top:1rem;"><p style = "margin:0;" id = "{{ $giohang->STT }}total-money"> {{ number_format( $giohang->GiaSP * $giohang->SoLuong)}}</p> </div>
                        <div class  = "items-action" style = "width:15%;margin-top:1rem;">
                         <p style="margin:0;cursor: pointer;" onclick="deleteCart('{{ $giohang->IDSanPham}}', '{{ $giohang->IDMau}}', '{{ $giohang->STT}}')">Xóa</p></div>
                   </div>
                </div>
                @endforeach
                <div class = "buy-items-cart">
                    <div class = "buy-product" style = "display:flex;font-size:19px;">
                        <div class = "buy-items-1" style= "display:flex;width:40%;">
                          <p><input type = "checkbox"  onclick="toggle(this)"
                     style =" width: 16px; height: 16px;margin-right:1rem;" unchecked></p>
                          <p>Chọn tất cả ( <b id="numberSelected">0</b> ) </p> 
                        </div>
                        <div class = "btn-buy-product" style = "width:60%;display:flex;line-height:4rem;">
                            <div class = "title-btn-buy">
                               Tổng tiền hàng ( <b id="totalProduct">0</b> sản phẩm ) :  
                            </div>
                            <div class = "number">₫<b id="mainPrice">0</b></div>
                            <div class=  "btn">
                              <a href = "{{ url('checkout-page/') }} ">Mua Hàng</a>
                            </div>
                
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>