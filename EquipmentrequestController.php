<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Equipmentrequest;
use App\Equipmentrequestdetail;
use App\Equipment;
use App\Customer;
use App\Ifees;
use App\Law;
use App\Paideq;
use App\User;
use Mail;
use Auth;
use DOMDocument;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
class EquipmentrequestController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:equipmentrequest.view',['only' => ['index']]);
        $this->middleware('permission:equipmentrequest.check',['only' => ['check']]);
        $this->middleware('permission:equipmentrequest.verify',['only' => ['verify']]);
        $this->middleware('permission:equipmentrequest.approve',['only' => ['approve']]);
        $this->middleware('permission:equipmentrequest.finalize',['only' => ['finalize']]);
        $this->middleware('permission:equipmentrequest.reject',['only' => ['reject']]);
        $this->middleware('permission:license.equipment.view',['only' => 'license']);
        $this->middleware('permission:license.equipment.download',['only' => 'word']);


    }
     private function convert_to_kh_number($string) {
   // $num = range(0, 9);
    $eng = ['1', '2', '3', '4', '5', '6', '7', '8', '9','0'];
    $kh = ['១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '០'];

    
    $persianNumbersOnly = str_replace($eng, $kh, $string);

    return $persianNumbersOnly;
    }

    private function city_province($city_id){

      $city = ['សង្កាត់','ខណ្ឌ','រាជធានី',];
      $province = ['ឃុំ','ស្រុក','ខេត្',];

      if($city_id =="ភ្នំពេញ/ Phnom Penh"){
        return $city;
      }else{
        return $province;
      }


    }

     private function convert_to_kh_month($string) {
   // $num = range(0, 9);
    $eng = ['01', '02', '03', '04', '05', '06', '07', '08', '09','10','11','12'];
    $kh = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា' , 'កក្តដា', 'សីហា' , 'កញ្ញា', 'តុលា' , 'វិច្ឆកា' , 'ធ្នូ' ];

    
    $persianNumbersOnly = str_replace($eng, $kh, $string);

    return $persianNumbersOnly;
    }
    public function license(){
      return view('admin.elicense.index');
    }

    public function getldatatables()
    {
       $equipmentrequest=Equipmentrequest::join('customers', 'equipmentrequests.customer_id' , '=','customers.id')
                        ->join('equipmentrequestdetails' , 'equipmentrequests.id' , '=','equipmentrequestdetails.equipmentrequest_id')
                        ->select( 'company_name','equipmentrequests.id', DB::raw('sum(equipmentrequestdetails.amount) AS Total'),'customer_id','import_status','import_date','equipmentrequests.created_at', 'request_no' )
                         ->groupBy('company_name','equipmentrequests.id','customer_id','import_status','import_date','equipmentrequests.created_at', 'request_no')
                         ->where('equipmentrequests.import_status', '>=', 2 )->get();
         return datatables::of($equipmentrequest)->make(true);
      
    } 

    public function show($id){
      $isubdetail=Equipmentrequest::with(['Country','mCountry','Customer'])->find($id);
      $law = Law::all();
      $year_show =  $this->convert_to_kh_number(date("Y"));
      $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));
      $city = $this->city_province($isubdetail->Customer->city);
      $equipment = $isubdetail->Equipmentrequestdetail()->with('Equipment')->get()->groupBy('equipment_id');

      return view('admin.elicense.show',compact('isubdetail','law','year_show','request_date','city','equipment'));

    } 

    public function word($id){


      $isubdetail=Equipmentrequest::with(['Equipmentrequestdetail.Equipment','Country','mCountry','Customer'])->find($id);
      $law = Law::find(1);
      $year_show =  $this->convert_to_kh_number(date("Y"));
      $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));
      $content = view('admin.elicense.word',compact('isubdetail','law','year_show','request_date'))->render();
      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      libxml_use_internal_errors(true);
        
             $section = $phpWord->addSection();
             $section->addText("");
        

            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, false , false );
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save(storage_path('equipment.docx'));



        return response()->download(storage_path('equipment.docx'));
    }  


    public function index()
    {
    	return view('admin.equipmentrequest.index');
    }

    public function get_datatables()
    {
    	         //DB::statement(DB::raw('set @rownum=0'));
         $equipmentrequest=Equipmentrequest::join('customers', 'equipmentrequests.customer_id' , '=','customers.id')
                        ->join('equipmentrequestdetails' , 'equipmentrequests.id' , '=','equipmentrequestdetails.equipmentrequest_id')
                        ->select( 'company_name','equipmentrequests.id', DB::raw('sum(equipmentrequestdetails.amount) AS Total'),'customer_id','import_status','import_date','equipmentrequests.created_at', 'request_no' )
                         ->groupBy('company_name','equipmentrequests.id','customer_id','import_status','import_date','equipmentrequests.created_at', 'request_no')
                         ->get();
         return datatables::of($equipmentrequest)->make(true);               
    }


    public function showdetail($id)
    {
    	$Equipmentrequest=Equipmentrequest::with('Equipmentrequestdetail.Equipment')->find($id);
      $total_qty = Equipmentrequest::join('equipmentrequestdetails','equipmentrequests.id', '=', 'equipmentrequestdetails.equipmentrequest_id')
                 ->select( DB::raw('sum(equipmentrequestdetails.amount) AS total') )
                 ->where('equipmentrequests.id', '=',$id)
                 ->first();
      $total_z = Ifees::get_fee_equipment($total_qty->total);
    	return view('admin.equipmentrequest.showdetail',compact('Equipmentrequest','total_z'));
    }

    public function viewcustom($id){
      $idata=Equipmentrequest::find($id);
      return view('admin.equipmentrequest.viewcustom', compact('idata'));

    }


    public function check($id){

      $isubdetail=Equipmentrequest::find($id);
      $isubdetail->astatus = 1;
      $isubdetail->checker = Auth::id();
      $isubdetail->save(); 
      $customer = Customer::find($isubdetail->customer_id);
      $isubdetail=Equipmentrequest::with(["Checker"])->find($id);

       $answer = "Request Import Equipment has been checked by ".$isubdetail->Checker->name;
       $title_kh ="សំនើសុំនាំចូលបរិក្ខារ ត្រូវបានត្រួតពិនិត្យរួចរាល់ / Request Import Equipment has been checked " ;

       $users = User::all(); // condition admin user only verify 

      foreach ($users  as $user) {
          if ($user->hasAnyPermission(25))
          {
              Mail::send('emails.equipment_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($user)  {
                  $m->from('developer@cems10.com', "MOE Mail Auto System");

                  $m->to( $user->email, $user->name)->subject("Request Import Equipment has been checked  ");

              });
          }

      }
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', ' Request have been checked !!');
  


    }

    public function verify($id){

      $isubdetail=Equipmentrequest::find($id);
      $isubdetail->astatus = 2;
      $isubdetail->verifier = Auth::id();
      $isubdetail->save(); 
      $customer = Customer::find($isubdetail->customer_id);

       $isubdetail=Equipmentrequest::with(["Verifier"])->find($id);
       $answer = "Request Import Equipment has been verified by ".$isubdetail->Verifier->name;
       $title_kh ="សំនើសុំនាំចូលបរិក្ខារ ត្រូវបានផ្ទៀងផ្ទាត់រួចរាល់ / Request Import Equipment has been verified " ;

       $users = User::all(); // condition admin user only approved
       foreach ($users  as $user) {
           if ($user->hasAnyPermission(26))
           {
               Mail::send('emails.equipment_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($user)  {
                   $m->from('developer@cems10.com', "MOE Mail Auto System");

                   $m->to( $user->email, $user->name)->subject("Request Import Equipment has been checked by ");

               });
           }

       }
        return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', ' Request have been verified !!');

    }

    private function countLicense(){

      $result = 1;
      //$countisub = Materialrequestdetail::where('disabled','0')->count();
    
      // $countisub = DB::table('materialrequests as m')
      //              ->join('materialrequestdetails as md', 'm.id', '=', 'md.materialrequest_id')
      //              ->where('m.import_status','>=', 2)            
      //              ->whereNotNull('m.licence_no')
      //              ->count();
    
       $countiequ = Equipmentrequest::where('import_status','>',0)->count();
      //$countiequ = Equipmentrequestdetail::where('disabled','0')->count();
      //  $countiequ = DB::table('equipmentrequests as m')
      //              ->join('equipmentrequestdetails as md', 'm.id', '=', 'md.equipmentrequest_id')
      //              ->where('m.import_status', 2)

      //              ->count();
      return ($result + $countiequ  );
    
    }

    public function approve($id){

      $isubdetail=Equipmentrequest::find($id);
      $total_qty = Equipmentrequest::join('equipmentrequestdetails','equipmentrequests.id', '=', 'equipmentrequestdetails.equipmentrequest_id')
                 ->select( DB::raw('sum(equipmentrequestdetails.amount) AS total') )
                 ->where('equipmentrequests.id', '=',$id)
                 ->first();

      $total_z = Ifees::get_fee_equipment($total_qty->total);

      $pad_length = 3;
      $pad_char = 0;

      $strL = str_pad($this->countLicense() , $pad_length, $pad_char, STR_PAD_LEFT);
      $isubdetail->licence_no = "PRT".date("Y").date("m").date("d")."SGDEPE".$strL ; //20221029GDEP000003
      //$isubdetail->import_status = 2;
      $isubdetail->Approver =Auth::id();
      $isubdetail->save(); 

      $paidm = new Paideq ;
      $paidm->customer_id = $isubdetail->customer_id;
      $paidm->equipmentrequest_id = $isubdetail->id;
      $paidm->fee =  $total_z[0];
      $paidm->save();

       $customer = Customer::find($isubdetail->customer_id);

       $answer = "Request Import Equipment Approved";
       $title_kh ="សំនើសុំនាំចូលបរិក្ខាត្រូវបានអនុញ្ញាតិ។ សូមមកទទួលលិខិតអនុញ្ញាតិនៅក្រសួងបរិស្ថាន/ Request Import Equipment Approved. Come to get Licence at Ministry" ;

       Mail::send('emails.equipment_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Request Import Equipment Approved");

             });

     //return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', ' Request have been approved !!');
     return redirect()->action('ApiController@sendequipment',$id);
    
    }

    public function reject($id){

      $isubdetail=Equipmentrequest::find($id);
      // $isubdetail->import_status = 1;
      // $isubdetail->rejecter =Auth::id();
     // $isubdetail->save(); 

       $customer = Customer::find($isubdetail->customer_id);

        $answer = "Request Import Equipment Recjected";
        $title_kh ="សំនើសុំនាំចូលបរិក្ខា ត្រូវបានបដិសេដ​/Request Import Equipment Recjected" ;

       Mail::send('emails.equipment_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Request Import Equipment Recjected");

             });
             return redirect()->action('ApiController@cancelequipment',$id);
      //return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', ' Request have been rejected !!');
    }

    public function finalize($id){

      $isubdetail=Equipmentrequest::find($id);
      // $isubdetail->import_status = 3;
      // $isubdetail->finalizer =Auth::id();
      // $isubdetail->save(); 

      $customer = Customer::find($isubdetail->customer_id);

        $answer = "Request Import Equipment Finished.You can Request Other Equipment";
                        $title_kh ="សំនើសុំនាំចូលបរិក្ខារ ត្រូវបានបិទបញ្ចប់។ លោកអ្នកអាច ស្នើនាំចូលផ្សេងទៀតបាន/Request Import Equipment Finished.You can Request Other Equipment" ;

       Mail::send('emails.equipment_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Request Import Equipment Finished.You can Request Other Equipment");

             });
     // return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', ' Request have been finalized  !!');
     return redirect()->action('ApiController@getequipment',$id);
    }

    public function printv($id){

      $isubdetail=Equipmentrequest::with(['Equipmentrequestdetail.Equipment','Country','mCountry','Customer'])->find($id);
      $law = Law::find(1);
      $year_show =  $this->convert_to_kh_number(date("Y"));
      $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));

      return view('admin.equipmentrequest.printv',compact('isubdetail','law','year_show','request_date'));
     
    }

    public function print($id){

       $isubdetail=Equipmentrequest::with(['Equipmentrequestdetail.Equipment','Country','mCountry','Customer'])->find($id);
      $law = Law::find(1);
       $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));
      $year_show =  $this->convert_to_kh_number(date("Y"));
      return view('admin.equipmentrequest.print',compact('isubdetail','law','year_show','request_date'));
     
    }
