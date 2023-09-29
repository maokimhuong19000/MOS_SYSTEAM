<div class="container visible-xs">
	<div class="header col-sm-12 col-xs-12 padding-sm">
		<div class="col-sm-4 col-xs-3">
			
		</div>
		<div class="col-sm-4 col-xs-6 logo_evisa" style="line-height: 228px;">
			<a href="">
			<img class="images-full" src="{{asset('front/img/bb.jpg')}}"></a>
		</div>
		<div class="col-sm-4 col-xs-3">
			
		</div>

	</div>
	
	<nav id="menu" class="navbar bg_parent color_white col-xs-12">
    <div class="navbar-header">
    	<div class="pull-left category"><span id="category">&nbsp;&nbsp;Menu</span></div>
       <button class="btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
       	<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
      </button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav category_list">

				<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.front')}}" onclick="">
				&nbsp;<img style="max-width: 20px; bottom:1px" src="{{asset('front/img/home.png')}}">&nbsp;		
			</a></li>
			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a  href="{{route('front.profile')}}" onclick="">
						 {!! html_entity_decode(trans('front.company_menu')) !!}
			</a></li>


			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.contact')}}" onclick="">
						 {{trans('front.rep_menu')}}
			</a></li>




 <?php if(@$Customer->ctype==0) {  ?>
			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.isubstance')}}" onclick="">
						 {{trans('front.isub_menu')}}
			</a></li>

			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.equitment')}}" onclick="">
						{{trans('front.imaterial_menu')}}
			</a></li>
			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.iquota')}}" onclick="">
						 {{trans('front.iquota_menu')}}
			</a></li>
<?php  }elseif (@$Customer->ctype==1){ ?>
			
			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a hre f="{{route('front.isubstance')}}" onclick="">
						 {{trans('front.isub_menu')}}
			</a></li>
			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.iquota')}}" onclick="">
						 {{trans('front.iquota_menu')}}
			</a></li>
 <?php }else{  ?>

			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.equitment')}}" onclick="">
						 {{trans('front.imaterial_menu')}}
			</a></li>
 <?php }  ?>
			<li  class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.idata')}}" onclick="">
						{{trans('front.idata_menu')}}
			</a></li>

			<li class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('cust.auth.logout')}}" onclick="">
						{{trans('front.password_menu')}}
			</a></li>

			<li class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('cust.auth.logout')}}" onclick="">
						{{trans('front.logout_menu')}}
			</a></li>
	
		    </ul>
      
    </div>
  </nav>
</div> 
<div class="container hidden-xs">
	
	
	<div class="header col-sm-12 col-xs-12 nopadding ">
			<img class="images-full" src="{{asset('front/img/aa.jpg')}}">

	</div>


	<div class="bg_parent">
		<ul class="menu ">
			<li id="idhome" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.front')}}" onclick="">
				&nbsp;<img style="max-width: 20px; bottom:1px" src="{{asset('front/img/home.png')}}">&nbsp;		
			</a></li>
			<li id="idprofile" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.profile')}}" onclick="">
						 {!! trans('front.company_menu') !!}
			</a></li>


			<li id="idcontact" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.contact')}}" onclick="">
						 {{trans('front.rep_menu')}}
			</a></li>


 <?php if(@$Customer->ctype==0) {  ?>

 			<li id="idiquota" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.iquota')}}" onclick="">
						 {{trans('front.iquota_menu')}}
			</a></li>
			<li id="idisubstance" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.isubstance')}}" onclick="">
						 Subtance
			</a></li>
			<!-- <li id="idisubstance" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.exsubstance')}}" onclick="">
						 exportsubstance
			</a></li> -->

			<li id="idimaterial" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.equitment')}}" onclick="">
						{{trans('front.imaterial_menu')}}
			</a></li>
			
			
<?php  }elseif (@$Customer->ctype==1){ ?>
				
						<li id="idiquota" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.iquota')}}" onclick="">
						 {{trans('front.iquota_menu')}}
			</a></li>
			<li id="idisubstance" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.isubstance')}}" onclick="">
						 {{trans('front.isub_menu')}}
			</a></li>
			

 <?php }else{  ?>

			<li id="idimaterial" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.equitment')}}" onclick="">
						 {{trans('front.imaterial_menu')}}
			</a></li>
 <?php }  ?>
			<li id="ididata" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.idata')}}" onclick="">
					{{trans('front.idata_menu')}}
			</a></li>

			<li id="cpwd" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('front.pwd')}}" onclick="">
						{{trans('front.password_menu')}}
			</a></li>

			<li class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('cust.auth.logout')}}" onclick="">
						{{trans('front.logout_menu')}}
			</a></li>
	
		</ul>
	</div>
</div>