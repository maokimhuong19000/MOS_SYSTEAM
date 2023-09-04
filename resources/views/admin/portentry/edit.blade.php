@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('edit entry',$port) }}
<div class="row">


                  
	<div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('edite.edit_entry')}}</h4>
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
          <form action="{{route('entry.update',$port->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('PUT')}}
            <input type="hidden" name="countries_name">
            <div class="form-group  {{ $errors->has('product_name') ? 'has-danger' : ''}}">
              <label>{{trans('namee.entry_name')}}</label>
              <input type="text" name="port_name" class="form-control" value={{$port->port_name}} require>
              <!-- {!! $errors->first('country_english', '<p class="help-block" style="color: red">:message</p>') !!} -->
            </div></p>

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