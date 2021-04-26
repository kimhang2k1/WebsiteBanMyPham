
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
            <div class = "content-delivery-address" style = "display:flex;height:40px;">
                        <div class = "input-radio" style = "line-height: 28px; padding-right: 10px;">
                            <p><input type = "radio" name = "diachi" value = "{{ $dc->ID }}" onclick = "loadDiaChiAfterAdd()"></p>
                        </div>
                        <div class  = "name-customer" style = "font-size:18px;line-height:4rem;">
                           {{ $dc->HoTen}}<span>(+84)&nbsp;{{ $dc->SDT }}</span>
                        </div>
                       
                        <div class  ="address-customer" style = "width:50%;font-size:18px;line-height:4rem;">
                          {{ $dc->SoNha}},&nbsp;{{ $dc->TenXa}},&nbsp;{{ $dc->TenQuan}},&nbsp;{{$dc->TenThanhPho}}
                        </div>

             </div>
             @endforeach

