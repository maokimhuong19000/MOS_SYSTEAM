@extends('layout.front')
@section('content')
@include('layout.partical.headbar')


<div class="container">
    <div class="content_top col-sm-12 padding_top">
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
        
            <div>
                @if (session('status'))
                    <div class="alert-alert-success">
                        {{ session('status')}}
                    </div>
                @endif
                
            </div>
            <h3>បញ្ចូលអាសយដ្ឋានអ៊ីមែលដែលបានផ្ទៀងផ្ទាត់គណនីអ្នកប្រើរបស់អ្នកហើយយើងនឹងផ្ញើតំណកំណត់ពាក្យសម្ងាត់ ឲ្យ អ្នកវិញ។<br>Enter your user account's verified email address and we will send you a password reset link.</h3>
             <form class="form-horizontal" action="{{route('cus.password.email') }}" method="post">
                {{ csrf_field() }}
                    <div class="col-sm-12 ">
                        
                        <div class="form-group">
                            @if (session('errors'))
                            <div class="alert alert-danger" role="alert">
                                {{session('errors')}}
                            </div>
                        @endif
                            <div class="">អុីមែល/
                            Email​ <span class="star_require">*</span> 
                              
                            </div>
                        <input type="email" class="form-control " name="email" value="{{old('email')}}" required autofocus >
                        </div>
                    </div>


                   
                    <div class="col-sm-12 ">

                        <div class="col-sm-4 ">
                            <button  class="btn btn-lg btn-primary  ">
                                ដាក់ស្នើ/Submit
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


                    
                   
                </div>

                           
            </form>
        </div>



    </div>
    <div class="col-sm-2">
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
</div>



</div>
</div>

@endsection
