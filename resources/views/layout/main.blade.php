<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Celsy Fitness Center Bandung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    @vite('public/css/app.css')
</head>

<body class="bg-[url('../../public/img/background.jpg')] bg-cover bg-center">
    @yield('container')
    @vite('node_modules/flowbite/dist/flowbite.js')
    @vite('node_modules/flowbite/dist/datepicker.js')
    <script src="{{ asset('js/biodata.js') }}"></script>
</body>

</html>
