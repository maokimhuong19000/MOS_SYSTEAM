@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('request_quota') }}


	<div class="row">
       <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <h4 class="card-title">{{trans('back.request_quota')}}</h4>
                </div>

                <div class="card-body table-responsive">
                  <table class="table table-striped" id="ManageTable" style="width: 100%" data-page-length='100'>
                    <thead class="text-warning">
                      <tr>
                          <th width="10%">#</th>
                          <th width="30%">{{trans('theadcol2.register')}}</th>
                          <th width="20%">{{trans('back.request_amount')}}</th>
                          <th width="20%">{{trans('back.request_date')}}</th>
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
        ajax:'{!! route('annualquotarequest.get_datatable')!!}',
        columns:[
          { data: 'id', name: 'id'},
          { data: 'company_name', name: 'company_name'},
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.total).toFixed(2)) ; 

                    }
          },
         { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  datekh_hour(full.created_at) ; 

                    }
          },
            { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) {
                @if(auth()->user()->can('request.annualquota.assign'))
                  var assign = '<span data-original-title="" title=""><a href="'+
                    '{!! route('annualquotarequest.companyquota','@id') !!}' + '"><button class="btn btn-info btn-sm">Quota<div class="ripple-container"></div></button><div class="ripple-container"></div></a></span>&nbsp;&nbsp;'
                  assign = assign.replace('@id', full.id);
                  var edit = '<span data-original-title="" title=""><a href="'+
                      '{!! route('annualquotarequest.showdetail','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;
                  edit = edit.replace('@id', full.id);
                    return assign+edit;
                 @else
                  var edit = '<span data-original-title="" title=""><a href="'+
                    '{!! route('annualquotarequest.showdetail','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;
                  edit = edit.replace('@id', full.id);

                  return edit;
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
         // alert(id);
          if ($(this).is(':checked')) {
               url = '{!! route('price.enable','@id') !!}' ;
          }else{
              url = '{!! route('price.disable','@id') !!}' ;
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