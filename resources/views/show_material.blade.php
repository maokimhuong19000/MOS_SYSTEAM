@extends('layout.front')
@section('content')
  @include('layout.partical.headuser')
  <div class="container">
    <div class="col-md-12 col-12">
      <div class="modal-body">
          <table id="ManageTable" class="table table-hover" style="width:100%">
            <thead>
              <tr>
                <th width="10%">No</th>
                <th width="10%">Country name</th>
                <th>import_date</th>
                <th>self_usage_percent</th>
                <th>other_usage_percent</th>
                <th>Option</th>
              </tr>
            </thead>

            <tbody>
              @foreach($isubstance as $materials)
              <tr>
                <td>{{$materials->id}}</td>
                <td>{{$materials->import_port}}</td>
                <td>{{$materials->import_date}}</td>
                <td>{{$materials->self_usage_percent}}</td>
                <td>{{$materials->other_usage_percent}}</td>
                <td><a href="{{route('isubstance.isubstance_show',$materials->id)}}"><i class="fa fa-eye"></i></a></td>
              </tr>
              @endforeach
           
            </tbody>
          </table>
          {{$isubstance->links()}}
      </div>
    </div>
  </div>
  
@endsection
