<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            // Agar foydalanuvchi tizimga kirgan bo'lsa, uni profile sahifasiga yo'naltirish
            return redirect()->route('profile');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validatsiya qilish
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10420',
            'bio' => 'nullable|string|max:500',
        ]);

        // Rasmni saqlash
        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
        }

        // Foydalanuvchini yaratish
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $profileImagePath,
            'bio' => $request->bio,
        ]);

        // Foydalanuvchini avtorizatsiya qilish
        auth()->login($user);

        return redirect()->route('profile', $user->id);
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            // Agar foydalanuvchi tizimga kirgan bo'lsa, uni profile sahifasiga yo'naltirish
            return redirect()->route('profile');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the user's profile
            return redirect()->route('profile', ['id' => Auth::user()->id]);
        }

        // Return back with error messages if authentication fails
        return back()->withErrors([
            'email' => 'Email not found.',
            'password' => 'The password is incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
