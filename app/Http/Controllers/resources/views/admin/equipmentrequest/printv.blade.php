@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('equipmentrequestdetail',$isubdetail) }}


<div class="row">
<div class="col-lg-12 col-md-12">


  <div class="card">
   <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                   <h4 class="card-title">{{trans('ad_equipment.title')}}: {{$isubdetail->id}}</h4>
	</div>
    	<div class="col-xs-12" style="width: 595.4pt">
              <div class="blank_top" style="height: 95pt" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
              <div class="row" id="printdata" style=" height: 100%; text-align: justify;text-justify: inter-word; "  >
                         <div class="col-md-12 body" style="  font-size:11pt; font-family: 'Siemreap', Roboto;" >

                            <div class="col-md-2 pull-right" >ថ្ងៃ&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ឆ្នាំ &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ព.ស.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-4 pull-right" >ធ្វើនៅរាជធានីភ្នំពេញ ថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ខែ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ឆ្នាំ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12​​ text-center"​ style="font-family: 'Moul', Roboto;" ><h5>លិខិតអនុញ្ញាត</h5></div>
                            <div class="col-md-12 text-center" style="font-family: 'Moul', Roboto;" ><h5>នាំចូលបរិក្ខាត្រជាក់និង ម៉ាស៊ីនត្រជាក់</h5></div>
                            <div class="col-md-12"  style="height: 25pt ">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12">
                             <p><strong>យោង៖</strong> - តាមអនុក្រឹត្យលេខ: <strong>{{$law->law_name}}</strong> ស្តីពីការគ្រប់គ្រង់សារធាតុបំផ្លាញស្រទាប់អូសូន </p>
                             <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;​ - លិខិតស្នើសុំរបស់ក្រុមហ៊ុនចុះថ្ងៃទី {{$request_date["day"]}} &nbsp;   ខែ {{$request_date["month"]}} &nbsp; &nbsp; ឆ្នាំ {{$request_date["year"]}}</p>

                             <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ក្រសួងបរិស្ថានសម្រេចអនុញ្ញាតឲ្យក្រុមហ៊ុន <strong>
                                {{$isubdetail->Customer->company_name}}
                              </strong> មានសយដ្ឋាន ផ្ទះលេខ{{$isubdetail->Customer->house }}&nbsp;  ផ្លូវលេខ{{$isubdetail->Customer->street }}&nbsp;   ភូមិ {{$isubdetail->Customer->village }}&nbsp;   សង្កាត់/ឃុំ  {{$isubdetail->Customer->commune }} &nbsp;  ខណ្ឌ/ស្រុក  {{$isubdetail->Customer->district }} &nbsp; រាជធានី/ខេត្រ  {{$isubdetail->Customer->city }}&nbsp;  ( ទូរស័ព្ទលេខ&nbsp;  {{$isubdetail->Customer->tel }}  ) នាំចូលបរិក្ខារឬ ផលិតផលដែលប្រើប្រាស់សារធាតុបំផ្លាញស្រទាប់អូសូន ដូចខាងក្រោម៖ </p>

                            </div>
                            <div class="col-md-12">
                              <table width="100%" border="1" >
                                <thead>
                                  <th style="padding:4pt 2pt ;" class="text-center"​>លរ</th>
                                  <th style="padding:4pt 2pt;" class="text-center"​>ឈ្មោះផលិតផល<br> ឫឧបករណ៏</th>
                                  <th style="padding:4pt 2pt;" class="text-center"​>សមត្ថភាព<br>(BTU/HP/KW)</th>
                                  <th style="padding:4pt 2pt;" class="text-center"​>បរិមាណ <br>ស្នើសុំ<br> (គ្រៀង)</th>
                                  <th style="padding:4pt 2pt;" class="text-center"​>សារធាតុ <br>ដែលត្រូវប្រើ</th>
                                  <th  style="padding:4pt 2pt;" class="text-center"​>លេខសំគាល់ក្នុង<br>តារាងពន្ធគយ<br>កម្ពុជា</th>
                                  <th  style="padding:4pt 2pt;" class="text-center"​>គុណភាព</th>


                                </thead>
                                <tbody>
                                   <?php $i = 1;
                                    $total = 0;
                                   ?>
                                   @foreach($isubdetail->Equipmentrequestdetail as $quo)
                                   <tr>
                                    <td style="padding: 5pt;" colspan="3" class="text-center"​ >{{$quo->Equipment->product_name}}</td>
                                    <td style="padding: 5pt;" ></td>
                                     <td style="padding: 5pt;" ></td>
                                      <td style="padding: 5pt;" ></td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                  </tr>
                                  <tr>
                                    <td style="padding: 5pt;" class="text-center"​>{{$i}}</td>
                                    <td style="padding: 5pt;" ></td>
                                     <td style="padding: 5pt;" ></td>
                                    <td style="padding:5pt;" class="text-right"​>{{number_format($quo->amount,0)}}</td>
                                    <td style="padding: 5pt;" class="text-center"​>{{$quo->Equipment->substance}}</td>
                                    <td style="padding: 5pt;" class="text-center"​>{{$quo->Equipment->taxcode}}</td>
                                    <td style="padding: 5pt;" ></td>
                                  </tr>
                                  <?php $i = $i+1;
                                    $total= $total+ $quo->amount;
                                  ?>
                                    @endforeach
                                  <tr>
                                    <td  style="padding: 5pt;" colspan="3" class="text-center"​ ><label>សរុប</label></td>
                                    <td style="padding: 5pt;" class="text-right"​>{{ number_format($total,0) }} </td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                    <td style="padding: 5pt;" class="text-center"​></td>
                                  </tr>
                                </tbody>
                              </table>

                            </div>
                            <div class="col-md-12"  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                             <div class="col-md-12" ><p>
                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;លិខិតអនុញ្ញាតនេះ មានសុពលភាព រហូតដល់ថ្ងថ្ងៃទី &nbsp; &nbsp; &nbsp; &nbsp; ខែ&nbsp; &nbsp; &nbsp; &nbsp;  ឆ្នាំ &nbsp; &nbsp; &nbsp; &nbsp;  សម្រាប់ការស្នើសុំនាំចូល មកពីប្រទេស {{@$isubdetail->mcountry->countries_name}} តាមច្រក {{@$isubdetail->place_import}}</p>
                             </div>

                             <div class="col-md-12" >
                               <p>
                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ក្រុមហ៊ុនត្រូវគោរពតាមល័ក្ខខ័ណ្ឌដូចខាងក្រោម៖
                               </p>
                               <ul>
                               <li>
                                  បរិក្ខារ ឫផលិតផលដែលនាំចូលទាំងអស់ត្រូវបិទស្លាកសញ្ញា ដោយមានឈ្មោះអសយដ្ឋាន លេខចុះបញ្ចីអ្នកនាំចូលឬក្រុមហ៊ុន ។
                               </li>

                               <li>
                                ក្រុមហ៊ុនត្រូវរក្សាឯកសារកត់ត្រាបរិមាណនាំចូលប្រចាំឆ្នាំ នៃប្រភេតបរិក្ខារ ឫផលិតផលដែលបាននាំចូលនីមួយៗ ដោយបញ្ចាក់ឲ្យច្បាស់ពី ថ្ងៃខែឆ្នាំ និងចំណុចកំពង់ផែនាំចូល ។ ឯកសារកត់ត្រាទាំងនេះត្រូវរក្សាទុករយៈពេល៥ឆ្នាំ ។
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
                                ត្រូវរាយការណ៌ប្រចាំឆ្នាំ  អំពីបរិមាណ ឈ្មោះបរិក្ខារ ឫផលិតផលដែលបាននាំចូល មកក្រសួងបរិស្ថានឲ្យបានមុនថ្ងៃទី០១ ខែកុម្ភៈ នៃឆ្នាំបន្ទាប់។

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
                 <a href="{{route('equipmentrequest.print',$isubdetail->id)}}" class="pull pull-right" target="_blank"> <button type="button" class="btn btn-fill btn-rose">Print</button></a>

</div>

</div>

</div>
</div>
@endsection