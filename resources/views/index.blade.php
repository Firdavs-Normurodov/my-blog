<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/css/bg.css')
    @vite('resources/css/auth.css')
</head>

<body>
    <div class="container">
        <h1 class="text-xl font-bold">All Posts</h1>

        @if(session('success'))
        <div class="bg-green-500 text-white p-2 my-2">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2">Create Post</a>

        <div class="mt-5">
            @foreach($posts as $post)
            <div class="border-b mb-4 pb-2">
                <h2 class="text-lg font-bold"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->short_content }}</p>
                <p><small>Category: {{ $post->category }}</small></p>
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
            @endforeach
        </div>


    </div>
</body>

</html>