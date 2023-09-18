<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
class Material extends Model
{
    //
    // use HasRoles;
    // protected $guard_name = 'web';
     protected $fillable = ['substance', 'com_name'  , 'code' ,'taxcode' , 'status' ,'chemical','cas','un3' ];

     public function mquotas()
    {
        return $this->hasMany('App\Aquota');
    }

    public function Quotarequestdetail()
    {
        return $this->hasOne('App\Quotarequestde_tail');
    }

    public function Materialrequestdetails()
    {
        return $this->hasOne('App\Materialrequestdetail');
    }
    public function Qldetails()
    {
        return $this->hasOne('App\Qldetail');
    }

    public static function rules(){
         $rules= array(
        	'substance' => 'required|unique:materials',        
            'code' => 'required',
            'taxcode' => 'required',       
        ); 
       return $rules;
    }

     public static  $messages=array(
        'substance.required' => 'Substance is required',
        'substance.unique' => 'Substance is already exist',    
        'code.required'  => 'Code is required',
        'taxcode.required'  => 'Tax Code  is required', 
        );
}
