@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('quota_assign') }}

<div class="row">
  <div class="col-lg-12 col-md-12">


  <div class="card">
    <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('label.item5')}}</h4>
    </div>
    <form action="{{route('annualquotarequest.store',$requestdetail->id)}}" method="post">
    <div class="assignquota card-body">
      @if( $message = session('success'))
    <div class="alert alert-success" role="alert">
      <a href="#" class="alert-link">{{$message}}</a>
    </div>
  @endif
  <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
         <p class="alert alert-danger alertm" style="display: none">{{ Session::get($key) }}</p>
   </div>
        
          {{@csrf_field()}}
          <input type="hidden" class="cc"  name="customer_id" value="{{$requestdetail->customer_id }}" autocomplete="off">
          <input type="hidden" class="cc"  name="year" value="{{$requestdetail->year }}" autocomplete="off">
             <div class="row"><div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </div> 
            <div class="col-lg-12">
         
            
            
                <div class="row">

                  <div class="col-md-6">                   
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-static">{{trans('company.assignquota')}}</label>
                          <input type="text" name="avaliable" class="form-control" disabled="" value="{{$requestdetail->Customer->company_name }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-static">{{trans('labeluse.assignquota')}}</label>
                         <input type="text" name="year" class="form-control" value="{{$requestdetail->year }}" disabled="disabled">
                        
                    </div>
                  </div>


                </div>

                <div class="col-md-12">&nbsp;</div>
              </div>
              <div class="col-lg-12">
              <div class="table">
                   <table class="table table-striped table-hover table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{trans('label.assignquota')}}</th>
                      <th>{{trans('theadcol2.quota')}}</th>
                      <th>{{trans('theadcol4.quota')}}</th>
                      <th>{{trans('b.report_request')}}</th>
                      <th>{{trans('quanlity.assignquota')}}</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Result  as $key => $rd)
                    <tr id="{{$rd->material_id}}" >  
                      <td>{{$key+1}}
                        <input type="hidden" class="cc"  name="aquota_id[]" value="{{$rd->id}}" {{($rd->aquota-$rd->comquota) <= 0 ? 'disabled' : ''}}>

                          <input type="hidden" class="cc"  name="a[]" value="{{$rd->aquota }}" >

                            <input type="hidden" class="cc"  name="c[]" value="{{$rd->comquota}}" >
                      </td> 

                      <td><input type="hidden" class="customer_id"  name="material_id[]" value="{{$rd->material_id}}" {{($rd->aquota-$rd->comquota) <= 0 ? 'disabled' : ''}}>{{$rd->substance}}</td>
                      <td>{{$rd->aquota}}</td>
                      
                      <td class="avaliable" >{{$rd->aquota-$rd->comquota }}</td>
                      <td>{{$rd->total}}</td>
                      <td><input type="text" class="qty" name="qty[]" value="{{$rd->comquota}}"  {{($rd->aquota-$rd->comquota) <= 0 ? 'disabled' : ''}}></td>
                      
                    </tr>
                     @endforeach
                  </tbody>

                  <thead>
                    <tr>
                      <th >Total</th>
                      <th colspan="4" id="total_qty"></th>
        
                    </tr>
                  </thead>

                </table>
                <button type="submit" class="btn btn-primary">{{trans('buttonsave.productimport')}}</button>
                <button type="button" class="btn btn-default">{{trans('buttoncancel.productimport')}}</button>
              </div>
              </div>

            </div>
       

            <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">{{trans('addcompany.assignquota')}}</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h5>{{trans('label.companyname')}}   </h5>

                  <select class="form-control" name="company_name" id="company_name">
                           <option value="">-------</option>
   
                  </select>
                </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="addcompany">ADD</button>
                </div>
              </div>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script type="text/javascript">



$(document).ready(function(){



    $('body').on('keyup','.qty',function(){
      var this_qty = $(this).val();
      var parent_id = $(this).parents('tr').attr('id');
     
      var total_qty = 0;
      var gtotal_qty = 0;
      var avaliable = $("#"+parent_id).find('.avaliable').text();
    //  console.log(avaliable);
      this_qty == '-' ? '-0' : this_qty 
        if( $.isNumeric(this_qty)){

          var remain = avaliable - this_qty;

          if(remain<0){
            alert('qty large than បរិមាណប្រចាំឆ្នាំ/Annual Quantity');
            $(this).val('');
          }
          $('.qty').each(function(){
            gtotal_qty = gtotal_qty + ($(this).val()-0);
          });
          $('#total_qty').text(gtotal_qty);
        }else{
          alert('បរិមាណ (គីឡូក្រាម)/Quantity (kg) must be numeric');
          $(this).val('');
        }

    });
  });
</script>
@endsection