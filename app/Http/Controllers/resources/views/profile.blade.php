@extends('layout.front')
@section('content')
@include('layout.partical.headuser')



<div class="container">
	<div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">

	 	<center>

        <div class="padding-top-xs">
            <div class="content_bottom_font padding-sm"><b>{!! trans('front_contact.company_profile')!!}</b></div>
        </div>          
    </center>
<div class="col-sm-12 " > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
<div class="col-md-12 ">

<div class="panel panel-moe">
  
    <div class="panel-body">


      <div class="col-sm-12">
        <div class="col-md-4 form-group">
          {{trans('label_contact.com_code')}}<br/>
         <input type="text" class="form-control" readonly value="{{$Customer->idcard}}"> 
        </div>

        <div class="col-md-4 form-group">
            
          {{trans('label_contact.com_type')}}<br/>
         <input type="text" class="form-control" readonly value="{{\App\Helpers\AppHelper::instance()->company_type($Customer->ctype)}}"> 
        </div>
        <div class="col-md-4 form-group">
            
          {{trans('label_contact.user_acc')}}<br/>
         <input type="text" class="form-control" readonly value="{{$Customer->user_name}}"> 
        </div>
      </div>
    <!-- col1 -->
      <div class="col-sm-12">
        <div class="col-md-4 form-group">
          {{trans('label_contact.com_name')}}<br/>
         <input type="text" class="form-control" readonly value="{{$Customer->company_name}}"> 
        </div>

        <div class="col-md-4 form-group">
           
          {{trans('label_contact.idcard')}}<br/>
          @if ($Customer->id_card)
          <a href="{{asset($Customer->id_card)}}" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
          @else
            <label>No File</label>
          @endif
        </div>
      </div>

      <!-- end col1 -->

      <div class="col-sm-12" >
         	  <div class="col-md-4 form-group">
              {!!trans('label_contact.certificate_add_tax')!!}<br/>
              <input type="text" class="form-control" readonly value="{{$Customer->tin ?$Customer->tin: '---------------------------'}}">                                      
              
            </div>

            <div class="col-md-4 form-group">
              <?php
                  

                  $tin_date = \App\Helpers\AppHelper::instance()->format_date_ind($Customer->tin_date);

              ?>
             {!!trans('label_contact.certificate_tin')!!}<br/>
             @if ($Customer->tin_path)
            <a href="{{asset($Customer->tin_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
            @else
               <label>No File</label>
            @endif
            </div>

             <div class="col-md-4 form-group">
             {{trans('label_contact.date_certificate_vat')}}<br/>                                 
               ថ្ងៃ&nbsp;{{$tin_date["d"]}}&nbsp;&nbsp;ខែ&nbsp;{{$tin_date["m"]}}&nbsp;&nbsp;ឆ្នាំ&nbsp;{{$tin_date["y"]}}
            </div>
      </div>

       <div class="col-sm-12">
            <div class="col-md-4 form-group">
              {!!trans('label_contact.certificate_identity_business_owner')!!}<br/>
              <input type="text" class="form-control" readonly value="{{$Customer->company_id?$Customer->company_id: '---------------------------'}}">
               
            </div>  
        <div class="col-md-4 form-group">
            <?php
            
              $tin_date = \App\Helpers\AppHelper::instance()->format_date_ind($Customer->company_id_date);  
             
            ?>
         {!!trans('label_contact.add_another_certificate_ministry')!!}<br/>
         @if ($Customer->id_path)
          <a href="{{asset($Customer->id_path)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
          @else
               <label>No File</label>
          @endif
        </div>

        <div class="col-md-4 form-group">
          {{trans('label_contact.date_certificate_vat')}}<br/>
         
          ថ្ងៃ&nbsp;{{$tin_date["d"]}}&nbsp;&nbsp;ខែ&nbsp;{{$tin_date["m"]}}&nbsp;&nbsp;ឆ្នាំ&nbsp;{{$tin_date["y"]}}
        </div>
        </div>


        <div class="col-sm-12">
            <div class="col-md-4 form-group">
              {!!trans('label_contact.patent')!!}<br/>
              <input type="text" class="form-control" readonly value="{{$Customer->patent_number?$Customer->patent_number: '---------------------------'}}">
               
            </div>  
        <div class="col-md-4 form-group">

         {!!trans('label_contact.patent_file')!!}<br/>
         @if ( $Customer->patent)
          <a href="{{asset($Customer->patent)}}" target="_blank"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
          @else
              <label>No File</label>
          @endif 
        </div>

        <div class="col-md-4 form-group">

          <?php 
          $tin_date =\App\Helpers\AppHelper::instance()->format_date_ind($Customer->patent_date);
          ?>
          {{trans('label_contact.date_certificate_vat')}}<br/>
         
          ថ្ងៃ&nbsp;{{$tin_date["d"]}}&nbsp;&nbsp;ខែ&nbsp;{{$tin_date["m"]}}&nbsp;&nbsp;ឆ្នាំ&nbsp;{{$tin_date["y"]}}
        </div>
        </div>

  </div></div>

<div class="panel panel-moe">
    <div class="panel-heading"><span class="content_bottom_font_sm">{{trans('label_contact.company_address')}}</span></div>
    <div class="panel-body">


        <div class="col-sm-12">
          <div class="col-md-4 form-group">
            {{trans('label.numHome')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->house? $Customer->house:'---------------------------'}}">
            
          </div>
          <div class="col-md-4 form-group">
            {{trans('label.NumberRoad')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->street ? $Customer->street:'---------------------------'}}">
            
            
          </div>
          <div class="col-md-4 form-group">
            {{trans('label.village')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->village ? $Customer->village:'---------------------------'}}">
            
            </div>
        </div>


        <div class="col-sm-12">
          <div class="col-md-4 form-group">
          {{trans('label.CummuneSongkat')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->commune ? $Customer->commune:'---------------------------'}}">
            
          </div>
          <div class="col-md-4 form-group">
            {{trans('label.District')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->district? $Customer->district:'---------------------------'}}">
          </div>
          <div class="col-md-4 form-group">
          {{trans('label.province')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->city ? $Customer->city:'---------------------------'}}">
          </div>
        </div>

        <div class="col-sm-12">
          <div class="col-md-4 form-group">
          {{trans('label.phone')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->tel? $Customer->tel:'---------------------------'}}">
          </div>
          <div class="col-md-4 form-group">
          {{trans('label.fax')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->fax ? $Customer->fax:'---------------------------'}}">
          </div>
          <div class="col-md-4 form-group">
          {{trans('label.email')}}<br/>
            <input type="text" class="form-control" readonly value="{{$Customer->email?$Customer->email:'---------------------------'}}">
          </div>
        </div>

  </div></div>        
         <div class="col-sm-12" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>


        <div class="col-md-6"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="col-md-6">
          <div class="form-group text-right">
            <a href="{{route('front.eprofile')}}"><input type="button" value="{{trans('label_contact.edit_btn')}}" class="btn btn-primary btn-lg"></a>
          </div>
        </div>
       
    </div>

  </div>
</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#idprofile").addClass("active");
        //alert($("#idprofile").text());
    });
</script>
@endsection