<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customdeclareation extends Model
{
	
   
    //protected $table = 'uoms';
    protected $fillable=['materialrequest_id','content'];
    //protected $table = 'uoms';
    public function equipmentrequest(){
    	return $this->belongsTo('App\Materialrequest');
    }

  
}
