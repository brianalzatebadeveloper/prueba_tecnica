<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "sections";

    protected $fillable = ['name'];


    public function Contents()
    {
    	return $this->hasMany('App\Content');
    }

    public function scopeSearchSection($query, $id)
    {
    	return $query->where('id','=',$id);
    }

}
