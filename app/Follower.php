<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    //
    protected $fillable = ['follower_id','user_id'];
    // users
    public function user(){
        return $this->belongsTo(User::class,'follower_id');
    }
    //posts
    public function posts(){
        return $this->hasMany(Post::class,'follower_id');
    }
    // tags
    public function tag(){
        return $this->belongsTo(Category::class);
    }

}
