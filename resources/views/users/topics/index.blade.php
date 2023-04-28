@extends('layouts.main')
@section('content')
    <div class="w-full">
        <div class="mx-auto text-center mt-8">
            <p class="capitalize text-5xl mb-5 font-sans text-gray-300">Explore By Topic</p>
            <p class="capitalize text-lg text-gray-400 font-sans">This will give you an alternative way to decide what
                <span class="text-indigo-700">//topic</span>
                to explore next
            </p>
        </div>
        <div class="mt-14">
            <nav class="border-b-2 border-gray-400  w-full md:w-7/12 mx-auto">
                <div class="mx-auto max-w-full lg:px-8">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="mx-auto">
                            <div class="flex space-x-9">
                                <a href="{{ route('category.critaku') }}"
                                    class="text-gray-300  lowercase border-indigo-600 pb-3 hover:text-white px-3 text-lg font-medium {{ Route::is('category.critaku') ? 'border-b-4 focus:z-50' : '' }}">All
                                    Topics</a>
                                @foreach ($category as $navCategory)
                                    <a href="{{ route('category.critaku.show', $navCategory->slug) }}"
                                        class="text-gray-300  lowercase border-indigo-600 pb-3 hover:text-white px-3 text-lg font-medium {{ Route::is('category.critaku.show') ? 'border-b-4 focus:z-50' : '' }}">{{ $navCategory->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            {{-- <hr class="border-gray-400 border-2 rounded w-full md:w-7/12 mx-auto"> --}}
        </div>
        <div class=" flex flex-row mt-10 mx-10">
            @foreach ($category as $category)
                <a href="{{ route('category.critaku.show', $category->slug) }}"
                    class="hover:bg-indigo-700/20 card me-5 ease-out duration-300 rounded-2xl">
                    <div class="flex flex-row w-full mx-4 md:w-56 md:mx-0 py-2">
                        <div class="flex items-center m-4">
                            <img src="https://plus.unsplash.com/premium_photo-1674599004939-000417962c69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
                                class="h-48 lg:h-10 lg:w-12 rounded" alt="" />
                        </div>
                        <div class="w-full mt-3 md:block">
                            <h1 class="text-left text-lg font-semibold text-indigo-700 capitalize">
                                {{ $category->name }}
                            </h1>
                            <div class="text-left md:block text-gray-400" style="font-size: 12px;">
                                {{ $category->blog->count() }} blogs
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
