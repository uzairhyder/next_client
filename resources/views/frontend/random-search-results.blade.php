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
            color: #003D70 !important;
            font-family: "Gilroy-Light" !important;
            margin-left: 123px !important;
        }

        .customer-description p {
            font-size: 18px !important;
            color: #003D70 !important;
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


    <section class="d-flex justify-content-center  contactBanner cstmdiv">
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
                         </h1>

                         <div class="text-div">
                             {!! $search_data->description ?? '' !!}
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

                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <input type="text" name="address" placeholder="Address" class="inputSearch">
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
            {{-- ============== THIS CODE IS FOR OUR DATABASE SEARCH DATA =================== --}}

            <div class="row mt-5">
                <h3 style="text-align: center;">Our Results</h3>
                <br>

                @if (count($customers) > 0)
                    @foreach ($customers as $value)
                        <div class="col-lg-3 col-sm-12 col-md-6 wow animated fadeInLeft d-flex justify-content-around"
                            data-wow-duration="
                                    1s" data-wow-delay="0.5s">
                            <button class="toggle" onclick="customerdetails('{{ $value->id }}')">
                                <div class="InnerBox">
                                    <div class="d-flex p-3">

                                        {{-- <div class="circle">
                                    <div class="circleDivImg">
                                        <img src="{{ asset('front_assets/images/1x/image5.png') }}" alt="" class="circular--square">
                                        </div>
                                    </div> --}}
                                        {{-- @dd($user_SearchHistory_status); --}}

                                        @if ($user_SearchHistory_status == true)
                                            <div>
                                                <h5>{{ $value->name ?? '' }}</h5>
                                                <p>{{ Str::limit($value->address, 19) ?? '' }}</p>

                                                <p class="mt-2"><a
                                                        href="tel:{{ $value->contact ?? '' }}">{{ $value->contact ?? '' }}</a>
                                                </p>
                                                <p><a href="mailto:{{ $value->email ?? '' }}">{{ $value->email ?? '' }}</a>
                                                </p>
                                            </div>
                                            {{-- @elseif ($user_SearchHistory_status == false)
                                        <div>
                                            <h5>{{ $value->name ?? '' }}</h5>
                                            <p>{{ Str::limit($value->address, 19) ?? '' }}</p>

                                            <p class="mt-2"><a
                                                    href="tel:{{ $value->contact ?? '' }}">{{ $value->contact ?? '' }}</a>
                                            </p>
                                            <p><a href="mailto:{{ $value->email ?? '' }}">{{ $value->email ?? '' }}</a>
                                            </p>
                                        </div> --}}
                                        @elseif (Auth::check() && !empty($unlimitedPoints) && $unlimitedPoints == true && $customer_points->end_date > Carbon\Carbon::now())
                                        <div>
                                            <h5>{{ $value->name ?? '' }}</h5>
                                            <p>{{ Str::limit($value->address, 19) ?? '' }}</p>

                                            <p class="mt-2"><a
                                                    href="tel:{{ $value->contact ?? '' }}">{{ $value->contact ?? '' }}</a>
                                            </p>
                                            <p><a
                                                    href="mailto:{{ $value->email ?? '' }}">{{ $value->email ?? '' }}</a>
                                            </p>
                                        </div>

                                        @elseif (Auth::check() && !empty($points) && $points > 0 && $customer_points->end_date > Carbon\Carbon::now())
                                            <div>
                                                <h5>{{ $value->name ?? '' }}</h5>
                                                <p id="blur">****************</p>
                                                <p class="mt-2"><a href="javascript:void(0)"
                                                        class="blur2">****************</a></p>
                                                <p><a href="javascript:void(0)"
                                                        class="blur3">*************************</a>
                                                </p>
                                                {{-- <p>{{ Str::limit($value->address, 19) ?? '' }}</p>
                                                <p class="mt-2"><a
                                                        href="tel:{{ $value->contact ?? '' }}">{{ $value->contact ?? '' }}</a>
                                                </p>
                                                <p><a
                                                        href="mailto:{{ $value->email ?? '' }}">{{ $value->email ?? '' }}</a>
                                                </p> --}}
                                            </div>
                                        @else
                                            <div>
                                                <h5>{{ $value->name ?? '' }}</h5>
                                                <p id="blur">****************</p>
                                                <p class="mt-2"><a href="javascript:void(0)"
                                                        class="blur2">****************</a></p>
                                                <p><a href="javascript:void(0)"
                                                        class="blur3">*************************</a>
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                @else
                    <h3 style="text-align: center;">There are no matching results related to your search !</h3>
                @endif
                <div class="lineDiv2">
                    <img src="{{ asset('front_assets/images/1x/line2.png') }}" alt="">
                </div>
                <div class="container mt-5" id="customerdetail">

                </div>
            </div>

            {{-- ============== THIS CODE IS FOR LIVE SEARCH DATA =================== --}}

            <div class="row mt-5">
                <h3 style="text-align: center;">API Results</h3>
                <br>
                @if (isset($liveSearchdata['persons']) && count($liveSearchdata['persons']) > 0)
                {{-- @dd($liveSearchdata['persons']) --}}
                @php
                $hasMatchingResults = false;
                 @endphp
                    @foreach ($liveSearchdata['persons'] as $key => $person)
                        @if (isset($customers) &&
                             $customers->where('first_name', $person['name']['firstName'])->where('last_name', $person['name']['lastName'])->count() > 0)
                            <div class="col-lg-3 col-sm-12 col-md-6 wow animated fadeInLeft d-flex justify-content-around"
                                data-wow-duration="
                                    1s" data-wow-delay="0.5s">
                                <button class="toggle">
                                    <div class="InnerBox">
                                        <div class="d-flex p-3">
                                            @if ($user_SearchHistory_status == true)
                                                <div>
                                                    <h5>{{ $person['name']['firstName'] }}
                                                        {{ $person['name']['lastName'] }}</h5>
                                                    <p class="mt-2"><a
                                                            href="tel:{{ $person['phoneNumbers'][0]['phoneNumber'] ?? '' }}">{{ $person['phoneNumbers'][0]['phoneNumber'] ?? 'no number found' }}</a>
                                                    </p>
                                                    <p><a
                                                            href="mailto:{{ $person['emailAddresses'][0]['emailAddress'] ?? '' }}">{{ $person['emailAddresses'][0]['emailAddress'] ?? 'no email found' }}</a>
                                                    </p>
                                                    <p class="mt-2"><a
                                                            href="#">{{ $person['addresses'][0]['fullAddress'] ?? 'no address found' }}</a>
                                                    </p>
                                                </div>
                                                @elseif (Auth::check() && !empty($unlimitedPoints) && $unlimitedPoints == true && $customer_points->end_date > Carbon\Carbon::now())
                                                <div>
                                                    <h5>{{ $person['name']['firstName'] }}
                                                        {{ $person['name']['lastName'] }}</h5>
                                                    <p class="mt-2"><a
                                                            href="tel:{{ $person['phoneNumbers'][0]['phoneNumber'] ?? '' }}">{{ $person['phoneNumbers'][0]['phoneNumber'] ?? 'no number found' }}</a>
                                                    </p>
                                                    <p><a
                                                            href="mailto:{{ $person['emailAddresses'][0]['emailAddress'] ?? '' }}">{{ $person['emailAddresses'][0]['emailAddress'] ?? 'no email found' }}</a>
                                                    </p>
                                                    <p class="mt-2"><a
                                                            href="#">{{ $person['addresses'][0]['fullAddress'] ?? 'no address found' }}</a>
                                                    </p>
                                                </div>
                                            @elseif (Auth::check() && !empty($points) && $points > 0 && $customer_points->end_date > Carbon\Carbon::now())
                                                <div>
                                                    <h5>{{ $person['name']['firstName'] }}
                                                        {{ $person['name']['lastName'] }}</h5>
                                                    <p class="mt-2"><a
                                                            href="tel:{{ $person['phoneNumbers'][0]['phoneNumber'] ?? '' }}">{{ $person['phoneNumbers'][0]['phoneNumber'] ?? 'no number found' }}</a>
                                                    </p>
                                                    <p><a
                                                            href="mailto:{{ $person['emailAddresses'][0]['emailAddress'] ?? '' }}">{{ $person['emailAddresses'][0]['emailAddress'] ?? 'no email found' }}</a>
                                                    </p>
                                                    <p class="mt-2"><a
                                                            href="#">{{ $person['addresses'][0]['fullAddress'] ?? 'no address found' }}</a>
                                                    </p>
                                                </div>
                                            @else
                                                <div>
                                                    <h5>{{ $person['name']['firstName'] }}
                                                        {{ $person['name']['lastName'] }}</h5>
                                                    <p id="blur">****************</p>
                                                    <p class="mt-2"><a href="javascript:void(0)"
                                                            class="blur2">****************</a></p>
                                                    <p><a href="javascript:void(0)"
                                                            class="blur3">*************************</a>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </button>
                            </div>
                            @php
                          $hasMatchingResults = true;
                        @endphp

                        @endif
                    @endforeach
                    @if (!$hasMatchingResults)
                    <h6 style="text-align: center;">There are no matching results related to your search !</h6>
                    @endif
                @endif
            </div>
        </div>
        <div class="lineDiv2">
            <img src="{{ asset('front_assets/images/1x/line2.png') }}" alt="">
        </div>
    </section>

    {{-- <div class="container mt-5" id="customerdetail-oldplace">

    </div> --}}



    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                         $("#customerdetail").html(response.html);
                
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