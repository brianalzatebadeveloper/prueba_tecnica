<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['id','name','title','text_intro','text','image','title_image','alt_image','featured'];


    public function scopeServiceName($query, $name)
    {
    	if(!empty($name))
    	{
    		return $query->where('name', 'LIKE', "%$name%")->orWhere('text_intro','LIKE',"%$name%");
    	}
    }
}
