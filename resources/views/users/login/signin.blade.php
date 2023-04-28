@extends('layouts.main')
@section('content')
    <div class="flex justify-center w-full md:w-7/12 mx-auto">
        <form action="{{ route('signinPost.critaku') }}" method="post" class="w-full md:w-6/12">
            @csrf
            <div class="mx-auto card px-12 py-8">
                <h2 class="text-3xl mb-4 font-semibold text-indigo-600">Sign In | Critaku</h2>
                @if (Session::has('success'))
                    <div class="bg-indigo-600/20 py-3 px-4 flex justify-between rounded-lg text-gray-300 text-sm"
                        id="alert">
                        {{ Session::get('success') }}
                        <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                    </div>
                @elseif (Session::has('error'))
                    <div class="bg-red-500/20 py-3 px-4 flex justify-between rounded-lg text-gray-300 text-sm"
                        id="alert">
                        {{ Session::get('error') }}
                        <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                    </div>
                @endif
                <div class="mt-5">
                    <label for="email" class="block text-sm font-medium leading-7 text-gray-300">Email</label>
                    <input type="email" name="email" id="email"
                        class="outline-none mt-2 border-t-0 border-x-0 border-b-2 w-full bg-inherit focus:ring-0  text-gray-400"
                        required>
                </div>
                <div class="mt-5">
                    <label for="Password" class="block text-sm font-medium leading-7 text-gray-300">Password</label>
                    <input type="password" name="password" id="Password"
                        class=" mt-2 border-t-0 border-x-0 border-b-2 focus:ring-0 outline-none w-full bg-inherit text-gray-400"
                        required>
                </div>
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
