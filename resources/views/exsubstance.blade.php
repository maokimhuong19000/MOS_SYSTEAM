@extends('layout.front')
@section('content')
@include('layout.partical.headuser')
	
<form id="form_isub" action="{{route('isubstance.save')}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
<div class="container">
<div  class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
        <div class="padding-top-xs">
            <div class="content_bottom_font padding-sm text-center"><b>ក្រុមហ៊ុននាំចេញ / Export Substance</b></div>
        </div>   
		       
<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 ">  	
 			<div class="flash-message">
                  @foreach (['error', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-danger">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
            </div>
  	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
</div>

<div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.importer_company')}}</span></div>
    <div class="panel-body ">
		<div class="col-md-12">
						<div class="col-md-6">
	  		    			<div class="form-group">
	  		    				 <span>{{trans('name.isubstance')}}</span>
	  		    				 <span class="star_require text-danger">*</span>
							    <input type="text" class="form-control" id="manufacture_name" name="manufacture_name"
							    value="{{old('manufacture_name')}}">
	  		    			</div>
	  		    		</div>
	  		    		
	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
	  		    				<span>{{trans('countries.fro_isubstance')}}</span>
	  		    				<span class="star_require text-danger">*</span>
	  		    				<select name="from_country_id" class="form-control">
							      	@foreach($countries as $country)
							      	<option value="{{$country->id}}"  {{ (old('from_country_id') == $country->id ? "selected":"" )}}>{{$country->countries_name}}</option>
							      	@endforeach
							    </select>
	  		    			</div>
	  		    		</div>
						  <div class="col-md-12">
	  		    			<div class="form-group">
	  		    				 <span>{{trans('front_address.address')}} </span>
							     <textarea type="textarea" name="address" placeholder="Enter Address" class="form-control"
							      >{{old('address')}}</textarea>
	  		    			</div>
	  		    		</div>

						  <div class="col-md-6">
	  		    			<div class="form-group">
	  		    				 <span>{{trans('isubstance.manufacture_name')}}</span>
							    <input type="text" class="form-control" id="import_port" name="import_port" placeholder="Enter Manufacture name"  value="{{old('import_port')}}" >
	  		    			</div>
	  		    		</div>

	  		    		<div class="col-md-6">
	  		    			
							<div class="form-group">
	  		    				<span>{{trans('countries.fro_isubstance_manu')}}</span>
	  		    				<select name="manufacture_country_id" class="form-control">
							      	@foreach($countries as $country)
							      	<option value="{{$country->id}}" {{ (old('manufacture_country_id') == $country->id ? "selected":"" )}}>{{$country->countries_name}}</option>
							      	@endforeach
							    </select>
	  		    			</div>
	  		    		</div>
		</div>
	</div>
</div>

<div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.transport_detail')}}</span></div>
    <div class="panel-body ">
		<div class="col-md-12">

						<div class="col-md-6">
	  		    			
	  		    			<div class="form-group">
	  		    				 <span>{{trans('tranporttype.isubstance')}}</span>
	  		    				 <span class="star_require text-danger">*</span>
								   <select id="transport" name="transport" class="form-control">
									
							      	@foreach($transport as $tran)
							      	<option att-data="{{$tran->port_type}}" value="{{$tran->tcode}}"  {{ (old('transport') == $tran->tcode? "selected":"" )}}>{{$tran->description}}</option>
							      	@endforeach
							    </select>
	  		    			</div>
	  		    		</div>
	  		    		
	  		    		<div class="col-md-6">
						  <div class="form-group">
	  		    				<span>{{trans('front_isubstance.place_exportmanufactur')}}</span>
	  		    				<span class="star_require text-danger">*</span>
	  		    				<select id="place_export" name="place_export" class="form-control">
							      	@foreach($exportPort as $port)
							      	<option  value="{{$port->port_code}}"  {{ (old('place_export') == $port->port_code? "selected":"" )}}>
										{{$port->port_name}}</option>
							      	@endforeach
							    </select>
	  		    			</div>
	  		    		</div>

						<div class="col-md-6">

							      <div class="form-group">
								  		<span><input type="checkbox" name="transit" value="1" id="transit">{{trans('front_isubstance.transit')}}&nbsp;&nbsp;:</span>
									    <select id="tcountry"   class="form-control tcountry" name="tcountry" disabled="disabled">
										@foreach($countries as $country)
											<option value="{{$country->id}}">{{$country->countries_name}}</option>
										@endforeach
										</select>
									    
								</div>

						</div>

						<div class="col-md-6">

								<div class="form-group">
									<span> {{trans('front_isubstance.transit_port')}}&nbsp;&nbsp;:</span>
									<select id="des_port"   class="form-control des_port" name="des_port" disabled="disabled">
									@foreach($exportPort as $port)
										<option  value="{{$port->port_code}}" >
											{{$port->port_name}}</option>
										@endforeach
									</select>
									
								</div>
							
						</div>
						<div class="col-md-12"></div>

						<div class="col-md-6">
	  		    			<div class="form-group">
	  		    				<span class="control-label">{{trans('front_isubstance.place_importmanufactur')}}</span>
							    <span class="star_require text-danger">*</span>
							     <select name="place_import" id="place_import" class="form-control">
								 	@foreach($entry as $entries)
									 	<option value="{{$entries->id}}" 
										{{ (old('place_import')== $entries->id ? "selected":"")}}>
										{{$entries->port_name}}
										 </option>
									 @endforeach   
							     </select>
	  		    			</div>
	  		    		</div>

	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
							    <span>{{trans('Incoming_arrival.fro_isubstance')}}</span>
							      <span class="smtext">
									<input type="text" class="import_date form-control" name="import_date" id="d1" placeholder="datetime picker"></span>
							   
							</div>
	  		    		</div>

		</div>
	</div>
</div>


<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('industry.fro_isubstance')}} </span></div>
    <div class="panel-body">
   				<div class="col-md-12">

	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
							   
							    	<div>
							    		<span>{{trans('purpos_of_use.fro_isubstance')}}</span>
							    	</div>
							    	<div>
							    		<select name="purpose" id="purpose_of_use" class="form-control">
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

	  		    	<div class="col-md-6">
	  		    			<div class="form-group">
							    <span><input type="checkbox" name="" value="1" id="percent_bus">{{trans('own_business.fro_isubstance')}}&nbsp;&nbsp;:</span>
							    <div>
							      <div class="input-group">
									    <input id="self_usage_percent" type="text" class="form-control self_usage_percent" name="self_usage_percent" onKeyUp="indu_other(this)"  disabled="disabled" value="{{old('self_usage_percent')}}">
									    <span class="input-group-addon">%</span>
									</div>
							    </div>
							</div>
	  		    	</div>
	  		    	<div class="col-md-6">
	  		    			<div class="form-group">
							    <span>
							    	<input type="checkbox" id="enterprise_owner" name="" value="1">{{trans('sold_other_enterprise.fro_isubstance')}}:</span>
							    <div>
							       <div class="input-group">
									    <input id="other_usage_percent" type="text" class="form-control other_usage_percent" name="other_usage_percent" onKeyUp="enterprise(this)" disabled="disabled" value="{{old('other_usage_percent')}}">
									    <span class="input-group-addon">%</span>
									</div>
							    </div>
							</div>
	  		    	</div>

	  				<div class="col-md-6">
	  						<div class="form-group " id="dfs_1">
							    <span>{{trans('front_isubstance.file_shipping')}}</span>
							    <span class="star_require text-danger">*</span>
							    <input type="file" name="file_shipping[]" class="form-control ship" id="fs_1">
							    <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
							</div>
							
							<div class=" text-right col-sm-12 ">
		                      <button type="button" class="btn btn-primary "  id="add_ship" >
		                        <i class="glyphicon glyphicon-plus"></i>
		                      </button>
		                    </div>
	  				</div>

	  				<div class="col-md-6">
	  						<div class="form-group" id="dfc_1">
							    <span>{{trans('front_isubstance.File_customer_declar')}}</span>
							    <span class="star_require text-danger">*</span>
							    <input type="file" name="file_custom_declar[]" class="form-control custom" id="fc_1">
							    <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
							</div>
							
							<div class=" text-right ">
								<button type="button" class="btn btn-primary "  id="add_custom" >
									<i class="glyphicon glyphicon-plus"></i>
								</button>
		                  	</div>
							
	  				</div>


					<div class="col-md-12">
	  		    			<div class="form-group">
							    <span>{{trans('front_isubstance.other_info')}}</span>
							   
							      <textarea type="textarea" class="form-control" name="other_info">
							      	{{{ old('other_info') }}}
							      </textarea>
							    
							</div>
	  		    	</div>
				</div>

    </div>
  </div>

  <div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.invoice_info')}}</span></div>
    <div class="panel-body ">

	<div class="col-md-12">
		<div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.incoterm')}}</span>
	  		    				<span class="star_require text-danger">*</span>
	  		    				<select name="incoterm" class="form-control">			
								  @foreach($cif as $ic)
							      	<option  value="{{$ic->code}}"  {{ (old('incoterm') == $ic->code? "selected":"" )}}>
										{{$ic->code}} </option>
							      	@endforeach
 
							    </select>
	  		    			</div>
		</div>
		<div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.billdate')}}</span>
								  <span class="smtext">
								<input type="text" class="billdate form-control" name="billdate" id="dbill" placeholder="datetime picker"></span>
							</div>
		</div>
		<div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.billnumber')}}</span>				  
								<input type="text" class="  form-control" name="billnumber" > 
							</div>
		</div>

		<div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.invoicevalueother')}}</span>	  
								<input type="text" class="  form-control" name="invoice_value_other_currency" > 
							</div>
		</div>

		<div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.currency')}}</span>
	  		    				<span class="star_require text-danger">*</span>
	  		    				<select name="currency" class="form-control">			
								  @foreach($currency as $curr)
							      	<option  value="{{$curr->code}}"  {{ (old('currency') == $curr->code? "selected":"" )}}>
										{{$curr->code}} </option>
							      	@endforeach
 
							    </select>
	  		    			</div>
		</div>
		<div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.exchangerate')}}</span>
								<input type="text" class="  form-control" name="exchange_rate"   value="4150"> 
							</div>
		</div>
		

		<div class="col-md-4">
	  						<div class="form-group" id="dfi_1">
							    <span>{{trans('front_isubstance.File_Invioce')}}</span>
							    <span class="star_require text-danger">*</span>
							    <input type="file" name="file_invoice[]" class="form-control inv" id="fi_1">
							    <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
							</div>
							
							<div class=" text-right ">
								<button type="button" class="btn btn-primary "  id="add_inv" >
									<i class="glyphicon glyphicon-plus"></i>
								</button>
		                  	</div>
		</div>
		<div class="col-sm-8" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
	</div>

	</div>
