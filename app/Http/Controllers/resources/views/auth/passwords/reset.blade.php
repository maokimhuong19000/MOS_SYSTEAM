@extends('layout.create_new')
<div class="container">
    <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 no-padding ">


<div class="col-md-3 " style=""></div>


<div class="col-md-6 pwd_form" style="">

  <div class="right_login">
            <h3>បង្កើតពាក្យសម្ងាត់ថ្មី/Create New Password</h3>
              <form class="form-horizontal" method="POST" action="{{route('cus.password.update')}}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row row_frm_login">
                    <div class="col-sm-12">
                        <div class="flash-message">

                            @foreach (['error', 'warning',  'info'] as $key)
                                @if(Session::has($key))
                                <div class="alert alert-danger">
                                <ul>
                                        <li>{{ Session::get($key) }}</li>
                                </ul>
                            </div>
                                @endif
                            @endforeach
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <input id="email" type="hidden" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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

