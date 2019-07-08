<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','slug'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //link by slug not id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
