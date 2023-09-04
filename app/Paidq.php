<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paidq extends Model
{
	
    protected $fillable=
    [
    	'customer_id',
    	'fee',
    	'year',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function qlicense(){
    	return $this->belongsTo('App\Qlicense');
    }
}