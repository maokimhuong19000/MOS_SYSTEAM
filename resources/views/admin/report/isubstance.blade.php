@extends('layout.master')
@section('content')	
{{ Breadcrumbs::render('report_substance') }}

<div class="row">
<div class="col-lg-4 col-md-4">

<div class="card searchbox_ccs">
<div class="card-header card-header-danger card-header-icon">
<div class="card-icon">
       <i class="material-icons">description</i>
</div>
      <h4 class="card-title">{{trans('report_isubstance.title')}}</h4>
</div>

<div class="card-body table-responsive">

   
 <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        
              <div class="col-md-12" >
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input rad_option" type="radio" value="1" id="total_year" class="" name="rad_opt" checked="checked"> {{trans('report_total.year')}}
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
              </div>
            <!--  <div class="col-md-2" ><input type="radio" value="2" id="total_year_month" class="rad_option" name="rad_opt"><strong  class="theader" >&nbsp; &nbsp;{{trans('report_total.month')}} </strong></div> -->
              <div class="col-md-12" >               
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input rad_option" type="radio" value="3" id="by_company" name="rad_opt" > {{trans('report_total.trimester')}}
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
              </div>
              <div class="col-md-12" >
                       <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input rad_option" type="radio" value="4" id="by_country" name="rad_opt" > {{trans('report_total.semester')}}
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
              </div>
              <div class="col-md-12" >               
                 <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input rad_option" type="radio" value="5" id="by_port" name="rad_opt" > {{trans('report_total.custom_date')}}
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

<div class="card searchbox_ccs">
<div class="card-header card-header-danger card-header-icon">
<div class="card-icon">
        Filter Criteria 
</div>
      <h4 class="card-title"></h4>
</div>

