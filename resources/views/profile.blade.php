@extends('posts.head')
@section('title', 'Profile')

@section('content')
<div class="container">
    <!-- Foydalanuvchi ma'lumotlari -->
    <div class="profile-header">
        <h1>{{ $user->name }} {{ $user->surname }}</h1>
        <p>Email: {{ $user->email }}</p>
        <p>Bio: {{ $user->bio }}</p>
        <a href="/" class=" bg-my_blue text-my-light my-4 px-4 py-2 rounded">Bosh sahifa</a>

        <!-- Profil rasmi -->
        @if ($user->profile_image)
        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profil rasmi" style="width: 150px; height: 150px; border-radius: 50%;">
        @else
        <img src="{{ asset('images/login.jpg') }}" alt="Default profile image" style="width: 150px; height: 150px; border-radius: 50%;">
        @endif
    </div>

    <!-- Post yaratish tugmasi -->
    <div class="mt-4">
        <a href="{{ route('posts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Post yaratish</a>
    </div>

    <!-- Foydalanuvchi yaratgan postlar -->
    <h2 class="mt-6">Yaratilgan postlar</h2>
    @if ($user->posts->count() > 0)
    @foreach ($user->posts as $post)
    <div class="post mt-4 p-4 border rounded-lg">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->short_content }}</p>

        <!-- Post rasmi -->
        @if ($post->image)
        <img src="{{ asset('storage/posts_images/' . $post->image) }}" alt="{{ $post->title }}" style="width: 150px; height: 150px;">
        @endif

        <!-- Post yangilash va o'chirish tugmalari -->
        <div class="actions mt-3">
            <!-- Show button -->
            <a href="{{  route('components.layouts.show', ['id' => $post->id])}}" class="bg-blue-500 text-white px-4 py-2 rounded">Ko'rish</a>

            <!-- Edit button -->
            <a href="{{ route('posts.edit', $post->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Yangilash</a>

            <!-- Delete form -->
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Postni o\'chirishni xohlaysizmi?')">O'chirish</button>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <p>Hozircha hech qanday post yaratilmadi.</p>
    @endif

    <!-- Logout form -->
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Chiqish</button>
    </form>
</div>
@endsection