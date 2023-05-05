<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-indigo-950 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-indigo-950 ">
        <ul class="space-y-2">
            <li class="mb-4">
                <a href="#"
                    class="flex items-center p-2 justify-center text-gray-300 rounded-lg  bg-indigo-600/70 ">
                    <span class="font-medium">New Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blog.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-indigo-900/30 {{ Route::is('blog.critaku') ? 'text-white' : '' }}">
                    <i class="fa-regular fa-newspaper {{ Route::is('blog.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">All Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg  hover:bg-indigo-900/30 {{ Route::is('home.critaku') ? 'text-white' : '' }}">
                    <i class="fa-regular fa-newspaper {{ Route::is('home.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">My Blog</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
