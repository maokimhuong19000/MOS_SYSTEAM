@extends('layout.front')
@section('content')
@include('layout.partical.headuser')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- ======= Hero Section ======= -->
        <div class="container">
  
          <div class="col-sm-12 col-xs-12 padding_bottom padding-top-lg-extra bg_child ">
          <div class="padding-top-xs">
            <div class="content_bottom_font padding-sm text-center"><b>សារធាតុ/Substance</b></div>
        </div>  
          <section id="hero" class="hero">
                      <div class="icon-boxes position-relative">
                        <div class="container position-relative">
                          <div class="row gy-4 mt-6">
                            <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                              <div class="icon-box">
                                <div class="icon">

                                <i class="fa-solid fa-file-import fa-bounce fa-2xl" style="color: #ffffff;"></i>

                                </div>
                                <h4 class="title"><a href="{{route('front.isubstance')}}">នាំចូលសារធាតុ</br>Import Substance</a></h4>
                              </div>
                            </div><!--End Icon Box -->
                            <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                              <div class="icon-box">
                                <div class="icon"> 

                                <i class="fa-solid fa-file-import fa-rotate-270 fa-2xl" style="color: #ffffff;"></i>
                                
                              </div>
                                <h4 class="title"><a href="{{route('front.exsubstance')}}">នាំចេញសារធាតុ</br>Export Substance</a></h4>
                              </div>
                            </div><!--End Icon Box -->
                          </div>
                        </div>
                      </div>
                    </section>
</div>
</div>

        @endsection
