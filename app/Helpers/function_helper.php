<?php
namespace App\Helpers;

class AppHelper
{ 


 public static function instance()
     {
         return new AppHelper();
     }

public function admin_status($status){
   $answer = "";
                    switch( $status ) {
                      case 0: 
                        $answer = "Pending";
                        break;
                      case 1: 
                        $answer = "Checked";
                        break;
                      case 2: 
                        $answer = "Verified";
                        break;
                      
                    }
                        return  $answer ; 

  }
public function import_status($status){
	 $answer = "";
                    switch( $status ) {
                      case 0: 
                        $answer = "PENDING";
                        break;
                      case 1: 
                        $answer = "CANCELED";
                        break;
                      case 2: 
                        $answer = "IMPORTING";
                        break;
                      default:
                        $answer = "SUCCEED";
                    }
                        return  $answer ; 

  }

    public function import_status_classf($status){
   $answer = "";
                    switch( $status ) {
                      case 0: 
                        $answer = "label label-warning";
                        break;
                      case 1: 
                        $answer = "label label-danger";
                        break;
                      case 2: 
                        $answer = "label label-info";
                        break;
                      default:
                        $answer = "label label-success";
                    }
                        return  $answer ; 

  }

  public function import_status_class($status){
   $answer = "";
                    switch( $status ) {
                      case 0: 
                        $answer = "alert-warning";
                        break;
                      case 1: 
                        $answer = "alert-danger";
                        break;
                      case 2: 
                        $answer = "alert-info";
                        break;
                      default:
                        $answer = "alert-success";
                    }
                        return  $answer ; 

  }

  public function format_date($date_given){

  	$originalDate = $date_given;
    $year= (int)date("Y", strtotime($originalDate));
    if ($year >  2010 ){
  	   $newDate = date("d-m-Y ", strtotime($originalDate));
    }else {
       $newDate = "-";
    }

  	return $newDate;
  }

  public function format_dateh($date_given){

    $originalDate = $date_given;
    $year=(int)date("Y",strtotime($originalDate));
    if ($year >  2010 ){
       $newDate = date("d-m-Y H:i:s", strtotime($originalDate));
    }else {
       $newDate = "-";
    }

    return $newDate;
  }


  public function format_kg($kg){

    $kg = number_format($kg, 2, "." , ",");


    $new_kg = $kg . " Kg";

    return $new_kg;
  }


  public function format_r($kg){

    $kg = number_format($kg, 2, "." , ",");


    $new_kg = $kg . " Riel";

    return $new_kg;
  }

   public function company_type($type){

     $answer = "";
                    switch( $type ) {
                      case 0: 
                        $answer = "នាំចូលបរិក្ខារនិង សារធាតុ/ Import Both Equipment/Substance";
                        break;
                      case 1: 
                        $answer = "នាំចូលសារធាតុ/ Import Substance";
                        break;
                      case 2: 
                        $answer = "នាំចូលបរិក្ខារ/ Import Equipment";
                        break;
                      
                    }
                        return  $answer ; 
  }

  public function format_date_ind($date_given){

    $originalDate = $date_given;
    $year= (int)date("Y", strtotime($originalDate));
    $month= date("m", strtotime($originalDate));
    $day= date("d", strtotime($originalDate));

    if ($year >  2010 ){
       $newDate["y"] =$year;
       $newDate["m"] =" ".$month." ";
       $newDate["d"] =" ".$day."  ";

    }else {
        $newDate["y"] ="..........";
       $newDate["m"] ="..........";
       $newDate["d"] ="..........";
    }

    return $newDate;
  }


  public function format_insert_date($date_given){

    $originalDate = $date_given;
    $year= (int)date("Y", strtotime($originalDate));
    if ($year >  2019 ){
       $newDate = date("Y-m-d", strtotime($originalDate));
    }else {
      $newDate = date("Y-m-d");
    }

    return $newDate;
  }

  public function get_khmer_only($two_lan){

    $arr = explode('/', $two_lan);
    return trim($arr[0]);
  }

}



