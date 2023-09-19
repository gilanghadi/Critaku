@extends('layouts.main')
@section('content')
    <x-sidebar />
    <div class="mx-5 lg:w-7/12 md:mx-14 lg:ms-64 xl:mx-auto mt-10">
        <h1 class="text-3xl text-gray-300 border-b border-gray-400 mb-8 pb-4 font-sans font-medium">Create Your Blog</h1>
        @if (Session::has('error'))
            <p class="text-lg text-red-600 font-normal -mt-5 mb-3 pb-4">{{ Session::get('error') }}</p>
        @endif
        <form action="{{ route('homeStore.critaku') }}" class="w-full" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-400">Title
                    Blog</label>
                <div class="relative flex flex-row">
                    <input type="text" id="title" name="title"
                        class="bg-indigo-900 text-gray-300 text-sm rounded-lg focus:ring-indigo-600  block w-full p-2.5 inputAutofill @error('title')
                                border-red-500
                            @enderror"
                        value="{{ old('title') }}" required>
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
                    readonly value="{{ old('slug') }}" required>
                <p class="ms-1 text-gray-500 text-sm font-sans">Slug Is Automatically Filled According To The Title Blog !
                </p>
            </div>
            <div class="mb-6">
                <label for="option" class="block mb-2 text-sm font-medium text-gray-400">Choose Category</label>
                <select id="option" name="category_id"
                    class="bg-indigo-900  text-gray-300 text-sm form-control rounded-lg focus:ring-indigo-600 block w-full p-2.5">
                    @foreach ($categories as $category)
                        @if (old('category_id' == $category->id))
                            <option value="{{ $category->id }}" class="capitalize" selected>{{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}" class="capitalize">{{ $category->name }}</option>
                        @endif
                    @endforeach
                    @error('category_id')
                        <div class="text-red-500 text-sm right-0 bottom-0">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>
            <div class="mb-6">
                <label for="option-topic" class="block mb-2 text-sm font-medium text-gray-400">Choose Topics</label>
                <select id="option-topic" name="topic_id"
                    class="bg-indigo-900 select2 text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full p-2.5 form-control">
                    @foreach ($topics as $topic)
                        @if (old('topic_id' == $topic->id))
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
                <img src=" " alt="" id="img-preview" class="w-52 mb-5 rounded-sm">
                <input type="file" id="image" name="image"
                    class="bg-indigo-900  text-gray-300 text-sm rounded-lg focus:ring-indigo-600 block w-full inputAutofill @error('image')
                    border-red-500
                @enderror"
                    value="{{ old('image') }}" required onchange="preview()">
                @error('image')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-10">
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body" class="text-gray-300 border-2 rounded-lg border-indigo-900"></trix-editor>
                @error('body')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-14">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-400">Social Media</label>
                <div id="social_media" class="mb-5"></div>
                <button type="button"
                    class="text-white text-sm font-normal px-2 py-1 rounded-sm bg-indigo-800 hover:bg-indigo-700 focus:outline-none"
                    id="add-social">Add Social Media</button>
            </div>
            <span class="flex flex-row">
                <a href="{{ route('home.critaku') }}"
                    class="px-3 text-gray-400 text-sm py-2.5 text-center bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit"
                    class="text-white bg-indigo-600/70 hover:bg-indigo-700 focus:outline-none font-medium rounded-lg text-sm ms-2 sm:w-auto px-5 py-2.5 text-center">Create
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
