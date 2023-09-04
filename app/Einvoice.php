<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Einvoice extends Model
{
	
    protected $fillable=['equipmentrequest_id','file_path'];

    public function Equipmentrequest()
    {
    	return $this->belongsTo('App\Equipmentrequest');
    }
}
