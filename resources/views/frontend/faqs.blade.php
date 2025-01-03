 @extends('frontend.layout')
 @section('title','FAQ')

 @section('content')

 <!--Banner  -->
 <section class="d-flex justify-content-center align-items-center contactBanner faqsDiv" >

     <div class="container mt-5">
         <div class="row d-flex justify-content-center align-items-center">
             <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                 <div class="contactBannerDiv">
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                     <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                             FAQ’s</span>
                     </h1>
                 </div>
             </div>
             <div class="col-lg-10 mx-auto col-sm-12 col-md-12">
                 <div class="accordion" id="accordionExample">

                     <div class="mt-5 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingOne">
                                 <button class="accordion-button " type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     {{ $firstOrder->questions }}
                                 </button>
                             </h2>
                             <div id="collapseTwo" class="accordion-collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>{!! $firstOrder->answer ?? '' !!}</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-10 mx-auto col-sm-12 col-md-12">
                  @foreach ($faqs as $faq )
                 <div class="accordion" id="accordionExample">
                     <div class="mt-3  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingOne{{$faq->id }}">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$faq->id }}" aria-expanded="true" aria-controls="collapseOne">
                                    {{$faq->questions ?? ''}}
                                 </button>
                             </h2>
                             <div id="collapseOne{{$faq->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>{!! $faq->answer ?? '' !!}</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- <div class="mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingTwo">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed ?
                                 </button>
                             </h2>
                             <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                         nibh
                                         euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                         enim ad
                                         minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                         ut
                                         aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                                         hendrerit in
                                         vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                         facilisis
                                         at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                         luptatum zzril
                                         delenit augue duis dolore te feugait nulla facilisi.
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingThree">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed ?
                                 </button>
                             </h2>
                             <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                         nibh
                                         euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                         enim ad
                                         minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                         ut
                                         aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                                         hendrerit in
                                         vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                         facilisis
                                         at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                         luptatum zzril
                                         delenit augue duis dolore te feugait nulla facilisi.
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingFour">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                     Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed ?
                                 </button>
                             </h2>
                             <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                         nibh
                                         euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                         enim ad
                                         minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                         ut
                                         aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                                         hendrerit in
                                         vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                         facilisis
                                         at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                         luptatum zzril
                                         delenit augue duis dolore te feugait nulla facilisi.
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingFive">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                     Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed ?
                                 </button>
                             </h2>
                             <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                         nibh
                                         euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                         enim ad
                                         minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                         ut
                                         aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                                         hendrerit in
                                         vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                         facilisis
                                         at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                         luptatum zzril
                                         delenit augue duis dolore te feugait nulla facilisi.
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingSix">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                     Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed ?
                                 </button>
                             </h2>
                             <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                         nibh
                                         euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                         enim ad
                                         minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                         ut
                                         aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in
                                         hendrerit in
                                         vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                         facilisis
                                         at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                         luptatum zzril
                                         delenit augue duis dolore te feugait nulla facilisi.
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div> --}}
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
 @endsection
