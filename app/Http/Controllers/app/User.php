<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Contracts\Auth\Authenticatable
 use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;



    use HasRoles;
//protected $guard_name = 'web'; // or whatever guard you want to use
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   // public function permissions()
  //  {
     //   return $this->belongsToMany('App\Permission')->withTimestamps();
   // }

     public function Materialrequests_check(){
        return $this->hasMany('App\Materialrequest');
    }

    public function Materialrequests_verify(){
        return $this->hasMany('App\Materialrequest');
    }

     public function Materialrequests_approve(){
        return $this->hasMany('App\Materialrequest');
    }

    public function Materialrequests_finalize(){
        return $this->hasMany('App\Materialrequest');
    }

    public function Materialrequests_reject(){
        return $this->hasMany('App\Materialrequest');
    }



     public function Equipmentrequests_check()

    {
         return $this->hasMany('App\Equipmentrequest');
    }

     public function Equipmentrequests_verify()

    {
         return $this->hasMany('App\Equipmentrequest');
    }

     public function Equipmentrequests_approve(){
        return $this->hasMany('App\Equipmentrequest');
    }

     public function Equipmentrequests_finalize(){
         return $this->hasMany('App\Equipmentrequest');
    }

     public function Equipmentrequests_reject(){
         return $this->hasMany('App\Equipmentrequest');
    }
}
