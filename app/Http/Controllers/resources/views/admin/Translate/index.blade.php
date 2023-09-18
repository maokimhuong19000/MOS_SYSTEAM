@extends('layout.master')

@section('content')


 <div class="row">
{{ Breadcrumbs::render('translate') }}
</div>
<br>
<div class="row">
	<div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.translate')}}</h4>
        </div>

        <div class="col-md-3 ml-auto">
          <div class="card-body text-right">
            <button class="btn btn-info btn-round btn-fab"><a class="btn-info" href="{{route('translate.create')}}">
              <i class="material-icons">add</i>
              <div class="ripple-container">
                            
              </div></a>
            </button>
          </div>
        </div>

        <div class="flash-message">
          <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
              @if(Session::has($key))
                        
                <p class="alert alert-{{ $key }}">{{ Session::get($key) }} </p>
              @endif
            @endforeach
          </div>
        </div>

        <div class="card-body table-responsive">
          <table class="table table-striped" id="ManageTable" style="width: 100%" data-page-length='100'>
            <thead class="text-warning">
              <tr>
                    <th>#</th>
                    <th>Group</th>
                    <th>Item</th>
                    <th>Khmer</th>
                    <th>English</th>
                    <th style="text-align: right;">Edit</th>
                  </tr>
            </thead>
            <tbody>  

              @foreach($lan as $languages) 
                <tr>
                  <td>{{$languages->id}}</td>
                  <td>{{$languages->group}}</td>
                  <td>{{$languages->item}}</td>
                  <td>{{$languages->kh_text}}</td>
                  <td>{{$languages->en_text}}</td>
                  <td>
                    <a href="{{route('translate.edit',[$languages->item,$languages->group])}}"><i class="material-icons">edit</i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<!-- end modal -->
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#ManageTable').DataTable({
        
      });
    });
  </script>
@endsection