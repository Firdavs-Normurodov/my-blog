@extends('auth.app')
@section('title', 'Login')
@section('content')

<div class="flex h-screen w-screen justify-center items-center">
    <div class="login_page p-5 container lg:w-2/5 sm:w-3/5 mx-5">

        <h1 class="text-lg font-bold text-my-light">Please login to your account</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-12">
                <div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-full">
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" 
                                       class="block w-full border-b-2 border-my-light outline-none py-1.5" 
                                       placeholder="Email" required value="{{ old('email') }}">
                            </div>
                            @error('email')
                            <div class="mt-1 font-bold text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-full">
                            <div class="mt-2">
                                <input type="password" name="password" id="password" autocomplete="current-password" 
                                       class="block w-full border-b-2 border-my-light outline-none py-1.5" 
                                       placeholder="Password" required>
                            </div>
                            @error('password')
                            <div class="mt-1 font-bold text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit" 
                        class="bg-my_blue px-6 py-2 text-sm font-bold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Login
                </button>
            </div>
            <p class="text-sm mt-6 text-my-light">Don't you have an account? <a href="{{ route('register') }}" class="text-my-light font-bold hover:underline ml-1">Sign Up</a></p>

        </form>
    </div>
</div>
@endsection
