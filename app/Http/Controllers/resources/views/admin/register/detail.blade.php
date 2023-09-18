@extends('layout.master')

@section('content')
{{ Breadcrumbs::render('detail',$Customer) }}
<style>
.toggle
{
    width: 110px !important;
    height: 50px !important;
}
.toggle::after {
    width: 40px !important;
    height: 40px !important;
    top: 5px !important;
    border-radius: 50px 50px !important;
}
input:checked + .toggle:after {
    -webkit-transform: translateX(50px) !important;
    -ms-transform: translateX(50px) !important;
    transform: translateX(50px) !important;
}
.gj-icon{
  display: none;
}

</style>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="card">
<div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('navbar.register')}} </h4>
</div>


<div class="card-body">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $key)
            @if(Session::has($key))

                <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                </p>
            @endif
        @endforeach
    </div>

<div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>


  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{trans('tab.detail')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{trans('tab1.detail')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#import" role="tab" aria-controls="contact" aria-selected="false">{{trans('tab2.detail')}}</a>
  </li>
  @if ($Customer->ctype==2)
    <li class="nav-item">
      <a class="nav-link" id="equitment-tab" data-toggle="tab" href="#equitment" role="tab" aria-controls="equitment" aria-selected="false">{{ trans('import.item1') }} </a>
    </li>
  @endif
  @if ($Customer->ctype==1)
    <li class="nav-item">
      <a class="nav-link" id="substance-tab" data-toggle="tab" href="#substance" role="tab" aria-controls="substance" aria-selected="false">{{ trans('import.item3') }} </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="quota-tab" data-toggle="tab" href="#gquota" role="tab" aria-controls="gquota" aria-selected="false">{{ trans('import.item2') }} </a>
    </li>
  @endif
  @if ($Customer->ctype==0)
  <li class="nav-item">
    <a class="nav-link" id="equitment-tab" data-toggle="tab" href="#equitment" role="tab" aria-controls="equitment" aria-selected="false">{{ trans('import.item1') }} </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="substance-tab" data-toggle="tab" href="#substance" role="tab" aria-controls="substance" aria-selected="false">{{ trans('import.item3') }} </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="quota-tab" data-toggle="tab" href="#gquota" role="tab" aria-controls="gquota" aria-selected="false">{{ trans('import.item2') }} </a>
  </li>
  @endif
</ul>

  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
     <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

      <div class="row">

                <div class="col-md-4">

                  <div class="">
                     <div>{{trans('label.creater')}}</div>
                     <div class="textboxshow">{{$Customer->idcard}}</div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="">
                    <div>{{trans('ctype.createuser')}}</div>
                    <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->company_type($Customer->ctype)}}</div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="">
                     <div>{{trans('label.createuser')}} </div>
                   <div class="textboxshow">{{$Customer->user_name}}</div>
                  </div>
                </div>
       </div>

        <div class="row">

                <div class="col-md-4">

                  <div class="">
                     <div>{{trans('label.companyname')}}</div>
                     <div class="textboxshow">{{$Customer->company_name}}</div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="">
                    <div> {{trans('label.idcard')}}</div>
                    <div class="form-group">
                      @if ($Customer->id_card)
                        <a href="{{asset($Customer->id_card)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                        @else
                          <label>No File</label>
                        @endif
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="">

                  </div>
                </div>
       </div>

        <div class="row">

                <div class="col-md-4">

                  <div class="">
                     <div> {!!trans('label.certificate_add_tax')!!}</div>
                     <div class="textboxshow">{{$Customer->tin ?$Customer->tin: '---------------------------'}}</div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="">

                    <div>{!!trans('label.certificate_tin')!!}</div>
                    <div class="form-group">
                      @if ($Customer->tin_path)
                        <a href="{{asset($Customer->tin_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                        @else
                           <label>No File</label>
                        @endif
                        </div>
                    </div>
                  </div>


                <div class="col-md-4">
                  <div class="">
                     <div>{{trans('label.date_certificate_vat')}} </div>
                   <div class="textboxshow">
                    {{ \App\Helpers\AppHelper::instance()->format_date($Customer->tin_date)}}</div>
                  </div>
                </div>
       </div>

      <div class="row">

            <div class="col-md-4 ">
              <div>{!!trans('label.certificate_identity_business_owner')!!}</div>
              <div class="textboxshow">{{$Customer->company_id?$Customer->company_id: '---------------------------'}}</div>
            </div>

            <div class="col-md-4 ">
               <div>{!!trans('label.add_another_certificate_ministry')!!}</div>
               <div class="form-group">
                   @if ($Customer->id_path)
                    <a href="{{asset($Customer->id_path)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                    @else
                         <label>No File</label>
                    @endif
               </div>
             </div>

            <div class="col-md-4">
              <div>{{trans('label.date_certificate_vat')}}</div>
              <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($Customer->company_id_date)}}</div>
            </div>
      </div>

      <div class="row">

            <div class="col-md-4 ">
              <div>{!!trans('labe.patent')!!}</div>
              <div class="textboxshow">{{$Customer->patent_number?$Customer->patent_number: '---------------------------'}}</div>

            </div>

            <div class="col-md-4 ">

              <div>{!!trans('label.patent_file')!!}</div>
              <div class="form-group">
               @if ( $Customer->patent)
                <a href="{{asset($Customer->patent)}}" target="_blank"> <i class="material-icons">cloud_download</i></a>
                @else
                    <label>No File</label>
                @endif
              </div>
            </div>

            <div class="col-md-4 ">


              <div>{{trans('label.date_certificate_vat')}}</div>
             <div class="textboxshow">{{\App\Helpers\AppHelper::instance()->format_date($Customer->patent_date)}}</div>

            </div>
      </div>


      <div class="row">

          <div class="col-md-4 ">
            <div>{{trans('label_back.numHome')}}</div>
            <div class="textboxshow">{{$Customer->house? $Customer->house:'---------------------------'}}</div>

          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.NumberRoad')}}</div>
            <div class="textboxshow">{{$Customer->street ? $Customer->street:'---------------------------'}}</div>


          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.village')}}</div>
            <div class="textboxshow">{{$Customer->village ? $Customer->village:'---------------------------'}}</div>

            </div>
        </div>

      <div class="row">
          <div class="col-md-4 ">
            <div>{{trans('label_back.CummuneSongkat')}}</div>
            <div class="textboxshow">{{$Customer->commune ? $Customer->commune:'---------------------------'}}</div>

          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.District')}}</div>
            <div class="textboxshow">{{$Customer->district? $Customer->district:'---------------------------'}}</div>
          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.province')}}</div>
            <div class="textboxshow">{{$Customer->city ? $Customer->city:'---------------------------'}}</div>
          </div>
        </div>

      <div class="row">
          <div class="col-md-4 ">
            <div>{{trans('label_back.phone')}}</div>
            <div class="textboxshow">{{$Customer->tel? $Customer->tel:'---------------------------'}}</div>
          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.fax')}}</div>
            <div class="textboxshow">{{$Customer->fax ? $Customer->fax:'---------------------------'}}</div>
          </div>
          <div class="col-md-4 ">
              <div>{{trans('label_back.email')}}</div>
            <div class="textboxshow">{{$Customer->email?$Customer->email:'---------------------------'}}</div>
          </div>
        </div>




  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

     <div class="row">

         <div class="col-md-4 ">
                        <div class="col-sm-12 form-group ">


                             <img src="{{$Customer->Cominfo->photo ? asset($Customer->Cominfo->photo) : asset('front/img/photo_pre.jpg')}}" style="width: 75%;">

                        </div>

          </div>

         <div class="col-md-8 ">
              <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

          ​​​​  <div class="row">
              <div class="col-md-6">
                   <div>{{trans('front.contact_name')}}</div>
                   <div class="textboxshow">{{$Customer->Cominfo->contact_person? $Customer->Cominfo->contact_person:'---------------------------'}}</div>

              </div>
              <div class="col-md-6 ">
                    <div>{{trans('front.gender')}}</div>
                    <div class="textboxshow">{{$Customer->Cominfo->gender? $Customer->Cominfo->gender:'---------------------------'}}</div>

              </div>

              <div class="col-md-6">
                     <div>{{trans('front.id_card')}}</div>
                     <div class="textboxshow">{{$Customer->Cominfo->personid? $Customer->Cominfo->personid:'---------------------------'}}</div>

              </div>


              <div class="col-md-6 ">

                      <div>{{trans('front.certificate_identity_passport')}}</div>
                      ​<div class="form-group">
                                     @if ($Customer->Cominfo->id_card)
                                      <a href="{{asset($Customer->Cominfo->id_card)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                                      @else
                                           <label>No File</label>
                                      @endif
                                    </div>

              </div>


              <div class="col-md-6">
                      <div>{{trans('front.company_function')}}</div>
                      <div class="textboxshow">{{$Customer->Cominfo->position? $Customer->Cominfo->position:'---------------------------'}}</div>

              </div>

              <div class="col-md-6 ">
                       <div> {{trans('front.nationality')}}</div>
                      <div class="textboxshow">{{$Customer->Cominfo->nationality? $Customer->Cominfo->nationality:'---------------------------'}}</div>
              </div>

              <div class="col-md-6 ">
                       <div> {{trans('front.represent_letter')}}</div>
                      <div class="form-group">
                                     @if ($Customer->Cominfo->authorize)
                                      <a href="{{asset($Customer->Cominfo->authorize)}}" target="_blank"><i class="material-icons">cloud_download</i></a>
                                      @else
                                           <label>No File</label>
                                      @endif
                                    </div>
              </div>

              <div class="col-md-6 ">

              </div>

         </div>
        </div>

      </div>

      <div class="row">

          <div class="col-md-4 ">
            <div>{{trans('label_back.numHome')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->house? $Customer->Cominfo->house:'---------------------------'}}</div>

          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.NumberRoad')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->street ? $Customer->Cominfo->street:'---------------------------'}}</div>


          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.village')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->village ? $Customer->Cominfo->village:'---------------------------'}}</div>

            </div>
        </div>

      <div class="row">
          <div class="col-md-4 ">
            <div>{{trans('label_back.CummuneSongkat')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->commune ? $Customer->Cominfo->commune:'---------------------------'}}</div>

          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.District')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->district? $Customer->Cominfo->district:'---------------------------'}}</div>
          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.province')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->city ? $Customer->Cominfo->city:'---------------------------'}}</div>
          </div>
        </div>

      <div class="row">
          <div class="col-md-4 ">
            <div>{{trans('label_back.phone')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->tel? $Customer->Cominfo->tel:'---------------------------'}}</div>
          </div>
          <div class="col-md-4 ">
            <div>{{trans('label_back.fax')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->fax ? $Customer->Cominfo->fax:'---------------------------'}}</div>
          </div>
          <div class="col-md-4 ">
              <div>{{trans('label_back.email')}}</div>
            <div class="textboxshow">{{$Customer->Cominfo->email?$Customer->Cominfo->email:'---------------------------'}}</div>
          </div>
        </div>


  </div>
  <div class="tab-pane fade" id="substance" role="tabpanel" aria-labelledby="substance-tab">
    <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
     <div> <strong  class="theader" >{{trans('idata.materialhead')}} </strong></div>
     <div class="divider"></div>
     
