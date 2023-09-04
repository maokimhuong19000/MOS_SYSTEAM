@extends('layout.master')

@section('content')

{{ Breadcrumbs::render('annualquota') }}
<div class="card">

        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.item5')}} </h4>
        </div>

<div class="card-body table-responsive">

<div class="col-xs-12" style="width: 595.4pt">
              <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
              <div class="row" id="printdata" style=" height: 100%; "  >                         
                         <div class="col-md-12 body" style="  font-size:11pt; font-family: 'Siemreap', Roboto;" >
                          
                            <div class="col-md-2 pull-right" >ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-4 pull-right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12​​ text-center"​ style="font-family: 'Moul', Roboto;" ><h5>លិខិតអនុញ្ញាតជាគោលការណ៌</h5></div>
                            <div class="col-md-12 text-center" style="font-family: 'Moul', Roboto;" ><h5>នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន ប្រចាំឆ្នាំ{{$year_show}}</h5></div>
                            
                            <div class="col-md-12">                            
                             <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;យោងតាមអនុក្រឹត្យលេខ: <strong>{{$law->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូសូន ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>
                                {{$customers->company_name}}
                              </strong> មានសយដ្ឋាន ផ្ទះលេខ{{$customers->house }}&nbsp;  ផ្លូវលេខ{{$customers->street }}&nbsp;   ភូមិ {{$customers->village }}&nbsp;   សង្កាត់/ឃុំ  {{$customers->commune }} &nbsp;  ខណ្ឌ/ស្រុក  {{$customers->district }} &nbsp; រាជធានី/ខេត្រ  {{$customers->city }}&nbsp;  ( ទូរស័ព្ទលេខ&nbsp;  {{$customers->tel }}  ) នាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន ប្រភេទ {{$quota[0]->com_name}}  និងសារធាតុផ្សេងទៀតតាមបរិមាណដូចខាងក្រោម៖ </p>

                            </div>
                            <div class="col-md-12">                              
                              <table width="100%" border="1" >
                                <thead>
                                  <th class="text-center"​>លរ</th>
                                  <th class="text-center"​>ឈ្មោះពាណិជ្ជកម្មុ<br>ឬនិមិត្តសញ្ញា</th>
                                  <th class="text-center"​>បរិមាណស្នើសុំ<br>គីឡូក្រាម(kg)</th>
                                  <th class="text-center"​>ប្រភេទសារធាតុ</th>
                                  <th class="text-center"​>លេខសំគាល់ក្នុង<br>តារាងពន្ធគយកម្ពុជា</th>
                                  <th class="text-center"​>លេខកូដ<br>សារធាតុគីមី</th>
                                </thead>
                                <tbody>
                                   <?php $i = 1; 
                                    $total = 0;
                                   ?>
                                   @foreach($quota as $quo)                                   
                                  <tr>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​>{{$i}}</td>
                                    <td style="padding-left: 5px;padding-right: 5px" >{{$quo->com_name}}</td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-right"​>{{number_format($quo->amount,2)}} kg</td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​>{{$quo->substance}}</td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​>{{$quo->taxcode}}</td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​>{{$quo->un3}}</td>
                                  </tr>
                                  <?php $i = $i+1; 
                                    $total= $total+ $quo->amount;
                                  ?>
                                    @endforeach
                                  <tr>
                                    <td  style="padding-left: 5px;padding-right: 5px" colspan="2" class="text-center"​ ><label>សរុប</label></td>                                    
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-right"​>{{ number_format($total,2)}} kg</td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​></td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​></td>
                                    <td style="padding-left: 5px;padding-right: 5px" class="text-center"​></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                             <div class="col-md-12" ><p>
                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះ ត្រូវបានផ្តល់ជាគោលការណ៏ ( កូតា​ ) ឲ្យក្រុមហ៊ុនអាចធ្វើការនាំចូលសារធាតុបំផ្លាញស្រទាប់អូសូន និងសារធាតុផ្សេងៗទៀតមកក្នុងប្រទេសកម្ពុជា ដែលមានសុពលភាព រយៈពេល០១ឆ្នាំគិតចាប់ពីថ្ងៃទី១ ខែមករា ដល់ថ្ងៃទី៣១ ខែធ្នូ ឆ្នាំ ២០១៩ ប៉ុន្តែក្រុមហ៊ុន <strong>ត្រូវដាក់ពាក្យស្នើសុំលិខិតអនុញ្ញាតិនាំចូលសារធាតុសារជាថ្មី ទៅតាមប្រភេទ និងបរិមាណស្នើសុំ រាល់ពេលនាំចូលមួយលើកៗ។ </strong></p>
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
                                ក្រុមហ៊ុនត្រូវមានកំណត់ត្រា អំពីបរិមាណនាំចូលប្រចាំឆ្នាំ នៃប្រភេទសារធាតុបំផ្លាញស្រទាប់អូសូននីមួយៗ ដោយបញ្ចាក់ឲ្យច្បាស់ពីកាលបរិច្ឆេទ ចំណុចកំពង់ផែនាំចូល និងត្រូវរក្សាទុករយៈពេលប្រាំឆ្នាំ។
                               </li>

                               <li>
                                  ត្រូវផ្ញើឯកសារកត់ត្រាទៅសម្ថតកិច្ចត្រួតពិនិត្យនៅពេលមានការស្នើសុំ។

                               </li>

                               <li>
                                ត្រូវរាយការណ៌ប្រចាំឆ្នាំ ( អំពីបរិមាណ ឈ្មោះសារធាតុដែលបាននាំចូល ) មកក្រសួងបរិស្ថានឲ្យបានមុនថ្ងៃទី០១ ខែកុម្ភៈ នៃឆ្នាំបន្ទាប់។

                               </li>
                             </ul>


                             </div>
                             
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                             <div class="col-md-12" >
                              <div class="col-xs-6"​ style="font-size: 9pt" >
                                ចម្លងជូន៖<br /> - អគ្គនាយកដ្ឋានគយ និងរដ្ឋករកម្ពុជា<br /> - អគ្គនាយកដ្ឋានកម្ពុជាត្រួតពិនិត្យទំនិញ<br /> &nbsp;   នីហ័រណ អាហ័រណ និងបង្ក្រាបការក្លែងបន្លំ<br /> - ឯកសារ-កាលប្បវត្តិ
                              </div>
                              <div class="col-xs-6 text-center"​ style="font-family: 'Moul', Roboto;"   >អគ្គនាយក</div>
                             </div>




                          </div>



                      </div></div>
  </div> 
<div class="card-footer ">
                 <a href="{{route('annualquota.print',[$customers->id,$year])}}" class="pull pull-right" target="_blank"> <button type="button" class="btn btn-fill btn-rose">Print</button></a>
                 <a href="{{route('annualquota.print',[$customers->id,$year])}}" class="pull pull-right"> <button type="button" class="btn btn-fill btn-rose">Print And Pay</button></a>
</div>

</div>

@endsection