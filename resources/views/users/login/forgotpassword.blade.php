@extends('layouts.main')
@section('content')
    <div class="lg:hidden">
        <x-sidebar />
    </div>

    <div class="flex justify-center mt-10">
        <form action="{{ route('signinPost.critaku') }}" method="post" class="mx-auto">
            @csrf
            <div class="mx-auto card px-12 py-8">
                <h2 class="text-3xl mb-4 font-semibold text-indigo-600">Forgot Password | Critaku</h2>
                @if (Session::has('success'))
                    <div class="bg-indigo-600/20 text-md py-3 px-3 capitalize flex justify-between rounded-lg text-gray-300 text-sm"
                        id="alert">
                        {{ Session::get('success') }}
                        <button type="button" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                    </div>
                @endif
                <div class="relative z-0 w-full mb-12 group mt-10">
                    <div class="flex flex-row relative">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-2 w-full text-sm text-gray-400 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-700 inputAutofill peer @error('password')
                            border-red-500
                        @enderror"
                            placeholder=" " value="{{ old('password') }}" required />
                        <i class="fa-solid fa-eye-slash text-gray-400 cursor-pointer bottom-4 text-sm absolute right-2"
                            id="toggle"></i>
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-300 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-700  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    </div>
                    @error('password')
                        <div class="text-red-500 text-xs font-sans mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-12 group mt-10">
                    <div class="flex flex-row relative">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-2 w-full text-sm text-gray-400 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-700 inputAutofill peer @error('password')
                            border-red-500
                        @enderror"
                            placeholder=" " value="{{ old('password') }}" required />
                        <i class="fa-solid fa-eye-slash text-gray-400 cursor-pointer bottom-4 text-sm absolute right-2"
                            id="toggle"></i>
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-300 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-700  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmation
                            Password</label>
                    </div>
                    @error('password')
                        <div class="text-red-500 text-xs font-sans mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <span class="fa fa-eye-slash text-gray-300" id="togglePassword"></span> --}}
                <div class="w-full mt-6">
                    <button class="bg-indigo-700 w-full text-gray-300 font-semibold text-md rounded-full py-1"
                        type="submit" name="submit">Sign in</button>
                    <p class="mt-3 text-gray-400 text-sm">You Dont Have Any Account?<a
                            href="{{ route('register.critaku') }}" class="ms-1 text-indigo-600 hover:underline">Register</a>
                    </p>

                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#close', function() {
                $('#alert').addClass('hidden')
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#toggle', function() {
                let input = $('#password')
                if (input.attr("type") === "password") {
                    input.attr("type", "text")
                } else {
                    input.attr("type", "password")
                }
            })
        })
    </script>
@endsection