</div>


  <div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.material_request_detail')}}</span></div>
    <div class="panel-body ">
	

    				
    			<div class="col-md-12 ">
		                    <div class=" text-right ">
		                      <button type="button" class="btn btn-primary " data-toggle="modal" id="form_isubstance" >
		                        <i class="glyphicon glyphicon-plus"></i>
		                      </button>
		                    </div>
		         </div>
		        
		         <div class="col-sm-12 col-xs-12 mtable" >
	  		    		<table class="table table-responsive" id="table_isubstance">
				        	<thead>
				        		<tr>
				        			<th>#</th>
				        			<th>{{trans('isubstance.type')}}</th>
				        			 
				        			<th>{{trans('isubstance.putting')}}</th>
				        			<th>{{trans('isubstance.amount')}}</th>
				        			<th>{{trans('isubstance.quantity')}} (KGM)</th>

				        			<th>{{trans('isubstance.gross')}} (KGM)</th>
									<th>{{trans('isubstance.invoicevalue')}}</th>

				        			<th>{{trans('isubstance.quanlity')}}</th>
				        			
				        			<th><a id="remove" onclick="remove()" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></th>
				        		</tr>
				        	</thead>

				        	<tbody>
				        		@if (old('total'))
								@foreach(old('total') as $index => $value)
									<tr id="row_{{$index}}">
							            <td class='order'>{{$index+1}}</td>
							            <td><input type='hidden' name='material_id[]' id='material_id.row_{{$index+1}}' 
							            	value="{{old('material_id')[$index]}}">{{old('sub')[$index]}}

											<input type="text" class="com_pany" id="com_pany" name="com_pany[]" disabled=""value="{{old('com')[$index]}}">
							            <input type="hidden" class="subc"  name="sub[]" value="{{old('sub')[$index]}}">
			            				<input type="hidden" class="subcom"  name="com[]" value="{{old('com')[$index]}}">
							            </td>


							            <td><input type="hidden" name="store_type[]" id="store.row_{{$index+1}}" 
							            	value="{{old('store_type')[$index]}}">{{old('store_type')[$index]}}Kg/cly</td>

							            <td><input type="hidden" name="number[]" id="number.row_{{$index+1}}" 
							            	value="{{old('number')[$index]}}">
											<input type="hidden" name="uom[]" id="uom.row_{{$index+1}}" value="{{old('uom')[$index]}}" >
											{{old('number')[$index]}}{{old('uom')[$index]}}</td>

							            <td><input type="hidden" name="total[]" id="total.row_{{$index+1}}" 
							            	value="{{$value}}">{{$value}}</td>

										<td><input type="hidden" name="gross[]" id="gross.row_{{$index+1}}" 
							            	value="{{old('gross')[$index]}}">{{old('gross')[$index]}}</td>
										<td><input type="hidden" name="invoicevalue[]" id="invoicevalue.row_{{$index+1}}" 
							            	value="{{old('invoicevalue')[$index]}}">{{old('invoicevalue')[$index]}}</td>

							            <td><input type="hidden" name="quality[]" id="qu.row_{{$index+1}}" 
							            	value="{{old('quality')[$index]}}">{{old('quality')[$index]}}</td>

							            	<td><input type="checkbox" name="record"></td>
						            </tr>

						          

								@endforeach
								@endif
				        	</tbody>
				        </table>
				   </div>
    </div>



	  		    	<div class="col-sm-12 ">
	  		    		
	  		    		
	  		    	


				        <!-- ========================pop up isubstance form ============================-->

				        	<div class="modal fade" id="add_isubstance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			                    <div class="modal-dialog" role="document">
			                      <div class="modal-content">
			                        <div class="modal-header" style="background-color: rgba(181, 188, 204, 1)!important;">
			                          <h3 class="modal-title" id="exampleModalLongTitle">{{trans('isubstance.modal_header')}}</h3>
			                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            <span aria-hidden="true">&times;</span>
			                          </button>
			                        </div>
			                        <div class="modal-body">
			                          <form id="form-modal">

			                          	<div class="form-group">
			                              <span>{{trans('isubstance.type')}}</span>
			                              <span class="star_require text-danger">*</span>
			                              <select name="" class="form-control substance" id="substance">
			                              	@foreach($Material as $material)
			                              	<option value="{{$material->material_id}}">{{$material->substance}}</option>
			                              	@endforeach
			                              </select>
			                            </div>

			                            <div class="form-group">
			                              <span>{{trans('isubstance.putting')}}</span><br/>
			                              <select name="" class="form-control other" id="other">
			                              	<option value="3">3kg /cly</option>
			                              	<option value="11.3">11.3kg /cly</option>
			                              	<option value="13.6">13.6kg /cly</option>
			                              	<option value="22.7">22.7kg /cly</option>
			                              	<option value="0">Other</option>
			                              </select>
			                            </div>

			                            <div class="form-group" style="display: none" id="type_other" >
			                              <span>ចំណុះផ្សេងទៀត/Other</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="other_c" class="form-control other_c" id="other_c" autocomplete="off" value="1" >
			                            </div>
			                          
										<div class="row">
											<div class="col-xs-6">
												<div class="form-group">
												<span>{{trans('isubstance.amount')}}</span><span class="star_require text-danger">*</span>
												<input type="text" name="" class="form-control amount" id="amount" autocomplete="off">
												</div>
											</div>
											<div class="col-xs-6">
												<div class="form-group">
													<span>{{trans('isubstance.uom')}}</span><span class="star_require text-danger">*</span>
													<select   name="" class="form-control uom" id="uom" autocomplete="off">
													@foreach($uom as $u)
													<option value="{{$u->code}}">{{$u->description}}</option>
													@endforeach
													</select>
													
												</div>
											</div>

										</div>

			                            <div class="form-group">
			                              <span>{{trans('isubstance.quantity')}} (KGM)</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="" class="form-control total" id="total" >
			                            </div>

										<div class="form-group">
			                              <span>{{trans('isubstance.gross')}} (KGM)</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="" class="form-control gross" id="gross" >
			                            </div>

										<div class="form-group">
			                              <span>{{trans('isubstance.invoicevalue')}}</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="" class="form-control invoicevalue" id="invoicevalue" >
			                            </div>

			                            <div class="form-group">
							              <span>{{trans('isubstance.quanlity')}}</span><br/>

							              <input type="radio" name="iquality" id="virgin" value="សុទ្ធ" checked>&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-default">{{trans('isubstance.net_product')}} </span><br>

							              

							              <input type="radio" name="iquality" id="both" value="សម្អាត និង កែច្នៃឡើងវិញ">&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info">{{trans('isubstance.clean_recycle')}}</span><br>
							            </div>
			                          </form>
			                        </div>
			                        <div class="modal-footer">
			                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                          <button type="button" class="btn btn-primary" id="add_sub">Add new</button>
			                        </div>
			                      </div>
			                    </div>
			                </div>
				        <!-- end popup -->


				        <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
	  		    	</div>
 
										<div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                       <div class="col-md-6 ">
                                          <div class="text-right "><input type="submit" value="{{trans('label_contact.save_btn')}}" class="btn btn-primary btn-lg"></div>

                                        </div>
	  		    </div>
		  	</div>
		</div>
    </div>

</form>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){

			

			

			var newdate ;
			if ('{{old('import_date')}}' != "" ){
				var parts ='{{old('import_date')}}'.split('-');
				newdate = new Date(parts[2], parts[1] - 1, parts[0]); 
				
			}else{
				newdate =  new Date();
			}

			$('#d1').datepicker({
		        format: "dd-mm-yyyy"
		      }).datepicker("setDate", newdate);

			  $('#dbill').datepicker({
		        format: "dd-mm-yyyy"
		      }).datepicker("setDate", newdate);

			$("#add_ship").click(function(){

				 		var id = $('.ship').last().attr("id");
				 		 
			            //row_1
			            id = id.substring(3);
			            var new_id = Number(id) + 1;
			            new_id_main = "dfs_" + new_id ; 
			            new_id = "fs_" + new_id;
			            
			            var new_file ='<div class=" col-xs-12 no-padding form-group" id="'+new_id_main+'"><div class="col-xs-10 no-padding" > <input type="file" name="file_shipping[]" class="form-control ship" id="'+new_id+'"></div><div class="col-xs-1 "> <a   attr-id="'+new_id_main+'" class="btn btn-danger btn-xs remove_fs"><i class="fa fa-trash"></i></a></div></div>';

			            $("#dfs_1").append(new_file);

			});

			$('body').on('change','[name="from_country_id"]',function(){
				$.ajax({
					type:'get',
					url: '{!! route('front.exportport')!!}',
					data:{country:$('select[name="from_country_id"] option:selected').val(),
						 },
					beforeSend: function(){
						$.LoadingOverlay("show");
					},
					success:function(x){
						var data = JSON.parse(x);
						var html = "";
						for ( var i = 0; i < data.length; i++ ) {
						html = html + '<option att-data="'+data[i].id+'" value="'+data[i].port_code+'">'+data[i].port_name+'</option>';
						}
						$('[name="place_export"]').html(html);
						$.LoadingOverlay("hide");

					}
				});
			});
			
	        $(document).on('click','.remove_fs',function(e) {
  				var id = $(this).attr("attr-id");
	            $("#"+id).remove();
			});


			$("#add_custom").click(function(){

				 		var id = $('.custom').last().attr("id");
				 		 
			            //row_1
			            id = id.substring(3);
			            var new_id = Number(id) + 1;
			            new_id_main = "dfc_" + new_id ; 
			            new_id = "fc_" + new_id;
			            
			            var new_file ='<div class=" col-xs-12 no-padding form-group" id="'+new_id_main+'"><div class="col-xs-10 no-padding" > <input type="file" name="file_custom_declar[]" class="form-control custom" id="'+new_id+'"></div><div class="col-xs-1 "> <a   attr-id="'+new_id_main+'" class="btn btn-danger btn-xs remove_custom"><i class="fa fa-trash"></i></a></div></div>';

			            $("#dfc_1").append(new_file);

			});


			
	        $(document).on('click','.remove_custom',function(e) {
  				var id = $(this).attr("attr-id");
	            $("#"+id).remove();
			});


			$("#add_inv").click(function(){

				 		var id = $('.inv').last().attr("id");
				 		 
			            //row_1
			            id = id.substring(3);
			            var new_id = Number(id) + 1;
			            new_id_main = "dfi_" + new_id ; 
			            new_id = "fi_" + new_id;
			            
			            var new_file ='<div class=" col-xs-12 no-padding form-group" id="'+new_id_main+'"><div class="col-xs-10 no-padding" > <input type="file" name="file_invoice[]" class="form-control inv" id="'+new_id+'"></div><div class="col-xs-1 "> <a   attr-id="'+new_id_main+'" class="btn btn-danger btn-xs remove_inv"><i class="fa fa-trash"></i></a></div></div>';

			            $("#dfi_1").append(new_file);

			});


			
	        $(document).on('click','.remove_inv',function(e) {
  				var id = $(this).attr("attr-id");
	            $("#"+id).remove();
			});
		


			 $("#idisubstance").addClass("active");
			// call function checkboxDisabled
			checkDisable();

			// =============================declare variable =======================
			// var amount=$('#amount').val();
			// var other=$('#other option:selected').val();
			// var total=$('#total').val();

			// ====================================================================
			// popup dialog box
			$('#form_isubstance').on('click',function(){
				$('#add_isubstance').modal('show');
				var amount=$('#amount').val('');
				var total=$('.total').val('');
			});
			// end popup ================================================================

			// button add 
			$("#add_sub").click(function(){
				var exist_input=$("input[name='material_id[]']").val();
				var material_val =$(".substance option:selected").val();
				var number=$('#amount').val();
				var other=($('.other option:selected').val() == 0?($('.other_c').val()-0):($('.other option:selected').val()-0) )
				var total=$('#total').val();
				var qu =  $("input[name='iquality']:checked").val();
				var gross=$('#gross').val();
				var invoicevalue = $('#invoicevalue').val();
				var uom = $('#uom').val();


					if ($('#table_isubstance tbody').children(':last').attr("id")) {
			            var id = $('#table_isubstance tbody').children(':last').attr("id");
			            //row_1
			            id = id.substring(4);
			            var new_id = Number(id) + 1;
			            new_id = "row_" + new_id;
			        } else {
			            var id = 0;
			            var new_id = Number(id) + 1;
			            new_id = "row_" + new_id;
			        }
			        // console.log(new_id);
					var markup = 
		            "<tr id='"+new_id+"'>"+
			            "<td class='order'>"+(Number(id) + 1)+"</td>"+

			            "<td>"+"<input type='hidden' name='material_id[]' id='material_id."+
			            new_id+
			            "' value='"+material_val+"'>" +$("#substance option:selected").text()+ 
						'<input type="text" class="com_pany" id="com_pany" name="com_pany[]" disabled>'+ "</td>"+
			            	'<input type="hidden" class="subc"  name="sub[]" value="'+$("#substance option:selected").text()+'">'+
			            	'<input type="hidden" class="subcom"  name="com[]" value="">'+
			            "</td>"+

			            
			        	"<td>"+"<input type='hidden' name='store_type[]' id='store."+new_id+"' value='"+other+"'>"+other+"Kg/cly</td>"+

			            "<td>"+
							"<input type='hidden' name='uom[]' id='uom."+new_id+"' value='"+uom+"'>"+
			            	"<input type='hidden' name='number[]' id='number."+new_id+"' value='"+number+"'>"+number+" "+ uom+
			            "</td>"+

			            "<td>"+
			            	"<input type='hidden' name='total[]' id='total."+new_id+"' value='"+total+"'>" +total+
			            "</td>"+

						"<td>"+
			            	"<input type='hidden' name='gross[]' id='gross."+new_id+"' value='"+gross+"'>" +gross+
			            "</td>"+

						"<td>"+
			            	"<input type='hidden' name='invoicevalue[]' id='invoicevalue."+new_id+"' value='"+invoicevalue+"'>" +invoicevalue+
			            "</td>"+

			           
			           "<td>"+
			            	"<input type='hidden' name='quality[]' id='qu."+new_id+"' value='"+qu+"'>" +qu+
			            "</td>"+

			           

			            "<td>"+
		                  "<input type='checkbox' name='record'>"+
		                "</td>"+

		            "</tr>";
		            /*var check_meterial_id = 0;
		            $("#table_isubstance input[name='material_id[]']").each(function(){
			   			if ($(this).val()==material_val){
			   				check_meterial_id = 1;
			   			}
		            });
		   			if (check_meterial_id>0){
		                alert('already substance existing');
		                $('#add_isubstance').modal('hide');
		            }
		            else{ */
			            $("#table_isubstance tbody").append(markup);
				            $.ajax({
								type:'GET',
								url:'{!!Route("findeSubstance")!!}',
								data:{'id':material_val},
								dataType:'json',
								success:function(data)
								{
									$('#'+new_id+' .com_pany').val(data.com_name);
									$('#'+new_id+' .subcom').val(data.com_name);
									//$('#'+new_id+' .subc').val(data.substance);
									//$('#'+new_id+' .code').val(data.code);
									return true;
								}
							});
						$('#add_isubstance').modal('hide');
						$("#substance option:first").prop('selected',true);
						$('#amount').val('');
						$('#other').val('');
						$('.other option:first').prop('selected',true);
					//}
    		});
    		
    		// ===================end button add =========================================

    		// event keyup when select option caculated
			// $('.amount,.other').keyup(function(){
			// 	var amount=$('#amount').val();
			// 	var other=$('#other').val();
			// 	var sub=amount*other;
			// 	$('#total').val(sub);
			// }); 

		//key change

			$('.other').change(function()
			{

				if ($(this).val() == 0){
					$("#type_other").show(500);
					var other = ($('.other_c').val()-0);
				}else{
					$("#type_other").hide(500);
					var other = ($('.other option:selected').val()-0);
				}

				var amount = ($('#amount').val()-0);
				//var other = ($('.other option:selected').val()-0);
				var sub=amount*other;
				$('.total').val(sub);
			});

			//key amount

			$('.amount').keyup(function()
			{
				var amount=($(this).val()-0);
				var other=($('.other option:selected').val() == 0 ?($('.other_c').val()-0):($('.other option:selected').val()-0) ) ;
				var sub=amount*other;
				$('.total').val(sub);
			});

			$('.other_c').keyup(function(){

				var amount = ($('#amount').val()-0);
				var other=($('.other option:selected').val() == 0?($(this).val()-0) : ($('.other option:selected').val()-0)) ;
				var sub=amount*other;
				$('.total').val(sub);

			});



			//////////////// new event

			
		$('body').on('change','[name="tcountry"]',function(){
				$.ajax({
					type:'get',
					url: '{!! route('front.exportport')!!}',
					data:{country:$('select[name="tcountry"] option:selected').val(),
						 },
					beforeSend: function(){
						$.LoadingOverlay("show");
					},
					success:function(x){
						var data = JSON.parse(x);
						var html = "";
						for ( var i = 0; i < data.length; i++ ) {
						html = html + '<option att-data="'+data[i].id+'" value="'+data[i].port_code+'">'+data[i].port_name+'</option>';
						}
						$('[name="des_port"]').html(html);
						$.LoadingOverlay("hide");

					}
				});
			});
		
			$("#transit").click(function () {
				$.LoadingOverlay("show");
	            if ($(this).is(":checked")) {
	                $("#tcountry").removeAttr("disabled");
					$("#des_port").removeAttr("disabled");
	                $("#tcountry").focus();
	            } 
	            else {
	                $("#tcountry").attr("disabled", "disabled");
					$("#des_port").attr("disabled", "disabled");
	            }
				$.LoadingOverlay("hide");
            });

		});

		// ========================= ajax save isubstance ===============================

		// $(document).ready(function(){
		// 	$('#form_isub').on('submit',function(){
		// 		var url=$(this).attr('action');
		// 		var method=$(this).attr('method');
		// 		$.ajax({
		// 			url:url,
		// 			type:method,
		// 			data:$(this).serialize(),
		// 			dataType:'json',
		// 			success:function(data){
						
		// 			}
		// 		});
		// 	});
		// });

		// ========================= end ajax save ======================================


	    // ==================================allow numeric===============================
		function indu_other(txb) {
		   txb.value = txb.value.replace(/[^\0-9]/ig, "");
		}
		function enterprise(txb) {
		   txb.value = txb.value.replace(/[^\0-9]/ig, "");
		}
		// ============================= end allow numeric ==============================
	

		// ========================  multi remove row  ==================================

		function remove()
		{
			$("#remove").click(function(){
	            $("#table_isubstance tbody").find('input[name="record"]').each(function(){
	                if($(this).is(":checked")){
	                    $(this).parents("tr").remove();
	                }
	            });
	            var i =1;
	            $('#table_isubstance tbody tr').each(function(){
	            	var id = $(this).attr('id');
	            	$('#'+id+' .order').text(i);
	            	i++;
	            });
	        });
		}

		// ===============================end multi remove function=============================================


		function checkDisable()
		{

            $("#purpose_of_use").change(function () {
	            if ($(this).val() == 3 ) {
	                $("#text_other").removeAttr("disabled");
	                $("#text_other").focus();
	            } 
	            else {
	                $("#text_other").attr("disabled", "disabled");
	            }
            });

            $("#percent_bus").click(function () {
	            if ($(this).is(":checked")) {
	                $("#self_usage_percent").removeAttr("disabled");
	                $("#self_usage_percent").focus();
	            } 
	            else {
	                $("#self_usage_percent").attr("disabled", "disabled");
	            }
            });

            $("#enterprise_owner").click(function () {
	            if ($(this).is(":checked")) {
	                $("#other_usage_percent").removeAttr("disabled");
	                $("#other_usage_percent").focus();
	            } 
	            else {
	                $("#other_usage_percent").attr("disabled", "disabled");
	            }
            });
		}

		// =====================================end function checked ==============================================


		

	</script>
@endsections