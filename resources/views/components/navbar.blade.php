<nav class=" pt-3">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <!-- <img class="w-48" src="{{ asset('images/logo.png') }}"" alt=""> -->
                    <h1 class=" text-2xl font-mono font-bold text-white">My Blog</h1>
                    <!-- <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"> -->
                </div>
            </div>
            <div class="navbars flex">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a> -->
                        <a href="#blog" class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300 hover:font-bold hover:text-white">Blog</a>
                        <a href="#" class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300 hover:font-bold hover:text-white">Projects</a>
                        <a href="#" class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300 hover:font-bold hover:text-white">About</a>
                        <a href="#" class="rounded-md px-4 py-2 text-sm font-medium transition-all text-gray-300 hover:font-bold hover:text-white">Newsletter</a>
                        @auth
                        <form action="{{ route('profile') }}">
                            <!-- @if(auth()->user()->profile_image)
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" class="w-5 h-5 rounded-full" alt="Profile Image">
                            @else
                            <img src="{{ asset('images/default-profile.jpg') }}" class="w-5 h-5 rounded-full" alt="Default Profile Image">
                            @endif -->
                            <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Profile</button>
                        </form>
                        @else
                        <form action="{{ route('login') }}">
                            <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Sign In</button>
                        </form>
                        <form action="{{ route('register') }}">
                            <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Sign Up</button>
                        </form>
                        @endauth

                    </div>
                </div>

            </div>
            <!-- profile for  -->

            <div class="-mr-2 flex md:hidden">
                <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Dashboard</a> -->
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                    <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                </div>
                <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>