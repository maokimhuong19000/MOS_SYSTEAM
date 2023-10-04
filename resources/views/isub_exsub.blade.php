@extends('layout.front')
@section('content')
@include('layout.partical.headuser')
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero">
          <div class="icon-boxes position-relative">
            <div class="container position-relative">
              <div class="row gy-4 mt-6">
                <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon"><i class="fa-solid fa-file-import" style="color: #ffffff;"></i></div>
                    <h4 class="title"><a href="{{route('front.isubstance')}}">នាំចូលសារធាតុ</br>Import Substance</a></h4>
                  </div>
                </div><!--End Icon Box -->
                <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <div class="icon"><i class="fa-solid fa-file-arrow-up" style="color: #ffffff;"></i></div>
                    <h4 class="title"><a href="{{route('front.exsubstance')}}">នាំចេញសារធាតុ</br>Export Substance</a></h4>
                  </div>
                </div><!--End Icon Box -->
              </div>
            </div>
          </div>
        </section>

        @endsection