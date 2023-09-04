@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('equipmentrequestdetail',$Equipmentrequest) }}
<div class="row">
  <div class="col-lg-12 col-md-12">
   <div class="card">
    <div class="card-header card-header-danger card-header-icon">
      <div class="card-icon">
        <i class="material-icons">description</i>
      </div>
      <h4 class="card-title">{{trans('ad_equipment.title')}}: {{ $Equipmentrequest->request_no}}</h4>
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

  <div class="card-body">

    <div class="row">
              <div class="col-md-2"> 
                       
                <div class="alert btn-round {{ \App\Helpers\AppHelper::instance()->import_status_class($Equipmentrequest->import_status) }}">

                          <span>
                            <h4> {{ \App\Helpers\AppHelper::instance()->import_status($Equipmentrequest->import_status) }} </h4> 
                          </span>
                        </div>
              </div>

               <div class="col-md-2"> 
                            @if(@$Equipmentrequest->Approver->name)
                            <div>{{trans('back.approved_by')}}</div>
                             <div class="textboxshow">{{@$Equipmentrequest->Approver->name}}</div>
                             @endif
                         
              </div>
              <div class="col-md-2">
                          @if(@$Equipmentrequest->Finalizer->name) 
                          <div>{{trans('back.finalized_by')}}</div>
                          <div class="textboxshow">  {{@$Equipmentrequest->Finalizer->name}}</div> 
                          @endif
              </div>
              <div class="col-md-2"> 
                            @if(@$Equipmentrequest->Rejecter->name) 
                            <div>{{trans('back.rejected_by')}}</div>           
                            <div class="textboxshow"> {{@$Equipmentrequest->Rejecter->name}}</div>
                            @endif
                          
              </div>
              <div class="col-md-2"> 
                    
                    @if(@$Equipmentrequest->Checker->name)
                    <div>{{trans('back.checked_by')}}</div>
                    <div class="textboxshow">{{@$Equipmentrequest->Checker->name }}  </div> 

                    @endif
                        
              </div>
               <div class="col-md-2"> 
                  @if(@$Equipmentrequest->Verifier->name)
                   <div>{{trans('back.verified_by')}}</div>
                   <div class="textboxshow">{{ @$Equipmentrequest->Verifier->name}} </div> 

                   @endif
                         
              </div>
              
        </div>
      <div class="row">
      <div class="col-md-2 theader">LPCO:</div>
      <div class="col-md-10 theader">{{@$Equipmentrequest->licence_no}}</div>
      </div>

     <div id="accordion" role="tablist">
      <div class="card-collapse">
       
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
                                   <div class="textboxshow">{{$Equipmentrequest->Customer->company_name}}</div>
                                </div>
                              </div>
                               <div class="col-md-6">
                                
                                <div class="">
                                   <div>{{trans('label.creater')}}</div>
                                   <div class="textboxshow">{{$Equipmentrequest->Customer->idcard}}</div>
                                </div>
                              </div>
               </div>
               <div class="row">
                             <div class="col-md-6">
                                 <div>{{trans('front.contact_name')}}</div>
                                 <div class="textboxshow">{{$Equipmentrequest->Customer->Cominfo->contact_person? $Equipmentrequest->Customer->Cominfo->contact_person:'---------------------------'}}</div>
                                                     
                            </div>
                             <div class="col-md-3 ">
                                  <div>{{trans('front.gender')}}</div>
                                  <div class="textboxshow">{{$Equipmentrequest->Customer->Cominfo->gender? $Equipmentrequest->Customer->Cominfo->gender:'---------------------------'}}</div>
                                                    
                            </div>
                            <div class="col-md-3 ">
                                     <div> {{trans('front.nationality')}}</div>
                                    <div class="textboxshow">{{$Equipmentrequest->Customer->Cominfo->nationality? $Equipmentrequest->Customer->Cominfo->nationality:'---------------------------'}}</div>
                            </div>
               </div>
               <div class="row">

                            <div class="col-md-6">
                                    <div>{{trans('front.company_function')}}</div>
                                    <div class="textboxshow">{{$Equipmentrequest->Customer->Cominfo->position? $Equipmentrequest->Customer->Cominfo->position:'---------------------------'}}</div>
                                                     
                            </div>
                            <div class="col-md-6">
                                   <div>{{trans('front.id_card')}}</div>
                                   <div class="textboxshow">{{$Equipmentrequest->Customer->Cominfo->personid? $Equipmentrequest->Customer->Cominfo->personid:'---------------------------'}}</div>
                                                    
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
                          <div class="textboxshow">{{$Equipmentrequest->Customer->house? $Equipmentrequest->Customer->house:'---------------------------'}}</div>
                          
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.NumberRoad')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->street ? $Equipmentrequest->Customer->street:'---------------------------'}}</div>
                          
                          
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.village')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->village ? $Equipmentrequest->Customer->village:'---------------------------'}}</div>
                          
                          </div>
                </div>
                <div class="row">

                          <div class="col-md-3"></div>
                         <div class="col-md-3 ">
                          <div>{{trans('label_back.CummuneSongkat')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->commune ? $Equipmentrequest->Customer->commune:'---------------------------'}}</div>
                          
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.District')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->district? $Equipmentrequest->Customer->district:'---------------------------'}}</div>
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.province')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->city ? $Equipmentrequest->Customer->city:'---------------------------'}}</div>
                        </div>
                </div>
                <div class="row">
                         <div class="col-md-3"></div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.phone')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->tel? $Equipmentrequest->Customer->tel:'---------------------------'}}</div>
                        </div>
                        <div class="col-md-3 ">
                          <div>{{trans('label_back.fax')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->fax ? $Equipmentrequest->Customer->fax:'---------------------------'}}</div>
                        </div>
                        <div class="col-md-3 ">
                            <div>{{trans('label_back.email')}}</div>
                          <div class="textboxshow">{{$Equipmentrequest->Customer->email?$Equipmentrequest->Customer->email:'---------------------------'}}</div>
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
                                   <div class="textboxshow">{{$Equipmentrequest->Customer->tin ?$Equipmentrequest->Customer->tin: '---------------------------'}}</div>
                                </div>
                              </div>
                             
                             
                              <div class="col-md-3">
                                <div class="">
                                   <div>{{trans('label.date_certificate_vat')}} </div>
                                 <div class="textboxshow"> 
                                  {{ \App\Helpers\AppHelper::instance()->format_date($Equipmentrequest->Customer->tin_date)}}</div>
                                </div>
                              </div>

                               <div class="col-md-3">
                                <div class="">
                                  
                                  <div>{!!trans('label.certificate_tin')!!}</div>
                                  <div class="form-group">
                                    @if ($Equipmentrequest->Customer->tin_path)
                                      <a href="{{asset($Equipmentrequest->Customer->tin_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
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
                            <div class="textboxshow">{{$Equipmentrequest->Customer->company_id?$Equipmentrequest->Customer->company_id: '---------------------------'}}</div>
                          </div>
                          <div class="col-md-3">
                            <div>{{trans('label.date_certificate_vat')}}</div>
                            <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($Equipmentrequest->Customer->company_id_date)}}</div>
                          </div>
                          <div class="col-md-3 ">
                             <div>{!!trans('label.add_another_certificate_ministry')!!}</div>
                             <div class="form-group">
                                 @if ($Equipmentrequest->Customer->id_path)
                                  <a href="{{asset($Equipmentrequest->Customer->id_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
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
                            <div class="textboxshow">{{$Equipmentrequest->Customer->patent_number?$Equipmentrequest->Customer->patent_number: '---------------------------'}}</div>
                             
                          </div>  
                          <div class="col-md-3 ">

                            
                            <div>{{trans('label.date_certificate_vat')}}</div>
                           <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($Equipmentrequest->Customer->patent_date)}}</div>
                           
                          </div>
                          <div class="col-md-3 ">

                            <div>{!!trans('label.patent_file')!!}</div>
                            <div class="form-group">
                             @if ( $Equipmentrequest->Customer->patent)
                              <a href="{{asset($Equipmentrequest->Customer->patent)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
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
                                    @if ($Equipmentrequest->Customer->id_card)
                                      <a href="{{asset($Equipmentrequest->Customer->id_card)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
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
                                    @if ($Equipmentrequest->Customer->Cominfo->id_card)
                                      <a href="{{asset($Equipmentrequest->Customer->Cominfo->id_card)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                                      @else
                                        <label>No File</label>
                                      @endif
                                  </div>
                                                  
                            </div></div>
                            <div class="col-md-3s ">
                                     <div> {{trans('front_contact.authorize')}}</div>
                                    <div class="form-group">
                                                   @if ($Equipmentrequest->Customer->Cominfo->authorize)
                                                    <a href="{{asset($Equipmentrequest->Customer->Cominfo->authorize)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
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

              <div class="row ">
                    <div class="col-md-6">
                        <div>{{trans('back.from_isubstance')}}</div>
                        <div class="textboxshow">                          
                         {{$Equipmentrequest->manufacture_name}}
                        </div>
                     
                    </div>

                    <div class="col-md-6">
                        <div>{{trans('back.country_isubstance')}}</div>
                        <div class="textboxshow">
                          {{$Equipmentrequest->mcountry->countries_name}}
                        </div>
                      
                    </div>

                    <div class="col-md-12">
                          <div>{{trans('back.address_isubstance')}} </div>
                          <div class="textboxshow">                          
                          {{$Equipmentrequest->address}}
                        </div>
                     
                    </div>
                  </div>
                  <div class="row">                
                
                    <div class="col-md-6">
                        <div>{{trans('back.manu_name_isubstance')}}</div>
                        <div class="textboxshow">                          
                         {{$Equipmentrequest->import_port}}
                        </div>
                      
                    </div>

                    <div class="col-md-6">
                      <div>{{trans('back.mcountry_isubstance')}}</div>
                      <div class="textboxshow">
                         
                          {{@$Equipmentrequest->Country->countries_name}}
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
                                  <div class="textboxshow">{{@$Equipmentrequest->Transport->description}}</div>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <div>{{trans('back.placex_isubstance')}}</div>
                            <div class="textboxshow">
                                {{$Equipmentrequest->place_export}}
                            </div>
                        </div>

                        <div class="col-md-6">
                              <div>{{trans('back.placei_isubstance')}}</div>
                              <div class="textboxshow">
                                    {{$Equipmentrequest->Port_Entries->port_name}}
                              </div>
                        </div>

                      
                        <div class="col-md-6">
                            <div>{{trans('back.arrival_isubstance')}}</div>
                            <div class="textboxshow">
                            {{\App\Helpers\AppHelper::instance()->format_date($Equipmentrequest->import_date)}}
                            
                            </div>
                        </div>

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
                       {{ $Equipmentrequest->manufacture_option? trans('production.fro_isubstance') : '' }}
                       {{ $Equipmentrequest->aircon_service_option? trans('air_conditioner.fro_isubstance'): ''}}
                       {{ $Equipmentrequest->other_option? trans('other.fro_isubstance'): ''}}
                    </div>
                 
              </div>
                </div>
                
                

                <div class="col-md-6">
                  <div class="">
                    
                    <div>
                      {{trans('back.other_isubstance')}}
                    </div>
                    <div class="textboxshow">
                      {{$Equipmentrequest->other_option_description}}
                    </div>
                 
                  </div>

                </div>

              </div>

                <div class="row">

              <div class="col-md-4">
                  <div class="form-group">
                    
                    <div>{{trans('back.shipping_isubstance')}}</div>
                    
                     @foreach($Equipmentrequest->Eladings as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                    @endforeach
                </div>
              </div>

              <div class="col-md-4">
                  <div class="form-group">
                  
                    <div>{{trans('back.packing_isubstance')}}</div>
                    
                     @foreach($Equipmentrequest->Epackinglists as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                    @endforeach
                  </div>


              
              </div>



              <div class="col-md-4">
                  
                  <div class="form-group">
                   
                    <div>{{trans('back.custom_isubstance')}}</div>
                    
                     @if ($Equipmentrequest->Custom)
                    <a href="{{route('equipmentrequest.viewcustom',$Equipmentrequest->id)}}" target="_blank">
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
                          <div>{{trans('back.otherinf_isubstance')}}</div>
                        <div class="textboxshow"> {{$Equipmentrequest->other_info}}</div>
                        </div>
              </div>


              <div class="col-md-12">&nbsp;&nbsp;</div>
              <div class="divider"></div>
              <div class="col-md-12">&nbsp;&nbsp;</div>
          <div class="row">
              <div class="col-md-4">
                  
                  <div class="form-group">
                    
                    <div>{{trans('back.invoice_isubstance')}}</div>

                    @foreach($Equipmentrequest->Einvoices as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank">  <i class="material-icons">cloud_download</i></a>
                    @endforeach

                  </div>
              </div>
              <div class="col-md-8"></div>


              <div class="col-md-4">
                      <div class="">
                        <div>{{trans('back.incoterm_isubstance')}}</div>
                        <div class="textboxshow">{{$Equipmentrequest->incoterm}}</div>
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="">
                        <div>{{trans('back.billdate_isubstance')}}</div>
                        <div class="textboxshow">{{$Equipmentrequest->billdate}}</div> 
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="">
                        <div>{{trans('back.billnumber_isubstance')}}</div>
                        <div class="textboxshow">{{$Equipmentrequest->billnumber}}</div> 
                      </div>
              </div>

              <div class="col-md-4">
                      <div class="">
                        <div>{{trans('back.totalprice_isubstance')}}</div>
                        <div class="textboxshow">{{$Equipmentrequest->invoice_value_other_currency}}</div>
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="">
                        <div>{{trans('back.currency_isubstance')}}</div>
                        <div class="textboxshow">{{$Equipmentrequest->currency}}</div> 
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="">
                        <div>{{trans('back.exchange_rate_isubstance')}}</div>
                        <div class="textboxshow">{{$Equipmentrequest->exchange_rate}}</div> 
                      </div>
              </div>

          </div>    
          <div class="divider"></div>
             
          </div>
        </div>
      </div>
       <div class="card-collapse">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               <strong class="theader">{{trans('ad_equipment.detail_equipment')}}</strong>
              <i class="material-icons">keyboard_arrow_down</i>
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
         <div class="card-body">

              <table class="table table-striped">
                <thead class="text-warning">
                   <th>{{trans('ad_equipment.description')}}</th>
                   <th>{{ trans('inputco.productimport') }}</th>
                   <th>{{ trans('theadcol2.material') }}<br/>(BTU/HP/KW)</th>
                   <th>{{ trans('theadcol3.material') }}</th>
                   
                   <th>{{trans('ad_equipment.amount')}}</th>
                   
                   <th>{{trans('ad_equipment.netweight')}}<br/>KGM</th>
                   <th>{{trans('ad_equipment.grossweight')}}<br/>KGM</th>
                   <th>{{trans('ad_equipment.value')}}</th>
                   <th >{{trans('back.quality_isubstance')}}</th>
                </thead>

                <tbody>
                    <?php $total= 0; ?>

                  @foreach($Equipmentrequest->Equipmentrequestdetail as $equipment)
                   <?php $total = $total + $equipment->amount; ?>
                  
                   <tr>
                   <td>{{$equipment->description}}</td>
                    <td>{{$equipment->Equipment->taxcode}}</td>
                    <td>{{$equipment->capvalue}} {{$equipment->capacity}}</td>
                    <td>{{$equipment->substance}}</td>
                    <td>{{  (int)$equipment->amount }} {{$equipment->uom}}</td>
                    <td>{{$equipment->netweight}}</td>
                    <td>{{$equipment->grossweight}}</td>
                    <td>{{$equipment->invoice_value}}</td>
                  
                    <td>{{$equipment->quality}}</td>
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
                    <th>{{ $total }} </th>
                    <th></th>
                  </tr>
                  <tr>
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
        </div>
</div>
             
             
   <div class="form-group">

       @if( $Equipmentrequest->astatus == 0 )
           @can('equipmentrequest.check')
            <a href="{{route('equipmentrequest.check',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.check_btn') }}" class="btn btn-primary"></a>
           @endcan
      @elseif( $Equipmentrequest->astatus == 1 )
           @can('equipmentrequest.verify')
               <a href="{{route('equipmentrequest.verify',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.verify_btn') }}" class="btn btn-primary"></a>
           @endcan
      @endif

      @if($Equipmentrequest->import_status == 0   && $Equipmentrequest->astatus == 2 )
          @can('equipmentrequest.approve')
                   <a href="{{route('equipmentrequest.approve',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.approve_btn') }}" class="btn btn-primary"></a>
               @endcan
           @can('equipmentrequest.reject')
                  <a href="{{route('equipmentrequest.reject',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.reject_btn') }}" class="btn btn-danger"></a>
              @endcan

      @elseif($Equipmentrequest->import_status == 2 )
          @can('equipmentrequest.finalize')
                   <a href="{{route('equipmentrequest.finalize',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.end_btn') }}" class="btn btn-success"></a>
               @endcan
           @can('equipmentrequest.reject')
                  <a href="{{route('equipmentrequest.reject',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.reject_btn') }}" class="btn btn-danger"></a>
              @endcan

          <a href="{{route('equipmentrequest.printv',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.print_btn') }}" class="btn btn-info"></a>   


      @elseif($Equipmentrequest->import_status == 3 )

          <a href="{{route('equipmentrequest.printv',$Equipmentrequest->id)}}"><input type="button" value="{{ trans('back.print_btn') }}" class="btn btn-info"></a>
      @endif
          <a href="{{route('equipmentrequest')}}"><input type="button" value="{{ trans('back.back_btn') }}" class="btn btn-default"></a>
           <a href="{{route('equipmentrequest.re_req',$Equipmentrequest->id)}}"><input type="button" value="Request" class="btn btn-info"></a>
  </div>
       
 <div class="col-md-12">&nbsp;</div>

            </div>
          </div>
      </div>
  </div>
   
@endsection
