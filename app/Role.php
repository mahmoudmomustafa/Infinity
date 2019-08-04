<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    //users
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
