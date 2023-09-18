@extends('layout.master')

@section('content')
{{ Breadcrumbs::render('showdetaildouble',$materils,$customers) }}
	<div class="row">

		<div class="col-md-12">
			<div class="card">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.item5')}}:: {{trans('label.assignquota')}}: {{$materils->substance}}  ,{{$customers->company_name }}  </h4>
        </div>

      <div class="card-body table-responsive">
 <div class="row ">
        
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">           
              
              <div class="col-md-10">    
              <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year" name="year" ><option></option><span class="caret"></span></select>
                 </div>   
          </div>
          </div>
         
           <div class="col-md-6 ml-auto">
            
                   
            </div>       
        </div>
        <table class="table table-striped" id="ManageTable" style="width: 100%">
            <thead class="text-warning">
              <tr>
                   <th>{{trans('adisubstance.requestno')}}</th>
                  <th>{{trans('adisubstance.arrival')}}</th>   
                  <th></th>              
                  <th>{{trans('adisubstance.totalamount')}}</th>
                  <th></th>
                   <th>{{trans('adisubstance.status')}}</th>  
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
      var oTable  = $('#ManageTable').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('annualquota.doubledatatable')!!}?cid={{$customers->id}}&mid={{$materils->id}}',
        columns:[
          { data: 'request_no', name: 'request_no'},
          { data: 'import_date',name:'import_date'},
          { data: 'quantity', name: 'quantity', visible: false},
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.quantity).toFixed(2)) ; 

                    }
          },
           { data: 'year', name: 'year' , visible: false},
             { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    var answer = "";
                    switch( full.import_status ) {
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
          { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 
                  var edit = '<a target="_blank" href="'+
                    '{!! route('materialrequest.materialrequest_detail','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>' ;
                  edit = edit.replace('@id', full.id);
                  return edit;
              }
            }
          
        ],
        initComplete: function () {
         var api = this.api();
                    api.columns([4]).indexes().flatten().each(function (i) {
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

        "pagingType": "full_numbers",
          dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
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
