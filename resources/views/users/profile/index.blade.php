@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="lg:w-7/12 md:mx-14 lg:ms-64 xl:mx-auto mt-10 mx-5">
        <form action="{{ route('profileUpdate.critaku', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="password" value="{{ Auth::user()->password }}">
            <input type="hidden" name="image" value="{{ Auth::user()->image }}">
            <div class="flex items-center">
                @if (Auth::user()->image)
                    @if (file_exists('storage/' . Auth::user()->image))
                        <img class="rounded-full w-24 h-24" src="{{ asset('storage/' . Auth::user()->image) }}"
                            alt="image description" id="img-preview">
                    @else
                        <img class="rounded-full w-24 h-24" src="{{ Auth::user()->image }}" alt="image description"
                            id="img-preview">
                    @endif
                @else
                    <img class="rounded-full w-24 h-24" src="{{ asset('assets/img/profil-wa-kosong-peri.jpg') }}"
                        alt="image description" id="img-preview">
                @endif
                <input type="file" id="image" name="image" class="ms-3 text-gray-300 text-sm"
                    value="{{ old('image', Auth::user()->image) }}" onchange="preview()">
                @error('image')
                    <div class="text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6 mt-10">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-400">Your Name</label>
                <input type="text" id="name" name="name"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    value="{{ old('name', Auth::user()->name) }}">
                @error('name')
                    <div class="text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-400">Username</label>
                <input type="text" id="username" name="username"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    value="{{ old('username', Auth::user()->username) }}">
                @error('username')
                    <div class="text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-400">Email</label>
                <input type="email" id="email" name="email"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    value="{{ old('email', Auth::user()->email) }}">
                @error('email')
                    <div class="text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <span class="flex flex-row">
                <a href="{{ route('home.critaku') }}"
                    class="px-3 text-gray-400 text-sm py-2.5 text-center bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit"
                    class="text-white bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg text-sm ms-2 sm:w-auto px-5 py-2.5 text-center">Save</button>
            </span>
        </form>
    </div>



    <script type="text/javascript">
        function preview() {
            const imgPreview = document.querySelector('#img-preview')
            const inputImage = document.querySelector('#image')
            imgPreview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(inputImage.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>
@endsection
