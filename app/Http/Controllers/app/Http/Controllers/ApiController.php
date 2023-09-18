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
use App\Equipmentrequest;
use App\Equipmentrequestdetail;
use App\Gdc;
use App\Customdeclareation;
use App\Customdeclareationeq;
use Auth; 
use Validator;
class ApiController extends Controller
{

  //private $baseurl= "https://dev.nsw.gov.kh/";
 //private $baseurl= "http://10.70.1.31:8081/"; /// DEV
  //private $baseurl= "http://10.70.1.30:8081/"; /// UAT
  //private $baseurl= "https://10.70.0.29/"; /// live
  private $baseurl = "https://live.nsw.gov.kh/";
  private $grant_type = "password"; 
  private $username = "GDEP_USR_S2S";
  private $password = "Password123!";
  private $client_id = "MOE_NSW";
  //private $client_secret = "moe-nsw-secret-6d068820-a2d2-40fa-9b8d-42c144f14902";
  private $client_secret = "moe-nsw-secret-6tw1yw820-har21s7236d-t3627-u781-9j1abdjs76u-s2s-pro";
  
  public function __construct( ) {
     

  }

  private function linkcustom($id,$cdata){
    $isubdetail=Materialrequest::find($id);
    $isubdetail->Custom()->create($cdata);

  }

  private function linkcustomeq($id,$cdata){
    $isubdetail=Equipmentrequest::find($id);
    $isubdetail->Custom()->create($cdata);
  }
  private function updateLicense($id, $status){

    // if ($type==1){
      //$isubdetail=Materialrequest::find($id);
    // }else{
    //   $isubdetail=Equipmentrequest::find($id);
    // }
    $isubdetail=Materialrequest::find($id);
    $isubdetail->import_status = $status;
    $isubdetail->finalizer =Auth::id();
    $isubdetail->save(); 
  }

  private function updateLicensee($id, $status){

    $isubdetail=Equipmentrequest::find($id);
    $isubdetail->import_status = $status;
    $isubdetail->finalizer =Auth::id();
    $isubdetail->save(); 
  }

  public function log(){

    $curl = curl_init();
    curl_setopt_array($curl, array(
     // CURLOPT_URL => 'https://dev-cnsw.vcargocloud.com/nswGateway/api/v1/oauth/token',
      CURLOPT_URL => $this->baseurl.'nswGateway/api/v1/oauth/token',
      //CURLOPT_POSTFIELDS => $this->grant_type."&".$this->username."&".$this->password."&".$this->client_id."&".$this->client_secret,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'grant_type=password&username=PISITHVCC&password=Password123!&client_id=MOE_NSW&client_secret=moe-nsw-secret-6d068820-a2d2-40fa-9b8d-42c144f14902',
      CURLOPT_POSTFIELDS => 'grant_type='.$this->grant_type."&username=".$this->username."&password=".$this->password."&client_id=".$this->client_id."&client_secret=".$this->client_secret,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));
    
    $dd = curl_exec($curl);
    $response = json_decode(curl_exec($curl),true);
    
    curl_close($curl);
    //$conGDC = Gdc::create($response);
    
   echo $dd ;
      return $response;


  }

  private function token(){

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->baseurl.'nswGateway/api/v1/oauth/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
       // CURLOPT_POSTFIELDS => 'grant_type=password&username=PISITHVCC&password=Password123!&client_id=MOE_NSW&client_secret=moe-nsw-secret-6d068820-a2d2-40fa-9b8d-42c144f14902',
       CURLOPT_POSTFIELDS => 'grant_type='.$this->grant_type."&username=".$this->username."&password=".$this->password."&client_id=".$this->client_id."&client_secret=".$this->client_secret,
       CURLOPT_HTTPHEADER => array(
          'Content-Type: application/x-www-form-urlencoded'
        ),
      ));
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      $conGDC = Gdc::create(json_decode($response,true));
      
     
        return json_decode($response);


    }

    private function checkExpiredToken(){
      $conGDC = Gdc::all()->last();
      if ($conGDC){
        $conCreatedTime = strtotime($conGDC->created_at);
        $conExpiredTime = date('Y-m-d H:i:s', $conCreatedTime + $conGDC->expires_in);
        $diff =   time() - strtotime($conExpiredTime);
        if ($diff <= 0){
          $result = $conGDC->access_token;
        }else{
          $newToken = $this->token();
          $result = $newToken->access_token;
        }

      }else{
        $newToken = $this->token();
        $result = $newToken->access_token;
      }
      return $result;

    }

