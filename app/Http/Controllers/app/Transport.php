<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    //protected $fillable=['vill_name'];
    public function Materialrequest()
    {
        return $this->hasOne('App\Materialrequest','transport');

    }
    public function Equipmentrequest()
    {
        return $this->hasOne('App\Equipmentrequest','transport');
    }
}
