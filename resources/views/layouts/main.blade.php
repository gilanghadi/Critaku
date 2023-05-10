<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="sebuah website blog crita untuk semua orang">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.4.0-web/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <style>
        .scroll::-webkit-scrollbar {
            display: none
        }
    </style>
    <title>Critaku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-indigo-950">
    <div id="main" class="mx-auto py-10 relative">
        <x-navbar />
        <div class="mb-72 sm:mb-64">
            @yield('content')
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <x-footer />
        </div>
    </div>
    <script src="{{ asset('assets/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
    @vite('resources/js/app.js')
    <script type="text/javascript">
        let togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function(e) {
            let inputPassword = document.getElementById('password');
            if (inputPassword.getAttribute('type') == 'password') {
                inputPassword.setAttribute('type', 'text')
                togglePassword.classList.remove('fa fa-eye-slash');
                togglePassword.classList.add('fa fa-eye')
            } else {
                inputPassword.setAttribute('type', 'password');
                togglePassword.classList.remove('fa fa-eye')
                togglePassword.classList.add('fa fa-eye-slash');
            }
        })
    </script>
    <script type="text/javascript">
        $('#option').on('change', function(e) {
            const opt = $('#option').val();
            if (opt === 'other') {
                $('#inputCategory').css('display', 'block');
            }
        });
    </script>
</body>

</html>
