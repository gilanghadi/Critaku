@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="lg:w-7/12 mx-auto mt-9 grid grid-cols-2 gap-4 relative">
        @foreach ($blogs as $blog)
            <div class="card rounded-lg">
                <div class="p-0 m-0 relative">
                    <div class="absolute top-0 bg-gray-950/60 px-4 py-2 text-white font-sans rounded-br">
                        {{ $blog->category->name }}
                    </div>
                    <img class="rounded-t-lg w-full" src="{{ asset('assets/img/neom-L64iwsbPefU-unsplash.jpg') }}"
                        alt="" />
                </div>
                <div class="p-5">
                    <a href="">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-700">{{ $blog->title }}</h5>
                    </a>
                    <p class="mb-5 font-normal text-gray-400">
                        {{ \Illuminate\Support\Str::limit($blog->body, '120', '..') }}
                    </p>
                    <span class="w-full flex justify-end">
                        <a href="" class="bg-blue-700 px-2 py-1 rounded text-white mx-1"><i
                                class="fa-regular fa-pen-to-square"></i></a>
                        <a href="" class="bg-blue-700 px-2 py-1 rounded text-white mx-1"> <i
                                class="fa-solid fa-trash"></i></a>
                    </span>
                </div>
            </div>
        @endforeach
        <div class="bottom-0 fixed lg:w-7/12 mx-auto text-center py-1 px-2 z-20 bg-indigo-950">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
