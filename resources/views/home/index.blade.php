<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Celsy Fitness Center Bandung</title>
</head>
<body>
    Ini halaman Home
<a href="/login">Login</a>
<form action="/register" method="post">
    @csrf
    Nama Lengkap: <input type="text" name="name"> <br>
    Nama Pengguna: <input type="text" name="username"> <br>
    Email: <input type="email" name="email"> <br>
    Kata Sandi: <input type="password" name="password"> <br>
    <button type="sumbit">Submit</button>
</form>
</body>
</html>
