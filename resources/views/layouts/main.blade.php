<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="sebuah website blog crita untuk semua orang">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.4.0-web/css/all.css') }}">
    <title>Critaku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-indigo-950">
    <x-navbar />
    @if (Route::is('blog.critaku'))
        <x-sidebar />
    @endif
    <div id="main" class="w-8/12 mx-auto py-10">
        @yield('content')
    </div>
    <script src="{{ asset('assets/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
    @vite('resources/js/app.js')
</body>

</html>
