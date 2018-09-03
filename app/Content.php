<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "contents";

    protected $fillable = ['name','text','text_2','text_3','text_4','image','image_2','image_3','image_4','title_image','alt_image','title_image2','alt_image2','title_image3','alt_image3','title_image4','alt_image4','url','url_2','section_id'];


    public function Section()
    {
    	return $this->belongsTo('App\Section');
    }

}
