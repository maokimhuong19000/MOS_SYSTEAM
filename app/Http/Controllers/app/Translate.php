<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $table ='translator_translations';
    protected $fillable=['locale','namespace','group','item','text'];

    //function here
    public static function rules(){
         $rules= array(
        	'locale' => 'required',
            'group' => 'required',
            'item' => 'required',
            'text' => 'required',
        ); 
       return $rules;
    }

     public static  $messages=array(
        'locale.required' => 'Locale name is required',
        'group.required' => 'Group is requried',
        'item.required'  => 'Ttem is required',
        'text.required'  => 'Text is required',
        );
}
