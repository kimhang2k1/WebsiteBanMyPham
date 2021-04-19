
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
                        <div class = "input-radio" style = "line-height: 65px; padding-right: 10px;">
                            <input type = "radio" checked>
                        </div>
                        <div class  = "name-customer" style = "font-size:20px;">
                           <p>{{ $dc->HoTen}}<span>(+84{{ $dc->SDT }})</span></p>
                        </div>
                       
                        <div class  ="address-customer" style = "width:50%;font-size:20px;">
                            <p> {{ $dc->SoNha}},{{ $dc->TenXa}},{{ $dc->TenQuan}},{{$dc->TenThanhPho}}</p>
                        </div>

             </div>
             @endforeach

