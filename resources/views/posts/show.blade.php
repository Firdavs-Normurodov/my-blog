@extends('posts.head')

@section('title', 'Show Post')

@section('content')
<div class="container">
    <h1 class="font-bold">{{ $post->title }}</h1>
    <div class="profile">
        <div class="div">
            @if ($user->profile_image)
            <img class="h-20 w-20" src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile image">
            @else
            <img class="h-20 w-20" src="{{ asset('images/login.jpg') }}" alt="Default profile image">
            @endif
        </div>
        <p>Email: {{ $user->email }}</p>
    </div>
</div>

<main class="container mx-auto mt-8">
    <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-8/12 px-4 mb-8">
            <div class="">
                <h2 class="text-2xl mb-7">{{$post->title}}</h2>
                @if ($post->image)
                <img src="{{ asset('storage/posts_images/' . $post->image) }}" alt="Featured Image" class="w-full">
                @endif
            </div>
            <div>
                <p class="text-gray-700 mb-4">{{$post->short_content}}</p>
                <p class="mb-4 text-sm">{{$post->content}}</p>
            </div>

        </div>
        <div class="w-full md:w-4/12 px-4 mb-8">
            <div class="bg-gray-100 px-4 py-6 rounded">
                <h3 class="text-lg font-bold mb-2">Categories</h3>
                <ul class="list-disc list-inside">
                    <li><a href="#" class="text-gray-700 hover:text-gray-900">Technology</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900">Travel</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900">Food</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection