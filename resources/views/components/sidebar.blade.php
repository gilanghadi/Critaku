<div class="">
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <aside class="float-left m-4 pt-6 sticky top-5">
        <div class="flex flex-row items-center text-sm text-white bg-indigo-900 rounded-lg px-12 py-2">
            <i class="fa-solid fa-plus"></i>
            <a href="" class="ms-2">New Blog</a>
        </div>
        <div class="mt-7">
            <ul class="">
                <li
                    class="cursor-pointer mb-3 ease-in-out duration-300 hover:bg-indigo-900/30 hover:text-white p-2 ps-4 text-gray-300 rounded-lg {{ Route::is('blog.critaku') ? 'bg-indigo-900/30 text-white' : '' }}">
                    @if (Route::is('blog.critaku'))
                        <i class="fa-solid fa-square text-indigo-600"></i>
                    @else
                        <i class="fa-regular fa-square"></i>
                    @endif
                    <a href="{{ route('blog.critaku') }}" class="text-sm ms-2">All
                        Blogs</a>
                </li>
                <li
                    class="cursor-pointer mb-3 ease-in-out duration-300 hover:bg-indigo-900/30 hover:text-white p-2 ps-4 text-gray-300 rounded-lg {{ Route::is('category.critaku') ? 'bg-indigo-900/30 text-white' : '' }}">
                    @if (Route::is('category.critaku'))
                        <i class="fa-solid fa-square text-indigo-600"></i>
                    @else
                        <i class="fa-regular fa-square"></i>
                    @endif
                    <a href="{{ route('blog.critaku') }}" class="text-sm ms-2">All
                        Blogs</a>
                </li>
            </ul>
        </div>
    </aside>
</div>
