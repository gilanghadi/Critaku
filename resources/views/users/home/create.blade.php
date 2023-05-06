@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="lg:w-7/12 mx-auto mt-10">
        <h1 class="text-3xl text-gray-300 border-b border-gray-400 mb-8 pb-4 font-sans font-medium">Create Your Blog</h1>
        <form action="{{ route('homeStore.critaku') }}" class="w-full" method="post">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-400">Title
                    Blog</label>
                <input type="text" id="title"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill"
                    required>
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-400">Slug
                </label>
                <input type="text" id="slug"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full p-2.5 inputAutofill"
                    disabled readonly>
                <p class="ms-1 text-gray-500 text-sm font-sans">Slug Is Automatically Filled According To The Title Blog !
                </p>
            </div>
            <div class="mb-14">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-400">Select an
                    option</label>
                <select id="category"
                    class="bg-indigo-900 border border-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full p-2.5">
                    <option selected disabled>Choose Your Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="capitalize">{{ $category->name }}</option>
                    @endforeach
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-10">
                <input id="body" type="hidden" name="content">
                <trix-editor input="body" class="text-gray-300 border-2 rounded-lg border-indigo-900"></trix-editor>
            </div>
            <span>
                <a href="{{ route('home.critaku') }}"
                    class="px-3 text-gray-400 text-sm py-2.5 text-center bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit"
                    class="text-white bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create
                    Blog</button>
            </span>
        </form>

    </div>
@endsection
