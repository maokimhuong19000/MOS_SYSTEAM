@extends('layout.master')

@section('content')

<div class="row">
  <div class="col-lg-12 col-md-12">
 <div class="flash-message">
      <div class="flash-message">
        <h2 style="text-align: center;color:linear-gradient(60deg, #ef5350, #e53935)">{{ $exception->getMessage() }}</h2>
      </div>
    </div>
</div>
</div>

@endsection