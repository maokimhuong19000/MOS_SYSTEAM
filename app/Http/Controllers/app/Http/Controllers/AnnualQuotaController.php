<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Aquota;
use App\Quotarequest;
use App\Material;
use App\Comquota;
use App\Customer;
use App\Law;
 use App\Materialrequest ;
 use App\Materialrequestdetail;
use Validator;
class AnnualQuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:annualquota.view', ['only' => ['index','getdatatables','show', 'showdetail','doubleshow','doubledatatable']]);
        $this->middleware('permission:annualquota.edit', ['only' => ['edit','update',]]);
        $this->middleware('permission:annualquota.create', ['only' => ['assignquota','store', 'exist']]);
    }
    public function index()
    {
        return view('admin.product.annualquota.index');
    }

    public function getRequestQuota(){

         $material_id =  @$_GET['material_id'] ? @$_GET['material_id'] : 1;
         $year =  @$_GET['year'] ? @$_GET['year'] : date('Y');

         DB::statement(DB::raw('set @rownum=0'));
         $Result = Quotarequest::join('customers', 'quotarequests.customer_id','=','customers.id')
                ->join('quotarequestdetails', 'quotarequests.id','=','quotarequestdetails.quotarequest_id')
                ->select( DB::raw('@rownum  := @rownum  + 1 AS rownum'),'quotarequestdetails.material_id',DB::raw('sum(quotarequestdetails.amount) AS total')  ,'customers.company_name' ,'customers.id'  )
                ->groupBy('quotarequestdetails.material_id','quotarequests.year', 'customers.company_name','customers.id' )              
                ->where('quotarequestdetails.material_id', $material_id)
                ->where('quotarequests.year', $year)
                ->get();
         return json_encode($Result);

    }

    public function getdatatables()
    {
        
        $sql = "SELECT Quota.id , Quota.amount , Quota.substance ,Quota.year, Quota.material_id , Quota.material_id , IFNULL(Imported.imported,0) as imported ,IFNULL(Quota.total_amount,0) AS  total_amount

         FROM 
            ( select  aquotas.id,aquotas.amount,materials.substance,aquotas.year,aquotas.material_id ,sum(comquotas.amount) as total_amount
            from `aquotas` 
            LEFT join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
            LEFT join `materials` on `materials`.`id` = `aquotas`.`material_id` 
            group by aquotas.id,aquotas.amount,materials.substance,aquotas.year,aquotas.material_id
               ) 
            AS Quota 

            LEFT JOIN 
            (  select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as imported , materialrequestdetails.material_id , year(materialrequests.created_at) as year
            from   `materialrequests`
            inner join `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 

            where  `materialrequests`.`import_status` > 1
            group by  materialrequestdetails.material_id , year(materialrequests.created_at)  ) AS Imported 
            ON  Quota.`year` = Imported.`year` AND  Quota.material_id =Imported.material_id ";
            
             $Aquota=DB::select( DB::raw($sql) );
       
        return datatables($Aquota)->toJson();
    }

    public function assignquota()
    {
        $materils=Material::select('substance','id')->get();
        
        return view('admin.product.annualquota.assignquota',compact('materils'));
    }
   
    public function create()
    {
                
    }

    public function store(Request $request)
    {

                if ($this->exist($request->substance,$request->year)) {
                   
                     return \Redirect::back()->with('danger', 'Substance and year exists already')->withInput();
                }
                $validatedData = $request->validate([
                    'avaliable' => 'required',
                    'year'=> 'required',
                ]);


                $aquota = new Aquota();
                $aquota->amount = $request->avaliable;
                $aquota->material_id = $request->substance;
                $aquota->year        = $request->year;
                if ($aquota->save()){
                  /*  foreach ($request->customer_id as $key => $customer_id) {
                        $cf = new Comquota();
                        $cf->aquota_id  = $aquota->id;
                        $cf->customer_id = $customer_id;
                        $cf->amount      = $request['qty'][$key];
                        $cf->astatus      = 0;
                        $cf->save();
                    }*/
                      return redirect()->action('AnnualQuotaController@index')->with('success', 'Quota Assign successfully !!');
                } 
               // return back()->with('success','Save successfully');
              
            // }
    }

    public function show($id)
    {
        
         $Aquota=DB::table('aquotas')          
                ->join('materials','materials.id','=','aquotas.material_id')     
                ->select('aquotas.id','aquotas.year','materials.substance')
                ->where('materials.id',$id)
                ->first();
            $materils=Material::select('substance','id')->get();
             $s_id = $id;          
            return view('admin.product.annualquota.show',compact('s_id','materils','Aquota'));

    }

    public function showdetail()
    {

        $sql = "
        SELECT Quota.`year` , 
            Quota.amount , substance , company_name , Quota.customer_id , Quota.material_id ,  IFNULL(Imported.total_use,0) AS  total_use

         FROM 
            ( select  `aquotas`.`year`, `comquotas`.`amount`, `comquotas`.`aquota_id`, `materials`.`substance`, `comquotas`.`customer_id`, `customers`.`company_name` , aquotas.material_id 
            from `aquotas` 
            inner join `comquotas` on `aquotas`.`id` = `comquotas`.`aquota_id`
            inner join `materials` on `materials`.`id` = `aquotas`.`material_id` 
            inner join `customers` on `customers`.`id` = `comquotas`.`customer_id` 
            where `materials`.`id` =  " .$_GET['id'] ."     ) 
            AS Quota 

            LEFT JOIN 
            (  select IFNULL(sum(materialrequestdetails.quantity) ,0 ) as total_use ,materialrequests.customer_id, materialrequestdetails.material_id , year(materialrequests.created_at) as year
            from   `materialrequests`
            inner join `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 

            where materialrequestdetails.material_id = ".$_GET['id']." and `materialrequests`.`import_status` > 1  
            group by materialrequests.customer_id , materialrequestdetails.material_id , year(materialrequests.created_at)  ) AS Imported 
            ON Quota.`year` = Imported.`year` AND Quota.customer_id = Imported.customer_id   ";
            
             $Aquota=DB::select( DB::raw($sql) );
             return datatables($Aquota)->toJson();

    }

    //doubleshow

    public function doubleshow($cid,$mid)
    {
       $materils=Material::find($mid);
       $customers=Customer::find($cid);
       
        return view('admin.product.annualquota.doubleshow',compact('materils','customers'));
    }

    public function doubledatatable()
    {
          $sqls = "  select materialrequestdetails.quantity ,materialrequests.customer_id, materialrequestdetails.material_id , import_date , materials.substance , materialrequests.id, year(materialrequests.created_at) as year , materialrequests.import_status  ,materialrequests.request_no
            from   `materialrequests`
            inner join `materialrequestdetails`   on `materialrequestdetails`.`materialrequest_id` = `materialrequests`.`id` 
            inner join `materials` on `materials`.`id` = materialrequestdetails.material_id 
            inner join `customers` on `customers`.`id` = materialrequests.customer_id 
            where materialrequestdetails.material_id = ".$_GET['mid']." and `materialrequests`.`import_status` > 1 AND 
             materialrequests.customer_id =  " .$_GET['cid'];
            
             $Aquota=DB::select( DB::raw($sqls) );
             return datatables($Aquota)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aquotas = Aquota::find($id);
        /*$year = $aquotas->year;
        $material_id = $aquotas->material_id;
        DB::statement(DB::raw('set @rownum=0'));
        $customers = Quotarequest::join('customers', 'quotarequests.customer_id','=','customers.id')
                ->join('quotarequestdetails', 'quotarequests.id','=','quotarequestdetails.quotarequest_id')
             
                ->select( DB::raw('@rownum  := @rownum  + 1 AS rownum'),'quotarequestdetails.material_id',DB::raw('sum(quotarequestdetails.amount) AS total')  ,'customers.company_name' ,'customers.id'  )
                ->groupBy('quotarequestdetails.material_id','quotarequests.year', 'customers.company_name','customers.id' )              
                ->where('quotarequestdetails.material_id', $material_id)
                ->where('quotarequests.year', $year)
                ->get();
                */
       // $customer=Customer::select('company_name','id')->get();
         return view('admin.product.annualquota.edit', compact('aquotas'));
    }

   
    public function update(Request $request, $id)
    {
        //
             $aquotas = Aquota::find($id);
             $aquotas->amount = $request->input('avaliable');
             $aquotas->save();
             /* foreach($request->input('customer_id') as $index=>$value){
                    $aquotas->comquotas()->updateOrCreate(
                        ['customer_id' => $value],
                        [ 'amount' => $request->qty[$index] , 'customer_id' => $value ]
                    );
                }
            */
           return redirect()->action('AnnualQuotaController@index')->with('success', 'Quota Assign successfully !!');

    }




    public function exist($material_id,$year)
    {
        if (Aquota::where(['material_id'=>$material_id,'year'=>$year])->exists()) {
            return true; 
        }else{
            return false;
        }
    }

    public function quotacompany(){
            return view('admin.product.annualquota.quotacompany');
    }

    public function quotacompanydata(){
         $quota = Aquota::join('comquotas','aquotas.id', '=', 'comquotas.aquota_id')
                 ->join('customers','comquotas.customer_id','=','customers.id')
                 ->select('company_name','aquotas.year', DB::raw('sum(comquotas.amount) AS Total'),'customer_id' )
                 ->groupBy('comquotas.customer_id','aquotas.year')
                 ->get();
                  return datatables($quota)->toJson();
    }

    public function detail($id,$year){

        $customers=Customer::find($id);
        $law = Law::find(1);
        $quota = Aquota::join('comquotas','aquotas.id', '=', 'comquotas.aquota_id')
                 //->join('customers','comquotas.customer_id','=','customers.id')
                 ->where('comquotas.customer_id', $id)          
                 ->where('year',$year)
                 ->join('materials','materials.id','=','aquotas.material_id')
                 ->get();
        $year_show =  $this->convert_to_kh_number($year);
        return view('admin.product.annualquota.detail',compact('quota','customers','law','year_show','year'));
    }

     public function print($id,$year){

        $customers=Customer::find($id);
        $law = Law::find(1);
        $quota = Aquota::join('comquotas','aquotas.id', '=', 'comquotas.aquota_id')
                 //->join('customers','comquotas.customer_id','=','customers.id')
                 ->where('comquotas.customer_id', $id)          
                 ->where('year',$year)
                 ->join('materials','materials.id','=','aquotas.material_id')
                 ->get();
        $year_show =  $this->convert_to_kh_number($year);
        return view('admin.product.annualquota.print',compact('quota','customers','law','year_show'));
    }

    private function convert_to_kh_number($string) {
   // $num = range(0, 9);
    $eng = ['1', '2', '3', '4', '5', '6', '7', '8', '9','0'];
    $kh = ['១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '០'];

    
    $persianNumbersOnly = str_replace($eng, $kh, $string);

    return $persianNumbersOnly;
}
}
