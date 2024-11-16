@extends('posts.head')

@section('title', 'Show Post')

@section('content')

    <nav class=" pt-3">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <!-- <img class="w-48" src="{{ asset('images/logo.png') }}"" alt=""> -->
                        <a href="/" class=" text-2xl font-mono font-bold text-white ">Go Back</a>
                        <!-- <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"> -->
                    </div>
                </div>
                <div class="navbars flex">
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                           
                            @auth
                            <a href="/"
                            class="rounded-full px-5 py-2 text-sm font-bold  text-my-light  ">Home</a>    
                            <form action="{{ route('profile') }}">

                                    <button
                                        class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Profile</button>
                                </form>

                            @else
                            <a href="/"
                            class="rounded-full px-5 py-2 text-sm font-bold  text-my-light  ">Home</a>
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
                    @auth
                    <a href="/"
                    class="rounded-full px-5 py-2 text-sm font-bold  text-my-light  ">Home</a>
                        <form action="{{ route('profile') }}">

                            <button class="rounded-full px-5 py-2 text-sm font-bold text-text-dark bg-white ">Profile</button>
                        </form>
                    @else
                    <a href="/"
                    class="rounded-full px-5 py-2 text-sm font-bold  text-my-light  ">Home</a>
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

    </nav>
    <div class="conatiner-fluid">
        <div class="line mt-3 flex justify-center">
            <hr class="bg-my-light  w-11/12">
        </div>
        <h2 class="text-center text-[15vw]   font-semibold text-my-light">SHOW POST</h2>
        <div class="line flex  justify-center">
            <hr class="bg-my-light  w-11/12">
        </div>
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-10 sm:py-20 lg:max-w-none lg:py-16">



                    <div class=" mt-20 space-y-12 lg:grid lg:grid-cols-1  lg:gap-x-6 lg:space-y-0">
                        <div class="group lg:flex">

                            <div class=" lg:pl-5  sm:w-full lg:-translate-y-6">

                                <div class=" flex items-center mt-6 text-sm  text-my-light  font-bold">
                                    <div class="user-img">
                                        @if ($user->profile_image)
                                            <img class="h-16 w-16 rounded-full border"
                                                src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile image">
                                        @else
                                            <img class="h-16 w-16 rounded-full border" src="{{ asset('images/login.jpg') }}"
                                                alt="Default profile image">
                                        @endif
                                    </div>
                                    <div class="user-about flex text-lg">
                                        <p class="ml-2">{{ $user->name }} {{ $user->surname }} <span class="mx-1">
                                                |</span></p>
                                        <p>{{ $user->created_at->format(' d M Y') }} <span class="mx-1">|</span>
                                        </p>
                                        <p>{{ $post->category }}</p>
                                    </div>
                                </div>
                                <h1 class="text-4xl font-semibold mb-8 py-4 text-my-light">{{ $post->title }}</h1>
                                <p class=" text-lg font-semibold text-my-light">
                                    {{ $post->short_content }}
                                </p>
                                <p class=" mt-5 text-base text-my-light leading-7">
                                    {{ $post->content }}
                                </p>

                            </div>
                            <div class=" lg:h-screen sm:80 sm:w-full overflow-hidden flex justify-center items-center ">
                                <div class="img w-11/12 ">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/posts_images/' . $post->image) }}"
                                            class=" object-cover object-center" alt="#">
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="relative isolate overflow-hidden b py-16 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Subscribe to our newsletter.</h2>
                    <p class="mt-4 text-lg leading-8 text-gray-300">Nostrud amet eu ullamco nisi aute in ad minim nostrud
                        adipisicing velit quis. Duis tempor incididunt dolore.</p>
                    <div class="mt-6 flex max-w-md gap-x-4">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10  border-none outline-none sm:text-sm sm:leading-6"
                            placeholder="Enter your email">
                        <button type="submit"
                            class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
                    </div>
                </div>
                <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                    <div class="flex flex-col items-start">
                        <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                        </div>
                        <dt class="mt-4 font-semibold text-white">Weekly articles</dt>
                        <dd class="mt-2 leading-7 text-gray-400">Non laboris consequat cupidatat laborum magna. Eiusmod non
                            irure cupidatat duis commodo amet.</dd>
                    </div>
                    <div class="flex flex-col items-start">
                        <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.05 4.575a1.575 1.575 0 1 0-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 0 1 3.15 0v1.5m-3.15 0 .075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 0 1 3.15 0V15M6.9 7.575a1.575 1.575 0 1 0-3.15 0v8.175a6.75 6.75 0 0 0 6.75 6.75h2.018a5.25 5.25 0 0 0 3.712-1.538l1.732-1.732a5.25 5.25 0 0 0 1.538-3.712l.003-2.024a.668.668 0 0 1 .198-.471 1.575 1.575 0 1 0-2.228-2.228 3.818 3.818 0 0 0-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0 1 16.35 15m.002 0h-.002" />
                            </svg>
                        </div>
                        <dt class="mt-4 font-semibold text-white">No spam</dt>
                        <dd class="mt-2 leading-7 text-gray-400">Officia excepteur ullamco ut sint duis proident non
                            adipisicing. Voluptate incididunt anim.</dd>
                    </div>
                </dl>
            </div>
        </div>
        
    </div>
@endsection