<div class="col-md-12 ">
  <div class="panel panel-moe">
      <div class="panel-body">        
        <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      </div>
      
          <div id="" class="mtable"><div class="clear"></div>
          <div class="card">
            <div class="row label-assign">
              <div class="col-md-3" style="text-align: right" ><h4>{{trans('front.report_year')}}</h4> </div>
              <div class="col-md-3">  <select  class="form-control" id="years" name="years" ><span class="caret"></span></select> </div>
              
            </div>
            <div class=" row label-assign">
              <div class="col-md-3" ><h4>{{trans('front.report_customdate')}}</h4> </div>
              <div class="col-md-3"><input type="text" class="form-control" name="from" id="sdate"></div>
              <div class="col-md-3" ><input type="text" class=" form-control" name="to" id="sdate1"> </div>
              <div class="col-md-3" ><input type="button" value="Search" class=" btn btn-primary" id="searchsub" ></div>
            </div>
           
          </div>
            {{-- <div class="col-sm-12 " >{{$isubstance->links()}}</div> --}}
          <div class="card">
            <table id="substance_table" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'>
              <thead>
                <tr>
                  <th >#</th>
                    <th >{{trans('isubstance.type')}}</th>
                  <th>{{trans('isubstance.business_name')}}</th>
                  <th>{{ trans('front.report_chemical') }}</th>
                  <th>{{ trans('front.report_hscode') }}</th>
                  <th>{{trans('front.report_imported')}}</th>
                </tr>
              </thead>

              <tbody>
               
              </tbody>
            </table>
            <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            {{-- <div class="col-sm-12 " >{{$isubstance->links()}}</div> --}}
         </div> 
          </div>
            
     
  </div>
