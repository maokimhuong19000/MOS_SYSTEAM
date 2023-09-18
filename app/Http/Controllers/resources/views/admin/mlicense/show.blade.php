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

  <div class="col-xs-12 " style="width: 100%" id="docx">
  <div class="Section">
   <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
              <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <div class="row" id="printdata" style=" height: 100%; text-align: justify; "  >                         
    <div class="col-md-12 body" style="  font-size:12pt; font-family: Khmer OS Siemreap, Roboto;" >                          
      <div class="col-md-2 pull-right"  align="right">ថ្ងៃ​​&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>      
      <div class="col-md-4 pull-right" align="right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>        
      <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      <div class="col-md-12" align="center"  style="font-family: Khmer OS Muol Light ; font-size: 12pt" >
        <center>លិខិតអនុញ្ញាត </center><center>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន</center>        
      </div>     
      <p><b>យោង៖</b> - តាមអនុក្រឹត្យលេខ: <strong>{{$law[0]->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូហ្សូន </p>
	    <div>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; - តាមអនុក្រឹត្យលេខ: {{$law[1]->law_name}} 
  
      </div>
 
      <p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; - លិខិតស្នើសុំរបស់ក្រុមហ៊ុនចុះថ្ងៃទី{{$request_date["day"]}} &nbsp;ខែ {{$request_date["month"]}} &nbsp;ឆ្នាំ{{$request_date["year"]}}</p>                            
      <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>    {{$isubdetail->Customer->company_name}}</strong>&nbsp;ដែលមានអាសយដ្ឋាន&nbsp;ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;ផ្លូវ{{$isubdetail->Customer->street }}&nbsp;{{ \App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->village) }}&nbsp;{{$city[0]}}{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->commune) }} &nbsp;{{$city[1]}}{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->district) }}&nbsp;{{$city[2]}}{{\App\Helpers\AppHelper::instance()->get_khmer_only($isubdetail->Customer->city) }}&nbsp;លេខទូរស័ព្ទៈ&nbsp;  {{$isubdetail->Customer->tel }} នាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន តាមបរិមាណដូចខាងក្រោម៖ </p>

      <div class="col-md-12" style="overflow-x:auto">                              
        <table  style="border:1px solid black; width:100%; font-size:12pt; font-family: Khmer OS Siemreap">
        <thead>
          <tr>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" class="text-center">លរ</th>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;"  class="text-center">ឈ្មោះពាណិជ្ជកម្មុ<br>ឬនិមិត្តសញ្ញា</th>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;"  class="text-center">បរិមាណស្នើសុំ<br>គីឡូក្រាម(kg)</th>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;"  class="text-center">ប្រភេទ<br>សារធាតុ</th>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" class="text-center">លេខសម្គាល់ក្នុង<br>តារាងពន្ធគយកម្ពុជា</th>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;"  class="text-center">លេខកូដ<br>សារធាតុគីមី</th>
            <th style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" class="text-center">គុណភាព<br>សារធាតុ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" colspan="3" >សារធាតុធ្វើឱ្យត្រជាក់</td>
               <td  style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" ></td>
               <td  style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" ></td>
               <td  style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" ></td>
               <td  style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" ></td>
            </tr>    
         <?php $i = 1; 
          $total = 0;
         ?>
       @foreach($isubdetail->Materialrequestdetails as $quo) 
          <tr>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$i}}</td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->com_name}}</td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: right;" >{{number_format($quo->quantity,2)}} kg<br>
              <span style="font-size: 8pt">({{$quo->store_type}} kg = {{$quo->number}} cyl) </span>
            </td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->substance}}</td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->taxcode}}</td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->Material->un3}}</td>
            <td style="border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->quality}}</td>
          </tr>

                                             
         
        <?php $i = $i+1; 
         $total= $total+ $quo->quantity;
        ?>
        @endforeach
          <tr>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" align="center"></td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" align="center"><label>សរុប</label></td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" align="center" colspan="2">{{ number_format($total,2) }} kg</td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" align="center"></td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" align="center"></td>
            <td style="padding:2pt 1pt;border:1px solid black; border-collapse: collapse;" align="center"></td>
          </tr>
        </tbody>
        </table>
      </div>  
      <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>  
      <div class="col-md-12" ><p>&nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះមានសុពលភាពរហូតដល់ថ្ងៃទី&nbsp; &nbsp; &nbsp;ខែ&nbsp; &nbsp; &nbsp;ឆ្នាំ &nbsp; &nbsp; &nbsp;សម្រាប់ការស្នើសុំនាំចូល មកពីប្រទេស {{\App\Helpers\AppHelper::instance()->get_khmer_only(@$isubdetail->mcountry->countries_name)}}&nbsp; តាមច្រក {{@$isubdetail->Port_Entries->port_name}}​។</p></div>
     
      <div class="col-md-12" >
       <p>&nbsp;&nbsp;&nbsp;ក្រុមហ៊ុនទាំងអស់ ត្រូវគោរពតាមលក្ខខណ្ឌដែលមានចែងដូចខាងក្រោម ៖</p>

          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ប្រដាប់សម្រាប់ដាក់​ (Container/cylinder)ដែលនាំចូល ត្រូវបិទស្លាកសម្គាល់ ដោយមានឈ្មោះ អាសយដ្ឋាននិងលេខចុះបញ្ជីរបស់អ្នកនាំចូល ។ ចំពោះល្បាយសមាសធាតុគីមី ត្រូវមានឈ្មោះសារធាតុគីមី និងលេខកូដនៃសារធាតុគីមី</div>
          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ក្រុមហ៊ុនត្រូវរក្សាទុកឯកសារកត់ត្រាអំពីបរិមាណនាំចូលប្រចាំឆ្នាំ នៃប្រភេទសារធាតុបំផ្លាញស្រទាប់អូហ្សូននីមួយៗ ដោយបញ្ជាក់ឱ្យច្បាស់ពីកាលបរិច្ឆេទ និងចំណុចកំពង់ផែនាំចូល។ ឯកសារកត់ត្រាទាំងនេះត្រូវរក្សាទុករយៈពេល ៥ឆ្នាំ </div>
            <div>&nbsp;&nbsp;&nbsp;-&nbsp;ក្រុមហ៊ុនត្រូវរក្សាទុកឯកសារកត់ត្រារយៈពេល៥ឆ្នាំ អំពីបរិមាណលក់ រួមទាំងអត្តសញ្ញាណរបស់អ្នកទិញ និងគោលបំណងប្រើប្រាស់ </div>
          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ក្រុមហ៊ុនត្រូវផ្តល់ឯកសារប្រតិវេទគយ មកនាយកដ្ឋានគ្រប់គ្រងគុណភាពខ្យល់និងសំឡេងរាល់ពេលនាំចូលនីមួយៗ</div>

         <div>&nbsp;&nbsp;&nbsp;-&nbsp;ត្រូវមានឯកសារកត់ត្រាទាំងនេះនៅពេលមានការស្នើសុំត្រួតពិនិត្យ </div>

           <div>&nbsp;&nbsp;&nbsp;-&nbsp;ត្រូវផ្ញើឯកសារកត់ត្រាទៅអាជ្ញាធរត្រួតពិនិត្យនៅពេលមានការស្នើសុំ  </div>
          
           <div>&nbsp;&nbsp;&nbsp;-&nbsp;ត្រូវរាយការណ៍ប្រចាំឆ្នាំអំពីបរិមាណ ឈ្មោះសារធាតុដែលនាំចូល មកក្រសួងបរិស្ថាន ឱ្យបានមុន   ថ្ងៃទី១ ខែកុម្ភៈ នៃឆ្នាំបន្ទាប់៕
                             </div>

        </div>     
        <div class="col-md-12" style=" " >
                              <div class="col-xs-6"​  >
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              </div>
                              <div class="col-xs-6 text-center" style="font-family: Khmer OS Muol Light;text-align: center;font-size: 12pt;text-indent: 250pt">អគ្គនាយក</div>
                             </div>

                             <div class="visible-print ">
                            
                              <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(160)->generate(route('front.licensematerial',$isubdetail->id) )) !!} ">

                            </div>
                            <div class="col-md-12" >

                              <div>ចម្លងជូនៈ</div>
                              <div class="col-xs-6" style="font-size: 11pt;text-align:left" >
                                 - អគ្គនាយកដ្ឋានគយ និង រដ្ឋករកម្ពុជា<br />  - ឯកសារ-កាលប្បវត្តិ
                              </div>
                              
                             </div>
      
    </div>
  </div>
 </div>
