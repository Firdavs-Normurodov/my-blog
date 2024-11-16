@extends('auth.app')
@section('title', 'Register')
@section('content')

<div class="flex h-screen w-screen justify-center items-center">

    <div class="register_page mx-5 py-6 px-5 container lg:w-2/5 sm:w-3/5">
        <h1 class="text-lg font-bold text-my-light">Welcome ! Create your account</h1>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <div class="mt-2">
                                <input type="text" name="name" id="first-name" autocomplete="given-name" class="block w-full border-b-2 border-my-light outline-none py-1.5" placeholder="First Name" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class="mt-2">
                                <input type="text" name="surname" id="last-name" autocomplete="family-name" class="block w-full border-b-2 border-my-light outline-none py-1.5" placeholder="Last Name" required value="{{ old('surname') }}">
                                @error('surname')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full border-b-2 border-my-light outline-none py-1.5" placeholder="Email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class="mt-2">
                                <input type="password" name="password" id="password" autocomplete="new-password" class="block w-full border-b-2 border-my-light outline-none py-1.5" placeholder="Password" required>
                                @error('password')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class="mt-2">
                                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" class="block w-full border-b-2 border-my-light outline-none py-1.5" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <div class="mt-2 flex justify-center border border-dashed border-my-light px-6 py-2">
                                <div class="text-center">
                                    <div class="flex text-sm leading-6 text-gray-600">
                                        <label for="profile_image" class="relative cursor-pointer rounded-md font-semibold text-my_blue focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file (PNG, JPG, GIF)</span>
                                            <input id="profile_image" name="profile_image" type="file" class="sr-only">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <div class="mt-2">
                                <textarea id="bio" name="bio" rows="3" class="block w-full border-b-2 border-my-light outline-none py-1.5" placeholder="Tell us about yourself">{{ old('bio') }}</textarea>
                                @error('bio')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit" class="bg-my_blue px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
            <p class="text-sm mt-6 text-my-light">Don't you have an account? <a href="{{ route('login') }}" class="text-my-light font-bold hover:underline ml-1">Sign In</a></p>

        </form>
    </div>
</div>
@endsection
