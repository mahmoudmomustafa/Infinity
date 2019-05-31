<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
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
    // date
    public function getDateAttribute($value){
        // return $this->created_at;
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }
    // publish scope
    public function scopePublished($query){
        return $query->where('published_at','<=',Carbon::now());
    }
    // markdown html
    public function getBodyHtmlAttribute(){
        return $this->description ? Markdown::convertToHtml($this->description) : Null ;
    }
    public function getExcerptHtmlAttribute(){
        return $this->excerpt ? Markdown::convertToHtml($this->excerpt) : Null ;
    }
}
