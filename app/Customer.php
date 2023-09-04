<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CusResetPassword;
class Customer extends  Authenticatable
{
    //mass assignment
    use Notifiable;
    use CanResetPassword;

public function sendPasswordResetNotification($token)
    {
      
         $this->notify(new CusResetPassword($token));
    }



    protected $fillable=[
        'user_name',
        'password',
        'remember_token',
        'idcard',
        'tin',
        'tin_date',
        'company_id',
        'company_id_date',
        'company_activity',
        'company_name',
        'status',
        'astatus',
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
         'tin_path',
         'id_path','id_card','ctype', 'patent' , 'patent_number' ,'patent_date', 'verifyToken'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function cominfo()
    {
        return $this->hasOne('App\Cominfo');
    }

    public function comquota()
    {
        return $this->hasMany('App\Comquota');
    }
    
    public function Quotarequests()

    {
        return $this->hasMany('App\Quotarequest');
    }

    public function Materialrequests()

    {
        return $this->hasMany('App\Materialrequest');
    }

     public function Equipmentrequests()

    {
        return $this->hasMany('App\Equipmentrequest');
    }


     public function Paidqs()

    {
        return $this->hasMany('App\Paidq');
    }

     public function Paidms()

    {
        return $this->hasMany('App\Paidm');
    }

    public function Paideqs()

    {
        return $this->hasMany('App\Paideq');
    }

    public static function rules(){
         $rules= array(
        	'company_name' => 'required',
            'idcard' => 'required',
            'user_name' => 'required',
            'password' => 'required',
            'ctype' => 'required',    
        ); 
       return $rules;
    }

     public static  $messages=array(
        'company_name.required' => 'Companyname is required',
        'idcard.required' => 'Code is required',
        'user_name.required'  => 'Username is required',
        'password.required'  => 'Password is required',
        );

      public function scopeget_new_idcode($query ){

         $old = $query->max('id')+1;

         $pad_length = 5;
         $pad_char = 0;

         $str = str_pad($old, $pad_length, $pad_char, STR_PAD_LEFT);
         return "com".$str ;      
    }
    public function Materialrequest()

    {
        return $this->belongsTo('App\Materialrequest');
    }

     public static function rules_1(){
         $rules= array(
            'company_name' => 'required',
            'email' => 'required|unique:customers',
            'user_name' => 'required|unique:customers',
            'password' => 'required|confirmed|min:6',
            'ctype' => 'required', 
            'tel' => 'required',   
            'ctype' => 'required',
            'id_card' => 'required',
            'tin_path' => 'required',
            'patent' => 'required',
            'id_path' => 'required',
        ); 
       return $rules;
    }
    public static function rules_2(){
        $rules= array(
           'password' => 'required|confirmed|min:6',
           
       ); 
      return $rules;
   }


     public static  $messages_1=array(
        'company_name.required' => 'បញ្ចូលឈ្មោះក្រុមហ៊ុន/Company Name is required',
        'email.required' => 'សូមបញ្ចូលអ៊ីមែល/ Input your Email',
        'email.unique' =>'អ៊ីមែលត្រូវបានគេប្រើប្រាស់រួច/​​ Existing Email',
        'user_name.required'  => 'សូមបញ្ចូលឈ្មោះអ្នកប្រើប្រាស់/ Input User Name',
        'user_name.unique' => 'ឈ្មោះអ្នកប្រើប្រាស់ត្រូវបានគេប្រើប្រាស់រួច/ Existing User Name' ,
        'password.required'  => 'សូមបញ្ចូលលេខកូដសំងាត់ / Input Password',
        'password.confirmed'  => 'សូមបញ្ចូលលេខកូដសំងាត់ឲ្យដូចគ្នា / Confirm Password',
        'password.min:6'  => 'សូមបញ្ចូលលេខកូដសំងាត់ត្រូវមាន៦តួរ / Password is more than 6 digit',
        'ctype.required'  => 'company type is required',
        'tel.required'  => 'សូមបញ្ចូលលេខទូរសព្ទទំនាក់ទំនង / Input Phone Number',
        'id_path.required'  => 'សូមភ្ជាប់វិញ្ញាបនប័ត្រក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្ម/ Attach Company Registered Document',
        'id_card.required'  => 'សូមភ្ជាប់អត្តសញ្ញាណប័ណ្ណម្ចាស់ក្រុមហ៊ុន/ Attach Owner ID Card',
        'tin_path.required'  => 'សូមភ្ជាប់ឯកសារវិញ្ញាបនប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម/ Attach TIN File',
        'patent.required'  => 'សូមភ្ជាប់ប័ណ្ណប៉ាតង់/ Attach sPatent File',
        );
        public static  $messages_2=array(
            'password.required'  => 'សូមបញ្ចូលលេខកូដសំងាត់ / Input Password',
            'password.confirmed'  => 'សូមបញ្ចូលលេខកូដសំងាត់ឲ្យដូចគ្នា / Confirm Password',
            'password.min:6'  => 'សូមបញ្ចូលលេខកូដសំងាត់ត្រូវមាន៦តួរ / Password is more than 6 digit',
            );

      public static function rules_front_profile(){
         $rules= array(
            'company_name' => 'required',
            'tin' => 'required',
            'tin_date'=> 'required',
            'company_id' => 'required' ,
            'company_id_date'=> 'required',
            'tel'=> 'required',
            //'fax' => 'required' ,
            'city'=> 'required',
            'district'=> 'required',
            //'village'=> 'required',
            'street'=> 'required',
            'house'=> 'required',
            'commune'=> 'required',
            'patent_number'=> 'required',
            'patent_date'=> 'required',
            'email'=> 'required|unique:customers',
         );
         return $rules;

    }

     public static  $messages_front_profile=array(
             'company_name.required' => 'បញ្ចូលឈ្មោះក្រុមហ៊ុន/Company Name is required',
            'email.required' => 'សូមបញ្ចូលអ៊ីមែល/ Input your Email',
            'email.unique' =>'អ៊ីមែលត្រូវបានគេប្រើប្រាស់រួច/​​ Existing Email',
            'tin.required' => 'សូមបញ្ចូលលេខវិញ្ញាបនប័ត្រចុះបញ្ចីអាករលើតំលៃបន្ថែម/  Input TIN' ,
            'tin_date' => 'សូមបញ្ចូលកាលបរិច្ឆេទចេញវិញ្ញាបនប័ត្រចុះបញ្ចីអាករលើតំលៃបន្ថែម/  Input​ Issued date of TIN certificate' ,
            'company_id.required' => 'សូមបញ្ចូលលេខវិញ្ញាបនប័ត្រក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្/  Input Company Registered Number' ,
            'company_id_date.required' => 'សូមបញ្ចូលកាលបរិច្ឆេទចេញវិញ្ញាបនប័ត្រក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្/  Input Issued date of Company Registered Number',
            'tel.required'  => 'សូមបញ្ចូលលេខទូរសព្ទទំនាក់ទំនង / Input Phone Number',
           // 'fax.required' => 'សូមបញ្ចូលលេខទូរសាទំនាក់ទំនង / Input Fax Number',
            'city.required'=> 'សូមបញ្ចូលខេត្ត-រាជធានី / Input City',
            'district.required'=> 'សូមបញ្ចូលស្រុក-ខណ្ / Input District',
            'village.required'=> 'សូមបញ្ចូលភូមិ / Input Village',
            'street.required'=> 'សូមបញ្ចូលផ្ទះលេខ / Input Street',
            'house.required'=> 'សូមបញ្ចូលផ្ទះលេខ / Input House',
            'commune.required'=> 'សូមបញ្ចូលឃុំ-សង្កាត់ / Input Commune',
            'patent_number.required'=> 'សូមបញ្ចូលលេខប័ណ្ណប៉ាតង់ / Input Patent Number',
            'patent_date.required'=> 'សូមបញ្ចូលកាលបរិច្ឆេទចេញប័ណ្ណប៉ាតង់ / Input Issued date of Patent',


        );
    

}