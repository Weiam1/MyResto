<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  

    /*
     * to connect the relationship between news and user
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['title', 'description', 'slug', 'user_id', 'image', 'published_at'];

    public $timestamps = true; // يتم تمكين timestamps تلقائيًا
}