//    ===================Request=========================
    public function re_equipment($id)
    {
        $isubdetail=Equipmentrequest::with(['Equipmentrequestdetail.Equipment','Country','mCountry','Customer'])->find($id);
        $law = Law::find(1);
        $year_show = $this->convert_to_kh_number(date("Y"));
        $isub_date = strtotime($isubdetail->created_at);
        $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
        $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
        $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));

        return view('admin.equipmentrequest.erequest',compact('isubdetail','law','year_show','request_date'));
    }
    public function reword($id){


        $isubdetail=Equipmentrequest::with(['Equipmentrequestdetail.Equipment','Country','mCountry','Customer'])->find($id);
        $law = Law::find(1);
        $year_show = $this->convert_to_kh_number(date("Y"));
        $isub_date = strtotime($isubdetail->created_at);
        $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
        $request_date["month"] =$this->convert_to_kh_month(date("m",$isub_date));
        $request_date["year"] =$this->convert_to_kh_number(date("Y",$isub_date));
        $content = view('admin.equipmentrequest.word',compact('isubdetail','law','year_show','request_date'))->render();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        libxml_use_internal_errors(true);

        $section = $phpWord->addSection();
        $section->addText("");


        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, false , false );
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('equipment.docx'));



        return response()->download(storage_path('equipment.docx'));
    }

}
