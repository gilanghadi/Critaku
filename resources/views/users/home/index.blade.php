@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="lg:w-7/12 md:mx-14 lg:ms-64 xl:mx-auto mt-10 mx-5">
        @if (Session::has('success'))
            <div class="bg-indigo-600/20 py-4 px-5 flex justify-between rounded-lg text-gray-300 text-sm" id="alert">
                {{ Session::get('success') }}
                <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
            </div>
        @endif
    </div>
    <div class="lg:w-7/12 md:mx-14 lg:ms-64 xl:mx-auto mt-9 mx-5">
        <div class="md:grid-cols-2 gap-4 grid grid-cols-1">
            @foreach ($blogs as $blog)
                <div class="card rounded-lg">
                    <div class="p-0 m-0 relative">
                        <a href="{{ route('category.critaku.show', $blog->category->slug) }}"
                            class="absolute top-0 bg-gray-950/60 px-4 py-2 text-white font-sans rounded-br">
                            {{ $blog->category->name }}
                        </a>
                        @if ($blog->image)
                            <img class="rounded-t-lg w-full h-72" src="{{ asset('storage/' . $blog->image) }}"
                                alt="{{ $blog->image }}" />
                        @else
                            <img class="rounded-t-lg w-full h-60"
                                src="{{ asset('assets/img/neom-L64iwsbPefU-unsplash.jpg') }}" alt="image" />
                        @endif
                    </div>
                    <div class="p-5">
                        <a href="{{ route('blog.critaku.show', $blog->slug) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight capitalize text-indigo-700 hover:underline">
                                {{ $blog->title }}</h5>
                        </a>
                        <p class="mb-5 font-normal text-gray-400">
                            {{ $blog->excerpt }}
                        </p>
                        <span class="w-full flex justify-end">
                            <a href="{{ route('homeEdit.critaku', $blog->slug) }}"
                                class="bg-yellow-700/30 px-2 py-1 rounded text-yellow-300 mx-1"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                            <a href="{{ route('homeDelete.critaku', $blog->slug) }}"
                                class="bg-red-700/30 px-2 py-1 rounded text-red-300 mx-1"><i
                                    class="fa-solid fa-trash"></i></a>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $blogs->appends($_GET)->links() }}
    </div>


    <script type="text/javascript">
        let button = document.getElementById('close');
        let alert = document.getElementById('alert');

        button.addEventListener('click', function() {
            alert.classList.add('hidden');
        })
    </script>
@endsection
