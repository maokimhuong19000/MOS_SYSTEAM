<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qldetail extends Model
{
    //

     protected $fillable=[
       'material_id','amount','qlicense_id'];


    public function qlicense()
    {
        return $this->belongsTo('App\Qlicense');
    }

     public function Material()
    {
        return $this->belongsTo('App\Material');
    }
}