private function genjson($id){

      $license = Materialrequest::find($id);
      $time = strtotime($license->updated_at);
      $final = date("Y-m-d", strtotime("+1 month", $time));
      $bill = date("Y-m-d", strtotime("-5 day", $time));
      $tin = str_replace("-","",$license->Customer->tin) ; //explode("-",$license->Customer->tin);
      $doct = $license->transit == 0 ? "GDEP-RP" : "GDEP-ODSP" ;
      $header = array(
         "lpco_doc_no" => $license->licence_no,
          "document_code"=>   $doct,
          "regime" =>  "IMPORT",
          "agency_office" => "",
          "document_approved_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($license->updated_at),
          "document_expiry_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($final),
          "applicant_vat"=> $tin,
      );
      $trader=array();    
      $address = $license->Customer->house.$license->Customer->street;
   
      $trader[]= array(
        "trader_type"=> "TTYP_IMPORTER",
        "trader_tin"=> $tin,
        "trader_name"=> $license->Customer->company_name,
        "address_one"=> $address,
        "address_two"=> $license->Customer->district,
        "address_three"=>$license->Customer->commune,
        "country_code"=> "KH",
      );

      $trader[]= array(
        "trader_type"=> "TTYP_EXPORTER",
        "trader_tin"=> "ACX000",
        "trader_name"=> $license->manufacture_name,
        "address_one"=>   (strlen($license->address) > 60) ? substr($license->address,0,60).'...' : $license->address, 
        "address_two"=> "",
        "address_three"=>"",
        "country_code"=> $license->Country->country_kh,
      );
      $transport = array(
        "mode_of_transport"=> $license->transport,
        "port_of_origin"=> "",//"DKFER",
        "port_of_discharge"=>$license->transit == 0 ? $license->Port_Entries->office_code : $license->des_port,//"CAYTU", 
        "port_of_transit"=>  $license->transit == 0 ? "" : $license->Port_Entries->office_code ,//"CAYTU",
        "port_of_loading"=> $license->place_export,//"CAYTU",
        "country_of_origin"=> "" ,//$license->mCountry->country_kh,//"DK",
        "country_of_discharge"=>$license->transit == 0 ?  "KH" : $license->Tcountry->country_kh ,//'KH',// $license->Country->country_kh , //"CA",
        "country_of_transit"=>$license->transit == 0 ? "" : "KH" , //"CA",
        "country_of_loading"=> $license->mCountry->country_kh, //"CA"
      );
      $invoiceExt[] = array(
        "invoice_number"=>$license->billnumber,
        "invoice_date"=> date("d/m/Y", strtotime($license->billdate)), // "07/11/23"
      ); 
      $invoiceValue = array(
          "incoterms"=> $license->incoterm,
          "currency"=> $license->currency,
          "exchange_rate"=> $license->exchange_rate,
          "invoice_value_local_currency"=> number_format(($license->invoice_value_other_currency*$license->exchange_rate),2 , '.', ''),
          "invoice_value_other_currency"=> number_format($license->invoice_value_other_currency,2 ,  '.', ''),
          "bill_number"=>  NULL,
          "bill_date"=> $bill,
          "invoice_ext"=>  $invoiceExt,
   
      );
      $payment_other = array(
        "application_lodgement_office"=> "",
        "customs_entry_exit_checkpoint_office"=> "",
        "customs_clearance_checkpoint_office"=> ""
      );

        $patentPath = $license->Customer->patent;
        $fileNameExtentionp = basename($patentPath);
        $filep =  explode(".",$fileNameExtentionp);
        $fileNamep = $filep[0];
        //$fileExtention = $file[1];
        $typep = pathinfo($patentPath, PATHINFO_EXTENSION);
        $datap = file_get_contents($patentPath);
        $base64p = 'data:image/' . $typep . ';base64,' . base64_encode($datap);  
      $supporting_docs[]= array(
          "doc_name"=> $fileNamep,
          "doc_type"=> "PATENT (VAT TIN)",
          "doc_ref"=> $license->Customer->patent_number,
          "doc_date"=> $license->Customer->patent_date,
          "doc_file"=> $base64p,
          "doc_extension"=> $typep,
          );
      $supporting_docs[]= array(
        "doc_name"=> $fileNamep,
        "doc_type"=> "CUSTOMS DECLARATION (IN CASE APPLY FOR SECOND SHIPMENT PROCESS)",
        "doc_ref"=> $license->Customer->patent_number,
        "doc_date"=> $license->Customer->patent_date,
        "doc_file"=> $base64p,
        "doc_extension"=> $typep,
        );
     
      foreach($license->Iinvoices as $invoice){
        $path = $invoice->file_path;
        $fileNameExtention = basename($path);
        $file =  explode(".",$fileNameExtention);
        $fileName = $file[0];
        //$fileExtention = $file[1];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        $supporting_docs[]= array(
        "doc_name"=> $fileName,
        "doc_type"=> "INVOICE",
        "doc_ref"=> $invoice->id,
        "doc_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($invoice->updated_at),
        "doc_file"=> $base64,
        "doc_extension"=> $type,
        );
      }

      foreach($license->Ipackinglists as $packing){
        $path = $packing->file_path;
        $fileNameExtention = basename($path);
        $file =  explode(".",$fileNameExtention);
        $fileName = $file[0];
        //$fileExtention = $file[1];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        $supporting_docs[]= array(
        "doc_name"=> $fileName,
        "doc_type"=> "PACKING LIST",
        "doc_ref"=> $packing->id,
        "doc_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($packing->updated_at),
        "doc_file"=> $base64,
        "doc_extension"=> $type,
        );
      }

      foreach($license->Iladings as $lading){
        $path = $lading->file_path;
        $fileNameExtention = basename($path);
        $file =  explode(".",$fileNameExtention);
        $fileName = $file[0];
        //$fileExtention = $file[1];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        $supporting_docs[]= array(
        "doc_name"=> $fileName,
        "doc_type"=> "BILL OF LANDING",
        "doc_ref"=> $lading->id,
        "doc_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($lading->updated_at),
        "doc_file"=> $base64,
        "doc_extension"=> $type,
        );
      }

      $material = $license->Materialrequestdetails;
      foreach($material as $index=>$value){
        $item[] = array(

          "item_reference"=> $value->id,
          "item_rank_no"=> $value->material_id,
          "customs_procedure_code"=> "",
          "hs_code"=> $value->Material->taxcode,
          "item_category_code"=> "",
          "commercial_description"=> $value->Material->com_name,
          "marks_description"=> "",
          "invoice_value"=>  $value->invoice_value ,
          "invoice_value_local"=> number_format($value->invoice_value*$license->exchange_rate,2,".",""),
          "quantity"=> number_format($value->number,2,".",""),
          "quantity_uom"=> $value->uom,
          "gross_weight"=>  $value->grossweight,
          "gross_weight_uom"=> "KGM",
          "net_weight"=> number_format($value->quantity,2),
          "net_weight_uom"=> "KGM",
          "no_packages"=> NULL,
          "no_packages_uom"=> NULL,
          "quota_issue_type"=> "QUO_VALUE"
        ); 
      }
      $postdata = array(
        'header' => $header,
        'trader' => $trader,
        "transport" => $transport,
        "value" => $invoiceValue,
        "items" => $item,
        "payment_other" => $payment_other,
        "supporting_docs"=> $supporting_docs,
      );

      return $postdata;

}
public function viewjsone($id){

  $postdata = $this->genjson_equipment($id);
  echo json_encode($postdata);
}

