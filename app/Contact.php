<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";

	protected $fillable = ['name','email','phone','city','message','section','url','url2','plan_id'];



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

	public function scopeSearchSection($query, $section)
	{
		if(!empty($section))
		{
			return $query->where('section',$section);
		}
	}
}
