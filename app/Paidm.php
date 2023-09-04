<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paidm extends Model
{
	
    protected $fillable=['customer_id','fee','materialrequest_id'];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function materialrequest(){
    	return $this->belongsTo('App\Materialrequest');
    }
}