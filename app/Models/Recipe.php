<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['text', 'ingredients', 'directions', 'food_id', 'picture_url'];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'recipe_id');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
