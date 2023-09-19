<input type="hidden" id="isval-all" name="isval-all" value="false">
<div class="mt-10 mx-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 lg:grid-cols-6 mb-80">
    @foreach ($topicToCategory as $topic)
        <a href="{{ route('topic.critaku.show', $topic->topic->slug) }}"
            class="hover:bg-indigo-700/20 card ease-out duration-300 rounded-2xl">
            <div class="flex flex-row w-full py-2">
                <div class="flex items-center m-4">
                    <img src="https://plus.unsplash.com/premium_photo-1674599004939-000417962c69?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
                        class="h-10 w-12 rounded" alt="" />
                </div>
                <div class="w-full mt-3 md:block">
                    <h1 class="text-left text-lg font-semibold text-indigo-700 capitalize">
                        {{ \Illuminate\Support\Str::limit($topic->topic->name, 11, '..') }}
                    </h1>
                    <div class="text-left md:block text-gray-400 font-bold font-sans" style="font-size: 12px;">
                        {{ $blogs->where('topic_id', '==', $topic->topic->id)->count() }} Article
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
