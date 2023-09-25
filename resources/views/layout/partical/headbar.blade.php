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
        		<li class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="" onclick="">
				&nbsp;<img style="max-width: 20px; bottom:1px" src="{{asset('front/img/home.png')}}">&nbsp;
				
		</a>
	</li>
				<li id="idlogin" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('cust.auth.login')}}" onclick="">
						{{trans('front.import_request')}}
			</a>
	</li>

						<li id="" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="http://www.moe.gov.kh/" onclick="">
						 {{trans('front.moe_menu')}}
			</a>
	</li>

						<li id="" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="http://epa.moe.gov.kh/" onclick="">
						 {{trans('front.epa_menu')}}
			</a>
		</li>
	
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
			<li class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="" onclick="">
				&nbsp;<img style="max-width: 20px; bottom:1px" src="{{asset('front/img/home.png')}}">&nbsp;
			
			</a>
		</li>
			<li id="idlogin" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="{{route('cust.auth.login')}}" onclick="">
						{{trans('front.import_request')}}
			</a>
		</li>

						<li id="" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="http://www.moe.gov.kh/" onclick="">
						 {{trans('front.moe_menu')}}
			</a>
		</li>

						<li id="" class="padding-li content_title_sm animate fadeInLeft main_menu animated"><a href="http://epa.moe.gov.kh/" onclick="">
						 {{trans('front.epa_menu')}}
			</a>
		</li>
		</ul>
	</div>
</div>