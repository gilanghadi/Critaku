@extends('layouts.main')
@section('content')
    <div class="lg:hidden">
        <x-sidebar />
    </div>
    <div class="flex justify-center w-full mx-auto mt-10">
        <form action="{{ route('registerPost.critaku') }}" method="post" class="">
            @csrf
            <div class="mx-auto card px-12 py-8">
                <h2 class="text-3xl mb-4 font-semibold text-indigo-600">Register | Critaku</h2>
                @if (Session::has('error'))
                    <div class="bg-red-500/20 py-3 px-3 capitalize flex justify-between rounded-lg text-gray-300 text-md"
                        id="alert">
                        {{ Session::get('error') }}
                        <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                    </div>
                @endif
                <div class="flex flex-row">
                    <div class="flex flex-col w-full md:w-6/12">
                        <div class="mt-5 md:me-5">
                            <label for="name" class="block text-sm font-medium leading-7 text-gray-300">Your
                                Name</label>
                            <div class="flex flex-row relative">
                                <input type="text" name="name" id="name"
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 inputAutofill @error('name')
                                    border-red-500
                                @enderror duration-300 focus:ring-0 outline-none"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <i class="fa-solid fa-exclamation text-red-500 bottom-4 text-sm absolute right-2"></i>
                                @enderror
                            </div>
                            @error('name')
                                <div class="text-red-500 text-xs font-sans mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-5 md:me-5">
                            <label for="username" class="block text-sm font-medium leading-7 text-gray-300">Username</label>
                            <div class="flex flex-row relative">
                                <input type="text" name="username" id="username"
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 inputAutofill @error('username')
                                    border-red-500
                                @enderror duration-300 focus:ring-0 outline-none"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <i class="fa-solid fa-exclamation text-red-500 bottom-4 text-sm absolute right-2"></i>
                                @enderror
                            </div>
                            @error('username')
                                <div class="text-red-500 text-xs font-sans mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-6/12">
                        <div class="mt-5 md:me-5">
                            <label for="email" class="block text-sm font-medium leading-7 text-gray-300">Email</label>
                            <div class="flex flex-row relative">
                                <input type="email" name="email" id="email"
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 inputAutofill @error('email')
                                    border-red-500
                                @enderror duration-300 focus:ring-0 outline-none"
                                    value="{{ old('email') }}" required>
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
                        <div class="mt-5 md:me-5">
                            <label for="Password" class="block text-sm font-medium leading-7 text-gray-300">Password</label>
                            <div class="flex flex-row relative">
                                <input type="password" name="password" id="password"
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 inputAutofill @error('password')
                                    border-red-500
                                @enderror duration-300 focus:ring-0 outline-none"
                                    autocomplete="off" value="{{ old('password') }}" required>
                                <i class="fa-solid fa-eye-slash text-gray-400 cursor-pointer bottom-4 text-sm absolute right-2"
                                    id="toggle"></i>
                            </div>
                            <p class="text-extrasmall text-gray-400 ">Password min : 8, Using symbols, Mixedcase</p>
                            @error('password')
                                <div class="text-red-500 text-xs font-sans mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="w-full mt-6">
                    <button class="bg-indigo-700 w-full text-gray-300 font-semibold text-md rounded-full py-1"
                        type="submit" name="submit">Register</button>
                    <p class="mt-3 text-gray-400 text-sm">You Have Already Any Account?<a
                            href="{{ route('signin.critaku') }}" class="ms-1 text-indigo-600 hover:underline">Sign
                            In</a></p>

                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#toggle', function() {
                let input = $('#password')
                if (input.attr("type") === "password") {
                    input.attr("type", "text")
                    $('#toggle').removeClass('fa fa-eye-slash')
                    $('#toggle').addClass('fa fa-eye')
                } else {
                    input.attr("type", "password")
                    $('#toggle').removeClass('fa fa-eye')
                    $('#toggle').addClass('fa fa-eye-slash')
                }
            })
        })
    </script>
@endsection
