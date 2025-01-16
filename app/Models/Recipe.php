<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{ protected $fillable = ['title', 'description', 'ingredients', 'steps', 'image', 'user_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function ratings()
{
    return $this->hasMany(Rating::class);
}

// لحساب متوسط التقييم
public function averageRating()
{
    $average = $this->ratings()->avg('rating');
    return $average ? round($average, 2) : 0;

}
public function savedByUsers()
{
    return $this->belongsToMany(User::class, 'saved_recipes');
}

}
