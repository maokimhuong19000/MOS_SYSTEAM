@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('request_materialdetail',$isubdetail) }}


<div class="row">
<div class="col-lg-12 col-md-12">
<div class="card">
<div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('adisubstance.title')}} :{{ $isubdetail->request_no}} </h4>
</div>
<div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<!-- flash message success -->
    <div class="flash-message">
      <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $key)
          @if(Session::has($key))
                    
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }} </p>
          @endif
        @endforeach
      </div>
    </div>
<!-- end flash message -->
<div class="card-body">

  <div class="row">
              <div class="col-md-2"> 
                       
                <div class="alert btn-round {{ \App\Helpers\AppHelper::instance()->import_status_class($isubdetail->import_status) }}">

                          <span>
                            <h4> {{ \App\Helpers\AppHelper::instance()->import_status($isubdetail->import_status) }} </h4> 
                          </span>
                        </div>
              </div>

               <div class="col-md-2"> 
                            @if(@$isubdetail->Approver->name)
                            <div>{{trans('back.approved_by')}}</div>
                             <div class="textboxshow">{{@$isubdetail->Approver->name}}</div>
                             @endif
                         
              </div>
              <div class="col-md-2">
                          @if(@$isubdetail->Finalizer->name) 
                          <div>{{trans('back.finalized_by')}}</div>
                          <div class="textboxshow">  {{@$isubdetail->Finalizer->name}}</div> 
                          @endif
              </div>
              <div class="col-md-2"> 
                            @if(@$isubdetail->Rejecter->name) 
                            <div>{{trans('back.rejected_by')}}</div>           
                            <div class="textboxshow"> {{@$isubdetail->Rejecter->name}}</div>
                            @endif
                          
              </div>
              <div class="col-md-2"> 
                    
                    @if(@$isubdetail->Checker->name)
                    <div>{{trans('back.checked_by')}}</div>
                    <div class="textboxshow">{{@$isubdetail->Checker->name }}  </div> 

                    @endif
                        
              </div>
               <div class="col-md-2"> 
                  @if(@$isubdetail->Verifier->name)
                   <div>{{trans('back.verified_by')}}</div>
                   <div class="textboxshow">{{ @$isubdetail->Verifier->name}} </div> 

                   @endif
                         
              </div>
              
        </div>

        <div class="row">
      <div class="col-md-2 theader">LPCO:</div>
      <div class="col-md-10 theader">{{@$Equipmentrequest->licence_no}}</div>
      </div>

    <div id="accordion" role="tablist">
      <div class="card-collapse">
        <div class="card-header" role="tab" id="headingOne">
             <h5 class="mb-0">
              <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                            <strong  class="theader" >{{trans('tab.detail')}} </strong>
                            <i class="material-icons">keyboard_arrow_down</i>
                </a>
             </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
         <div class="card-body">
               <div class="row">
                 <div class="col-md-6">
                                
                                <div class="">
                                   <div>{{trans('back.company_request')}}</div>
                                   <div class="textboxshow">{{$isubdetail->Customer->company_name}}</div>
                                </div>
                              </div>
                               <div class="col-md-6">
                                
                                <div class="">
                                   <div>{{trans('label.creater')}}</div>
                                   <div class="textboxshow">{{$isubdetail->Customer->idcard}}</div>
                                </div>
                              </div>
               </div>
               <div class="row">
                             <div class="col-md-6">
                                 <div>{{trans('front.contact_name')}}</div>
                                 <div class="textboxshow">{{$isubdetail->Customer->Cominfo->contact_person? $isubdetail->Customer->Cominfo->contact_person:'---------------------------'}}</div>
                                                     
                            </div>
                             <div class="col-md-3 ">
                                  <div>{{trans('front.gender')}}</div>
                                  <div class="textboxshow">{{$isubdetail->Customer->Cominfo->gender? $isubdetail->Customer->Cominfo->gender:'---------------------------'}}</div>
                                                    
                            </div>
                            <div class="col-md-3 ">
                                     <div> {{trans('front.nationality')}}</div>
                                    <div class="textboxshow">{{$isubdetail->Customer->Cominfo->nationality? $isubdetail->Customer->Cominfo->nationality:'---------------------------'}}</div>
                            </div>
               </div>
               <div class="row">

                            <div class="col-md-6">
                                    <div>{{trans('front.company_function')}}</div>
                                    <div class="textboxshow">{{$isubdetail->Customer->Cominfo->position? $isubdetail->Customer->Cominfo->position:'---------------------------'}}</div>
                                                     
                            </div>
                            <div class="col-md-6">
                                   <div>{{trans('front.id_card')}}</div>
                                   <div class="textboxshow">{{$isubdetail->Customer->Cominfo->personid? $isubdetail->Customer->Cominfo->personid:'---------------------------'}}</div>
                                                    
                            </div>
               </div>
                <div class="row">
                            <div class="col-md-3">
                                
                                <div class="">
                                   <div>{{trans('back.company_address')}}</div>
                                   
                                </div>
                              </div>

                          <div class="col-md-3 ">
                          <div>{{trans('label_back.numHome')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->house? $isubdetail->Customer->house:'---------------------------'}}</div>
                          
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.NumberRoad')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->street ? $isubdetail->Customer->street:'---------------------------'}}</div>
                          
                          
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.village')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->village ? $isubdetail->Customer->village:'---------------------------'}}</div>
                          
                          </div>
                </div>
                <div class="row">

                          <div class="col-md-3"></div>
                         <div class="col-md-3 ">
                          <div>{{trans('label_back.CummuneSongkat')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->commune ? $isubdetail->Customer->commune:'---------------------------'}}</div>
                          
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.District')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->district? $isubdetail->Customer->district:'---------------------------'}}</div>
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.province')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->city ? $isubdetail->Customer->city:'---------------------------'}}</div>
                        </div>
                </div>
                <div class="row">
                         <div class="col-md-3"></div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.phone')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->tel? $isubdetail->Customer->tel:'---------------------------'}}</div>
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.fax')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->fax ? $isubdetail->Customer->fax:'---------------------------'}}</div>
                        </div>
                        <div class="col-md-3 ">
                            <div>{{trans('label_back.email')}}</div>
                          <div class="textboxshow">{{$isubdetail->Customer->email?$isubdetail->Customer->email:'---------------------------'}}</div>
                        </div>
                </div>

                 <div class="row">
                            <div class="col-md-3">
                                
                                <div class="">
                                   <div>{{trans('back.company_doc')}}</div>
                                   
                                </div>
                              </div>

                               <div class="col-md-3">
                                
                                <div class="">
                                   <div> {!!trans('label.certificate_add_tax')!!}</div>
                                   <div class="textboxshow">{{$isubdetail->Customer->tin ?$isubdetail->Customer->tin: '---------------------------'}}</div>
                                </div>
                              </div>
                             
                             
                              <div class="col-md-3">
                                <div class="">
                                   <div>{{trans('label.date_certificate_vat')}} </div>
                                 <div class="textboxshow"> 
                                  {{ \App\Helpers\AppHelper::instance()->format_date($isubdetail->Customer->tin_date)}}</div>
                                </div>
                              </div>

                               <div class="col-md-3">
                                <div class="">
                                  
                                  <div>{!!trans('label.certificate_tin')!!}</div>
                                  <div class="form-group">
                                    @if ($isubdetail->Customer->tin_path)
                                      <a href="{{asset($isubdetail->Customer->tin_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                                      @else
                                         <label>No File</label>
                                      @endif
                                      </div>
                                  </div>
                                </div>



                  </div>
                  <div class="row">
                         <div class="col-md-3"></div>
                         <div class="col-md-3 ">
                            <div>{!!trans('label.certificate_identity_business_owner')!!}</div>
                            <div class="textboxshow">{{$isubdetail->Customer->company_id?$isubdetail->Customer->company_id: '---------------------------'}}</div>
                          </div>
                          <div class="col-md-3">
                            <div>{{trans('label.date_certificate_vat')}}</div>
                            <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($isubdetail->Customer->company_id_date)}}</div>
                          </div>
                          <div class="col-md-3 ">
                             <div>{!!trans('label.add_another_certificate_ministry')!!}</div>
                             <div class="form-group">
                                 @if ($isubdetail->Customer->id_path)
                                  <a href="{{asset($isubdetail->Customer->id_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                                  @else
                                       <label>No File</label>
                                  @endif
                             </div>
                           </div>


                  </div>
                   <div class="row">
                         <div class="col-md-3"></div>
                         <div class="col-md-3 ">
                            <div>{!!trans('labe.patent')!!}</div>
                            <div class="textboxshow">{{$isubdetail->Customer->patent_number?$isubdetail->Customer->patent_number: '---------------------------'}}</div>
                             
                          </div>  
                          <div class="col-md-3 ">

                            
                            <div>{{trans('label.date_certificate_vat')}}</div>
                           <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($isubdetail->Customer->patent_date)}}</div>
                           
                          </div>
                          <div class="col-md-3 ">

                            <div>{!!trans('label.patent_file')!!}</div>
                            <div class="form-group">
                             @if ( $isubdetail->Customer->patent)
                              <a href="{{asset($isubdetail->Customer->patent)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                              @else
                                  <label>No File</label>
                              @endif 
                            </div>
                          </div>

                          
                   </div>

                   <div class="row">
                         <div class="col-md-3"></div>
                          <div class="col-md-3">
                                <div class="">
                                  <div> {{trans('label.idcard')}}</div>
                                  <div class="form-group">
                                    @if ($isubdetail->Customer->id_card)
                                      <a href="{{asset($isubdetail->Customer->id_card)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                                      @else
                                        <label>No File</label>
                                      @endif
                                  </div>
                                </div>
                           </div>
                            <div class="col-md-3 ">
                                   <div class="">               
                                    <div>{{trans('front.certificate_identity_passport')}}</div>
                                    <div class="form-group">
                                    @if ($isubdetail->Customer->Cominfo->id_card)
                                      <a href="{{asset($isubdetail->Customer->Cominfo->id_card)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                                      @else
                                        <label>No File</label>
                                      @endif
                                  </div>
                                                  
                            </div></div>
                            <div class="col-md-3s ">
                                     <div> {{trans('front_contact.authorize')}}</div>
                                    <div class="form-group">
                                                   @if ($isubdetail->Customer->Cominfo->authorize)
                                                    <a href="{{asset($isubdetail->Customer->Cominfo->authorize)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                                                    @else
                                                         <label>No File</label>
                                                    @endif
                                                  </div>
                            </div>
                   </div> 

                    <div class="divider"></div>
          <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>       
           </div>
         </div>
      </div>


      <div class="card-collapse">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
          <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <strong  class="theader" >{{trans('back.import_isubstance')}} </strong>
              <i class="material-icons">keyboard_arrow_down</i>
          </a>
           </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" style="">
          <div class="card-body">

          <div class="row">
                
                <div class="col-md-6">
                  <div class="">
                     <div>{{trans('back.from_isubstance')}}</div>
                     <div class="textboxshow">{{$isubdetail->manufacture_name}}</div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="">
                    <div>{{trans('back.country_isubstance')}}</div>
                    <div class="textboxshow">{{@$isubdetail->mcountry->countries_name}}</div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="">
                     <div>{{trans('back.address_isubstance')}} </div>
                   <div class="textboxshow">{{$isubdetail->address}}</div>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6">
                  <div class="">
                     <div>{{trans('back.manu_name_isubstance')}}</div>
                      <div class="textboxshow">{{$isubdetail->import_port}}</div>
                  </div>
                </div>

                <div class="col-md-6">
                  
              <div class="">
                    <div>{{trans('back.mcountry_isubstance')}}</div>
                    <div class="textboxshow">{{@$isubdetail->country->countries_name}}</div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">&nbsp;&nbsp;</div>
              <div class="divider"></div>
              <div class="col-md-12">&nbsp;&nbsp;</div>
              <div class="row">

                    <div class="col-md-6">
                            <div class="">
                              <div>{{trans('back.transport_isubstance')}}</div>
                              <div class="textboxshow">{{@$isubdetail->Transport->description}}</div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="">
                              <div>{{trans('back.placex_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->place_export}}</div>
                            </div>
                    </div>

                  
              </div>
              <div class="row">
                    <div class="col-md-6">
                            <div class="">
                              <div>{{trans('back.placei_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->Port_Entries->port_name}}</div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="">
                              <div>{{trans('back.arrival_isubstance')}}</div>
                              <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($isubdetail->import_date)}}</div> 
                            </div>
                    </div>
              </div>
              <div class="row">
              @if ($isubdetail->transit == 1 )
                  <div class="col-md-6">
                            <div class="">
                              <div>{{trans('back.tcountry_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->Tcountry->countries_name}}</div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="">
                              <div>{{trans('back.tport_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->des_port}}</div> 
                            </div>
                    </div>
              @endif
              </div>
              <div class="col-md-12">&nbsp;&nbsp;</div>
              <div class="divider"></div>
              <div class="col-md-12">&nbsp;&nbsp;</div>

              <div class="row">
                <div class="col-md-6">
                  <div class="">
                 
                    <div>
                      {{trans('back.purpose')}}
                    </div>
                    <div class="textboxshow">
                       {{ $isubdetail->manufacture_option? trans('production.fro_isubstance') : '' }}
                       {{ $isubdetail->aircon_service_option? trans('air_conditioner.fro_isubstance'): ''}}
                       {{ $isubdetail->other_option? trans('other.fro_isubstance'): ''}}
                    </div>
                 
              </div>
                </div>
                

                <div class="col-md-6">
                  <div class="">
                    
                    <div>
                      {{trans('back.other_isubstance')}}
                    </div>
                    <div class="textboxshow">
                      {{$isubdetail->other_option_description}}
                    </div>
                 
                  </div>

                </div>

              </div>



              <div class="row">
                <div class="col-md-6">
                  <div class="">
                  <div>{{trans('back.ownb_isubstance')}}&nbsp;&nbsp;:</div>
                  <div class="textboxshow">
                    <div class="input-group">
                      {{$isubdetail->self_usage_percent}}<span class="input-group-addon">%</span>
                  </div>
                  </div>
              </div>
                </div>
                <div class="col-md-6">
                  <div class="">
                  <div>
                    {{trans('back.sold_isubstance')}}:</div>
                  <div class="textboxshow">
                     <div class="input-group">
                      {{$isubdetail->other_usage_percent}}<span class="input-group-addon">%</span>
                  </div>
                  </div>
              </div>
                </div>

              </div>


              <div class="row">

              <div class="col-md-4">
                  <div class="form-group">
                    
                    <div>{{trans('back.shipping_isubstance')}}</div>
                    
                     @foreach($isubdetail->Iladings as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                    @endforeach
                </div>
              </div>


              <div class="col-md-4">
                  <div class="form-group">
                  
                    <div>{{trans('back.packing_isubstance')}}</div>
                    
                     @foreach($isubdetail->Ipackinglists as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                    @endforeach
                  </div>
 
              </div>


              <div class="col-md-4">
                  <div class="form-group">
                    <div>{{trans('back.custom_isubstance')}}</div>
                    @if ($isubdetail->Custom)
                    <a href="{{route('materialrequest.viewcustom',$isubdetail->id)}}" target="_blank">
                        <i class="material-icons">cloud_download</i>
                    </a>
                  
                      @else
                      មិនមាន/NO File
                      @endif
                  </div>
              </div>

              </div>



              <div class="row">
                  <div class="col-md-12">
                    <div class="">
                      <div>{{trans('back.otherinf_isubstance')}}</div> 
                      <div class="textboxshow">{{$isubdetail->other_info}}</div>    
                    </div>
                  </div>
              </div> 
              
              <div class="col-md-12">&nbsp;&nbsp;</div>
              <div class="divider"></div>
              <div class="col-md-12">&nbsp;&nbsp;</div>


              <div class="row">

                    <div class="col-md-4">  
                        <div class="form-group">
                          <div>{{trans('back.invoice_isubstance')}}</div>
                          @foreach($isubdetail->Iinvoices as $ind => $file)
                          <a href="{{asset($file->file_path)}}" target="_blank">  <i class="material-icons">cloud_download</i></a>
                          @endforeach
                        </div>
                    </div>
                    <div class="col-md-8"></div>


                    <div class="col-md-4">
                            <div class="">
                              <div>{{trans('back.incoterm_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->incoterm}}</div>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="">
                              <div>{{trans('back.billdate_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->billdate}}</div> 
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="">
                              <div>{{trans('back.billnumber_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->billnumber}}</div> 
                            </div>
                    </div>

                    <div class="col-md-4">
                            <div class="">
                              <div>{{trans('back.totalprice_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->invoice_value_other_currency}}</div>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="">
                              <div>{{trans('back.currency_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->currency}}</div> 
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="">
                              <div>{{trans('back.exchange_rate_isubstance')}}</div>
                              <div class="textboxshow">{{$isubdetail->exchange_rate}}</div> 
                            </div>
                    </div>


              </div>

           <div class="divider"></div>
          <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>        
          </div>
        </div>
      </div>
      <div class="card-collapse">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               <strong class="theader">{{trans('back.sub_isubstance')}}</strong>
              <i class="material-icons">keyboard_arrow_down</i>
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
         <div class="card-body">
          
             <div class="row">
              <div class="col-md-12">
                  <table id="" class="table table-striped" style="width:100%">
                  <thead class="text-warning">
                    <tr>
                     
                      <th >{{trans('back.material_isubstance')}}</th>
                      <th >{{trans('back.putting_isubstance')}}</th>
                      <th >{{trans('back.unit_isubstance')}}</th>
                      <th >{{trans('back.quantity_isubstance')}}</th>
                      <th >{{trans('back.gross_isubstance')}}</th>
                      <th >{{trans('back.value_isubstance')}}</th>
                      <th >{{trans('back.quality_isubstance')}}</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $total= 0; ?>
                    <?php $gtotal= 0; ?>
                    @foreach($isubdetail->Materialrequestdetails as $materials)
                    <?php $total = $total + $materials->quantity; ?>
                    <?php $gtotal = $gtotal + $materials->grossweight; ?>
                    <tr>
                      
                      <td>{{$materials->material->substance}}</td>
                      <td>{{$materials->store_type==1? "-":$materials->store_type . ""}}Kg/cly</td>
                      <td>{{$materials->number}} {{$materials->uom}}</td>
                      <td>{{ \App\Helpers\AppHelper::instance()->format_kg($materials->quantity) }}</td>
                      <td>{{ \App\Helpers\AppHelper::instance()->format_kg($materials->grossweight) }}</td>
                      <td>{{  $materials->invoice_value }}</td>
                      <td>{{$materials->quality}}</td>
                    </tr>
                    @endforeach
                 
                  </tbody>
                  <tfoot>
                    <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>{{trans('back.totalqty_isubstance')}}</th>
                    <th>{{ \App\Helpers\AppHelper::instance()->format_kg($total) }} </th>
                    <th></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>{{trans('back.gross_isubstance')}}</th>
                    <th>{{ \App\Helpers\AppHelper::instance()->format_kg($gtotal) }} </th>
                    <th></th>
                  </tr>
                  <tr style="display:none">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>{{trans('back.paid_isubstance')}}</th>
                    <th>{{ \App\Helpers\AppHelper::instance()->format_r($total_z[0])  }} </th>

                  </tr>
                  </tfoot>
              </table>

             </div>
           </div>   
            <div class="divider"></div>
          <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>    
          </div>
        </div>
        </div>
      </div>
            
          


 <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>



   <div class="form-group">

      @if( $isubdetail->astatus == 0 )
          @can('materialrequest.check')
          <a href="{{route('materialrequest.check',$isubdetail->id)}}"><input type="button" value="{{ trans('back.check_btn') }}" class="btn btn-primary"></a>
           @endcan
      @elseif( $isubdetail->astatus == 1 )
          @can('materialrequest.verify')
               <a href="{{route('materialrequest.verify',$isubdetail->id)}}"><input type="button" value="{{ trans('back.verify_btn') }}" class="btn btn-primary"></a>
           @endcan

      @endif

      @if($isubdetail->import_status == 0 && $isubdetail->astatus == 2 )
          @can('materialrequest.approve')
                  <a href="{{route('materialrequest.approve',$isubdetail->id)}}"><input type="button" value="{{ trans('back.approve_btn') }}" class="btn btn-primary"></a>
          @endcan
          @can('materialrequest.reject')
                  <a href="{{route('materialrequest.reject',$isubdetail->id)}}"><input type="button" value="{{ trans('back.reject_btn') }}" class="btn btn-danger"></a>
          @endcan
           
      @elseif($isubdetail->import_status == 2 )
         
 
          @can('materialrequest.finalize')
          <a href="{{route('materialrequest.finalize',$isubdetail->id)}}"><input type="button" value="{{ trans('back.end_btn') }}" class="btn btn-success"></a>
              @endcan
          @can('materialrequest.reject')
          <a href="{{route('materialrequest.reject',$isubdetail->id)}}"><input type="button" value="{{ trans('back.reject_btn') }}" class="btn btn-danger"></a>
              @endcan
      @elseif($isubdetail->import_status == 3 )

      @endif
          <a href="{{route('materialrequest')}}"><input type="button" value="{{ trans('back.back_btn') }}" class="btn btn-default"></a>
          @can('materialrequest.view')
          <a href="{{route('materialrequest.request',$isubdetail->id)}}"><input type="button" value="Request" class="btn btn-info"></a>
          @endcan
  </div>
       
 <div class="col-md-12">&nbsp;</div>
    


</div>
 </div>  
 </div>
 </div>  
@endsection
