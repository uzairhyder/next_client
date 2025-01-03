@extends('frontend.layout')
@section('title','How It Works')

@section('content')

<!--Banner  -->
<section class="d-flex justify-content-center contactBanner signDiv" style="background:url({{asset('front_assets/images/1x/conBanner.png')}})">

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                <div class="contactBannerDiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                    <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                            {{ $terms->title ?? '' }}</span>


                    </h1>
                </div>
            </div>
            <div class="col-lg-12">
                <p class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">{!! $terms->description ?? '' !!}</p>

            </div>
        </div>
    </div>
</section>
<!--  -->

@endsection
