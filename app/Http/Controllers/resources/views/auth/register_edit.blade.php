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
                         <input type="hidden" name="type" value="0">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('user.username')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('user.email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
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
