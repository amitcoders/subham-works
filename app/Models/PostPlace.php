<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPlace extends Model
{
    use HasFactory;

    public function PostPlace()
    {
        return $this->belongsToMany('App\Models\PostBloger');
    }
}
