{{-- <div>
    <!-- Be present above all else. - Naval Ravikant -->
    <nav class="bg-indigo-950">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false" data-collapse-toggle="mobile-menu">
                        <span class="sr-only">Open main menu</span>
                        <!--
                  Icon when menu is closed.
      
                  Menu open: "hidden", Menu closed: "block"
                -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                  Icon when menu is open.
      
                  Menu open: "block", Menu closed: "hidden"
                -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="{{ route('home.critaku') }}"
                            class="text-3xl font-bold  text-indigo-700 font-mono antialiased no-underline">Critaku</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block mx-auto">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            @auth
                                <a href="{{ route('home.critaku') }}"
                                    class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('home.critaku') ? 'border-b-2 text-white' : '' }}">Dashboard</a>
                            @endauth
                            <a href="{{ route('blog.critaku') }}"
                                class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('blog.critaku') ? 'border-b-2 text-white' : '' }}">Blog</a>
                            <a href="{{ route('category.critaku') }}"
                                class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('category.critaku') ? 'border-b-2 text-white' : '' }}">Topics</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                    @guest
                        <div>
                            <a href="{{ route('signin.critaku') }}"
                                class="text-gray-300 px-4 border-e-2 text-sm font-medium {{ Route::is('signin.critaku') ? 'text-white' : '' }}">Sign
                                in</a>
                            <a href="{{ route('register.critaku') }}"
                                class="text-gray-300 px-2 text-sm font-medium  {{ Route::is('register.critaku') ? 'text-white' : '' }}">Register</a>
                        </div>
                    @endguest
                    @auth
                        <div class="relative ml-3">
                            <!-- Dropdown menu -->
                            <div id="dropdownAvatarName"
                                class="z-10 hidden bg-indigo-700/30 divide-y divide-gray-400 rounded-lg shadow w-44">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                    <div class="text-gray-400">Email</div>
                                    <div class="truncate text-gray-300">{{ auth()->user()->email }}</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-300"
                                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                    <li>
                                        <a href="{{ route('profile.critaku') }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Your
                                            Profil</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <form action="{{ route('logout.critaku') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="flex ps-4 justify-start py-2 text-sm text-gray-300 hover:bg-gray-100 w-full">Sign
                                            out</button>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                                    class="flex items-center text-sm font-medium text-gray-400 hover:text-white md:mr-0"
                                    type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <div class="ms-2">
                                        {{ auth()->user()->username }}
                                    </div>
                                    <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @auth
                    <a href="{{ route('home.critaku') }}"
                        class="text-gray-300 hover:bg-gray-900/50 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ Route::is('home.critaku') ? 'bg-gray-900' : '' }}">Dashboard</a>
                @endauth
                @guest
                    <a href="{{ route('blog.critaku') }}"
                        class="text-gray-300 hover:bg-gray-900/50 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ Route::is('blog.critaku') ? 'bg-gray-900' : '' }}">Blog</a>
                    <a href="{{ route('category.critaku') }}"
                        class="text-gray-300 hover:bg-gray-900/50 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ Route::is('category.critaku') ? 'bg-gray-900' : '' }}">Topics</a>
                @endguest
            </div>
        </div>
    </nav>
</div> --}}



<nav class="fixed top-0 z-50 w-full bg-indigo-950">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between mx-2">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <div class="flex flex-shrink-0 items-center space-x-4">
                    <a href="{{ route('home.critaku') }}"
                        class="text-3xl font-bold  text-indigo-700 font-mono antialiased no-underline">Critaku</a>
                    @auth
                        <a href="{{ route('home.critaku') }}"
                            class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('home.critaku') ? 'border-b-2 text-white' : '' }}">Dashboard</a>
                    @endauth
                    <a href="{{ route('blog.critaku') }}"
                        class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('blog.critaku') ? 'border-b-2 text-white' : '' }}">Blog</a>
                    <a href="{{ route('category.critaku') }}"
                        class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('category.critaku') ? 'border-b-2 text-white' : '' }}">Topics</a>
                </div>
            </div>
            <div class="flex items-center">
                @guest
                    <div>
                        <a href="{{ route('signin.critaku') }}"
                            class="text-gray-300 px-4 border-e-2 text-sm font-medium {{ Route::is('signin.critaku') ? 'text-white' : '' }}">Sign
                            in</a>
                        <a href="{{ route('register.critaku') }}"
                            class="text-gray-300 px-2 text-sm font-medium  {{ Route::is('register.critaku') ? 'text-white' : '' }}">Register</a>
                    </div>
                @endguest
                @auth
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-indigo-900 divide-y divide-gray-100 rounded shadow"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-300" role="none">
                                    {{ auth()->user()->username }}
                                </p>
                                <p class="text-sm font-medium text-gray-500 truncate" role="none">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('profile.critaku') }}"
                                        class="block px-4 py-2 text-sm text-gray-400 hover:bg-gray-600/30 hover:text-white"
                                        role="menuitem">Your Profile</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout.critaku') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="block ps-4 text-start w-full py-2 text-sm text-gray-400 hover:bg-gray-600/30 hover:text-white"
                                            role="menuitem">Sign
                                            Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

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
            <li>
                <a href="{{ route('blog.critaku') }}"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-indigo-900/30 {{ Route::is('blog.critaku') ? 'text-white' : '' }}">
                    <i class="fa-regular fa-newspaper {{ Route::is('blog.critaku') ? 'text-indigo-600' : '' }}"></i>
                    <span class="ml-3">All Blogs</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-300 rounded-lg  hover:bg-indigo-900/30">
                    <i class="fa-solid fa-person"></i>
                    <span class="ml-3">Your Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
