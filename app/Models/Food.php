<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'foodcategory_id'];

    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'foodcategory_id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
