<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $dates = ['createdAt'];

    public function category(){
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'videoId');
    }

    public function histories(){
        return $this->hasMany(History::class, 'videoId')->where('isLiked', true);
    }
}
