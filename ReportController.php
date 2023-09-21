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
use App\Material;
use App\Quotarequestde_tail;
use App\Quotarequest;
use App\Quotarequestfile;
use App\City;
use App\Materialrequest;
use App\Materialrequestdetail;
use App\Country;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
		$this->middleware('auth');
		$this->middleware('permission:report.substance.substance',['only'=>'isubstance']);
        $this->middleware('permission:report.substance.mcountry',['only'=>'isubstanceBymCountry']);
        $this->middleware('permission:report.substance.xcountry',['only'=>'isubstanceByCountry']);
        $this->middleware('permission:report.substance.port',['only'=>'isubstanceByPort']);
        $this->middleware('permission:report.substance.company',['only'=>'isubstanceByCompany']);
        $this->middleware('permission:report.substance.purpose',['only'=>'isubstanceByPurpose']);
    /*	DB::statement('SET GLOBAL group_concat_max_len = 1000000');
    	$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND year(materialrequests.created_at)= ' 
							    ,  $year
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col 
							FROM materials where status = 1 
							 "; */
    		
    }

    public function  isubstance(){



    		return view('admin.report.isubstance');

    }

    public function get_total_year(){

    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    	
    	$sql = "
  SELECT 
	IMPORTED.substance ,  
	IMPORTED.taxcode , 
	IMPORTED.year , 
	IMPORTED.total , 
	FORMAT(IFNULL(AnnaulQuota,0) , 2 ) AS AnnaulQuota , 
	FORMAT(IFNULL(AssignedQuota, 0),2 ) AS AssignedQuota , 
	IMPORTED.id , 
    (IFNULL(AnnaulQuota,0) - IFNULL(AssignedQuota, 0)) AS unassigned ,
    FORMAT(( IFNULL(AssignedQuota, 0) - total ),2) AS balance
FROM 

	( SELECT 
		substance ,
	 	materials.id ,   
	 	`taxcode`,  
	 	year(materialrequests.created_at) as year, 
	 	sum(case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end) as total  		
	FROM   `materials`		
	LEFT JOIN  `materialrequestdetails`   ON  materialrequestdetails.material_id = materials.id  
	LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
				
	WHERE materials.status =1   
	Group by year(materialrequests.created_at), substance , materials.id , `taxcode` 
	) AS IMPORTED 
  	LEFT JOIN  
	( select  
		aquotas.id, 
		aquotas.amount as AnnaulQuota , 
		aquotas.year,
		aquotas.material_id ,
		sum(comquotas.amount) as AssignedQuota
	            from `aquotas` 
	            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
	            inner join `materials` on `materials`.`id` = `aquotas`.`material_id` 

	            group by aquotas.material_id,aquotas.year ,aquotas.id,aquotas.amount
	) AS AQuota
	ON IMPORTED.id = AQuota.material_id AND IMPORTED.year = AQuota.year " ;

  		$Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();
    }

    public function get_total_year_detail(){

    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    	
    	$sql = "  SELECT IMPORTED.substance ,  IMPORTED.taxcode , IMPORTED.year , IMPORTED.total , FORMAT(IFNULL(AnnaulQuota,0) , 2 ) AS AnnaulQuota , FORMAT(IFNULL(AssignedQuota, 0),2 ) AS AssignedQuota , IMPORTED.id , 
    		(IFNULL(AnnaulQuota,0) - IFNULL(AssignedQuota, 0)) AS unassigned ,
    		FORMAT(( IFNULL(AssignedQuota, 0) - total ),2) AS balance
    	FROM 
	    	( SELECT substance , materials.id ,   `taxcode`,  year(materialrequests.created_at) as year
	 		, sum(case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end) as total  		FROM   `materials`		
			LEFT JOIN  `materialrequestdetails`   ON  materialrequestdetails.material_id = materials.id  
			LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
				
	  		WHERE materials.status =1   
	  		Group by year(materialrequests.created_at), substance , materials.id , `taxcode` ) AS IMPORTED 
  		LEFT JOIN  
  			( SELECT substance , materials.id ,   `taxcode`,materialrequests.request_no , customers.company_name
	 		, (case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1   then materialrequestdetails.quantity else 0 end ) AS amount ,year(materialrequests.created_at) as year
            FROM   `materials`		
			LEFT JOIN  `materialrequestdetails`   ON  materialrequestdetails.material_id = materials.id  
			LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
			LEFT JOIN customers ON materialrequests.customer_id = customers.id 
	  		WHERE materials.status =1  ) AS IMPORTEDD
	  	ON IMPORTED.id = IMPORTEDD.id AND IMPORTED.year = IMPORTEDD.year 
	  	LEFT JOIN
	  		( select  aquotas.id, aquotas.amount as AnnaulQuota , aquotas.year,aquotas.material_id ,sum(comquotas.amount) as AssignedQuota
	            from `aquotas` 
	            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
	            inner join `materials` on `materials`.`id` = `aquotas`.`material_id` 

	            group by aquotas.material_id,aquotas.year ) AS AQuota
	    ON IMPORTED.id = AQuota.material_id AND IMPORTED.year = AQuota.year 
  		 " ;
  		$Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();
    }



    public function get_total_month(){

    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    	$sql = " 
		SELECT 
		 
		 substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,  `cas`, `un3` , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 1   then materialrequestdetails.quantity else 0 end) as January
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 2   then materialrequestdetails.quantity else 0 end) as Febury
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 3   then materialrequestdetails.quantity else 0 end) as March
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 4   then materialrequestdetails.quantity else 0 end) as April
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 5   then materialrequestdetails.quantity else 0 end) as May
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 6   then materialrequestdetails.quantity else 0 end) as June
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 7   then materialrequestdetails.quantity else 0 end) as July
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 8   then materialrequestdetails.quantity else 0 end) as August
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 9   then materialrequestdetails.quantity else 0 end) as September
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 10   then materialrequestdetails.quantity else 0 end) as October
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 11   then materialrequestdetails.quantity else 0 end) as November
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND month(materialrequests.created_at) = 12   then materialrequestdetails.quantity else 0 end) as December
		 
		FROM   `materials`
		LEFT JOIN  `materialrequestdetails`   on  materialrequestdetails.material_id = materials.id  
		LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
		  
		Group by substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,  `cas`, `un3` , year(materialrequests.created_at) ";

		$Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();

    }

     public function get_total_trimester(){

    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    	$sql = " 
		SELECT 
		 
		 substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,  `cas`, `un3` 
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND QUARTER(materialrequests.created_at) = 1   then materialrequestdetails.quantity else 0 end) as q1
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND QUARTER(materialrequests.created_at) = 2   then materialrequestdetails.quantity else 0 end) as q2
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND QUARTER(materialrequests.created_at) = 3   then materialrequestdetails.quantity else 0 end) as q3
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND QUARTER(materialrequests.created_at) = 4   then materialrequestdetails.quantity else 0 end) as q4
		 
		FROM   `materials`
		LEFT JOIN  `materialrequestdetails`   on  materialrequestdetails.material_id = materials.id  
		LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
		  
		Group by substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,  `cas`, `un3` , year(materialrequests.created_at) ";

		$Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();

    }


    public function get_total_semester(){

    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    	$sql = " 
		SELECT 
		 
		 substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,  `cas`, `un3` 
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND QUARTER(materialrequests.created_at) >= 2   then materialrequestdetails.quantity else 0 end) as s1
		 , sum(case when year(materialrequests.created_at)=".$year." AND materialrequests.import_status > 1 AND QUARTER(materialrequests.created_at) >=3   then materialrequestdetails.quantity else 0 end) as s2
		 
		 
		FROM   `materials`
		LEFT JOIN  `materialrequestdetails`   on  materialrequestdetails.material_id = materials.id  
		LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
		  
		Group by substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,  `cas`, `un3` , year(materialrequests.created_at) ";

		$Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();

    }

    public function get_substance_filter(){

      $from =  @$_GET['from'] ? date("Y-m-d H:i:s",strtotime($_GET['from'])) : date('Y-m-d');
      $to =  @$_GET['to'] ? date("Y-m-d H:i:s",strtotime($_GET['to'] . ' +1 day')) : date("Y-m-d", strtotime('tomorrow'));
      
    	$sql = " 
		SELECT 
		 
		 substance , materials.id ,   `taxcode`,  
		  sum(case when materialrequests.created_at >=  '".$from."' AND materialrequests.created_at <=  '".$to."' 
		 AND materialrequests.import_status > 1 
		 THEN materialrequestdetails.quantity else 0 end) as total
		 		 
		FROM   `materials`
		LEFT JOIN  `materialrequestdetails`   on  materialrequestdetails.material_id = materials.id  
		LEFT JOIN materialrequests   ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  
		  
		Group by substance , materials.id , `taxcode` ";

		$Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();

    }


    public function isubstanceByCompany(){
    	return view('admin.report.isubstancecompany');
    }

    public function getDatatableDymaniccolumn(){
    	
    		$year = @$_GET['year'] ? $_GET['year'] : date('Y');
    		$from =  @$_GET['from'] ? date("Y-m-d H:i:s",strtotime($_GET['from'])) : date('Y-m-d');
            $to =  @$_GET['to'] ? date("Y-m-d H:i:s",strtotime($_GET['to'] . ' +1 day')) : date("Y-m-d", strtotime('tomorrow'));
            
            $where = @$_GET['from'] ?  " WHERE  materialrequests.created_at >=  '".$from."' AND materialrequests.created_at <=  '".$to."' ":" WHERE    year(materialrequests.created_at)= $year" ;
    		$dynamic_column_sql = "  SELECT  substance 	
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id 
							LEFT JOIN materialrequests ON materialrequestdetails.materialrequest_id = materialrequests.id
							$where  Group by substance	";

			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			echo json_encode($dynamic_column);
			//echo 1;
    	
    }

    public function getIsubstanceByCompanyYear(){
    	$year = @$_GET['year'] ? $_GET['year'] : date('Y');

    	DB::statement('SET GLOBAL group_concat_max_len = 10000');
    	$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND year(materialrequests.created_at)= ' 
							    , $year
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";

		$dynamic_column_sql_q = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT( IF(aquotas.material_id = '
								, materials.id
							    , ' AND aquotas.year = ' 
							    , $year
								, ', comquotas.amount,0)    ,2) AS '
							    ,'`'
								, CONCAT(substance,'_quota')
							    ,'`'
							)) AS col
							FROM comquotas
							LEFT JOIN aquotas on  comquotas.aquota_id = aquotas.id
							LEFT JOIN materials on  comquotas.material_id = materials.id ";

		$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
		$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
		$sql = "SELECT customers.id , company_name , idcard " .$colss . "
				FROM 	customers
				LEFT JOIN materialrequests   ON materialrequests.customer_id = customers.id 
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				WHERE ctype <> 2 
				Group by customers.id , company_name,idcard " ;

				
		$Aquota=DB::select( DB::raw($sql) );
       return datatables($Aquota)->toJson();

				//echo $dynamic_column[0]->col;
			

    }

    public function getIsubstanceByCompanyFilter(){
    	$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
     $to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';
        
    	DB::statement('SET GLOBAL group_concat_max_len = 10000');
    	$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							   , ' AND   materialrequests.import_status > 1 '
							    , ' AND  materialrequests.created_at >=$from ' 
							     ,' AND materialrequests.created_at <=$to '
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";

		$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
		$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
		$sql = "SELECT customers.id , company_name , idcard " .$colss . "
				FROM 	customers
				LEFT JOIN materialrequests   ON materialrequests.customer_id = customers.id 
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				WHERE ctype <> 2
				Group by customers.id , company_name , idcard " ;

				
		$Aquota=DB::select( DB::raw($sql) );
       return datatables($Aquota)->toJson();

				//echo $dynamic_column[0]->col;
			

    }

   public function  isubstanceByPort(){
   		return view('admin.report.isubstanceport');
   }

   public function getIsubstanceByPortYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND year(materialrequests.created_at)= ' 
							    , $year
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	port_name " .$colss . "
				FROM port__entries
   				
				LEFT JOIN 	 materialrequests    ON  port__entries.iD = materialrequests.place_import
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by port_name " ;



				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function getIsubstanceByPortFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
            $to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							     , ' AND  materialrequests.created_at >=$from ' 
							     ,' AND materialrequests.created_at <=$to '
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	port_name " .$colss . "
				FROM port__entries
   						
				LEFT JOIN 	 materialrequests    ON  port__entries.id = materialrequests.place_import
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by port_name " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function  isubstanceByCountry(){
   		return view('admin.report.isubstancecountry');
   }

   public function getIsubstanceByCountryYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND year(materialrequests.created_at)= ' 
							    , $year
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	countries_name  " .$colss . "

   				FROM countries 		
				LEFT JOIN 	 materialrequests    ON  countries.id = materialrequests.from_country_id
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
			
				Group by countries_name " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function getIsubstanceByCountryFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        	$to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';
        	
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							   , ' AND  materialrequests.created_at >=$from ' 
							     ,' AND materialrequests.created_at <=$to '
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	countries_name  " .$colss . "

   				FROM countries 		
				LEFT JOIN 	 materialrequests    ON  countries.id = materialrequests.from_country_id
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by countries_name " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }


   public function  isubstanceBymCountry(){
   		return view('admin.report.isubstancemcountry');
   }

   public function getIsubstanceBymCountryYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND year(materialrequests.created_at)= ' 
							    , $year
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	countries_name  " .$colss . "

   				FROM countries 		
				LEFT JOIN 	 materialrequests    ON  countries.id = materialrequests.manufacture_country_id
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by countries_name " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

    public function getIsubstanceBymCountryFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        	$to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';
        	
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							   , ' AND  materialrequests.created_at >=$from ' 
							     ,' AND materialrequests.created_at <=$to '
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	countries_name  " .$colss . "

   				FROM countries 		
				LEFT JOIN 	 materialrequests    ON  countries.id = materialrequests.manufacture_country_id
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by countries_name " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }


    public function  isubstanceByPurpose(){
   		return view('admin.report.isubstancepurpose');
   }

   public function getIsubstanceByPurposeYear(){

   			$year = @$_GET['year'] ? $_GET['year'] : date('Y');
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND year(materialrequests.created_at)= ' 
							    , $year
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	i as purpose  " .$colss . "

   				FROM ( SELECT  'ផលិតកម្ម/ Manufacturing sector' AS i  , 1 as j
						 UNION SELECT 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector' , 1
						 UNION SELECT  other_option_description , other_option from materialrequests where other_option = 1 )  	as port	 		
				LEFT JOIN ( SELECT materialrequests.import_status , materialrequests.created_at , materialrequests.id  ,
						 ( CASE WHEN  manufacture_option = 1 THEN 'ផលិតកម្ម/ Manufacturing sector' 
							 WHEN  aircon_service_option = 1 THEN 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector'
						     WHEN  other_option = 1 THEN other_option_description 
						END  ) AS purpose
						FROM `materialrequests` WHERE materialrequests.import_status > 1 AND  year(materialrequests.created_at)= $year

				) AS materialrequests  ON  port.i =materialrequests.purpose
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by i " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }

   public function getIsubstanceByPurposeFilter(){

   			$from =  @$_GET['from'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['from'])).'"' : '"'.date('Y-m-d').'"';
        	$to =  @$_GET['to'] ? '"'.date("Y-m-d H:i:s",strtotime($_GET['to']. ' +1 day')).'"' : '"'.date("Y-m-d", strtotime('tomorrow')).'"';
        	
   			//DB::statement('SET GLOBAL group_concat_max_len = 10000');
   			$dynamic_column_sql = "SELECT GROUP_CONCAT( DISTINCT 
							CONCAT(
								'FORMAT(SUM( IF(materials.id = '
								, materialrequestdetails.material_id
							    , ' AND   materialrequests.import_status > 1 '
							    , ' AND  materialrequests.created_at >=$from ' 
							     ,' AND materialrequests.created_at <=$to '
								, ', quantity,0)   ) ,2) AS '
							    ,'`'
								, substance
							    ,'`'
							)) AS col
							FROM materials
							LEFT JOIN materialrequestdetails on  materialrequestdetails.material_id = materials.id ";
			$dynamic_column = DB::select( DB::raw($dynamic_column_sql) );
			$colss = $dynamic_column[0]->col <> "" ?  ", ". $dynamic_column[0]->col : "" ;
   			$sql = "SELECT 	i as purpose  " .$colss . "

   				FROM ( SELECT  'ផលិតកម្ម/ Manufacturing sector' AS i  , 1 as j
						 UNION SELECT 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector' , 1
						 UNION SELECT  other_option_description , other_option from materialrequests where other_option = 1 )  	as port	 		
				LEFT JOIN ( SELECT materialrequests.import_status , materialrequests.created_at , materialrequests.id  ,
						 ( CASE WHEN  manufacture_option = 1 THEN 'ផលិតកម្ម/ Manufacturing sector' 
							 WHEN  aircon_service_option = 1 THEN 'សេវាកម្មម៉ាស៊ីនត្រជាក់ឬបរិក្ខាត្រជាក់/Service sector'
						     WHEN  other_option = 1 THEN other_option_description 
						END  ) AS purpose
						FROM `materialrequests` WHERE materialrequests.import_status > 1 AND  materialrequests.created_at >=  '".$from."' 
						AND materialrequests.created_at <=  '".$to."' 

				) AS materialrequests  ON  port.i =materialrequests.purpose
				LEFT JOIN  `materialrequestdetails` ON  `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`
				LEFT JOIN  `materials`   on  materialrequestdetails.material_id = materials.id  
				Group by i " ;

				
				$Aquota=DB::select( DB::raw($sql) );
		       return datatables($Aquota)->toJson();

   }



}

