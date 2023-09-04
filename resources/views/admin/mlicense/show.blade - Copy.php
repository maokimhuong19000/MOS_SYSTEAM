@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('license_materialdetail',$isubdetail) }}


<div class="row">
<div class="col-lg-12 col-md-12">


  <div class="card">
   <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('adisubstance.title')}} :{{ $isubdetail->request_no}} </h4>
  </div>

      <div id="source-html" class="col-xs-12" style="width: 595.4pt">
              <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
              <div class="row" id="printdata" style=" height: 100%; "  >                         
                         <div class="col-md-12 body" style="  font-size:11pt; font-family: 'Siemreap', Roboto;" >
                          
                            <div class="col-md-2 pull-right" >ថ្ងៃ&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ឆ្នាំ &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-4 pull-right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12​​ text-center"​ style="font-family: 'Moul', Roboto;" ><h5>លិខិតអនុញ្ញាត</h5></div>
                            <div class="col-md-12 text-center" style="font-family: 'Moul', Roboto;" ><h5>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន </h5></div>
                             <div class="col-md-12"  style="height: 25pt ">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12">                            
                             <p> <strong>យោង៖</strong> - តាមអនុក្រឹត្យលេខ:<strong>{{$law->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូសូន </p>
                             <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; - លិខិតស្នើសុំរបស់ក្រុមហ៊ុនចុះថ្ងៃទី{{$request_date["day"]}} &nbsp;   ខែ {{$request_date["month"]}} &nbsp; &nbsp; ឆ្នាំ {{$request_date["year"]}}</p>
                             <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>
                                {{$isubdetail->Customer->company_name}}
                              </strong> មានសយដ្ឋាន ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;  ផ្លូវលេខ{{$isubdetail->Customer->street }}&nbsp;   ភូមិ {{$isubdetail->Customer->village }}&nbsp;   សង្កាត់/ឃុំ  {{$isubdetail->Customer->commune }} &nbsp;  ខណ្ឌ/ស្រុក  {{$isubdetail->Customer->district }} &nbsp; រាជធានី/ខេត្រ  {{$isubdetail->Customer->city }}&nbsp;  ( ទូរស័ព្ទលេខ&nbsp;  {{$isubdetail->Customer->tel }}  ) នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន តាមបរិមាណដូចខាងក្រោម៖ </p>

                            </div>
                            <div class="col-md-12">                              
                              <table width="100%" border="1" >
                                <thead>
                                  <th style="padding:4pt 2pt ;" class="text-center"​>លរ</th>
                                  <th style="padding:4pt 2pt ;"  class="text-center"​>ឈ្មោះពាណិជ្ជកម្មុ<br>ឬនិមិត្តសញ្ញា</th>
                                  <th style="padding:4pt 2pt ;"  class="text-center"​>បរិមាណស្នើសុំ<br>គីឡូក្រាម(kg)</th>
                                  <th style="padding:4pt 2pt ;"  class="text-center"​>ប្រភេទសារធាតុ</th>
                                  <th style="padding:4pt 2pt ;" class="text-center"​>លេខសំគាល់ក្នុង<br>តារាងពន្ធគយកម្ពុជា</th>
                                  <th style="padding:4pt 2pt ;"  class="text-center"​>លេខកូដ<br>សារធាតុគីមី</th>
                                   <th style="padding:4pt 2pt ;" class="text-center"​>គុណភាព<br>សារធាតុ</th>
                                </thead>
                                <tbody>
                                   <?php $i = 1; 
                                    $total = 0;
                                   ?>
                                   @foreach($isubdetail->Materialrequestdetails as $quo)                                   
                                  <tr>
                                    <td style="padding: 5pt;" class="text-center"​>{{$i}}</td>
                                    <td style="padding: 5pt;" >{{$quo->Material->com_name}}</td>
                                    <td style="padding: 5pt;" class="text-right"​>{{number_format($quo->quantity,2)}} kg
                                      <br>
                                    <span style="font-size: 8pt">( {{$quo->store_type}} kg = {{$quo->number}} cyl ) </span>
                                    </td>
                                    <td style="padding: 5pt;" class="text-center"​>{{$quo->Material->substance}}</td>
                                    <td style="padding: 5pt;" class="text-center"​>{{$quo->Material->taxcode}}</td>
                                    <td style="padding: 5pt;" class="text-center"​>{{$quo->Material->un3}}</td>
                                    <td style="padding: 5pt;" class="text-center"​>{{$quo->quality}}</td>
                                  </tr>
                                  <?php $i = $i+1; 
                                    $total= $total + $quo->quantity;
                                  ?>
                                    @endforeach
                                  <tr>
                                    <td  style="padding: 5pt;" colspan="2" class="text-center"​ ><label>សរុប</label></td>                                    
                                    <td style="padding: 5pt;" class="text-right"​>{{ number_format($total,2) }} kg</td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                  </tr>
                                </tbody>
                              </table>
                              
                            </div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                             <div class="col-md-12" ><p>
                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះ មានសុពលភាព រហូតដល់ថ្ងថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; ខែ&nbsp; &nbsp; &nbsp; &nbsp;  ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp;  សម្រាប់ការស្នើសុំនាំចូល មកពីប្រទេស {{@$isubdetail->mcountry->countries_name}} តាមច្រក {{@$isubdetail->place_import}}</p>
                             </div>
                             <div class="col-md-12" >
                               <p>
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ក្រុមហ៊ុនត្រូវគោរពតាមល័ក្ខខ័ណ្ឌដូចខាងក្រោម៖
                               </p>
                               <ul>
                               <li>
                                 ប្រដាប់សម្រាប់ដាក់​  ( Container/cylinder ) ដែលនាំចូល ត្រូវបិទស្លាកសម្គាល់ ដោយមានឈ្មោះ អសយដ្ឋាន លេខចុះបញ្ជីរបស់អ្នកនាំចូល ។ ចំពោះល្បាយសមាសធាតុគីមី ត្រូវមានឈ្មោះសារធាតុគីមី និង លេខកូដនៃសារធាតុគីមី
                               </li>

                               <li>
                                ក្រុមហ៊ុនត្រូវរក្សាឯកសារកត់ត្រាបរិមាណនាំចូលប្រចាំឆ្នាំ នៃសារធាតុបំផ្លាញស្រទាប់អូសូនដែលបាននាំចូលនីមួយៗ ដោយបញ្ចាក់ឲ្យច្បាស់ពី ថ្ងៃខែឆ្នាំ និងចំណុចកំពង់ផែនាំចូល ។ ឯកសារកត់ត្រាទាំងនេះត្រូវរក្សាទុករយៈពេល៥ឆ្នាំ ។

                               </li>

                               <li>
                                  ក្រុមហ៊ុនត្រូវរក្សាទុកឯកសារកត់ត្រារយៈពេល៥ឆ្នាំ អំពីបរិមាណលក់ រួមទាំងអត្តសញ្ញាណរបស់អ្នកទិញ និងគោលបំណង ប្រើប្រាស់ ។

                               </li>
                                <li>
                                  ក្រុមហ៊ុនត្រូវត្រូវផ្តល់ប្រតិវេទគយ មកផ្ណែកអូសូនជាតិ រាល់ពេលនាំចូលនីមួយៗ។

                               </li>
                               <li>
                               ត្រូវមានឯកសារកត់ត្រាទាំងនេះនៅមានមានការស្នើសុំត្រួតពិនិត្យ ។
                             </li>
                               <li>
                                  ត្រូវផ្ញើឯកសារកត់ត្រាទៅសម្ថតកិច្ចត្រួតពិនិត្យនៅពេលមានការស្នើសុំ។

                               </li>

                               <li>
                                ត្រូវរាយការណ៌ប្រចាំឆ្នាំ ( អំពីបរិមាណ ឈ្មោះសារធាតុដែលបាននាំចូល ) មកក្រសួងបរិស្ថានឲ្យបានមុនថ្ងៃទី០១ ខែកុម្ភៈ នៃឆ្នាំបន្ទាប់។

                               </li>
                             </ul>


                             </div>
                             
                            <div class="col-md-12"  style="height: 25pt ">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

                            <div class="col-md-12" style="height: 95pt " >
                              <div class="col-xs-6"​  >
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              </div>
                              <div class="col-xs-6 text-center"​ style="font-family: 'Moul', Roboto;"   >អគ្គនាយក</div>
                             </div>
                             <div class="col-md-12" style="height: 15pt " >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                             
                             <div class="col-md-12" >
                              <div class="col-xs-6"​ style="font-size: 9pt" >
                                ចម្លងជូន៖<br /> - អគ្គនាយកដ្ឋានគយ និងរដ្ឋករកម្ពុជា<br />  - ឯកសារ-កាលប្បវត្តិ
                              </div>
                              <div class="col-xs-6 text-center"​ style="font-family: 'Moul', Roboto;"   ></div>
                             </div>





                          </div>



                      </div>
                  </div>

<div class="card-footer ">
                 <a href="{{route('materialrequest.print',$isubdetail->id)}}" class="pull pull-right" target="_blank"> <button type="button" class="btn btn-fill btn-rose">Print</button></a>
                   <button type="button" class="btn btn-fill btn-rose" onclick="exportHTML();">Ms Word</button>
</div>
                 
</div>

</div>

</div>  
</div>
@endsection


@section('script')
  <script type="text/javascript">

 function exportHTML(){
       var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
       var footer = "</body></html>";
       var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
       
       var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
       var fileDownload = document.createElement("a");
       document.body.appendChild(fileDownload);
       fileDownload.href = source;
       fileDownload.download = 'material.docx';
       fileDownload.click();
       document.body.removeChild(fileDownload);
    }
  </script>
@endsection
