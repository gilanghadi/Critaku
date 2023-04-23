@extends('layouts.main')
@section('content')
    <div class="w-full lg:max-w-full rounded overflow-hidden shadow-lg">
        <img class="w-full lg:h-96"
            src="https://plus.unsplash.com/premium_photo-1674599004939-000417962c69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
            alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-indigo-700">
                {{ $blog->title }}
            </div>
            <p class="my-3 mt-4 text-sm text-gray-300"> <a href=""
                    class="text-indigo-700 hover:underline">gilanghadi</a> in
                <a href="{{ route('topics.critaku.show', $blog->category->slug) }}" class="hover:underline">
                    {{ $blog->category->name }}</a>
            </p>
            <p class="text-gray-400 text-base">
                {{ $blog->body }}
            </p>
        </div>
        <div class="px-6 hover:text-white pb-5">
            <a href="{{ route('blog.critaku') }}" class="text-gray-300 text-md ease-out duration-300 hover:text-gray-950"><i
                    class="fa-sharp fa-arrow-left me-1 text-xs"></i>back
                home</a>
        </div>
    </div>
@endsection
