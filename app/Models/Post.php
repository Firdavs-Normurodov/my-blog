<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_content',
        'content',
        'image',
        'category',
        'user_id',
    ];

    // Foydalanuvchi bilan aloqani ko'rsatish
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
