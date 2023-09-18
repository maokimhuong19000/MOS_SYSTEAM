@extends('layout.master')
@section('content')	
{{ Breadcrumbs::render('reporte_purpose') }}


<div class="row">
<div class="col-lg-4 col-md-4">
<div class="card  searchbox_cls">
<div class="card-header card-header-danger card-header-icon">
<div class="card-icon">
       <i class="material-icons">description</i>
</div>
      <h4 class="card-title">{{trans('report_isubstance.purpose_title')}}</h4>
</div>

<div class="card-body table-responsive">
<div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>       
       
            <div class="col-md-12" >
                <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" value="1" id="total_year" class="rad_option form-check-input" name="rad_opt" checked="checked"> {{trans('report_total.year')}}
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
              </div>
             
              <div class="col-md-12" >

                <div class="form-check">
                          <label class="form-check-label">
                           <input type="radio" value="5" id="by_port" class="rad_option form-check-input" name="rad_opt"> {{trans('report_total.custom_date')}} 
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
              </div>
</div>
</div>
</div>
         
<div class="col-lg-8 col-md-8">
<div class="card  searchbox_cls">
<div class="card-header card-header-danger card-header-icon">
<div class="card-icon">
         Filter Criteria 
</div>
      <h4 class="card-title"></h4>
</div>

<div class="card-body table-responsive">

               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
          <div class=" row" id= "d1">
              <div class="col-md-6" >
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year" name="year" ><span class="caret"></span></select>
                 </div>
              </div>
             
              <div class="col-md-6" >
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('back.purpose')}}</label>
                   <select  class="form-control" id="sub" name="sub" ><option value=""></option></select>
                 </div>
              </div>

              <div class="col-md-6"><input type="button" value="Search" class=" btn btn-primary" id="searchsub"></div>
          </div>

           <div class=" row" id= "d4" style="display: none">
              <div class="col-md-4">
                   <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.from_date') }}</label>
                   <input type="text" class="form-control" name="from" id="date1" >  
                 </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.to_date') }}</label>
                    <input type="text" class="form-control" name="to" id="date2" >
                 </div> 
              </div>
              <div class="col-md-4">  
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('back.purpose')}}</label>
                   <select  class="form-control" id="subf" name="sub" ><option value=""></option></select>
                 </div> 
              </div>
              
              <div class="col-md-6"><input type="button" value="Search" class=" btn btn-primary" id="searchf"></div>
          </div>
        </div>



    </div>
 </div>
</div>

 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
<div class="card">
<table id="table_port" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  >
      <thead>
                        
                      <th>{{trans('label.companyname')}}</th>
                     
                                         
                      <th >{{ trans('inputco.productimport') }}</th>
                      <th >{{ trans('theadcol3.material') }}</th>
                      <th>{{ trans('theadcol2.material') }}(BTU/HP/KW)</th>  

                      <th>{{trans('ad_equipment.amount')}}</th>
                      

                      
                     </thead>
                     <tfoot class="text-warning">
                    <tr>
                   
                    <th ></th>
                 
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
               
                   
                    </tr>
            </tfoot>
     </table>
  </div>
</div>
   </div>        
@endsection


@section('script')
  <script type="text/javascript">

function addYear() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 8; i >0 ; i-- ) {
        
        $("#year").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}
   
function show_search(div){

 // var v_div = div ? div : $('#ssub');
  div.show(500);
  $.LoadingOverlay("hide");
}

function hide_all(){
 
  $('#d4').hide(500);
  $('#d1').hide(500);
  $.LoadingOverlay("show");
}  

function datatable_year( year ){

    var   colss =[] ;
    var  tbl ;
  

    var currentYear = new Date().getFullYear();     
    yearr = year ? year : currentYear;

    var querystring =  "?year="+yearr ;
      
      var data, tableName= '#table_port',     str, strf
   
                    $(tableName).DataTable().clear();
                    $(tableName).DataTable().destroy();

                tbl = $(tableName).dataTable({
                     proccessing:true,
                      serverSide:true,
                      responsive: true,
                     
                      ajax:'{!! route('report.getiequipmentByPurpose.year')!!}?year='+yearr,
                      "columns" :  [                     
                        { data: 'purpose', name: 'purpose' ,"visible": false },
                       
                        { data: 'taxcode', name: 'taxcode' },
                        { data: 'substance', name: 'substance' },
                        { "sortable": false, 
                          "render": function ( data, type, full, meta ) {
                            
                                return  full.capvalue + full.capacity +" "  ; 

                            }
                        },
                         { data: 'total', name: 'total' },

                    ],
                     
                      "pagingType": "full_numbers",
                      "order": [[ 0, "desc" ]],
                      "lengthMenu": [
                        [10, 25, 50,100, -1],
                        [10, 25, 50,100, "All"]
                      ],
                       buttons: [ 'excel', 'pdf', 'print'],
                          dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
                      responsive: true,
                      language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                      },
                      "footerCallback": function(row, data, start, end, display){
                        var api = this.api(), data;
                       
                        var intVal = function(i){
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        var colCount =api.columns().header().length; 
                        var all_total = 0 ;
 
                           for (i = 4; i < colCount; i++) {
                                var total_amount = api
                                .column( i )
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );                          
                           
                                all_total = all_total + total_amount ; 
                               $(api.column(i).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
                            }
                            
                           $(api.column(3).footer()).text('Total'); 
                            $(api.column(4).footer()).html('<b>'+all_total.toFixed(2)+'<b/>');
                            
                        },  

                        initComplete: function () {
                          var api = this.api();
                            api.columns([0]).indexes().flatten().each(function (i) {
                                var column = api.column(i);
                                var select = $('#sub')
                              

                                select.empty()
                                 select.append('<option value=""></option>')
                                column.data().unique().each(function (d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>')
                                });
                            });
                          },

                          "drawCallback": function ( settings ) {
                              var api = this.api();
                              var rows = api.rows( {page:'current'} ).nodes();
                              var last=null;
                   
                              api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                                  if ( last !== group ) {
                                      $(rows).eq( i ).before(
                                          '<tr class="group" ><td style="background-color:#55b559;color:#FFF" >'+group+'</td><td colspan="4" ></td></tr>'
                                      );
                   
                                      last = group;
                                  }
                              } );
                          }
                          
                  });

