@extends('layout.front')
@section('content')
  @include('layout.partical.headuser')
  <div class="container">
  	<div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
  		 <center>
          <div class="padding-top-xs">
              <div class="content_bottom_font padding-sm"><b>{{trans('front.request_quota')}}</b></div>
          </div> 
    </center>
   
  	
       <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
       <div class="col-md-12 ">
             

        <div class="panel panel-moe">
            <div class="panel-body">



                  <div class="col-sm-12 ">
                  <table class="table table-striped" id="abc" style="width: 100%" >
                    <thead class="">
                      <tr>
                          <th >{!!trans('label_iquota.substance')!!}</th>
                          <th >{!!trans('label_iquota.quanlity')!!}</th>
                          <th >{!!trans('label_iquota.old_quanlity')!!}</th>
                        
            
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($requestdetail->quotarequestdetails as $rd)
                        <tr>
                        
                        <td>
                          
                            {{$rd->material->substance}}<br>
                         
                        </td>
                        <td>
                          {{ \App\Helpers\AppHelper::instance()->format_kg($rd->amount) }}
                         
                        </td>

                        <td><?php   $old = $rd->old_amount?$rd->old_amount:0; ?>
                          {{ \App\Helpers\AppHelper::instance()->format_kg($old) }}
                          
                        </td>

                      
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>



                  <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>


                  
                   <div class="col-sm-6" ><span>{{trans('front_isubstance.year')}}</span>:  {{$requestdetail->year}}</div>
                   <div class="col-sm-6"><span>{{trans('idata.isubstance_date')}}</span>:  {{\App\Helpers\AppHelper::instance()->format_dateh($requestdetail->created_at) }}</div> 
                
                </div>
              </div>


              <div class="col-sm-6 "></div>
                  <div class="col-sm-6 "><div class="text-right"><a href="{{route('front.idata')}}" class="btn btn-primary btn-lg">Back</a></div></div>
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