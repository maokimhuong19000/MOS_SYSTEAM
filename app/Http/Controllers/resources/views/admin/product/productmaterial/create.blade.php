@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('equipment') }}
<div class="row">

  <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
              @endif
            @endforeach
          </div>


	<div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.equipment')}}</h4> <!-- must use translate text -->
          <br>
          <br>
          <form action="{{route('productmaterial.store')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group  {{ $errors->has('product_name') ? 'has-danger' : ''}}">
              <label>{{ trans('theadcol1.material') }}</label>
              <input type="text" name="product_name" class="form-control" >
              {!! $errors->first('product_name', '<p class="help-block" style="color: gray">:message</p>') !!}
            </div></p>

             <div class="form-group">
                <label>{{ trans('theadcol1.material') }} Khmer</label>
                <input type="text" name="capacity" class="form-control" value="" >
              </div>


            
            <div class="row">
              <div class="col-sm-6" style="">
                <div class="form-group {{ $errors->has('code') ? 'has-danger' : ''}}">
                  <label>{{ trans('input.productimport') }}</label>
                  <input type="text" name="code" class="form-control">
                  {!! $errors->first('code', '<p class="help-block" style="color: gray">:message</p>') !!}
                </div>
              </div>

              <div class="col-sm-6" style="">
                <div class="form-group {{ $errors->has('taxcode') ? 'has-danger' : ''}}">
                  <label>{{ trans('inputco.productimport') }}</label>
                  <input type="text" name="taxcode" class="form-control">
                  {!! $errors->first('taxcode', '<p class="help-block" style="color: gray">:message</p>') !!}
                </div>
              </div>

              
            </div>

            <div class="form-group">
              <input type="submit" value="{{ trans('buttonsave.productimport') }}" class="btn btn-primary">
               <a href="{{route('productmaterial.index')}}"><input type="button" value="{{ trans('buttoncancel.productimport') }}" class="btn btn-warning"></a>
            </div>
          </form>         
      </div>
    </div>
       
  </div>
</div>
@endsection