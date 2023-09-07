@extends('layout.front')
@section('content')
    @include('layout.partical.headuser')

    <form action="{{route('front.usubstance',$isubdetail->id)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
        {{ method_field('PUT')}}
        @foreach($isubdetail->Iladings as $index => $file)
            <div id="hidden">

            </div>
        @endforeach
        @foreach($isubdetail->Ipackinglists as $index => $file)
            <div id="hide_c">

            </div>
        @endforeach
        @foreach($isubdetail->Iinvoices as $index => $file)
            <div id="hide_i">

            </div>
        @endforeach
        <div class="container">
            <div  class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
                <div class="padding-top-xs">
                    <div class="content_bottom_font padding-sm text-center"><b>កែប្រែសារធាតុ/Update Substance</b></div>
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


                    <div class="panel panel-moe">
                    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.importer_company')}}</span></div>
                        <div class="panel-body">
                            <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">
                                    {{trans('idata.isubstance_no')}} : {{$isubdetail->request_no}}
                                </span></div>
                                                    <div class="col-md-12"> <span id="data_isubstance " class="content_bottom_font_sm">{{trans('idata.isubstance_status')}} :
                                    <span class="{{ \App\Helpers\AppHelper::instance()->import_status_classf($isubdetail->import_status) }}"> {{ \App\Helpers\AppHelper::instance()->import_status($isubdetail->import_status) }}

                                    </span></span></div>
                            <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            <div class="col-md-12">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <span>{{trans('name.isubstance')}}</span><span class="star_require text-danger">*</span>
                                        <span class="smtext"></span>
                                        <input type="text" class="form-control" id="manufacture_name" name="manufacture_name" value="{{$isubdetail->manufacture_name}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span>{{trans('countries.fro_isubstance')}}</span>
                                        <span class="star_require text-danger">*</span>
                                        <select name="from_country_id" class="form-control">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}"  {{ $isubdetail->from_country_id == $country->id ? "selected":"" }}>{{$country->countries_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span>{{trans('front_address.address')}} </span><span class="star_require text-danger">*</span>
                                        <span class="smtext"></span><textarea type="textarea" name="address" placeholder="Enter Address" class="form-control" value="{{$isubdetail->address}}" >{{$isubdetail->address}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span>{{trans('isubstance.manufacture_name')}}</span><span class="star_require text-danger">*</span>
                                        <span class="smtext"></span><input type="text" class="form-control" id="import_port" name="import_port" placeholder="Enter Manufacture name" value="{{$isubdetail->import_port}}" >
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <span>{{trans('countries.fro_isubstance')}}</span>
                                        <select name="manufacture_country_id" class="form-control">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{ $isubdetail->manufacture_country_id == $country->id ? "selected":"" }}>{{$country->countries_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- ======================= -->

                    

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
                                                <input type="text" class="import_date form-control" name="import_date" id="d1" placeholder="datetime picker" value="{{$isubdetail->import_date}}"></span>                                      
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- ======================= -->


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
                                                <option value="1"  {{ $isubdetail->manufacture_option  ? "selected":"" }}>{{  trans('production.fro_isubstance')  }}</option>
                                                <option value="2" {{ $isubdetail->aircon_service_option ? "selected":"" }}>{{  trans('air_conditioner.fro_isubstance')}}</option>
                                                <option value="3" {{ $isubdetail->other_option  ? "selected":"" }}>{{  trans('other.fro_isubstance')}}</option>
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
                                            <input type="text" name="other_option_description" id="text_other" class="form-control"  value="{{$isubdetail->other_option_description}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span><input type="checkbox" name="" value="1" id="percent_bus">{{trans('own_business.fro_isubstance')}}            :</span>
                                        <div>
                                            <div class="input-group">
                                                <input id="self_usage_percent" type="text" class="form-control self_usage_percent" name="self_usage_percent" onKeyUp="indu_other(this)"  value="{{$isubdetail->self_usage_percent}}">
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
                                                <input id="other_usage_percent" type="text" class="form-control other_usage_percent" name="other_usage_percent" onKeyUp="enterprise(this)"  value="{{$isubdetail->other_usage_percent}}">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- ADD FILE -->


                            <div class="col-md-12">
                            <div class="col-md-6"> 
									<div class="form-group">
	  		    				<span>	{{trans('front_isubstance.file_shipping')}}</span>				  
                                  <input type="hidden" name="file_fi[]" value="{{$file->file_path}}">
                                <a href="{{asset($file->file_path)}}" target="_blank"> <input type="button" value="View File" id="fi_{{$index+2}}" class="form-control invoice"></a> 
							</div>
                            <div class=" text-right ">
                                    <button type="button" class="btn btn-danger " id="add_inv">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                            </div>

				            </div>
                            <div class="col-md-6"> 
									<div class="form-group">
	  		    				<span>	{{trans('front_isubstance.File_customer_declar')}}</span>				  
								<input type="hidden" name="file_fi[]" value="{{$file->file_path}}">
                                <a href="{{asset($file->file_path)}}" target="_blank"> <input type="button" value="View File" id="fi_{{$index+2}}" class="form-control invoice"></a> 
							</div>
                            <div class=" text-right ">
                                    <button type="button" class="btn btn-danger " id="add_inv">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                            </div>

				            </div>
                            </div>

                            
                        
                         
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span>{{trans('front_isubstance.other_info')}}</span>
                                        <div>
                                            <textarea type="textarea" class="form-control" name="other_info">{{$isubdetail->other_info}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                  <!-- ================================================= -->


                    <div class="panel panel-moe">
                    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.invoice_info')}}</span></div>
                        <div class="panel-body">
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
								<input type="text" class="billdate form-control" name="billdate" id="dbill" placeholder="datetime picker" value="{{$isubdetail->billdate}}"></span>
							</div>
				        </div>
                        
                        <div class="col-md-4"> 
									<div class="form-group">
	  		    				<span>{{trans('isubstance.billnumber')}}</span>				  
								<input type="text" class="  form-control" name="billnumber" value="{{$isubdetail->billnumber}}"> 
							</div>
				        </div>

                        <div class="col-md-4"> 
							<div class="form-group">
	  		    				<span>{{trans('isubstance.invoicevalueother')}}</span>	  
								<input type="text" class="form-control" name="invoice_value_other_currency" value="{{$isubdetail->invoice_value_other_currency}}"> 
							</div>
		                </div>

                        <!-- ====== -->
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
							    <input type="hidden" name="file_fi[]" value="{{$file->file_path}}">
                                <a href="{{asset($file->file_path)}}" target="_blank"> <input type="button" value="View File" id="fi_{{$index+2}}" class="form-control invoice"></a>
							    <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
							</div>
                                <div class=" text-right ">
                                    <button type="button" class="btn btn-danger " id="add_inv">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                                </div>
                            </div>
                                

                            </div>
                        </div>
                  


                    <!-- ================================= -->

                    

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
                                        <th>{{trans('isubstance.quantity')}}</th>
                                        <th>{{trans('isubstance.gross')}} (KGM)</th>
								        <th>{{trans('isubstance.invoicevalue')}}</th>
                                        <th>{{trans('isubstance.quanlity')}}</th>
                                        {{--                                    @foreach($isubdetail->Materialrequestdetails as $index =>  $materials)--}}
                                        <th><a id="remove" name="re" onclick="remove()" class="btn btn-danger
                                        btn-xs"><i
                                                        class="fa fa-trash"></i></a></th>
                                        {{--                                    @endforeach--}}
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($isubdetail->Materialrequestdetails as $index =>  $value)
                                        <tr id="row_{{$index}}">
                                            <td class='order'>{{($index+1)}}</td>
                                            <td id="dis_sub"><input type='hidden' name="material_id[]" id='material_id.row_{{$index+1}}'
                                                                    value="{{$value->material_id}}">{{$value->material['substance']}}</td>
                                            <td id="dis_store"><input type="hidden" name="store_type[]" id="store.row_{{$index+1}}"
                                                                      value="{{($value->store_type==1? "-":$value->store_type . "")}}">{{$value->store_type==1? "-":$value->store_type . ""}}</td>
                                            <td id="dis_num"><input type="hidden" name="number[]" id="number.row_{{$index+1}}"
                                                                    value="{{($value->number)}}">{{$value->number}}</td>
                                            <td id="dis_quantity"><input type="hidden" name="total[]" id="total.row_{{$index+1}}"
                                                                    value="{{ $value->quantity }}">{{$value->quantity }}Kg</td>
                                                                         <!-- editmorefield -->
                                            <td id="dis_gross"><input type="hidden" name="gross[]" id="gross.row_{{$index+1}}"
                                                                    value="{{($value->grossweight)}}">{{$value->grossweight}}Kg</td>
                                            <td id="dis_invoicevalue"><input type="hidden" name="invoice_value[]" id="invoice_value.row_{{$index+1}}"
                                                                    value="{{ $value->invoice_value }}">{{$value->invoice_value }}USD</td>

                                           
                                            <td id="dis_quality"><input type="hidden" name="quality[]" id="qu.row_{{$index+1}}"
                                                                        value="{{($value->quality)}}">{{$value->quality}}</td>
                                            <td><input type="checkbox" name="record"></td>
                                        </tr>
                                    @endforeach




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
                                            <h3 class="modal-title" id="exampleModalLongTitle">កែប្រែសតារាងសារធាតុ/Update Substance</h3>
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

                                                <div class="form-group">
                                                    <span>{{trans('isubstance.amount')}}</span><span class="star_require text-danger">*</span>
                                                    <input type="text" name="" class="form-control amount" id="amount" autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <span>{{trans('isubstance.quantity')}}</span><span class="star_require text-danger">*</span>
                                                    <input type="text" name="" class="form-control total" id="total" >
                                                </div>
                                                <div class="form-group">
                                                    <span>{{trans('isubstance.gross')}} (KGM)</span><span class="star_require text-danger">*</span>
                                                    <input type="text" name="" class="form-control gross" id="gross" >
                                                </div>

                                                <div class="form-group">
                                                    <span>{{trans('isubstance.invoice_value')}}</span><span class="star_require text-danger">*</span>
                                                    <input type="text" name="" class="form-control invoicevalue" id="invoice_value" >
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
                                            <button type="button" name="button" class="btn btn-primary" value="Save" id="add_sub">Add new</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end popup -->

                            <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        </div>

                        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        <div class="col-md-6 ">
                            <div class="text-right "><input type="submit" id="update" name="button" value="{{trans
                            ('label_contact.update_btn')}}" class="btn btn-primary btn-lg">
                                <a href="{{route('front.idata')}}"><input type="button"  value="{{trans('label_contact.cancel_btn')}}" class="btn btn-default btn-lg"></a>
                            </div>

                            </div>
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


            $('#d1').datepicker({
                format: "yy-mm-dd",
            });
            $('#dbill').datepicker({
                format: 'yy-mm-dd',  
            });

            // ========= add ship
            $("#add_ship").click(function(){

                var id = $('.ship').last().attr("id");

                //row_1
                id = id.substring(3);
                var new_id = Number(id) + 1;
                new_id_main = "dfs_" + new_id ;
                new_id = "fs_" + new_id;

                var new_file ='<div class=" col-xs-12 no-padding form-group" id="'+new_id_main+'"><div class="col-xs-10 no-padding" > <input type="file" name="file_shipping[]" class="form-control ship" id="'+new_id+'" accept="application/pdf,image/*"></div><div class="col-xs-1 "> <a   attr-id="'+new_id_main+'" class="btn btn-danger btn-xs remove_fs"><i class="fa fa-trash"></i></a></div></div>';

                $("#dfs_1").append(new_file);

            });


            // ============= Remove shipp
            $(document).on('click','.remove_fs',function(e) {
                var id = $(this).attr("attr-id");
                $("#"+id).remove();
            });


// ================== remove shipp
            $(document).on('click','#re_sh',function(e) {
                var Id = $(this).attr("attr-id");
                if($("#"+Id).remove()){
                    var getId =$(this).attr("value");
                    var hide =  "<input type='hidden' name='delete[]' value='"+getId+"'>";
                    $("#hidden").append(hide);

                }
            });
            // == Add Custom
            $("#add_custom").click(function(){

                var id = $('.custom').last().attr("id");

                //row_1
                id = id.substring(3);
                var new_id = Number(id) + 1;
                new_id_main = "dfc_" + new_id ;
                new_id = "fc_" + new_id;

                var new_file ='<div class=" col-xs-12 no-padding form-group" id="'+new_id_main+'"><div class="col-xs-10 no-padding" > <input type="file" name="file_custom_declar[]" class="form-control custom" id="'+new_id+'" accept="application/pdf,image/*"></div><div class="col-xs-1 "> <a   attr-id="'+new_id_main+'" class="btn btn-danger btn-xs remove_custom"><i class="fa fa-trash"></i></a></div></div>';

                $("#dfc_1").append(new_file);

            });


            // Remonve Custom
            $(document).on('click','.remove_custom',function(e) {
                var id = $(this).attr("attr-id");
                $("#"+id).remove();
            });

            // remove custom from db
            $(document).on('click','#re_fc',function (e) {
                var id = $(this).attr("attr-id");
                if ($("#"+id).remove()){
                    var getId = $(this).attr("value");
                    var hide = '<input type="hidden" name="delete[]" value="'+getId+'">';
                    $("#hide_c").append(hide);
                }
            });



            // =============Add Icinvoce
            $("#add_inv").click(function(){

                var id = $('.inv').last().attr("id");

                //row_1
                id = id.substring(3);
                var new_id = Number(id) + 1;
                new_id_main = "dfi_" + new_id ;
                new_id = "fi_" + new_id;

                var new_file ='<div class=" col-xs-12 no-padding form-group" id="'+new_id_main+'"><div class="col-xs-10 no-padding" > <input type="file" name="file_invoice[]" class="form-control inv" id="'+new_id+'" accept="application/pdf,image/*"></div><div class="col-xs-1 "> <a   attr-id="'+new_id_main+'" class="btn btn-danger btn-xs remove_inv"><i class="fa fa-trash"></i></a></div></div>';

                $("#dfi_1").append(new_file);

            });
            // remove invice
            $(document).on('click','.remove_inv',function(e) {
                var id = $(this).attr("attr-id");
                $("#"+id).remove();
            });

            // Delete invoice from DB
            $(document).on('click','#re_fi',function (e) {
                var id = $(this).attr('attr-id');
                if ($("#"+id).remove())
                {
                    var getId = $(this).attr("value");
                    var hide = '<input type="hidden" name="delete[]" value="'+getId+'">';
                    $("#hide_i").append(hide);
                }
            });

            $("#idisubstance").addClass("active");
            // call function checkboxDisabled
            checkDisable();

            // ====================================================================
            // popup dialog box
            $('#form_isubstance').on('click',function(){
                $('#add_isubstance').modal('show');
                var amount=$('#amount').val('');
                var total=$('.total').val('');
            });

            // button add
            $("#add_sub").click(function(){
                var exist_input=$("input[name='material_id[]']").val();
                var material_val =$(".substance option:selected").val();
                var number=$('#amount').val();
                var other=($('.other option:selected').val() == 0?($('.other_c').val()-0):($('.other option:selected').val()-0) )
                var total=$('#total').val();
                var qu =  $("input[name='iquality']:checked").val();


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
                    "</td>"+


                    "<td>"+"<input type='hidden' name='store_type[]' id='store."+new_id+"' value='"+other+"'>"+other+"Kg/cly</td>"+

                    "<td>"+
                    "<input type='hidden' name='number[]' id='number."+new_id+"' value='"+number+"'>"+number+
                    "</td>"+

                    "<td>"+
                    "<input type='hidden' name='total[]' id='total."+new_id+"' value='"+total+"'>" +total+
                    "</td>"+

                    "<td>"+
                    "<input type='hidden' name='total[]' id='total."+new_id+"' value='"+total+"'>" +total+
                    "</td>"+
                    "<td>"+
                    "<input type='hidden' name='total[]' id='total."+new_id+"' value='"+total+"'>" +total+
                    "</td>"+

                    "<td>"+
                    "<input type='hidden' name='quality[]' id='qu."+new_id+"' value='"+qu+"'>" +qu+
                    "</td>"+



                    "<td>"+
                    "<input type='checkbox' name='record'>"+
                    "</td>"+

                    "</tr>";

                $("#table_isubstance tbody").append(markup);
                $.ajax({
                    type:'GET',
                    url:'{!!Route("findeSubstance")!!}',
                    data:{'id':material_val},
                    dataType:'json',
                    success:function(data)
                    {
                        return true;
                    }
                });
                $('#add_isubstance').modal('hide');
                $("#substance option:first").prop('selected',true);
                $('#amount').val('');
                $('#other').val('');
                $('.other option:first').prop('selected',true)

            });

            // ===================end button add =========================================


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

        });


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
@endsection