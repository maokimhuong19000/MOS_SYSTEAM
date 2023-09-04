@extends('layout.front')
@section('content')
@include('layout.partical.headuser')
<div class="container">
  <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child no_padding">
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="row row-isubstanc" style="width: 95%;margin: auto;">
          <div class="panel-heading text-center" id="equipment">{{trans('front_equipmentrequest.equipmentrequest')}}</div>
          <div class="card">
            <div class="card-body table-responsive">
              <table class="table table-striped" id="ManageTable" style="width: 100%" data-page-length='100'>
                <thead class="text-warning">
                  <tr>
                    <th width="10%">#</th>
                    <th width="20%">{{trans('isubstance.manufacture_name')}}</th>
                    <th width="10%">{{trans('Incoming_arrival.fro_isubstance')}}</th>
                    <th width="15%">{{trans('front_isubstance.created_at')}}</th>
                    <th width="30%">{{trans('front_address.address')}}</th>
                    <th>{{trans('theadcol5.register')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($equipmentrequest as $eqrequest)
                  <tr>
                    <td>{{$eqrequest->id}}</td>
                    <td>{{$eqrequest->manufacture_name}}</td>
                    <td>{{$eqrequest->import_date}}</td>
                    <td>{{$eqrequest->created_at}}</td>
                    <td>{{$eqrequest->address}}</td>
                    <td><a href="{{route('front.showdetail_equipmentrequest',$eqrequest->id)}}"><i class="material-icons">visibility</i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$equipmentrequest->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection