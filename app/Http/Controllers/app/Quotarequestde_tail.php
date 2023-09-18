<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotarequestde_tail extends Model
{
	protected $table='quotarequestdetails';
    protected $fillable=['quotarequest_id','material_id','import_date','amount','old_amount'];

    public function Quotarequest()
    {
    	 return $this->belongsTo('App\Quotarequest');
    }

    public function Material()
    {
    	return $this->belongsTo('App\Material');
    }
}
