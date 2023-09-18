<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Materialrequest extends Model
{
    protected $table='materialrequests';
    protected $fillable=[
    	'manufacture_name','manufacture_country_id','import_port','import_date','manufacture_option',
        'transport', 'incoterm','billdate','billnumber', 'exchange_rate',
        'manufacture_option_description','aircon_service_option','aircon_service_option_description',
        'other_option','invoice_value_other_currency','currency', 'transit','tcountry','des_port',
        'other_option_description','self_usage_percent','other_usage_percent','other_info','quality',
        'request_id','licence_id','astatus', 'checker' , 'verifier' , 'rejecter' ,'approver' , 'finalizer'
    ];
    public function Materialrequestdetails()
    {
        return $this->hasMany('App\Materialrequestdetail');
    }
    public function Iladings()    {
        return $this->hasMany('App\Ilading');
    }
    public function Ipackinglists()    {
        return $this->hasMany('App\Ipackinglist');
    }
    public function Iinvoices()    {
        return $this->hasMany('App\Iinvoice');
    }

    public function Tcountry()
    {
        return $this->belongsTo('App\Country','tcountry');
    }

    public function Country()
    {
        return $this->belongsTo('App\Country','manufacture_country_id');
    }

    public function mCountry()
    {
        return $this->belongsTo('App\Country','from_country_id');
    }

    public function Customer()
    {

        return $this->belongsTo('App\Customer');
    }

     public function Paidm()
    {
        return $this->hasOne('App\Paidm');
    }

    public function Custom()
    {
        return $this->hasOne('App\Customdeclareation');
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