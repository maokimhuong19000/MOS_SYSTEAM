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
        <center>លិខិតអនុញ្ញាតជាគោលការណ៌ </center><center>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន ប្រចាំឆ្នាំ {{$year_show}}</center>
      </div>
      <p><b>យោង៖</b> - តាមអនុក្រឹត្យលេខ:<strong>{{$law->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូសូន </p>
      <p>&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>{{$customers->company_name}}</strong> មានអសយដ្ឋាន ផ្ទះលេខ{{$customers->house }}&nbsp;  ផ្លូវលេខ{{$customers->street }}&nbsp;   ភូមិ {{$customers->village }}&nbsp;   សង្កាត់/ឃុំ  {{$customers->commune }} &nbsp;  ខណ្ឌ/ស្រុក  {{$customers->district }} &nbsp; រាជធានី/ខេត្រ  {{$customers->city }}&nbsp;  ( ទូរស័ព្ទលេខ&nbsp;  {{$customers->tel }}  ) នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន ប្រភេទ {{$quota[0]->com_name}}  និងសារធាតុផ្សេងទៀតតាមបរិមាណដូចខាងក្រោម៖ </p>
      <div class="col-md-12">
        <table border="1" width="100%" align="center" >
        <thead>
          <tr>
              <th align="center">លរ</th>
              <th align="center">ឈ្មោះពាណិជ្ជកម្មុ<div>ឬនិមិត្តសញ្ញា</div></th>
              <th align="center">បរិមាណស្នើសុំ<div>គីឡូក្រាម(kg)</div></th>
              <th align="center">ប្រភេទសារធាតុ</th>
              <th align="center">លេខសំគាល់ក្នុង<div>តារាងពន្ធគយកម្ពុជា</div></th>
              <th align="center">លេខកូដ<div>សារធាតុគីមី</div></th>

          </tr>
        </thead>
        <tbody>
         <?php $i = 1;
          $total = 0;
         ?>
        @foreach($quota as $quo)
          <tr>
            <td align="center">{{$i}}</td>
            <td align="center">{{$quo->com_name}}</td>
            <td align="center">{{number_format($quo->amount,2)}} kg</td>
            <td align="center">{{$quo->substance}}</td>
            <td align="center">{{$quo->taxcode}}</td>
            <td align="center">{{$quo->un3}}</td>
          </tr>

        <?php $i = $i+1;
         $total= $total+ $quo->amount;
        ?>
        @endforeach
          <tr>
            <td align="center"></td>
            <td align="center"><label>សរុប</label></td>
            <td align="center">{{ number_format($total,2)}} kg</td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
          </tr>
        </tbody>
        </table>
      </div>
      <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះ ត្រូវបានផ្តល់ជាគោលការណ៏ ( កូតា​ ) ឲ្យក្រុមហ៊ុនអាចធ្វើការនាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន និងសារធាតុផ្សេងៗទៀតមកក្នុងប្រទេសកម្ពុជា ដែលមានសុពលភាព រយៈពេល០១ឆ្នាំគិតចាប់ពីថ្ងៃទី១ ខែមករា ដល់ថ្ងៃទី៣១ ខែធ្នូ ឆ្នាំ ២០១៩ ប៉ុន្តែក្រុមហ៊ុន <strong>ត្រូវដាក់ពាក្យស្នើសុំលិខិតអនុញ្ញាតិនាំចូលសារធាតុសារជាថ្មី ទៅតាមប្រភេទ និងបរិមាណស្នើសុំ រាល់ពេលនាំចូលមួយលើកៗ។ </strong></div>
      <div class="col-md-12" >
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ក្រុមហ៊ុនត្រូវគោរពតាមល័ក្ខខ័ណ្ឌដូចខាងក្រោម៖
        <ul>
          <li>ប្រដាប់សម្រាប់ដាក់​  ( Container/cylinder ) ដែលនាំចូល ត្រូវបិទស្លាកសម្គាល់ ដោយមានឈ្មោះ អសយដ្ឋាន លេខចុះបញ្ជីរបស់អ្នកនាំចូល ។ ចំពោះល្បាយសមាសធាតុគីមី ត្រូវមានឈ្មោះសារធាតុគីមី និង លេខកូដនៃសារធាតុគីមី</li><li>ក្រុមហ៊ុនត្រូវមានកំណត់ត្រា អំពីបរិមាណនាំចូលប្រចាំឆ្នាំ នៃប្រភេទសារធាតុបំផ្លាញស្រទាប់អូសូននីមួយៗ ដោយបញ្ចាក់ឲ្យច្បាស់ពីកាលបរិច្ឆេទ ចំណុចកំពង់ផែនាំចូល និងត្រូវរក្សាទុករយៈពេលប្រាំឆ្នាំ។</li><li>ត្រូវផ្ញើឯកសារកត់ត្រាទៅសម្ថតកិច្ចត្រួតពិនិត្យនៅពេលមានការស្នើសុំ។</li><li>ត្រូវរាយការណ៌ប្រចាំឆ្នាំ ( អំពីបរិមាណ ឈ្មោះសារធាតុដែលបាននាំចូល ) មកក្រសួងបរិស្ថានឲ្យបានមុនថ្ងៃទី០១ ខែកុម្ភៈ នៃឆ្នាំបន្ទាប់។</li>
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