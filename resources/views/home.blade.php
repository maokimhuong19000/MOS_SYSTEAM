@extends('layout.front')
@section('content')
@include('layout.partical.headuser')

<div class="container">
    <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
    <center>
          <div class="padding-top-xs">
              <div class="content_bottom_font padding-sm"><b>{{trans('front.home')}}</b></div>
          </div> 
    </center>
<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 no-padding ">




 <div class="flash-message">
                  @foreach (['error', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{$key}} ">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>



@if( @$Customer->ctype != 2 )
<div class="col-md-12 ">
<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('front.report_quota')}} </span></div>
    <div class="panel-body">
      <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      <div class="row label-assign">
        
              <div class="col-md-3" ><h4>{{trans('front.report_year')}}</h4> </div>
              <div class="col-md-3">  <select  class="form-control" id="year" name="year" ><span class="caret"></span></select> 
              </div>         
           <div class="col-md-6 col-xs-12"></div>
      </div>
       <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

      
      
    
          <table id="quota" class=" ui table table-bordered  " data-page-length='100' style="width:100%">
            <thead>
              <tr>
               
                  <th width= "26%">{{trans('isubstance.type')}}</th>
                  <th width= "14%">{{trans('front_isubstance.year')}}</th>
                  <th width= "15%">{{trans('front.report_request')}}</th>
                  <th width= "15%">{{trans('front.report_allow')}}</th>
                  <th width= "15%">{{trans('front.report_qimported')}}</th>
                  <th width= "15%">{{trans('front.report_balance')}}</th>
                  <th></th>
                  <th></th>
                  <th></th>
          

              </tr>
            </thead>

            <tbody>
             
           <tfoot>
           
           </tfoot>
            </tbody>
          </table>
          </div>
</div>
</div>


<div class="col-md-12 ">
<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('front.report_substance')}} </span></div>
    <div class="panel-body">
      
      <div class="">

       <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
       
          <div class="row label-assign">
              <div class="col-md-3" ><h4>{{trans('front.report_year')}}</h4> </div>
              <div class="col-md-3">  <select  class="form-control" id="years" name="years" ><span class="caret"></span></select> </div>
              <div class="col-md-6" > &nbsp;</div>
              
          </div>
           <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
          <div class=" row label-assign">
              <div class="col-md-3" ><h4>{{trans('front.report_customdate')}}</h4> </div>
              <div class="col-md-3">
                    <input type="text" class=" form-control" name="from" id="date1" placeholder="date picker">  
              </div>
              <div class="col-md-3">  
                <input type="text" class=" form-control" name="to" id="date2" placeholder="date picker"> </div>
              <div class="col-md-3" ><input type="button" value="Search" class=" btn btn-primary" id="searchsub" ></div>
          </div>
           <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
       
    </div>
   

      <table id="table_total_year" class="table table-bordered " cellspacing="0" width="100%" data-page-length='100'  >
                      <thead>
                        
                     
                      <th width= "25%" >{{trans('isubstance.type')}}</th>
                      <th width= "30%">{{trans('isubstance.business_name')}}</th>
                      <th width= "15%">{{ trans('front.report_chemical') }}</th>
                      <th width= "15%">{{ trans('front.report_hscode') }}</th>
                      <th></th>  
                      <th width= "15%">{{trans('front.report_imported')}}</th>
                      
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

@endif

@if( @$Customer->ctype != 1 )
<div class="col-md-12 ">
<div class="panel panel-moe">
    <div class="panel-heading"><span id="data_isubstance " class="content_bottom_font_sm">{{trans('front.report_equipment')}} </span></div>
    <div class="panel-body">

      <div class="">

       <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
       
           <div class="row label-assign">
              <div class="col-md-3" ><h4>{{trans('front.report_year')}}</h4> </div>
              <div class="col-md-3">  <select  class="form-control" id="yearss" name="yearss" ><span class="caret"></span></select> </div>
              <div class="col-md-6" > &nbsp;</div>
              
          </div>
          <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
          <div class="row label-assign">
                <div class="col-md-3" ><h4>{{trans('front.report_customdate')}}</h4> </div>
              <div class="col-md-3">
                    <input type="text" class=" form-control" name="from" id="dates1" placeholder="date picker">  
              </div>
              <div class="col-md-3">  
                <input type="text" class=" form-control" name="to" id="dates2" placeholder="date picker"> </div>
              <div class="col-md-3"><input type="button" value="Search" class=" btn btn-primary" id="searchequ" ></div>
          </div>
        <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
    </div>
  

   <table id="table_total_year_e" class="table table-bordered " cellspacing="0" width="100%" data-page-length='100'  >
                      <thead>
                        
                     
                      <th width= "35%" >{{ trans('iequipment.type') }}</th>
                      <th width= "15%">{{ trans('front.report_hscode') }}</th>
                      <th width= "15%">{{ trans('iequipment.capacity') }}</th>
                      <th width= "20%">{{trans('iequipment.substance')}}</th>
                      <th></th>  
                      <th width= "15%">{{trans('front.report_imported')}}</th>
                      
                     </thead>
                     <tfoot class="text-warning">
                    <tr>
                   
                    <th ></th>
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

