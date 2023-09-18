<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port_Entry extends Model
{
    protected $table = 'port__entries';
    protected $fillable = ['port_name','status'];
    public function Materialrequest()
    {
        return $this->hasOne('App\Materialrequest','place_import');

    }
    public function Equipmentrequest()
    {
        return $this->hasOne('App\Equipmentrequest','place_import');
    }
}
