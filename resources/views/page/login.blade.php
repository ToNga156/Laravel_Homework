<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập tài khoản</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        Tên người dùng: <input type="text" name="name" required><br>
        Mật khẩu: <input type="password" name="password" required><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
