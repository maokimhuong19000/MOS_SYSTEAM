@extends('layout.front')
@section('content')
@include('layout.partical.headuser')


<div id="main"></div>
<form  method="post" action="{{route('front.rquota')}}" enctype="multipart/form-data" >

 {{ @csrf_field() }}

<div class="container">
   <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child  ">
	 	<center>
          <div class="padding-top-xs">
              <div class="content_bottom_font padding-sm"><b>{{trans('front.request_quota')}}</b></div>
          </div> 
    </center>
    <div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    <div class="col-md-12 ">

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="flash-message">
                  @foreach (['error', 'warning', 'success', 'info'] as $key)
                    @if(Session::has($key))
                    
                         <p class="alert alert-danger">{{ Session::get($key) }}
                         </p>
                         
                    @endif
                  @endforeach
                </div>
    <div class="panel panel-moe">
   
    <div class="panel-body">
              <br>                   
          <div class="col-sm-9" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
           <div class="col-md-3 ml-auto pull-right">
              <div class="card-body text-right ">
               <button type="button" class="btn btn-primary add_sub " data-toggle="modal" data-target="#exampleModalLong" >
               <i class="glyphicon glyphicon-plus"></i></button>
              </div>
           </div> <br>  

            <div class="col-sm-6" > <span>{{trans('front_isubstance.year')}}</span></div>
            <div class="col-sm-6 ">
            </div>

            <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
            <div class="col-sm-6" > 

              <div class="col-md-12">
                <div class="form-group">
                 
                  <select id="ryear" name="year" class="form-control">
                    
                  </select>
              </div>
              </div>

            </div>
            <div class="col-sm-6">


             </div>
           <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
           <div class="col-sm-12 mtable" > 
              <table class="table table-striped" id="table_sub">
                    <thead>
                      <tr>
                        <th>{!! trans('label_iquota.substance')!!}</th>
                        <th>{!!trans('label_iquota.quanlity')!!}</th>
                        <th>{!!trans('label_iquota.old_quanlity')!!}</th>
                       
                        <th width="20px"><button type="button" class="btn btn-danger btn-xs" id="delete-row"><i class="fas fa-trash-alt"></i></button></th>
                        </tr>
                     </thead>
               <tbody></tbody>
              </table>
            </div>


                     



                        <div class="col-md-12"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>



                                      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" >
                                              <h3 class="modal-title" id="exampleModalLongTitle"></h3>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="col-md-12">
                                              <form>
                                                <div class="form-group">
                                                  <label>{{strip_tags(trans('label_iquota.substance'))}}</label><br/>
                                                  <select name="" class="form-control" id="material_id">
                                                    @foreach($Material as $materials)
                                                    <option value="{{$materials->id}}">{{$materials->substance}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="form-group">
                                                  <label>{{strip_tags(trans('label_iquota.quanlity'))}}</label><br/>
                                                  <input type="text" name="" placeholder="Enter Amount" class="form-control" id="amount">
                                                </div>

                                                <div class="form-group">
                                                  <label>{{strip_tags(trans('label_iquota.old_quanlity'))}}</label><br/>
                                                  <input type="text" name="" placeholder="Enter Old amount" class="form-control" id="old_amount">
                                                </div>
                                              
                                               

                                              </form>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('label_contact.close_btn')}}</button>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-row">{{trans('label_contact.add_btn')}}</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>




                                       <div class="modal fade" id="add_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" >
                                              <h3 class="modal-title" id="exampleModalLongTitle"></h3>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form>

                                                <div class="form-group">
                                                  {{trans('label_rquota.document')}}<br/>
                                                  <input type="file" name="file_path" class="form-control" id="file_path">
                                                </div>
                                              
                                                <div class="form-group">
                                                  <label>{{trans('label_rquota.document_name')}}</label><br/>
                                                  <input type="text" class="form-control" name="file_name" id="file_name" placeholder="Enter filename">
                                                  
                                                </div>

                                              </form>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('label_contact.close_btn')}}</button>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal" id="add_sub">{{trans('label_contact.add_btn')}}</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


  </div>

</div>
                                        <div class="col-md-12"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                       <div class="col-md-6 ">
                                          <div class="text-right "><input type="submit" value="{{trans('label_contact.save_btn')}}" class="btn btn-primary btn-lg"></div>

                                        </div>
</div>
 </div>

</div>

</form>
@endsection

@section('script')
<script type="text/javascript">

  function addYear() {
   var currentYear = new Date().getFullYear();  
   var currentMonth = new Date().getMonth();
var j = 0
   if( currentMonth >=10 ){
    j = 0
   }else{
    j = 1
   }
   //console.log(currentMonth)
    for (var i = j; i <= 1; i++ ) {
        $("#ryear").append(
            
            $("<option></option>")
                .attr("value", currentYear)
                .text(currentYear)
            
        );
        currentYear++;
    }
}

    $(document).ready(function(){

      addYear();
        $("#add-row").click(function(){
            var exist=$( "input[name$='material_id[]']" ).val();
            var substance = $("#material_id option:selected").val();
            var amount = $("#amount").val();
            var old_amount = $("#old_amount").val();
            var datetime = $(".import_date").val();

            if ($('#table_sub tbody').children(':last').attr("id")) {
                  var id = $('#table_sub tbody').children(':last').attr("id");
                  //row_1
                  id = id.substring(4);
                  var new_id = Number(id) + 1;
                  new_id = "row_" + new_id;
              } else {
                  var id = 0;
                  var new_id = Number(id) + 1;
                  new_id = "row_" + new_id;
              }
            var markup = 
                "<tr>"+
                    "<td>"+
                        "<input type='hidden' id=material'"+new_id+"' name='material_id[]' value='"+substance+"'>"+$('#material_id option:selected').text()+
                    "<td>"+
                        "<input type='hidden' id=amt'"+new_id+"' name='amount[]' value='"+amount+"'>"+amount+
                    "</td>"+
                    "<td>"+
                        "<input type='hidden' name='old_amount[]' value='"+old_amount+"'>"+old_amount+
                    "</td>"+
                   
                        "<td><input type='checkbox' name='record'>"+
                    "</td>"+
                "</tr>";

              if (exist==substance){
                alert('already substance existing');
              }else{
                $("#table_sub tbody").append(markup);
                $('#material_id option:first').prop('selected',true);
                $("#amount").val('');
                $("#old_amount").val('');
                $(".import_date").val('');
               // alert('true');
              }
        });

        $("#delete-row").click(function(){
            $("#table_sub tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
      
        // reference document

        $("#add_sub").click(function(){
           // var file = $("#file_path").files;
            //var filename = $("#file_name").val();
            var idv = $( ".new_file" ).length ? $(".new_file").last().val() : "id_1" ;
            idv = idv.split("_");
            var idl = idv[1] + 1;
            var id = "id_" + idl;
            var markup = 
            "<tr>"+
            "<td>"+
              "<input type='file' name='file_path[]' class='new_file'  id='"+id+"'>" + 
            "</td>"+

            "<td>"+
               "<input type='text' name='file_name[]' >" +  
            "</td>"+

            "<td>"+
              "<input type='checkbox' name='record'>"+
            "</td>"+

            "</tr>";
            $("#table_doc tbody").append(markup);
            
        });

        $("#remove").click(function(){
            $("#table_doc tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });

        // edit modal
        
        $('#edit_form').on('click',function(){
          $('#modal_edit_equota').modal('show');
          $('.modal-title').text('Information Edit Iquota');
          $('#edit_modal').text('Update');
        });


         $("#idiquota").addClass("active");
    });
</script>
@endsection