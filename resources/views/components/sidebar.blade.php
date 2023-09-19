<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 lg:z-10 w-64 h-screen pt-20 transition-transform -translate-x-full lg:translate-x-0"
    aria-label="Sidebar" style="background-color: #020617 !important">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2">
            <li class="mb-4">
                <a href="{{ route('homeCreate.critaku') }}"
                    class="flex items-center p-2 justify-center text-white rounded-lg  bg-indigo-600/70 ">
                    <span class="font-medium">New Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blog.critaku') }}"
                    class="flex items-center p-3 text-gray-300 rounded-lg hover:bg-indigo-900/30 {{ Route::is('blog.critaku') ? 'text-white bg-indigo-900/30' : '' }}">
                    <i class="fa-solid fa-share {{ Route::is('blog.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">All Threads</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home.critaku') }}"
                    class="flex items-center p-3 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('home.critaku') ? 'text-white bg-indigo-900/30' : '' }}">
                    <i class="fa-regular fa-newspaper {{ Route::is('home.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">My Blog</span>
                </a>
            </li>
            <li>
                <a href="{{ route('category.critaku') }}"
                    class="flex items-center p-3 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('home.critaku') ? 'text-white bg-indigo-900/30' : '' }} lg:hidden">
                    <i class="fa-solid fa-border-all {{ Route::is('category.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">Topics</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.critaku') }}"
                    class="flex items-center p-3 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('profile.critaku') ? 'text-white bg-indigo-900/30' : '' }}">
                    <i class="fa-solid fa-user {{ Route::is('profile.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('notification.critaku') }}"
                    class="flex items-center p-3 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('notification.critaku') ? 'text-white bg-indigo-900/30' : '' }}">
                    <i class="fa-solid fa-bell {{ Route::is('notification.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">Notification
                        @auth
                            @php
                                $notification = \App\Models\Notification::all();
                                $notifCount = false;
                            @endphp
                            @foreach ($notification as $notif)
                                @php
                                    $data = json_decode($notif->data);
                                @endphp
                                @if ($data->blog_user_id === Auth::id())
                                    @php
                                        $notifCount = true;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($notifCount)
                                <span
                                    class="bg-indigo-700 text-white ms-4 rounded-full py-0 px-1">{{ $notification->count() }}</span>
                            @endif
                        @endauth
                    </span>
                </a>
            </li>
            @auth
                <li>
                    <form action="{{ route('logout.critaku') }}" method="post">
                        @csrf
                        @if (Auth::user()->provider_id !== null)
                            <input type="hidden" name="provider_id" value="{{ Auth::user()->provider_id }}">
                        @endif
                        <button type="submit"
                            class="w-full p-3 flex text-sm items-center text-gray-300 rounded-lg hover:bg-indigo-900/30"
                            role="menuitem"><i class="fa-solid fa-right-from-bracket me-3 text-white"></i> Sign
                            Out</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</aside>
