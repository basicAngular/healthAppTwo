<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'posts';
    protected $fillable = array('url', 'title', 'content', 'category_id', 'image');
}