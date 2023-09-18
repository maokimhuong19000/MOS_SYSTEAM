<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipmentrequest;
use App\Equipmentrequestdetail;
use App\Equipment;
use App\Customer;
use App\Law;
use App\Materialrequest;
use App\Materialrequestdetail;
use App\Material;
use App\Qlicense;

class LicenseController extends Controller
{
    //


    public function licensee($id){

          $isubdetail=Equipmentrequest::with(['Equipmentrequestdetail.Equipment','Port_Entries','Country','mCountry','Customer'])->find($id);
	      $law = Law::find(1);
	      $year_show =  $this->convert_to_kh_number(date("Y"));
	      $isub_date = strtotime($isubdetail->created_at);
	      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
	      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
	      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));

	      return view('front.license_equipment',compact('isubdetail','law','year_show','request_date'));

    }

    public function licensem($id){
          $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Port_Entries','Country','mCountry','Customer'])->find($id);
	      $isub_date = strtotime($isubdetail->created_at);
	      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
	      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
	      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));

	      $law = Law::find(1);
	      
	      $year_show =  $this->convert_to_kh_number(date("Y"));
	      return view('front.license_material',compact('isubdetail','law','year_show' ,'request_date' ));
    }

    public function licenseq($id){
          $isubdetail=Qlicense::with(['qldetail.Material','Customer'])->find($id);	      

	      $law = Law::find(1);
	      
	      $year_show =  $this->convert_to_kh_number(date("Y"));
	      return view('front.license_quota',compact('isubdetail','law','year_show'  ));
    }

    private function convert_to_kh_number($string) {
   // $num = range(0, 9);
	    $eng = ['1', '2', '3', '4', '5', '6', '7', '8', '9','0'];
	    $kh = ['១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '០'];

	    
	    $persianNumbersOnly = str_replace($eng, $kh, $string);

	    return $persianNumbersOnly;
	}

   private function convert_to_kh_month($string) {
   // $num = range(0, 9);
    $eng = ['01', '02', '03', '04', '05', '06', '07', '08', '09','10','11','12'];
    $kh = ['មករា', 'កុម្ភៈ', 'មិនា', 'មេសា', 'ឧសភា', 'មិថុនា' , 'កក្តដា', 'សីហា' , 'កញ្ញា', 'តុលា' , 'វិច្ឆកា' , 'ធ្នូ' ];

    
    $persianNumbersOnly = str_replace($eng, $kh, $string);

    return $persianNumbersOnly;
    }
}
