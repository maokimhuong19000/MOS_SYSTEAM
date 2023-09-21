<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Cominfo;
use App\Materialrequest;
use App\Equipmentrequest;
use App\Quotarequest;
use Validator;
use Mail;
use Auth;
use Yajra\DataTables\DataTables;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:company.view', ['only' => ['index','getdatatables','Detail','show','get_import']]);
         $this->middleware('permission:company.update', ['only' => ['edit','update','enable','disable','editp','updatep']]);
         $this->middleware('permission:company.create', ['only' => ['create','store']]);
    }
    
    public function index()
    {

        return view('admin.register.index');
    }


    public function getdatatables(){
        $Customers=Customer::where("astatus", '=', 1 )->select('id','idcard','company_name','user_name','created_at','status','ctype');
        return datatables::of($Customers)->make(true);
    }

    public function get_import($id){

        $material = Materialrequest::join('materialrequestdetails','materialrequests.id', '=', 'materialrequestdetails.materialrequest_id')
                 ->where('materialrequests.customer_id','=',$id)
                 ->select(DB::raw("'Substances' as rtype ") ,'request_no', 'materialrequests.id', DB::raw('sum(materialrequestdetails.quantity) AS Total'),'customer_id','import_status','import_date' ,'materialrequests.created_at')
                 ->groupBy('materialrequests.id','request_no','customer_id','import_status','import_date' ,'materialrequests.created_at');
                 

         $equipment = Equipmentrequest::where('equipmentrequests.customer_id' , '=', $id )
                        ->join('equipmentrequestdetails' , 'equipmentrequests.id' , '=','equipmentrequestdetails.equipmentrequest_id')
                        ->select( DB::raw("'Equipments' as rtype "), 'request_no', 'equipmentrequests.id', DB::raw('sum(equipmentrequestdetails.amount) AS Total'),'customer_id','import_status','import_date','equipmentrequests.created_at' )
                         ->groupBy('equipmentrequests.id', 'request_no','customer_id','import_status','import_date','equipmentrequests.created_at');
                        

        $datatable =   $material->union($equipment)->get();
        return datatables::of($datatable)->make(true);
    }
    public function get_substance($id)
    {
        
        $year = @$_GET['year'] ? $_GET['year'] : date('Y');
        $from =  @$_GET['from'] ? date("Y-m-d H:i:s",strtotime($_GET['from'])) : date('Y-m-d');
        $to =  @$_GET['to'] ? date("Y-m-d H:i:s",strtotime($_GET['to'])) : date('Y-m-d');

        $substance1= " SELECT substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`,year(materialrequests.created_at) as year, sum(case when year(materialrequests.created_at)= ".$year." AND materialrequests.import_status > 1 then materialrequestdetails.quantity else 0 end) AS Total FROM `materials` INNER JOIN `materialrequestdetails` ON  materialrequestdetails.material_id = materials.id  INNER JOIN `materialrequests` ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  WHERE `status` = 1 AND materialrequests.customer_id = ".$id." Group by year(materialrequests.created_at), substance , materials.id , `com_name`, `chemical`, `substance`, `code`, `taxcode`";
        $substance2= " SELECT substance , materials.id ,  `com_name`, `chemical`, `substance`, `code`, `taxcode`, sum(case when materialrequests.created_at >=  '".$from."' AND materialrequests.created_at <=  '".$to."' AND materialrequests.import_status > 1 then materialrequestdetails.quantity else 0 end) AS Total FROM `materials` INNER JOIN `materialrequestdetails` ON  materialrequestdetails.material_id = materials.id  INNER JOIN `materialrequests` ON `materialrequests`.`id` = `materialrequestdetails`.`materialrequest_id`  WHERE `status` = 1 AND materialrequests.customer_id = ".$id." Group by year(materialrequests.created_at), substance , materials.id , `com_name`, `chemical`, `substance`, `code`, `taxcode`";
        $isubstance = @$_GET['from'] ? DB::select( DB::raw($substance2) ) :DB::select( DB::raw($substance1) ) ;
        return datatables($isubstance)->toJson();
    }

    public function get_equipment($id)
    {
        $year = @$_GET['year'] ? $_GET['year'] : date('Y');
        $from =  @$_GET['from'] ? date("Y-m-d H:i:s",strtotime($_GET['from'])) : date('Y-m-d');
        $to =  @$_GET['to'] ? date("Y-m-d H:i:s",strtotime($_GET['to'])) : date('Y-m-d');
        $iequipmentrequest1= " SELECT 
        product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data as capacity,equipmentrequestdetails.substance,
        sum(case when equipmentrequests.created_at >=  '".$from."' AND equipmentrequests.created_at <=  '".$to."' AND equipmentrequests.import_status > 1  then equipmentrequestdetails.amount else 0 end) as total 
        FROM   `equipment`
        INNER JOIN  `equipmentrequestdetails`   on  equipmentrequestdetails.equipment_id = equipment.id  
        INNER JOIN equipmentrequests   ON `equipmentrequests`.`id` = `equipmentrequestdetails`.`equipmentrequest_id`    
          WHERE `status` = 1 AND equipmentrequests.customer_id =".$id."     Group by product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data ,equipmentrequestdetails.substance " ;

        $iequipmentrequest2= " SELECT 
        product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data as capacity,equipmentrequestdetails.substance,
        sum(case when year(equipmentrequests.created_at)= ".$year." AND equipmentrequests.import_status > 1   then equipmentrequestdetails.amount else 0 end) as total 
        FROM   `equipment`
        INNER JOIN  `equipmentrequestdetails`   on  equipmentrequestdetails.equipment_id = equipment.id  
        INNER JOIN equipmentrequests   ON `equipmentrequests`.`id` = `equipmentrequestdetails`.`equipmentrequest_id`    
        WHERE `status` = 1 AND equipmentrequests.customer_id =".$id."     Group by product_name , equipment.id ,   `taxcode`, capvalue*capvalue_data ,equipmentrequestdetails.substance " ;
        $equipmentrequest = @$_GET['from'] ? DB::select( DB::raw($iequipmentrequest1) ) :DB::select( DB::raw($iequipmentrequest2) ) ;
        return datatables($equipmentrequest)->toJson();
    }
    public function get_quota($id)
    {
        $year = @$_GET['year'] ? $_GET['year'] : date('Y');
        $sql = "
      SELECT 
        request.substance ,request.year,  request.material_id , IFNULL(Imported.imported,0) as imported ,
        IFNULL(Quota.total_allow ,0) as total_allow , IFNULL(total_request,0) as total_request
      FROM 

        (SELECT customer_id ,  material_id , SUM(amount) as total_request , year ,materials.substance  
        FROM   `quotarequests` 
        INNER JOIN quotarequestdetails ON quotarequests.id = quotarequestdetails.quotarequest_id
        INNER JOIN  `materials` on `materials`.`id` = `quotarequestdetails`.`material_id` 
        WHERE customer_id  = ".$id." 
        GROUP BY   customer_id ,  material_id , year,materials.substance  ) AS request

      Left JOIN
        ( select  aquotas.year,aquotas.material_id ,sum(comquotas.amount) as total_allow
        FROM `aquotas` 
        INNER JOIN `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`           
        WHERE `comquotas`.customer_id = ".$id."
        GROUP BY  aquotas.material_id,aquotas.year    ) AS Quota 
      ON  Quota.`year` = request.`year` AND  Quota.material_id =request.material_id
      Left JOIN 
        (  select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as imported , materialrequestdetails.material_id ,
            year(materialrequests.created_at) as year
        FROM   `materialrequests`
        INNER JOIN `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 
        WHERE `materialrequests`.`import_status` > 1 AND materialrequests.customer_id =  ".$id."
        GROUP BY  materialrequestdetails.material_id , year(materialrequests.created_at)  ) AS Imported 
      ON  Quota.`year` = Imported.`year` AND  Quota.material_id =Imported.material_id 
                  WHERE Quota.year = ".$year;

        $Aquota=DB::select( DB::raw($sql) );
        return datatables($Aquota)->toJson();


    }

    public function Detail($id)
    {
        
        $Customer=Customer::with('Cominfo')->find($id);
        $Id = $id ;

        $sql = "SELECT request.substance ,request.year,  request.material_id , IFNULL(Imported.imported,0) as imported ,IFNULL(Quota.total_allow ,0) as total_allow , IFNULL(total_request,0) as total_request

         FROM 

         (SELECT customer_id ,  material_id , SuM(amount) as total_request , year ,materials.substance  FROM 
         `quotarequests` 
          Inner JOIN
          quotarequestdetails ON quotarequests.id = quotarequestdetails.quotarequest_id
           INNER JOIN  `materials` on `materials`.`id` = `quotarequestdetails`.`material_id` 
          where customer_id  = ".$id."  AND year = YEAR(CURDATE())
          Group by  customer_id ,  material_id , year ,materials.substance ) AS request

          Left JOIN
            ( select  aquotas.year,aquotas.material_id ,sum(comquotas.amount) as total_allow
            from `aquotas` 
            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
           
            WHERE `comquotas`.customer_id = ".$id." and year =   YEAR(CURDATE())
            group by aquotas.material_id,aquotas.year
               ) 
            AS Quota 
            ON  Quota.`year` = request.`year` AND  Quota.material_id =request.material_id
            Left JOIN 
            (  select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as imported , materialrequestdetails.material_id , year(materialrequests.created_at) as year
            from   `materialrequests`
            inner join `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 

            where  `materialrequests`.`import_status` > 1 AND materialrequests.customer_id =  ".$id." AND  year(materialrequests.created_at) =YEAR(CURDATE())
            group by  materialrequestdetails.material_id , year(materialrequests.created_at)  ) AS Imported 
            ON  Quota.`year` = Imported.`year` AND  Quota.material_id =Imported.material_id ";
            
             $Aquota=DB::select( DB::raw($sql) );
             
        return view('admin.register.detail',compact('Customer','Id', 'Aquota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  Customer::rules(), Customer::$messages);
           if ($validator->fails())
            {
              return \Redirect::back()->withErrors($validator)->withInput();
            }

            else{
                $customer= new Customer();
                //$com= new Cominfo();
                $cc = $customer->create([
                    'user_name' =>$request->input('user_name'),
                    'idcard' => $request->input('idcard'),
                    'ctype' => $request->input('ctype'),
                    'password' => bcrypt($request->input('password')),
                    'company_name' => $request->input('company_name'),
                    'status' => 1,
                    'astatus'=>1, 'tel'=>'',
                    'city' => 'ភ្នំពេញ/ Phnom Penh',
                ]);
            if ($cc) {

                $cus = Customer::find($cc->id);
                $comment = new Cominfo(['tel'=>'','contact_person'=>'','position'=> '','nationality' => '' , 'city' => 'ភ្នំពេញ/ Phnom Penh',]);
                $cus->cominfo()->save($comment);

              //  array_merge  ($request->except('_token') ,['status' => 1,'astatus'=>1])   

                //Session::flash('success', 'Saved Successfully !!');
                return redirect()->route('register.index')->with('success', 'Customer Substance Saved Successfully !!');

            } else {
                // Session::flash('error', 'Some thing went wrong!!');
                     return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
            }
        }

        // Store the blog post...
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.register.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Customers=Customer::find($id);
        return view('admin.register.edit',compact('Customers'));
    }

    public function editp($id)
    {
        $Customers=Customer::find($id);
        return view('admin.register.editp',compact('Customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      
            $validator = Validator::make($request->all(),Customer::$messages);
               if ($validator->fails())
               {
                  return \Redirect::back()->withErrors($validator)->withInput();
              }
              else
              {

                
                $obj = Customer::find($id);

                 if ($obj->update([
                    'ctype' =>$request->input('ctype'),
                    'idcard' => $request->input('idcard'),
                   
                    'company_name' => $request->input('company_name'),
                     ]
                ) ) {

                    //Session::flash('success', 'Saved Successfully !!');
                    return redirect()->route('register.index')->with('success', 'Customer Updated Successfully !!');

                } else {
                    // Session::flash('error', 'Some thing went wrong!!');
                     return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            } 
    }

    public function updatep(Request $request, $id)
    {      
            $validator = Validator::make($request->all(),Customer::$messages);
               if ($validator->fails())
               {
                  return \Redirect::back()->withErrors($validator)->withInput();
              }
              else
              {

                
                $obj = Customer::find($id);

                 if ($obj->update([
                    'user_name' =>$request->input('user_name'),
                    
                    'password' => bcrypt($request->input('password')),
                    
                     ]
                ) ) {

                    //Session::flash('success', 'Saved Successfully !!');
                    return redirect()->route('register.index')->with('success', 'Customer Updated Successfully !!');

                } else {
                    // Session::flash('error', 'Some thing went wrong!!');
                     return \Redirect::back()->with('error', 'Some thing went wrong!!')->withInput();
                }

            } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function disable($id)
    {
        //
        $Customer =Customer::find($id);
        $Customer->status = 0;
        if($Customer->save()){
            $data["code"] = 1 ;
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');
    }
    public function enable($id)
    {
        //
          $Customer =Customer::find($id);
          $Customer->status = 1;
          if($Customer->save()){
            $data["code"] = 1 ;
            $this->mailuser($Customer);
        }else{
            $data["code"] = 0 ;
        }

        return response($data)->header('Content-Type', 'application/json');    
    }

    private function mailuser($customer){

        // $users = User::all(); // condition permission 
          Mail::send('emails.userapprove',   [ 'customer' => $customer ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject('User Account Approved');
        });
    }

}