<div class="card-body table-responsive">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
          <div class=" row" id= "d1">

              <div class="col-md-12" id="ssub" style="display: none">  
                <div class=" row" >
                <div class="col-md-6"> 
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year" name="year" ><span class="caret"></span></select> 
                 </div>
                </div>
                <div class="col-md-6" >
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.import') }}</label>
                   <select  class="form-control" id="sub" name="sub"  ><option value=""></option></select>
                 </div>                 
                  
                </div>
                <div class="col-md-6" ><input type="button" value="Search" class=" btn btn-primary" id="searchsub"></div>
                </div>
              </div>
          
              <div class="col-md-12" id="ssubm" style="display: none">
              <div class=" row" >  
                 <div class="col-md-6"> 
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year1" name="year1" ><span class="caret"></span></select> 
                 </div>
                </div>
                <div class="col-md-6" >                 
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.import') }}</label>
                   <select  class="form-control" id="subm" name="sub" ><option value=""></option></select>
                 </div>   
                </div>
                <div class="col-md-6" ><input type="button" value="Search" class=" btn btn-primary" id="searchsubm"></div>
              </div>
              </div>
         
              <div class="col-md-12" id="ssubt" style="display: none">  
                 <div class=" row" >  
                   <div class="col-md-6"> 
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year2" name="year2" ><span class="caret"></span></select> 
                 </div>
                </div>
                <div class="col-md-6" >
                  
                   <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.import') }}</label>
                   <select  class="form-control" id="subt" name="sub" ><option value=""></option></select>
                 </div> 
                </div>
                <div class="col-md-6" ><input type="button" value="Search" class=" btn btn-primary" id="searchsubt"></div>
              </div>
              </div>
          
              <div class="col-md-12" id="ssubs" style="display: none">  
                 <div class=" row" >  
                   <div class="col-md-6"> 
                  <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{trans('quota.year')}}</label>
                   <select  class="form-control" id="year3" name="year3" ><span class="caret"></span></select> 
                 </div>
                </div>
                   <div class="col-md-6" >
                    
                    <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.import') }}</label>
                   <select  class="form-control" id="subs" name="sub" ><option value=""></option></select>
                 </div> 
                  </div>
                   <div class="col-md-6" ><input type="button" value="Search" class=" btn btn-primary" id="searchsubs"></div>
                </div>
              </div>
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
               <div class="col-md-4" >
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-static">{{ trans('thead.import') }}</label>
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
    <table id="table_filter" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  style="display: none">
                      <thead>
                        
                      <th>#</th>
                      <th >{{ trans('thead.import') }}</th>
                                         
                      <th >{{ trans('theadcol6.import') }}</th>
                      <th>Amount</th>  
                     </thead>
                     <tfoot class="text-warning">
                    <tr>
                    <th ></th>                   
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
            </tfoot>
               </table>
     <table id="table_total_year" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  style="display: none">
                      <thead>
                        
                      <th>#</th>
                      <th >{{ trans('thead.import') }}</th>
                                         
                      <th >{{ trans('theadcol6.import') }}</th>
                      <th></th>  
                      <th>{{trans('theadcol2.quota')}}</th>
                       <th>{{trans('theadcol4.quota')}}</th>
                      <th>{{trans('theadcol3.quota')}}</th>
                     
                      <th>{{trans('theadcol7.quota')}}</th>
                      <th>{{trans('theadcol6.quota')}}</th>

                      
                     </thead>
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
                   <th></th>
                   
                    </tr>
            </tfoot>
               </table>

    <table id="table_total_month" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  style="display: none">
                    <thead>
                        
                      <th>#</th>
                      <th >{{ trans('thead.import') }}</th>
                     
                      <th >01</th>
                      <th>02</th>  
                      <th>03</th>
                      <th >04</th>
                      <th>05</th>  
                      <th>06</th>
                      <th >07</th>
                      <th>08</th>  
                      <th>09</th>
                      <th >10</th>
                      <th>11</th>  
                      <th>12</th>
                      
                      <th >01</th>
                      <th>02</th>  
                      <th>03</th>
                      <th >04</th>
                      <th>05</th>  
                      <th>06</th>
                      <th >07</th>
                      <th>08</th>  
                      <th>09</th>
                      <th >10</th>
                      <th>11</th>  
                      <th>12</th>
                      
                      
                     </thead>
                     <tfoot class="text-warning">
                    <tr>
                   
                    <th></th>
                      <th ></th>
                     
                      <th ></th>
                      <th></th>  
                      <th></th>
                      <th ></th>
                      <th></th>  
                      <th></th>
                      <th ></th>
                      <th></th>  
                      <th></th>
                      <th ></th>
                      <th></th>  
                      <th></th>
                      
                       <th ></th>
                      <th></th>  
                      <th></th>
                      <th ></th>
                      <th></th>  
                      <th></th>
                      <th ></th>
                      <th></th>  
                      <th></th>
                      <th ></th>
                      <th></th>  
                      <th></th>
                   
                    </tr>
            </tfoot>
               </table>

      <table id="table_total_tri" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  style="display: none">
                      <thead>
                        
                      <th>#</th>
                      <th >{{ trans('thead.import') }}</th>
                      <th></th>
                      <th></th>
                      <th ></th>
                      
                      <th></th> 

                      <th>{{ trans('report_total.q1') }}</th>
                      <th>{{ trans('report_total.q2') }}</th>
                      <th >{{ trans('report_total.q3') }}</th>                      
                      <th>{{trans('report_total.q4')}}</th>
                      
                     </thead>
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
                   <th></th>
                   <th></th>
                   
                    </tr>
            </tfoot> 
               </table>

                <table id="table_total_sem" class="table table-striped" cellspacing="0" width="100%" data-page-length='100'  style="display: none">
                      <thead>
                        
                      <th>#</th>
                      <th >{{ trans('thead.import') }}</th>
                      <th></th>
                      <th></th>
                     

                      <th>{{ trans('report_total.s1') }}</th>
                      <th>{{ trans('report_total.s2') }}</th>
                     
                      
                     </thead>
                     <tfoot class="text-warning">
                    <tr>
 
                    <th></th>
                    <th></th>
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
        $("#year1").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        $("#year2").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        $("#year3").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );

        currentYear--;
    }
}


/////////////////////////// trimester/////////////////////////////////////

