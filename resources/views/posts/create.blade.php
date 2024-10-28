@extends('posts.head')

@section('title', 'Create Post')

@section('content')
<div class="container">
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="block w-full" required>
        </div>

        <!-- Short Content -->
        <div>
            <label for="short_content">Short Content</label>
            <textarea name="short_content" id="short_content" class="block w-full" required></textarea>
        </div>

        <!-- Content -->
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" class="block w-full" required></textarea>
        </div>

        <!-- Image -->
        <div>
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="block w-full" required>
        </div>

        <!-- Category -->
        <div>
            <label for="category">Category</label>
            <select name="category" id="category" class="block w-full" required>
                <option value="programming">Programming</option>
                <option value="design">Design</option>
                <option value="sports">Sports</option>
                <option value="travel">Travel</option>
                <option value="other">Other</option>
            </select>
        </div>

        <!-- Submit -->
        <button type="submit" class="mt-4 bg-blue-500 text-black px-4 py-2">Create Post</button>
    </form>
</div>
@endsection