@extends('layout.master')

@section('content')

{{ Breadcrumbs::render('showdetail',$Aquota) }}
	<div class="row">
 
		<div class="col-md-12">
			<div class="card">

        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
              <i class="material-icons">description</i>
          </div>
          <h4 class="card-title">{{trans('label.item5')}}:: {{trans('label.assignquota')}}: {{$Aquota->substance}} </h4>
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
                 
                  <th >{{trans('theadcol2.register')}}</th>
                  <th>{{trans('quota.year')}}</th>

                  <th></th>
                  <th></th>

                  <th>{{trans('theadcol2.quota')}}</th>
                  <th>{{trans('theadcol7.quota')}}</th>
                  <th>{{trans('theadcol6.quota')}}</th>
          
                 
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
                  </tr>
            </tfoot>
          </table>
 <div class="col-md-6  ml-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
  <div class="col-md-6  ml-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
             <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12"><div class=""><a href="{{route('annualquota.index')}}"><input type="button" value="{{ trans('back.back_btn') }}" class="btn btn-default"></a></div></div>
             <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12"></div>
      </div>
		</div>
	</div> 
</div>
@endsection

@section('script')
  <script type="text/javascript">

  function addYear() {
   var currentYear = new Date().getFullYear();  
   
    for (var i = 6; i >0 ; i-- ) {
        
        $("#year").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear--;
    }
}

    $(document).ready(function(){
  
      var querystring =  '?id={{$s_id}}' ;
      var oTable  = $('#ManageTable').DataTable({
        proccessing:true,
        serverSide:true,
        responsive: true,
        ajax:'{!! route('annualquota.showdetail')!!}'+querystring,
        columns:[
        
          { data: 'company_name',name:'company_name'},
          { data: 'year', name: 'year'},
          { data: 'amount' , name : 'amount', visible: false},
          { data: 'total_use' , name: 'total_use', visible: false },

           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  formatNumber(parseFloat(full.amount).toFixed(2))  ; 

                    }
                },
           
           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return  full.total_use? formatNumber(parseFloat(full.total_use).toFixed(2)): 0   ; 
   
                    }
                },
           
           { "sortable": false,
              "render": function ( data, type, full, meta ) {
                    
                        return    formatNumber(parseFloat(full.amount - ( full.total_use? full.total_use: 0)   ).toFixed(2)) ; 

                    }
                },
                  
          
          { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 
                  var show = '<span data-original-title="" title=""><a href="'+
                   '{!! route('annualquota.doubleshow',['@id','@mid']) !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>' ;
                  show = show.replace('@id', full.customer_id);
                  show = show.replace('@mid', full.material_id);
                  return show;
              }
            }
        ],
        initComplete: function () {
         var api = this.api();
                    api.columns([1]).indexes().flatten().each(function (i) {
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

        "footerCallback": function(row, data, start, end, display){
            var api = this.api(), data;
            //Remove the formatting to get integer data for summation
            var intVal = function(i){
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            //Total over all pages
            var total_amount = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
             var total_assign = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            //Update footer
            $(api.column(4).footer()).html('<b>'+total_amount.toFixed(2)+'<b/>');
            $(api.column(5).footer()).html('<b>'+total_assign.toFixed(2)+'<b/>');
            $(api.column(6).footer()).html('<b>'+(total_amount-total_assign).toFixed(2)+'<b/>');
           
            $(api.column(1).footer()).text('Total'); 
         //   alert(total_amount);

             


        },
         buttons: [ 'excel', 'pdf', 'print'],
            dom: "<'row'<'col-sm-6'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>B",
        "pagingType": "full_numbers",
          "order": [[ 1, "desc" ]],
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

       var select = $('#material_id')
          //.appendTo($("#material_id"))
            .on('change', function () {
          // var val = $.fn.dataTable.util.escapeRegex(
            $(this).val()
            oTable.ajax.url('{!! route('annualquota.showdetail')!!}?id=' + $(this).val() );
            oTable.draw();
        });
                
    });
  </script>
@endsection
