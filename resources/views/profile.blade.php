@extends('posts.head')
@section('title', 'Profile')

@section('content')
   
    <section class="relative pt-36 pb-20 mb-20 bg-my-light ">
        <img src="https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?cs=srgb&dl=pexels-pixabay-531880.jpg&fm=jpg" alt="cover-image" class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
        <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex items-center justify-center relative z-10 mb-2.5">
                <img src="https://pagedone.io/asset/uploads/1705471668.png" alt="user-avatar-image" class="border-4 border-solid border-white rounded-full object-cover">
            </div>
            <div class="flex flex-col sm:flex-row max-sm:gap-5 items-center justify-between mb-5">
                <ul class="flex items-center gap-5">
                    <li> <a href="/" class="flex items-center gap-2 cursor-pointer group">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.5 14.0902L7.5 14.0902M2.5 9.09545V14.0902C2.5 15.6976 2.5 16.5013 2.98816 17.0006C3.47631 17.5 4.26198 17.5 5.83333 17.5H14.1667C15.738 17.5 16.5237 17.5 17.0118 17.0006C17.5 16.5013 17.5 15.6976 17.5 14.0902V10.9203C17.5 9.1337 17.5 8.24039 17.1056 7.48651C16.7112 6.73262 15.9846 6.2371 14.5313 5.24606L11.849 3.41681C10.9528 2.8056 10.5046 2.5 10 2.5C9.49537 2.5 9.04725 2.80561 8.151 3.41681L3.98433 6.25832C3.25772 6.75384 2.89442 7.0016 2.69721 7.37854C2.5 7.75548 2.5 8.20214 2.5 9.09545Z"
                                    stroke="black" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                            <span class="font-medium text-base leading-7 text-gray-900">Home</span>
                        </a>
                    </li>
                    <li> <a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="20" viewBox="0 0 5 20"
                                fill="none">
                                <path d="M4.12567 1.13672L1 18.8633" stroke="#E5E7EB" stroke-width="1.6"
                                    stroke-linecap="round" />
                            </svg>
                            <span class="font-medium text-base leading-7 text-gray-400">Account</span>
                        </a>
                    </li>
                   
                </ul>
                <div class="flex items-center gap-4">
                    <a href="{{ route('posts.create') }}"
                        class="rounded-full border border-solid border-gray-300 bg-my_green py-3 px-4 text-sm font-semibold text-my-light shadow-sm shadow-transparent transition-all duration-500">
                        Create Post
                    </a>
                    
                        @auth

                        <form method="POST" action="{{ route('logout') }}" class="rounded-full border border-solid border-red-600 bg-red-600 py-3 px-4 text-sm font-semibold text-white whitespace-nowrap shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:bg-indigo-700 hover:border-indigo-700">

                            @csrf
                            <button type="submit"
                                class="text-my-light">Logout</button>
                        </form>
                    @endauth
                    
                </div>
            </div>
            <p class="font-normal text-lg text-my-color text-center mb-2">{{$user->created_at->format('d M Y')}}</p> 

            <h3 class="text-center font-manrope font-bold text-3xl leading-10 text-gray-900 mb-3">{{$user->name}} {{$user->surname}}</h3>
            <p class="font-normal text-base  text-gray-500 text-center mb-2">{{$user->email}}</p>
            <p class=" text-lg font-semibold text-my-color text-center mb-8">{{$user->bio}}</p>
        
        </div>
    </section>
                                            
    <div class=" w-full flex  justify-center pb-10">
        <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

            @foreach ($user->posts as $post)
                <div class="group relative ">
                    <div
                        class="relative h-80 w-full overflow-hidden  bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                        <img src="{{ asset('storage/posts_images/' . $post->image) }}" alt="{{ $post->title }}"
                            class="h-full w-full object-cover object-center">
                    </div>
                    <p class="mt-6 text-sm  text-my-light font-bold">
                        {{ $post->created_at->format('l  d M Y') }} | {{$post->category}}
                    </p>
                    <h1 class="text-lg font-semibold py-4 text-my-light">{{ $post->title }}</h1>
                    <p class=" text-base text-color-dark">
                        {{ $post->short_content }}
                    </p>
                    <div class="buttons flex items-center mb-10">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="btn bg-my-light py-1.5 px-4 mt-3 text-my_green font-medium rounded-full">Edit</a>
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="btn mx-5 bg-my-light py-1.5 px-4 mt-3 text-my_blue font-medium rounded-full">Show</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="btn bg-my-light py-1.5 px-4 mt-3 text-my_pink font-medium rounded-full">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