</div>
  </div>
  <div class="tab-pane fade" id="gquota" role="tabpanel" aria-labelledby="substance-tab">
    <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
     <div> <strong  class="theader" >{{trans('idata.quotahead')}} </strong></div>
     <div class="divider"></div>
<div class="col-md-12 ">
  <div class="panel panel-moe">
      <div class="panel-body">        
        <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      </div>
          <div id="" class="mtable"><div class="clear"></div> 
          <div class="col-md-3" style="text-align: left" ><h4>{{trans('front.report_year')}}</h4> </div>
          <div class="col-md-3">  <select  class="form-control" id="year" name="year" ><span class="caret"></span></select> </div> 
          <div class="card">
            <table id="quota_table" class="table" data-page-length='100' style="width: 100%">
              <thead>
                <th>{{trans('isubstance.type')}}</th>
                    <th>{{trans('front_isubstance.year')}}</th>
                    <th>{{trans('front.report_request')}}</th>
                    <th>{{trans('front.report_allow')}}</th>
                    <th>{{trans('front.report_qimported')}}</th>
                    <th>{{trans('front.report_balance')}}</th>
              </thead>
              <tbody>
               
              </tbody>
            </table>
              <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
          </div>
          
            {{-- <div class="col-sm-12 " >{{$isubstance->links()}}</div> --}}
         </div> 
     
  </div>
