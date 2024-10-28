@extends('posts.head')

@section('title', 'Edit Post')

@section('content')
<h1>Postni Yangilash</h1>
<form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ $post->title }}" required>
    </div>

    <div>
        <label for="short_content">Short Content</label>
        <textarea id="short_content" name="short_content" required>{{ $post->short_content }}</textarea>
    </div>

    <div>
        <label for="content">Content</label>
        <textarea id="content" name="content" required>{{ $post->content }}</textarea>
    </div>

    <div>
        <label for="category">Category</label>
        <input id="category" type="text" name="category" value="{{ $post->category }}" required>
    </div>

    <div>
        <label for="image">Image</label>
        <input id="image" type="file" name="image">
        @if ($post->image)
        <img src="{{ asset('storage/posts_images/' . $post->image) }}" alt="{{ $post->title }}" style="width: 150px; height: 150px;">
        @endif
    </div>

    <div>
        <button type="submit">Yangilash</button>
    </div>
</form>
@endsection