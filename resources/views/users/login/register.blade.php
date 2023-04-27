@extends('layouts.main')
@section('content')
    <div class="flex justify-center">
        <form action="{{ route('registerPost.critaku') }}" method="post" class="w-full md:w-9/12">
            @csrf
            <div class="mx-auto card px-12 py-8">
                <h2 class="text-3xl mb-4 font-semibold text-indigo-600">Register | Critaku</h2>
                @if (Session::has('error'))
                    <div class="bg-red-500/20 py-3 px-4 flex justify-between rounded-lg text-gray-300 text-sm" id="alert">
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
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 @error('name')
                                    border-red-500
                                @enderror duration-300"
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
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 @error('username')
                                    border-red-500
                                @enderror duration-300"
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
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 @error('email')
                                    border-red-500
                                @enderror duration-300"
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
                        <div class="mt-5 md:me-5">
                            <label for="Password" class="block text-sm font-medium leading-7 text-gray-300">Password</label>
                            <div class="flex flex-row relative">
                                <input type="password" name="password" id="password"
                                    class="mt-2 w-full border-t-0 border-b-2 border-x-0 bg-inherit text-gray-400 @error('password')
                                    border-red-500
                                @enderror duration-300"
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
                    </div>
                </div>
                <div class="w-full mt-6">
                    <button class="bg-indigo-600 w-full text-gray-300 font-semibold text-md rounded-full py-1"
                        type="submit" name="submit">Register</button>
                    <p class="mt-3 text-gray-400 text-sm">You Have Already Any Account?<a
                            href="{{ route('signin.critaku') }}" class="ms-1 text-indigo-600 hover:underline">Sign
                            In</a></p>

                </div>
            </div>
        </form>
    </div>
@endsection
