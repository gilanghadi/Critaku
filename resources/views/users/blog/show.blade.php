@extends('layouts.main')
@section('content')
    @auth
        <x-sidebar />
    @endauth

    <div class="w-9/12 lg:w-7/12 mt-10 mx-auto rounded overflow-hidden">
        <div class="font-bold text-2xl lg:text-4xl mb-2 text-indigo-700 capitalize">
            {{ $blog->title }}
        </div>
        @if (Session::has('error'))
            <div class="bg-red-500/20 py-3 px-3 text-md flex capitalize justify-between rounded-lg text-gray-300 text-sm"
                id="alert">
                {{ Session::get('error') }}
                <button type="submit" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
            </div>
        @endif
        @if ($blog->author->id !== Auth::id())
            <p class="mt-5 mb-3 text-md text-white">By<a href="" class="text-gray-400 underline">
                    {{ $blog->author->username }}</a> in
                <a href="{{ route('category.critaku.show', $blog->category->slug) }}" class="text-gray-400 underline">
                    {{ $blog->category->name }}</a>
            </p>
        @else
            <div class="mb-5 mt-8 flex flex-wrap">
                @if (request('blog'))
                    <a href="{{ route('blog.critaku') }}"
                        class="bg-gray-700/30 text-gray-300 text-sm font-medium mr-2 px-2.5 py-2 rounded">
                        <i class="fa-sharp fa-arrow-left text-extrasmall"></i>
                        <span class="">Back To All My Blog</span>
                    </a>
                @endif
                <a href="{{ route('homeEdit.critaku', $blog->slug) }}"
                    class="bg-yellow-700/30 text-yellow-300 text-sm font-medium mr-2 px-2.5 py-2 rounded">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span>Update</span>
                </a>
                <a href="{{ route('homeDelete.critaku', $blog->slug) }}"
                    class="bg-red-700/30 text-red-300 text-sm font-medium mt-2 sm:mt-0 mr-2 px-2.5 py-2 rounded">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete</span>
                </a>
            </div>
        @endif

        @if ($blog->image)
            <img class="w-full lg:h-96" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->image }}">
        @else
            <img class="w-full lg:h-96"
                src="https://plus.unsplash.com/premium_photo-1674599004939-000417962c69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
                alt="Sunset in the mountains">
        @endif
        <div class="pb-4 pt-6 text-gray-400 text-base">
            {!! html_entity_decode($blog->body) !!}
        </div>
        @if ($blog->author->id !== Auth::id())
            <div class="pb-5 pt-3">
                <a href="{{ route('blog.critaku') }}"
                    class="text-gray-200 flex items-center hover:bg-indigo-600 bg-indigo-700 text-center px-3 rounded-md py-1 w-32 text-md ease-out duration-300 hover:text-white"><i
                        class="fa-sharp fa-arrow-left me-2 text-extrasmall"></i>back home</a>
            </div>
        @endif
    </div>


    <script type="text/javascript">
        let button = document.getElementById('close');
        let alert = document.getElementById('alert');

        button.addEventListener('click', function() {
            alert.classList.add('hidden');
        })
    </script>
@endsection
