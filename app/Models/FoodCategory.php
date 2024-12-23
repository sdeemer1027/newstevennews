<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;
    protected $table ='foodcategories';
    protected $fillable = ['name'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function recipes()
    {
        return $this->hasMany(Food::class, 'foodcategory_id');
    }
}
