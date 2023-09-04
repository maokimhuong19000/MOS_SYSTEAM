<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Equipment extends Model
{
    protected $fillable=['product_name', 'capacity' , 'substance' , 'code' ,'taxcode' , 'type' ,'status' ];


    //function here
    public static function rules(){
         $rules= array(
        	'product_name' => 'required',
          //  'capacity' => 'required',
          //  'substance' => 'required',
            'code' => 'required',
            'taxcode' => 'required',      
        ); 
       return $rules;
    }

    public function Equipmentdetail()
    {
      return $this->hasOne('App\Equipmentdetail');
    }

     public static  $messages=array(
        'product_name.required' => 'Product name is required',
     //   'capacity.required' => 'Capacity is requried',
    //    'substance.required:unid'  => 'chemisty Substance is required',
        'type.required'  => 'type is required',
        'code.required'  => 'Code is required',
        'taxcode.required'  => 'Tax Code  is required', 
        );
}
