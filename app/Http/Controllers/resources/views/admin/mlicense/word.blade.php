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
        <center>លិខិតអនុញ្ញាត </center><center>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន</center>
      </div>
      <p><b>យោង៖</b> - តាមអនុក្រឹត្យលេខ:<strong>{{$law->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូសូន
                             &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; - លិខិតស្នើសុំរបស់ក្រុមហ៊ុនចុះថ្ងៃទី{{$request_date["day"]}} &nbsp;   ខែ {{$request_date["month"]}} &nbsp; &nbsp; ឆ្នាំ {{$request_date["year"]}}</p>
      <p>&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>{{$isubdetail->Customer->company_name}}</strong> មានអសយដ្ឋាន ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;  ផ្លូវលេខ{{$isubdetail->Customer->street }}&nbsp;   ភូមិ {{$isubdetail->Customer->village }}&nbsp;   សង្កាត់/ឃុំ  {{$isubdetail->Customer->commune }} &nbsp;  ខណ្ឌ/ស្រុក  {{$isubdetail->Customer->district }} &nbsp; រាជធានី/ខេត្រ  {{$isubdetail->Customer->city }}&nbsp;  ( ទូរស័ព្ទលេខ&nbsp;  {{$isubdetail->Customer->tel }}  ) នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន តាមបរិមាណដូចខាងក្រោម៖ </p>

      <div class="col-md-12">
        <table  style="border: 1px solid black; width:100%">
        <thead>
          <tr>
              <th style="border: 1px solid black;" align="center">លរ</th>
              <th  align="center">ឈ្មោះពាណិជ្ជកម្មុ
                <div>ឬនិមិត្តសញ្ញា</div></th>
              <th align="center">បរិមាណស្នើសុំ
                <div>គីឡូក្រាម(kg)</div></th>
              <th align="center">ប្រភេទសារធាតុ</th>
              <th align="center">លេខសំគាល់ក្នុង
                <div>តារាងពន្ធគយកម្ពុជា</div></th>
              <th align="center">លេខកូដ
                <div>សារធាតុគីមី</div></th>
              <th align="center">គុណភាព
                <div>សារធាតុ</div></th>
          </tr>
        </thead>
        <tbody>
         <?php $i = 1;
          $total = 0;
         ?>
       @foreach($isubdetail->Materialrequestdetails as $quo)
          <tr>
            <td align="center">{{$i}}</td>
            <td align="center">{{$quo->Material->com_name}}</td>
            <td align="center">{{number_format($quo->quantity,2)}} kg<span style="font-size: 8pt">( {{$quo->store_type}} kg = {{$quo->number}} cyl ) </span></td>
            <td align="center">{{$quo->Material->substance}}</td>
            <td align="center">{{$quo->Material->taxcode}}</td>
            <td align="center">{{$quo->Material->un3}}</td>
            <td align="center">{{$quo->quality}}</td>
          </tr>

        <?php $i = $i+1;
         $total= $total+ $quo->quantity;
        ?>
        @endforeach
          <tr>
            <td align="center"></td>
            <td align="center"><label>សរុប</label></td>
            <td align="center">{{ number_format($total,2) }} kg</td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
          </tr>
        </tbody>
        </table>
      </div>
      <div class="col-md-12" >លិខិតអនុញ្ញាតនេះ មានសុពលភាព រហូតដល់ថ្ងថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; ខែ&nbsp; &nbsp; &nbsp; &nbsp;  ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp;  សម្រាប់ការស្នើសុំនាំចូល មកពីប្រទេស {{@$isubdetail->mcountry->countries_name}} តាមច្រក {{@$isubdetail->place_import}}</div>
      <div class="col-md-12" >
        &nbsp;&nbsp; &nbsp;ក្រុមហ៊ុនត្រូវគោរពតាមល័ក្ខខ័ណ្ឌដូចខាងក្រោម៖
        <ul>
          <li>ប្រដាប់សម្រាប់ដាក់​ ( Container/cylinder ) ដែលនាំចូល ត្រូវបិទស្លាកសម្គាល់ ដោយមានឈ្មោះ អសយដ្ឋាន លេខចុះបញ្ជីរបស់អ្នកនាំចូល ។ ចំពោះល្បាយសមាសធាតុគីមី ត្រូវមានឈ្មោះសារធាតុគីមី និង លេខកូដនៃសារធាតុគីមី</li><li>ក្រុមហ៊ុនត្រូវរក្សាឯកសារកត់ត្រាបរិមាណនាំចូលប្រចាំឆ្នាំ នៃសារធាតុបំផ្លាញស្រទាប់អូសូនដែលបាននាំចូលនីមួយៗ ដោយបញ្ចាក់ឲ្យច្បាស់ពី ថ្ងៃខែឆ្នាំ និងចំណុចកំពង់ផែនាំចូល ។ ឯកសារកត់ត្រាទាំងនេះត្រូវរក្សាទុករយៈពេល៥ឆ្នាំ ។</li><li>ក្រុមហ៊ុនត្រូវរក្សាទុកឯកសារកត់ត្រារយៈពេល៥ឆ្នាំ អំពីបរិមាណលក់ រួមទាំងអត្តសញ្ញាណរបស់អ្នកទិញ និងគោលបំណង ប្រើប្រាស់ ។</li>
          <li>ក្រុមហ៊ុនត្រូវត្រូវផ្តល់ប្រតិវេទគយ មកផ្ណែកអូសូនជាតិ រាល់ពេលនាំចូលនីមួយៗ។</li>
          <li>ត្រូវមានឯកសារកត់ត្រាទាំងនេះនៅមានមានការស្នើសុំត្រួតពិនិត្យ ។</li>
          <li>ត្រូវផ្ញើឯកសារកត់ត្រាទៅសម្ថតកិច្ចត្រួតពិនិត្យនៅពេលមានការស្នើសុំ។</li>
          <li>ត្រូវរាយការណ៌ប្រចាំឆ្នាំ ( អំពីបរិមាណ ឈ្មោះសារធាតុដែលបាននាំចូល ) មកក្រសួងបរិស្ថានឲ្យបានមុនថ្ងៃទី០១ ខែកុម្ភៈ នៃឆ្នាំបន្ទាប់។</li>
        </ul>
        </div>
      <div class="col-md-12" style="font-size:7pt">
        <table width="100%" style="width:100%">
          <tr>
              <td></td>
             <td rowspan="4"><div  align="center" style="font-family: Khmer OS Muol Light; font-size:12pt">អគ្គនាយក</div></td>
          </tr>
          <tr>
            <td><span>ចម្លងជូន៖</span></td>
          </tr>
          <tr>
              <td><span>- អគ្គនាយកដ្ឋានគយ និងរដ្ឋករកម្ពុជា</span></td>
          </tr>
          <tr>
                <td><span>- ឯកសារ-កាលប្បវត្តិ</span></td>

          </tr>
        </table>


      </div>

    </div>
  </div>
 </div>
</body>
</html>







