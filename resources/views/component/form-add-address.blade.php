<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form-add-address.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
<div id = "form-address">
        <div class = "insert-address">
            <div class = "title-add-address">
               <span style = "float: right;font-size: 30px; color: grey;"> <i class="far fa-times-circle"></i> </span>
               <h2> Thêm 1 Địa Chỉ Mới </h2>
            </div>
            <div class = "form-input-add-address">
                <div class = "input-name">
                    <input type = "text" name = "name" placeholder = "Họ Tên">
                </div>
                <div class = "input-phone">
                    <input type = "text" name = "phone" placeholder = "Số điện thoại">
                </div>
                <div class = "input-district1">
                    <select>
                        <option selected = "selected">Phường/Xã</option>
                    </select>
                </div>
                <div class = "input-district2">
                    <select>
                        <option value = "Quận/Huyện">Quận/Huyện</option>
                    </select>
                </div>
                <div class = "input-district3">
                    <select>
                        <option value = "Tỉnh/Thành Phố">Tỉnh/Thành Phố</option>
                    </select>
                </div>
            </div>
            <div class = "btn" style = "display: flex; margin-top: 1rem; width: 50%;float: right;">
                <div class = "btn-return">
                    <a href = "">TRỞ LẠI </a>
                </div>
                <div class = "btn-complete">
                    <a href = "">HOÀN THÀNH</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>