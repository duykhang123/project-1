<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Support\Str;
use File;
class Tags extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post' , 'tag_post', 'tag_id','post_id');
    }
}
