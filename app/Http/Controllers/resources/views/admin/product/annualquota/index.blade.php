@extends('layout.master')
@section('content')
{{ Breadcrumbs::render('annualquota') }}

<div class="row">
	<div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.item5')}}</h4>
        </div>

     

        <div class="card-body table-responsive">
        <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>


          <div class="row ">
        
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">           
              
              <div class="col-md-10">    
              <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year" name="year" >
                    <option></option>
                    <span class="caret"></span></select>
                 </div>   
          </div>
          </div>
         
           <div class="col-md-6 ml-auto">
                    @can('annualquota.create')
                    <div class="text-right align-middle">
                       <button class="btn btn-info">
                        <a class="btn-info" href="{{route('annualquota.assignquota')}}">
                          {{trans('label.assignquo')}}
                        </a>
                      </button>
                    </div>
               @endcan
            </div>       
        </div>

<div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 

          <table class="table table-striped" id="ManageTable" style="width: 100%"  data-page-length='10'>
            <thead class="text-warning">
              <tr>
                    <th >#</th>
                    <th >{{trans('theadcol1.quota')}}</th>
                     <th>{{trans('quota.year')}}</th>
                     
                    <th>{{trans('theadcol2.quota')}}</th>
                   
                    <th>{{trans('theadcol3.quota')}}</th>
                     <th ></th>
                     <th></th>
                     
                    <th>{{trans('theadcol4.quota')}}</th>

                    <th>{{trans('theadcol7.quota')}}</th>
                   <th ></th>
                    <th>{{trans('theadcol5.quota')}}</th>
                  </tr>
            </thead>
            <tbody>           
              
            </tbody>
            <tfoot class="text-warning">
              <tr>
                   
                    <th ></th>
                     <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                   <th></th>
                    <th></th>
                    <th ></th>
                     <th></th>
                    <th></th>
                  </tr>
            </tfoot>

            
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
        ajax:'{!! route('annualquota.getdatatables')!!}',
        columns:[

          { data: 'id', name: 'id'},
          { data: 'substance',name:'substance'},
          { data: 'year', name: 'year'},
          
           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.amount).toFixed(2)) ; 

                    }
          },
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.total_amount).toFixed(2)) ; 

                    }
          },
          

          { data: 'amount', name: 'amount' ,visible: false},         
          { data: 'total_amount', name: 'total_amount',visible: false},
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.amount-full.total_amount).toFixed(2)) ; 

                    }
          },
         
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.imported).toFixed(2)) ; 

                    }
          },
           { data: 'imported', name: 'imported' ,visible: false},
         
         
          { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) {
              @if(auth()->user()->can('annualquota.edit'))
                  var show = '<span data-original-title="" title=""><a href="'+
                      '{!! route('annualquota.show','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;
                  show = show.replace('@id', full.material_id);

                  var edit = '<span data-original-title="" title=""><a href="'+
                      '{!! route('annualquota.edit','@id') !!}' + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a></span>' ;
                  edit = edit.replace('@id', full.id);
                  return    edit + show;
              @else
                  {{--var show = '<span data-original-title="" title=""><a href="'+--}}
                  {{--    '{!! route('annualquota.show','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;--}}
                  {{--show = show.replace('@id', full.material_id);--}}
                  return null;
              @endif

                 
              }
            }
        ],
        "pagingType": "full_numbers",
          "order": [[ 2, "desc" ]],
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        buttons: [ 'excel', 'pdf', 'print'],
            dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        },
        "footerCallback": function(row, data, start, end, display){
            var api = this.api(), data;
            //Remove the formatting to get integer data for summation
            var intVal = function(i){
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            //Total over all pages
            var total_amount = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
             var total_assign = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
             var total_imported = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            //Update footer
            $(api.column(3).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
            $(api.column(4).footer()).html('<b>'+total_assign.toFixed(2)+'<b/>');
            $(api.column(5).footer()).html('<b>'+(total_amount-total_assign).toFixed(2)+'<b/>');
            $(api.column(8).footer()).html('<b>'+total_imported.toFixed(2)+'<b/>');
            $(api.column(1).footer()).text('Total'); 
         //   alert(total_amount);

             


        },
        initComplete: function () {
        var api = this.api();
          api.columns([2]).indexes().flatten().each(function (i) {
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