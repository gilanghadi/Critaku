<div class="card rounded-none z-10 lg:z-20 absolute bottom-0">
    <footer class="px-5 W-full lg:w-11/12 mx-auto py-5">
        <div class="grid grid-cols-4 gap-4">
            <div class="antialiased  text-gray-300 col-span-2">
                <p class="text-3xl font-semibold font-mono mb-3">Critaku</p>
                <p class="font-sans text-gray-400">
                    Critaku is a Website for Budding Writers who have an Interest in Writing blogs or Simple biographies
                </p>
                <span class="flex flex-row mt-4">
                    <a href="https://www.linkedin.com/in/gilang-hadi/"
                        class="card shadow-black flex items-center rounded-lg p-1 me-2" target="blank"><i
                            class="fa-brands fa-linkedin text-3xl"></i></a>
                    <a href="https://www.instagram.com/gilanghhadi"
                        class="card shadow-black flex items-center rounded-lg p-1 me-2" target="blank"><i
                            class="fa-brands fa-instagram text-3xl"></i></a>
                    <a href="https://github.com/gilanghadi"
                        class="card shadow-black flex items-center rounded-lg p-1 me-2" target="blank"><i
                            class="fa-brands fa-github text-3xl"></i></a>
                </span>
            </div>
            <div class="font-bold text-gray-300 lg:ps-8">
                <p class="font-semibold text-md font-sans mb-3">STARTER</p>
                <ul class="list-none">
                    <li><a href="{{ route('signin.critaku') }}"
                            class="text-sm text-gray-500 font-sans no-underline hover:underline hover:text-gray-400">Sign
                            In</a></li>
                    <li><a href="{{ route('register.critaku') }}"
                            class="text-sm text-gray-500 font-sans no-underline hover:underline hover:text-gray-400">Register</a>
                    </li>
                    <li><a href="{{ route('category.critaku') }}"
                            class="text-sm text-gray-500 font-sans no-underline hover:underline hover:text-gray-400">Topics</a>
                    </li>
                </ul>
            </div>
            <div class="font-bold text-gray-300">
                <p class="font-semibold text-md font-sans mb-3">SUPPORT</p>
                <ul class="list-none">
                    <li><a href="https://gilanghadi.netlify.app"
                            class="text-sm text-gray-500 font-sans no-underline hover:underline hover:text-gray-400"
                            target="blank">Gilanghadi</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="w-full mt-5 mb-3">
        <p class="text-center text-gray-400 font-sans text-sm">&copy; Critaku 2023 All right reserved.</p>
    </footer>
</div>
