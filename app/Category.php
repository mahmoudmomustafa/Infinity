<?php

namespace App;
use Rennokki\Befriended\Traits\CanBeFollowed;
use Rennokki\Befriended\Contracts\Followable;
use Illuminate\Database\Eloquent\Model;

// class Category extends Model
class Category extends Model implements Followable {
    use CanBeFollowed;
    
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
