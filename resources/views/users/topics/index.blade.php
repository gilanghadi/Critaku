@extends('layouts.main')
@section('content')
    <div class="w-full">
        <div class="mx-auto text-center md:mt-24 mt-10">
            <p class="capitalize text-4xl lg:text-5xl mb-5 font-sans text-gray-300">Explore By Topic</p>
            <p class="capitalize text-md lg:text-lg text-gray-400 font-sans">This will give you an alternative way to decide
                what
                <span class="text-indigo-700">//topic</span>
                to explore next
            </p>
        </div>
        <hr class="border-1 border-gray-400 w-full md:w-7/12 mx-auto mt-5">
        <div class="mt-10 mx-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 lg:grid-cols-6">
            @foreach ($category as $category)
                <a href="{{ route('category.critaku.show', $category->slug) }}"
                    class="hover:bg-indigo-700/20 card ease-out duration-300 rounded-2xl">
                    <div class="flex flex-row w-full py-2">
                        <div class="flex items-center m-4">
                            <img src="https://plus.unsplash.com/premium_photo-1674599004939-000417962c69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
                                class="h-10 w-12 rounded" alt="" />
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
