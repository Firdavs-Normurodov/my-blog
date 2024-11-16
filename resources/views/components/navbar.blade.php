<nav class=" pt-3">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class=" text-2xl font-mono font-bold text-white">My Blog</h1>
                </div>
            </div>
            <div class="navbars flex">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a> -->
                        {{-- <a href="#blog"
                            class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300">Blog</a>
                        <a href="#"
                            class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300 ">About</a>
                        <a href="#"
                            class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300 ">Newsletter</a> --}}
                        @auth
                            <form action="{{ route('profile') }}">

                                <button
                                    class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Profile</button>
                            </form>
                        @else
                            <form action="{{ route('login') }}">
                                <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Sign
                                    In</button>
                            </form>
                            <form action="{{ route('register') }}">
                                <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Sign
                                    Up</button>
                            </form>
                        @endauth

                    </div>
                </div>

            </div>
            <!-- profile for  -->

            <div class="-mr-2 flex md:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center  p-2 bg-my-light text-my-color "
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Dashboard</a> -->
            {{-- <a href="#blog"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Newsletter</a> --}}
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                @auth
                    <form action="{{ route('profile') }}">

                        <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Profile</button>
                    </form>
                @else
                    <form action="{{ route('login') }}">
                        <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Sign In</button>
                    </form>
                    <form action="{{ route('register') }}">
                        <button class="rounded-full px-5 py-2 ml-2 text-sm font-bold text-text-dark bg-white ">Sign Up</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