function total_sem(year){


     var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;

   $('#table_total_tri').hide('500');
   $('#table_total_sem').show('500');
   $('#table_total_month').hide('500');
   $('#table_total_year').hide('500');
   $('#table_filter').hide('500');
      $('#table_total_year').DataTable().clear();
   $('#table_total_year').DataTable().destroy();
   $('#table_total_month').DataTable().clear();
   $('#table_total_month').DataTable().destroy();
   $('#table_total_tri').DataTable().clear();
   $('#table_total_tri').DataTable().destroy();
   $('#table_total_sem').DataTable().clear();
   $('#table_total_sem').DataTable().destroy();

      $('#table_filter').DataTable().clear();
   $('#table_filter').DataTable().destroy();

   var table = $('#table_total_sem').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('report.isubstance.semester')!!}?year='+yearr,

                "columns":[                     
                    { data: 'id', name: 'id' },
                    { data: 'substance', name: 'substance' },
                    { data: 's1', name: 's1' ,visible:false},
                    { data: 's2', name: 's2' ,visible:false},
                    
                   { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.s1).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.s2).toFixed(2))  ; 

                            }
                    },
                  
                    
                   
                    
                    ],

         buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                     columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            
        ],
        "pagingType": "full_numbers",
        "order": [[ 0, "desc" ]],
        "lengthMenu": [
          [10, 25, 50,100, -1],
          [10, 25, 50,100, "All"]
        ],
       //  buttons: [ 'excel', 'pdf', 'print'],
            dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
        responsive: true,
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
            var total_s1 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            var total_s2 = api
                .column(3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
           
           
            $(api.column(4).footer()).html('<b>'+total_s1.toFixed(2)+'<b/>');
            $(api.column(5).footer()).html('<b>'+total_s2.toFixed(2)+'<b/>');
             $(api.column(1).footer()).html('<b>'+(total_s2+total_s1).toFixed(2)+'<b/>');
            $(api.column(0).footer()).text('Total'); 
         //   alert(total_amount);
        
             


        },
       initComplete: function () {
        var api = this.api();
          api.columns([0]).indexes().flatten().each(function (i) {
              var column = api.column(i);
             // var column1 = api.column(i+1);
              var select = $('#subs')
              
              column.data().unique().each(function (d, j) {
                    var col = api.column(1);
                 var col_data = col.data();                 
                 select.append('<option value="' + d + '">' +col_data[j] + '</option>')
              });
          });
        },

            }); 
      return table;
}

function total_tri(year){


     var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;

   $('#table_total_tri').show('500');
   $('#table_total_sem').hide('500');
   $('#table_total_month').hide('500');
   $('#table_total_year').hide('500');
   $('#table_filter').hide('500');
      $('#table_total_year').DataTable().clear();
   $('#table_total_year').DataTable().destroy();
   $('#table_total_month').DataTable().clear();
   $('#table_total_month').DataTable().destroy();
   $('#table_total_tri').DataTable().clear();
   $('#table_total_tri').DataTable().destroy();
   $('#table_total_sem').DataTable().clear();
   $('#table_total_sem').DataTable().destroy();

      $('#table_filter').DataTable().clear();
   $('#table_filter').DataTable().destroy();
   var table= $('#table_total_tri').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('report.isubstance.trimester')!!}?year='+yearr,

                "columns":[                     
                    { data: 'id', name: 'id' },
                    { data: 'substance', name: 'substance' },
                    { data: 'q1', name: 'q1', visible:false },
                    { data: 'q2', name: 'q2', visible:false },
                    
                    { data: 'q3', name: 'q3', visible:false },
                    { data:"q4" , name:'q4', visible:false },
                  
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.q1).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.q2).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.q3).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.q4).toFixed(2))  ; 

                            }
                    },
                   
                    
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
            //Remove the formatting to get integer data for summation
            var intVal = function(i){
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            //Total over all pages
            var total_q1 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
             var total_q2 = api
                .column( 3)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
             var total_q3 = api
                .column( 4)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
             var total_q4 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            

            
           
           
            $(api.column(6).footer()).html('<b>'+total_q1.toFixed(2)+'<b/>');
            $(api.column(7).footer()).html('<b>'+total_q2.toFixed(2)+'<b/>');
            $(api.column(8).footer()).html('<b>'+total_q3.toFixed(2)+'<b/>');
            $(api.column(9).footer()).html('<b>'+total_q4.toFixed(2)+'<b/>');
             $(api.column(1).footer()).html('<b>'+(total_q1+total_q2 + total_q3 + total_q4).toFixed(2)+'<b/>');
            $(api.column(0).footer()).text('Total'); 
         //   alert(total_amount);
        
             


        },
       initComplete: function () {
        var api = this.api();
          api.columns([0]).indexes().flatten().each(function (i) {
              var column = api.column(i);
             // var column1 = api.column(i+1);
              var select = $('#subt')
             
              column.data().unique().each(function (d, j) {
                   var col = api.column(1);
                 var col_data = col.data();                 
                 select.append('<option value="' + d + '">' +col_data[j] + '</option>')
              });
          });
        },

            });
    return table; 

}


