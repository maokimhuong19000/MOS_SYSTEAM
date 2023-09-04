<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotarequestfile extends Model
{
	protected $table='quotarequestfiles';
    protected $fillable=['quotarequest_id','file_path','file_name'];

    public function Quotarequest()
    {
    	return $this->belongsTo('App\Quotarequest');
    }
}