</div>
  </div>


  {{-- // Equitmetn --}}


  <div class="tab-pane fade" id="equitment" role="tabpanel" aria-labelledby="equitment-tab">
    <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    <div> <strong class="theader">{{trans('front_equipmentdetail.detail')}}</strong></div>
    <div class="divider"></div>
    <div class="card">
      <div class="row label-assign">
        <div class="col-md-3" style="text-align: right" ><h4>{{trans('front.report_year')}}</h4> </div>
        <div class="col-md-3">  <select  class="form-control" id="yeare" name="yeare" ><span class="caret"></span></select> </div>
        
      </div>
      <div class=" row label-assign">
        <div class="col-md-3" ><h4>{{trans('front.report_customdate')}}</h4> </div>
        <div class="col-md-3"><input type="text" class="form-control" name="from" id="edate"></div>
        <div class="col-md-3" ><input type="text" class=" form-control" name="to" id="edate1" > </div>
        <div class="col-md-3" ><input type="button" value="Search" class=" btn btn-primary" id="searchE" ></div>
      </div>
    </div>
    <div class="card">
      <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      <div class="col-md-12">
        <table id="equipment_table" class="table" data-page-length='100' style="width:100%">
        <thead>
          <tr>

            <th >#</th>
            <th>{{ trans('iequipment.type') }}</th>
            <th>{{ trans('front.report_hscode') }}</th>
            <th>{{ trans('iequipment.capacity') }}</th>
            <th>{{trans('iequipment.substance')}}</th>
            <th>{{trans('front.report_imported')}}</th>
                      

          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
      <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="import" role="tabpanel" aria-labelledby="contact-tab">


    @if( $Customer->ctype != 0 )
    <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
     <div> <strong  class="theader" >{{trans('tab.quota_year')}} : {{date("Y")}}  </strong></div>
     <div class="divider"></div>
    <div class="row">


      <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
         <div class="col-md-12 ">
          <table id="quota" class="table  " data-page-length='100' style="width:100%">
            <thead>
              <tr>

                  <th >{{trans('theadcol1.quota')}}</th>
                  <th>{{trans('quota.year')}}</th>
                  <th>{{trans('b.report_request')}}</th>
                   <th>{{trans('theadcol2.quota')}}</th>
                  <th>{{trans('theadcol7.quota')}}</th>
                  <th>{{trans('theadcol6.quota')}}</th>

              </tr>
            </thead>

            <tbody>
               @foreach($Aquota as $a)
                <tr>
                  <td>{{$a->substance}}</td>
                  <td>{{$a->year}}</td>
                  <td>{{\App\Helpers\AppHelper::instance()->format_kg($a->total_request)}}</td>
                  <td>{{\App\Helpers\AppHelper::instance()->format_kg($a->total_allow)}}</td>
                  <td>{{\App\Helpers\AppHelper::instance()->format_kg($a->imported)}}</td>
                  <td>{{\App\Helpers\AppHelper::instance()->format_kg($a->total_allow -$a->imported) }}</td>
                 </tr>

               @endforeach
            </tbody>
          </table>

      </div>
    </div>
    @endif

    <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    <div> <strong  class="theader" >{{trans('tab.request_data')}} </strong></div>
     <div class="divider"></div>
    <div class="row">

      <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table class="table table-striped" id="ManageTable" style="width: 100%">
                                        <thead>
                                            <tr>
                                                 <th>#</th>
                                                  <th>{{trans('label.requestno')}}</th>
                                                  <th>{{trans('label.typeofrequest')}}</th>

                                                  <th>{{trans('adisubstance.status')}}</th>
                                                  <th>{{trans('label.requestdate')}}</th>
                                                  <th>{{trans('theadcol5.register')}}</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                      </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>

         </div>
      </div>
    @if($Customer->status==1)
        <span class="togglebutton pull-right" >
        <label class="end-dis">
            <input type="checkbox" class="dise" id="{{$Customer->id}}" value="{{$Customer->status}}"
                   checked><span
                    class="toggle" ></span>
        </label>
    </span>
    @else
        <span class="togglebutton pull-right">
        <label class="end-dis">
            <input type="checkbox" class="dise" id="{{$Customer->id}}" value="{{$Customer->status}}" ><span
                    class="toggle"></span>
        </label>
    </span>
    @endif

</div>
</div>
</div>
</div>




@endsection

@section('script')
  <script type="text/javascript">
  function addYear() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 5; i >0 ; i-- ) {
        
        $("#years").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}

function addYearss() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 5; i >0 ; i-- ) {
        
        $("#year").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}

