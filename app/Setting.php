<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";

    protected $fillable = ['facebook','twitter','instagram','in_web','googleplus','youtube','latitude','longitude','key_map','contact_email','url','address','phone','cellphone'];
}
