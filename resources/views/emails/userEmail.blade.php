<!DOCTYPE html>
<html>
<head>
    <title>TuanmcShop</title>
    <style>
        .logo{
            text-align: center;
        }
        img{
            max-width: 100%;
            height: auto;
        }
        .shop{
            color: #e97730;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ url('/cdn/shop/files/logo-icon.png') }}" alt="TuanmcShop Logo">
    </div>
    <h1>Chào bạn,{{ $data['name'] }}</h1>
    <p>Bạn đã đăng ký thành công tài khoản tại <strong class="shop">TuanmcShop</strong></p>
    <p><strong>Email:</strong>{{ $data['email'] }}</p>
    <p><strong>Mật khẩu:</strong>{{ $data['password'] }}</p>
    <p>Cảm ơn bạn,hy vọng website của mình có thể đem lại cho bạn những trải nghiệm tốt nhất.</p>
</div>
</body>
</html>
