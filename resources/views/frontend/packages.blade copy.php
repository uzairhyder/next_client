@extends('frontend.layout')
@section('title','Packages')

@section('content')
{{-- @if (Session::has('package'))
<script type="text/javascript">
    swal("Error!", "Please Purchase Package to view customer details", "error");
</script>
@endif --}}

<!--Banner  -->

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
                            Packages</span>
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

                <label for="p1{{ $value->id }}" class="w-100">
                    <input type="radio" name="package" id="p1{{ $value->id }}" hidden>
                    <div class="card Package-card p-card" onclick="purchasepackage('{{ $value->id }}')">

                        <div class="pakagesInner wow animated fadeInLeft p-card" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="pakagesInner">
                                <div class="divMon">
                                    <h4>{{$value->title ?? ''}}</h4>
                                    <span>${{ $value->price ?? '' }}</span>
                                    <p>{!! $value->description ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            @endforeach

            <div class="col-lg-12 mb-3 mt-4 text-center" id="showBtn">
                <a href="javascript:void(0)"><button type="button" class="Btn wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Payment</button></a>
            </div>
        </div>
    </div>
</section>
<!--  -->

<script>
    function purchasepackage(id) {
        $.ajax({
            url: "{{ route('purchase-package') }}",
            type: "GET",
            data: {
                id: id
            },
            beforeSend: function() {
                $("#preloader").css('display', 'block');
            },
            success: function(response) {
                $("#preloader").css('display', 'none');
                if (response.status == 200) {
                    swal({
                        title: "Package!",
                        text: response.message,
                        type: "success",
                        icon: "success",

                    }).then(function() {
                        window.location.href = "{{ route('customer-search')}}";
                    });
                } else {
                    swal({
                        title: "Authentication!",
                        text: 'Please login before purchase package !',
                        type: "error",
                        icon: "error",
                    }).then(function() {
                        window.location.href = "{{ route('login')}}";
                    });

                }
                if ('{{ Auth::check() && Auth::user()->role == 1}}') {
                    swal({
                        title: "Admin!",
                        text: 'You are logged in as admin please logout first !',
                        type: "error",
                        icon: "error",

                    }).then(function() {});
                }

            }

        });
    }
</script>

@endsection