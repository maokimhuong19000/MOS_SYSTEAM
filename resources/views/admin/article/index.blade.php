@extends('layout.master')

@section('content')



 <div class="row">
{{ Breadcrumbs::render('register') }}
</div>
<br>
<div class="row">
 

  <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">

                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">{{trans('article.index')}}</h4>
                </div>

                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-{{ $key }}">{{ Session::get($key) }}
                         </p>
                     @endif
                  @endforeach
                </div>


                <div class="card-body table-responsive">
                  <table class="table table-striped" id="ManageTable" style="width: 100%">
                    <thead class="text-warning">
                      <tr>
                        <th>#</th>
                        <th>{{trans('article.title')}}</th>
                        <th>{{trans('article.create_date')}}</th>
                        <th>{{trans('theadcol5.register')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
  <script type="text/javascript">
  /*  $(document).ready(function(){
      $('#ManageTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('register.getdatatables') !!}',
        columns: [
            { data: 'id' },
            { data: 'idcard'},
            { data: 'company_name'},
            { data: 'user_name'},
            { data: 'created_at'},

            { "sortable": false, 
              "render": function ( data, type, full, meta ) { 
                  if (full.ctype==0){
                    return '{{trans('importe.createuser')}}';
                    
                  }else if(full.ctype==1){
                    return '{{trans('importm.createuser')}}';
                    
                  }else{ return '{{trans('importall.createuser')}}'; }
                                }},
            { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 
                  var status = '<span class="togglebutton"><label><input class="chkb" att-data="'+full.id+'" type="checkbox" '+ (full.status == 1 ? 'checked' : '') +'><span class="toggle"></span></label></span>' ;

                  var edits = '<span data-original-title="" title=""><a href="'+
                   '{!! route('register.edit','@id') !!}' + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a></span>';
                  edits = edits.replace('@id', full.id);

                  var editp = '<span data-original-title="" title=""><a href="'+
                   '{!! route('register.editp','@id') !!}' + '"><i class="material-icons">lock</i><div class="ripple-container"></div></a></span>';
                    editp = editp.replace('@id', full.id);

                  var edit = '<span data-original-title="" title=""><a href="'+
                   '{!! route('register.detail','@id') !!}' + '"><i class="material-icons">visibility</i><div class="ripple-container"></div></a></span>';
                  edit = edit.replace('@id', full.id);
                  return  status + edits+ editp+ edit;
              }} 
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      $('body').on('change', '.chkb', function() {
          var id = $(this).attr("att-data");
          var url = "";
          if ($(this).is(':checked')) {
               url = '{!! route('register.enable','@id') !!}' ;
          }else{
              url = '{!! route('register.disable','@id') !!}' ;
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
      }); */
    });
  </script>
@endsection