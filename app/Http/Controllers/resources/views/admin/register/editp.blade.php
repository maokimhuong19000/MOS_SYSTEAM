@extends('layout.master')

@section('content')

         {{ Breadcrumbs::render('registereditp',$Customers) }}

      
          <form action="{{route('register.updatep',$Customers->id)}}" method="post" id="frm_create_user">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{ method_field('PATCH')}}
            <div class="row" >
              <div class="col-md-12">
                
                <div class="card">
                  <div class="card-header card-header-danger card-header-icon ">
                    <div class="card-icon">
                      <i class="material-icons">view_quilt</i>
                    </div>
                    <h4 class="card-title">{{trans('reg_update.navbar')}}</h4>
                  </div>
                  <div class="card-body ">

                    <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                  @endforeach
                </div>

                      
                       
                       <div class="row">
                        <div class="col-md-6">
                          
                          <div class="form-group {{ $errors->has('user_name') ? 'has-danger' : ''}}">
                            <label>{{trans('label.createuser')}}</label>
                            <input type="text" class="form-control" name="user_name" value="{{$Customers->user_name}}" id="user_name">
                            {!! $errors->first('user_name', '<p class="help-block">:message</p>') !!}
                          </div>
                        </div>
                        <div class="col-md-6">
                          
                          <div class="form-group {{ $errors->has('password') ? 'has-danger' : ''}}"  id="passpanel">
                            <label>{{trans('password.createuser')}}</label>
                            <input type="text" class="form-control" name="password" value="" id="pass">
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                          </div>
                        </div>
                        <div style="margin-left: 15px;">
                        
                        </div>
                        
                      </div>

                     <div class="row">
                        <div class="col-md-6">
                         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        </div>
                        <div class="col-md-6" style="display: none">
                          <input type="button" value="{{trans('buttonsave.genpass')}}" class="genpass btn btn-info">
                        </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                          <input type="submit" value="{{trans('buttonsave.productimport')}}" class="btn btn-primary">
                          
                          <a href="{{route('register.index')}}"><input type="button" value="{{trans('buttoncancel.productimport')}}" class="btn btn-default"></a>
                        </div>
                        </div>
                        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                        </div>


              <div class="row" id="printdata" style="font-size:16pt;  height: 100%; display: none;"  >
                          
                          <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                            
                          <div class="col-md-4">
                              <div class="col-md-2">&nbsp;</div>
                              <div class="col-md-10"><img  src="{{asset('admin/img/bb.jpg')}}"​ width="140pt" /></div>
                          </div>
                          
                          <div class="col-md-4" style="text-align: center;color:#6DAB3C;font-weight: 800;font-family: 'moul' !important;">
                              <span style="font-family: 'moul' !important; font-size:20pt;line-height: 30pt">ព្រះរាជាណាចក្រកម្ពុជា</span>
                              <br/><span style="font-family: 'moul' !important; font-size:17pt;line-height: 28pt">ជាតិ សាសនា ព្រះមហាក្សត្រ</span>
                              <br/><span style="font-family: 'moul' !important; font-size:20pt;line-height: 30pt"></span>
                           </div>
                           <div class="col-md-4">&nbsp;</div>
                        
                            <div class="col-md-12"  style="color:#6DAB3C">
                              <div class="col-md-12"  style="color:#6DAB3C ;font-family: 'moul', Roboto;">
                              <span style="font-family: 'moul' !important;font-size:16pt;line-height: 22pt"> អគ្គនាយកដ្ឋានគាំពារបរិស្ថាន<span></div>
                            </div>
                         
                              <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                              <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

                         
                         <div class="col-md-12 bodyscc" style=" height: 80%; font-size:15pt;font-family: 'Siemreap', Roboto;" >
                            
                            <div class="col-md-3">                            
                              <label style="font-size:15pt;font-family: 'Siemreap', Roboto;">ឈ្មោះក្រុមហ៊ុន:</label>
                            </div>
                            <div class="col-md-9">                              
                              <div id="cname"></div>
                            </div>

                             <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

                            <div class="col-md-3">
                              <label style="font-size:15pt;font-family: 'Siemreap', Roboto;">ឈ្មោះអ្នកប្រើប្រាស់:</label>
                            </div>
                            <div class="col-md-9">
                              <div id="cuser_name"></div>
                             </div>

                             <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

                            <div class="col-md-3">
                              <label style="font-size:15pt;font-family: 'Siemreap', Roboto;">លេខកូដសំងាត់:</label>
                            </div>
                            <div class="col-md-9">
                              <div id="cpass"></div>
                            </div>
                             <div class="col-md-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

                            <div class="col-md-3">
                              <label style="font-size:15pt;font-family: 'Siemreap', Roboto;">អាសយ័ដ្ឋានប្រើប្រាស់:</label>
                            </div>
                            <div class="col-md-9">
                              <div id="curl"> {{route('cust.auth.login')}}</div>
                            </div>

                          </div>
                            <div class=" col-md-12 footers" style="border-top: 1px solid #6DAB3C;font-size: 12pt;color:#6DAB3C;margin-top: 5px ">
                              
                              <div class="col-md-9">អគារមរតកតេជោ ដីឡូលេខ៥០៣ផ្លូវកៅស៊ូអមមាត់ទន្លេបាសាក់ សង្កាត់ទន្លេ បាសាក់ ខណ្ឌចំការមន រាជធានីភ្នំពេញ</div>
                              <div class="col-md-3">Tel:  (+855) 23 213 908/ </div>
                            </div>


                      </div>


                  </div>
                </div>
            </div>
          </form>

@endsection

@section('script')
<script src="{{asset('admin/js/jQuery.print.js')}}" type="text/javascript"></script> 
<script type="text/javascript">

var myCallBack = function() {  $( "#frm_create_user" ).submit(); $("#printdata").hide();   }; 

function generatePassword() {
      var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
   
    $("#passpanel").show();
    return retVal;
}

  $(document).ready(function() {

      $(".genpass").on( "click", function() {
       var pass = generatePassword();
       $("#pass").val(pass);
      });

      $(".savep").on( "click", function() {


          $("#printdata").show();
          $("#cname").html($("#company_name").val());
          $("#cuser_name").html($("#user_name").val());
          $("#cpass").html($("#pass").val());
          

          $("#printdata").print({
          globalStyles: true,
          mediaPrint: false,
          stylesheet: '{{asset('admin/css/print.css')}}',
          noPrintSelector: ".no-print",
          iframe: true,
          append: null,
          prepend: null,
          manuallyCopyFormValues: true,
          deferred: $.Deferred().done(myCallBack),
          timeout: 750,
          title: null,
          doctype: '<!doctype html>'
          });
      });

     


  });
  </script>
@endsection
