@extends('layout.front')
@section('content')
@include('layout.partical.headbar')
<div class="container">
<div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

<div class="panel panel-moe">
<div class="panel-body">

<div class="col-xs-12" style="width: 100%" id="source-html">
            <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            
              <div class="row" id="printdata"  > 
              <div class="col-md-12 body"  >
 
                 <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>  
                  <div class="col-md-12" align="center"  style="font-family: Khmer OS Muol Light, Roboto; font-size: 22px;" >
                    <center>លិខិតអនុញ្ញាត</center><center>នាំចូលបរិក្ខារត្រជាក់និង ម៉ាស៊ីនត្រជាក់</center>
                  </div>  
                  <div class="col-md-12">                            
                     <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>  
                     <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>                    
                  
                      <div class="col-md-12">
        ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន៖ &nbsp;&nbsp;<strong>{{$isubdetail->Customer->company_name}}</strong> </div>
      <div class="col-md-12">
        លេខចុះបញ្ចីអ្នកនាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន៖ &nbsp;&nbsp;<strong>{{$isubdetail->Customer->idcard}}</strong></div>
       
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
                  <div class="col-md-12">
                  មានអាសយដ្ឋានក្រុមហ៊ុន&nbsp;ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;ផ្លូវ{{$isubdetail->Customer->street }}&nbsp;{{ \App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->village) }}&nbsp;{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->commune) }} &nbsp;{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->district) }}&nbsp;{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->city) }}&nbsp;លេខទូរស័ព្ទៈ&nbsp;  {{$isubdetail->Customer->tel }} នាំចូលបរិក្ខារឬ ផលិតផលដែលប្រើប្រាស់សារធាតុបំផ្លាញស្រទាប់អូហ្សូន ដូចខាងក្រោម៖ </p>
                  </div>
                  <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>  
                  <div id="" class="mtable">                              
                   <table id="t2"  class="table table-bordered responsive" style="width:100%">
                   <thead>
                    <tr role="row">
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>លរ</th>
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>ឈ្មោះផលិតផល<br> ឬឧបករណ៏</th>
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>សមត្ថភាព<br>(BTU/HP/KW)</th>
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>បរិមាណស្នើសុំ<br> (គ្រៀង)</th>
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>សារធាតុ <br>ដែលត្រូវប្រើ</th>
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>លេខសម្គាល់ក្នុង<br>តារាងពន្ធគយ<br>កម្ពុជា</th>
                        <th style="padding:2pt 1pt ;border:1px solid black; border-collapse: collapse;" class="text-center"​>គុណភាព</th>
                     </tr>                                 
                    </thead>
                    <tbody>
                                   <?php $i = 1; 
                                    $total = 0;
                                   ?>
                     @foreach($isubdetail->Equipmentrequestdetail as $quo) 
                     <tr role="row">
                       <td  colspan="3" class="text-center"​ >{{$quo->Equipment->product_name}}</td>
                       <td   class="text-center"​></td>
                       <td   class="text-center"​></td>
                       <td   class="text-center"​></td>
                        <td   class="text-center"​></td>
                     </tr>                                  
                     <tr>
                       <td  class="text-center"​>{{$i}}</td>
                       <td  >{{$quo->description}}</td>
                       <td s >{{$quo->capvalue}} {{$quo->capacity}}</td>
                        <td  class="text-right"​>{{number_format($quo->amount,0)}}</td>
                        <td  class="text-center"​>{{$quo->substance}}</td>
                        <td  class="text-center"​>{{$quo->Equipment->taxcode}}</td>
                         <td  >{{$quo->quality}}</td>
                      </tr>
                                  <?php $i = $i+1; 
                                    $total= $total+ $quo->amount;
                                  ?>
                        @endforeach
                       <tr>
                        <td   colspan="3" class="text-center"​ ><label>សរុប</label></td>                                    
                         <td  class="text-right"​>{{ number_format($total,0) }} </td>
                         <td  class="text-center"​></td>
                          <td  class="text-center"​></td>
                          <td  class="text-center"​></td>
                        </tr>
                      </tbody>
                     </table>
                             
                     </div>
                     <div class="col-md-12"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                     <div class="col-md-12" >
                      <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះមានសុពលភាព   សម្រាប់ការស្នើសុំនាំចូល មកពីប្រទេស {{\App\Helpers\AppHelper::instance()->get_khmer_only(@$isubdetail->mcountry->countries_name)}}&nbsp; តាមច្រក {{@$isubdetail->Port_Entries->port_name}}​។</p>
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