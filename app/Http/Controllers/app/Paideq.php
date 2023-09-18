<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paideq extends Model
{
	
    protected $fillable=['customer_id','fee','equipmentrequest_id'];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function equipmentrequest(){
    	return $this->belongsTo('App\Equipmentrequest');
    }
}