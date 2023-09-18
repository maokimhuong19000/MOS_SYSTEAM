@extends('layout.front')
@section('content')
@include('layout.partical.headuser')
  <div class="container">
    <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
    <center>
          <div class="padding-top-xs">
              <div class="content_bottom_font padding-sm"><b>{{trans('front.idata')}}</b></div>
          </div> 
    </center>
<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 no-padding ">


    <div class="flash-message">
                  @foreach (['error', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{$key}} ">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>


@if( @$Customer->ctype != 2 )
<div class="col-md-12 ">
  <div class="panel panel-moe">
      <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('idata.materialhead')}} </span></div>
      <div class="panel-body">        
        <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      </div>
          <div id="" class="mtable"><div class="clear"></div>
            <table id="t2" class="table table-bordered responsive" style="width:100%">
              <thead>
                <tr role="row">
                  <th >#</th>
                   <th >{{trans('idata.isubstance_no')}}</th>
                  <th >{{trans('idata.isubstance_date')}}</th>
                 
                  <th>{{trans('idata.isubstance_total')}}</th>
                  <th>{{trans('idata.isubstance_status')}}</th>
                 
                  <th>{{trans('idata.isubstance_action')}}</th>
                </tr>
              </thead>

              <tbody>
                @foreach($isubstance as $materials)
                <tr role="row">
                  <td>{{ $materials->rownum }}</td>
                  <td>{{ $materials->request_no }}</td>
                  <td>{{ \App\Helpers\AppHelper::instance()->format_date($materials->created_at) }}</td>
                  
                  <td>{{ \App\Helpers\AppHelper::instance()->format_kg($materials->Total) }}</td>
                  <td>{{ \App\Helpers\AppHelper::instance()->import_status($materials->import_status) }}</td>
                  
                  <td><a href="{{route('isubstance.isubstance_show',$materials->id)}}"><i class="material-icons">visibility</i></a></td>
                </tr>
                @endforeach
                 <tfoot>
               
             </tfoot>
              </tbody>
            </table>
            <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="col-sm-12 " >{{$isubstance->links()}}</div>
         </div> 
     
  </div>
</div>
@endif

@if( @$Customer->ctype != 1 )
<div class="col-md-12 ">
  <div class="panel panel-moe">
      <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('front_equipmentdetail.detail')}} </span></div>
      <div class="panel-body">        
        <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      </div>
      <div id="" class="mtable"><div class="clear"></div>
          <table class="table table-bordered dataTable no-footer dtr-inline collapsed" id="zzz" style="width: 100%" >
            <thead >
              <tr>
                  <th >#</th>
                  <th >{{trans('idata.isubstance_no')}}</th>
                 <th >{{trans('idata.isubstance_date')}}</th>                 
                  <th>{{trans('idata.isubstance_total')}}</th>
                  <th>{{trans('idata.isubstance_status')}}</th>                 
                  <th>{{trans('idata.isubstance_action')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($equipmentrequest as $eqrequest)
                <tr>
                  <td>{{$eqrequest->rownum}}</td>
                   <td>{{$eqrequest->request_no}}</td>
                  <td>{{ \App\Helpers\AppHelper::instance()->format_date($eqrequest->created_at) }} </td>
                  <td>{{ $eqrequest->Total }}</td>
                  <td>{{ \App\Helpers\AppHelper::instance()->import_status($eqrequest->import_status) }}</td>
                  
                  <td><a href="{{route('front.showdetail_equipmentrequest',$eqrequest->id)}}"><i class="material-icons">visibility</i></a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
           <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="col-sm-12 " >
          {{$equipmentrequest->links()}}</div>
        </div>
        
      </div>
  </div>
@endif

@if( @$Customer->ctype != 2 )
<div class="col-md-12 ">
<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('idata.quotahead')}} </span></div>
    <div class="panel-body">
      <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    </div>
    <div id="" class="mtable"><div class="clear"></div>
          <table id="t1" class="table table-bordered dataTable no-footer dtr-inline collapsed" data-page-length='10' style="width:100%">
            <thead>
              <tr>
                <th width="10%" >#</th>
                <th width="30%" >{{trans('idata.isubstance_date')}} </th>
                <th width="40%" >{!!trans('label_total.idata')!!} </th>
                <th width="20%" >{!!trans('idata.isubstance_action')!!} </th>
              </tr>
            </thead>

            <tbody>
              @foreach($request as $rq)
               <tr>
                  <td>{{$rq->rownum}}</td>
                  <td>{{ \App\Helpers\AppHelper::instance()->format_date($rq->created_at) }}</td>
                  <td>{{ \App\Helpers\AppHelper::instance()->format_kg($rq->total) }}</td>
                  <td><a href="{{route('idata.showrquest_cust',$rq->id)}}"><i class="material-icons">visibility</i></a></td>
               </tr>
              @endforeach
           <tfoot>
             
           </tfoot>
            </tbody>
          </table>
          <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="col-sm-12 " >
          {{$request->links()}}</div>
      
        </div>
</div>
</div>
@endif






</div>


 </div>
  </div>
  </div> 
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
     
      $("#ididata").addClass("active");
    });
  </script>
@endsection