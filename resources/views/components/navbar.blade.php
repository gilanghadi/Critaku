<nav class="fixed top-0 z-50 w-full bg-indigo-950">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between mx-2">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <div class="lg:flex-shrink-0 lg:items-center lg:space-x-4 hidden lg:flex">
                    <a href="{{ route('home.critaku') }}"
                        class="text-3xl font-bold  text-indigo-700 font-mono antialiased no-underline">Critaku</a>
                    <a href="{{ route('home.critaku') }}"
                        class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('home.critaku') ? 'border-b-2 text-white' : '' }}">Dashboard</a>
                    <a href="{{ route('blog.critaku') }}"
                        class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('blog.critaku') ? 'border-b-2 text-white' : '' }}">Blog</a>
                    <a href="{{ route('category.critaku') }}"
                        class="text-gray-300 hover:border-b-2 border-indigo-600 hover:text-white px-4 py-3  text-sm font-medium {{ Route::is('category.critaku') ? 'border-b-2 text-white' : '' }}">Topics</a>
                </div>
            </div>
            <div class="lg:hidden">
                <a href="{{ route('home.critaku') }}"
                    class="text-3xl font-bold  text-indigo-700 font-mono antialiased no-underline">Critaku</a>
            </div>
            <div class="flex items-center">
                @guest
                    <div>
                        <a href="{{ route('signin.critaku') }}"
                            class="text-gray-300 px-3 bg-indigo-700 py-1 rounded-md text-sm font-medium {{ Route::is('signin.critaku') ? 'text-white' : '' }}">Sign
                            in</a>
                        <a href="{{ route('register.critaku') }}"
                            class="text-gray-300 px-2 text-sm border-s py-1 ms-1 font-medium  {{ Route::is('register.critaku') ? 'text-white' : '' }}">Register</a>
                    </div>
                @endguest
                @auth
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                @if (Auth::user()->image)
                                    <img class="rounded-full w-8 h-8" src="{{ asset('storage/' . Auth::user()->image) }}"
                                        alt="image description">
                                @else
                                    <img class="rounded-full w-8 h-8"
                                        src="{{ asset('assets/img/profil-wa-kosong-peri.jpg') }}" alt="image description">
                                @endif
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-indigo-900 divide-y divide-gray-100 rounded shadow"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-300" role="none">
                                    {{ auth()->user()->username }}
                                </p>
                                <p class="text-sm w-40 font-medium text-gray-500 truncate" role="none">
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
