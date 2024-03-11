<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function createdBy(){
        return $this->belongsTo('App\User', 'userId');
    }
}
