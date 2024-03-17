<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Order extends Model
{
    protected $table = 'orders';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'videoId');
    }
}
