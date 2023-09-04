@extends('layout.front')
@section('content')
@include('layout.partical.headuser')



<div class="container">
	 <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

	 	<center>
                        <div class="padding-top-xs">
                            <div class="content_bottom_font padding-sm"><b>{!!trans('label_contact.Representative_info')!!}</b></div>
                        </div>
                        
       </center>
<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 ">

<div class="panel panel-moe">
  
    <div class="panel-body">
   
		              <div class="col-sm-4 ">
                        <div class="col-sm-12 form-group ">
                         
                              
                             <img id='img-upload' src="{{$Customer->Cominfo->photo ? asset($Customer->Cominfo->photo) : asset('front/img/photo_pre.jpg')}}" style="width: 60%;">
                          
                        </div>

                  </div>

                   <div class="col-sm-4 ">

                        <div class="col-md-12 form-group">
                                     {{trans('front_contact.contact_name')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->contact_person? $Customer->Cominfo->contact_person:'---------------------------'}}">
                                       
                        </div>

                         <div class="col-md-12 form-group">
                                      {{trans('front_contact.id_card')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->personid? $Customer->Cominfo->personid:'---------------------------'}}">
                                      
                         </div>

                        <div class="col-md-12 form-group">
                                      {{trans('front_contact.company_function')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->position? $Customer->Cominfo->position:'---------------------------'}}">
                                       
                        </div>

                         <div class="col-md-12 form-group">
                                    
                                    {{trans('front_contact.authorize')}}<br/>
                                     @if ($Customer->Cominfo->authorize)
                                      <a href="{{asset($Customer->Cominfo->authorize)}}" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                                      @else
                                           <label>No File</label>
                                      @endif
                                    
                         </div>

                   </div>


                   <div class="col-sm-4 ">

                        <div class="col-md-12 form-group">
                                      {{trans('front_contact.gender')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->gender? $Customer->Cominfo->gender:'---------------------------'}}">
                                      
                        </div>

                        
                         <div class="col-md-12 form-group">
                                    
                                    {{trans('front_contact.certificate_identity_passport')}}<br/>
                                     @if ($Customer->Cominfo->id_card)
                                      <a href="{{asset($Customer->Cominfo->id_card)}}" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                                      @else
                                           <label>No File</label>
                                      @endif
                                    
                         </div>

                         <div class="col-md-12 form-group">
                                       {{trans('front_contact.nationality')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->nationality? $Customer->Cominfo->nationality:'---------------------------'}}">
                         </div>

                   </div>
                                    
                                  
                                 

</div></div>

<div class="panel panel-moe">
   <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('label_contact.contact_address')}}</span></div>
    <div class="panel-body">

                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                  <div class="col-sm-12 ">
                                    <div class="col-md-4 form-group">
                                      {{trans('label.numHome')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->house?$Customer->Cominfo->house:'---------------------------'}}">
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.NumberRoad')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->street ? $Customer->Cominfo->street:'---------------------------'}}">
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.village')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->village ? $Customer->Cominfo->village:'---------------------------'}}">
                                    </div>
                                  </div>
                                  <div class="col-sm-12 ">
                                    <div class="col-md-4 form-group">
                                      {{trans('label.CummuneSongkat')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->commune ? $Customer->Cominfo->commune:'---------------------------'}}">
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.District')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->district ? $Customer->Cominfo->district:'---------------------------'}}">
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.province')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->city ? $Customer->Cominfo->city:'---------------------------'}}">
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-12 ">
                                    <div class="col-md-4 form-group">
                                      {{trans('label.phone')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->tel ? $Customer->Cominfo->tel:'---------------------------'}}">
                                    
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.fax')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->fax ? $Customer->Cominfo->fax:'---------------------------'}}">
                                    
                                    </div>
                                    <div class="col-md-4 form-group">
                                      {{trans('label.email')}}<br/>
                                      <input type="text" class="form-control" readonly value="{{$Customer->Cominfo->email ? $Customer->Cominfo->email:'---------------------------'}}">
                                    
                                    </div>
                                  </div>

</div></div>
                                    <div class="col-sm-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-md-6">
                            <div class="form-group text-right">
                          
                          
                          <a href="{{route('front.econtact')}}"><input type="button" value="{{trans('label_contact.edit_btn')}}" class="btn btn-primary btn-lg"></a>
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
        $("#idcontact").addClass("active");
        //alert($("#idprofile").text());
    });
</script>
@endsection