function year_equipment()
{
  var currentYear = new Date().getFullYear();
  for(var i = 5 ; i > 0 ; i--)
  {
    $("#yeare").append(

      $("<option></option>")
      .attr("value",currentYear)
      .text(currentYear)
    );
    currentYear--;
  }
}

function get_quota(year)
{
  var currentYears = new Date().getFullYear();  
     yearqe  = year ? year : currentYears;
    $('#quota_table').DataTable().clear();
    $('#quota_table').DataTable().destroy();
      $('#quota_table').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('register.get_quota',$Id)!!}?year='+yearqe,
           columns:[
          // { data: 'id' , name: 'id',visible:false}, 
          { data: 'substance',name:'substance'},
          { data: 'year', name: 'year'},
          { data: 'total_request', name: 'total_request'},         
          { data: 'total_allow', name: 'total_allow'},          
           { data: 'imported', name: 'imported'},
           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.total_allow-full.imported).toFixed(2)) ; 

                    }
          },
         
      ],
        "pagingType": "full_numbers",
          "order": [[ 0, "desc" ]],
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        },
     

        
      });
}
function get_equipment(year,from,to)
{
  var currentYear = new Date().getFullYear();
  yeare = year ? year :currentYear;

  var str = from ? "&from="+from+"&to="+to : "";
  $('#equipment_table').DataTable().clear();
  $('#equipment_table').DataTable().destroy();
  $('#equipment_table').DataTable({
    proccessing:true,
    responsive:true,
    serverSide:true,
    ajax:'{!! route('register.get_equipment',$Id)!!}?year='+yeare+str,
    "columns":[
      { data: 'id' , name: 'id',visible:false}, 
      { data: 'product_name', name: 'product_name' },
      { data: 'taxcode', name: 'taxcode' },
      { data: 'capacity', name: 'capacity' },
                    
      { data: 'substance', name: 'substance' },
      { data:"total" , name:'total'},
    ],
    "pagingType": "full_numbers",
    "order": [[ 0, "desc" ]],
    "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
    ],
    language: {
    search: "_INPUT_",
      searchPlaceholder: "Search records",
    }
  });
}
  function get_substance(year,from,to){
    var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;

    var str = from ? "&from="+from+"&to="+to : "" ;
    $('#substance_table').DataTable().clear();
    $('#substance_table').DataTable().destroy();
      $('#substance_table').DataTable({
        proccessing:true,
        serverSide:true,
        responsive:true,
        ajax:'{!! route('register.get_substance',$Id)!!}?year='+yearr+str,
        "columns":[                     
                    { data: 'id' , name: 'id',visible:false}, 
                    { data: 'substance', name: 'substance' },
                    { data: 'com_name', name: 'com_name' },
                    { data: 'chemical', name: 'chemical' },
                    
                    { data: 'taxcode', name: 'taxcode' },
                    { data:"Total" , name:'Total'},  
                   
                    
                    ],
        "order": [[ 0, "desc" ]],
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

  }
  $(document).ready(function(){
    addYear(); year_equipment(); addYearss();
    var myDate = new Date();
    var month = myDate.getMonth() + 1;
    var currntDate = month + '/' + myDate.getDate() + '/' + myDate.getFullYear();

    $("#sdate").datepicker({ 
    });
    $("#sdate").val(currntDate);

    $("#sdate1").datepicker({
    });
    $("#sdate1").val(currntDate);
    $("#edate").datepicker({});
    $("#edate").val(currntDate);

    $("#edate1").datepicker({});
    $("#edate1").val(currntDate);

    get_substance();
    get_equipment();
    get_quota();
    $("#years").change(function() {
        get_substance(this.value);
     });
     $("#searchsub").click(function(){
        get_substance(2000,$('#sdate').val(), $('#sdate1').val());
     });
     $("#searchE").click(function(){
        get_equipment(2000,$('#edate').val(), $('#edate1').val());
     });
     
     $("#yeare").change(function(){
       get_equipment(this.value);
     });
    
     $("#year").change(function(){
       get_quota(this.value);
     });
  });
  $(document).ready(function(){
      $('#ManageTable').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('register.get_import',$Id)!!}',
        columns:[
          { data: 'id', name: 'id'},
          { data: 'request_no', name: 'request_no'},
          { data: 'rtype', name: 'rtype'},


           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    var answer = "";
                    switch( full.import_status ) {
                      case 0:
                        answer = "PENDING";
                        break;
                      case 1:
                        answer = "CANCELED";
                        break;
                      case 2:
                        answer = "IMPORTING";
                        break;
                      default:
                        answer = "SUCCEED";
                    }
                        return  answer ;

                    }
          },
          { data: 'created_at', name: 'created_at'},

          { "sortable": false, "className": "text-right",

              "render": function ( data, type, full, meta ) {

                if(full.rtype=='Substances'){
                    var edit = '<a href="'+
                    '{!! route('materialrequest.materialrequest_detail','@id') !!}' + '" target="_blank"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>' ;

                }else{
                    var edit = '<span data-original-title="" title=""><a href="'+
                    '{!! route('equipmentrequest.showdetail','@id') !!}' + '" target="_blank"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;

                }


                  edit = edit.replace('@id', full.id);
                  return edit;
              }


            }
        ],

        "pagingType": "full_numbers",
        "order": [[ 4, "desc" ]],
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });
        $(document).on('change','.dise',function () {
          var id = $(this).attr("id");
          var url = "";
          if ($(this).is(':checked')) {
              // dis.style.backgroundColor = "red";
              url = '{!! route('register.enable','@id') !!}' ;
          }else {
              url = '{!! route('register.disable','@id') !!}' ;
          }
            url = url.replace('@id',id);
            $.ajax({
                url: url,
                success: function(result){
                    if (result.code==1){
                        $(".flash-message").html('<p class="alert alert-success">Item update successfully</p>');
                    }else{
                        $(".flash-message").html('<p class="alert alert-danger">Something went wrong</p>');
                    }
                }});

      });


    });
  </script>
@endsection


