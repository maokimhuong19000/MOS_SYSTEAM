@extends('layout.master')

@section('content')


{{ Breadcrumbs::render('user') }}


<div class="row">
 

  <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">

                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">{{trans('user.userlist')}}</h4>
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
                        <th>{{trans('user.email')}}</th>
                        <th>{{trans('user.username')}}</th>
                        <th>{{trans('user.createdate')}}</th>
                        <th>{{trans('theadcol5.price')}}</th>
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
    $(document).ready(function(){
      $('#ManageTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('user.getuser') !!}',
        columns: [
            { data: 'id' },
            { data: 'email'},
             { data: 'name'},
            { data: 'created_at'},
            { "sortable": false, "className": "text-right",
              "render": function ( data, type, full, meta ) { 
                  @if(auth()->user()->can('user.edit'))
                  var edits = '<span data-original-title="" title=""><a href="'+
                   '{!! route('user.edit','@id') !!}' + '"><i class="material-icons">edit</i><div class="ripple-container"></div></a></button>';
                  edits = edits.replace('@id', full.id);

                  var editp = '<span title=""><a href="'+
                   '{!! route('user.editp','@id') !!}' + '"><i class="material-icons">lock</i><div class="ripple-container"></div></a></button>';
                    editp = editp.replace('@id', full.id);

                  var edit = '<span data-original-title="" title=""><a href="'+
                   '{!! route('user.permission','@id') !!}' + '"><i class="material-icons">assignment_ind</i><div class="ripple-container"></div></a></button>';
                  edit = edit.replace('@id', full.id);
                  return   edits+ editp+ edit;
                  @else
                      return null;
                  @endif
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

      
    });
  </script>
@endsection