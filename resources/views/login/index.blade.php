<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Celsy Fitness Center Bandung</title>
</head>
<body>
    Ini halaman Login
<a href="/">Home</a>
<form action="/login" method="post">
    @csrf
    Email: <input type="email" name="email"> <br>
    Kata Sandi: <input type="password" name="password"> <br>
    <button type="sumbit">Submit</button>
</form>
</body>
</html>
