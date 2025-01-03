@extends('frontend.layout')
@section('title', 'Search Results')

@section('content')
    <style>
        .rating {
            float: left;
            width: fit-content;
        }

        p#description {
            color: #000 !important;
            font-size: 16px !important;

        }

        .rating label {
            color: #90A0A3;
            float: right;
            font-size: 20px;
            margin-left: 1rem;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating input[type="radio"]:checked~label {
            color: #003d70;
        }

        #blur {
            color: transparent;
            text-shadow: 0 0 8px #000;
        }

        .blur2 {
            color: transparent !important;
            text-shadow: 0 0 8px #000;
        }

        .blur3 {
            color: transparent !important;
            text-shadow: 0 0 8px #000;
        }

        .customer-description {
            color: #4D4D4D !important;
            font-family: "Gilroy-Light" !important;
            margin-left: 153px !important;
        }
        .customer-description h6 {
    color: #003D70;
    font-family: "Gilroy-Light";
    font-size: 18px;
    margin-bottom: 16px;
}
    </style>

    <?php
    Session::put('link', URL::full());
    ?>
    @if (Session::has('search'))
        <script type="text/javascript">
            swal("Search!", "Please enter at least one field to search !", "error");
        </script>
    @endif

    <section class="d-flex justify-content-center  contactBanner cstmdiv ">
        <div class="container mt-5">
            <form action="" class="form">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                        <div class="contactBannerDiv">
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>

                            <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                                    Results</span>
                            </h1>
                            <div class="text-div">
                                {!! $search_data->description ?? '' !!}
                           </div>
                        </div>
                    </div>
                    {{-- <div class="row sectionCstm">
                        <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Customer
                            <span>Search</span>
                        </h4>
                        <form method="post" action="{{ route('search-customers') }}" class="form">
                            @csrf
                            <div class="col-lg-6 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <input type="text" name="first_name" placeholder="First Name" class="inputSearch">
                            </div>
                            <div class="col-lg-6 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <input type="text" name="last_name" placeholder="Last Name" class="inputSearch">
                            </div>
                            <div class="span">
                                <span>
                                    <p>*Only Information matching your search criteria will be displayed.</p>
                                </span>
                                <span>We do not publish address,email or phone numbers</span>
                            </div>
                            <h5 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Address</h5>
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <input type="text" name="address" placeholder="Short answer" class="inputSearch">
                            </div>
                            <div class="col-lg-6 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <input type="tel" id="phone12" name="contact" placeholder="Phone No."
                                    class="inputSearch">
                            </div>
                            <div class="col-lg-6 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <input type="email" name="email" placeholder="Email" class="inputSearch">
                            </div>
                            <div class="col-lg-12 mb-3 mt-4 text-center">
                                <a href="javascript:void(0)"><button type="submit" class="Btn wow animated bounceIn"
                                        data-wow-duration="1s" data-wow-delay="0.5s">Search
                                        Now</button></a>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </form>
        </div>
    </section>
    <!--  -->
    <!-- Matching Results -->
    <section class="matchResult">
        <div class="lineDiv1">

            <img src="{{ asset('front_assets/images/1x/line1.png') }}" alt="">
        </div>
        <div class="container mt-5 pt-5">
            <h1 class="text-center wow animated bounceIn pt-5" data-wow-duration="1s" data-wow-delay="0.5s">Matching<span>
                    Results</span>
            </h1>
            <div class="col-lg-12 mb-3 mt-4 text-center">
                <a href="{{ route('customer-search') }}"><button type="button" class="Btn wow animated bounceIn"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        Reset Search</button></a>
            </div>

            <div class="row mt-5">
                @if(isset($liveSearchdata['persons']) && count($liveSearchdata['persons']) > 0)
                @foreach($liveSearchdata['persons'] as $person)
                        <div class="col-lg-3 col-sm-12 col-md-6 wow animated fadeInLeft d-flex justify-content-around"
                            data-wow-duration="
                                1s" data-wow-delay="0.5s">

                            <button class="toggle" onclick="#">

                                <div class="InnerBox">
                                    <div class="d-flex p-3">
                                    <div>
                                        <h5>{{ $value->name ?? '' }}</h5>
                                        <p>{{ $person['name']['firstName'] }} {{ $person['name']['lastName'] }}</p>

                                        <p class="mt-2"><a
                                                href="tel:{{ $person['phoneNumbers'][0]['phoneNumber'] ??''}}">{{ $person['phoneNumbers'][0]['phoneNumber'] ?? 'no number found'}}</a>
                                        </p>
                                        <p><a href="mailto:{{ $person['emailAddresses'][0]['emailAddress'] ??''}}">{{ $person['emailAddresses'][0]['emailAddress'] ?? 'no email found'}}</a>
                                        </p>
                                        <p class="mt-2"><a href="#">{{ $person['addresses'][0]['fullAddress'] ??'no address found'}}</a>
                                        </p>
                                    </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                @else
                    <h3 style="text-align: center;">There are no matching results related to your search !</h3>
                @endif
            </div>
        </div>
        <div class="lineDiv2">
            <img src="{{ asset('front_assets/images/1x/line2.png') }}" alt="">
        </div>
    </section>
    <div class="container mt-5" id="customerdetail">

    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>

    <script>
        function customerdetails(id) {
            $.ajax({
                url: "{{ route('customer-detail') }}",
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
                        $("#customerdetail").html('');
                        $("#customerdetail").html(`
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="InnerBox1">
                            <div class="d-flex p-3 justify-content-center align-items-center">
                                <div class="circle">
                                    {{-- <div class="circleDivImg">
                                        <img src="{{ asset('front_assets/images/1x/image5.png') }}" alt="" class="circular--square">

                                    </div> --}}
                                </div>
                                <div>
                                    <h6 id="name">${response.customer.name}</h6>
                                    <p>${response.customer.email}</p>
                                   <div class="innerBosStar">
                                    ${response.customer.customer_rating == 5 ?
                                   `<i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>` : `` }
                                    ${response.customer.customer_rating == 4 ?
                                      `<i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star" style="color:black;" ></i>` : `` }
                                       ${response.customer.customer_rating == 3 ?
                                       `<i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                                           <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>` : `` }
                                        ${response.customer.customer_rating == 2 ?
                                       `<i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star"></i>
                                           <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                                           <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                                           <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>` : `` }
                                        ${response.customer.customer_rating == 1 ?
                                        `<i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:black;"></i>` : `` }
                                   </div>
                                    <p>${response.customer.address}</p>
                                    <p>${response.customer.contact}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 mx-auto mt-5 customer-description">
                        <h6>Was the customer easy to work with?</h6>
                        <h6>${response.customer.working_with_customer == 1 ? 'Yes' : 'No'}</h6>
                       <h6>Did the customer pay on time?</h6>
                        <h6>${response.customer.customer_pay_time == 1 ? 'Yes' : 'No'}
                            </h6>
                        <h6>Would you recommend this customer to other businesses?</h6>
                        <h6>${response.customer.customer_recommendation == 1 ? 'Yes' : 'No'}
                        </h6>
                       <p>${response.customer.customer_description}</p>
                    </div>
                </div>
                  `)
                    }
                    if (response.status == 404) {
                        swal({
                            title: "Package !",
                            text: response.message,
                            type: "error",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('packages') }}";
                        });

                    }
                    if (response.status == 306) {
                        swal({
                            title: "Admin !",
                            text: response.message,
                            type: "error",
                            icon: "error",
                        }).then(function() {});
                    }
                    if (response.status == 305) {
                        swal({
                            title: "Authentication !",
                            text: response.message,
                            type: "error",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('login') }}";
                        });

                    }
                    if (response.status == 205) {
                        swal({
                            title: "Points !",
                            text: response.message,
                            type: "error",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('packages') }}";
                        });
                    }

                    if (response.status == 202) {
                        swal({
                            title: "Expire !",
                            text: response.message,
                            type: "error",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('packages') }}";
                        });
                    }
                }

            });
            $("#customerdetail").append('');
        }
    </script>
@endsection
