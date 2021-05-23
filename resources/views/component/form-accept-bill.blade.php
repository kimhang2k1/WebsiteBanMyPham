<div class="date-order">
                Ngày Đặt Hàng : <span>{{ $o->NgayDatHang }}</span>
            </div>
            <div class="total-product" style="width: 40%;float: right;text-align: right; padding-right: 1rem;">
                <div style="display:flex;margin-bottom: 1rem; margin-top: 1rem;  float: right;">
                    <img src="/img/ok.png" style="width: 22px;height:22px;margin-top: 9px;margin-right: 10px;">
                    <div style="font-size:15px;">Tổng Số Tiền : <span style="color:orangered;font-size:27px;">{{ number_format($total)}}</span></div>
                </div>
                <div class = "accept-order">
                   <button type = "button">Mua Lần Nữa</button>
                </div>
            </div>