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
            <nav class="">
                <div class="mx-auto max-w-full lg:px-8">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="block mx-auto">
                            <div class="flex space-x-9">
                                @foreach ($category as $navCategory)
                                    <a href="{{ route('home.critaku') }}"
                                        class="text-gray-300  capitalize border-gray-950 pb-4 hover:text-white px-3 text-lg font-medium {{ Route::is() ? 'border-b-4' : '' }}">{{ $navCategory->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <hr class="border-gray-400 border rounded">
        </div>
        <div class=" flex flex-row mt-10">
            @foreach ($category as $category)
                <a href="{{ route('topics.critaku.show', $category->slug) }}"
                    class="hover:bg-indigo-700/20 card me-5 ease-out duration-300">
                    <div class="flex flex-row w-64">
                        <div class="me-2 justify-center p-3">
                            <img src="https://plus.unsplash.com/premium_photo-1674599004939-000417962c69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
                                class="h-48 lg:h-16 lg:w-16 rounded" alt="" />
                        </div>
                        <div class="w-full lg:w-auto mt-3 flex justify-between md:block">
                            <h1 class="text-left text-xl  mb-1 font-semibold text-indigo-700 capitalize">
                                {{ $category->name }}
                            </h1>
                            <div class="hidden text-left md:block text-extrasmall text-white md:text-grey-600/50">
                                1 Blogs
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
