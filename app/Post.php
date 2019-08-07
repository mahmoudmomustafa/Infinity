<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'category_id', 'excerpt', 'view_count', 'author_id', 'updated_at', 'created_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //image
    public function getImageUrlAttribute($value)
    {
        $imageUrl = '';
        if (!is_null($this->image)) {
            $imagePath = public_path() . '/img/' . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset('img/' . $this->image);
        }
        return $imageUrl;
    }
    // markdown html
    public function getBodyHtmlAttribute()
    {
        return $this->description ? Markdown::convertToHtml($this->description) : Null;
    }
    public function getExcerptHtmlAttribute()
    {
        return $this->excerpt ? Markdown::convertToHtml($this->excerpt) : Null;
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
        return $this->morphMany(Like::class,'post');
    }
    public function checkUser()
    {
        if($this->likes()->where(['user_id' => Auth::user()->id])->exists()){
            return 'liked';
        }
    }
    public function like()
    {
        if (! $this->checkUser()) {
            $this->likes()->create(['user_id' => Auth::user()->id]);
        }else{
            $this->likes()->delete();
        }
    }
}
