@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="lg:w-7/12 md:mx-14 lg:ms-64 xl:mx-auto mt-10 mx-5">
        <h1 class="text-3xl text-gray-300 border-b border-gray-400 mb-8 pb-4 font-sans font-medium">Update Your Blog</h1>
        @if (Session::has('error'))
            <p class="text-lg text-red-600 font-normal -mt-5 mb-3 pb-4">{{ Session::get('error') }}</p>
        @endif
        <form action="{{ route('homeUpdate.critaku', $blog->slug) }}" class="w-full" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $blog->id }}">
            <input type="hidden" name="user_id" value="{{ $blog->user_id }}">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-400">Title
                    Blog</label>
                <div class="relative flex flex-row">
                    <input type="text" id="title" name="title"
                        class="bg-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill @error('title')
                                border-red-500
                            @enderror"
                        value="{{ old('title', $blog->title) }}" required>
                    @error('title')
                        <i class="fa-solid fa-exclamation text-red-500 bottom-4 text-sm absolute right-4"></i>
                    @enderror
                </div>
                @error('title')
                    <div class="text-red-500 text-sm right-0 bottom-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-400">Slug
                </label>
                <input type="text" id="slug" name="slug"
                    class="bg-indigo-900  text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full p-2.5 inputAutofill @error('slug')
                    border-red-500
                @enderror"
                    readonly value="{{ old('slug', $blog->slug) }}" required>
                @error('slug')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <p class="ms-1 text-gray-500 text-sm font-sans">Slug Is Automatically Filled According To The Title Blog !
                </p>
            </div>
            <div class="mb-10">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-400">Choose Category</label>
                <select id="category" name="category_id"
                    class="bg-indigo-900  text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full p-2.5">
                    @foreach ($categories as $category)
                        @if (old('category_id', $blog->category_id) == $category->id)
                            <option value="{{ $category->id }}" class="capitalize" selected>{{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}" class="capitalize">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="option-topic" class="block mb-2 text-sm font-medium text-gray-400">Choose Topics</label>
                <select id="option-topic" name="topic_id"
                    class="bg-indigo-900 select2 text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full p-2.5 form-control">
                    @foreach ($topics as $topic)
                        @if ($topic->id === $blog->topic_id)
                            <option value="{{ $topic->id }}" class="capitalize" selected>{{ $topic->name }}
                            </option>
                        @else
                            <option value="{{ $topic->id }}" class="capitalize">{{ $topic->name }}</option>
                        @endif
                    @endforeach
                    <option value="other">Other</option>
                    @error('topic_id')
                        <div class="text-red-500 text-sm right-0 bottom-0">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>
            <div id="add-other"></div>
            <div class="mb-14">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-400">Image
                </label>
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->image }}" id="img-preview"
                    class="w-52 mb-5 rounded-sm">
                <input type="file" id="image" name="image"
                    class="bg-indigo-900  text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full inputAutofill @error('image')
                    border-red-500
                @enderror"
                    value="{{ $blog->image }}" accept="image/jpg, image/jpeg, image/png" onchange="preview()">
                @error('image')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-10">
                <input id="body" type="hidden" name="body" value="{{ old('body', $blog->body) }}">
                <trix-editor input="body" class="text-gray-300 border-2 rounded-lg border-indigo-900"></trix-editor>
                @error('body')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-14">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-400">Social Media</label>
                <p class="text-md text-indigo-600 font-normal mt-2 mb-3 pb-4" id="message_delete_sosmed"></p>
                <div id="social_media" class="mb-3"></div>
                @if (count($social_medias) > 0)
                    @foreach ($social_medias as $social_media)
                        <div class="relative flex flex-row mb-3">
                            <input type="text" id="social_media" name="social_media[]"
                                class="bg-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill @error('social_media')
                                border-red-500
                            @enderror"
                                value="{{ old('social_media', $social_media->url_social_media) }}"
                                placeholder="Add your link social media">
                            <i class="fa-solid fa-x text-red-500 bottom-3 top-3 text-sm absolute right-4 cursor-pointer"
                                data-tooltip-target="tooltip-default" id="delete-sosmed"
                                data-sosmed="{{ $social_media->id }}"></i>
                            <div id="tooltip-default" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Remove Social Media
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <button type="button"
                    class="text-white text-sm font-normal px-2 py-1 rounded-sm bg-indigo-800 hover:bg-indigo-700 focus:outline-none"
                    id="add-social">Add Social Media</button>
            </div>
            <span class="flex flex-row">
                <a href="{{ route('home.critaku') }}"
                    class="px-3 text-gray-400 text-sm py-2.5 text-center bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit"
                    class="text-white bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg text-sm ms-2 sm:w-auto px-5 py-2.5 text-center">Update
                    Blog</button>
            </span>
        </form>

    </div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {

            fetch('/dashboard/blog/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })

        function preview() {
            const imgPreview = document.querySelector('#img-preview')
            const inputImage = document.querySelector('#image')
            imgPreview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(inputImage.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection
