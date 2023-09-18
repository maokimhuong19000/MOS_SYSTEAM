@extends('layout.front')
@section('content')
@include('layout.partical.headuser')

<div class="container">
      <div  class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
        <div class="padding-top-xs">
            <div class="content_bottom_font padding-sm text-center"><b>{{trans('front_equipmentdetail.detail')}}</b></div>

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
            {{trans('idata.isubstance_no')}} : {{$Equipmentrequest->request_no}}
          </span></div>
          <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">
            {{trans('idata.lpco')}} : {{@$Equipmentrequest->licence_no}}
          </span></div>
          <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">{{trans('idata.isubstance_status')}} : 
            <span class="{{ \App\Helpers\AppHelper::instance()->import_status_classf($Equipmentrequest->import_status) }}"> {{ \App\Helpers\AppHelper::instance()->import_status($Equipmentrequest->import_status) }}</span></span></div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
          
          
          <div class="col-md-12">
              <span class="content_bottom_font_sm">{{trans('front_isubstance.importer_company')}}</span>
          </div>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
          <div class="col-md-12">
                
                <div class="col-md-6">
                  
                  <div class="form-group">
                     <span>{{trans('name.isubstance')}}</span>
                  <input type="text" class="form-control" id="manufacture_name" name="manufacture_name" value="{{$Equipmentrequest->manufacture_name}}" disabled="true">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <span>{{trans('countries.fro_isubstance')}}</span>
                    <input type="text" class="form-control" value="{{@$Equipmentrequest->mcountry->countries_name}}" disabled="true">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                     <span>{{trans('front_address.address')}} </span>
                   <textarea type="textarea" name="address" placeholder="Enter Address" class="form-control" value="{{$Equipmentrequest->address}}" disabled="true">{{$Equipmentrequest->address}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-12">

                <div class="col-md-6">
                  <div class="form-group">
                     <span>{{trans('isubstance.manufacture_name')}}</span>
                  <input type="text" class="form-control" id="import_port" name="import_port" placeholder="Enter Manufacture name" value="{{$Equipmentrequest->import_port}}" disabled="true">
                  </div>
                </div>

                <div class="col-md-6">
                  
              <div class="form-group">
                    <span>{{trans('countries.fro_isubstance')}}</span>
                   <input type="text" class="form-control" value="{{@$Equipmentrequest->country->countries_name}}" disabled="true">
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
                     <span class="control-label">{{trans('tranporttype.isubstance')}}</span>
                   <input type="text" class="form-control" id="" name=""
                   ] value="{{$Equipmentrequest->transport==1 ? 'SEA Transport' :'Road Transport' }}" disabled="true">
                  </div>
                
                </div>




                <div class="col-md-6">
                  <div class="form-group">
                     <span>{{trans('front_isubstance.place_exportmanufactur')}}</span>
                  <input type="text" class="form-control" id="place_export" name="place_export" value="{{$Equipmentrequest->place_export}}" disabled="true">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                     <span class="control-label">{{trans('front_isubstance.place_importmanufactur')}}</span>
                   <input type="text" class="form-control" id="place_import" name="place_import" value="{{$Equipmentrequest->Port_Entries->port_name}}" disabled="true">
                  </div>
                
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                  <span>{{trans('Incoming_arrival.fro_isubstance')}}</span>
                    <span class="smtext"><input type="text" class="import_date form-control" name="import_date" id="d1" value="{{\App\Helpers\AppHelper::instance()->format_date($Equipmentrequest->import_date)}}" disabled="true"></span>
                 
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
							    		<select name="purpose" id="purpose_of_use" class="form-control" disabled="disabled">
							    			<option value="1"  {{ (old('purpose') ==1 ? "selected":"" )}}>{{trans('production.fro_isubstance')}}</option>
							    			<option value="2" {{ (old('purpose') == 2 ? "selected":"" )}}>{{trans('air_conditioner.fro_isubstance')}}</option>
							    			<option value="3" {{ (old('purpose') == 3 ? "selected":"" )}}>{{trans('other.fro_isubstance')}}</option>
							    		</select>
							    	</div>
							   
							</div>
	  		    		</div>


	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
	  		    				
							    	<div>
							    		<span>
							    		{{trans('other.fro_isubstance')}}</span>
							    	</div>
							    	<div>
							    		<input type="text" name="other_option_description" id="text_other" class="form-control" disabled="disabled"  value="{{old('other_option_description')}}">
							    	</div>
							   
	  		    			</div>

	  		    		</div>

 
  		    		
	  		    		<div class="col-md-12">
	  		    			<div class="form-group">
							    <span>{{trans('front_isubstance.other_info')}}</span>
							    <div>
							      <textarea type="textarea" class="form-control" name="other_info" disabled="disabled">{{{ old('other_info') }}}</textarea>
							    </div>
							</div>
	  		    		</div>


              <div class="col-md-6">
                  <div class="form-group">
                     
                    <label>{{trans('front_isubstance.file_shipping')}}</label><br>
                    @foreach($Equipmentrequest->Eladings as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a><br/>
                    @endforeach

                    
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                   
                    <label>{{trans('front_isubstance.File_customer_declar')}}</label><br>
                     @foreach($Equipmentrequest->Epackinglists as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a><br/>
                    @endforeach
                  </div>


              
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
                    <input type="text" disabled="disabled" name="incoterm" value="{{$Equipmentrequest->incoterm}}" class="form-control">
                          </div>
            </div>
            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.billdate')}}</span>
                          <span class="smtext">
                        <input type="text" class="billdate form-control" name="billdate" value="{{$Equipmentrequest->billdate}}" id="d1" disabled="disabled"></span>
                      </div>
            </div>
            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.billnumber')}}</span>				  
                        <input type="text" disabled="disabled" class="  form-control" name="billnumber" value="{{$Equipmentrequest->billnumber}}"> 
                      </div>
            </div>

            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.invoicevalueother')}}</span>	  
                        <input type="text" value="{{$Equipmentrequest->invoice_value_other_currency}}" class="form-control" name="invoice_value_other_currency"  disabled="disabled"> 
                      </div>
            </div>

            <div class="col-md-4"> 
                      <div class="form-group">
                            <span>{{trans('isubstance.currency')}}</span>
                          
                    <input type="text" disabled="disabled" name="currency" value="{{$Equipmentrequest->currency}}" class="form-control">
                      </div>
            </div>

            <div class="col-md-4"> 
            <div class="form-group">
                            <span>{{trans('isubstance.exchangerate')}}</span>
                <input type="text" disabled="disabled" class="  form-control" name="exchange_rate"   value="{{$Equipmentrequest->exchange_rate}}"> 
            </div>
            </div>

            <div class="col-md-4">
                  
                  <div class="form-group">
                    <label>{{trans('front_isubstance.File_Invioce')}}</label><br>
                    @foreach($Equipmentrequest->Einvoices as $ind => $file)
                    <a href="{{asset($file->file_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a><br/>
                    @endforeach
                  </div>
              </div>

              </div>
    </div>
  </div>
  <div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_iequipment.request_detail')}}</span></div>
    <div class="panel-body">
    <div id="" class="mtable">
    <table id="ManageTable" class="table  table-bordered" style="width:100%">
            <thead>

                    <tr>
                			<th >#</th>
                      <th>{{trans('iequipment.type')}}</th>
                      <th>{{trans('isubstance.amount')}}</th>
			                <th>{{trans('iequipment.desc')}}</th>		
                      <th>{{trans('iequipment.capacity')}}</th>
                      <th>{{trans('iequipment.weight')}}</th>
									    <th>{{trans('iequipment.invoicevalue')}}</th>
                      <th>{{trans('iequipment.substance')}}</th>
                      <th>{{trans('isubstance.quanlity')}}</th>
                    </tr>
            </thead>

            <tbody>
               @foreach($Equipmentrequest->Equipmentrequestdetail as $index => $equipment)
			                  <tr>
			                  	<td>{{($index+1)}}</td>
			                    <td>{{$equipment->Equipment->taxcode}}{{$equipment->Equipment->product_name}}</td>
                          <td>{{$equipment->amount}}{{@$equipment->uom}}</td>
                          <td>{{$equipment->description}}</td>
                          <td>{{$equipment->capvalue}}{{$equipment->capacity}}</td>
			                    <td>{{@$equipment->netweight}}KG <br>{{@$equipment->grossweight}}KG</td>			                    
			                    <td>{{@$equipment->invoice_value }} {{@$Equipmentrequest->currency}}</td>
                          <td>{{@$equipment->substance}} {{@$Equipmentrequest->substance}}</td>
                          <td>{{$equipment->quality}}</td>
			                  </tr>
			                  @endforeach

            </tbody>
        </table>
    </div>
                

         <div class="form-group">
           

         </div>

         @if ($Equipmentrequest->import_status >= 2 )
       
            <div class="form-group">
              
                  <span>{{trans('front_isubstance.file_department')}}</span>
                 
                 
              </div>

      
         @endif


         <div class="col-sm-6 "></div>
    <div class="col-sm-6 ">
        <div class="text-right">

          <a href="{{route('front.idata')}}" class="btn btn-primary btn-lg">Back</a>
          @if($Equipmentrequest->import_status < 2)
          <a href="{{route('front.update_equipment',$Equipmentrequest->id)}}" class="btn btn-success btn-lg">កែប្រែ/Edit</a>
          @endif
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

	
	
	
	
	
	
	