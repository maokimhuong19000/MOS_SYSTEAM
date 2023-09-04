@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('edite',$Equipment) }}
<div class="row">
  <div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('label.editproduct')}} : <span > {{ $Equipment->product_name}} </span></h4> <!-- must use translate text -->
                    
      </div>

         <div class="card-body">
           <form action="{{route('productmaterial.update',$Equipment->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('PUT')}}
              <div class="form-group">
                <label>{{ trans('theadcol1.material') }}</label>
                <input type="text" name="product_name" class="form-control" value="{{ $Equipment->product_name}}">
              </div>

              <div class="form-group">
                <label>{{ trans('theadcol1.material') }} Khmer</label>
                <input type="text" name="capacity" class="form-control" value="{{ $Equipment->capacity}}" >
              </div>


              <div class="row">
                <div class="col-sm-6" style="">
                  <div class="form-group">
                    <label>{{ trans('input.productimport') }}</label>
                    <input type="text" name="code" class="form-control" value="{{ $Equipment->code}}">
                  </div>
                </div>

                <div class="col-sm-6" style="">
                  <div class="form-group">
                    <label>{{ trans('inputco.productimport') }}</label>
                    <input type="text" name="taxcode" class="form-control" value="{{ $Equipment->taxcode}}">
                  </div>
                </div>


              </div>

              <div class="form-group">
                <input type="submit" value="{{ trans('buttonsave.productimport') }}" class="btn btn-primary">
                 <a href="{{route('productmaterial.index')}}"><input type="button" value="{{ trans('buttoncancel.productimport') }}" class="btn btn-warning"></a>
              </div>
              
            </form>      
          </div>
          <!-- end card body -->
     </div>

     <!-- end card -->
    </div>

    <!-- end col -->
</div>

<!-- end row -->
@endsection