
<div id="header">
        <div class="header-bar">
            <div class="left">
                <img src="/img/logo.PNG"></img>
            </div>
            <div class="menu">
               <p>Giỏ Hàng</p>
            </div>
         
            <div class="right">
                <div class="account">
                @if(session()->has('user')) 
                    <ul style = "display:inline-flex;list-style:none;margin:0;">
                        <li><i class="fas fa-user-circle" style ="font-size:30px;"></i></li>
                        <li style = "line-height:30px;padding-left:10px;font-size:17px;"><span> {{Session::get('user')[0]->TenDangNhap}}</span></li>
                   </ul>
                    <div class = "account-1" >
                       <a href = "dangxuat"><p>Đăng Xuất</p></a>
                    </div>    
                    @endif
                </div>
            </div>
        </div>
    </div>