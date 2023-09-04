@extends('layout.front')
@section('content')
@include('layout.partical.headuser')


<form  method="post" action="{{route('front.uprofile')}}" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          {{ method_field('PUT')}}
          <input type="hidden" value="{{$Customer->tin_path}}" name="tin_h">
          <input type="hidden" value="{{$Customer->id_path}}" name="id_h">
          <input type="hidden" value="{{$Customer->id_card}}" name="id_d">
          <input type="hidden" value="{{$Customer->patent}}" name="patent_h">
<div class="container">
	 <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

	 	   <center>
                        <div class="padding-top-xs">
                            <div class="content_bottom_font padding-sm"><b>{!! trans('front_contact.company_profile')!!}</b></div>
                        </div>
                       
       </center>
   
		<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <div class="col-md-12 ">


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="flash-message">
                  @foreach (['error', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-danger">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>

    <div class="panel panel-moe">
    
    <div class="panel-body">
                                  <div class="col-sm-12">
                                      <div class="col-md-4 form-group">
                                        {{trans('label_contact.com_code')}}<span class="star_require text-danger">*</span>
                                       <input type="text" class="form-control" readonly value="{{$Customer->idcard}}"> 
                                      </div>

                                      <div class="col-md-4 form-group">
                                          
                                        {{trans('label_contact.com_type')}}<span class="star_require text-danger">*</span>
                                       <input type="text" class="form-control" readonly value="{{$Customer->ctype}}"> 
                                      </div>
                                      <div class="col-md-4 form-group">
                                          
                                        {{trans('label_contact.user_acc')}}<span class="star_require text-danger">*</span>
                                       <input type="text" class="form-control" readonly value="{{$Customer->user_name}}"> 
                                      </div>
                                    </div>
     
                                   <div class="col-sm-12" >
                                    <div class="col-md-4 form-group">
                                     {{trans('label_contact.com_name')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->company_name}}" name="company_name" class="form-control"></span>
                                       
                                    </div>

                                    <div class="col-md-4 form-group">
                                    {{trans('label_contact.idcard')}}<span class="star_require text-danger">*</span>
                                    <input type="file" name="id_card" id="id_card" accept="application/pdf,image/*">
                                    <output id="list_card">
                                      
                                      @if ($Customer->id_card)
                                      <a href="{{asset($Customer->id_card)}}" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                                      @else
                                        <label>No File</label>
                                      @endif
                                    </output>
                                    </div>

                                   

                                    <div class="col-md-4 form-group">
                                    </div>

                                   
                                  </div>


                                 <div class="col-sm-12" >


                                    <div class="col-md-4 form-group">
                                      {!!trans('label_contact.certificate_add_tax')!!}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->tin?$Customer->tin: ''}}" class="form-control" name="tin"></span>
                                      
                                      
                                    </div>

                                     <div class="col-md-4 form-group">
                                    {!!trans('label_contact.certificate_tin')!!}<span class="star_require text-danger">*</span>
                                    <input type="file" name="tin_path" id="tin_path" accept="application/pdf,image/*">
                                    <output id="list">
                                      @if ($Customer->tin_path)
                                        <a href="{{asset($Customer->tin_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                                        @else
                                           <label>No File</label>
                                        @endif
                                        </output>
                                    </div>






                                     <div class="col-md-4 form-group">
                                      {!!trans('label_contact.date_certificate_vat')!!}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->tin_date?\App\Helpers\AppHelper::instance()->format_date($Customer->tin_date): ''}}" class="form-control" name="tin_date" id="d1"></span>

                                    </div>

                                     
                                 </div>

                                 <div class="col-sm-12">
                                    
                                   <div class="col-md-4 form-group">
                                      {!!trans('label_contact.certificate_identity_business_owner')!!}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->company_id?$Customer->company_id: ''}}" class="form-control" name="company_id" ></span>
                                       
                                    </div>
                                    <div class="col-md-4 form-group">
                                     {{trans('label_contact.add_another_certificate_ministry')}}<span class="star_require text-danger">*</span>
                                      <input type="file" name="id_path" id="id_path" accept="application/pdf,image/*">
                                      <output id="id_list">
                                        @if ($Customer->id_path)
                                        <a href="{{asset($Customer->id_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                                        @else
                                             <label>No File</label>
                                        @endif
                                      </output>
                                    </div>

                                     <div class="col-md-4 form-group">
                                     {!!trans('label_contact.date_certificate_vat')!!}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->company_id_date?\App\Helpers\AppHelper::instance()->format_date($Customer->company_id_date): ''}}" class="form-control" name="company_id_date" id="d2"></span>
                                    </div>
                                  </div>
                                   <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                      {!!trans('label_contact.patent')!!}<span class="star_require text-danger">*</span>
                                      <input type="text" class="form-control" name="patent_number" value="{{$Customer->patent_number?$Customer->patent_number: '---------------------------'}}">
                                       
                                    </div>  
                                <div class="col-md-4 form-group">
                                    
                                 {!!trans('label_contact.patent_file')!!}<span class="star_require text-danger">*</span>

                                  <input type="file" name="patent" id="patent" accept="application/pdf,image/*">
                                  <output id="patent_list">
                                    @if ( $Customer->patent)
                                        <a href="{{asset($Customer->patent)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                                        @else
                                            <label>No File</label>
                                        @endif 
                                  </output>
                                </div>

                                <div class="col-md-4 form-group">
                                  {{trans('label_contact.date_certificate_vat')}}<span class="star_require text-danger">*</span>
                                 
                                  <span class="smtext"><input type="text" value="{{$Customer->patent_date?\App\Helpers\AppHelper::instance()->format_date($Customer->patent_date): ''}}" class="form-control" name="patent_date" id="d3"></span>
                                </div>
                                </div>
