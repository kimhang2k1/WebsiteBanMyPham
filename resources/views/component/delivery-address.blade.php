
            <div class = "title-address" style = "color: #ee4d2d;font-size: 20px;display:flex;">
                <i class="fas fa-map-marker-alt" style = "padding-right:1rem;"></i> <span style = "width:60%;"> Địa Chỉ Nhận Hàng</span>
                <div class = "add-address" style = "display:flex;">
                    <div class = "add">
                        <button  type = "button" onclick="openModal()">
                        <i class="fas fa-plus" style = "padding-right: 4px;color: gray;font-weight: 100;"></i>
                        Thêm địa chỉ mới</button>
                    </div>
                </div>
            </div>
            @foreach($diaChi as $dc)
            <div class = "content-delivery-address" style = "display:flex;">
                        <div class = "input-radio" style = "line-height: 60px; padding-right: 10px;">
                            <p><input type = "radio" value = "{{ $dc->IDDonHang }}" onchange = "loadDiaChiAfterAdd()"></p>
                        </div>
                        <div class  = "name-customer" style = "font-size:18px;">
                           <p>{{ $dc->HoTen}}<span>(+84)&nbsp;{{ $dc->SDT }}</span></p>
                        </div>
                       
                        <div class  ="address-customer" style = "width:50%;font-size:18px;">
                            <p> {{ $dc->SoNha}},&nbsp;{{ $dc->TenXa}},&nbsp;{{ $dc->TenQuan}},&nbsp;{{$dc->TenThanhPho}}</p>
                        </div>

             </div>
             @endforeach

