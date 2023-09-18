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
    <form action="{{route('annualquota.store')}}" method="post">
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
        
             <div class="row"><div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </div> 
            <div class="col-lg-12">
              @if(session()->has('status'))
                <div class="alert alert-danger">{{session()->get('status')}}</div>
              @endif



              <div class="form-group bmd-form-group">
                  <label class="bmd-label-static">{{trans('label.assignquota')}}</label>
                  <select name="substance" class="form-control" id="isubstance" required>
                     <option></option>
                  @foreach($materils as $aq)
                      <option value="{{$aq->id}}">{{$aq->substance}}</option>
                  @endforeach>  
                </select>
                  
              </div>
            
                <div class="row">

                  <div class="col-md-6">                   
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-static">{{trans('label1.assignquota')}}</label>
                          <input type="text" name="avaliable" class="form-control">
                          {!! $errors->first('avaliable', '<p class="help-block" style="color: gray">' .trans('label1.assignquota') .' is required </p>') !!}
                        
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-static">{{trans('labeluse.assignquota')}}</label>
                         <select name="year" class="form-control" id="year">
                      
                      </select>{!! $errors->first('year', '<p class="help-block" style="color: gray">'. trans('labeluse.assignquota') . ' is required</p>') !!}
                        
                    </div>
                  </div>


                </div>

              

              </div>
              <div class="col-lg-12">
              <div class="table">
    
                <button type="submit" class="btn btn-primary">{{trans('buttonsave.productimport')}}</button>
                <button type="button" class="btn btn-default">{{trans('buttoncancel.productimport')}}</button>
              </div>
              </div>

            </div>
       

            <!-- Modal -->
         
        </form>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script type="text/javascript">

function addYear() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 0; i <6 ; i++ ) {
        
        $("#year").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear++;
    }
}


$(document).ready(function(){

addYear();  


  });
</script>
@endsection