///////////////////////////////// month /////////////////////////////////////
function total_month(year){


     var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;
   $('#table_total_tri').hide('500');
   $('#table_total_sem').hide('500');
   $('#table_total_month').show('500');
   $('#table_total_year').hide('500');
   $('#table_filter').hide('500');
      $('#table_total_year').DataTable().clear();
   $('#table_total_year').DataTable().destroy();
   $('#table_total_month').DataTable().clear();
   $('#table_total_month').DataTable().destroy();
   $('#table_total_tri').DataTable().clear();
   $('#table_total_tri').DataTable().destroy();
   $('#table_total_sem').DataTable().clear();
   $('#table_total_sem').DataTable().destroy();

      $('#table_filter').DataTable().clear();
   $('#table_filter').DataTable().destroy();
   var table = $('#table_total_month').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('report.isubstance.month')!!}?year='+yearr,

                "columns":[                     
                    { data: 'id', name: 'id' },
                    { data: 'substance', name: 'substance' },
                   
                   
                    { data: 'January', name: 'January' , visible:false},
                   { data: 'Febury', name: 'Febury' , visible:false},
                   { data: 'March', name: 'March' , visible:false},
                   { data: 'April', name: 'April' , visible:false},
                   { data: 'May', name: 'May' , visible:false},
                   { data: 'June', name: 'June' , visible:false},
                   { data: 'July', name: 'July' , visible:false},
                   { data: 'August', name: 'August' , visible:false},
                   { data: 'September', name: 'September' , visible:false},
                   { data: 'October', name: 'October' , visible:false},
                   { data: 'November', name: 'November' , visible:false},
                   { data: 'December', name: 'December' , visible:false},
                   { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.January).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.Febury).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.March).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.April).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.May).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.June).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.July).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.August).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.September).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.October).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.November).toFixed(2))  ; 

                            }
                    },
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.December).toFixed(2))  ; 

                            }
                    }, 
                   
                    
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
            //Remove the formatting to get integer data for summation
            var intVal = function(i){
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            //Total over all pages
            var total_jan = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            var total_feb = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_mar = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_apr = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_may = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_jun = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_jul = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_aug = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_sep = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_oct = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_nov = api
                .column( 12 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var total_dec = api
                .column( 13 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
           
          $(api.column(14).footer()).html('<b>'+total_jan.toFixed(2)+'<b/>');
           $(api.column(15).footer()).html('<b>'+total_feb.toFixed(2)+'<b/>');
            $(api.column(16).footer()).html('<b>'+total_mar.toFixed(2)+'<b/>');
             $(api.column(17).footer()).html('<b>'+total_apr.toFixed(2)+'<b/>');
              $(api.column(18).footer()).html('<b>'+total_may.toFixed(2)+'<b/>');
               $(api.column(19).footer()).html('<b>'+total_jun.toFixed(2)+'<b/>');
                $(api.column(20).footer()).html('<b>'+total_jul.toFixed(2)+'<b/>');
                 $(api.column(21).footer()).html('<b>'+total_aug.toFixed(2)+'<b/>');
                  $(api.column(22).footer()).html('<b>'+total_sep.toFixed(2)+'<b/>');
                   $(api.column(23).footer()).html('<b>'+total_oct.toFixed(2)+'<b/>');
                    $(api.column(24).footer()).html('<b>'+total_nov.toFixed(2)+'<b/>');
                     $(api.column(25).footer()).html('<b>'+total_dec.toFixed(2)+'<b/>');
                      $(api.column(1).footer()).html('<b>'+(total_jan+total_feb+total_mar
                        +total_apr+ total_may + total_jun + total_jul + total_aug + total_sep + total_oct + total_nov + total_dec).toFixed(2)+'<b/>');
          $(api.column(0).footer()).text('Total'); 
           //alert(total_amount);

             


        },
       initComplete: function () {
        var api = this.api();
          api.columns([0]).indexes().flatten().each(function (i) {
              var column = api.column(i);
             // var column1 = api.column(i+1);
              var select = $('#subm')
            
              column.data().unique().each(function (d, j) {
                   var col = api.column(1);
                 var col_data = col.data();                 
                 select.append('<option value="' + d + '">' +col_data[j] + '</option>')
              });
          });
        }, 

            }); 
