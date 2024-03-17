<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'actor', 'description', 'director', 'href', 'is_active', 'poster', 'price', 'share', 'title', 'view', 'category_id', 'created_at', 'updated_at'
    ];

    protected $table = 'videos';

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
