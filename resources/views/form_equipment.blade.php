@extends('layout.front')
@section('content')
@include('layout.partical.headuser')
	
<form id="equipment" action="{{route('equipmentrequest.store')}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
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
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('front_isubstance.importer_company')}} </span></div>
    <div class="panel-body">        

		  	<div class="col-md-12 ">
	  		    		<div class="col-md-6">
	  		    			
	  		    			<div class="form-group">
	  		    				 <span>{{trans('name.isubstance')}}&nbsp;&nbsp;:</span>
	  		    				 <span class="star_require text-danger">*</span>
							    <input type="text" class="form-control" id="manufacture_name" name="manufacture_name"  value="{{old('manufacture_name')}}">
	  		    			</div>
	  		    		</div>
	  		    		
	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
	  		    				<span>{{trans('countries.fro_isubstance')}}</span>
	  		    				<span class="star_require text-danger">*</span>
	  		    				<select name="country_id" class="form-control">
							      	@foreach($countries as $country)
							      	<option value="{{$country->id}}"  {{ (old('from_country_id') == $country->id ? "selected":"" )}}>{{$country->countries_name}}</option>
							      	@endforeach
							    </select>
	  		    			</div>
	  		    		</div>

	  		    		<div class="col-md-12">
	  		    			<div class="form-group">
	  		    				 <span>{{trans('front_address.address')}} </span>
							     <textarea type="textarea" name="address" placeholder="Enter Address" class="form-control">{{old('address')}}</textarea>
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
							      	<option  value="{{$port->port_code}}"  {{ (old('place_export') == $port->port_code? "selected":"" )}}>{{$port->port_name}}</option>
							      	@endforeach
							    </select>
	  		    			</div>
	  		    		</div>

	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
	  		    				 <span>{{trans('front_isubstance.place_importmanufactur')}}</span>
							     <select name="place_import" id="place_import" class="form-control">
								 	@foreach($entry as $entries)
									 	<option value="{{$entries->id}}" {{ (old('place_import')== $entries->id ? "selected":"")}}>{{$entries->port_name}}
										 </option>
									 @endforeach  
							     </select>
	  		    			</div>
	  		    		</div>

	  		    	

	  		    		<div class="col-md-6">
	  		    			<div class="form-group">
							    <span>{{trans('Incoming_arrival.fro_isubstance')}}</span>
							      <span class="smtext"><input type="text" class="import_date form-control" name="import_date" id="d1" placeholder="datetime picker"></span>
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
							    		<input type="text" name="other_option_description" id="text_other" class="form-control" disabled="disable" value="{{old('other_option_description')}}">
							    	</div>							   
	  		    			</div>
	  		    		</div>
 		    		
	  		    		<div class="col-md-12">
	  		    			<div class="form-group">
							    <span>{{trans('front_isubstance.other_info')}}</span>
							    <div>
							      <textarea type="textarea" class="form-control" name="other_info">{{{ old('other_info') }}}</textarea>
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
								  <span class="smtext"><input type="text" class="billdate form-control" name="billdate" id="dbill" placeholder="datetime picker"></span>
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
								<input type="text" class="form-control" name="invoice_value_other_currency" > 
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
				        			<th>{{trans('iequipment.type')}}</th>
				        			<th>{{trans('isubstance.amount')}}</th>
				        			<th>{{trans('iequipment.desc')}}</th>
									<th>{{trans('iequipment.capacity')}}</th>
				        			<th>{{trans('iequipment.weight')}}</th>
									<th>{{trans('iequipment.invoicevalue')}}</th>

				        			<th>{{trans('isubstance.quanlity')}}</th>
				        			<th><a id="remove" onclick="remove()" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></th>
				        		</tr>
				        	</thead>

				        	<tbody>
				        		@if (old('amount'))
								@foreach(old('amount') as $index => $value)
									<tr id="row_{{$index}}">
							            <td class='order'>{{$index+1}}</td>
							            <td><input type='hidden' name='equitment_id[]' id='material_id.row_{{$index+1}}' 
							            	value="{{old('equitment_id')[$index]}}">{{old('sub')[$index]}}
							            </td>
							            <td> <input type="hidden"   name="amount[]" value="{{$value}}">
							            <input type="hidden" class="subc"  name="sub[]" value="{{old('sub')[$index]}}">
										<input type="hidden" name="uom[]" id="uom.row_{{$index+1}}" value="{{old('uom')[$index]}}" >
			            				{{$value}}{{old('uom')[$index]}}
			            				</td>

							            <td><input type="hidden" name="des[]" id="store.row_{{$index+1}}" 
							            	value="{{old('des')[$index]}}">{{old('des')[$index]}} <br/>
											<input type="hidden" name="substance[]" id="total.row_{{$index+1}}" 
							            	value="{{old('substance')[$index]}}">Use Substance:{{old('substance')[$index]}}
										</td>

							            <td><input type="hidden" name="capacity[]" id="number.row_{{$index+1}}" 
							            	value="{{old('capacity')[$index]}}">{{old('capvalue')[$index]}} {{old('capacity')[$index]}}
											<input type="hidden" name="capvalue[]" id="number.row_{{$index+1}}" 
							            	value="{{old('capvalue')[$index]}}">
										</td>
							         
										
										<td>
											<input type="hidden" name="net[]" id="net.row_{{$index+1}}" 
							            	value="{{old('net')[$index]}}">NET: {{old('net')[$index]}}<br/>
											<input type="hidden" name="gross[]" id="gross.row_{{$index+1}}" 
							            	value="{{old('gross')[$index]}}">GROSS: {{old('gross')[$index]}}
										</td>
										
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


				        <!-- ========================pop up isubstance form ============================-->





	  		    </div>
		  	</div>

		  	<div class="row">

		  				<div class="modal fade" id="add_isubstance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			                    <div class="modal-dialog" role="document">
			                      <div class="modal-content">
			                        <div class="modal-header" style="background-color: rgba(181, 188, 204, 1)!important;">
			                   
			                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            <span aria-hidden="true">&times;</span>
			                          </button>
			                        </div>
			                        <div class="modal-body">
			                          <form id="form-modal">

			                          	<div class="form-group">
			                              <span>{{trans('iequipment.type')}}</span><br/>
			                              <select name="" class="form-control substance" id="equitment">
			                              	@foreach($equitment as $eq)
			                              		<option value="{{$eq->id}}">{{$eq->taxcode}}-{{$eq->product_name}}</option>
			                              	@endforeach
			                              </select>
			                            </div>
			                          
										<div class="row">
											<div class="col-xs-6">
												<div class="form-group">
												<span>{{trans('isubstance.amount')}}</span><br/>
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
			                              <span>{{trans('iequipment.desc')}}</span><br/>
			                              <input type="text" placeholder="Type here" class="form-control" id="des">
			                            </div>


			                            <div class="row">
			                            <div class="col-md-6">
			                             <div class="form-group">
			                              <span>{{trans('iequipment.capacity')}}</span><br/>
			                              <input type="text" placeholder="Type here" class="form-control" id="capvalue">
			                            </div>
			                        	</div>
			                        	<div class="col-md-6">
			                             <div class="form-group">
			                              <span>{{trans('iequipment.capacity_type')}}</span><br/>
			                              <select name="" class="form-control substance" id="capacity">
			                              	<option value="HP">HP</option>
			                              	<option value="KW">KW = 1.34102 HP</option>
			                              	<option value="BTU">BTU= 0.00039 HP</option>
			                              	<option value="liter">Liter </option>
			                              </select>
			                            </div>
			                        	</div>
			                        	</div>

										<div class="row">
											<div class="col-xs-6">
										<div class="form-group">
			                              <span>{{trans('iequipment.net')}}</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="" class="form-control net" id="net" >
			                            </div>
										</div>
										<div class="col-xs-6">
										<div class="form-group">
			                              <span>{{trans('iequipment.gross')}}</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="" class="form-control gross" id="gross" >
			                            </div>
										</div>
										</div>


										<div class="form-group">
			                              <span>{{trans('iequipment.invoicevalue')}}</span><span class="star_require text-danger">*</span>
			                              <input type="text" name="" class="form-control invoicevalue" id="invoicevalue" >
			                            </div>


			                            <div class="form-group">
			                              <span>{{trans('iequipment.substance')}}</span><br/>
			                              <select name="" class="form-control substance" id="substance">
			                              	@foreach($Material as $material)
			                              	<option value="{{$material->substance}}">{{$material->substance}}</option>
			                              	@endforeach
			                              </select>
			                            </div>

			                             <div class="form-group">
							              <span>{{trans('isubstance.quanlity')}}</span><br/>

							              <input type="radio" name="iquality" id="virgin" value="ថ្មី" checked>&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-default">{{trans('iequipment.new')}} </span><br>

							              

							              <input type="radio" name="iquality" id="both" value="ប្រើប្រាស់រួច">&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info">{{trans('iequipment.used')}}</span><br>
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


		  	</div>

		
										<div class="col-md-12"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
		  								<div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                       <div class="col-md-6 ">
                                          <div class="text-right "><input type="submit" value="{{trans('label_contact.save_btn')}}" class="btn btn-primary btn-lg"></div>

                                        </div>

		</div>
    </div>
