@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('license_quota_detail',$quota[0]) }}
<div class="card">

        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.item5')}}:{{$quota[0]->no}} </h4>
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
      <div class="col-md-12" align="center"  style="font-family: Khmer OS Muol Light, Roboto; font-size: 12pt;" >
        <center>លិខិតអនុញ្ញាតជាគោលការណ៌ </center><center>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន ប្រចាំឆ្នាំ {{$year_show}}</center>        
      </div> 
      <p><b style="">យោង៖</b> - តាមអនុក្រឹត្យលេខ:<strong>{{$law[0]->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូហ្សូន </p>
      <div>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; - តាមអនុក្រឹត្យលេខ: {{$law[1]->law_name}} </div>
      <p>&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>{{$customers->company_name}}</strong>&nbsp;ដែលមានអាសយដ្ឋានក្រុមហ៊ុន&nbsp;ផ្ទះលេខ{{$customers->house }}&nbsp;ផ្លូវ{{$customers->street }}&nbsp;{{ \App\Helpers\AppHelper::instance()->get_khmer_only($customers->village) }}&nbsp;{{$city[0]}}{{\App\Helpers\AppHelper::instance()->get_khmer_only($customers->commune) }} &nbsp;{{$city[1]}}{{\App\Helpers\AppHelper::instance()->get_khmer_only($customers->district) }}&nbsp;{{$city[2]}}{{\App\Helpers\AppHelper::instance()->get_khmer_only($customers->city) }}&nbsp;លេខទូរស័ព្ទៈ&nbsp;{{$customers->tel }}  នាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន ប្រភេទ {{$quota[0]->com_name}}  និងសារធាតុផ្សេងទៀតតាមបរិមាណដូចខាងក្រោម៖ </p>     
      <div class="col-md-12 mtable" style="overflow-x:auto">                              
        <table  style="border:1px solid black; width:100%;font-size:12pt; font-family: Khmer OS Siemreap, Roboto; ">
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
        @foreach($quota as $quo) 
          <tr>
           <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$i}}</td>
           <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->com_name}}</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{number_format($quo->amount,2)}} kg</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->substance}}</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->taxcode}}</td>
            <td style="padding: 5pt;border:1px solid black; border-collapse: collapse;text-align: center;" >{{$quo->un3}}</td>
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
      <div class="blank_top"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>    
      <div class="col-md-12" >
        <p>&nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះ ត្រូវបានផ្តល់ជាគោលការណ៏ (កូតា​) ឲ្យក្រុមហ៊ុនអាចធ្វើការនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូននិងសារធាតុផ្សេងៗទៀតមកក្នុងប្រទេសកម្ពុជា ដែលមានសុពលភាព រយៈពេល០១ឆ្នាំគិតចាប់ពីថ្ងៃទី១ ខែមករា ដល់ថ្ងៃទី៣១ ខែធ្នូ ឆ្នាំ {{$year_show}} ប៉ុន្តែក្រុមហ៊ុន <strong>ត្រូវដាក់ពាក្យស្នើសុំលិខិតអនុញ្ញាតិនាំចូលសារធាតុសារជាថ្មី ទៅតាមប្រភេទ និងបរិមាណស្នើសុំ រាល់ពេលនាំចូលមួយលើកៗ។ </strong></p></div>
      <div class="col-md-12" >
        <p>&nbsp;&nbsp;&nbsp;ក្រុមហ៊ុនទាំងអស់ ត្រូវគោរពតាមលក្ខខណ្ឌដែលមានចែងដូចខាងក្រោម ៖</p>
        
          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ប្រដាប់សម្រាប់ដាក់​  (Container/cylinder) ដែលនាំចូល ត្រូវបិទស្លាកសម្គាល់ ដោយមានឈ្មោះ អសយដ្ឋាននិងលេខចុះបញ្ជីរបស់អ្នកនាំចូល ។ ចំពោះល្បាយសមាសធាតុគីមី ត្រូវមានឈ្មោះសារធាតុគីមី និង លេខកូដនៃសារធាតុគីមី</div>
          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ក្រុមហ៊ុនត្រូវមានកំណត់ត្រា អំពីបរិមាណនាំចូលប្រចាំឆ្នាំ នៃប្រភេទសារធាតុបំផ្លាញស្រទាប់អូសូននីមួយៗ ដោយបញ្ចាក់ច្បាស់ពីកាលបរិច្ឆេទ ចំណុចកំពង់ផែនាំចូល និងត្រូវរក្សាទុករយៈពេលប្រាំឆ្នាំ</div>
          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ត្រូវផ្ញើឯកសារកត់ត្រាទៅអាជ្ញាធរត្រួតពិនិត្យនៅពេលមានការស្នើសុំ  </div>
          <div>&nbsp;&nbsp;&nbsp;-&nbsp;ត្រូវរាយការណ៍ប្រចាំឆ្នាំមកក្រសួងបរិស្ថាន (អំពីបរិមាណ ឈ្មោះបរិក្ខារ ឬផលិតផលដែលបាននាំចូល) បានមុនថ្ងៃទី១ ខែកុម្ភៈក្នុងឆ្នាំបន្ទាប់៕
                            </div>
        
      </div>     
       <div class="col-md-12" style=" " >
                              <div class="col-xs-6"​  >
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              </div>
                              <div class="col-xs-6 text-center"​ style="font-family: Khmer OS Muol Light;text-align: center;font-size: 12pt;text-indent: 250pt">អគ្គនាយក</div>
                             </div>
                             <div class="visible-print ">
                            
                              <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(160)->generate(route('front.licensequota',$quota[0]->qlicense_id) )) !!} ">

                            </div>
                             
                            <div class="col-md-12" >

                              <div>ចម្លងជូនៈ</div>
                              <div class="col-xs-6"​ style="font-size: 11pt;text-align:left" >
                                 - អគ្គនាយកដ្ឋានគយ និង រដ្ឋករកម្ពុជា<br />  - ឯកសារ-កាលប្បវត្តិ
                              </div>
                              
                             </div>
      
      
    </div>
  </div>
 </div> 
</div> 
<div class="card-footer ">
    @can('license.quota.download')
    <button type="button" class="btn btn-fill btn-rose" id="export">Ms Word</button>
    @endcan
</div>

</div>

@endsection

@section('script')
  <script type="text/javascript">

 function exportHTML(){
       var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Annaul Quota License</title></head><body>";
       var footer = "</body></html>";
       var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
       
       var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
       var fileDownload = document.createElement("a");
       document.body.appendChild(fileDownload);
       fileDownload.href = source;
       fileDownload.download = '{{$quota[0]->no}}.doc';
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
   link.download = '{{$quota[0]->no}}';   
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, '{{$quota[0]->no}}.doc'); // IE10-11
      else link.click();  // other browsers
   document.body.removeChild(link);
 };

  </script>
@endsection