@extends('layout.master')
@section('content')	
{{ Breadcrumbs::render('license_material') }}


	<div class="row">
       <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('license.item2')}}</h4>
                </div>

                <div class="card-body table-responsive">
                  <table class="table table-striped" id="ManageTable" style="width: 100%" data-page-length='100'>
                    <thead class="text-warning">
                      <tr>
                         <th></th>
                           <th>{{trans('adisubstance.requestno')}}</th>
                          <th>{{trans('theadcol2.register')}}</th>
                          <th>{{trans('adisubstance.totalamount')}}</th>
                          <th>{{trans('adisubstance.status')}}</th>
                          <th>{{trans('adisubstance.arrival')}}</th>
                          <th>{{trans('theadcol5.register')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
     </div>
   
@endsection


@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#ManageTable').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('materiallicense.getldatatable')!!}',
        columns:[
        { data: 'id', name: 'id',visible:false},
          { data: 'request_no', name: 'request_no'},
          { data: 'company_name', name: 'company_name'},
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.Total).toFixed(2)) ; 

                    }
          },
           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    var answer = "";
                    switch( parseInt(full.import_status) ) {
                      case 0: 
                        answer = "PENDING";
                        break;
                      case 1: 
                        answer = "CANCELED";
                        break;
                      case 2: 
                        answer = "IMPORTING";
                        break;
                      default:
                        answer = "SUCCEED";
                    }
                        return  answer ; 

                    }
          },
          { data: 'import_date', name: 'import_date'},
    
          { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 
                  var edit = '<a href="'+
                    '{!! route('materiallicense.show','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>' ;
                  edit = edit.replace('@id', full.id);
                  return edit;
              }
            }
        ],
         "order": [[ 0, "desc" ]],
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });
    });
  </script>
@endsection


