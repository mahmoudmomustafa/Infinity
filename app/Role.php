<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
// use SocialiteProviders\Manager\OAuth1\User;

class Role extends Model
{
    //users
    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
