@extends('layout.master')

@section('content')



 <div class="row">
{{ Breadcrumbs::render('register') }}
</div>

<div class="row">
 

  <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">

                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">{{trans('article.index')}}</h4>
                </div>

                 <div class="card-body ">
                 	<form action="{{route('article.store')}}" method="post" id="frm_create_art">
          			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="flash-message">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                      @endforeach
                    </div>

                    <div class="form-group {{ $errors->has('title') ? 'has-danger' : ''}}">
                        <label>{{trans('Username.createuser')}}</label>
                        <input type="text" class="form-control" name="title" id="title">
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                      </div>

                      <div class="form-group ">
                        
                      </div>
                     
                      <div class="form-group {{ $errors->has('content') ? 'has-danger' : ''}}">
                         
                         <textarea id="content" name="content"></textarea>
                        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                       </div>

                       <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                          <input type="submit" value="{{trans('buttonsave.productimport')}}" class="save btn btn-primary">
                          
                          <a href="{{route('article.index')}}"><input type="button" value="{{trans('buttoncancel.productimport')}}" class="btn btn-default"></a>
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
 <link href="{{asset('admin/summernote/summernote.css')}}" rel="stylesheet" />
<script src="{{asset('admin/summernote/summernote.js')}}"></script>
  <script type="text/javascript">
		$('#content').summernote({

		             height:300,

		           });


    </script>
@endsection



