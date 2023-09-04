<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aquota extends Model
{
    //

    public function material()
    {
        return $this->belongsTo('App\Material');
    }


     public function comquotas()
    {
        return $this->hasMany('App\Comquota'); // quota by company
    }


    public static function rules(){
         $rules= array(
        	'material_id' => 'required|unique:aquotas,year',
   			'year' => 'required|unique:aquotas,material_id', 
            'avaliable'=>'required',
        ); 
       return $rules;
    }

     public static  $messages=array(
        'material_id.unique' => 'Substance is already exist',
        'year.required'  => 'Year is already exist',
        'avaliable.required'  => 'avaliable is required',
        );

    

    
}