<html xmlns="http://www.w3.org/TR/html4/">
<head></head>
<body>
<div class="col-xs-12">
    <div class="blank_top" style="height: 55pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <div class="row" id="printdata" style=" height: 100%; "  >                         
    <div class="col-md-12 body" style="  font-size:8pt; font-family: Khmer OS Siemreap, Roboto;" >                          
      <div class="col-md-2 pull-right"  align="right">ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>      
      <div class="col-md-4 pull-right" align="right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>    
      <div class="col-md-12" align="center"  style="font-family: Khmer OS Muol Light, Roboto; font-size: 11pt" >
        <center>លិខិតអនុញ្ញាត </center><center>នាំចូលបរិក្ខាត្រជាក់និង ម៉ាស៊ីនត្រជាក់</center>        
      </div>  
      <p><b>យោង៖</b> - តាមអនុក្រឹត្យលេខ:<strong>{{$law->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូសូន 
                             &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; - លិខិតស្នើសុំរបស់ក្រុមហ៊ុនចុះថ្ងៃទី{{$request_date["day"]}} &nbsp;   ខែ {{$request_date["month"]}} &nbsp; &nbsp; ឆ្នាំ {{$request_date["year"]}}</p>
      <p>&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>{{$isubdetail->Customer->company_name}}</strong> មានអសយដ្ឋាន ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;  ផ្លូវលេខ{{$isubdetail->Customer->street }}&nbsp;   ភូមិ {{$isubdetail->Customer->village }}&nbsp;   សង្កាត់/ឃុំ  {{$isubdetail->Customer->commune }} &nbsp;  ខណ្ឌ/ស្រុក  {{$isubdetail->Customer->district }} &nbsp; រាជធានី/ខេត្រ  {{$isubdetail->Customer->city }}&nbsp;  ( ទូរស័ព្ទលេខ&nbsp;  {{$isubdetail->Customer->tel }}  ) នាំចូលបរិក្ខារឬ ផលិតផលដែលប្រើប្រាស់សារធាតុបំផ្លាញស្រទាប់អូសូន ដូចខាងក្រោម៖  </p>

     <div class="col-md-12">                              
       <table width="100%"  style="border:2px solid #000000;" >
         <thead>
          <tr>
            <th align="center">លរ</th>
            <th align="center">ឈ្មោះផលិតផល   ឫឧបករណ៏</th>
            <th align="center">សមត្ថភាព  (BTU/HP/KW)</th>
            <th align="center">បរិមាណ  ស្នើសុំ   (គ្រៀង)</th>
            <th align="center">សារធាតុ   ដែលត្រូវប្រើ</th>
            <th align="center">លេខសំគាល់ក្នុង  តារាងពន្ធគយ  កម្ពុជា</th>
            <th align="center">គុណភាព</th>
          </tr>
         </thead>
         <tbody>
        <?php $i = 1; 
        $total = 0;
        ?>
        @foreach($isubdetail->Equipmentrequestdetail as $quo) 
          <tr>
               <td  colspan="3">{{$quo->Equipment->product_name}}</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
           </tr>                                  
           <tr>
               <td>{{$i}}</td>
               <td>{{$quo->description}}</td>
               <td>{{$quo->capvalue}} {{$quo->capacity}}</td>
               <td>{{number_format($quo->amount,0)}}</td>
               <td>{{$quo->Equipment->substance}}</td>
                <td>{{$quo->Equipment->taxcode}}</td>
                <td>{{$quo->quality}}</td>
            </tr>
            <?php $i = $i+1; 
              $total= $total+ $quo->amount;
            ?>
         @endforeach
          <tr>
              <td  colspan="3"><label>សរុប</label></td>                                    
              <td>{{ number_format($total,0) }} </td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
         </tbody>
        </table>
     </div>
    </div>
  </div>
 </div>
</body>
</html>