</div>
<div class="card-footer ">
                 @can('license.substance.download')
                  <button type="button" class="btn btn-fill btn-rose"  id="export">Ms Word</button>
    @endcan
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
              "<head><meta charset='utf-8'><title>Equipment License</title>";
          "<style> @page Section{size:8.5in 11.0in;  "
          "margin:0.5in 0.50in 0.5in 0.50in ; mso-header-margin:.5in; "
          "mso-footer-margin:.5in; mso-paper-source:0;}   div.Section {page: Section;}"
          "}</style></head><body>";
          var footer = "</body></html>";
          var sourceHTML = header+document.getElementById("docx").innerHTML+footer;

          var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
          var fileDownload = document.createElement("a");
          document.body.appendChild(fileDownload);
          fileDownload.href = source;
          fileDownload.download = '{{$isubdetail->request_no}}.doc';
          fileDownload.click();
          document.body.removeChild(fileDownload);
      }

window.export.onclick = function() {

   if (!window.Blob) {
      alert('Your legacy browser does not support this action.');
      return;
   }

   var html, link, blob, url, css;

   // EU A4 use: size: 841.95pt 595.35pt;
   // US Letter use: size:11.0in 8.5in;

   css = (
     '<style>' +
     '@page Section{size:8.5in 11.0in; margin:0.5in 0.80in 0.5in 0.80in ; mso-header-margin:.5in;}' +
     'div.Section {page: Section;}' +
     '</style>'
   );

   html = window.docx.innerHTML;
   var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
              "xmlns:w='urn:schemas-microsoft-com:office:word' "+
              "xmlns='http://www.w3.org/TR/REC-html40'>"+
              "<head><meta charset='utf-8'><title> License</title></head><body>";
  html = header + html + "</body></html>"
   blob = new Blob(['\ufeff', css + html], {
     type: 'application/msword'
   });
   url = URL.createObjectURL(blob);
   link = document.createElement('A');
   link.href = url;
   // Set default file name.
   // Word will append file extension - do not add an extension here.
   link.download = '{{$isubdetail->request_no}}';
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, '{{$isubdetail->request_no}}.doc'); // IE10-11
      else link.click();  // other browsers
   document.body.removeChild(link);
 };

  </script>
@endsection
