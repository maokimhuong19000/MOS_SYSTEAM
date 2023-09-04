@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('create country') }}
<div class="row">


                  
	<div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('create.country3')}}</h4>
          <br>
          @foreach (['error', 'warning',  'info'] as $key)
                                @if(Session::has($key))
                                <!-- <div class="alert alert-danger"> -->
                                <ul>
                                        <li style="color: red">{{ Session::get($key) }}</li>
                                </ul>
                            <!-- </div> -->
                                @endif
                            @endforeach
                        </div>
                        
                        @if ($errors->any())
                            <!-- <div class="alert alert-danger"> -->
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            <!-- </div> -->
                        @endif
          <form action="{{route('country.store')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }}
            <input type="hidden" name="countries_name">
            <div class="form-group  {{ $errors->has('product_name') ? 'has-danger' : ''}}">
              <label>ឈ្មោះប្រទេសជាអង់គ្លេស</label>
              <input type="text" name="country_en" class="form-control" require>
              <!-- {!! $errors->first('country_en', '<p class="help-block" style="color: red">:message</p>') !!} -->
            </div></p>

             <div class="form-group">
                <label>ឈ្មោះប្រទេសជាភាសាខ្មែរ</label>
                <input type="text" name="country_kh" class="form-control" value="" require>
                <!-- {!! $errors->first('country_kh', '<p class="help-block" style="color: red">:message</p>') !!} -->
              </div>


            
            

            <div class="form-group">
              <input type="submit" value="{{ trans('buttonsave.productimport') }}" class="btn btn-primary">
               <a href="{{route('country.index')}}"><input type="button" value="{{ trans('buttoncancel.productimport') }}" class="btn btn-warning"></a>
            </div>
          </form>         
      </div>
    </div>
       
  </div>
</div>
@endsection