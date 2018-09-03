<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = "seos";

    protected $fillable = ['section','meta_title','meta_description','meta_keywords'];
}
