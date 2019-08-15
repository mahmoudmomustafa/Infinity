<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Post extends Model
{

    protected $fillable = ['title', 'slug', 'description', 'image', 'category_id', 'excerpt', 'view_count', 'author_id', 'updated_at', 'created_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // popular post
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }
    // comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    // likes
    public function likes()
    {
        return $this->morphMany(Like::class, 'post');
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
    // date
    public function getDateAttribute($value)
    {
        $date = $this->created_at;
        $current = Carbon::parse($date)->diffForHumans();
        return $current;
    }
}
