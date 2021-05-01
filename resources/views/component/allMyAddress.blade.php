@foreach($diaChi as $myaddress)
<div class  = "content-change-address" style="display: flex;line-height: 2rem;font-size:15px;margin-top: 1rem;color:grey;">
    <div class = "infor-all-address-customer" style="width: 50%;margin:auto;">
        <div class = "first-last-name" style="display:flex;">
            Họ & Tên  <span style="padding-left:2rem;color:black;">{{ $myaddress->HoTen }}</span>
           <span style="margin-left:1rem;background: #00bfa5; color: #fff;border-radius: 3px;padding: 3px 7px 2px;text-transform: capitalize;
           font-size: 14px;font-weight: 500;width: auto;white-space: nowrap;margin-right: 12px;">{{$myaddress->TrangThai}}</span> 
        </div>
        <div class = "number-phone">
            Số điện thoại  <span style="padding-left:1rem;color:black;">(+84)&nbsp;{{ $myaddress->SDT }}</span>
        </div>
        <div class  = "address" style="display: flex;">
            Địa chỉ 
            <div style="max-width: 40%;padding-left: 3.3675rem;color:black;">{{ $myaddress->SoNha}},{{ $myaddress->TenXa}},{{ $myaddress->TenQuan}},{{ $myaddress->TenThanhPho}}</div>
        </div>
    </div>  
    <div style="width: 30%;">
        <div class  = "edit-delete-address" style="display: flex;">
            <div class  = "edit-address" style="padding-right: 1rem;">
                <span onclick="openModalEditAddress('{{$myaddress->ID}}')">Sửa</span>
            </div>
            <div class  = "delete-address">
                <span>Xóa</span>
            </div>
        </div>
        <div class = "btn-change-default-address">
            <button type="button" style="cursor: not-allowed;" disabled>Thiết lập mặc định</button>
        </div>
    </div>
</div>
@endforeach
@foreach($dc as $address)
<div class  = "content-change-address" style="display: flex;line-height: 2rem;font-size:15px;margin-top: 1rem;color:grey;">
    <div class = "infor-all-address-customer" style="width: 50%;margin:auto;">
        <div class = "first-last-name">
            Họ & Tên  <span style="padding-left:2rem;color:black;">{{ $address->HoTen }}</span>
        </div>
        <div class = "number-phone">
            Số điện thoại  <span style="padding-left:1rem;color:black;">(+84)&nbsp;{{ $address->SDT }}</span>
        </div>
        <div class  = "address" style="display: flex;">
            Địa chỉ 
            <div style="max-width: 40%;padding-left: 3.3675rem;color:black;">{{ $address->SoNha}},{{ $address->TenXa}},{{ $address->TenQuan}},{{ $address->TenThanhPho}}</div>
        </div>
    </div> 
    <div style="width: 30%;"> 
        <div class  = "edit-delete-address" style="display: flex;width: 30%;">
            <div class  = "edit-address" style="padding-right: 1rem;">
                <span onclick="openModalEditAddress('{{$address->ID}}')">Sửa</span>
            </div>
            <div class  = "delete-address">
                <span>Xóa</span>
            </div>
        </div>
        <div class = "btn-change-default-address">
                <button type="button" onclick="changeDefaultAddress('{{$address->ID}}')" >Thiết lập mặc định</button>
        </div>
    </div>
</div>
@endforeach