return table;
}



/////////////////////// total year ///////////////////////////////////////
function total_year(year){


     var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;

   $('#table_total_tri').hide('500');
   $('#table_total_sem').hide('500');
   $('#table_total_month').hide('500');
   $('#table_filter').hide('500');
   $('#table_total_year').show('500');
      $('#table_total_year').DataTable().clear();
   $('#table_total_year').DataTable().destroy();
   $('#table_total_month').DataTable().clear();
   $('#table_total_month').DataTable().destroy();
   $('#table_total_tri').DataTable().clear();
   $('#table_total_tri').DataTable().destroy();
   $('#table_total_sem').DataTable().clear();
   $('#table_total_sem').DataTable().destroy();
      $('#table_filter').DataTable().clear();
   $('#table_filter').DataTable().destroy();
   var table = $('#table_total_year').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('report.isubstance.year')!!}?year='+yearr,

                "columns":[                     
                    { data: 'id', name: 'id' },
                    { data: 'substance', name: 'substance' },
                    
                    { data: 'taxcode', name: 'taxcode' },
                    { data:"total" , name:'total' , visible:false},
                    { data:"AnnaulQuota" , name:'AnnaulQuota' , "className": "text-right"},
                     { data:"unassigned" , name:'unassigned', "className": "text-right" },
                    { data:"AssignedQuota" , name:'AssignedQuota' , "className": "text-right" },
                   
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.total).toFixed(2))  ; 

                            }
                    },
                    { data: 'balance', name: 'balance' , "className": "text-right"},
                    
                   
                    
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
            //Remove the formatting to get integer data for summation
            var intVal = function(i){
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            //Total over all pages
            var total_aquota = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            var total_uquota = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            var total_asquota = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            var total_utquota = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            var total_bquota = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
           
            $(api.column(4).footer()).html('<b>'+formatNumber(parseFloat(total_aquota).toFixed(2))+'<b/>');
            $(api.column(5).footer()).html('<b>'+formatNumber(parseFloat(total_uquota).toFixed(2))+'<b/>');
            $(api.column(6).footer()).html('<b>'+formatNumber(parseFloat(total_asquota).toFixed(2))+'<b/>');
            $(api.column(7).footer()).html('<b>'+formatNumber(parseFloat(total_utquota).toFixed(2))+'<b/>');
            $(api.column(8).footer()).html('<b>'+formatNumber(parseFloat(total_bquota).toFixed(2))+'<b/>');
            $(api.column(2).footer()).text('Total'); 
         //   alert(total_amount);

             


        },
       initComplete: function () {
        var api = this.api();
          api.columns([0]).indexes().flatten().each(function (i) {
              var column = api.column(i);          
               var select = $('#sub') 
             
              column.data().unique().each(function (d, j) {
                 var col = api.column(1);
                 var col_data = col.data();                 
                 select.append('<option value="' + d + '">' +col_data[j] + '</option>')
              });
          });
        },

            }); 
return table;
}

