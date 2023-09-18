@extends('layout.front')
@section('content')
@include('layout.partical.headuser')


<form  method="post" action="{{route('front.uprofile')}}" enctype="multipart/form-data" >
 <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          {{ method_field('PUT')}}
          <input type="hidden" value="$Customer->tin_path" name="tin_h">
          <input type="hidden" value="$Customer->id_path" name="id_h">
<div class="container">
	 <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child no_padding">

	 	<center>
                        <div class="padding-top-xs">
                            <div class="content_bottom_font padding-sm"><b>ពត៏មានក្រុមហ៊ុន</b></div>
                        </div>
                        <div class="content_bottom_font_sm">Company Information</div>
       </center>
    <div class="col-sm-12 padding-top-lg-extra"></div>
		<div class="col-sm-12 padding-top-lg-extra">
     
                                   <div class="col-sm-12" >
                                    <div class="col-md-4 form-group">
                                      <label >ឈ្មោះក្រុមហ៊ុន</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->company_name}}" name="company_name" class="form-control"></span>
                                       
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <label>វិញ្ញាប័ណ្ណប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->tin?$Customer->tin: ''}}" class="form-control" name="tin"></span>
                                      
                                      
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <label>ថ្ងៃ ខែ ចុះវិញ្ញាប័ណ្ណប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->tin_date?$Customer->tin_date: ''}}" class="form-control" name="tin_date" id="d1"></span>
                                      
                                    </div>
                                  </div>


                                 <div class="col-sm-12" >

                                 	 <div class="col-md-4 form-group">
                                      
                                    </div>

                                     <div class="col-md-4 form-group">
                                      <label>វិញ្ញាប័ណ្ណប័ត្របញ្ជីក្រសួងពាណិជ្ជកម្ម</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->company_id?$Customer->company_id: ''}}" class="form-control" name="company_id" ></span>
                                       
                                    </div>

                                     <div class="col-md-4 form-group">
                                     <label>ថ្ងៃ ខែ ចុះវិញ្ញាប័ណ្ណប័ត្របញ្ជីក្រសួងពាណិជ្ជកម្ម</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->company_id_date?$Customer->company_id_date: ''}}" class="form-control" name="company_id_date" id="d2"></span>
                                    </div>
                                 </div>

                                 <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>វិញ្ញាប័ណ្ណប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម</label><br/>
                                    <input type="file" name="tin_path">
                                    </div>
                                    <div class="col-md-4 form-group">
                                     <label>វិញ្ញាប័ណ្ណប័ត្របញ្ជីក្រសួងពាណិជ្ជកម្ម</label><br/>
                                      <input type="file" name="id_path">
                                    </div>
                                  </div>

                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-sm-12" style="border-bottom: 2px solid #ccc;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                      <label>ផ្ទះលេខ</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->house?$Customer->house:''}}" class="form-control" name="house"></span>
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      <label>ផ្លូវលេខ</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->street ? $Customer->street:''}}" class="form-control" name="street"></span>
                                      
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      <label>ភូមិ</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer->village ? $Customer->village:''}}" class="form-control" name="village" ></span>
                                      
                                      </div>
                                  </div>
                                  <div class="col-sm-12">

                                    <div class="col-md-4 form-group">
                                    <label>ឃុំ/សង្កាត់</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->commune:''}}" class="form-control" name="commune" ></span>
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      <label>ស្រុក/ខ័ណ្ឌ</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->district:''}}" class="form-control" name="district" ></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>ខេត្ត/រាជធានី</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->city:''}}" class="form-control" name="city"></span>
                                      
                                    </div>
                                  </div>

                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                    <label>លេខទូរស័ព្ធ</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer? $Customer->tel:''}}" class="form-control" name="tel" ></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>ទូរសារ</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->fax:''}}"  class="form-control" name="fax"></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>សារអេឡិចត្រូនិច</label><br/>
                                      <span class="smtext"><input type="text" value="{{$Customer ? $Customer->email:''}}" class="form-control" name="email"></span>
                                    
                                    </div>
                                  </div>
                                   <div class="col-sm-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-sm-12" >  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-md-6">
                            <div class="form-group">
                          
                          <input type="submit" value="update" class="btn btn-primary">
                          <a href="{{route('front.profile')}}"><input type="button" value="cancel" class="btn btn-default"></a>
                        </div>
                        </div>
                        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

  </div>

</div>
</div>
</form>
@endsection

@section('script')

@endsection