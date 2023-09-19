<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="sebuah website blog crita untuk semua orang">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.4.0-web/css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .scroll::-webkit-scrollbar {
            display: none
        }

        .scroll-topic {
            overflow: auto;
        }

        .scroll-topic::-webkit-scrollbar {
            touch-action: pan-x;
        }
    </style>
    <title>Critaku</title>
    @vite('resources/css/app.css')
    @yield('css')
</head>

<body class="bg-slate-950">
    <div id="main" class="mx-auto py-10 relative">
        <x-navbar />
        <div class="mb-72 sm:mb-64">
            @yield('content')
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <x-footer />
        </div>
    </div>


    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    @yield('javascript')
    <script src="{{ asset('assets/fontawesome-free-6.4.0-web/js/all.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve'
            });
        });


        $(document).on('click', '.validation-all', function(e) {
            e.preventDefault();
            window.location = window.location.pathname + "?tab=all"
        })


        $(document).on('click', '#tab-id', function(e) {
            e.preventDefault();
            let tab = $(this).data('tab');
            window.location = window.location.pathname + "?tab=" + tab
        })


        $('#option-topic').change(function(e) {
            e.preventDefault();
            let other = $('#option-topic').val();
            if (other == 'other') {
                let html = `<div class="mb-6">
                <label for="topic" class="block mb-2 text-sm font-medium text-gray-400">Add new topic </label>
                <div class="relative flex flex-row">
                    <input type="text" id="topic" name="name"
                        class="bg-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill @error('name')
                                border-red-500
                            @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <i class="fa-solid fa-exclamation text-red-500 bottom-4 text-sm absolute right-4"></i>
                    @enderror
                </div>
                @error('name')
                    <div class="text-red-500 text-sm right-0 bottom-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>`;
                $('#add-other').append(html)
            }
        })

        $('#add-social').click(function(e) {
            e.preventDefault();
            let html = `<div class="relative flex flex-row mb-3">
                    <input type="text" id="social_media" name="social_media[]"
                        class="bg-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill @error('title')
                                border-red-500
                            @enderror"
                        value="{{ old('social_media') }}" placeholder="Add your link social media">
                    <i class="fa-solid fa-x text-red-500 bottom-3 top-3 text-sm absolute right-4 cursor-pointer"
                        id="delete-input-sosmed"></i>
                </div>`
            $('#social_media').append(html);
        })

        $(document).on('click', '#delete-input-sosmed', function(e) {
            e.preventDefault();
            $(this).parent().remove();
        })

        $('#message_delete_sosmed').hide();
        $(document).on('click', '#delete-sosmed', function(e) {
            e.preventDefault();
            let sosmed = $(this).data('sosmed');
            $.ajax({
                url: `/dashboard/${sosmed}/delete/sosmed`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    $(this).parent().hide();
                    $('#message_delete_sosmed').show().append(data.message)
                    window.location.reload();
                }
            })
        })
    </script>
</body>

</html>
