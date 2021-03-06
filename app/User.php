<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Like;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Overtrue\LaravelFollow\Follow;

// class User extends Authenticatable
class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'userName', 'img', 'role_id', 'number', 'birth', 'education'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
    public function getRouteKeyName()
    {
        return 'userName';
    }
    // role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function isAdmin()
    {
        if ($this->role_id == 1)
            return true;
        else
            return false;
    }
    public function isAuthor()
    {
        if ($this->role_id == 3)
            return true;
        else
            return false;
    }
    // get first name
    public function firstName()
    {
        $splitName = explode(' ', $this->name);

        $firstName = $splitName[0];
        return $firstName;
    }
    // comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    // likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function getImageAttribute()
    {
        return $this->img;
    }
    // date/
    public function getDateAttribute($value)
    {
        $date = $this->created_at;
        $current = Carbon::parse($date)->diffForHumans();
        return $current;
    }
    public function followers()
    {
        return $this->morphMany(Follower::class, 'user');
    }
    // check follow
    public function checkFollow($author)
    {
        if (Auth::check() && $this->followers()->where(['follower_id' => $author])->exists()) {
            return true;
        }
    }
    // create delete follow
    public function toggleFollow($author)
    {
        if (!$this->checkFollow($author)) {
            return $this->followers()->create(['follower_id' => $author]);
        } else {
            return $this->followers()->where(['follower_id' => $author])->delete();
        }
    }
    // following
    public function following()
    {
        return $this->followers();
    }
    // get followed posts
    public function followingPosts()
    {
        $this->with('followers');
    }
}
