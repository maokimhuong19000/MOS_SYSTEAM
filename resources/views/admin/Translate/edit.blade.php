@extends('layout.master')

@section('content')


<div class="row">
{{ Breadcrumbs::render('translateedit') }}
</div>
<br>
<div class="row">
	<div class="col-lg-12 col-md-12">

    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('label.translateedit')}}</h4>
      </div>

      <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
              @endif
            @endforeach
      </div>

      <div class="card-body">
        <form method="post" action="{{route('translate.update',[$lanupdate[0]->item,$lanupdate[0]->group])}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('PATCH')}}
              <input type="hidden" name="kh_id" value="{{$lanupdate[0]->kh_id}}">
              <input type="hidden" name="en_id" value="{{$lanupdate[0]->en_id}}">


              <div class="form-group">
                <label>group</label>
                <input type="text" name="group" class="form-control" id="group" value="{{$lanupdate[0]->group}}" >
              </div>

              <div class="form-group">
                <label>Itme</label>
                <input type="text" name="item" class="form-control" id="item" value="{{$lanupdate[0]->item}}">
              </div>

              <div class="form-group">
                <label>Khmer</label>
                <input type="text" name="kh" class="form-control" id="kh" value="{{$lanupdate[0]->kh_text}}" >
              </div>

              <div class="form-group">
                <label>Enlish</label>
                <input type="text" name="en" class="form-control" id="en" value="{{$lanupdate[0]->en_text}}" >
              </div>


              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
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