<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_group_id', 'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class);
    }

    public function scopeOfAdmin($q)
    {
        return $q->where('user_group_id', '=', '1');
    }

    public function scopeOfUser($q)
    {
        return $q->where('user_group_id', '=', '2');
    }

    public function generateApiToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        return $this->api_token;
    }
}
