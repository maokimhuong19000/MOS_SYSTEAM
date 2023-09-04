@extends('layout.master')

@section('content')
{{ Breadcrumbs::render('createprice') }}

<div class="row">
	<div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('label.createpricekh')}}</h4>
      </div>

      <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
              @endif
            @endforeach
          </div>

      <div class="card-body">
        <form method="post" action="{{route('price.store')}}">
          {{ csrf_field() }}
          <div class="form-group" style="width: 50%">
            <label>{{trans('theadcol4.price')}}:</label>
            <select name="feetype" class="form-control">
              <option value="Material">Material</option>
              <option value="Equipment">Equipment</option>
              <span><i class="material-icons">home</i></span>
            </select>
          </div>

          <div class="form-group">
            <label>{{trans('theadcol3.price')}}(Riel)</label>
            <input type="text" name="fee" class="form-control" id="fee">
            {!! $errors->first('fee', '<p class="help-block" style="color: gray">:message</p>') !!}
          </div>

          <div class="row">
            <div class="col-md-6">
              <label>{{trans('inputfrom.price')}}</label>
              <input type="text" name="from" class="form-control">
              {!! $errors->first('from', '<p class="help-block" style="color: gray">:message</p>') !!}
            </div>
            <div class="col-md-6">
              <label>{{trans('inputto.price')}}</label>
              <input type="text" name="to" class="form-control">
              {!! $errors->first('to', '<p class="help-block" style="color: gray">:message</p>') !!}
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <input type="submit" value="{{trans('buttonsave.productimport')}}" class="btn btn-primary">
             <a href="{{route('price.index')}}"><input type="button" id="cancel" value="{{trans('buttoncancel.productimport')}}" class="btn btn-warning"></a>
          </div>
        </form>  
      </div>
    </div>      
  </div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
       
  </script>
@endsection