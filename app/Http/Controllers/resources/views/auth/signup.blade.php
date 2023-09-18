@extends('layout.front')
@section('content')
@include('layout.partical.headbar')


<div class="container">
<div class="content_top col-sm-12 padding_top">

<div class=""  style="margin-top:30px;">

   
    <div class="col-sm-3">
        <div class="left_sign hidden-xs">
            <div class="">

                <div class="col-sm-12">
                        &nbsp;
                 </div>
                <div class="col-sm-12">
                        &nbsp;
                </div>
                <div class="col-sm-12">
                        &nbsp;
                </div>
                <div class="col-sm-12">
                        &nbsp;
                 </div>
                <div class="col-sm-12">
                        &nbsp;
                </div>
                <div class="col-sm-12 col-xs-12 logo_ev text-center" >
                   
                    <img class="" src="{{asset('front/img/cc.png')}}">
                </div>

                <div class="col-sm-12">
                        &nbsp;  
                </div>
                <div class="col-sm-12 col-xs-12  text-center"  style="font-size: 16px">
                   
                    <span>អគ្គនាយកដ្ឋានគាំពារបរិស្ថាន</span>
                </div>
                <div class="col-sm-12 col-xs-12 text-center text-uppercase " style="font-size: 14px">
                   
                    <span>General Directorate of Environmental Protection</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-9 sign_form">
        <div class="right_login" >
            <h3>សូមបញ្ចូលព័ត៌មានក្រុមហ៊ុនដើម្បីចុះឈ្មោះប្រើប្រាស់<br>Please enter your company inforamtion to sign up</h3>
             <form class="form-horizontal" method="POST" action="{{ route('cust.auth.saveuser') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                <div class="row row_frm_login">
                    <div class="col-sm-12">
                        
                    </div>
                <div class="row">
                    <div class="col-sm-6 ">
                        
                        <div class="form-group">
                            <div class="">ឈ្មោះអ្នកប្រើប្រាស់/
                            Username​ <span class="star_require text-danger">*</span>                               
                            </div>
                            <input type="text" class="form-control " name="user_name" value="{{ old('user_name') }}" required autofocus >
                             @if ($errors->has('user_name'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('user_name') }}
                                    </div>
                                @endif
                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">{{trans('label_contact.com_name')}} <span class="star_require text-danger">*</span>
                              
                            </div>
                            <input type="text" value="{{old('company_name')}}" name="company_name" class="form-control" required>
                             @if ($errors->has('company_name'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('company_name') }}
                                    </div>
                                @endif   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">ពាក្យសម្ងាត់/ Password <span class="star_require text-danger">*</span>
                                 
                            </div>
                             <input type="password" class="form-control " type="password" class="form-control" name="password" required>
                             @if ($errors->has('password'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                        </div>
                    </div>

                     <div class="col-sm-6 ">
                        
                        <div class="form-group">
                            <div class=""> {{trans('label_contact.com_type')}}<span class="star_require text-danger">*</span> 
                             
                            </div>
                           <select name="ctype" id="ctype" class="form-control">
                                <option value="2">{{trans('label_contact.ctype2')}}</option>
                                <option value="1">{{trans('label_contact.ctype1')}}</option>
                                <option value="0">{{trans('label_contact.ctype0')}}</option>
                            </select>
                              @if ($errors->has('ctype'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('ctype') }}
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row">
              
                     <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">បញ្ចាក់ពាក្យសម្ងាត់/Confirm Password  <span class="star_require text-danger">*</span>
                                
                            </div>
                             <input type="password" class="form-control " type="password"  name="password_confirmation" required>
                        </div>
                    </div>
                     <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">{{trans('label.email')}}<span class="star_require text-danger">*</span>
                              
                            </div>
                             <input type="text" value="{{old('email')}}" class="form-control" name="email">
                                @if ($errors->has('email'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">{{trans('label_contact.idcard')}} <span class="star_require text-danger">*</span>
                                
                            </div>
                             <input type="file" name="id_card">

                              @if ($errors->has('id_card'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('id_card') }}
                                    </div>
                                @endif
                        </div>
                    </div>

                     <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">{{trans('label.phone')}} <span class="star_require text-danger">*</span>
                                
                            </div>
                             <input type="text" value="{{ old('tel')}}" class="form-control" name="tel" >
                              @if ($errors->has('tel'))
                                    <div class="text-danger small-text">
                                        {{ $errors->first('tel') }}
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                                    
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="">{!!trans('label_contact.certificate_tin')!!} <span class="star_require">*</span>
                               
                            </div>
                             <input type="file" name="tin_path">
                               @if ($errors->has('tin_path'))
                                    <span class="text-danger small-text">
                                        {{ $errors->first('tin_path') }}
                                    </span>
                                @endif
                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class=""> {!!trans('label_contact.patent_file')!!} <span class="star_require">*</span>
                                
                            </div>
                            <input type="file" name="patent">
                             @if ($errors->has('patent'))
                                    <span class="text-danger small-text">
                                        {{ $errors->first('patent') }}
                                    </span>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class=""> {{trans('label_contact.add_another_certificate_ministry')}} <span class="star_require">*</span>
                                
                            </div>
                             <input type="file" name="id_path">
                              @if ($errors->has('id_path'))
                                    <span class="text-danger small-text">
                                        {{ $errors->first('id_path') }}
                                    </span>
                                @endif
                        </div>
                    </div>

                        
                        <div class="col-sm-6 text-right ">
                            <div class="col-sm-12">
                                    &nbsp;
                                </div>
                            <div class="col-sm-12 ">
                            <button  class="btn btn-lg btn-primary  ">
                                ស្នើសុំ/Request
                            </button>
                             </div>
                        </div>
                </div>
                   
                </div>

                         
            </form>
        </div>



    </div>
    

</div>

<div class="col-sm-12">
        &nbsp;
 </div>
<div class="col-sm-12">
        &nbsp;
</div>
<div class="col-sm-12">
        &nbsp;
</div>

</div>
</div>

@endsection
