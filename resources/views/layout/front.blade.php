<!DOCTYPE html>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ministry of Enviroment (Official Government Website)</title>
       <link rel="icon" href="{{asset('front/img/logo.png')}}">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- boostrap -->
  <link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Siemreap" rel="stylesheet">
   		
   		  <link rel="stylesheet" type="text/css" href="{{asset('front/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/reset.css')}}">
        
        <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
        <!-- style -->
        
        <link rel="stylesheet" type="text/css" href="{{asset('front/home.css')}}">
        
        <!-- Home Page -->
        
        <!-- framework style -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/frameworkstyle.css')}}">
        
        <!-- slide show -->
        <link rel="stylesheet" href="{{asset('front/nexus.css')}}">
        <link rel="stylesheet" href="{{asset('front/responsive.css')}}">

         <!-- animate-->
        <link rel="stylesheet" type="text/css" href="{{asset('front/animate.css')}}">
        <!-- Button -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/button.css')}}">
        <!-- <link rel="stylesheet" type="text/css" href="assets/frontend/common/header.css"> -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/common.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/bootstrap-datepicker3.css')}}">

         <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
         <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">


        <script src="{{asset('front/jquery-1.9.1.min.js')}}" type="text/javascript"></script> 
        <link rel="stylesheet" href="{{asset('front/jquery-confirm.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/jquery-confirm.css')}}">
        <script src="{{asset('front/jquery-confirm.min.js')}}"></script>
        <script src="{{asset('front/jquery-confirm.js')}}"></script>

        <!-- style link datetimepicker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="{{asset('front/bootstrap-datepicker.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('front/loadingoverlay.min.js')}}" type="text/javascript"></script>
         

      <style>

.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}



      </style>       
        
       

</head>
<body>

      <!-- end header -->
<div id="start_fixed"></div>
        <!-- container -->
        <!-- <a href=""></a> -->
        



 @yield('content')

<script type="text/javascript">
$(document).ready(function() {
        var ratio = 0.58;  // Used for aspect ratio
        var width = $('img.infomation_image').width();    // Current image width
            height = width * ratio; // get ratio for scaling image
       
    $('.infomation_image').css("height", height);
    
});
$( window ).resize(function() {
        var ratio = 0.58;  
        var width = $('img.infomation_image').width(); 
            height = width * ratio; 
        
   $('.infomation_image').css("height", height);
    
});		
</script>
        <!-- end container -->
<div id="end_fixed"></div>
        <!-- footer -->
<div class="container footer">
	<div class="col-sm-12 col-xs-12 bg_parent">
		<div class="col-md-12  col-sm-12 col-xs-12">
			
				<div class="col-sm-12 col-xs-12 border-bottom">

					<div class="padding-lg"></div>

					<div class="col-sm-4 col-xs-12 animate padding-bottom-md fadeInLeft  animated">
						<div>
							<center><i class="fa fa-phone fa-2x contact_icon"></i><span class="contact">Contact Us</span></center>
						</div>
					</div>

          
					<div class="small_content col-sm-4 col-xs-12 animate fadeInLeft animated">
            <div class="col-xs-1"></div>
						<div class="col-md-12  col-sm-12 col-xs-10">
              <div class="small_content white" >អាសយដ្ឋាន:  អគារមរតកតេជោ ដីឡូលេខ៥០៣ ផ្លូវកៅស៊ូអមមាត់ទន្លេបាសាក់ សង្កាត់ទន្លេ បាសាក់ ខណ្ឌចំការមន រាជធានីភ្នំពេញ</div>
           
          </div>
           <div class="col-xs-1"></div>
					</div>

         

         
					<div class="col-sm-4 col-xs-12 animate fadeInRight no_padding_r padding_bottom animated">
            <div class="col-xs-1"></div>
            <div class="col-md-12  col-sm-12 col-xs-10">
						
  							<div class="small_content white col-sm-12" ><div class="col-sm-2">Tel: </div><div class="col-sm-10">(+855) 23 213 908/ (+855) 23 220 369</div></div>
  							<div class="small_content white col-sm-12" ><div class="col-sm-2">Fax:</div><div class="col-sm-10">023 212 540</div></div>
  							<div class="small_content white col-sm-12" ><div class="col-sm-2">Email:</div><div class="col-sm-10">info@moe.gov.kh</div></div>
             
            </div>
           <div class="col-xs-1"></div>					
					</div>

          

				</div>
		

		</div>
	</div>
	
</div>

   


   <!-- bootstrap script -->
   <script src="{{asset('front/bootstrap.min.js')}}"></script>
    <!-- Carousel -->
    <script type="text/javascript" src="{{asset('front/jssor.slider-22.0.3.mini.js')}}"></script>
    <!-- animate -->
    <script type="text/javascript" src="{{asset('front/jquery.visible.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/moment.min.js')}}"></script>

    <script type="text/javascript">


  function handleFileSelect(evt) {
        var files = evt.target.files; // FileList objec  
        for (var i = 0, f; f = files[i]; i++) {     
        // if (f.type.match('image.*')) {
              var reader = new FileReader();         
              reader.onload = (function(theFile) {
                return function(e) {
                
                  var span = document.createElement('span');
                  span.innerHTML = ['<a class="thumb" target="_blank" onclick=click_view("', e.target.result,
                                    '") title="', escape(theFile.name), '"> <span class="glyphicon glyphicon-search" aria-hidden="true"> View </a>'].join('');
                  document.getElementById(evt.target.ouptdiv).innerHTML = "";
                  document.getElementById(evt.target.ouptdiv).insertBefore(span, null);
                };
              })(f);         
              reader.readAsDataURL(f);
          

          }

  }


function click_view( data){ 

        var newTab = window.open();
        newTab.document.body.innerHTML = '<iframe  width="100%" height="100%" src="'+data+'"></iframe>';

}
    
      $(window).on('resize', function(){
        $('.logo_evisa').css({'line-height': 0});
          var height = $('div.header').height();
          $('.logo_evisa').css({'line-height': height+'px'});
      });
      
      $(document).ready(function() {

     
    


          $('.logo_evisa').css({'line-height': 0});
          var height = $('div.header').height();
          $('.logo_evisa').css({'line-height': height+'px'});
   /*     var interval = setInterval(function() {
            var momentNow = moment();
            $('#date-part').html( momentNow.format('ddd')+ ' '
                                + momentNow.format('DD MMM YYYY'));
            $('#time-part').html(momentNow.format('hh:mm:ss A'));
        }, 100); */
    });
    jQuery(function($) {
      function fixDiv() {
        if ($(window).width()>767) {
          if ($(window).scrollTop() > 370 && $(window).scrollTop() < $('#end_fixed').position().top-240){
                    $('#class1').addClass('wrapper');
                    $('#class2').addClass('container');
                    $('#class3').addClass('form');
                    $('#class4').addClass('col-xs-12');
                    $('#fixed').addClass('padding_fixed');
          }else{
                    $('#class1').removeClass('wrapper');
                    $('#class2').removeClass('container');
                    $('#class3').removeClass('form');
                    $('#class4').removeClass('col-xs-12');
                    $('#fixed').removeClass('padding_fixed');
          }
        }
      }
      $(window).scroll(fixDiv);
      fixDiv();
    });

    
       
    
     

    </script>
<script type="text/javascript">
    $('.news_out').show().animate({opacity: 1}, 3000);

</script>
  @yield('script')
</body></html>