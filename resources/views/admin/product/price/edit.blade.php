@extends('layout.master')

@section('content')

{{ Breadcrumbs::render('editprice',$ifee) }}

<div class="row">


	<div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('bar-edit.priceedit')}}: ({{(int)($ifee->from)}} - {{(int)($ifee->to)}})</h4>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('price.update',$ifee->id)}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('PUT')}}
          <div class="form-group" style="width: 50%">
            <label>{{trans('theadcol4.price')}}:</label>
            <select class="form-control" id="type" name="feetype">
                <option value="Material" {{($ifee->feetype ==='Material') ? 'selected' : ''}}> Material </option>
                <option value="Equipment" {{($ifee->feetype ==='Equipment') ? 'selected' : ''}}> Equipment </option>
            </select>
          </div>
          <div class="form-group">
            <label>{{trans('theadcol3.price')}}</label>
            <input type="text" name="fee" class="form-control" value="{{$ifee->fee}}">
          </div>

          <div class="row">
            <div class="col-md-6">
              <label>{{trans('inputfrom.price')}}</label>
              <input type="text" name="from" class="form-control" value="{{$ifee->from}}">
            </div>
            <div class="col-md-6">
              <label>{{trans('inputto.price')}}</label>
              <input type="text" name="to" class="form-control" value="{{$ifee->to}}">
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <input type="submit" value="{{trans('buttonsave.productimport')}}" class="btn btn-primary">
             <a href="{{route('price.index')}}"><input type="button" value="{{trans('buttoncancel.productimport')}}" class="btn btn-warning"></a>
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