</div>
</form>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){


			$("#purpose_of_use").change(function () {
	            if ($(this).val() == 3 ) {
	                $("#text_other").removeAttr("disabled");
	                $("#text_other").focus();
	            } 
	            else {
	                $("#text_other").attr("disabled", "disabled");
	            }
            });


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

			$('#capvalue').keypress(function(event) {
			    if(event.which < 46
			    || event.which > 59) {
			        event.preventDefault();
			    } // prevent if not number/dot

			    if(event.which == 46
			    && $(this).val().indexOf('.') != -1) {
			        event.preventDefault();
			    } // prevent if already dot
			});

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


			$('body').on('change','[name="country_id"]',function(){
				$.ajax({
					type:'get',
					url: '{!! route('front.exportport')!!}',
					data:{country:$('select[name="country_id"] option:selected').val(),
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
		

			 $("#idimaterial").addClass("active");

			 $("#table_isubstance tbody").find('input[name="record"]').each(function(){
	                if($(this).is(":checked")){
	                    $(this).parents("tr").remove();
	                }
	            });
			$('#form_isubstance').click(function()
			{
				$('#add_isubstance').modal('show');
				$("#amount").val('');
	            $("#des").val('');
	            $('#equitment option:first').prop('selected',true);
			});

			$('#add_sub').click(function(){
	            var equitment = $("#equitment option:selected").val();
	            var amount = $("#amount").val();
	            var des = $("#des").val();
	            var capacity = $("#capacity").val();
	            var capvalue = $("#capvalue").val();
	            var substance = $("#substance").val();
	            var qu =  $("input[name='iquality']:checked").val();
				var gross=$('#gross').val();
				var net=$('#net').val();
				var invoicevalue = $('#invoicevalue').val();
				var uom= $('#uom').val();

	            if ($('#table_isubstance tbody').children(':last').attr("id")) {
			            var id = $('#table_isubstance tbody').children(':last').attr("id");
			       
			            id = id.substring(4);
			            var new_id = Number(id) + 1;
			            new_id = "row_" + new_id;
			        } else {
			            var id = 0;
			            var new_id = Number(id) + 1;
			            new_id = "row_" + new_id;
			        }

	            // cheack exist quitment
	           /* var equitment_id=0;
	            $(" #table_isubstance input[name='equitment_id[]']").each(function(){
		            if ($(this).val()==equitment){
		   				equitment_id = 1;
		   			}
	            });
	            */

	            //if (equitment_id>0){
	              //  alert('already substance existing');
	               // $('#add_isubstance').modal('hide');
	            //}

	            //else{
	            var markup = 
                "<tr id='"+new_id+"'>"+

                    "<td>"+(Number(id) + 1)+"</td>"+

                    "<td>"+
                        "<input type='hidden' name='equitment_id[]' value='"+equitment+"'>"+$('#equitment option:selected').text()+

                    "</td>"+

                    "<td>"+
						"<input type='hidden' name='uom[]' id='uom."+new_id+"' value='"+uom+"'>"+
                        "<input type='hidden' name='amount[]' value='"+amount+"'>"+amount+" "+uom + 
                         "<input type='hidden' class='subc'  name='sub[]' value='"+$('#equitment option:selected').text()+"' >"+
                    "</td>"+

                    "<td>"+
                        "<input type='hidden' name='des[]' value='"+des+"'>"+des+
						"<input type='hidden' name='substance[]' value='"+substance+"'>USE Substance: "+substance+
                    "</td>"+

                    "<td>"+
                        "<input type='hidden' name='capacity[]' value='"+capacity+"'>"+capvalue+capacity+
						"<input type='hidden' name='capvalue[]' value='"+capvalue+"'>"+
                    "</td>"+

                   

					"<td>"+
			            	"<input type='hidden' name='net[]' id='net."+new_id+"' value='"+net+"'>NET:" +net+ "</br>"+
							"<input type='hidden' name='gross[]' id='gross."+new_id+"' value='"+gross+"'>GROSS:" +gross+
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

                $('#table_isubstance tbody').append(markup);
                $('#add_isubstance').modal('hide');
            //}
			});
		});

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

	</script>
@endsection
