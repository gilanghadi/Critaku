<div>
    <div class="w-full lg:w-7/12 lg:ms-64 xl:mx-auto mt-10">
        @php
            $message = false;
        @endphp
        <div class="overflow-auto h-screen scroll">
            @foreach ($notifications as $notification)
                @php
                    $data = json_decode($notification->data);
                @endphp
                @if ($data->blog_user_id === Auth::id())
                    <div class="mb-4 mx-5 lg:mx-0">
                        <div class="card p-4 rounded-lg flex flex-col lg:flex-row">
                            <div class="flex">
                                @if ($data->commented_avatar !== null)
                                    @if (file_exists('storage/' . $data->commented_avatar))
                                        <img src="{{ asset('assets/img/profil-wa-kosong-peri.jpg') }}"
                                            class="h-12 w-12 rounded-lg text-center mb-3 lg:mb-0" alt="" />
                                    @else
                                        <img src="{{ $data->commented_avatar }}"
                                            class="h-12 w-12 rounded-lg text-center mb-3 lg:mb-0" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('assets/img/profil-wa-kosong-peri.jpg') }}"
                                        class="h-12 w-12 rounded-lg text-center mb-3 lg:mb-0" alt="" />
                                @endif
                            </div>
                            <div class="flex flex-col w-full lg:ms-5">
                                <div class="flex flex-row justify-between mb-2">
                                    <span>
                                        <a href="{{ route('blog.critaku.show', $data->comment_for_blog) }}"
                                            class="text-indigo-700 hover:underline font-bold text-xl mb-2 capitalize">
                                            {{ $data->commented_username }} Commented Your Blog
                                        </a>
                                        <span class="text-gray-400 ms-1">(
                                            {{ $data->comment_for_blog }} )</span>
                                    </span>

                                </div>
                                <div class="text-xs flex flex-row justify-between">
                                    <span class="text-gray-300">{{ $notification->created_at->diffForHumans() }}</span>
                                    <span>
                                        <a href="{{ route('markread', $notification->id) }}"
                                            class="text-gray-300 hover:underline"><i
                                                class="fa-solid fa-location me-1"></i>Markread</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($data->blog_user_id !== Auth::id())
                    @php
                        $message = true;
                    @endphp
                @endif
            @endforeach
            @if ($message)
                <div class="bg-indigo-600/20 py-3 px-4 flex justify-between rounded-lg text-gray-300 mx-5 lg:mx-0">
                    Notification Empty..
                </div>
            @endif
        </div>
    </div>
</div>
