@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="lg:w-7/12 mx-auto mt-10">
        <form action="">
            <div class="flex justify-center">
                <img class="rounded-full w-24 h-24" src="{{ asset('assets/img/neom-L64iwsbPefU-unsplash.jpg') }}"
                    alt="image description">
            </div>
            <div class="mb-6 mt-10">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-400">Your Name</label>
                <input type="text" id="name"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    value="{{ Auth::user()->name }}">
            </div>
            <div class="mb-6">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-400">Username</label>
                <input type="text" id="username"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    value="{{ Auth::user()->username }}">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-400">Email</label>
                <input type="text" id="email"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    value="{{ Auth::user()->email }}">
            </div>
            <span>
                <a href="{{ route('home.critaku') }}"
                    class="px-3 text-gray-400 text-sm py-2.5 text-center bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit"
                    class="text-white bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
            </span>
        </form>
    </div>
@endsection
