@extends('layout.master')

@section('content')

         {{ Breadcrumbs::render('registeredit',$Customers) }}

          <form action="{{route('register.update',$Customers->id)}}" method="post" id="frm_create_user">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{ method_field('PUT')}}
            <div class="row" >
              <div class="col-md-12">
                
                <div class="card">
                  <div class="card-header card-header-danger card-header-icon ">
                    <div class="card-icon">
                      <i class="material-icons">view_quilt</i>
                    </div>
                    <h4 class="card-title">{{trans('reg_update.navbar')}}</h4>
                  </div>
                  <div class="card-body ">

                    <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                  @endforeach
                </div>

                      
                      <div class="form-group {{ $errors->has('company_name') ? 'has-danger' : ''}}">
                        <label>{{trans('Username.createuser')}}</label>
                        <input type="text" class="form-control" name="company_name" value="{{$Customers->company_name}}" id="company_name">
                        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
                      </div>
                      
                      <div class="form-group {{ $errors->has('idcard') ? 'has-danger' : ''}}">
                        <label>{{trans('label.creater')}}</label>
                        <input type="text" class="form-control" name="idcard" value="{{$Customers->idcard}}">
                        {!! $errors->first('idcard', '<p class="help-block">:message</p>') !!}
                       </div>

                        <div class="form-group {{ $errors->has('idcard') ? 'has-danger' : ''}}">
                         <label>{{trans('ctype.createuser')}}</label>
                        <select name="ctype" id="ctype" class="form-control">
                        <option value="0" {{$Customers->ctype==0?'selected':''}} >{{trans('importall.createuser')}}</option>
                        <option value="1" {{$Customers->ctype==1?'selected':''}} >{{trans('importm.createuser')}}</option>
                        <option value="2" {{$Customers->ctype==2?'selected':''}}>{{trans('importe.createuser')}}</option>
                        </select>
                        {!! $errors->first('ctype', '<p class="help-block">:message</p>') !!}
                       </div>

                      

                     

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                          <input type="submit" value="{{trans('buttonsave.productimport')}}" class="btn btn-primary">
                          
                        </div>
                        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        </div>





                  </div>
                </div>
            </div>
          </form>

@endsection

