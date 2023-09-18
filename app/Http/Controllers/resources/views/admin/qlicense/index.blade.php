@extends('layout.master')

@section('content')

{{ Breadcrumbs::render('license_quota') }}

<div class="row">
	<div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('license.item1')}}</h4>
        </div>

     

        <div class="card-body table-responsive">

                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>


          <div class="row label-assign">
        
         
      
        </div>



          <table class="table table-striped" id="ManageTable" style="width: 100%" data-page-length='100'>
            <thead class="text-warning">
              <tr>
                    <th>#</th>
                    <th>{{trans('theadcol2.register')}}</th>
                    <th>{{trans('quota.year')}}</th>
                    <th>{{trans('quota.total_allow')}}</th>

                    <th>{{trans('theadcol5.quota')}}</th>
                  </tr>
            </thead>
            <tbody>           
              
            </tbody>

            
          </table>
        </div>
      </div>
    </div>
  </div>

<!-- end modal -->
@endsection
 
@section('script')
  <script type="text/javascript">

    $(document).ready(function(){
      $('#ManageTable').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('qlicense.getdatatables')!!}',
        columns:[
         { data: 'no', name: 'no'},
         { data: 'company_name', name: 'company_name'},
          { data: 'year',name:'year'},

          { "sortable": false,
              "render": function ( data, type, full, meta ) {

                        return  formatNumber(parseFloat(full.Total).toFixed(2)) ;

                    }
          },
          { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) {
                  var show = '<span data-original-title="" title=""><a href="'+
                   '{!! route('qlicense.show','@id' ) !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;
                     show = show.replace('@id', full.id);

                  return show;
              }
            }
        ],
        "pagingType": "full_numbers",
          "order": [[ 0, "desc" ]],
        "lengthMenu": [
          [10, 25, 50,100, -1],
          [10, 25, 50,100, "All"]
        ],
        buttons: [{ extend: 'print',
           }],
        dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        },

        initComplete: function () {
        var api = this.api();
          api.columns([6]).indexes().flatten().each(function (i) {
              var column = api.column(i);
              var select = $('#year')
                  .appendTo($("#year"))
                  .on('change', function () {
                      var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                      );
      
      
                      column
                          .search(val ? '' + val + '' : '', true, false)
                          .draw();
                          
                    
                  });

              column.data().unique().each(function (d, j) {
                  select.append('<option value="' + d + '">' + d + '</option>')
              });
          });
        }, 
      });
    });

  </script>
@endsection