@extends('layouts.main')
@section('content')
    @auth
        <x-sidebar />
    @endauth
    <div class="w-12/12 flex flex-row {{ $social_media != null ? 'justify-end' : 'justify-center' }} items-start mt-10">
        <div class="w-9/12 lg:w-7/12 rounded overflow-hidden">
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
                <p class="mt-5 mb-3 text-md text-white">By<a href="" class="text-gray-400 hover:underline">
                        {{ $blog->author->username }}</a> in
                    <a href="{{ route('category.critaku.show', $blog->category->slug) }}"
                        class="text-gray-400 hover:underline">
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
            <div class="w-full flex justify-between flex-row">
                <div
                    class="px-2 mt-2 cursor-default hover:text-indigo-700 capitalize text-sm ease-out duration-300 text-gray-300 rounded-md border border-gray-300 flex items-center hover:bg-white">
                    {{ $blog->topics->name }}
                </div>
                <p class="text-end text-white px-3 py-2 text-sm">
                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</p>
            </div>
            <div class="pb-4 pt-6 text-gray-400 text-base">
                {!! html_entity_decode($blog->body) !!}
            </div>
            @if ($blog->author->id !== Auth::id())
                <div class="pb-16 pt-3">
                    <a href="{{ route('blog.critaku') }}"
                        class="text-gray-200 flex items-center hover:bg-indigo-600 bg-indigo-700 text-center px-3 rounded-md py-1 w-32 text-md ease-out duration-300 hover:text-white"><i
                            class="fa-sharp fa-arrow-left me-2 text-extrasmall"></i>back home</a>
                </div>
            @endif
            <div class="mt-20">
                <h3 class="sm:text-md text-2xl text-white mb-4 font-semibold">Comments Section</h4>
                    @if ($blog->author->id !== Auth::id())
                        <button type="button"
                            class="bg-gray-400 px-4 py-1 mb-3 hover:bg-gray-300 ease-out duration-300 hover:text-indigo-600 font-sans font-semibold rounded-md"
                            id="display-form"><i class="fa-regular fa-comment"></i> Comment</button>
                        @if (Session::has('success'))
                            <div class="bg-indigo-600/20 text-md py-3 px-3 capitalize flex justify-between rounded-lg text-gray-300 text-sm"
                                id="alert">
                                {{ Session::get('success') }}
                                <button type="button" data-collapse-toggle="alert"><i class="fa-solid fa-x"></i></button>
                            </div>
                        @endif
                        <form action="{{ route('postcomment.critaku', $blog->id) }}" method="post" id="comment"
                            class="hidden">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <textarea name="comment_body" id="comment_body"
                                class="bg-indigo-900 text-gray-300 h-28 text-sm rounded-lg p-2.5 inputAutofill block w-full" required
                                autocomplete="off"></textarea>
                            <button type="submit"
                                class="text-gray-200 flex mt-3 items-center hover:bg-indigo-600 bg-indigo-700 text-center px-4 rounded-md py-2 text-md ease-out duration-300 hover:text-white">Submit</button>
                        </form>
                    @endif
                    @if ($comments->count())
                        <div class="overflow-auto h-screen scroll mt-7">
                            <div class="mb-4 mx-5 lg:mx-0">
                                @foreach ($comments as $comment)
                                    <div class="p-5 flex border-b border-gray-400 flex-col lg:flex-row">
                                        <div class="flex">
                                            @if ($comment->user->image)
                                                @if (file_exists('storage/' . $comment->user->image))
                                                    <img src="{{ asset('storage/' . $comment->user->image) }}"
                                                        class="h-14 w-14 rounded-lg text-center mb-3 lg:mb-0"
                                                        alt="{{ $comment->user->image }}" />
                                                @else
                                                    <img src="{{ $comment->user->image }}"
                                                        class="h-14 w-14 rounded-lg text-center mb-3 lg:mb-0"
                                                        alt="{{ $comment->user->image }}" />
                                                @endif
                                            @else
                                                <img src="{{ asset('assets/img/profil-wa-kosong-peri.jpg') }}"
                                                    class="h-14 w-14 rounded-lg text-center mb-3 lg:mb-0" alt="" />
                                            @endif
                                        </div>
                                        <div class="flex flex-col w-full lg:ms-5">
                                            <div class="flex flex-row justify-between mb-2">
                                                <span>
                                                    <a href="{{ route('blog.author.critaku', $comment->user->username) }}"
                                                        class="items-center hover:underline leading-none text-indigo-700 me-2">
                                                        {{ $comment->user->name }}
                                                    </a>
                                                    <span
                                                        class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                                </span>
                                            </div>
                                            <div class="flex flex-row justify-between">
                                                <p class="text-gray-400 mb-4">
                                                    {{ $comment->comment_body }}
                                                </p>
                                                @if ($comment->user_id === Auth::id())
                                                    <span>
                                                        <a href="{{ route('deletecomment.critaku', $comment->comment_body) }}"
                                                            class="text-gray-300 text-xs hover:underline"><i
                                                                class="fa-solid fa-trash me-1"></i>delete</a>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
            </div>
        </div>
        @if ($social_media != null)
            <x-rightbar :social="$social_media" />
        @endif
    </div>

@endsection


@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#close').on('click', function() {
                $('#alert').addClass('hidden');
            })

            $('#display-form').on('click', function() {
                $('#comment').toggle('slide')
            })
        })
    </script>
@endsection
