<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Celsy Fitness Center Bandung</title>
</head>
<body>
    <h1>Selamat datang di Dashboard</h1>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Log out <span data-feather="log-out"></span></button>
    </form>
</body>
</html>