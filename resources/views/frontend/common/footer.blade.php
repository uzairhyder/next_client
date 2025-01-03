 @php
 $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
 @endphp

 <section class="footer mt-4">
     <div class="container pt-5 pb-5">
         <div class="row d-flex justify-content-around">
             <div class="col-lg-3 col-md-12 col-sm-12 search">
                 <div class="footer-img">
                     <a href="{{ route('home') }}"><img src="{{url('public/logos/'.$logo->image)}}" alt=""></a>

                 </div>
             </div>
             <div class="col-lg-3 col-md-12 col-sm-12 ">
                 <p>Pages</p>
                 <ul class="p-0">
                     <li><a href="{{ route('home') }}">Home</a></li>
                     <li><a href="{{ route('customer-search') }}">Search Our Database</a></li>
                     @if(Auth::check() && Auth::id())
                        <li><a href="{{ route('review') }}">Review</a></li>
                     @endif
                    @if(!Auth::check())
                        <li><a href="{{ route('login') }}">Member Login</a></li>
                    @endif
                     <li><a href="{{ route('faq') }}">FAQ’s</a></li>
                     <li><a href="{{ route('how-it-works') }}">How It works</a></li>
                     <li><a href="{{ route('terms.and.conditions') }}">Term & Condition</a></li>
                 </ul>
             </div>
             <div class="col-lg-3 col-md-12 col-sm-12">
                 <p>Social Links</p>
                 <div class="d-flex footer-icon">
                     <div>
                         <span><a href="{{ $social->instagram ?? ''}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></span>

                     </div>
                     <div>
                         <span><a href="{{ $social->twitter ?? '' }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></span>

                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-12 col-sm-12 footerCont">
                 <p>Contact Us</p>
                 <ul class="p-0">
                     <li class="footer-ancher"><i class="fa-solid fa-phone p"></i><a href="tel:{{ $config->contact ?? '' }}">{{$config->contact ?? '' }}</a></li>


                     <li><i class="fa-solid fa-envelope"></i><a href="mailto:{{$config->email ?? '' }}">{{$config->email ?? '' }}</a></li>


                     <li><i class="fa-solid fa-location-dot"></i><a href="{{$config->map_link ?? '' }}" target="_blank"> {{$config->address ?? '' }}.</a></li>

                 </ul>
             </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 text-center ">
                     <span class="for-theme-link pt-1">
                        {{$config->copy_right ?? '' }} <?php echo date("Y"); ?> Designed &amp; Developed by
                         <a href="https://conceptionmasters.com/" target="_blank">
                             Conception Masters
                         </a>
                     </span>
                 </div>
             </div>
         </div>
     </div>
 </section>
