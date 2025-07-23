<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'user_id'];

    public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function index()
{
    $posts = Post::latest()->paginate(6); // Adjust as needed
    return view('blog.index', compact('posts'));
}
}
