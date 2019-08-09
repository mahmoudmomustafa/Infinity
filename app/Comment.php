<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body','updated_at', 'created_at'];
    //
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getDateAttribute($value)
    {
        $date = $this->created_at;
        $current = Carbon::parse($date)->diffForHumans();
        return $current;
    }
}
