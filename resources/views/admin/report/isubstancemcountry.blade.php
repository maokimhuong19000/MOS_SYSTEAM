@extends('layout.master')
@section('content')	
{{ Breadcrumbs::render('report_mcountry') }}
<div class="row">
<div class="col-lg-4 col-md-4">
<div class="card searchbox_cls">
<div class="card-header card-header-danger card-header-icon">
<div class="card-icon">
       <i class="material-icons">description</i>
</div>
      <h4 class="card-title">{{trans('report_isubstance.mcountry_title')}}</h4>
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
<div class="card searchbox_cls">
<div class="card-header card-header-danger card-header-icon">
<div class="card-icon">
        Filter Criteria 
</div>
     
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
                   <label class="bmd-label-static">{{trans('back.country_isubstance')}}</label>
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
                   <label class="bmd-label-static">{{trans('back.country_isubstance')}}</label>
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
     <table id="table_icountry" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  >
      
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

    //var querystring = status==0? "?year="+yearr : '?from='+froms+'&to='+tos;
    var querystring =  "?year="+yearr ;
      
      var data, tableName= '#table_icountry',     str, strf, 
      jqxhr = $.ajax({ url: '{!! route('report.isubtancebycompany.column')!!}'+querystring ,  
                      async: false, })
              .done(function (data) {
                 data = JSON.parse(data);
                $(tableName).empty();
                   var jsoncolumn = {};
                     jsoncolumn["data"] = 'countries_name';
                    jsoncolumn["name"] = 'countries_name';  
                    jsoncolumn["searchable"]= true;
                    jsoncolumn["orderable"]= true;
                    jsoncolumn["search"]= {value: null, regex: "false"}   ;
                    colss.push(jsoncolumn);
                    
                      
                   
                
                 $('<thead><tr><th>Country Manufacture</th>').appendTo(tableName);
                 $('<tfoot><td></td>').appendTo(tableName);
                 $.each(data, function (k, colObj) {
                    str = '<th>' + colObj.substance + '</th>';     
                    var jsoncolumn = new Object();
                    jsoncolumn.data = colObj.substance;
                    jsoncolumn.name = colObj.substance;
                    jsoncolumn.searchable= true;
                    jsoncolumn.orderable= true;
                    jsoncolumn.search= {value: null, regex: "false"}   ;
                    jsoncolumn.class = "text-right";
                    colss.push(jsoncolumn);              
                    $(str).appendTo(tableName+'>thead>tr');
                    $('<td></td>').appendTo(tableName+'>tfoot>tr');
                });

                   $('</tr> </thead>').appendTo(tableName);
                    $(tableName).DataTable().clear();
                    $(tableName).DataTable().destroy();

                tbl = $(tableName).dataTable({
                     proccessing:true,
                      serverSide:true,
                      responsive: true,
                     
                      ajax:'{!! route('report.getIsubstanceBymCountry.year')!!}?year='+yearr,
                      "columns" : colss,
                     
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
 
                           for (i = 1; i < colCount; i++) {
                                var total_amount = api
                                .column( i )
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );                          
                           
                                all_total = all_total + total_amount ; 
                               $(api.column(i).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
                            }
                            
                          // $(api.column(0).footer()).text('Total'); 
                           $(api.column(0).footer()).html('<b> TOTAL: '+all_total.toFixed(2)+'<b/>');
                            
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
                          
                  });

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

   // var currentYear = new Date().getFullYear();     
   // yearr = year ? year : currentYear;

    //var querystring = status==0? "?year="+yearr : '?from='+froms+'&to='+tos;
      var querystring =  "?from="+froms+"&to="+tos;
      
      var data, tableName= '#table_icountry',     str, strf, 
      jqxhr = $.ajax({ url: '{!! route('report.isubtancebycompany.column')!!}'+querystring ,
                      async:false })
              .done(function (data) {
                 data = JSON.parse(data);
                  $(tableName).empty();
                   var jsoncolumn = {};
                    jsoncolumn["data"] = 'countries_name';
                    jsoncolumn["name"] = 'countries_name';  
                    jsoncolumn["searchable"]= true;
                    jsoncolumn["orderable"]= true;
                    jsoncolumn["search"]= {value: null, regex: "false"}   ;
                    colss.push(jsoncolumn);
                    
                      
                   
                
                 $('<thead><tr><th>Port</th>').appendTo(tableName);
                 $('<tfoot><td></td>').appendTo(tableName);
                 $.each(data, function (k, colObj) {
                    str = '<th>' + colObj.substance + '</th>';     
                    var jsoncolumn = new Object();
                    jsoncolumn.data = colObj.substance;
                    jsoncolumn.name = colObj.substance;
                    jsoncolumn.searchable= true;
                    jsoncolumn.orderable= true;
                    jsoncolumn.search= {value: null, regex: "false"}   ;
                    jsoncolumn.class = "text-right";
                    colss.push(jsoncolumn);              
                    $(str).appendTo(tableName+'>thead>tr');
                    $('<td></td>').appendTo(tableName+'>tfoot>tr');
                });

                   $('</tr> </thead>').appendTo(tableName);
                    $(tableName).DataTable().clear();
                    $(tableName).DataTable().destroy();

              tbl =  $(tableName).dataTable({
                     proccessing:true,
                      serverSide:true,
                     scrollX : true,
                     
                      ajax:'{!! route('report.getIsubstanceBymCountry.filter')!!}?from='+froms+'&to='+tos,
                      "columns" : colss,
                     
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
 
                           for (i = 1; i < colCount; i++) {
                                var total_amount = api
                                .column( i )
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );                          
                           
                                all_total = all_total + total_amount ; 
                               $(api.column(i).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
                            }
                            
                            $(api.column(0).footer()).text('Total'); 
                            $(api.column(1).footer()).html('<b>'+all_total.toFixed(2)+'<b/>');
                            
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

                  });
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
  
   total_year.api().ajax.url('{!! route('report.getIsubstanceBymCountry.year')!!}?year='+yearr);
   total_year.api().column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});


$("#searchf").click(function(){
  $.LoadingOverlay("show");
   var froms =  $("#date1").val();
   var tos = $('#date2').val(); 

   var opt = $('#subf').val(); 
  
   total_year.api().ajax.url('{!! route('report.getIsubstanceBymCountry.filter')!!}?from='+froms+'&to='+tos);
   total_year.api().column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});
              



          
         
     });
  </script>
@endsection