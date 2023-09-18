<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ifees extends Model
{
    protected $fillable=['feetype','fee','from','to','status'];

    public static function rules(){
         $rules= array(
        	'feetype' => 'required',
            'fee' => 'required',
            'from' => 'required',
            'to' => 'required',
        ); 
       return $rules;
    }

     public static  $messages=array(
        'feetype.required' => 'feetype is required',
        'fee.required' => 'fee is required',
        'from.required'  => 'From is required',
        'to.required'  => 'to is required',
        );

      public function scopeget_fee_material($query , $amount){

      return   $query->where('feetype' , '=','Material' )
        ->where('to','>', $amount)
        ->where('from' ,'<=', $amount)
        ->get()->pluck('fee');
      
    }

    public function scopeget_fee_equipment($query , $amount){

      return   $query->where('feetype' , '=','Equipment' )
        ->where('to','>', $amount)
        ->where('from' ,'<=', $amount)
        ->get()->pluck('fee');
      
    }
}