function total_filter(from , to){

var currentd = new Date();  
var fdate = currentd.getFullYear()  + "-" + (currentd .getMonth() + 1) + "-" + currentd.getDate()
    froms = from ? from : fdate;
    tos = to ? to : fdate;
   

   $('#table_total_tri').hide('500');
   $('#table_total_sem').hide('500');
   $('#table_total_year').hide('500');
   $('#table_filter').show('500');
   $('#table_total_year').DataTable().clear();
   $('#table_total_year').DataTable().destroy();
   $('#table_total_month').DataTable().clear();
   $('#table_total_month').DataTable().destroy();
   $('#table_total_tri').DataTable().clear();
   $('#table_total_tri').DataTable().destroy();
   $('#table_total_sem').DataTable().clear();
   $('#table_total_sem').DataTable().destroy();

   $('#table_filter').DataTable().clear();
   $('#table_filter').DataTable().destroy();
   var table = $('#table_filter').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('report.isubstance.filter')!!}?from='+froms+'&to='+tos,

                "columns":[                     
                    { data: 'id', name: 'id' },
                    { data: 'substance', name: 'substance' },
                    
                    { data: 'taxcode', name: 'taxcode' },
                    { data:"total" , name:'total' , "className": "text-right"},
                   
                   
                    
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
            //Remove the formatting to get integer data for summation
            var intVal = function(i){
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            //Total over all pages
            var total_aquota = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
           
           
            $(api.column(3).footer()).html('<b>'+formatNumber(parseFloat(total_aquota).toFixed(2))+'<b/>');
           
            $(api.column(2).footer()).text('Total'); 
         //   alert(total_amount);

             


        },
       initComplete: function () {
        var api = this.api();
          api.columns([0]).indexes().flatten().each(function (i) {
              var column = api.column(i);
            
               var select = $('#subf') 
             
              column.data().unique().each(function (d, j) {
                   var col = api.column(1);
                 var col_data = col.data();                 
                 select.append('<option value="' + d + '">' +col_data[j] + '</option>')
              });
          });
        },

            }); 
return table;
}
function show_search(div){

  var v_div = div ? div : $('#ssub');
  v_div.show(500);
  $.LoadingOverlay("hide");
}

function hide_all(){
  $('#ssub').hide(500);
  $('#ssubm').hide(500);
  $('#ssubt').hide(500);
  $('#ssubs').hide(500);
  $('#d4').hide(500);
  $.LoadingOverlay("show");
}

/////////////////////////////////////////////////////////////////////////////////
 $(document).ready(function(){



    $('#date1').datepicker({
                format: "yyyy-mm-dd"
              })

    $('#date2').datepicker({
                format: "yyyy-mm-dd"
              })
      


     addYear();
     show_search();
    let total_years  =  total_year();

    $('input[type=radio][name=rad_opt]').change(function() {
    if (this.value == 1) {
       hide_all();
       $('#d1').show(500);
       show_search($('#ssub'));

       total_years  = total_year( );

    }else if (this.value == 2) {
       hide_all();
       $('#d1').show(500);
       show_search($('#ssubm'));

       total_years = total_month();

    }else if(this.value == 3){
      hide_all();
      $('#d1').show(500);
      show_search($('#ssubt'));

      total_years = total_tri();

    
    }else if(this.value == 4){
      hide_all();
      $('#d1').show(500);
      show_search($('#ssubs'));

      total_years= total_sem();

    }else{
       hide_all();
       $('#d1').hide(500);
       show_search($('#d4'));
       total_years = total_filter();
    }
    });

$("#searchsub").click(function(){
  $.LoadingOverlay("show");
   var yearr =  $("#year").val();
   var opt = '\\b' + $('#sub').val()+ '\\b';  
   total_years.ajax.url('{!! route('report.isubstance.year')!!}?year='+yearr);
   total_years.column(0).search(opt, true, false).draw();
  $.LoadingOverlay("hide");
});


$("#searchsubt").click(function(){

  $.LoadingOverlay("show");
   var yearr =  $("#year2").val();
   var opt = $('#subt').val(); 
  
   total_years.ajax.url('{!! route('report.isubstance.trimester')!!}?year='+yearr);
   total_years.column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});

$("#searchsubs").click(function(){
  $.LoadingOverlay("show");
   var yearr =  $("#year3").val();
   var opt = $('#subs').val(); 
  
   total_years.ajax.url('{!! route('report.isubstance.semester')!!}?year='+yearr);
   total_years.column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});

$("#searchsubm").click(function(){
  $.LoadingOverlay("show");
   var yearr =  $("#year1").val();
   var opt = $('#subm').val(); 
  
   total_years.ajax.url('{!! route('report.isubstance.month')!!}?year='+yearr);
   total_years.column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});

$("#searchf").click(function(){
  $.LoadingOverlay("show");
   var from =  $("#date1").val();
   var to = $('#date2').val(); 

   var opt = $('#subf').val(); 
  
   total_years.ajax.url('{!! route('report.isubstance.filter')!!}?from='+from+'&to='+to);
   total_years.column(0).search( opt ).draw();
  $.LoadingOverlay("hide");
});

 

 });
  </script>
@endsection