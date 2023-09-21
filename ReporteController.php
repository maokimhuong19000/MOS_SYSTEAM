<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Ifees;
use App\Customer;
use App\Cominfo;
use App\User;
use Auth;
use App\Province;
use App\Commune;
use App\Districts;
use App\Villages;

use App\City;

use App\Country;
use App\Equipment;
use App\Equipmentrequest;
use App\Equipmentrequestdetail;
class ReporteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
		$this->middleware('auth');
        $this->middleware('permission:report.equipment.company',['only' => ['iequipmentByCompany']]);
        $this->middleware('permission:report.equipment.port',['only' => ['iequipmentByPort']]);
        $this->middleware('permission:report.equipment.xcountry',['only' => ['iequipmentByCountry']]);
        $this->middleware('permission:report.equipment.mcountry',['only' => 'iequipmentBymCountry']);
        $this->middleware('permission:report.equipment.purpose',['only' => 'iequipmentByPurpose']);
    }

    

   

    


    public function iequipmentByCompany(){
    	return view('admin.reporte.iequipmentcompany');
    }

    public function getDatatableDymaniccolumn(){
    	
    		$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    		$from =  @$_GET['from'] ? date("Y-m-d H:i:s",strtotime($_GET['from'])) : date('Y-m-d');
            $to =  @$_GET['to'] ? date("Y-m-d H:i:s",strtotime($_GET['to'])) : date('Y-m-d');
            $where = @$_GET['from'] ?  " WHERE  materialrequests.created_at >=  '".$from."' AND materialrequests.created_at <=  '".$to."' ":" WHERE    year(materialrequests.created_at)= $year" ;
    		$dynamic_column_sql = "SELECT  substance 	
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id 
							LEFT JOIN materialrequests ON materialrequestdetails.materialrequest_id = materialrequests.id
							$where  Group by substance	";

			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			echo json_encode($dynamic_column);
    	
    }

    public function getiequipmentByCompanyYear(){
    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');


		$sql = "SELECT customers.id , company_name , idcard 
		,FORMAT(sum(case when year(equipmentrequests.created_at)= ".$year." AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode
				FROM 	customers
				LEFT JOIN equipmentrequests  ON equipmentrequests.customer_id = customers.id 
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				WHERE ctype <> 1 
				Group by customers.id , company_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance
                , equipment.taxcode , idcard  " ;

				
		$Aquota=DB::select( DB::raw($sql) );
       return datatables($Aquota)->toJson();

		
			

    }

    public function getiequipmentByCompanyFilter(){
    	$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        $to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';

    	
		$sql = " SELECT customers.id , company_name , idcard 
		,FORMAT(sum(case when equipmentrequests.created_at >=  $from AND equipmentrequests.created_at <=  $to AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode
				FROM 	customers
				LEFT JOIN equipmentrequests  ON equipmentrequests.customer_id = customers.id 
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				WHERE ctype <> 1 
				Group by customers.id , company_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance
                , equipment.taxcode , idcard  " ;

				
		$Aquota=DB::select( DB::raw($sql) );
       return datatables($Aquota)->toJson();

				//echo $dynamic_column[0]->col;
			

    }

   public function  iequipmentByPort(){
   		return view('admin.reporte.iequipmentport');
   }

   public function getiequipmentByPortYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			
   			$sql = "SELECT 	port_name , FORMAT(sum(case when year(equipmentrequests.created_at)= ".$year." AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode 

   				FROM port__entries
				LEFT JOIN equipmentrequests  ON equipmentrequests.place_import = port__entries.id 
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by port_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode   " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function getiequipmentByPortFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
            $to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';
   			
   			$sql = "SELECT 	port_name , FORMAT(sum(case when equipmentrequests.created_at >=  $from AND equipmentrequests.created_at <=  $to AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode 

   				FROM port__entries		
				LEFT JOIN equipmentrequests  ON equipmentrequests.place_import = port__entries.id 
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by port_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode   " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function  iequipmentByCountry(){
   		return view('admin.reporte.iequipmentcountry');
   }

   public function getiequipmentByCountryYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			
   			$sql = "SELECT 	countries_name  ,FORMAT(sum(case when year(equipmentrequests.created_at)= ".$year." AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode 

   				FROM countries 		
				LEFT JOIN equipmentrequests  ON equipmentrequests.country_id = countries.id
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				Group by countries_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function getiequipmentByCountryFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        	$to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';

   			
			
   			$sql = "SELECT 	countries_name  , FORMAT(sum(case when equipmentrequests.created_at >=  $from AND equipmentrequests.created_at <=  $to AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode

   				FROM countries 		
				LEFT JOIN equipmentrequests  ON equipmentrequests.country_id = countries.id
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by countries_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }


   public function  iequipmentBymCountry(){
   		return view('admin.reporte.iequipmentmcountry');
   }

   public function getiequipmentBymCountryYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			
			
   			$sql = "SELECT 	countries_name  , FORMAT(sum(case when year(equipmentrequests.created_at)= ".$year." AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode 

   				FROM countries 		
				LEFT JOIN equipmentrequests  ON equipmentrequests.manufacture_country_id = countries.id
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by countries_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

    public function getiequipmentBymCountryFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        	$to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';

   			
   			$sql = "SELECT 	countries_name  , FORMAT(sum(case when equipmentrequests.created_at >=  $from AND equipmentrequests.created_at <=  $to AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode

   				FROM countries 		
				LEFT JOIN equipmentrequests  ON equipmentrequests.manufacture_country_id = countries.id
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by countries_name ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }


    public function  iequipmentByPurpose(){
   		return view('admin.reporte.iequipmentpurpose');
   }

   public function getiequipmentByPurposeYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			
   			$sql = "SELECT 	i as purpose  , FORMAT(sum(case when year(equipmentrequests.created_at)= ".$year." AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode 

   				FROM ( SELECT  'ផលិតកម្ម/ Manufacturing sector' AS i  , 1 as j
						 UNION SELECT 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector' , 1
						 UNION SELECT  other_option_description , other_option from equipmentrequests where other_option = 1 )  	as port	 		
				LEFT JOIN ( SELECT equipmentrequests.import_status , equipmentrequests.created_at , equipmentrequests.id  ,
						 ( CASE WHEN  manufacture_option = 1 THEN 'ផលិតកម្ម/ Manufacturing sector' 
							 WHEN  aircon_service_option = 1 THEN 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector'
						     WHEN  other_option = 1 THEN other_option_description 
						END  ) AS purpose
						FROM `equipmentrequests` WHERE equipmentrequests.import_status > 1 AND  year(equipmentrequests.created_at)= $year

				) AS equipmentrequests  ON  port.i =equipmentrequests.purpose
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by i  ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function getiequipmentByPurposeFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        	$to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';

   			
   			$sql = "SELECT 	i as purpose  ,  FORMAT(sum(case when equipmentrequests.created_at >=  $from AND equipmentrequests.created_at <=  $to AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) ,0) as total ,
		    	equipmentrequestdetails.capvalue , 		equipmentrequestdetails.capacity,equipmentrequestdetails.substance,
				equipmentrequestdetails.equipment_id , equipment.taxcode

   				FROM ( SELECT  'ផលិតកម្ម/ Manufacturing sector' AS i  , 1 as j
						 UNION SELECT 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector' , 1
						 UNION SELECT  other_option_description , other_option from equipmentrequests where other_option = 1 )  	as port	 		
				LEFT JOIN ( SELECT equipmentrequests.import_status , equipmentrequests.created_at , equipmentrequests.id  ,
						 ( CASE WHEN  manufacture_option = 1 THEN 'ផលិតកម្ម/ Manufacturing sector' 
							 WHEN  aircon_service_option = 1 THEN 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector'
						     WHEN  other_option = 1 THEN other_option_description 
						END  ) AS purpose
						FROM `equipmentrequests` WHERE equipmentrequests.import_status > 1 AND  equipmentrequests.created_at >=  $from AND equipmentrequests.created_at <=  $to

				) AS equipmentrequests  ON  port.i =equipmentrequests.purpose
				LEFT JOIN  equipmentrequestdetails  ON equipmentrequests.id   = equipmentrequestdetails.equipmentrequest_id
				LEFT JOIN  equipment   on  equipmentrequestdetails.equipment_id = equipment.id  
				
				Group by i  ,equipmentrequestdetails.capvalue , equipmentrequestdetails.capacity ,equipmentrequestdetails.equipment_id ,equipmentrequestdetails.substance, equipment.taxcode " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }



}

