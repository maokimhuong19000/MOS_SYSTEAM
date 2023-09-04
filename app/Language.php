<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table='translator_languages';
    protected $fillable=['locale','group','text','label','item','namespace'];
}
