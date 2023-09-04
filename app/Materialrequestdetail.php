<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialrequestdetail extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    protected $table='materialrequestdetails';

    protected $fillable=['materialrequest_id','material_id','store_type','number','quantity','quality',
    'invoice_value', 'grossweight','uom',

    ];

    public static function create(array $data)
    {
    }

    public function Materialrequest()
    {
         return $this->belongsTo('App\Materialrequest');
    }
    
    public function Material()
    {
        return $this->belongsTo('App\Material');
    }


}


