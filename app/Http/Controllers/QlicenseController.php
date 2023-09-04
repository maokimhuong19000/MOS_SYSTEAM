<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DOMDocument;
use App\Qlicense;
use App\Qldetail;
use App\Customer;
use App\Law;
use View;

class QlicenseController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:license.quota.view',['only' => ['index']]);
        $this->middleware('permission:license.quota.download',['only' => ['word']]);
    }

     public function index()
    {

        return view('admin.qlicense.index');
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

    public function getdatatables(){


         $qlicense = Qlicense::join('qldetails','qlicenses.id', '=', 'qldetails.qlicense_id')
                 ->join('customers','qlicenses.customer_id','=','customers.id')
                 ->select('qlicenses.id','no','company_name','qlicenses.year', DB::raw('sum(qldetails.amount) AS Total') )
                 ->groupBy('qlicenses.id','company_name','qlicenses.year','no')
                 ->get();
                  return datatables($qlicense)->toJson();
         
    }

    public function show($id){

        
        $law = Law::all();
        $quota = Qlicense::join('qldetails','qlicenses.id', '=', 'qldetails.qlicense_id')  
                 ->join('materials','materials.id','=','qldetails.material_id')                  
                 ->where('qlicenses.id', $id)          
                 ->get();
        $year_show =  $this->convert_to_kh_number($quota[0]->year);
        $customers=Customer::find($quota[0]->customer_id);
        $city = $this->city_province($customers->city);
        return view('admin.qlicense.show',compact('quota','customers','law','year_show','city'));

       // echo json_encode($quota);

    }

    public function word($id){
        $law = Law::find(1);
        $quota = Qlicense::join('qldetails','qlicenses.id', '=', 'qldetails.qlicense_id')  
                 ->join('materials','materials.id','=','qldetails.material_id')                  
                 ->where('qlicenses.id', $id)          
                 ->get();
        $year_show =  $this->convert_to_kh_number($quota[0]->year);
        $customers=Customer::find($quota[0]->customer_id);


         $content = view('admin.qlicense.word',compact('quota','customers','law','year_show'))->render();
         $phpWord = new \PhpOffice\PhpWord\PhpWord();
         libxml_use_internal_errors(true);        
         $section = $phpWord->addSection();
        $section->addText("");       

            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, false, false);

            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save(storage_path('quota.docx'));



        return redirect()->download(storage_path('quota.docx'));

    }

    public function print($id){
    	$law = Law::find(1);
        $quota = Qlicense::join('qldetails','qlicenses.id', '=', 'qldetails.qlicense_id')  
                 ->join('materials','materials.id','=','qldetails.material_id')                  
                 ->where('qlicenses.id', $id)          
                 ->get();
        $year_show =  $this->convert_to_kh_number($quota[0]->year);
        $customers=Customer::find($quota[0]->customer_id);
        return view('admin.qlicense.print',compact('quota','customers','law','year_show'));
        //echo json_encode($quota);
    }

   private function convert_to_kh_number($string) {
   // $num = range(0, 9);
    $eng = ['1', '2', '3', '4', '5', '6', '7', '8', '9','0'];
    $kh = ['១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩', '០'];

    
    $persianNumbersOnly = str_replace($eng, $kh, $string);

    return $persianNumbersOnly;
    }


}
