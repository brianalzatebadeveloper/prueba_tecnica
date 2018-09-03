<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{

	use Notifiable;

	protected $guard = 'member';

    protected $table = "members";

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearchEmail($query, $email)
    {
    	if(!empty($email))
    	{
    		return $query->where('email',$email);
    	}
    }

    public function scopeSearchCity($query, $city)
    {
    	if(!empty($city))
    	{
    		return $query->where('city',$city);
    	}
    }
}
