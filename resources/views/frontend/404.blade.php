 @php
    $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
    $config = App\Models\BackendModels\Configuration::first();
    $social = App\Models\BackendModels\Social::first();
 @endphp
@section('title','404')

@include('frontend.common.head')


<body>

    @include('frontend.common.navbar')
        <section class="d-flex justify-content-center align-items-center contactBanner signDiv" style="background:url({{asset('front_assets/images/1x/conBanner.png')}})">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                        <div class="contactBannerDiv">
                            <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                                    404</span>
                            </h1>
                        </div>
                    </div>
                    <div id="userlogin" class="signForm ">
                        <div class="col-md-8 offset-md-2">
                            <p class="sub-content">The page you are attempting to reach is currently not available. This may be because the page does not exist or has been moved.</p>
                        </div>

                        @if(!Auth::check() || Auth::check() && Auth::user()->role  != 1)
                        <div class="point d-flex justify-content-center mt-5">
                            <a href="{{ route('home') }}">
                                <button type="button" class="Btn">BACK TO HOME PAGE</button></a>
                        </div>
                        @endif

                        @if(Auth::check() && Auth::user()->role == 1)
                        <div class="point d-flex justify-content-center mt-5">
                            <a href="{{ route('admin-home') }}">
                                <button type="button" class="Btn">BACK TO DASHBOARD</button></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @include('frontend.common.footer')
    </html>
</body>




