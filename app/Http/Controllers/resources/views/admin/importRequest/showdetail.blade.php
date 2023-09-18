@extends('layout.master')

@section('content')
{{ Breadcrumbs::render('request_quotadetail', $requestdetail) }}


	<div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('back.request_quota')}}:  {{ $requestdetail->id }}</h4>
                </div>

                <div class="card-body table-responsive">
                     <div class="row"><div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </div> 
                  
 

                  <table class="table table-striped" id="ManageTable" style="width: 100%" data-page-length='100'>
                    <thead class="text-warning">
                      <tr>
                         
                          <th width="40%">{{trans('back_iquota.substance')}}</th>
                          <th width="30%">{{trans('back_iquota.quanlity')}}</th>
                          <th width="30%">{{trans('back_iquota.old_quanlity')}}</th>
                          
            
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($requestdetail->quotarequestdetails as $rd)
                        <tr>
                        
                        <td>
                          
                            {{$rd->material->substance}}
                         
                        </td>
                        <td>
                            {{ \App\Helpers\AppHelper::instance()->format_kg($rd->amount) }}                         
                        </td>

                        <td>
                            {{ \App\Helpers\AppHelper::instance()->format_kg($rd->old_amount) }}
                        </td>

                     
                      </tr>
                     @endforeach


                    </tbody>
                  </table>

                  <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                  <hr>

                  <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12 ">
                         <label class="bmd-label-static">{{trans('theadcol2.register')}}:</label>  {{$requestdetail->Customer->company_name}}
                      </div>
                     <div class="col-md-4 col-sm-4 col-xs-12"> <label class="bmd-label-static">{{trans('idata_back.isubstance_date')}}:</label>
                      {{\App\Helpers\AppHelper::instance()->format_dateh($requestdetail->created_at) }}
                     </div>
                      <div class="col-md-4 col-sm-4 col-xs-12"><label class="bmd-label-static">{{trans('back.year_quota')}}:</label>  {{$requestdetail->year}}</div>
                    </div>

                 

                  <a href="{{route('annualquotarequest')}}" class="btn btn-primary pull-right">Back</a>
                    <a href="{{route('annualquotarequest.qrequest',$requestdetail->id)}}"><input type="button" value="Request" class="btn btn-info"></a>
                </div>
              </div>
        </div>
     </div>
@endsection

