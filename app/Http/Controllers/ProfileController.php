<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Hozirgi foydalanuvchini olish
        $posts = $user->posts;  // Foydalanuvchi yaratgan postlar
        return view('profile', compact('user', 'posts')); // Ma'lumotlarni view-ga yuborish
    }
}
