<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function videos(){
        return $this->hasMany(Video::class, 'categoryId');
    }
}
