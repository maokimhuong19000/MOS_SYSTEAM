<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ilading extends Model
{
	
    protected $fillable=['materialrequest_id','file_path'];

    public function Materailrequest()
    {
    	return $this->belongsTo('App\Materailrequest');
    }
}
