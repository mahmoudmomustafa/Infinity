<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

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
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
