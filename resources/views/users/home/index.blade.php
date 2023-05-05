@extends('layouts.main')
@section('content')
    <div class="lg:w-7/12 mx-auto mt-10 grid grid-cols-2 gap-6">
        @foreach ($blogs as $blog)
            <div class="card rounded-lg">
                <div class="p-0 m-0">
                    <img class="rounded-t-lg w-full" src="{{ asset('assets/img/neom-L64iwsbPefU-unsplash.jpg') }}"
                        alt="" />
                </div>
                <div class="p-5">
                    <a href="">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-700 hover:underline">
                            {{ $blog->title }}</h5>
                    </a>
                    <p class="mb-5 font-normal text-gray-400">{{ \Illuminate\Support\Str::limit($blog->body, '120', '..') }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
@endsection
