<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'userId', 'videoId', 'lastViewedAt', 'isLiked', 'likedAt'
    ];

    public $hidden = [
        'id', 'userId', 'videoId'
    ];

    public $timestamps = FALSE;
}
