<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 1. Postlarni ko'rsatish
 
    public function __construct()
    {
        // Faqat ro'yxatdan o'tgan foydalanuvchilar uchun create va edit metodlarini himoya qilish
        $this->middleware('auth')->only(['create', 'edit']);
    }
    public function welcome()
{
    $posts = Post::with('user')->latest()->paginate(6); // Postlarni kamayish tartibida oling
    return view('welcome', compact('posts'));
}


    // 2. Post yaratish formasi
    public function create()
    {
        return view('posts.create'); // Post yaratish formasi
    }

    // 3. Post yaratish
    public function store(Request $request)
    {
        // Validatsiya
        $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10420',
            'category' => 'required|string',
        ]);

        // Rasmni yuklash
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/posts_images', $imageName);
        }

        // Postni yaratish
        $post = new Post([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'image' => $imageName,
            'category' => $request->category,
        ]);

        $post->user()->associate(auth()->user());
        $post->save();

        // Foydalanuvchi ma'lumotlarini olish
        $user = $post->user; // Post modelida user() metodi bo'lishi kerak

        // Foydalanuvchi ma'lumotlari bilan birga postga qaytish
        return redirect()->route('profile')->with('success', 'Post muvaffaqiyatli yaratildi!')
            ->with('post', [
                'title' => $post->title,
                'short_content' => $post->short_content,
                'content' => $post->content,
                'image' => $post->image,
                'category' => $post->category,
                'user' => [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'profile_image' => $user->profile_image,
                ]
            ]);
    }




    // 4. Postni ko'rsatish
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = $post->user; // Post bilan bog'langan foydalanuvchini olish

        return view('posts.show', compact('post', 'user')); // Blade view-ga `$post` va `$user` ni uzatish
    }


    // 5. Postni yangilash formasi
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // Postni yangilash formasi
    }

    // 6. Postni yangilash
    public function update(Request $request, Post $post)
    {
        // Validatsiya
        $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10420',
            'category' => 'required|string',
        ]);

        // Rasmni yuklash (agar yangi rasm yuklangan bo'lsa)
        if ($request->hasFile('image')) {
            // Eski rasmni o'chirish
            if ($post->image) {
                \Storage::disk('public')->delete('posts_images/' . $post->image);
            }

            // Yangi rasmni 'posts_images' ichiga yuklash
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/posts_images', $imageName);
            $post->image = $imageName; // Yangilangan rasmni saqlash
        }

        // Postni yangilash
        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'category' => $request->category,
        ]);

        // Foydalanuvchi ma'lumotlarini olish
        $user = $post->user; // Post modelida user() metodi bo'lishi kerak

        // Foydalanuvchi ma'lumotlari bilan birga postga qaytish
        return redirect()->route('profile')->with('success', 'Post muvaffaqiyatli yangilandi.')
            ->with('post', [
                'title' => $post->title,
                'short_content' => $post->short_content,
                'content' => $post->content,
                'image' => $post->image,
                'category' => $post->category,
                'user' => [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'profile_image' => $user->profile_image,
                ]
            ]);
    }


    // 7. Postni o'chirish
    public function destroy(Post $post)
    {
        // Eski rasmni o'chirish
        if ($post->image) {
            \Storage::disk('public')->delete('posts_images/' . $post->image);
        }

        // Postni o'chirish
        $post->delete();

        return redirect()->route('profile')->with('success', 'Post muvaffaqiyatli o\'chirildi!');
    }
}