</div>
</div>

<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('label_contact.company_address')}} </span></div>
    <div class="panel-body">

                                  <div class="col-sm-12">

                                   <div class="col-md-4 form-group">
                                    {{trans('label.province')}}<span class="star_require text-danger">*</span>
                                      <select name="city" class="form-control">
                                  
                                        @foreach($Province as $province)
                                            <option att-data="{{$province->id}}" value="{{$province->pro_name}}" 
                                              {{ $province->id == $Province_get->id ? "selected":""}}  >
                                              {{$province->pro_name}}</option>
                                        @endforeach
                                      </select>
                                      
                                    </div>

                                    <div class="col-md-4 form-group">
                                      {{trans('label.District')}}<span class="star_require text-danger">*</span>
                                      <select name="district" class="form-control">
                                        @foreach($Districts as $province)
                                            <option att-data="{{$province->id}}" value="{{$province->dis_name}}"
                                              {{ $province->dis_name == $Customer->district ? "selected":""}}  >
                                              {{$province->dis_name}}</option>
                                        @endforeach
                                       
                                      </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                    {{trans('label.CummuneSongkat')}}<span class="star_require text-danger">*</span>
                                      <select name="commune" class="form-control">
                                       @foreach($Commune as $province)
                                            <option att-data="{{$province->id}}" value="{{$province->commune_name}}" 
                                              {{ $province->commune_name == $Customer->commune ? "selected":""}}  >
                                              {{$province->commune_name}}</option>
                                        @endforeach
                                       
                                      </select>
                                      
                                    </div>

                                    
                                    
                                  </div>


                                  <div class="col-sm-12">

                                    <div class="col-md-4 form-group">
                                      {{trans('label.village')}}<span class="star_require text-danger">*</span>
                                     
                                      <select name="village" class="form-control">
                                       
                                         @foreach($Villages as $province)
                                            <option att-data="{{$province->id}}" value="{{$province->vill_name}}" 
                                              {{ $province->vill_name == $Customer->village ? "selected":""}}  >
                                              {{$province->vill_name}}</option>
                                        @endforeach
                                      </select>
                                      
                                      </div>

                                      <div class="col-md-4 form-group">
                                      {{trans('label.numHome')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->house?$Customer->house:''}}" class="form-control" name="house"></span>
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.NumberRoad')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->street ? $Customer->street:''}}" class="form-control" name="street"></span>
                                      
                                      
                                    </div>


                                  </div>

                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                    {{trans('label.phone')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer? $Customer->tel:''}}" class="form-control" name="tel" ></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    {{trans('label.fax')}}
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->fax:''}}"  class="form-control" name="fax"></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    {{trans('label.email')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->email:''}}" class="form-control" name="email"></span>
                                    
                                    </div>
                                  </div>

