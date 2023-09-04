<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Materialrequest;
use App\Materialrequestdetail;
use App\Material;
use App\Customer;
use App\Ifees;
use App\Law;
use App\Paidm;
use App\User;
use DOMDocument;
use Mail;
use Auth;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
class MaterialrequestController extends Controller
{

  
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:materialrequest.check', ['only' => ['check']]);
        $this->middleware('permission:materialrequest.verify', ['only' => ['verify']]);
        $this->middleware('permission:materialrequest.approve', ['only' => ['approve']]);
        $this->middleware('permission:materialrequest.reject',['only' => ['reject']]);
        $this->middleware('permission:materialrequest.finalize', ['only' => ['finalize']]);
        $this->middleware('permission:materialrequest.view',['only' => ['Materialequest','getldatatables','Materialrequest_detail']]);
        $this->middleware('permission:license.substance.download',['only' => ['word']]);
        $this->middleware('permission:license.substance.view',['only' => ['license','show']]);
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
    $kh = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា' , 'កក្តដា', 'សីហា' , 'កញ្ញា', 'តុលា' , 'វិច្ឆកា' , 'ធ្នូ' ];

    
    $persianNumbersOnly = str_replace($eng, $kh, $string);

    return $persianNumbersOnly;
    }

    public function license(){
      return view('admin.mlicense.index');
    }

    public function getldatatables()
    {
       $quota = Materialrequest::join('materialrequestdetails','materialrequests.id', '=', 'materialrequestdetails.materialrequest_id')
                 ->join('customers','materialrequests.customer_id','=','customers.id')
                 ->select('company_name','materialrequests.id', DB::raw('sum(materialrequestdetails.quantity) AS Total'),'customer_id','import_status','import_date', 'request_no' )
                 ->where("materialrequests.import_status" , ">=" , 2)
                 ->groupBy('company_name','materialrequests.id','customer_id','import_status','import_date', 'request_no')
                 ->where('materialrequests.import_status' ,'>=',2 )->get();
                  return datatables($quota)->toJson();
      
    } 

    public function show($id){
         $law = Law::all();
      $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Country','mCountry','Customer'])->find($id);
      $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));
        $city = $this->city_province($isubdetail->Customer->city);


      $year_show =  $this->convert_to_kh_number(date("Y"));
      return view('admin.mlicense.show',compact('isubdetail','law','year_show' ,'request_date','city' ));


    }


    public function word($id){


      $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Country','mCountry','Customer'])->find($id);
        $law = Law::find(1);
        $year_show =  $this->convert_to_kh_number(date("Y"));
      $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));




      $content = view('admin.mlicense.word',compact('isubdetail','law','year_show' ,'request_date' ))->render();
         $phpWord = new \PhpOffice\PhpWord\PhpWord();
        libxml_use_internal_errors(true);

        $section = $phpWord->addSection();
        $section->addText("");


            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, false , false);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//            $objWriter->save(storage_path('/webhost/epa.moe.gov.kh/public_html/public/licence/storage/material.docx'));
            $objWriter->save(storage_path('app\public\material.docx'));


        return response()->download(storage_path('material.docx'));
    }  



    public function Materialequest()
    {
    	return view('admin.materialrequest.index');
    }

    public function getdatatables()
    {
    	 $quota = Materialrequest::join('materialrequestdetails','materialrequests.id', '=', 'materialrequestdetails.materialrequest_id')
                 ->join('customers','materialrequests.customer_id','=','customers.id')
                 ->select('company_name','materialrequests.id', DB::raw('sum(materialrequestdetails.quantity) AS Total'),'customer_id','import_status','import_date', 'request_no' )
                 ->groupBy('company_name','materialrequests.id','customer_id','import_status','import_date', 'request_no')
                 ->get();
                  return datatables($quota)->toJson();
    	// dump($materialrequest);
    }

    public function Materialrequest_detail($id)
    {
    	$isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Port_Entries','Country','mCountry','Customer.cominfo' ,'Iladings' , "Ipackinglists","Iinvoices","Checker" , "Verifier", "Approver", "Finalizer"])->find($id);
      $total_qty = Materialrequest::join('materialrequestdetails','materialrequests.id', '=', 'materialrequestdetails.materialrequest_id')
                 ->select( DB::raw('sum(materialrequestdetails.quantity) AS total') )
                 ->where('materialrequests.id', '=',$id)
                 ->first();
      $total_z = Ifees::get_fee_material($total_qty->total);
    	return view('admin.materialrequest.materialrequest_detail',compact('isubdetail','total_z'));
      //echo json_encode($isubdetail);
    	
    }

    public function viewcustom($id){
      $idata=Materialrequest::find($id);
      return view('admin.materialrequest.viewcustom', compact('idata'));

    }

    public function check($id){

      $isubdetail=Materialrequest::find($id);
      $isubdetail->astatus = 1;
      $isubdetail->checker = Auth::id();
      $isubdetail->save(); 
      $customer = Customer::find($isubdetail->customer_id);
      $isubdetail=Materialrequest::with(["Checker"])->find($id);

       $answer = "Request Import Substances has been checked by ".$isubdetail->Checker->name;
       $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានត្រួតពិនិត្យរួចរាល់ / Request Import Substances has been checked " ;

       $users = User::all(); // condition admin user only verify 

      foreach ($users  as $user) {
          if ($user->hasAnyPermission(14)) {
              Mail::send('emails.substance_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($user)  {
                  $m->from('developer@cems10.com', "MOE Mail Auto System");

                  $m->to( $user->email, $user->name)->subject("Request Import Substances has been checked  ");

              });
          }
      }


    return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been checked !!');
  


    }

    public function verify($id){

      $isubdetail=Materialrequest::find($id);
      $isubdetail->astatus = 2;
      $isubdetail->verifier = Auth::id();
      $isubdetail->save(); 
      $customer = Customer::find($isubdetail->customer_id);

       $isubdetail=Materialrequest::with(["Verifier"])->find($id);
       $answer = "Request Import Substances has been verified by ".$isubdetail->Verifier->name;
       $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានផ្ទៀងផ្ទាត់រួចរាល់ / Request Import Substances has been verified " ;

       $users = User::all(); // condition admin user only approved
       foreach ($users  as $user) {
           if ($user->hasAnyPermission(15)){
               Mail::send('emails.substance_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($user)  {
                   $m->from('developer@cems10.com', "MOE Mail Auto System");

                   $m->to( $user->email, $user->name)->subject("Request Import Substances has been verified ");

               });
           }
       }

        return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been verified !!');

    }

    private function countLicense(){

      $result = 1;
      //$countisub = Materialrequestdetail::where('disabled','0')->count();
    
      $countisub = DB::table('materialrequests as m')
                   ->join('materialrequestdetails as md', 'm.id', '=', 'md.materialrequest_id')
                   ->where('m.import_status','>=', 1)            
                   ->whereNotNull('m.licence_no')
                   ->count();
    
      //  $countiequ = Equipmentrequest::where('import_status','>=',2)->count();
      // //$countiequ = Equipmentrequestdetail::where('disabled','0')->count();
      //  $countiequ = DB::table('equipmentrequests as m')
      //              ->join('equipmentrequestdetails as md', 'm.id', '=', 'md.equipmentrequest_id')
      //              ->where('m.import_status', 2)

      //              ->count();
      return ($result + $countisub  );
    
    }
    

    public function approve($id){

      $isubdetail=Materialrequest::find($id);
      $total_qty = Materialrequest::join('materialrequestdetails','materialrequests.id', '=', 'materialrequestdetails.materialrequest_id')
                 ->select( DB::raw('sum(materialrequestdetails.quantity) AS total') )
                 ->where('materialrequests.id', '=',$id)
                 ->first();

      $total_z = Ifees::get_fee_material($total_qty->total);
      //$isubdetail->import_status = 2;
      $pad_length = 3;
      $pad_char = 0;

      $strL = str_pad($this->countLicense() , $pad_length, $pad_char, STR_PAD_LEFT);
      $isubdetail->licence_no = "PRT".date("Y").date("m").date("d")."SGDEPS".$strL ; //20221029GDEP000003
      $isubdetail->Approver =Auth::id();
      $isubdetail->save(); 

      $paidm = new Paidm ;
      $paidm->customer_id = $isubdetail->customer_id;
      $paidm->materialrequest_id = $isubdetail->id;
      $paidm->fee =  $total_z[0];
      $paidm->save();
      $customer = Customer::find($isubdetail->customer_id);

       $answer = "Request Import Substances Approved";
       $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានអនុញ្ញាតិ។ លោកអ្នកអាចទាញយកលិខិតអនុញ្ញាតិ/ Request Import Substances Approved. Application is avaible for Downloaded" ;

       Mail::send('emails.substance_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Request Import Substances Approved");

             });
    
       // return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been approved !!');
       return redirect()->action('ApiController@send',$id);
     
    }

    public function reject($id){

      $isubdetail=Materialrequest::find($id);
      // $isubdetail->import_status = 1;
      // $isubdetail->rejecter =Auth::id();
      // $isubdetail->save(); 
       $customer = Customer::find($isubdetail->customer_id);

        $answer = "Request Import Substances Recjected";
        $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានបដិសេដ​/Request Import Substances Recjected" ;

       Mail::send('emails.substance_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Request Import Substances Recjected");

             });
             return redirect()->action('ApiController@cancel',$id);
     // return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been rejected !!');
    }

    public function finalize($id){

      $isubdetail=Materialrequest::find($id);
      $customer = Customer::find($isubdetail->customer_id);

        $answer = "Request Import Substances Finished.";
                        $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានបិទបញ្ចប់។ /Request Import Substances Finished." ;

       Mail::send('emails.substance_touser',   [ 'customer' => $customer , 'request' => $isubdetail,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Application have been Export");

             });
     //return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been finalized  !!');
     return redirect()->action('ApiController@get',$id);
     
    }

    // public function printv($id){

    //   $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Country','mCountry','Customer'])->find($id);
    //    $isub_date = strtotime($isubdetail->created_at);
    //   $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
    //   $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
    //   $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));

    //   $law = Law::find(1);
      
    //   $year_show =  $this->convert_to_kh_number(date("Y"));
    //   return view('admin.materialrequest.printv',compact('isubdetail','law','year_show' ,'request_date' ));
     
    // }

    public function print($id){

       $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Country','mCountry','Customer'])->find($id);
       $isub_date = strtotime($isubdetail->created_at);
      $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
      $request_date["month"] = $this->convert_to_kh_month(date("m",$isub_date));
      $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));
      $city = $this->city_province($isubdetail->Customer->city);

      $law = Law::all();
      
      $year_show =  $this->convert_to_kh_number(date("Y"));
      return view('admin.mlicense.print',compact('isubdetail','law','year_show' ,'request_date','city'));
     
    }
    public function print_request ($id)
    {
        $law = Law::find(1);
        $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Country','mCountry','Customer'])->find($id);
        $isub_date = strtotime($isubdetail->created_at);
        $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
        $request_date["month"] =$this->convert_to_kh_month(date("m",$isub_date));
        $request_date["year"] =$this->convert_to_kh_number(date("Y",$isub_date));



        $year_show = $this->convert_to_kh_number(date("Y"));
        return view('admin.materialrequest.mrequest',compact('isubdetail','law','year_show' ,'request_date'));
    }
    public function rmword($id){


        $isubdetail=Materialrequest::with(['Materialrequestdetails.Material','Country','mCountry','Customer'])->find($id);
        $law = Law::find(1);
        $year_show = $this->convert_to_kh_number(date("Y"));
        $isub_date = strtotime($isubdetail->created_at);
        $request_date["day"] = $this->convert_to_kh_number(date("d" ,$isub_date));
        $request_date["month"] =$this->convert_to_kh_month (date("m",$isub_date));
        $request_date["year"] = $this->convert_to_kh_number(date("Y",$isub_date));

        $content = view('admin.materialrequest.word',compact('isubdetail','cominfos','law','year_show' ,'request_date' ))->render();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        libxml_use_internal_errors(true);

        $section = $phpWord->addSection();
        $section->addText("");


        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, false , false);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('app\public\material.docx'));

        return response()->download(storage_path('material.docx'));

    }

    private function mailuser($customer, $request,$status){

        // $users = User::all(); // condition permission 
        $answer = "";
        $title_kh ="" ; 
                    switch( $status ) {
                      case 1: 
                        $answer = "Request Import Substances Recjected";
                        $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានបដិសេដ​/Request Import Substances Recjected" ;
                        break;
                      case 2: 
                        $answer = "'Request Import Substances Approved";
                        $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានអនុញ្ញាតិ។ សូមមកទទួលលិខិតអនុញ្ញាតិនៅ ក្រសួងបរិស្ថាន/ Request Import Substances Approved. Come to get Licence at Ministry" ;
                        break;
                      case 3: 
                        $answer = "Request Import Substances Finished.You can Request Other substances";
                        $title_kh ="សំនើសុំនាំចូលសារធាតុ ត្រូវបានបិទបញ្ចប់។ លោកអ្នកអាច ស្នើនាំចូលផ្សេងទៀតបាន/Request Import Substances Finished.You can Request Other substances" ;
                        break;
                     
                    }
                        return  $answer ; 

          Mail::send('emails.substance_touser',   [ 'customer' => $customer , 'request' => $request,'title_kh' => $title_kh,'answer'=> $answer  ], function ($m) use ($customer)  {
            $m->from('developer@cems10.com', "MOE Mail Auto System");

            $m->to( $customer->email, $customer->name)->subject("Request for Import Substance");
        });
    }



}