return tbl;
}

function datatable_filter(from,to){


     var   colss =[] ;
    var tbl ;
    var currentd = new Date();  
    var fdate = currentd.getFullYear()  + "-" + '01' + "-" + '01';
    var tdate = currentd.getFullYear()  + "-" + (currentd .getMonth() + 1) + "-" + currentd.getDate()
    froms = from ? from : fdate;
    tos = to ? to : tdate;

      var querystring =  "?from="+froms+"&to="+tos;
      
      var data, tableName= '#table_port',     str, strf
    
                    $(tableName).DataTable().clear();
                    $(tableName).DataTable().destroy();

              tbl =  $(tableName).dataTable({
                     proccessing:true,
                      serverSide:true,
                     scrollX : true,
                     
                      ajax:'{!! route('report.getiequipmentByPurpose.filter')!!}?from='+froms+'&to='+tos,
                      "columns" :  [                     
                        { data: 'purpose', name: 'purpose' ,"visible": false },
                       
                        { data: 'taxcode', name: 'taxcode' },
                        { data: 'substance', name: 'substance' },
                        { "sortable": false, 
                          "render": function ( data, type, full, meta ) {
                            
                                return  full.capvalue + full.capacity +" "  ; 

                            }
                        },
                         { data: 'total', name: 'total' },

                    ],
                     
                      "pagingType": "full_numbers",
                      "order": [[ 0, "desc" ]],
                      "lengthMenu": [
                        [10, 25, 50,100, -1],
                        [10, 25, 50,100, "All"]
                      ],
                       buttons: [ 'excel', 'pdf', 'print'],
                      dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
                      responsive: true,
                      language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                      },
                       "footerCallback": function(row, data, start, end, display){
                        var api = this.api(), data;
                       
                        var intVal = function(i){
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        var colCount =api.columns().header().length; 
                        var all_total = 0 ;
 
                           for (i = 4; i < colCount; i++) {
                                var total_amount = api
                                .column( i )
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );                          
                           
                                all_total = all_total + total_amount ; 
                               $(api.column(i).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
                            }
                            
                       $(api.column(3).footer()).text('Total'); 
                            $(api.column(4).footer()).html('<b>'+all_total.toFixed(2)+'<b/>');
                            
                        },  

                        initComplete: function () {
                          var api = this.api();
                            api.columns([0]).indexes().flatten().each(function (i) {
                                var column = api.column(i);
                                var select = $('#subf')
                                
                                    select.empty()
                                    select.append('<option value=""></option>')
                                column.data().unique().each(function (d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>')
                                });
                            });
                          },

                          "drawCallback": function ( settings ) {
                              var api = this.api();
                              var rows = api.rows( {page:'current'} ).nodes();
                              var last=null;
                   
                              api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                                  if ( last !== group ) {
                                      $(rows).eq( i ).before(
                                          '<tr class="group" ><td style="background-color:#55b559;color:#FFF" >'+group+'</td><td colspan="4" ></td></tr>'
                                      );
                   
                                      last = group;
                                  }
                              } );
                          }

                  });

    return tbl;
} 
$(document).ready(function(){

     
   $('#date1').datepicker({
                format: "dd-mm-yyyy"
              })

    $('#date2').datepicker({
                format: "dd-mm-yyyy"
              })
 
     addYear();    
     let total_year = datatable_year();
    // console.log(total_year)

   $('input[type=radio][name=rad_opt]').change(function() {
    if (this.value == 1) {
       hide_all();
    
       show_search($('#d1'));      
       total_year  = datatable_year()

    }else if (this.value == 5) {
       hide_all();
      
       show_search($('#d4'));
       total_year = datatable_filter();

    }
    });

$("#searchsub").click(function(){
  $.LoadingOverlay("show");
   var yearr =  $("#year").val();
   var opt = $('#sub').val(); 
  
   total_year.api().ajax.url('{!! route('report.getiequipmentByPurpose.year')!!}?year='+yearr);
   total_year.api().column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});


$("#searchf").click(function(){
  $.LoadingOverlay("show");
   var froms =  $("#date1").val();
   var tos = $('#date2').val(); 

   var opt = $('#subf').val(); 
  
   total_year.api().ajax.url('{!! route('report.getiequipmentByPurpose.filter')!!}?from='+froms+'&to='+tos);
   total_year.api().column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});
                 
      
         
     });
  </script>
@endsection