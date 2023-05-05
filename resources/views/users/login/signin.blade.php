@extends('layouts.main')
@section('content')
    <div class="flex justify-center w-full md:w-7/12 mx-auto mt-10">
        <form action="{{ route('signinPost.critaku') }}" method="post" class="w-full md:w-6/12">
            @csrf
            <div class="mx-auto card px-12 py-8">
                <h2 class="text-3xl mb-4 font-semibold text-indigo-600">Sign In | Critaku</h2>
                @if (Session::has('success'))
                    <div class="bg-indigo-600/20 py-3 px-3 capitalize flex justify-between rounded-lg text-gray-300 text-sm"
                        id="alert">
                        {{ Session::get('success') }}
                        <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                    </div>
                @elseif (Session::has('error'))
                    <div class="bg-red-500/20 py-3 px-3 flex capitalize justify-between rounded-lg text-gray-300 text-sm"
                        id="alert">
                        {{ Session::get('error') }}
                        <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                    </div>
                @endif
                <div class="mt-5">
                    <label for="email" class="block text-sm font-medium leading-7 text-gray-300">Email</label>
                    <div class="flex flex-row relative">
                        <input type="email" name="email" id="email"
                            class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 @error('email')
                            border-red-500
                        @enderror duration-300 focus:ring-0 outline-none"
                            value="{{ old('email') }}">
                        @error('email')
                            <i class="fa-solid fa-exclamation text-red-500 bottom-4 text-sm absolute right-2"></i>
                        @enderror
                    </div>
                    @error('email')
                        <div class="text-red-500 text-xs font-sans mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="password" class="block text-sm font-medium leading-7 text-gray-300">Password</label>
                    <div class="flex flex-row relative">
                        <input type="password" name="password" id="password"
                            class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 @error('password')
                            border-red-500
                            @enderror duration-300 focus:ring-0 outline-none"
                            autocomplete="off" value="{{ old('password') }}">
                        @error('password')
                            <i class="fa-solid fa-exclamation text-red-500 bottom-4 text-sm absolute right-2"></i>
                        @enderror
                    </div>
                    @error('password')
                        <div class="text-red-500 text-xs font-sans mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <span class="fa fa-eye-slash text-gray-300" id="togglePassword"></span> --}}
                <div class="w-full mt-6">
                    <button class="bg-indigo-600 w-full text-gray-300 font-semibold text-md rounded-full py-1"
                        type="submit" name="submit">Sign in</button>
                    <p class="mt-3 text-gray-400 text-sm">You Dont Have Any Account?<a
                            href="{{ route('register.critaku') }}" class="ms-1 text-indigo-600 hover:underline">Register</a>
                    </p>

                </div>
            </div>
        </form>
    </div>
@endsection

<script type="text/javascript">
    let button = document.getElementById('close');
    let alert = document.getElementById('alert');

    button.addEventListener('click', function() {
        alert.classList.add('hidden');
    })
</script>
