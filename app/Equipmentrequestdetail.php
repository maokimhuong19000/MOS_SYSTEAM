<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipmentrequestdetail extends Model
{
    protected $fillable=['equipmentrequest_id','equipment_id','amount','description','capacity',
    'substance','quality','capvalue', 'capvalue_data' ,  'invoice_value', 'grossweight','netweight','uom',
    ];

    public function Equipmentrequest()
    {
    	return $this->belongsTo('App\Equipmentrequest');
    }

    public function Equipment()
    {
    	return $this->belongsTo('App\Equipment');
    }
}
