@extends('layout.front')
@section('content')
@include('layout.partical.headbar')


<div class="container">
<div class="content_top col-sm-12 padding_top">
    @if (session('success'))
                        
                                <div style="color:green;text-align:center">{{ session('success')}}</div>
                                
                            @endif
<div class=""  style="margin-top:30px;">

    <div class="col-sm-2">
        &nbsp;
    </div>

    <div class="col-sm-3">
        <div class="left_login hidden-xs">
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
    <div class="col-sm-5 login_form">
       
        <div class="right_login" >
        
            <h3>សូមបញ្ចូលឈ្មោះអ្នកប្រើប្រាស់ និង ពាក្យសម្ងាត់<br>Please enter your username and password</h3>
             <form class="form-horizontal" method="POST" action="{{ route('cust.auth.loginCustomer') }}">
                        {{ csrf_field() }}
                <div class="row row_frm_login">
                    <div class="col-sm-12">
                        @if ($errors->any())

                                <div class="flash-message">
                                    
                                        @foreach ($errors->all() as $error)
                                       <p class="alert alert-danger">    {{ $error }}</p>
                                        @endforeach
                                    
                                </div>
                            @endif
                        
                    </div>
                    <div class="col-sm-12 ">
                        
                        <div class="form-group">
                            <div class="">ឈ្មោះអ្នកប្រើប្រាស់/
                            Username​ <span class="star_require">*</span> 
                               @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="text" class="form-control " name="user_name" value="{{ old('user_name') }}" required autofocus >
                        </div>
                    </div>

                    <div class="col-sm-12 ">
                        <div class="form-group">
                            <div class="">ពាក្យសម្ងាត់/ Password <span class="star_require">*</span>
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <input type="password" class="form-control " type="password" class="form-control" name="password" required>
                        </div>
                    </div>


                   
                    <div class="col-sm-12 ">

                        <div class="col-sm-7 ">
                        <a href="{{route('cus.password.request')}}">ភ្លេចលេខសម្ងាត់/Forgot password</a>
                        </div>
                        <div class="col-sm-4 ">
                            <button  class="btn btn-lg btn-primary  ">
                                ចូលប្រើ/Login
                            </button>
                        </div>
                    </div>

                    <div class="col-sm-12">
                            &nbsp;
                        </div>
                    <div class="col-sm-12">
                        <div class="show_line">
                            <hr style="width:100%;background-color:#fff;margin: 7px;margin-top: 0px;height: 2px; border:0;">
                        </div>
                    </div>
                     <div class="col-sm-12">
                            &nbsp;
                        </div>
                     <div class="col-sm-12">
                       
                        <div class="col-sm-12  text-center">
                            <a href="{{url('signup')}}" >ចុះឈ្មោះប្រើប្រាស់ប្រព័ន្ធ/Register New Account</a>
                        </div>
                       
                    </div>


                    
                   
                </div>

                           
            </form>
        </div>



    </div>
    <div class="col-sm-2">
        &nbsp;
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