</div>
</div>

                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-md-6">
                            <div class="form-group text-right">
                          
                          <input type="submit" value="{{trans('label_contact.update_btn')}}" class="btn btn-primary btn-lg">
                          <a href="{{route('front.profile')}}"><input type="button" value="{{trans('label_contact.cancel_btn')}}" class="btn btn-default btn-lg"></a>
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
        $("#idprofile").addClass("active");
        //alert($("#idprofile").text());
        var tin_path_f =  document.getElementById('tin_path');
        tin_path_f.ouptdiv = "list"
        tin_path_f.addEventListener('change', handleFileSelect, false);

        var id_path_f =  document.getElementById('id_path');
        id_path_f.ouptdiv = "id_list"
        id_path_f.addEventListener('change', handleFileSelect, false);

        var id_card_f =  document.getElementById('id_card');
        id_card_f.ouptdiv = "list_card"
        id_card_f.addEventListener('change', handleFileSelect, false);

        var pantent_f =  document.getElementById('patent');
        pantent_f.ouptdiv = "patent_list"
        pantent_f.addEventListener('change', handleFileSelect, false);

          $('#d2').datepicker({
          format: "dd-mm-yyyy"
      });

       $('#d3').datepicker({
          format: "dd-mm-yyyy"
      });

 $('#d1').datepicker({
          format: "dd-mm-yyyy"
      });
    //change province to get district
    $('body').on('change','[name="city"]',function(){
        $.ajax({
            type:'get',
            url: '{!! route('front.district')!!}',
            data:{id:$('select[name="city"] option:selected').attr("att-data")},
            beforeSend: function(){
                $.LoadingOverlay("show");
            },
            success:function(x){
              var data = JSON.parse(x);
              var html = "";
                for ( var i = 0; i < data.length; i++ ) {
                html = html + '<option att-data="'+data[i].dcode+'" value="'+data[i].dis_name+'">'+data[i].dis_name+'</option>';
                }

                 $('[name="district"]').html(html);
                 $('select[name="district"] option:first').prop("selected", "selected").trigger('change');
                $.LoadingOverlay("hide");

            }
        });



    });
    //change district to get communce
    $('body').on('change','[name="district"]',function(){
        $.ajax({
            type:'get',
             url: '{!! route('front.commune')!!}',
            data:{id:$('select[name="district"] option:selected').attr("att-data")},
            beforeSend: function(){
                $.LoadingOverlay("show");
            },
            success:function(x){
                var data = JSON.parse(x);
                var html = "";
                for ( var i = 0; i < data.length; i++ ) {
                html = html + '<option att-data="'+data[i].ccode+'" value="'+data[i].commune_name+'">'+data[i].commune_name+'</option>';
                }
                $('[name="commune"]').html(html);
                $('select[name="commune"] option:first').prop("selected", "selected").trigger('change');
                 //$('[name="commune"]').trigger("onchange");
                $.LoadingOverlay("hide");

            }
        });


    });
    //change communce to get village
    $('body').on('change','[name="commune"]',function(){
        $.ajax({
            type:'get',
             url: '{!! route('front.village')!!}',
            data:{id:$('select[name="commune"] option:selected').attr("att-data")},
            beforeSend: function(){
                $.LoadingOverlay("show");
            },
            success:function(x){
                 var data = JSON.parse(x);
                var html = "";
                for ( var i = 0; i < data.length; i++ ) {
                html = html + '<option att-data="'+data[i].id+'" value="'+data[i].vill_name+'">'+data[i].vill_name+'</option>';
                }
                 $('[name="village"]').html(html);
                $.LoadingOverlay("hide");

            }
        });
    });
    });
</script>
@endsection