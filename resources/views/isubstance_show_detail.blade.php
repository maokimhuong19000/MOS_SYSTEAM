@extends('layout.front')
@section('content')
@include('layout.partical.headuser')

   <div class="container">
      <div  class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
        <div class="padding-top-xs">
            <div class="content_bottom_font padding-sm text-center"><b>{{trans('head.fro_isubstance')}}</b></div>
        </div>          
        <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="col-md-12 ">
                 <div class="flash-message">
                  @foreach (['error', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{$key}} ">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>

          
  <div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('industry.fro_isubstance')}} </span></div>
    <div class="panel-body">
<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
          <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">
            {{trans('idata.isubstance_no')}} : {{$isubdetail->request_no}}
          </span></div>
          <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">
            {{trans('idata.lpco')}} : {{@$isubdetail->licence_no}}
          </span></div>
          <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">{{trans('idata.isubstance_status')}} :
            <span class="{{ \App\Helpers\AppHelper::instance()->import_status_classf($isubdetail->import_status) }}"> {{ \App\Helpers\AppHelper::instance()->import_status($isubdetail->import_status) }}

            </span></span></div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
          <div class="col-md-12">
              <span class="content_bottom_font_sm">{{trans('front_isubstance.importer_company')}}</span>
          </div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

          <div class="col-md-12">
                
                <div class="col-md-6">
                  
                  <div class="form-group">
                     <span>{{trans('name.isubstance')}}</span>
                  <input type="text" class="form-control" id="manufacture_name" name="manufacture_name" value="{{$isubdetail->manufacture_name}}" disabled="true">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <span>{{trans('countries.fro_isubstance')}}</span>
                    <input type="text" class="form-control" value="{{$isubdetail->mcountry->countries_name}}" disabled="true">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                     <span>{{trans('front_address.address')}} </span>
                   <textarea type="textarea" name="address" placeholder="Enter Address" class="form-control" value="{{$isubdetail->address}}" disabled="true">{{$isubdetail->address}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-12">

                <div class="col-md-6">
                  <div class="form-group">
                     <span>{{trans('isubstance.manufacture_name')}}</span>
                  <input type="text" class="form-control" id="import_port" name="import_port" placeholder="Enter Manufacture name" value="{{$isubdetail->import_port}}" disabled="true">
                  </div>
                </div>

                <div class="col-md-6">
                  
              <div class="form-group">
                    <span>{{trans('countries.fro_isubstance')}}</span>
                   <input type="text" class="form-control" value="{{$isubdetail->country->countries_name}}" disabled="true">
                  </div>
                </div>
                

                

              </div>
              <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
              <div class="col-md-12">
              <span class="content_bottom_font_sm">{{trans('front_isubstance.transport_detail')}}</span>
          </div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

              <div class="col-md-12">


              <div class="col-md-6">
	  		    			
	  		    			<div class="form-group">
	  		    				 <span>{{trans('tranporttype.isubstance')}}</span>
	  		    				 <input type="text" value="{{$isubdetail->transport==1 ? 'SEA Transport' :'Road Transport' }}" disabled="disabled" id="transport" name="transport" class="form-control">

	  		    			</div>
	  		    		</div>

                <div class="col-md-6">
                  <div class="form-group">
                     <span>{{trans('front_isubstance.place_exportmanufactur')}}</span>
                  <input type="text" class="form-control" id="place_export" name="place_export" value="{{$isubdetail->place_export}}" disabled="true">
                  </div>
                </div>

                <div class="col-md-6">

							      <div class="form-group">
								  		<span>
                         {{trans('front_isubstance.transit')}}&nbsp;&nbsp;:</span>
									    <input id="tcountry" value="{{@$isubdetail->Tcountry->countries_name}}"   class="form-control tcountry" name="tcountry" disabled="disabled">
									  
									    
								</div>

						</div>


						<div class="col-md-6">

								<div class="form-group">
									<span> {{trans('front_isubstance.transit_port')}}&nbsp;&nbsp;:</span>
								
                  <input type="text" value="{{$isubdetail->des_port}}" disabled="disabled" id="des_port"   class="form-control des_port" name="des_port">
									</select>
									
								</div>
							
						</div>
        

                <div class="col-md-6">
                  <div class="form-group">
                     <span class="control-label">{{trans('front_isubstance.place_importmanufactur')}}</span>
                   <input type="text" class="form-control" id="place_import" name="place_import" value="{{$isubdetail->Port_Entries->port_name}}" disabled="true">
                  </div>
                
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                  <span>{{trans('Incoming_arrival.fro_isubstance')}}</span>
                    <span class="smtext"><input type="text" class="import_date form-control" name="import_date" id="d1" value="{{$isubdetail->import_date}}" disabled="true"></span>
                 
              </div>
                </div>
              </div>

              <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
          <div class="col-md-12">
              <span class="content_bottom_font_sm">{{trans('industry.fro_isubstance')}}</span>
          </div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                 
                    <div>
                      <span>{{trans('purpos_of_use.fro_isubstance')}}</span>
                    </div>
                    <div>
                        <input type="text" name="purpos_of_use" id="text_other" class="form-control" disabled="disabled" value="{{ $isubdetail->manufacture_option? trans('production.fro_isubstance') : '' }}
                        {{ $isubdetail->aircon_service_option? trans('air_conditioner.fro_isubstance'): ''}}
                        {{ $isubdetail->other_option? trans('other.fro_isubstance'): ''}}
                                " >
                    </div>
                 
                 </div>
                </div>
                
                

                <div class="col-md-6">
                  
                  <div class="form-group">
                    
                    <div>
                      <span>{{trans('other.fro_isubstance')}}</span>
                    </div>
                    <div>
                      <input type="text" name="other_option_description" id="text_other" class="form-control" disabled="disabled" value="{{$isubdetail->other_option_description}}">
                    </div>
                 
                  </div>
                  

                </div>

              </div>



              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                  <span>{{trans('own_business.fro_isubstance')}}&nbsp;&nbsp;:</span>
                  <div>
                    <div class="input-group">
                      <input id="self_usage_percent" type="text" class="form-control self_usage_percent" name="self_usage_percent" onKeyUp="indu_other(this)"  disabled="disabled" value="{{$isubdetail->self_usage_percent}}">
                      <span class="input-group-addon">%</span>
                  </div>
                  </div>
              </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <span>
                    {{trans('sold_other_enterprise.fro_isubstance')}}:</span>
                  <div>
                     <div class="input-group">
                      <input id="other_usage_percent" type="text" class="form-control other_usage_percent" name="other_usage_percent"  disabled="disabled"   disabled="disabled" value="{{$isubdetail->other_usage_percent}}" >
                      <span class="input-group-addon">%</span>
                  </div>
                  </div>
              </div>
                </div>

              </div>





              <div class="col-md-12">

              <div class="col-md-6">
                  <div class="form-group">
                     
                    <label>{{trans('front_isubstance.file_shipping')}}</label><br>
                    @foreach($isubdetail->Iladings as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a><br/>
                    @endforeach

                    
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                   
                    <label>{{trans('front_isubstance.File_customer_declar')}}</label><br>
                     @foreach($isubdetail->Ipackinglists as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a><br/>
                    @endforeach
                  </div>


              
              </div>




              </div>




                <div class="col-md-12">
                  <div class="form-group">
                    <span>{{trans('front_isubstance.other_info')}}</span>
                    <textarea  disabled="disabled" type="textarea" class="form-control" name="other_info">
                      {{$isubdetail->other_info}}</textarea>
                  
                  </div>
                </div>

                <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
          <div class="col-md-12">
              <span class="content_bottom_font_sm">{{trans('front_isubstance.invoice_info')}}</span>
          </div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
          <div class="col-sm-12 " >
          <div class="col-md-4"> 
            <div class="form-group">
                            <span>{{trans('isubstance.incoterm')}}</span>
                    <input type="text" disabled="disabled" name="incoterm" value="{{$isubdetail->incoterm}}" class="form-control">
                          </div>
            </div>
            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.billdate')}}</span>
                          <span class="smtext">
                        <input type="text" class="billdate form-control" name="billdate" value="{{$isubdetail->billdate}}" disabled="disabled"></span>
                      </div>
            </div>
            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.billnumber')}}</span>				  
                        <input type="text" disabled="disabled" class="  form-control" name="billnumber" value="{{$isubdetail->billnumber}}"> 
                      </div>
            </div>

            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.invoicevalueother')}}</span>	  
                        <input type="text" value="{{$isubdetail->invoice_value_other_currency}}" class="form-control" name="invoice_value_other_currency"  disabled="disabled"> 
                      </div>
            </div>

            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.currency')}}</span>
                          
                    <input type="text" disabled="disabled" name="currency" value="{{$isubdetail->currency}}" class="form-control">
                      </div>
            </div>

            <div class="col-md-4"> 
            <div class="form-group">
                            <span>{{trans('isubstance.exchangerate')}}</span>
                <input type="text" disabled="disabled" class="  form-control" name="exchange_rate"   value="{{$isubdetail->exchange_rate}}"> 
            </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">  
                    <label>{{trans('front_isubstance.File_Invioce')}}</label><br>
                    @foreach($isubdetail->Iinvoices as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank">
                       <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a><br/>
                    @endforeach
                </div>
              </div>

           

    </div>
  </div>
  
  <div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.material_request_detail')}}</span></div>
    <div class="panel-body mtable">
                <table id="ManageTable" class="table  table-bordered" style="width:100%">
            <thead>
              <tr>
                <th >#</th>
                <th>{{trans('isubstance.type')}}</th>
                <th >{{trans('isubstance.putting')}}</th>
                <th >{{trans('isubstance.amount')}}</th>
                <th >{{trans('isubstance.quantity')}}</th>
                <th>{{trans('isubstance.gross')}} (KGM)</th>
								<th>{{trans('isubstance.invoicevalue')}}</th>
                <th>{{trans('isubstance.quanlity')}}</th>
              </tr>
            </thead>

            <tbody>
              @foreach($isubdetail->Materialrequestdetails as $index =>  $materials)
              <tr>
                <td>{{($index+1)}}</td>
                <td>{{$materials->material['substance']}}</td>
                <td>{{$materials->store_type==1? "-":$materials->store_type . ""}}</td>
                <td>{{$materials->number}} {{@$materials->uom}}</td>
                <td>{{ \App\Helpers\AppHelper::instance()->format_kg($materials->quantity) }}</td>
                <td>{{ \App\Helpers\AppHelper::instance()->format_kg(@$materials->grossweight) }}</td>
                <td>{{@$materials->invoice_value}} {{@$isubdetail->invoice_value}}</td>

                 <td>{{$materials->quality}}</td>
              </tr>
              @endforeach
           
            </tbody>
        </table>

 

         @if ($isubdetail->import_status >= 2 )
          
        
            <div class="form-group">
               <div class="form-group">
                  <span>{{trans('front_isubstance.file_department')}}</span>  
              </div>
            </div>
      
         @endif


                <div class="col-sm-6 "></div>
                  <div class="col-sm-6 ">
                    <div class="text-right">
                      
                          <a href="{{route('front.idata')}}" class="btn btn-primary btn-lg">Back</a>
                           @if($isubdetail->astatus < 2 )
                               <a href="{{route('isubstance.esubstance',$isubdetail->id)}}" class="btn btn-success btn-lg">Edit/កែប្រែ</a>
                           @endif
                    </div>
                </div>

                </div>
    </div>
  </div>

                

</div>
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
     // $('#ManageTable').DataTable({  "order": [[ 0, "desc" ]], dom: '<"clear">rtip',   });
      $("#ididata").addClass("active");
    });
  </script>
@endsection