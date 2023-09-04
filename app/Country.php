<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table='countries';
    protected $fillable=['countries_name','status','country_kh','country_en'];

    public function Materialrequest()
    {
        return $this->hasOne('App\Materialrequest');
    }

    public function Materialrequestt()
    {
        return $this->hasOne('App\Materialrequest','tcountry');
    }

    public function Materialrequestm()
    {
        return $this->hasOne('App\Materialrequest');
    }

    public function Equipmentrequest()
    {
        return $this->hasOne('App\Equipmentrequest');
    }

    public function Equipmentrequestm()
    {
        return $this->hasOne('App\Equipmentrequest');
    }
}
