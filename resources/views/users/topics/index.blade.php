@extends('layouts.main')
@section('content')
    <div class="lg:hidden">
        <x-sidebar />
    </div>
    <div class="w-full">
        <div class="mx-auto text-center md:mt-24 mt-10">
            <p class="capitalize text-4xl lg:text-5xl mb-5 font-sans text-gray-300">Explore By Topic</p>
            <p class="capitalize text-sm mx-2 md:text-lg text-gray-400 font-sans">This will give you an
                alternative way to decide
                what
                <span class="text-indigo-700">//topic</span>
                to explore next
            </p>
        </div>
        <div class="w-10/12 flex mx-auto justify-center mt-16 overflow-hidden">
            <ul class="flex text-gray-300 gap-6 lg:gap-10 scroll-topic">
                <li>
                    <button type="button" id="tab-all" name="tab-all">
                        <span
                            class="capitalize font-sans font-semibold text-md lg:text-lg validation-all {{ $tab === 'all' ? 'text-gray-300 opacity-100' : 'opacity-30' }}">All</span>
                    </button>
                </li>
                @foreach ($categories as $key => $category)
                    <li>
                        <button type="button" name="tab-{{ $category->slug }}">
                            <span
                                class="capitalize font-sans font-semibold text-md lg:text-lg {{ $tab === $category->slug ? 'text-gray-300 opacity-100' : 'opacity-30' }}"
                                id="tab-id" data-tab="{{ $category->slug }}">{{ $category->name }}</span>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
        <hr class="border-1 border-gray-400 w-full md:w-8/12 mx-auto mt-5 opacity-10" />
        <div class="content-box">
            @include('users.topics.all_topic')
        </div>
    </div>
@endsection
