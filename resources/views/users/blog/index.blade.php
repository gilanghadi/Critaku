@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="w-full lg:w-7/12 mx-auto mt-10">
        <div class="mb-6 flex justify-end">
            <form action="{{ route('blog.critaku') }}" method="get">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="flex flex-row">
                    <button class="pe-1 flex items-center bg-indigo-900 rounded-s-full" type="submit">
                        <i class="fa-solid fa-magnifying-glass text-white ps-4 text-sm"></i>
                    </button>
                    <input type="text" name="search" id="search"
                        class="px-4 text-sm text-gray-300 focus:ring-0 bg-indigo-900 border-0 rounded-e-full"
                        value="{{ request('search') }}">
                </div>
            </form>
        </div>
        @foreach ($blog as $b)
            @if ($b->count())
                <div class="mb-4">
                    <div class="card lg:p-5 rounded-lg flex flex-row">
                        <img src="{{ asset('assets/img/neom-L64iwsbPefU-unsplash.jpg') }}"
                            class="h-48 lg:h-20 lg:w-20 rounded-lg text-center" alt="" />
                        <div class="flex flex-col w-full ms-5">
                            <div class="flex flex-row justify-between mb-2">
                                <span>
                                    <a href="{{ route('blog.critaku.show', $b->slug) }}"
                                        class="text-indigo-700 hover:underline font-bold text-xl mb-2">
                                        {{ \Illuminate\Support\Str::limit($b->title, 40, '...') }}
                                    </a>
                                </span>
                                <span>
                                    <a href="{{ route('category.critaku.show', $b->category->slug) }}"
                                        class="lg:px-5 hover:text-indigo-700 capitalize text-sm ease-out duration-300 text-gray-300 rounded-full border border-gray-300 flex items-center py-1 hover:bg-white">{{ $b->category->name }}
                                    </a>
                                </span>
                            </div>
                            <p class="text-gray-400 mb-4">
                                {{ \Illuminate\Support\Str::limit($b->body, 120, '...') }}
                            </p>
                            <div class="text-sm">
                                <a href="{{ route('blog.author.critaku', $b->author->username) }}"
                                    class="items-center hover:underline leading-none text-indigo-700 me-2">
                                    {{ $b->author->name }}
                                </a>
                                <span class="text-gray-300">{{ $b->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-indigo-600/20 py-3 px-4 flex justify-between rounded-lg text-gray-300">
                    No Blog Found.
                </div>
            @endif
        @endforeach
        {{ $blog->links() }}
    </div>
@endsection
