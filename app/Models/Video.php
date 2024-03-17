<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'actor', 'description', 'director', 'href', 'is_active', 'poster', 'price', 'share', 'title', 'view', 'category_id', 'created_at', 'updated_at'
    ];

    protected $table = 'videos';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
