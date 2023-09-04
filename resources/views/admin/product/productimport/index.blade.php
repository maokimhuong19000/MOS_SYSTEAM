@extends('layout.master')


@section('content')

{{ Breadcrumbs::render('product') }}

<div class="row">
  	<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">{{ trans('label.item2') }} </h4>
                  
                </div>

                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>


                <div class="col-md-3 ml-auto">
                  @can('material.create')
                    <div class="card-body text-right">
                       <button class="btn btn-info btn-round btn-fab"><a class="btn-info" href="{{route('product.create')}}">
                      <i class="material-icons">add</i>
                    <div class="ripple-container"></div></a></button>
                    </div>
                  @endcan
                </div>

              

                <div class="card-body table-responsive">
                  <table class="table table-striped" id="ManageTable" style="width: 100%"  data-page-length='100'>
                    <thead class="text-warning">
                      <th>#</th>
                      <th >{{ trans('thead.import') }}</th>
                      <th>{{ trans('theadcol2.import') }}</th>
                      <th>{{ trans('theadcol3.import') }}</th>
                      <th>{{ trans('theadcol4.import') }}</th>

                      <th>{{ trans('theadcol9.import') }}</th>
                      <th>{{ trans('theadcol8.import') }}</th>
                      <th>{{ trans('theadcol6.import') }}</th>
                      <th>{{ trans('theadcol7.import') }}</th>
                    </thead>
                    <tbody>
                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>
    </div>
@endsection


@section('script')
  <script type="text/javascript">
    $(document).ready(function() {


      $('#ManageTable').DataTable({


        processing: true,
        serverSide: true,
        ajax: '{!! route('product.datatable') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'substance', name: 'substance' },
            { data: 'com_name', name: 'com_name' },
            { data: 'chemical', name: 'chemical' },
            { data: 'code', name: 'code' },         
        
            { data: 'cas', name: 'cas' },
            { data: 'un3', name: 'un3' },
            { data: 'taxcode', name: 'taxcode' },
            { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 

              @if(auth()->user()->can('material.update')  )

                  var status = '<span class="togglebutton"><label><input class="chkb" att-data="'+full.id+'" type="checkbox" '+ (full.status == 1 ? 'checked' : '') +'><span class="toggle"></span></label></span>' ;

                  var edit = '<span data-original-title="" title=""><a href="'+
                   '{!! route('product.edit','@id') !!}' + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a></span>' ;
                  edit = edit.replace('@id', full.id);
                  return  status + edit;
                  @else
                    return null;
              @endif

              }} 
        ],
        "pagingType": "full_numbers",
        "order": [[ 0, "desc" ]],
        "lengthMenu": [
          [10, 25, 50,100, -1],
          [10, 25, 50,100, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });

      $('body').on('change', '.chkb', function() {
          var id = $(this).attr("att-data");
          var url = "";
         // alert(id);
          if ($(this).is(':checked')) {
               url = '{!! route('product.enable','@id') !!}' ;
          }else{
              url = '{!! route('product.disable','@id') !!}' ;
          }
            url = url.replace('@id',id);

          $.ajax({
                  url: url, 
                  success: function(result){
                  //console.log(result);
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
