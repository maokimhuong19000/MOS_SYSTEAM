<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotarequest extends Model
{
	protected $table='quotarequests';
    protected $fillable=['customer_id','status'];

    public function Quotarequestfiles()
    {
    	return $this->hasMany('App\Quotarequestfile');
    }

    public function Quotarequestdetails()
    {
    	return $this->hasMany('App\Quotarequestde_tail');
    }

    public function Customer()
    {

        return $this->belongsTo('App\Customer');
    }


}
