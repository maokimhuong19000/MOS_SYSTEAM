@extends('layout.master')

@section('content')
{{ Breadcrumbs::render('whassign') }}

<div class="row">
  <div class="col-lg-12 col-md-12">

  <div class="card">
    <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{trans('label.item5')}}</h4>
    </div>
    <div class="assignquota card-body">
        <form action="{{route('annualquota.update', $aquotas->id )}}" method="post">
          {{@csrf_field()}}
          {{ method_field('PUT')}}
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
        
           <div class="row"><div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </div> 
         
            <div class="col-lg-12">
              @if(session()->has('status'))
                <div class="alert alert-danger">{{session()->get('status')}}</div>
              @endif

               <div class="form-group bmd-form-group">
                  <label class="bmd-label-static">{{trans('label.assignquota')}}</label>
                  <input type="text" name="substance" class="form-control" value="{{$aquotas->material->substance}}" disabled="disabled">                  
              </div>

               
                <div class="row">

                   <div class="col-md-6">                   
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-static">{{trans('label1.assignquota')}}</label>
                          <input type="text" name="avaliable" class="form-control" value="{{$aquotas->amount }}" disabled="disabled">
                        
                    </div>
                  </div>

                    <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-static">{{trans('labeluse.assignquota')}}</label>
                         <input type="text" name="year" class="form-control" value="{{$aquotas->year }}" disabled="disabled">
                        
                    </div>
                  </div>               
                 

                </div>

                 <div class="col-md-3 ml-auto">
                    <div class="card-body text-right">
                        <button type="button" class="btn btn-info btn-xs btn-round btn-fab" data-toggle="modal" data-target="#myModal">
                          <i class="material-icons">add</i>
                          <div class="ripple-container">
                                
                          </div>
                        </button>
                    </div>
                  </div>
              </div>
               <div class="col-lg-12">
              <div class="table">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{trans('company.assignquota')}}</th>
                      <th>{{trans('b.report_request')}}</th>
                      <th>{{trans('quanlity.assignquota')}}</th>
                     
                      <th class="text-center">
                        
                          <a class="delc  " href="#"><i class="material-icons ">delete</i></a>
                      
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($aquotas->comquotas  as $key => $rd)
                    <tr id="{{$rd->customer->id}}">  
                      <td>{{$key+1}}
                        <input type="hidden" class="comquota_id"  name="comquota_id[]" value="{{$rd->id}}" autocomplete="off">
                      </td> 

                      <td><input type="hidden" class="customer_id"  name="customer_id[]" value="{{$rd->customer->id}}" autocomplete="off">{{$rd->customer->company_name}}</td>
                      <td>{{$customers->where('id',$rd->customer->id)->first()->total}}</td>
                      <td><input type="text" class="qty" name="qty[]" value="{{$rd->amount}}" ></td>
                       <td>
                        <div class="form-check"> <label class="form-check-label">  <input class="form-check-input delCheck" type="checkbox" value="{{$rd->customer->id}}">   <span class="form-check-sign">  <span class="check"></span></span></label>
                        </div>
                      </td>
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
                            @foreach($customers as $aq)
                                <option value="{{$aq->id}}" opt="{{$aq->total}}">{{$aq->company_name}}</option>
                            @endforeach>  
                         
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
  </div>


@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function(){
  $('.btn-info').click(function(){
      $('#box_user').modal();
});

$(".delc").click(function(){

  $('.delCheck:checked').each(function() {
     // console.log($(this).val());
      var id = $(this).val();
      $('tbody').find($("#"+id)).remove();
  });
});



$('#addcompany').click(function(){



     var existing_id = []; // dynamic array 

      $(".customer_id").each(function() {
          existing_id.push($(this).val());
      });
     // console.log(existing_id);
          var index = $('.delCheck').length+1;
          var val =  $('#company_name option:selected').val();
          var tr =   $('<tr id="'+val+'">');
          var text = $('#company_name option:selected').text();
          var input = '<input type="text" class="qty" name="qty[]" autocomplete="off" >';
          var customer_id ='<input type="hidden" class="customer_id"  name="customer_id[]" value="'+ val +'" autocomplete="off">';
           var check = '<div class="form-check">' +
                         ' <label class="form-check-label">' +
                          '  <input class="form-check-input delCheck" type="checkbox"  value="'+val+'" >  ' +
                           ' <span class="form-check-sign">' +
                            '  <span class="check"></span>' +
                            '</span></label></div>';
            var old = $('#company_name option:selected').attr('opt');

          if(existing_id.indexOf(val) >= 0){
              alert("already Existing");
        }else{
          tr.append($("<td/>",{html : index }))
              .append($("<td/>",{text : text}))
              .append($("<td/>",{text : old }))
              .append($("<td/>",{html : input + customer_id }))              
              .append($("<td/>",{html : check }))
          $('tbody').append(tr);
          $('#myModal').modal('hide');
        }

    });
    // input qty
    $('body').on('keyup','.qty',function(){
      var this_qty = $(this).val();
      var total_qty = 0;
      var avaliable = $('[name="avaliable"]').val();
      if(avaliable>0){
        if( $.isNumeric(this_qty)){
          $('.qty').each(function(){
            total_qty = total_qty + ($(this).val()-0);
          });
          var remain = avaliable - total_qty;
          if(remain<0){
            alert('qty large than បរិមាណប្រចាំឆ្នាំ/Annual Quantity');
            $(this).val('');
          }
          $('#total_qty').text(total_qty);
        }else{
          alert('បរិមាណ (គីឡូក្រាម)/Quantity (kg) must be numeric');
          $(this).val('');
        }
      }else{
        $(this).val('');
        alert('បរិមាណប្រចាំឆ្នាំ/Annual Quantity  is empty');
      }
    });
  });
</script>
@endsection