@endif

</div>


 </div>
  </div>
  </div> 


@endsection

@section('script')


  <script type="text/javascript">


 function formatNumber(num) {
    return num.replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function addYear() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 5; i >0 ; i-- ) {
        
        $("#years").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}

function addYearss() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 5; i >0 ; i-- ) {
        
        $("#year").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}


function addYears() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 5; i >0 ; i-- ) {
        
        $("#yearss").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}

function sub_report(year,from,to){

    var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;

    var str = from ? "&from="+from+"&to="+to : "" ;

$('#table_total_year').DataTable().clear();
$('#table_total_year').DataTable().destroy();
$('#table_total_year').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('front.reportm')!!}?year='+yearr+str,

                "columns":[                     
                   
                    { data: 'substance', name: 'substance' },
                    { data: 'com_name', name: 'com_name' },
                    { data: 'chemical', name: 'chemical' },
                    
                    { data: 'taxcode', name: 'taxcode' },
                    { data:"total" , name:'total' , visible:false},
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.total).toFixed())  ; 

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
            dom: '<"clear">rtp',
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
            var total_amount = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
           
           
            $(api.column(5).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
            $(api.column(3).footer()).text('Total'); 
         //   alert(total_amount);

             


        },
       

            }); 
}
function equ_report(year,from,to){

    var currentYear = new Date().getFullYear();  
    yearr = year ? year : currentYear;

    var str = from ? "&from="+from+"&to="+to : "" ;

$('#table_total_year_e').DataTable().clear();
$('#table_total_year_e').DataTable().destroy();
$('#table_total_year_e').DataTable({
       
                 proccessing:true,
                  serverSide:true,
                  responsive: true,
                  ajax:'{!! route('front.reporte')!!}?year='+yearr+str,

                "columns":[                     
                   
                    { data: 'product_name', name: 'product_name' },
                    { data: 'taxcode', name: 'taxcode' },
                    { data: 'capacity', name: 'capacity' },
                    
                    { data: 'substance', name: 'substance' },
                    { data:"total" , name:'total' , visible:false},
                    { "sortable": false, "className": "text-right" ,
                      "render": function ( data, type, full, meta ) {
                            
                                return  formatNumber(parseFloat(full.total).toFixed(0))  ; 
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
            dom: '<"clear">rtp',
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
            var total_amount = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            $(api.column(5).footer()).html('<b>'+total_amount.toFixed(0)+'<b/>');
            $(api.column(3).footer()).text('Total'); 
         //   alert(total_amount);

             


        },
        }); 
}

function qreport(year){
   var currentYears = new Date().getFullYear();  
    yy  = year ? year : currentYears;
    $('#quota').DataTable().clear();
    $('#quota').DataTable().destroy();
      $('#quota').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('front.reportq')!!}?year='+yy,
        columns:[

         
          { data: 'substance',name:'substance'},
          { data: 'year', name: 'year'},
          
           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.total_request ).toFixed(2)) ; 

                    }
          },
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.total_allow).toFixed(2)) ; 

                    }
          },

          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.imported).toFixed(2)) ; 

                    }
          },
          { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.total_allow-full.imported).toFixed(2)) ; 

                    }
          },
          

          { data: 'total_request', name: 'total_request' ,visible: false},         
          { data: 'total_allow', name: 'total_allow',visible: false},          
           { data: 'imported', name: 'imported' ,visible: false},
         
         
          
        ],
        "pagingType": "full_numbers",
          "order": [[ 0, "desc" ]],
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        buttons: [ 'excel', 'pdf', 'print'],
            dom: '<"clear">rt',
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        },
     

        
      });

}


$(document).ready(function(){

        addYear();    addYears();  addYearss();
         $("#idhome").addClass("active");
    $('#date1').datepicker({
                format: "dd-mm-yyyy"
              }).datepicker("setDate", new Date());
    $('#date2').datepicker({
                format: "dd-mm-yyyy"
              }).datepicker("setDate",new Date());
    $('#dates1').datepicker({
                format: "dd-mm-yyyy"
              }).datepicker("setDate", new Date());
    $('#dates2').datepicker({
                format: "dd-mm-yyyy"
              }).datepicker("setDate",new Date());
    qreport();
    sub_report();
    equ_report();
     $("#year").change(function() {
        qreport(this.value);
     });
     $("#years").change(function() {
        sub_report(this.value);
     });

     $("#searchsub").click(function(){
        sub_report(2000,$('#date1').val(), $('#date2').val());
     });

      $("#yearss").change(function() {
        equ_report(this.value);
     });

     $("#searchequ").click(function(){
        equ_report(2000,$('#dates1').val(), $('#dates2').val());
     });

   
    });



  </script>
@endsection