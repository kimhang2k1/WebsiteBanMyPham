
<form action="">
<div class = "title-add-address">
    <h2> Thêm 1 Địa Chỉ Mới </h2>
</div> 
<div class="print-error-msg" style="display:none;">
    <ul style = "list-style: none;border: 1px solid lightpink;background-color: lightpink;border-radius: 5px;color: red;text-align:left;">
    </ul>
</div>
@foreach($input as $i)
<div class = "form-input-add-address">
    <div class = "input-name">
        <input type = "text" name = "HoTen" placeholder = "Họ Tên" value = "{{ $i->HoTen }}">
        @error('HoTen')
        <span> {{ $message }}</span>
        @enderror
    </div>
    <div class = "input-phone">
        <input type = "text" name = "phone" placeholder = "Số điện thoại" value="0{{ $i->SDT }}">
        @error('phone')
        <span> {{ $message }}</span>
        @enderror
    </div>
    <div class = "input-district1">
        
        <select onchange="ThanhPho(this)"  id = "district-1" >
            <option value = "">{{ $i->TenThanhPho}}</option>
        @foreach($thanhPho as $TP)
            <option   value = " {{ $TP->IDThanhPho }} " >{{ $TP->TenThanhPho}}</option>
        @endforeach
        </select>
    </div>
    <div class = "input-district2">
        <select id = "district-2" onchange="Xa(this)">
            <option value = "">{{ $i->TenQuan}}</option>
        @foreach($quan as $q)
            <option name = "district-2" value = "{{ $q->IDQuan }}">{{ $q->TenQuan}}</option>
        @endforeach
        </select>
    </div>
    <div class = "input-district3">
        <select id = "district-3">
        <option value = "">{{ $i->TenXa}}</option>
            @foreach($xa as $x)
            <option name = "district">{{ $x->TenXa}}</option>
                @endforeach
        </select>
    </div>
    <div class = "input-apartment-number">
        <input type = "text" name = "SoNha" placeholder="Tòa Nhà/Tên đường..." value="{{ $i->SoNha }}">
    </div>
</div>

<div class = "btn" style = "display: flex; margin-top: 1rem; width: 50%;float: right;">
    <div class = "btn-return">
        <span onclick = "closeModalEditAddress()" style="padding-right:1rem;cursor: pointer;">TRỞ LẠI </span>
    </div>
    <div class = "btn-complete">
        <button type="button" onclick="chinhSuaThongTin(event, '{{ $i->ID}}')">Hoàn Thành</button>
    </div>
</div>
@endforeach
</form>
