<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>CHấp nhận địa chỉ email</h2>

        <div>
        	Cảm ơn bạn đã tạo tài khoản. Vui long click đường dẫn sau để
        	xác thực email;
        	<br>
            Mật khẩu mặc định của bạn là : {{ $defaultPass }}
            <br>
        	<a href="{{ url('register/verify/' . $code) }}">Xác nhận</a>
        </div>

    </body>
</html>