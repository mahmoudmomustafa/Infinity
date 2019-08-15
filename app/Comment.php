<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body','updated_at', 'created_at'];
    //post' comments
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
    //user' comment
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // comments date
    public function getDateAttribute($value)
    {
        $date = $this->created_at;
        $current = Carbon::parse($date)->diffForHumans();
        return $current;
    }
    // comment like
    public function likes()
    {
        return $this->morphMany(Like::class, 'comment');
    }
    public function checkUser()
    {
        if (Auth::check() && $this->likes()->where(['user_id' => Auth::user()->id])->exists()) {
            return 'liked';
        }
    }
    public function like()
    {
        if (!$this->checkUser()) {
            $this->likes()->create(['user_id' => Auth::user()->id]);
        } else {
            $this->likes()->delete();
        }
    }
}
