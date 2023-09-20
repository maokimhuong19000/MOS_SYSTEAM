@extends('layout.front') @section('content') @include('layout.partical.headuser') <form action="{{route('equipment.update',$Equipmentrequest->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('PUT')}} @foreach($Equipmentrequest->Eladings as $index => $file) <div id="hide_shipp">
    </div> @endforeach @foreach($Equipmentrequest->Epackinglists as $index => $file) <div id="hide_cus">
    </div> @endforeach @foreach($Equipmentrequest->Einvoices as $index => $file) <div id="hide_inv">
    </div> @endforeach <div class="container">
        <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
            <div class="padding-top-xs">
                <div class="content_bottom_font padding-sm text-center"><b>កែប្រែ/Edit Import Equipment</b></div>
            </div>
            <div class="col-sm-12 "> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="col-md-12 "> @if ($errors->any()) <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div> @endif <div class="flash-message"> @foreach (['error', 'warning', 'success', 'info'] as $key) @if(Session::has($key)) <p class="alert alert-danger">{{ Session::get($key) }}
                    </p> @endif @endforeach </div>
                <div class="panel panel-moe">
                    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('front_isubstance.importer_company')}} </span></div>
                    <div class="panel-body">
                        <div class="col-md-12 ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('name.isubstance')}}&nbsp;&nbsp;:</span>
                                    <span class="star_require text-danger">*</span>
                                    <input type="text" class="form-control" id="manufacture_name" name="manufacture_name" value="{{$Equipmentrequest->manufacture_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('countries.fro_isubstance')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <select name="country_id" class="form-control"> @foreach($countries as $country) <option value="{{$country->id}}" {{$Equipmentrequest->country_id== $country->id?  "selected":""}}>{{$country->countries_name}}</option> @endforeach </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span>{{trans('front_address.address')}} </span>
                                    <textarea type="textarea" name="address" placeholder="Enter Address" class="form-control">{{$Equipmentrequest->address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- ======================end row1====================== -->
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('isubstance.manufacture_name')}}</span>
                                    <input type="text" class="form-control" id="import_port" name="import_port" placeholder="Enter Manufacture name" value="{{$Equipmentrequest->import_port}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('countries.fro_isubstance')}}</span>
                                    <select name="manufacture_country_id" class="form-control"> @foreach($countries as $country) <option value="{{$country->id}}" {{ $Equipmentrequest->manufacture_country_id == $country->id ? "selected":"" }}>{{$country->countries_name}}</option> @endforeach </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ======================end row1====================== -->
                <!-- ======================end row1====================== -->
                <div class="panel panel-moe">
                    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.transport_detail')}}</span></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('tranporttype.isubstance')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <select id="transport" name="transport" class="form-control"> @foreach($transport as $tran) <option att-data="{{$tran->port_type}}" value="{{$tran->tcode}}" {{ (old('transport') == $tran->tcode? "selected":"" )}}>{{$tran->description}}</option> @endforeach </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('front_isubstance.place_exportmanufactur')}}</span>
                                    <input type="text" class="form-control" id="place_export" name="place_export" placeholder="Enter Place Export" value="{{$Equipmentrequest->place_export}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('front_isubstance.place_importmanufactur')}}</span>
                                    <select name="place_import" id="place_import" class="form-control"> @foreach($entry as $entries) <option value="{{$entries->id}}" {{ (old('place_import')== $entries->id ? "selected":"")}}>{{$entries->port_name}}
                                        </option> @endforeach </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>{{trans('Incoming_arrival.fro_isubstance')}}</span>
                                    <span class="smtext"><input type="text" class="import_date form-control" name="import_date" id="d1" placeholder="datetime picker" value="{{$Equipmentrequest->import_date}}"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ======================end row1====================== -->
                <!-- ======================end row1====================== -->
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
                                            <option value="1" {{ $Equipmentrequest->aircon_service_option ? "selected":"" }}>{{trans('production.fro_isubstance')}}</option>
                                            <option value="2" {{ $Equipmentrequest->aircon_service_option  ? "selected":"" }}>{{trans('air_conditioner.fro_isubstance')}}</option>
                                            <option value="3" {{ $Equipmentrequest->other_option ? "selected":"" }}>{{trans('other.fro_isubstance')}}</option>
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
                                        <input type="text" name="other_option_description" id="text_other" class="form-control" disabled="disable" value="{{$Equipmentrequest->other_option_description}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span>{{trans('front_isubstance.other_info')}}</span>
                                    <div>
                                        <textarea type="textarea" class="form-control" name="other_info">{{$Equipmentrequest->other_info}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add more file -->
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group " id="dfs_1">
                                    <span>{{trans('front_isubstance.file_shipping')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <input type="hidden" class="form-control ship" id="fs_1"> @foreach($Equipmentrequest->Eladings as $index => $file) <div class="col-sm-12 no-padding form-group" id="dfs_{{$index+2}}">
                                        <div class="col-xs-10 no-padding">
                                            <input type="hidden" name="file_fs[]" value="{{$file->file_path}}">
                                            <a href="{{asset($file->file_path)}}" target="_blank"> <input type="button" name="file_shipping[]" value="View File" id="fs_{{$index+2}}" class="form-control ship" accept="application/pdf,image/*"></a>
                                        </div>
                                        <div class="col-xs-1 "> <button id="re_sh" name="del" value="{{$file->id}}" attr-id='dfs_{{$index+2}}' class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></div><br>
                                    </div> @endforeach
                                </div>
                                <div class=" text-right col-sm-12 ">
                                    <button type="button" class="btn btn-primary " id="add_ship">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="dfc_1">
                                    <span>{{trans('front_isubstance.File_customer_declar')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <input type="hidden" class="form-control custom" id="fc_1"> @foreach($Equipmentrequest->Epackinglists as $index => $file) <div class="col-sm-12 no-padding form-group" id="dfc_{{$index+2}}">
                                        <div class="col-xs-10 no-padding">
                                            <input type="hidden" name="file_fc[]" value="{{$file->file_path}}">
                                            <a href="{{asset($file->file_path)}}" target="_blank"> <input type="button" value="View File" id="fc_{{$index+2}}" class="form-control custom"></a>
                                        </div>
                                        <div class="col-xs-1"><button id="re_fc" name="del" value="{{$file->id}}" attr-id='dfc_{{$index+2}}' class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></div><br>
                                    </div> @endforeach
                                </div>
                                <div class=" text-right ">
                                    <button type="button" class="btn btn-primary " id="add_custom">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- ==================================== -->
                <div class="panel panel-moe">
                    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_isubstance.invoice_info')}}</span></div>
                    <div class="panel-body ">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>{{trans('isubstance.incoterm')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <select name="incoterm" class="form-control"> @foreach($cif as $ic) <option value="{{$ic->code}}" {{ (old('incoterm') == $ic->code? "selected":"" )}}>
                                            {{$ic->code}}
                                        </option> @endforeach </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>{{trans('isubstance.billdate')}}</span>
                                    <span class="smtext"><input type="text" class="billdate form-control" name="billdate" id="dbill" value="{{$Equipmentrequest->billdate}}" placeholder="datetime picker"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>{{trans('isubstance.billnumber')}}</span>
                                    <input type="text" class="  form-control" name="billnumber" value="{{$Equipmentrequest->billnumber}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>{{trans('isubstance.invoicevalueother')}}</span>
                                    <input type="text" class="form-control" name="invoice_value_other_currency" value="{{$Equipmentrequest->invoice_value_other_currency}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>{{trans('isubstance.currency')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <select name="currency" class="form-control"> @foreach($currency as $curr) <option value="{{$curr->code}}" {{ (old('currency') == $curr->code? "selected":"" )}}>
                                            {{$curr->code}}
                                        </option> @endforeach </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span>{{trans('isubstance.exchangerate')}}</span>
                                    <input type="text" class="  form-control" name="exchange_rate" value="4150">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="dfi_1">
                                    <span>{{trans('front_isubstance.File_Invioce')}}</span>
                                    <span class="star_require text-danger">*</span>
                                    <input type="hidden" name="file_fi[]" value="{{$file->file_path}}">
                                    <a href="{{asset($file->file_path)}}" target="_blank"> <input type="button" value="View File" id="fi_{{$index+2}}" class="form-control invoice"></a>
                                    <div class="col-sm-12 "> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                </div>
                                <div class=" text-right ">
                                    <button type="button" class="btn btn-danger " id="add_inv">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================== -->
                <div class="panel panel-moe">
                    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('front_iequipment.request_detail')}}</span></div>
                    <div class="col-md-3 ml-auto pull-right">
                        <div class="card-body text-right ">
                            <button type="button" class="btn btn-primary " data-toggle="modal" id="form_isubstance">
                                <i class="glyphicon glyphicon-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="panel-body" style="overflow-x:auto;width:100%">
                        <div class="col-md-12">&nbsp;&nbsp;&nbsp;</div>
                        <table class="table table-bordered responsive" id="table_isubstance">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('iequipment.type')}}</th>
                                    <th>{{trans('isubstance.amount')}}</th>
                                    <th>{{trans('iequipment.desc')}}</th>
                                    <th>{{trans('iequipment.capacity')}}</th>
                                    <th>{{trans('iequipment.capacity_type')}}</th>
                                    <th>{{trans('iequipment.weight')}}</th>
                                    <th>{{trans('iequipment.invoicevalue')}}</th>
                                    <th>{{trans('iequipment.substance')}}</th>
                                    <th>{{trans('isubstance.quanlity')}}</th>
                                    <th><a id="remove" onclick="remove()" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody> @foreach($Equipmentrequest->Equipmentrequestdetail as $index => $value) <tr id="row_{{$index}}">
                                    <td class='order'>{{$index+1}}</td>
                                    <td><input type='hidden' name='equipment_id[]' id='material_id.row_{{$index+1}}' value="{{$value->equipment_id}}">{{$value->Equipment->taxcode}}{{$value->Equipment->product_name}}
                                    </td>
                                    <td> <input type="hidden" name="amount[]" value="{{$value->amount}}">{{$value->amount}}</td>
                                    <td><input type="hidden" name="des[]" id="store.row_{{$index+1}}" value="{{$value->description}}">{{$value->description}}</td>
                                    <td><input type="hidden" name="capvalue[]" id="number.row_{{$index+1}}" value="{{$value->capvalue}}">{{$value->capvalue}}</td>
                                    <td><input type="hidden" name="capacity[]" id="number.row_{{$index+1}}" value="{{$value->capacity}}">{{$value->capacity}}</td>
                                    <!-- noncomplete -->
                                    <td>
                                        <input type="hidden" name="net[]" id="net.row_{{$index+1}}" value="{{$value->netweight}}">NET: {{$value->netweight}}<br />
                                        <input type="hidden" name="gross[]" id="gross.row_{{$index+1}}" value="{{$value->grossweight}}">GROSS: {{$value->grossweight}}
                                    </td>
                                    <td>
                                        <input type="hidden" name="invoice_value[]" id="invoice_value.row_{{$index+1}}" value="{{$value->invoice_value}}">{{$value->invoice_value}} USD
									</td>
                                    <td><input type="hidden" name="substance[]" id="total.row_{{$index+1}}" value="{{$value->substance}}">{{$value->substance}}</td>
                                    <td><input type="hidden" name="quality[]" id="qu.row_{{$index+1}}" value="{{$value->quality}}">{{$value->quality}}</td>
                                    <td><input type="checkbox" name="record"></td>
                                </tr> @endforeach </tbody>
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
                                            <span>{{trans('iequipment.type')}}</span><br />
                                            <select name="" class="form-control substance" id="equitment"> @foreach($equitment as $eq) <option value="{{$eq->id}}">{{$eq->taxcode}}-{{$eq->product_name}}</option> @endforeach </select>
                                        </div>
                                        <div class="form-group">
                                            <span>{{trans('isubstance.amount')}}</span><br />
                                            <input type="text" name="" class="form-control amount" id="amount" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <span>{{trans('iequipment.desc')}}</span><br />
                                            <input type="text" name="" placeholder="Type here" class="form-control" id="des">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span>{{trans('iequipment.capacity')}}</span><br />
                                                    <input type="text" name="" placeholder="Type here" class="form-control" id="capvalue">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span>{{trans('iequipment.capacity_type')}}</span><br />
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
                                                    <input type="text" name="" class="form-control net" id="net">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <span>{{trans('iequipment.gross')}}</span><span class="star_require text-danger">*</span>
                                                    <input type="text" name="" class="form-control gross" id="gross">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span>{{trans('iequipment.invoicevalue')}}</span><span class="star_require text-danger">*</span>
                                            <input type="text" name="" class="form-control invoicevalue" id="invoicevalue">
                                        </div>
                                        <div class="form-group">
                                            <span>{{trans('iequipment.substance')}}</span><br />
                                            <select name="" class="form-control substance" id="substance"> @foreach($Material as $material) <option value="{{$material->substance}}">{{$material->substance}}</option> @endforeach </select>
                                        </div>
                                        <div class="form-group">
                                            <span>{{trans('isubstance.quanlity')}}</span><br />
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
                    <div class="text-right ">
                        <input type="submit" value="{{trans('label_contact.update_btn')}}" class="btn btn-primary btn-lg">
                        <a href="{{route('front.idata')}}"><input type="button" value="{{trans('label_contact.cancel_btn')}}" class="btn btn-default btn-lg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> @endsection @section('script') <script type="text/javascript">
    $(document).ready(function() {
        var newdate;
        $('#d1').datepicker({
            format: "yyyy-mm-dd"
        });
        $('#dbill').datepicker({
            format: 'yy-mm-dd',
        });
        $("#purpose_of_use").change(function() {
            if ($(this).val() == 3) {
                $("#text_other").removeAttr("disabled");
                $("#text_other").focus();
            } else {
                $("#text_other").attr("disabled", "disabled");
            }
        });
        $('#capvalue').keypress(function(event) {
            if (event.which < 46 || event.which > 59) {
                event.preventDefault();
            } // prevent if not number/dot
            if (event.which == 46 && $(this).val().indexOf('.') != -1) {
                event.preventDefault();
            } // prevent if already dot
        });
        $("#add_ship").click(function() {
            var id = $('.ship').last().attr("id");
            //row_1
            id = id.substring(3);
            var new_id = Number(id) + 1;
            new_id_main = "dfs_" + new_id;
            new_id = "fs_" + new_id;
            var new_file = '<div class=" col-xs-12 no-padding form-group" id="' + new_id_main + '"><div class="col-xs-10 no-padding" > <input type="file" name="file_shipping[]" class="form-control ship" id="' + new_id + '"></div><div class="col-xs-1 "> <a   attr-id="' + new_id_main + '" class="btn btn-danger btn-xs remove_fs"><i class="fa fa-trash"></i></a></div></div>';
            $("#dfs_1").append(new_file);
        });
        $(document).on('click', '.remove_fs', function(e) {
            var id = $(this).attr("attr-id");
            $("#" + id).remove();
        });
        // remove ship from db
        $(document).on('click', '#re_sh', function(e) {
            var id = $(this).attr("attr-id");
            if ($("#" + id).remove()) {
                var getId = $(this).attr("value");
                var hide = '<input type="hidden" name="delete[]" value="' + getId + '">';
                $("#hide_shipp").append(hide);
            }
        });
        $("#add_custom").click(function() {
            var id = $('.custom').last().attr("id");
            //row_1
            id = id.substring(3);
            var new_id = Number(id) + 1;
            new_id_main = "dfc_" + new_id;
            new_id = "fc_" + new_id;
            var new_file = '<div class=" col-xs-12 no-padding form-group" id="' + new_id_main + '"><div class="col-xs-10 no-padding" > <input type="file" name="file_custom_declar[]" class="form-control custom" id="' + new_id + '"></div><div class="col-xs-1 "> <a   attr-id="' + new_id_main + '" class="btn btn-danger btn-xs remove_custom"><i class="fa fa-trash"></i></a></div></div>';
            $("#dfc_1").append(new_file);
        });
        $(document).on('click', '.remove_custom', function(e) {
            var id = $(this).attr("attr-id");
            $("#" + id).remove();
        });
        // remove custom from db
        $(document).on('click', '#re_fc', function(e) {
            var id = $(this).attr("attr-id");
            if ($("#" + id).remove()) {
                var getID = $(this).attr("value");
                var hide = '<input type="hidden" name="delete[]" value="' + getID + '">';
                $("#hide_cus").append(hide);
            }
        });
        $("#add_inv").click(function() {
            var id = $('.inv').last().attr("id");
            //row_1
            id = id.substring(3);
            var new_id = Number(id) + 1;
            new_id_main = "dfi_" + new_id;
            new_id = "fi_" + new_id;
            var new_file = '<div class=" col-xs-12 no-padding form-group" id="' + new_id_main + '"><div class="col-xs-10 no-padding" > <input type="file" name="file_invoice[]" class="form-control inv" id="' + new_id + '"></div><div class="col-xs-1 "> <a   attr-id="' + new_id_main + '" class="btn btn-danger btn-xs remove_inv"><i class="fa fa-trash"></i></a></div></div>';
            $("#dfi_1").append(new_file);
        });
        // remove invoice from db
        $(document).on('click', '#re_fi', function(e) {
            var id = $(this).attr("attr-id");
            if ($("#" + id).remove()) {
                var getId = $(this).attr("value");
                var hide = '<input type="hidden" name="delete[]" value="' + getId + '">';
                $("#hide_inv").append(hide);
            }
        });
        $(document).on('click', '.remove_inv', function(e) {
            var id = $(this).attr("attr-id");
            $("#" + id).remove();
        });
        $("#idimaterial").addClass("active");
        $("#table_isubstance tbody").find('input[name="record"]').each(function() {
            if ($(this).is(":checked")) {
                $(this).parents("tr").remove();
            }
        });
        $('#form_isubstance').click(function() {
            $('#add_isubstance').modal('show');
            $("#amount").val('');
            $("#des").val('');
            $('#equitment option:first').prop('selected', true);
        });
        $('#add_sub').click(function() {
            var equitment = $("#equitment option:selected").val();
            var amount = $("#amount").val();
            var des = $("#des").val();
            var capacity = $("#capacity").val();
            var capvalue = $("#capvalue").val();
            var substance = $("#substance").val();
            var net = $("#net").val();
            var gross = $("#gross").val();
            var invoicevalue = $("#invoicevalue").val();
            var qu = $("input[name='iquality']:checked").val();
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
            
                            "<tr id='" + new_id + "'>" +

                            "<td>" + (Number(id) + id) + "</td>" +

                            "<td>" +
                                "<input type='hidden' name='equipment_id[]' value='" + equitment + "'>" + $('#equitment option:selected').text() +

                            "</td>" +

                            "<td>" +
                                    "<input type='hidden' name='amount[]' value='" + amount + "'>" + amount +
                                    "<input type='hidden' class='subc'  name='sub[]' value='" + $('#equitment option:selected').text() + "' >" +
                            "</td>" +

                            "<td>" +
                                "<input type='hidden' name='des[]' value='" + des + "'>" + des +
                            "</td>" +



                            "<td>" +
                                "<input type='hidden' name='capvalue[]' value='" + capvalue + "'>" + capvalue +
                            "</td>" +
                            "<td>" +
                                "<input type='hidden' name='capacity[]' value='" + capacity + "'>" + capacity +
                            "</td>" +

                            "<td>" +
                                "<input type='hidden' name='net[]' value='" + net + "'>" +net+ "</br>"+
                                "<input type='hidden' name='gross[]' value='" + gross + "'>GROSS:" +gross+
                            "</td>" +


                            "<td>"+
                                "<input type='hidden' name='invoice_value[]' value='"+invoice_value+"'>" +invoice_value+"USD"+
                            "</td>"+


                            "<td>" +
                                "<input type='hidden' name='substance[]' value='" + substance + "'>" + substance +
                            "</td>" +

                            "<td>" +
                                  "<input type='hidden' name='quality[]' id='qu." + new_id + "' value='" + qu + "'>" + qu +
                            "</td>" +

                            "<td>" +
                                  "<input type='checkbox' name='record'>" +
                            "</td>" +
                            "</tr>";
            $('#table_isubstance tbody').append(markup);
            $('#add_isubstance').modal('hide');
            //}
        });
    });

    function remove() {
        $("#remove").click(function() {
            $("#table_isubstance tbody").find('input[name="record"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
            var i = 1;
            $('#table_isubstance tbody tr').each(function() {
                var id = $(this).attr('id');
                $('#' + id + ' .order').text(i);
                i++;
            });
        });
    }
</script> @endsection