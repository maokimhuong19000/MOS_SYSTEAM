@extends('layout.front')
@section('content')
@include('layout.partical.headuser')


<form  method="post" action="{{route('front.ucontact')}}" enctype="multipart/form-data" >
 <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          {{ method_field('PUT')}}
           <input type="hidden" value="{{$Customer->Cominfo->id_card}}" name="id_d">
            <input type="hidden" value="{{$Customer->Cominfo->photo}}" name="photo_h">
             <input type="hidden" value="{{$Customer->Cominfo->authorize}}" name="authorize_h">
<div class="container">
	 <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child">

	 	<center>
                        <div class="padding-top-xs">
                            <div class="content_bottom_font padding-sm"><b>{!!trans('label_contact.Representative_info')!!}</b></div>
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

                    <div class="col-sm-4 ">
                            <div class="col-sm-12 form-group ">
                                 {{trans('front_contact.photo')}}<span class="star_require text-danger">*</span>
                                    <input type="file" name="photo" id="photo">
                                    <img id='img-upload' style="width: 60%;" src="{{$Customer->Cominfo->photo ? asset($Customer->Cominfo->photo) : asset('front/img/photo_pre.jpg')}}" />
                            </div>

                    </div>

                    <div class="col-sm-4 ">

                        <div class="col-md-12 form-group">
                                      {{trans('front_contact.contact_name')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo? $Customer->Cominfo->contact_person:''}}" class="form-control" name="contact_person"></span>
                                       
                        </div>

                         <div class="col-md-12 form-group">
                                       {{trans('front_contact.id_card')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo? $Customer->Cominfo->personid:''}}"  class="form-control" name="personid" ></span>
                                      
                         </div>

                        <div class="col-md-12 form-group">
                                      {{trans('front_contact.company_function')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo? $Customer->Cominfo->position:''}}" class="form-control" name="position"></span>
                                       
                        </div>

                        <div class="col-md-12 form-group">
                                      {{trans('front_contact.authorize')}}<span class="star_require text-danger">*</span>
                                      <input type="file" name="authorize" accept="application/pdf,image/*" id="authorize"><output id="authorize_list"></output>
                                       
                        </div>

                   </div>


                   <div class="col-sm-4 ">

                        <div class="col-md-12 form-group">
                                      {{trans('front_contact.gender')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo? $Customer->Cominfo->gender:''}}" class="form-control" name="gender"></span>
                                      
                        </div>

                        
                         <div class="col-md-12 form-group">
                                       {{trans('front_contact.certificate_identity_passport')}}<span class="star_require text-danger">*</span>
                                    <input type="file" name="id_card" accept="application/pdf,image/*" id="id_card"><output id="id_card_list"></output>
                         </div>

                         <div class="col-md-12 form-group">
                                       {{trans('front_contact.nationality')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo? $Customer->Cominfo->nationality:''}}" class="form-control"  name="nationality"></span>
                         </div>

                   </div>
		                                
                                    
                                  
                               
</div>
</div>

<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('label_contact.contact_address')}} </span></div>
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
                                              {{ $province->dis_name == $Customer->Cominfo->district ? "selected":""}}  >
                                              {{$province->dis_name}}</option>
                                        @endforeach
                                      </select>
                                    </div>

                                     <div class="col-md-4 form-group">
                                    {{trans('label.CummuneSongkat')}}<span class="star_require text-danger">*</span>
                                      <select name="commune" class="form-control">
                                     
                                        @foreach($Commune as $province)
                                            <option att-data="{{$province->id}}" value="{{$province->commune_name}}" 
                                              {{ $province->commune_name == $Customer->Cominfo->commune ? "selected":""}}  >
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
                                              {{ $province->vill_name == $Customer->Cominfo->village ? "selected":""}}  >
                                              {{$province->vill_name}}</option>
                                        @endforeach
                                      </select>
                                      
                                      </div>


                                    <div class="col-md-4 form-group">
                                      {{trans('label.numHome')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->house?$Customer->Cominfo->house:''}}" class="form-control" name="house"></span>
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.NumberRoad')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->street ? $Customer->Cominfo->street:''}}" class="form-control" name="street"></span>
                                      
                                      
                                    </div>
       
                                  
                                  </div>

                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                    {{trans('label.phone')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->tel ? $Customer->Cominfo->tel:''}}" class="form-control" name="tel" ></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    {{trans('label.fax')}}
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->fax ? $Customer->Cominfo->fax:''}}"  class="form-control" name="fax"></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    {{trans('label.email')}}<span class="star_require text-danger">*</span>
                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->email ? $Customer->Cominfo->email:''}}" class="form-control" name="email"></span>
                                    
                                    </div>
                                  </div>
                                    
  </div>
</div>


                                <div class="col-sm-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-md-6">
                                  <div class="form-group text-right">
                                
                                
                                <input type="submit" value="{{trans('label_contact.update_btn')}}" class="btn btn-primary btn-lg">
                                <a href="{{route('front.contact')}}"><input type="button" value="{{trans('label_contact.cancel_btn')}}" class="btn btn-default btn-lg"></a>
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
        $("#idcontact").addClass("active");
        //alert($("#idprofile").text());

        var tin_path_f =  document.getElementById('id_card');
        tin_path_f.ouptdiv = "id_card_list"
        tin_path_f.addEventListener('change', handleFileSelect, false);

        var id_path_f =  document.getElementById('authorize');
        id_path_f.ouptdiv = "authorize_list"
        id_path_f.addEventListener('change', handleFileSelect, false);

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readURL(this);
    });   

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
                html = html + '<option att-data="'+data[i].id+'" value="'+data[i].dis_name+'">'+data[i].dis_name+'</option>';
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
                html = html + '<option att-data="'+data[i].id+'" value="'+data[i].commune_name+'">'+data[i].commune_name+'</option>';
                }
                $('[name="commune"]').html(html);
                 $('select[name="commune"] option:first').prop("selected", "selected").trigger('change');
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