{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
    background-color: floralwhite;
}

.box-shadow {
	-webkit-box-shadow: 0px 10px 20px 0px rgba(50, 50, 50, 0.52);
	-moz-box-shadow:    0px 10px 20px 0px rgba(50, 50, 50, 0.52);
	box-shadow:         0px 10px 20px 0px rgba(50, 50, 50, 0.52)
}
</style>
<body>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<h3 class="text-center text-white pt-5"></h3>
<div class="container">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">

          
          <div class="panel panel-default box-shadow">
            <div class="panel-heading">
              <span class="text-primary"></span>
              <span class="text-muted pull-right today" title="Today"></span>              
            </div><!--.panel-heading-->

            <div class="panel-body">
              <form method="POST" action="{{route('create',$new[0]->id)}}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="password">New password</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                    <input autofocus required type="password" id="password" name="password" class="form-control" placeholder="New Password" tabindex="1">
                  </div>
                </div>

                <div class="form-group">
                  <label for="cpassword">Comfirm Password</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                    <input required type="password" name="cpassword" class="form-control" placeholder="Comfirm Passowed" tabindex="2">
                  </div>
                </div>
                

                <button type="submit" class="btn btn-block btn-success" tabindex="3">Submit</button>
              </form>
            </div>
          </div><!--.panel-->
        </div><!--.cols-->
      </div><!--.row-->
    </div><!--.container-->
</body>
</html> --}}










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

                            @foreach (['error', 'warning', 'success', 'info'] as $key)
                                @if(Session::has($key))
    
                                    <p class="alert alert-danger">{{ Session::get($key) }}
                                    </p>
    
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
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first('email')}}
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
                            <input id="password-confirm" type="password" class="form-control" name="confirm_password" required>
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

