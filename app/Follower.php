<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    //
    protected $fillable = ['follower_id','user_id'];
    // users
    public function users(){
        return $this->hasMany(User::class);
    }
    // tags
    public function tag(){
        return $this->belongsTo(Category::class);
    }

}
