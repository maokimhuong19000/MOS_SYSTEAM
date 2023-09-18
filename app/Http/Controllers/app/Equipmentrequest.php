<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipmentrequest extends Model
{
    protected $fillable=['manufacture_name','country_id','import_port','import_date','other_info','place_import',
    'place_export','address','customer_id','import_status','file_import_department','file_shipping',
    'file_custom_declareation','file_invoice','manufacture_country_id' ,'astatus','checker' , 'verifier' ,
     'rejecter' ,'approver' , 'finalizer' ,'manufacture_option','aircon_service_option','other_option',
     'other_option_description', 'transport', 'incoterm','billdate','billnumber', 'exchange_rate',
     'invoice_value_other_currency', 'currency', 'transit','tcountry',
    ];

    public function Equipmentrequestdetail()
    {
    	return $this->hasMany('App\Equipmentrequestdetail');
    }

      public function Paideq()
    {
        return $this->hasOne('App\Paideq');
    }

    public function Custom()
    {
        return $this->hasOne('App\Customdeclareationeq');
    }

     public function Customer()
    {

        return $this->belongsTo('App\Customer');
    }

        public function Country()
    {
        return $this->belongsTo('App\Country','manufacture_country_id');
    }

    public function mCountry()
    {
        return $this->belongsTo('App\Country','country_id');
    }

    public function Eladings()    {
        return $this->hasMany('App\Elading');
    }
    public function Epackinglists()    {
        return $this->hasMany('App\Epackinglist');
    }
    public function Einvoices()    {
        return $this->hasMany('App\Einvoice');
    }

    public function Checker(){
        return $this->belongsTo('App\User','checker');
    }

     public function Verifier(){
        return $this->belongsTo('App\User','verifier');
    }
    public function Approver(){
        return $this->belongsTo('App\User','approver');
    }

     public function Finalizer(){
        return $this->belongsTo('App\User','finalizer');
    }

    public function Rejecter(){
        return $this->belongsTo('App\User','rejecter');
    }
    public function Port_Entries()
    {
        return $this->belongsTo('App\Port_Entry','place_import');
    }

    public function Transport()
    {
        return $this->belongsTo('App\Transport','transport');
    }
}
