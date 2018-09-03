<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "sliders";

    protected $fillable = ['image','image_responsive','title_image','alt_image','title_image2','alt_image2','title','text','url'];
}
