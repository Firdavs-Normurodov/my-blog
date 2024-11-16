@extends('posts.head')

@section('title', 'Edit Post')

@section('content')

<section class="max-w-4xl p-6 mx-auto bg-my-light my-10 py-10">
    <h1 class="text-lg font-semibold mb-5 pb-5">Edit Post</h1>
    
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') <!-- PATCH metodini ishlatish uchun -->
        
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <!-- Title Input -->
            <div>
                <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}"
                    class="block w-full outline-none border-b-2 border-my-color text-my-color px-1 py-1"
                    placeholder="title">
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Select -->
            <div>
                <select id="category" name="category"
                class="block w-full bg-my-light outline-none border-b-2 border-my-color text-my-color px-1 py-1.5">
                <option value="">Category</option>
                <option value="programming" {{ old('category', $post->category) == 'programming' ? 'selected' : '' }}>Programming</option>
                <option value="design" {{ old('category', $post->category) == 'design' ? 'selected' : '' }}>Design</option>
                <option value="sports" {{ old('category', $post->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                <option value="travel" {{ old('category', $post->category) == 'travel' ? 'selected' : '' }}>Travel</option>
                <option value="other" {{ old('category', $post->category) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Short Content -->
            <div>
                <textarea id="short_content" rows="4" name="short_content"
                    class="block w-full bg-my-light outline-none border-b-2 border-my-color text-my-color px-1 py-1"
                    placeholder="Short content">{{ old('short_content', $post->short_content) }}</textarea>
                @error('short_content')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <textarea id="content" name="content" rows="4"
                    class="block w-full bg-my-light outline-none border-b-2 border-my-color text-my-color px-1 py-1"
                    placeholder="Content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-white">Upload Image</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-my-color border-dashed">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <!-- SVG path here -->
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload"
                                class="relative cursor-pointer font-medium text-my_blue hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" name="image" type="file" class="sr-only">
                            </label>
                            <p class="pl-1 text-my_blue">or drag and drop</p>
                        </div>
                        <p class="text-xs text-my_blue">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                @error('image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-start mt-6">
            <button type="submit"
                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-my_blue">save changes</button>
            <form action="/profile" class="">
                <button type="submit"
                    class="px-6 ml-5 py-2 leading-5 text-white transition-colors duration-200 transform bg-red-500">cancel</button>
            </form>
        </div>
    </form>
</section>

@endsection
