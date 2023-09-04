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
                   
                    <span>General Department of enviromental protection</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-9 sign_form">
        <div class="right_login" >
            <h3>ព័ត៌មាន<br>Information</h3>
            
                <div class="row row_frm_login">
                    <div class="col-sm-12">
                        
                    </div>
                
               <div class="content_bottom_font padding-sm"><b>{{$message}}</b></div>
                
               
                
                   
                </div>

                         
           
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
