<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comquota extends Model
{
    //
     protected $fillable=[
        'amount','customer_id','astatus'];

    public function aquota()
    {
        return $this->belongsTo('App\Aquota');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}