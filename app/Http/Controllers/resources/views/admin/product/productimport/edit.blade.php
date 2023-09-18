@extends('layout.master')

@section('content')

{{ Breadcrumbs::render('edit',$data) }}

<div class="row">
  	<div class="col-lg-12 col-md-12">
              <div class="card">

                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('tabar.editsubstance')}}:{{$data->com_name}} </h4> <!-- must use translate text -->
                  
                </div>
                <div class="card-body ">

                	<div class="flash-message">
					  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
					    @if(Session::has('alert-' . $msg))
					    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
					    @endif
					  @endforeach
					</div>


					<form action="{{route('product.update',$data->id)}}" method="post">
						
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						{{ method_field('PUT')}}

						
						<div class="form-group {{ $errors->has('substance') ? 'has-danger' : ''}}">
							<label>{{ trans('thead.import') }}</label>
							<input type="text" name="substance" class="form-control" value="{{ $data->substance}}" >
							{!! $errors->first('substance', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group {{ $errors->has('com_name') ? 'has-danger' : ''}}">
							<label>{{ trans('theadcol2.import') }}</label>
							<input type="text" name="com_name" class="form-control"  value="{{ $data->com_name}}">
							{!! $errors->first('com_name', '<p class="help-block">:message</p>') !!}
						</div>

						<div class="form-group">
							<label>{{ trans('theadcol3.import') }}</label>
							<input type="text" name="chemical" class="form-control"  value="{{ $data->chemical }}">
							
						</div>
						<div class="row">
							<div class="col-sm-6 col6" style="">
								<div class="form-group  {{ $errors->has('code') ? 'has-danger' : ''}}">
									<label>{{ trans('theadcol4.import') }}</label>
									<input type="text" name="code" class="form-control" value="{{ $data->code }}">
									{!! $errors->first('code', '<p class="help-block">:message</p>') !!}
								</div>


							</div>
							<div class="col-sm-6" style="">
								<div class="form-group {{ $errors->has('taxcode') ? 'has-danger' : ''}}">
									<label>{{ trans('theadcol6.import') }}</label>
									<input type="text" name="taxcode" class="form-control"  value="{{ $data->taxcode }}">
									{!! $errors->first('taxcode', '<p class="help-block">:message</p>') !!}
								</div>

								

							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col6" style="">
								<div class="form-group  {{ $errors->has('cas') ? 'has-danger' : ''}}">
									<label>{{ trans('theadcol9.import') }}</label>
									<input type="text" name="cas" class="form-control" value="{{ $data->cas }}">
									{!! $errors->first('cas', '<p class="help-block">:message</p>') !!}
								</div>

								


							</div>
							<div class="col-sm-6" style="">
								<div class="form-group {{ $errors->has('un3') ? 'has-danger' : ''}}">
									<label>{{ trans('theadcol8.import') }}</label>
									<input type="text" name="un3" class="form-control" value="{{ $data->un3 }}">
									{!! $errors->first('un3', '<p class="help-block">:message</p>') !!}
								</div>

								

							</div>
						</div>


						<div class="form-group">
							<input type="submit" value="{{ trans('buttonsave.productimport') }}" class="btn btn-fill btn-rose">
							 <a href="{{route('product.index')}}"><input type="button" value="{{ trans('buttoncancel.productimport') }}" class="btn btn-fill btn-warning"></a>
						</div>
						
					</form>
				</div>
		</div>
		</div>
		</div>
@endsection