public function viewjson($id){

      $postdata = $this->genjson($id);
      echo json_encode($postdata);
}

    public function send($applicationID){
      $response = $this->checkExpiredToken();
      $curl = curl_init();
      $postdata = $this->genjson($applicationID);

      curl_setopt_array($curl, array(
      //  CURLOPT_URL => 'https://dev-cnsw.vcargocloud.com/nswGateway/api/v1/push/lpco',
        CURLOPT_URL => $this->baseurl.'nswGateway/api/v1/push/lpco',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($postdata),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.$response,
          'Cookie: JSESSIONID=F1FA0E573229C7D990C034839A802FF1.server1'
        ),
      ));
      $dd = curl_exec($curl);
      $responsedata =  json_decode($dd);
      curl_close($curl);

      echo json_encode($dd);

      if ($responsedata->status== 201){
        $this->updateLicense($applicationID,2);
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$applicationID)->with('success', 'PERMIT being review IN NSW');
      
      }elseif($responsedata->status == 400){

        return redirect()->action('MaterialrequestController@Materialrequest_detail',$applicationID)->with('danger', 'Internal Data Error:  '.json_encode($responsedata));
     
      }elseif($responsedata->status== 500){
        
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$applicationID)->with('danger', 'NSW Error: '.json_encode($responsedata));
      
      }else{
      
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$applicationID)->with('danger', 'Unknow Error: '.json_encode($responsedata) );
      
      }
       
     }


     public function get($id){

      $response = $this->checkExpiredToken();
      $curl = curl_init();
      $license = Materialrequest::find($id);
      $postdata = array(
        "lpco_ref_no" => $license->licence_no
      );

      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->baseurl .'nswGateway/api/v1/utilize/lpco',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS =>json_encode($postdata),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.$response,
          'Cookie: JSESSIONID=E943049D67E18317AEA2A232974646FD.server1'
        ),
      ));
      
 

      $dd = curl_exec($curl);
      $responsedata =  json_decode($dd);
      curl_close($curl);

      echo  ($dd);
      if ($responsedata->status== 200){
        $this->updateLicense($id,3);
        $cdata = ['content' => json_encode($responsedata->data)];
        
        $this->linkcustom($id,$cdata);
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', 'License is finished');
        //echo $dd;
      
      }elseif($responsedata->status == 404){
  
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('danger', 'Custom Declearation is not yet issue:  '.json_encode($responsedata));
     
      }elseif($responsedata->status== 500){
        
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('danger', 'NSW Error: '.json_encode($responsedata));
      
      }else{
      
        return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('danger', 'Unknow Error: '.json_encode($responsedata) );
      
      }
      
      
     }

     public function cancel($id){

      $response = $this->checkExpiredToken();
      $curl = curl_init();

      $license = Materialrequest::find($id);
      $postdata = array(
        "lpco_ref_no" => $license->licence_no
      );

      curl_setopt_array($curl, array(
       // CURLOPT_URL => 'https://dev-cnsw.vcargocloud.com/nswGateway/api/v1/cancel/lpco',
        CURLOPT_URL => $this->baseurl.'nswGateway/api/v1/cancel/lpco',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($postdata),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.$response ,
          'Cookie: JSESSIONID=E943049D67E18317AEA2A232974646FD.server1'
        ),
      ));
      
      $dd = curl_exec($curl);
      $responsedata =  json_decode($dd);
      curl_close($curl);

      echo  ($dd);
      //echo $response;
     // return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been cancel !!');
     if ($responsedata->status== 200){
      $this->updateLicense($id,1);
      return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', 'License is rejected');
    
    }elseif($responsedata->status == 404){
      $this->updateLicense($id,1);
      return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', 'Cancel success.Application not yet send to NSW  '.json_encode($responsedata));
   
    }elseif($responsedata->status == 400){

      return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('danger', 'Internal Data Error:  '.json_encode($responsedata));
   
    } elseif($responsedata->status== 500){
      
      return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('danger', 'NSW Error: '.json_encode($responsedata));
    
    }else{
    
      return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('danger', 'Unknow Error: '.json_encode($responsedata) );
    
    }
     }



     /////////////////Equipment////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////

     private function genjson_equipment($id){

      $license = Equipmentrequest::find($id);
      $time = strtotime($license->updated_at);
      $final = date("Y-m-d", strtotime("+1 month", $time));
      $bill = date("Y-m-d", strtotime("-5 day", $time));
      $tin = str_replace("-","",$license->Customer->tin) ; //explode("-",$license->Customer->tin);

      $header = array(
         "lpco_doc_no" => $license->licence_no,
          "document_code"=>  "GDEP-RACP",
          "regime" =>  "IMPORT",
          "agency_office" => "",
          "document_approved_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($license->updated_at),
          "document_expiry_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($final),
          "applicant_vat"=> $tin,
      );
      $trader=array();    
      $address = $license->Customer->house.$license->Customer->street;
   
      $trader[]= array(
        "trader_type"=> "TTYP_IMPORTER",
        "trader_tin"=> $tin,
        "trader_name"=> $license->Customer->company_name,
        "address_one"=> $address,
        "address_two"=> $license->Customer->district,
        "address_three"=>$license->Customer->commune,
        "country_code"=> "KH",
      );
      $trader[]= array(
        "trader_type"=> "TTYP_EXPORTER",
        "trader_tin"=> "ACX000",
        "trader_name"=> $license->manufacture_name,
        "address_one"=>  (strlen($license->address) > 60) ? substr($license->address,0,60).'...' : $license->address,
        "address_two"=> "",
        "address_three"=>"",
        "country_code"=> $license->Country->country_kh,
      );
      $transport = array(
        "mode_of_transport"=> 1,
        "port_of_origin"=> "",//"DKFER",
        "port_of_discharge"=> $license->Port_Entries->office_code,//"CAYTU", 
        "port_of_transit"=>  "", //$license->place_export,//"CAYTU",
        "port_of_loading"=> $license->place_export,//"CAYTU",
        "country_of_origin"=> "", //$license->mCountry->country_kh,//"DK",
        "country_of_discharge"=>'KH',// $license->Country->country_kh , //"CA",
        "country_of_transit"=> "",//$license->Country->country_kh, //"CA",
        "country_of_loading"=> $license->mCountry->country_kh, //"CA"
      );
      $invoiceExt[] = array(
        "invoice_number"=>$license->billnumber,
        "invoice_date"=> date("d/m/Y", strtotime($license->billdate)), // "07/11/23"
      ); 
      $invoiceValue = array(
          "incoterms"=> $license->incoterm,
          "currency"=> $license->currency,
          "exchange_rate"=> $license->exchange_rate,
          "invoice_value_local_currency"=> number_format(($license->invoice_value_other_currency*$license->exchange_rate),2 , '.', ''),
          "invoice_value_other_currency"=> number_format($license->invoice_value_other_currency,2 ,  '.', ''),
          "bill_number"=>  NULL,
          "bill_date"=> $bill,
          "invoice_ext"=>  $invoiceExt,
   
      );
      $payment_other = array(
        "application_lodgement_office"=> "",
        "customs_entry_exit_checkpoint_office"=> "",
        "customs_clearance_checkpoint_office"=> ""
      );

        $patentPath = $license->Customer->patent;
        $fileNameExtentionp = basename($patentPath);
        $filep =  explode(".",$fileNameExtentionp);
        $fileNamep = $filep[0];
        //$fileExtention = $file[1];
        $typep = pathinfo($patentPath, PATHINFO_EXTENSION);
        $datap = file_get_contents($patentPath);
        $base64p = 'data:image/' . $typep . ';base64,' . base64_encode($datap);  
      $supporting_docs[]= array(
          "doc_name"=> $fileNamep,
          "doc_type"=> "PATENT (VAT TIN)",
          "doc_ref"=> $license->Customer->patent_number,
          "doc_date"=> $license->Customer->patent_date,
          "doc_file"=> $base64p,
          "doc_extension"=> $typep,
          );
      $supporting_docs[]= array(
        "doc_name"=> $fileNamep,
        "doc_type"=> "CUSTOMS DECLARATION (IN CASE APPLY FOR SECOND SHIPMENT PROCESS)",
        "doc_ref"=> $license->Customer->patent_number,
        "doc_date"=> $license->Customer->patent_date,
        "doc_file"=> $base64p,
        "doc_extension"=> $typep,
        );
     
      foreach($license->Einvoices as $invoice){
        $path = $invoice->file_path;
        $fileNameExtention = basename($path);
        $file =  explode(".",$fileNameExtention);
        $fileName = $file[0];
        //$fileExtention = $file[1];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        $supporting_docs[]= array(
        "doc_name"=> $fileName,
        "doc_type"=> "INVOICE",
        "doc_ref"=> $invoice->id,
        "doc_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($invoice->updated_at),
        "doc_file"=> $base64,
        "doc_extension"=> $type,
        );
      }

      foreach($license->Epackinglists as $packing){
        $path = $packing->file_path;
        $fileNameExtention = basename($path);
        $file =  explode(".",$fileNameExtention);
        $fileName = $file[0];
        //$fileExtention = $file[1];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        $supporting_docs[]= array(
        "doc_name"=> $fileName,
        "doc_type"=> "PACKING LIST",
        "doc_ref"=> $packing->id,
        "doc_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($packing->updated_at),
        "doc_file"=> $base64,
        "doc_extension"=> $type,
        );
      }

      foreach($license->Eladings as $lading){
        $path = $lading->file_path;
        $fileNameExtention = basename($path);
        $file =  explode(".",$fileNameExtention);
        $fileName = $file[0];
        //$fileExtention = $file[1];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        $supporting_docs[]= array(
        "doc_name"=> $fileName,
        "doc_type"=> "BILL OF LANDING",
        "doc_ref"=> $lading->id,
        "doc_date"=> \App\Helpers\AppHelper::instance()->format_insert_date($lading->updated_at),
        "doc_file"=> $base64,
        "doc_extension"=> $type,
        );
      }

      $material = $license->Equipmentrequestdetail;
      foreach($material as $index=>$value){
        $item[] = array(

          "item_reference"=> $value->id,
          "item_rank_no"=> $value->equipment_id,
          "customs_procedure_code"=> "",
          "hs_code"=> $value->Equipment->taxcode,
          "item_category_code"=> "",
          "commercial_description"=> $value->description,
          "marks_description"=> "",
          "invoice_value"=>  $value->invoice_value ,
          "invoice_value_local"=> number_format($value->invoice_value*$license->exchange_rate,2,".",""),
          "quantity"=> number_format($value->amount,2,".",""),
          "quantity_uom"=> $value->uom,
          "gross_weight"=>  $value->grossweight,
          "gross_weight_uom"=> "KGM",
          "net_weight"=>  $value->netweight,
          "net_weight_uom"=> "KGM",
          "no_packages"=> NULL,
          "no_packages_uom"=> NULL,
          "quota_issue_type"=> "QUO_VALUE"
        ); 
      }
      $postdata = array(
        'header' => $header,
        'trader' => $trader,
        "transport" => $transport,
        "value" => $invoiceValue,
        "items" => $item,
        "payment_other" => $payment_other,
        "supporting_docs"=> $supporting_docs,
      );

      return $postdata;

}


