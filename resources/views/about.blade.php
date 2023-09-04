@extends('layout.front')
@section('content')
@include('layout.partical.headuser')

<div class="container">
    <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 no-padding ">


<div class="col-md-3 " style=""></div>


<div class="col-md-6 pwd_form" style="">

  <div class="right_login">
            <h3>{{trans('front.report_password')}}</h3>
              <form class="form-horizontal" method="POST" action="{{ route('front.resetpwd') }}">
                {{ csrf_field() }}
                  {{ method_field('PATCH')}}
                <div class="row row_frm_login">
                    <div class="col-sm-12">
                        <div class="flash-message">
                          @foreach (['error', 'warning', 'success', 'info'] as $key)
                            @if(Session::has($key))
                            
                                 <p class="alert alert-{{$key}} ">{{ Session::get($key) }}
                                 </p>
                                 
                            @endif
                          @endforeach
                          @if ($errors->any())

                                <div class="flash-message">
                                    
                                        @foreach ($errors->all() as $error)
                                       <p class="alert alert-danger">    {{ $error }}</p>
                                        @endforeach
                                    
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 ">
                        
                        <div class="form-group">
                            <div class="">{{trans('front.report_password_old')}}<span class="star_require">*</span> 
                                                           </div>
                           <input id="passwordo" type="password" class="form-control" name="oldpassword" required>
                        </div>
                    </div>

                    <div class="col-sm-12 ">
                        <div class="form-group">
                            <div class="">{{trans('front.report_password_new')}}<span class="star_require">*</span>
                                                             </div>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="col-sm-12 ">
                        <div class="form-group">
                            <div class="">{{trans('front.report_password_con')}}<span class="star_require">*</span>
                                                             </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>


                   
                    <div class="col-sm-12 ">

                        <div class="col-sm-6 ">
                           
                        </div>
                        <div class="col-sm-6 ">
                            <button class="btn btn-lg btn-primary  ">
                               {{trans('front.report_changepwd')}}
                            </button>
                        </div>
                    </div>

                    <div class="col-sm-12">
                            &nbsp;
                        </div>


                </div>

              </form>
        </div>
  

</div>
<div class="col-md-3 " style=""></div>

  </div>
  </div> 
</div> 

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){     
      $("#cpwd").addClass("active");
    });
  </script>
@endsection