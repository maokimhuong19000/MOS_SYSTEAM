<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cominfo extends Model
{
    //
 protected $fillable=[
        'contact_person',
        'position',
        'gender',
        'personid',
        'nationality',    
        'id_card',
        'tel',
        'fax',
        'house',
        'street',
        'village',
        'city' ,
        'district' ,
        'email',
        'tin_date',
         'commune' ,
         'authorize',
         
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

     public static function rules_front_contact(){
         $rules= array(
            'contact_person' => 'required',
            'tel' => 'required',
            'position'=> 'required',
            'nationality' => 'required' ,
            
         );
         return $rules;

    }

     public static  $messages_front_contact=array(

            'tel.required'  => 'សូមបញ្ចូលលេខទូរសព្ទទំនាក់ទំនង / Input Phone Number',           
            'contact_person.required'=> 'សូមបញ្ចូលឈ្មោះអ្នកតំណាង / Input Contact Person',
            'position.required'=> 'សូមបញ្ចូលទួនាទី / Input Position',
            'nationality.required'=> 'សូមបញ្ចូលសញ្ជាតិ / Input nationality',


        );
    
}