@extends('layout.master')

@section('content')


<div class="row">
{{ Breadcrumbs::render('translatecreate') }}
</div>
<br>
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
        <form method="post" action="{{route('translate.store')}}">
            {{ csrf_field() }}
            <select name="locale" class="form-control">
             
                <option value="kh">Khmer</option>
                <option value="en">English</option>
  
            </select>
            
              <div class="form-group">
                <label>group</label>
                <input type="text" name="group" class="form-control" id="group" placeholder="Enter group">
                {!! $errors->first('group', '<p class="help-block" style="color: gray">:message</p>') !!}
              </div>

              <div class="form-group">
                <label>Itme</label>
                <input type="text" name="item" class="form-control" id="item" placeholder="Enter Item">
                {!! $errors->first('item', '<p class="help-block" style="color: gray">:message</p>') !!}
              </div>

              <div class="form-group">
                <label>Text</label>
                <input type="text" name="text" class="form-control" id="text" placeholder="Enter Khmer">
                {!! $errors->first('text', '<p class="help-block" style="color: gray">:message</p>') !!}
              </div>

              <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
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