<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 lg:z-10 w-64 h-screen pt-20 transition-transform -translate-x-full bg-indigo-950 lg:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-indigo-950 ">
        <ul class="space-y-2">
            <li class="mb-4">
                <a href="{{ route('homeCreate.critaku') }}"
                    class="flex items-center p-2 justify-center text-white rounded-lg  bg-indigo-600/70 ">
                    <span class="font-medium">New Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blog.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-indigo-900/30 {{ Route::is('blog.critaku') ? 'text-white' : '' }}">
                    <i class="fa-solid fa-share {{ Route::is('blog.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">All Threads</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('home.critaku') ? 'text-white' : '' }}">
                    <i class="fa-regular fa-newspaper {{ Route::is('home.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">My Blog</span>
                </a>
            </li>
            <li>
                <a href="{{ route('category.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('home.critaku') ? 'text-white' : '' }} lg:hidden">
                    <i class="fa-solid fa-border-all {{ Route::is('category.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">Topics</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('profile.critaku') ? 'text-white' : '' }}">
                    <i class="fa-solid fa-user {{ Route::is('profile.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">Profile</span>
                </a>
            </li>
            @auth
                <li>
                    <form action="{{ route('logout.critaku') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="w-full p-2 flex text-sm items-center text-gray-300 rounded-lg hover:bg-indigo-900/30"
                            role="menuitem"><i class="fa-solid fa-right-from-bracket me-3 text-white"></i> Sign
                            Out</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</aside>
