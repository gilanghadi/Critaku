@extends('layouts.main')
@section('content')
    <x-sidebar />

    <div class="w-full lg:w-7/12 lg:ms-64 xl:mx-auto mt-10">
        @if ($blogs->count() === 0)
            <div class="bg-indigo-600/20 py-3 px-4 flex justify-between rounded-lg text-gray-300 mx-5 lg:mx-0">
                No Blog Created.
            </div>
        @endif
        <div class="lg:ms-64 xl:mx-auto mt-3 mx-5">
            @if (Session::has('success'))
                <div class="bg-indigo-600/20 py-4 px-5 mb-5 flex justify-between rounded-lg text-gray-300 text-md"
                    id="alert">
                    {{ Session::get('success') }}
                    <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                </div>
            @endif
        </div>
        <div class="overflow-auto h-screen mt-9 md:grid-cols-2 gap-4 grid grid-cols-1 scroll mx-3 lg:mx-0">
            @foreach ($blogs as $blog)
                <div class="mb-4">
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
                            <h5 class="mb-1 text-2xl font-bold tracking-tight capitalize text-indigo-700 hover:underline">
                                {{ $blog->title }}</h5>
                        </a>
                        <div class="w-full justify-between flex flex-row">
                            <p class="text-gray-300 capitalize mb-4 text-sm">
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}
                            </p>
                            <a href="{{ route('topic.critaku.show', $blog->topics->slug) }}"
                                class="px-2 hover:text-indigo-700 capitalize text-sm ease-out duration-300 text-gray-300 rounded-md border border-gray-300 flex items-center hover:bg-white">{{ $blog->topics->name }}
                            </a>
                        </div>
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
        <div class="px-5 lg:px-0">
            {{ $blogs->links() }}
        </div>
    </div>

    <script type="text/javascript">
        let button = document.getElementById('close');
        let alert = document.getElementById('alert');

        button.addEventListener('click', function() {
            alert.classList.add('hidden');
        })
    </script>
@endsection
