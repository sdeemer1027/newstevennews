<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'blog_id'];

    // A comment belongs to a blog post
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // A comment is made by a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
