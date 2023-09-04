@extends('layout.master')

@section('content')
{{ Breadcrumbs::render('user') }}


 <div class="row">

</div>

<div class="row">
 

  <div class="col-lg-12 col-md-12">
    <div class="card">
    <div class="card-header card-header-danger card-header-icon">

                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">User Permissions</h4>
    </div>

                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                     @endif
                  @endforeach
                </div>


                <div class="permission">
                  <form action="{{route('user.upermission',$ids)}}" method="post">
                     {{@csrf_field()}}
                    <div class="col-md-12">
                                    <div class="form-group">
                                    
                                  
                                    </div>

                                   
                                      <div class="list-group">

                                      
                                      @foreach($permission as $cq1)
                                      <div class="list-group-item active ">
                                        <div class="row">
                                          <div class="text-uppercase col-md-3 col-lg-3 col-sm-12"> {{ $cq1[0]->resourse}}</div>
                                          <div class="text-capitalize col-md-9 col-lg-9 col-sm-12">
                                           <div class="form-check form-check-inline mr-1"> 
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="list-group-item list-group-item-action ">
                                          <div class="row">
                                      @foreach($cq1 as $cq)
                                             
                                                
                                                  <div class="text-capitalize col-md-3 col-lg-3 col-sm-12">
                                                  <div class="form-check form-check-inline mr-1" id="p_{{$cq->id}}">
                                                   <input type="checkbox"  class="chk_cls" value="{{$cq->id}}" name="per[]"  {{ $cq->permission_id ? 'checked':'' }} id="c_{{$cq->id}}" >
                                                   {!!  $cq->permission_id ? '':' <input type="hidden" value="'.$cq->id.'" name="pers[]" class="hdd_cls"  id="h_'.$cq->id.'"> '!!}                                              
                                                  <label class="form-check-label">{{$cq->label}} </label>
                                                   </div>
                                                   </div>                                                  
                                                 
                                           
                                      @endforeach 
                                      </div>
                                      </div> 
                                      @endforeach  
                                   
                                  </div>
                    </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                          <input type="submit" value="{{trans('buttonsave.productimport')}}" class="btn btn-primary">
                          
                        </div>
                        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        </div>





                  </div>
                  </form>
                </div>

                
              </div>
            </div>
            <!-- end col -->
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $(".chk_cls").change(function() {
        if(this.checked) {
            //Do stuff
            //alert(0);
            var id = $(this).attr("id").split("_");
           // alert(id);
            $("#h_"+id[1]).remove();
        }else{
            //alert(1);
            var id = $(this).attr("id").split("_");
            $("#p_"+id[1]).append('<input type="hidden" value="'+id[1]+'" name="pers[]" class="hdd_cls"  id="h_'+id[1]+'">');
        }
    });

  });
</script>
@endsection

