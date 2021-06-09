<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/header-cart.css">
    <link rel="stylesheet" href="/css/cart.css">
    <script src="/js/process.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    @include('User/layout/HeaderCart')
    @if (count($cart) > 0)
    <div id = "container" style = "margin-top: 1rem;display:block">
         @include('User/component/form-cart', ['cart' => $cart]) 
    </div>
    @else 
    <div id = "container" style="height: 30em;display:block" >
        @include('User/component/not-cart')
    </div>
    @endif
    @include('User/layout/footer')
</body>
</html>