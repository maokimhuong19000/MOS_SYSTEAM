@extends('layout.master')
@section('content')
<div class="row">
{{ Breadcrumbs::render('useradd') }}
</div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
       
           
               <div class="card">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('user.createadmin')}}</h4>
      </div>

      <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update',$user->id) }}">
              

                        {{ csrf_field() }}

                        {{ method_field('PUT')}}
                       
                        <input type="hidden" name="type" value="1">
                        <input type="hidden" name="email" value="$user->email">

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{trans('user.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{trans('user.confirm_password')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   {{trans('buttonsave.productimport')}}
                                </button>
                            </div>
                        </div>
                    </form>
                
    </div></div></div>
</div>
@endsection
