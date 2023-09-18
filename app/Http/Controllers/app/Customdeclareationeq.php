<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customdeclareationeq extends Model
{
	
    protected $fillable=['equipmentrequest_id','content'];
    //protected $table = 'uoms';
    public function equipmentrequest(){
    	return $this->belongsTo('App\Equipmentrequest');
    }

  
}
