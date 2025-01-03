@extends('frontend.layout')
@section('title', 'Packages')

@section('content')
    {{-- @if (Session::has('package'))
<script type="text/javascript">
    swal("Error!", "Please Purchase Package to view customer details", "error");
</script>
@endif --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    {{-- getting full url when package is not purchase --}}
    {{-- {{ dd(Session::get('link')) }} --}}
    <section class="d-flex justify-content-center packagesBanner">



        <div class="container">
            <div class="row d-flex justify-content-center align-items-center" onclick="openDiv()">
                <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                    <div class="contactBannerDiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                        <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                                Exlpore Packages</span>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="pkgSection">
        <div class="container">
            <div class="row">
                @foreach ($packages as $value)
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center cardCol">

                        <label class="w-100">
                            <input type="text" name="package"hidden>
                            <div class="card Package-card p-card" onclick="get_package('{{ $value->id }}')">
                                <div class="cstm-card-background">
                                    <img src="{{ asset('images/' . $value->image) }}" alt="">
                                </div>

                                <div class="pakagesInner wow animated fadeInLeft p-card" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <div class="pakagesInner">
                                        <div class="divMon">
                                            <h4>{{ $value->title ?? '' }}</h4>
                                            @if ($value->id != 7)
                                                <span>${{ $value->price ?? '' }}</span>
                                            @endif
                                            <p>{!! $value->description ?? '' !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                @endforeach

                <div class="col-lg-12 mb-3 mt-4 text-center" id="showBtn">
                    {{-- <a href="javascript:void(0)" id="payment_redirect"><button type="button" class="Btn wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Payment</button></a> --}}
                </div>
            </div>
        </div>
    </section>
    <!--  -->




@endsection
@push('scripts')
    <script>
        function get_package(id) {
            if (id == 7) {

                $.ajax({
                    type: "GET",
                    url: "{{ route('usersignup-package') }}",
                    data: {
                        "id": id
                    },
                    beforeSend: function() {
                        $("#preloader").css('display', 'block');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            console.log(response.status);
                            window.location.href = "{{ route('signup') }}";
                            // setTimeout(() => {
                            //     window.location.href = "{{ env('APP_URL') }}login?msg=true";
                            // }, 500);

                            // var currentUrl = window.location.href;
                            // var subscriptionRoute = "{{ route('packages') }}";

                            // if (currentUrl != subscriptionRoute) {
                            //     swal({
                            //         title: "Signup!",
                            //         text: response.message,
                            //         type: "success",
                            //         icon: "success",
                            //     }).then(function() {
                            //         window.location.href = "{{ route('login') }}";
                            //     });
                            // } else {
                            //     window.location.href = "{{ route('login') }}";
                            // }


                        }


                    }
                });
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{ route('usersignup-package') }}",
                    data: {
                        "id": id
                    },
                    beforeSend: function() {
                        $("#preloader").css('display', 'block');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            console.log(response.status);
                            window.location.href = "{{ route('signup') }}";
                            // toastr.success('Package (' + response.title + ' ' + response.price +
                            //     ') has been selected, successfully!');
                            // $("#preloader").css('display', 'none');
                            // $("#payment_redirect").attr("href", "{{ route('signuppaypal-amount-update') }}");
                            // .then(function() {
                            //     window.location.href = "{{ route('signuppaypal-amount-update') }}";
                            // });

                        }


                    }
                });

            }
        }
    </script>
@endpush
