<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qlicense extends Model
{
    //
 protected $fillable=[
        'year','customer_id','status','no'];

     public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

     public function qldetail()
    {
        return $this->hasMany('App\Qldetail');
    }

      public function Paidq()
    {
        return $this->hasOne('App\Paidq');
    }

}