public function sendequipment($id){
  $response = $this->checkExpiredToken();
  $curl = curl_init();
  $postdata = $this->genjson_equipment($id);

  curl_setopt_array($curl, array(
  //  CURLOPT_URL => 'https://dev-cnsw.vcargocloud.com/nswGateway/api/v1/push/lpco',
    CURLOPT_URL => $this->baseurl.'nswGateway/api/v1/push/lpco',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>json_encode($postdata),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer '.$response,
      'Cookie: JSESSIONID=F1FA0E573229C7D990C034839A802FF1.server1'
    ),
  ));
  $dd = curl_exec($curl);
  $responsedata =  json_decode($dd);
  curl_close($curl);

  //echo json_encode($dd);

  if ($responsedata->status== 201){
    $this->updateLicensee($id,2);
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', ' PERMIT being review IN NSW');
  }elseif($responsedata->status == 400){

    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'Internal Data Error:  '.json_encode($responsedata));
 
  }elseif($responsedata->status== 500){
    
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'NSW Error: '.json_encode($responsedata));
  
  }else{
  
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with( 'danger', 'Unknow Error: '.json_encode($responsedata) );
  
  }
   
 }


 public function getequipment($id){

  $response = $this->checkExpiredToken();
  $curl = curl_init();
  $license = Equipmentrequest::find($id);
  $postdata = array(
    "lpco_ref_no" => $license->licence_no
  );

  curl_setopt_array($curl, array(
    CURLOPT_URL => $this->baseurl .'nswGateway/api/v1/utilize/lpco',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS =>json_encode($postdata),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer '.$response,
      'Cookie: JSESSIONID=E943049D67E18317AEA2A232974646FD.server1'
    ),
  ));
  


  $dd = curl_exec($curl);
  $responsedata =  json_decode($dd);
  curl_close($curl);

  echo  ($dd);
  if ($responsedata->status== 200){
    $this->updateLicensee($id,3);
    $cdata = ['content' => json_encode($responsedata->data)];
        
    $this->linkcustomeq($id,$cdata);
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', 'License is finished');
    //echo $dd;
  
  }elseif($responsedata->status == 404){

    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'Custom Declearation is not yet issue:  '.json_encode($responsedata));
 
  }elseif($responsedata->status== 500){
    
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'NSW Error: '.json_encode($responsedat));
  
  }else{
  
    return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'Unknow Error: '.json_encode($responsedata) );
  
  }
  
  
 }

 public function cancelequipment($id){

  $response = $this->checkExpiredToken();
  $curl = curl_init();

  $license = Equipmentrequest::find($id);
  $postdata = array(
    "lpco_ref_no" => $license->licence_no
  );

  curl_setopt_array($curl, array(
   // CURLOPT_URL => 'https://dev-cnsw.vcargocloud.com/nswGateway/api/v1/cancel/lpco',
    CURLOPT_URL => $this->baseurl.'nswGateway/api/v1/cancel/lpco',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>json_encode($postdata),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer '.$response ,
      'Cookie: JSESSIONID=E943049D67E18317AEA2A232974646FD.server1'
    ),
  ));
  
  $dd = curl_exec($curl);
  $responsedata =  json_decode($dd);
  curl_close($curl);

  echo  ($dd);
  //echo $response;
 // return redirect()->action('MaterialrequestController@Materialrequest_detail',$id)->with('success', ' Request have been cancel !!');
 if ($responsedata->status== 200){
  $this->updateLicensee($id,1);
  return redirect()->action('EquipmentrequestController@showdetail',$id)->with('success', 'License is rejected');

}elseif($responsedata->status == 400){

  return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'Internal Data Error:  '.json_encode($responsedata));

}elseif($responsedata->status== 500){
  
  return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'NSW Error: '.json_encode($responsedata));

}else{

  return redirect()->action('EquipmentrequestController@showdetail',$id)->with('danger', 'Unknow Error: '.json_encode($responsedata) );

}
 }
 
}