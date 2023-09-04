@extends('layout.front')
@section('content')
@include('layout.partical.headbar')
<div class="container">
<div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

<div class="panel panel-moe">
<div class="panel-body">



  <div class="col-xs-12 " style="width: 100%" id="docx">
  <div class="Section">
     <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

    <div class="row" id="printdata" style=" height: 100%; text-align: justify; "  >                         
    <div class="col-md-12 body" style="  font-size:12pt; font-family: Khmer OS Siemreap, Roboto;" >                          
  
       
      <div class="col-md-12" align="center"  style="font-family: Khmer OS Muol Light, Roboto; font-size: 12pt;" >
        <center>លិខិតអនុញ្ញាតជាគោលការណ៌ </center><center>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន ប្រចាំឆ្នាំ {{$year_show}}</center>        
      </div> 

        <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
       <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

      <p>&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន
       <strong>{{$isubdetail->Customer->company_name}}</strong>
        <div class="col-md-6">
                                
                                 <div class="textboxshow">ឈ្មោះអ្នកទំនាក់ទំនង៖
                                  <strong>{{$isubdetail->Customer->Cominfo->contact_person? $isubdetail->Customer->Cominfo->contact_person:'---------------------------'}}</strong></div>
                                                     
                            </div>
                             <div class="col-md-3 ">
                                 
                                  <div class="textboxshow">ភេទ៖
                                    <strong>{{$isubdetail->Customer->Cominfo->gender? $isubdetail->Customer->Cominfo->gender:'---------------------------'}}</strong></div>
                                                    
                            </div>
                            <div class="col-md-3 ">
                                    
                                    <div class="textboxshow">សញ្ជាតិ៖
                                      <strong>{{$isubdetail->Customer->Cominfo->nationality? $isubdetail->Customer->Cominfo->nationality:'---------------------------'}}</strong></div>
                            </div>
                              <div class="col-md-6">
                                  
                                    <div class="textboxshow">មុខងារក្នុងក្រុមហ៊ុន៖
                                      <strong>{{$isubdetail->Customer->Cominfo->position? $isubdetail->Customer->Cominfo->position:'---------------------------'}}</strong></div>
                                                     
                            </div>
                            <div class="col-md-6">
                                  
                                   <div class="textboxshow">អត្តសញ្ញាណ​ប័ណ្ណ៖
                                    <strong>{{$isubdetail->Customer->Cominfo->personid? $isubdetail->Customer->Cominfo->personid:'---------------------------'}}</strong></div>
                                                    
                            </div>

                             <div class="col-md-3 ">
                          
                          <div class="textboxshow">ទូរស័ព្ទ​៖ <strong>{{$isubdetail->Customer->tel? $isubdetail->Customer->tel:'---------------------------'}}</strong></div>
                        </div>
                        <div class="col-md-3 ">
                          
                          <div class="textboxshow">ទូរសារ៖ <strong>{{$isubdetail->Customer->fax ? $isubdetail->Customer->fax:'---------------------------'}}</strong></div>
                        </div>
                        <div class="col-md-6 ">                           
                          <div class="textboxshow">​​សារអេឡិចត្រូនិច៖ <strong>{{$isubdetail->Customer->email?$isubdetail->Customer->email:'---------------------------'}}</strong></div>
                        </div>

                        <div class="col-md-6">
                                
                                <div class="">
                                  
                                   <div class="textboxshow">លេខវិញ្ញាបនប័ត្រចុះបញ្ចីអាករលើតំលៃបន្ថែម៖ 
                                    <strong>{{$isubdetail->Customer->tin ?$isubdetail->Customer->tin: '---------------------------'}}</strong></div>
                                </div>
                              </div>
                             
                             
                              <div class="col-md-6">
                                <div class="">
                                 
                                 <div class="textboxshow"> ចុះកាលបរិច្ឆេទ៖ 
                                  <strong>{{ \App\Helpers\AppHelper::instance()->format_date($isubdetail->Customer->tin_date)}}</strong></div>
                                </div>
                              </div>
                        <div class="col-md-6 ">
                            
                            <div class="textboxshow">លេខវិញ្ញាបនប័ត្រក្នុងបញ្ជីក្រសួងពាណិជ្ជកម្ម៖
                              <strong>{{$isubdetail->Customer->company_id?$isubdetail->Customer->company_id: '---------------------------'}}</strong></div>
                          </div>
                          <div class="col-md-6">
                           
                            <div class="textboxshow">ចុះកាលបរិច្ឆេទ៖ <strong>{{\App\Helpers\AppHelper::instance()->format_date($isubdetail->Customer->company_id_date)}}</strong></div>
                          </div>
       
       <div class="col-md-12"> មានអាសយដ្ឋាន&nbsp;ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;ផ្លូវ{{$isubdetail->Customer->street }}&nbsp;{{ \App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->village) }}&nbsp;{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->commune) }} &nbsp;{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->district) }}&nbsp;{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->city) }}&nbsp;លេខទូរស័ព្ទៈ&nbsp;  {{$isubdetail->Customer->tel }} នាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន តាមបរិមាណដូចខាងក្រោម៖ </div>
  
      <div class="col-md-12">                              
        <div class="col-md-12">                              
        <table  class="table table-bordered dataTable no-footer dtr-inline collapsed">
        <thead>
          <tr>
             <th style="padding:4pt 2pt ;border:1px solid black; border-collapse: collapse;" class="text-center;"​>លរ</th>
            <th style="padding:4pt 2pt ;border:1px solid black; border-collapse: collapse;"  class="text-center"​>ឈ្មោះពាណិជ្ជកម្មុ<br>ឬនិមិត្តសញ្ញា</th>
            <th style="padding:4pt 2pt ;border:1px solid black; border-collapse: collapse;"  class="text-center"​>បរិមាណស្នើសុំ<br>គីឡូក្រាម(kg)</th>
            <th style="padding:4pt 2pt ;border:1px solid black; border-collapse: collapse;"  class="text-center"​>ប្រភេទសារធាតុ</th>
            <th style="padding:4pt 2pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>លេខសម្គាល់ក្នុង<br>តារាងពន្ធគយកម្ពុជា</th>
            <th style="padding:4pt 2pt ;border:1px solid black; border-collapse: collapse;"  class="text-center"​>លេខកូដ<br>សារធាតុគីមី</th>

          </tr>
        </thead>
        <tbody>
         <?php $i = 1; 
          $total = 0;
         ?>
     
        @foreach($isubdetail->Qldetail as $quo) 
          <tr>
           <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$i}}</td>
           <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->com_name}}</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{number_format($quo->amount,2)}} kg</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->substance}}</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->taxcode}}</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->un3}}</td>
          </tr>                                  
         
        <?php $i = $i+1; 
         $total= $total+ $quo->amount;
        ?>
        @endforeach
          <tr>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;" ></td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" ><label>សរុប</label></td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" colspan="2" >{{ number_format($total,2)}} kg</td>            
            
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;" ></td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;" ></td>
          </tr>
        </tbody>
        </table>
      </div>  
      </div> 
      <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>    
      <div class="col-md-12" >
        &nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះ ត្រូវបានផ្តល់ជាគោលការណ៏ (កូតា​) ឲ្យក្រុមហ៊ុនអាចធ្វើការនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូននិងសារធាតុផ្សេងៗទៀតមកក្នុងប្រទេសកម្ពុជា ដែលមានសុពលភាព រយៈពេល០១ឆ្នាំគិតចាប់ពីថ្ងៃទី១ ខែមករា ដល់ថ្ងៃទី៣១ ខែធ្នូ ឆ្នាំ {{$year_show}} ប៉ុន្តែក្រុមហ៊ុន <strong>ត្រូវដាក់ពាក្យស្នើសុំលិខិតអនុញ្ញាតិនាំចូលសារធាតុសារជាថ្មី ទៅតាមប្រភេទ និងបរិមាណស្នើសុំ រាល់ពេលនាំចូលមួយលើកៗ។ </strong>
      </div>
  



      
      
    </div>
  </div>
 </div> 
</div> 


</div>
</div>
</div>
</div>

@endsection
