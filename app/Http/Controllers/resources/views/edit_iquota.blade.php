@extends('layout.front')
@section('content')
@include('layout.partical.headuser')


<form  method="post" action="{{route('front.uprofile')}}" enctype="multipart/form-data" >
 <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          {{ method_field('PUT')}}
          <input type="hidden" value="$Customer->tin_path" name="tin_h">
          <input type="hidden" value="$Customer->id_path" name="id_h">
          <input type="hidden" value="$Customer->id_card" name="id_d">
<div class="container">
   <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child no_padding">

    <center>
                        <div class="padding-top-xs">
                            <div class="content_bottom_font padding-sm"><b>កែប្រែលក្រុមហ៊ុន</b></div>
                        </div>
                       
       </center><div class="col-sm-12 padding-top-lg-extra"></div>
   
    <div class="col-sm-12 padding-top-lg-extra">
     
                                   <div class="col-sm-12" >
                                    <div class="col-md-4 form-group">
                                      <label >ឈ្មោះក្រុមហ៊ុន</label><br/>
                                      <span class="smtext"><input type="text" name="company_name" class="form-control"></span>
                                       
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <label>ទំនាក់ទំនងមកកាន់ឈ្មោះ</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="tin"></span>
                                      
                                      
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <label>តួនាទីនៅក្នងក្រុមហ៊ុន</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="tin_date" id="d1"></span>
                                      
                                    </div>
                                  </div>


                                 <div class="col-sm-12" >

                                   <div class="col-md-4 form-group">
                                    <label>ភេទ</label><br/>
                                    <select class="form-control" name="gender" id="gender">
                                      <option>Male</option>
                                      <option>Female</option>
                                      <option>Another</option>
                                    </select>
                                    </div>

                                     <div class="col-md-4 form-group">
                                      <label>សញ្ជាតិ</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="company_id" ></span>
                                       
                                    </div>

                                     <div class="col-md-4 form-group">
                                     <label>លេខអត្តសញ្ញាណប័ណ្ឌ</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="company_id_date" id="d2"></span>
                                    </div>
                                 </div>


                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                 <div class="col-sm-12" style="border-bottom: 2px solid #ccc;"> <div class="content_bottom_font_sm">អាស័យដ្ឋានទំនាក់ទំនង</div></div>
                                 <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                      <label>ផ្ទះលេខ</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="house"></span>
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      <label>ផ្លូវលេខ</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="street"></span>
                                      
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      <label>ភូមិ</label><br/>
                                      <select name="" class="form-control">
                                        <option>---Choose Village--</option>
                                        <option>kkk</option>
                                        <option>kkk</option>
                                      </select>
                                      
                                      </div>
                                  </div>
                                  <div class="col-sm-12">

                                    <div class="col-md-4 form-group">
                                    <label>ឃុំ/សង្កាត់</label><br/>
                                      <select name="" class="form-control">
                                        <option>---Choose Commune--</option>
                                        <option>kkk</option>
                                        <option>kkk</option>
                                      </select>
                                      
                                    </div>
                                    <div class="col-md-4 form-group">
                                      <label>ស្រុក/ខ័ណ្ឌ</label><br/>
                                      <select name="" class="form-control">
                                        <option>---Choose District--</option>
                                        <option>kkk</option>
                                        <option>kkk</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>ខេត្ត/រាជធានី</label><br/>
                                      <select name="" class="form-control">
                                        <option>---Choose Province--</option>
                                        <option>kkk</option>
                                        <option>kkk</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                    <label>លេខទូរស័ព្ធ</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="tel" ></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>ទូរសារ</label><br/>
                                      <span class="smtext"><input type="text"  class="form-control" name="fax"></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label>សារអេឡិចត្រូនិច</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="email"></span>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="col-md-4 form-group">
                                    <label>អ៊ីម៉ែល</label><br/>
                                      <span class="smtext"><input type="text" class="form-control" name="email"></span>
                                    
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