@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('producte') }}

<!-- flash data -->

<div class="flash-message">
            <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                     @endif
                  @endforeach
             </div>
</div>

<!-- end flash data -->
<div class="row">
 

	<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">{{ trans('label.item3') }}</h4>
                </div>

                <div class="col-md-3 ml-auto">
                   @can('equipment.create')
                    <div class="card-body text-right">
                       <button class="btn btn-info btn-round btn-fab"><a class="btn-info" href="{{route('productmaterial.create')}}">
                          <i class="material-icons">add</i>
                          <div class="ripple-container">
                            
                          </div></a>
                      </button>
                    </div>
                    @endcan
                </div>

                <div class="card-body table-responsive">
                  <table class="table table-striped" id="ManageTable" style="width: 100%"  data-page-length='100'>
                    <thead class="text-warning">
                      <th>#</th>
                      <th>{{ trans('theadcol1.material') }}</th>

                      <th>{{ trans('input.productimport') }}</th>


                      <th>{{ trans('theadcol7.material')}}</th>
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
    </div>
@endsection

@section('script')
 <script type="text/javascript">
    $(document).ready(function() {
      $('#ManageTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! route('productmaterial.get_datatable') !!}',
        columns: [
            { data: 'code', name: 'code'},
            { data: 'product_name', name: 'product_name' },
            { data: 'taxcode', name: 'taxcode' },
            { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 

                 @if(auth()->user()->can('equipment.update')  )

                 

                  var status = '<span class="togglebutton"><label><input class="chkb" att-data="'+full.id+'" type="checkbox" '+ (full.status == 1 ? 'checked' : '') +'><span class="toggle"></span></label></span>' ;

                  var edit = '<span data-original-title="" title=""><a href="'+
                   '{!! route('productmaterial.edit','@id') !!}' + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a></span>' ;
                  edit = edit.replace('@id', full.id);
                  return  status + edit;

                   @else
                    // var status = '<span class="togglebutton"><label><input disabled class="chkb" att-data="'+full.id+'" type="checkbox" '+ (full.status == 1 ? 'checked' : '') +'><span class="toggle"></span></label></span>' ;
                    // return  status
                  return null;
                   @endif
              }
            }
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50,100, -1],
          [10, 25, 50,100, "All"]
        ],
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
               url = '{!! route('productmaterial.enable','@id') !!}' ;
          }else{
              url = '{!! route('productmaterial.disable','@id') !!}' ;
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