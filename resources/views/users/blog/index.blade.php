@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="w-full lg:w-7/12 lg:ms-64 xl:mx-auto mt-10">
        @if ($blog->count() === 0)
            <div class="bg-indigo-600/20 py-3 px-4 flex justify-between rounded-lg text-gray-300 mx-5 lg:mx-0">
                No Blog Found.
            </div>
        @endif

        <div class="mb-6 flex justify-end mx-5 lg:mx-0">
            @if ($blog->count())
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
            @endif
        </div>
        <div class="overflow-auto h-screen scroll">
            @foreach ($blog as $b)
                <div class="mb-4 mx-5 lg:mx-0">
                    <div class="card p-5 rounded-lg flex flex-col lg:flex-row">
                        <div class="flex">
                            @if ($b->author->image)
                                <img src="{{ asset('storage/' . $b->author->image) }}"
                                    class="h-20 w-20 rounded-lg text-center mb-3 lg:mb-0" alt="{{ $b->author->image }}" />
                            @else
                                <img src="{{ asset('assets/img/profil-wa-kosong-peri.jpg') }}"
                                    class="h-20 w-20 rounded-lg text-center mb-3 lg:mb-0" alt="" />
                            @endif
                            <span class="text-gray-300 ms-3 flex items-center lg:hidden">{{ $b->author->username }}</span>
                        </div>
                        <div class="flex flex-col w-full lg:ms-5">
                            <div class="flex flex-row justify-between mb-2">
                                <span>
                                    <a href="{{ route('blog.critaku.show', $b->slug) }}"
                                        class="text-indigo-700 hover:underline font-bold text-xl mb-2 capitalizes">
                                        {{ \Illuminate\Support\Str::limit($b->title, 40, '...') }}
                                    </a>
                                </span>
                                <span>
                                    <a href="{{ route('category.critaku.show', $b->category->slug) }}"
                                        class="px-2 xl:px-5 hover:text-indigo-700 capitalize text-sm ease-out duration-300 text-gray-300 rounded-full border border-gray-300 flex items-center py-1 hover:bg-white">{{ $b->category->name }}
                                    </a>
                                </span>
                            </div>
                            <p class="text-gray-400 mb-4">
                                {{ $b->excerpt }}
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
            @endforeach
        </div>
        <div class="px-5 lg:px-0">
            {{ $blog->links() }}
        </div>
    </div>
@endsection
