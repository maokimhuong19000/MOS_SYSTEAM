@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('list country') }}
<div class="row">
  	<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">{{ trans('list.country1') }} </h4>
                  
                </div>

                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>

              
                <div class="card-body table-responsive">
                  <table class="table table-striped" id="ManageTable" style="width: 100%"  data-page-length='100'>
                    <thead class="text-warning">
                      <th>#</th>
                      <th>{{ trans('បញ្ចីឈ្មោះប្រទេស') }}</th>
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
    $(document).ready(function()
    {
        $('#ManageTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
           ajax: '{!! route('country.datatables') !!}',

            columns: [
                { data: 'id' , name: 'id'},
                { data: 'countries_name' , name: 'countries_name'},
                { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 
                
                  var status = '<span class="togglebutton"><label><input class="chkb" att-data="'+full.id+'" type="checkbox" '+ (full.status == 1 ? 'checked' : '') +'><span class="toggle"></span></label></span>' ;
                    var edit = '<span data-original-title="" title=""><a href="'+
                    '{!! route('country.edit','@id') !!}' + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a></span>' ;
                    edit = edit.replace('@id', full.id);
                    @if(Auth::user()->hasAnyPermission(51))
                    return  status + edit;
                    @else
                    return null;
                    @endif
                }
                }
            ],
            "pagingType": "full_numbers",
        "order": [[ 0, "desc" ]],
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
          if ($(this).is(':checked')) {
               url = '{!! route('country.enable','@id') !!}' ;
          }else{
              url = '{!! route('country.disable','@id') !!}' ;
          }
            url = url.replace('@id',id);

          $.ajax({
                  url: url, 
                  success: function(result){
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