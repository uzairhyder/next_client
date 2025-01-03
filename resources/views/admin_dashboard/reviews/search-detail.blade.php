@extends('admin_dashboard.layouts.master')
@section('content')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <!-- <h3>Inquiry Details</h3> -->
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">Review Search Details</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Review</li>
    <li class="breadcrumb-item active"> Management</li>
@endsection

@section('content')
    <style>
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(180, 180, 180, 0.75);
            z-index: 9999;
            display: none;
        }

        .loader::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 50px;
            height: 50px;
            margin-top: -25px;
            margin-left: -25px;
            border: 3px solid transparent;
            border-top: 3px solid #156aa1;
            border-radius: 50%;
            animation: spin 1.5s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .deteleButton {
            background-color: #C1272D;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .deteleButton a {
            color: #fff !important;
        }

        .editButton {
            background-color: #22B573;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .editButton a {
            color: #fff !important;
        }

        .round-cstm-btn-green {
            border-radius: 30px !important;
            padding: 10px 20px !important;
            font-family: Poppins-Regular;
            background-color: #00a808 !important;
            border: none;
        }

        .round-cstm-btn-red a,
        .round-cstm-btn-green a {
            color: #fff;
            font-size: 14px;
        }

        .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
            height: 100% !important;
        }

        /* review css */
        .rating {
            float: left;
            width: fit-content;
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

        .for-back {
            display: flex;
            padding: 10px 30px;
            border-bottom: 1px solid #ecf3fa;
            flex-direction: row-reverse;
        }

        .cstm-input-feild input {
            margin-top: 10px;
            padding: 10px 25px;
            background: #fff;
            border: none;
            width: 100%;
            outline: none;
            border-radius: 6px;
            color: black !important;
            font-family: "Gilroy-Light";
            box-shadow: 0px 0px 6px 0px #8d8d8d;
        }

        .InnerBox {
            background-color: #fff;
            width: 100%;
            margin: 10px 0px;
            padding: 1rem 10px;
            height: 165px;
            border-radius: 10px;
            box-shadow: rgb(0 0 0 / 16%) 8px 19px 33px;
        }

        .InnerBox:hover {
            background-color: #003D70;
            color: #fff;
        }

        .InnerBox h5 {
            color: #000;
            font-family: "Gilroy-ExtraBold";
            margin-bottom: 0px;
            text-align: start;
        }

        .InnerBox:hover a,
        .InnerBox:hover p,
        .InnerBox:hover h5 {
            color: #ffff;
        }

        .InnerBox p {
            color: #808080;
            font-family: "Gilroy-Light";
            margin-bottom: 0px;
            text-align: start;
        }

        .InnerBox p a {
            color: #333333;
            font-family: "Gilroy-Light";
            margin-bottom: 0px;
            text-align: start;
            text-decoration: none;
        }

        .cstm-btn {
            border: none;
            padding: 0px;
            margin: 0px;
            background: transparent;
        }
    </style>

    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Database User Details</h5>
                        <a class="btn btn-success" href="{{ route('customer-reviews') }}" title="">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <tbody>
                                    {{-- <tr>
                                        <th>User Name</th>
                                        <td>{{ $detail->get_user->name ?? '' }}</td>
                                    </tr> --}}
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $detail->first_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $detail->last_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $detail->email ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{ $detail->contact ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ date('j-M-Y g:i A', strtotime($detail->created_at)) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $detail->address ?? '' }}</td>
                                    </tr>
                                    @if ($detail->customer_rating)
                                    <tr>
                                        <th> {{ $detail->ques_customer_rating }}
                                            {{-- // How would you rate this customer? --}}
                                        </th>
                                        <td>
                                            <div class="rating">
                                                <input type="radio" id="star5" name="customer_rating"
                                                    value="5" disabled
                                                    @if ($detail->customer_rating == 5) checked @endif />
                                                <label class="star" for="star5"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star4" name="customer_rating"
                                                    value="4" disabled
                                                    @if ($detail->customer_rating == 4) checked @endif />
                                                <label class="star" for="star4"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star3" name="customer_rating"
                                                    value="3" disabled
                                                    @if ($detail->customer_rating == 3) checked @endif />
                                                <label class="star" for="star3"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star2" name="customer_rating"
                                                    value="2" disabled
                                                    @if ($detail->customer_rating == 2) checked @endif />
                                                <label class="star" for="star2"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star1" name="customer_rating"
                                                    value="1" disabled
                                                    @if ($detail->customer_rating == 1) checked @endif />
                                                <label class="star" for="star1"><span
                                                        class="fa fa-star"></span></label>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->customer_rating_2)
                                    <tr>
                                        <th> {{ $detail->ques_customer_rating_2 }}
                                            {{-- // How would you rate this customer? --}}
                                        </th>
                                        <td>
                                            <div class="rating">
                                                <input type="radio" id="customer_rating_2star5"
                                                    name="customer_rating_2" value="5" disabled
                                                    @if ($detail->customer_rating_2 == 5) checked @endif />
                                                <label class="star" for="customer_rating_2star5"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_2star4"
                                                    name="customer_rating_2" value="4" disabled
                                                    @if ($detail->customer_rating_2 == 4) checked @endif />
                                                <label class="star" for="customer_rating_2star4"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_2star3"
                                                    name="customer_rating_2" value="3" disabled
                                                    @if ($detail->customer_rating_2 == 3) checked @endif />
                                                <label class="star" for="customer_rating_2star3"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="scustomer_rating_2tar2"
                                                    name="customer_rating_2" value="2" disabled
                                                    @if ($detail->customer_rating_2 == 2) checked @endif />
                                                <label class="star" for="customer_rating_2star2"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_2star1"
                                                    name="customer_rating_2" value="1" disabled
                                                    @if ($detail->customer_rating_2 == 1) checked @endif />
                                                <label class="star" for="customer_rating_2star1"><span
                                                        class="fa fa-star"></span></label>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                @if ($detail->customer_rating_3)
                                    <tr>
                                        <th> {{ $detail->ques_customer_rating_3 }}
                                            {{-- // How would you rate this customer? --}}
                                        </th>
                                        <td>
                                            <div class="rating">
                                                <input type="radio" id="customer_rating_3star5"
                                                    name="customer_rating_3" value="5" disabled
                                                    @if ($detail->customer_rating_3 == 5) checked @endif />
                                                <label class="star" for="customer_rating_3star5"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_3star4"
                                                    name="customer_rating_3" value="4" disabled
                                                    @if ($detail->customer_rating_3 == 4) checked @endif />
                                                <label class="star" for="customer_rating_3star4"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_3star3"
                                                    name="customer_rating_3" value="3" disabled
                                                    @if ($detail->customer_rating_3 == 3) checked @endif />
                                                <label class="star" for="customer_rating_3star3"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_3star2"
                                                    name="customer_rating_3" value="2" disabled
                                                    @if ($detail->customer_rating_3 == 2) checked @endif />
                                                <label class="star" for="customer_rating_3star2"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="customer_rating_3star1"
                                                    name="customer_rating_3" value="1" disabled
                                                    @if ($detail->customer_rating_3 == 1) checked @endif />
                                                <label class="star" for="customer_rating_3star1"><span
                                                        class="fa fa-star"></span></label>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->working_with_customer)
                                    <tr>
                                        <th>
                                            {{ $detail->ques_customer_work_1 }}
                                            {{-- Was the customer easy to work with? --}}
                                        </th>
                                        <td>
                                            {{-- @if ($detail->working_with_customer == 1)
                                            Yes
                                        @else
                                            No
                                        @endif --}}
                                            {{ $detail->working_with_customer }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->customer_work_2)
                                    <tr>
                                        <th>
                                            {{ $detail->ques_customer_work_2 }}
                                            {{-- Was the customer easy to work with? --}}
                                        </th>
                                        <td>
                                            {{ $detail->customer_work_2 }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->customer_work_3)
                                    <tr>
                                        <th>
                                            {{ $detail->ques_customer_work_3 }}
                                            {{-- Was the customer easy to work with? --}}
                                        </th>
                                        <td>
                                            {{ $detail->customer_work_3 }}
                                        </td>
                                    </tr>
                                @endif

                                @if ($detail->customer_pay_time)
                                    <tr>
                                        <th> {{ $detail->ques_customer_pay_time_1 }}

                                            {{-- Did the customer pay on time? --}}
                                        </th>
                                        <td>
                                            {{ $detail->customer_pay_time }}
                                            {{-- @if ($detail->customer_pay_time == 1)
                                            Yes
                                        @else
                                            No
                                        @endif --}}
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->customer_pay_time_2)
                                    <tr>
                                        <th> {{ $detail->ques_customer_pay_time_2 }}

                                            {{-- Did the customer pay on time? --}}
                                        </th>
                                        <td>
                                            {{ $detail->customer_pay_time_2 }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->customer_pay_time_3)
                                    <tr>
                                        <th> {{ $detail->ques_customer_pay_time_3 }}
                                            {{-- Did the customer pay on time? --}}
                                        </th>
                                        <td>
                                            {{ $detail->customer_pay_time_3 }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($detail->customer_recommendation)
                                <tr>
                                    <th>
                                        {{$detail->ques_customer_recommendation_1}}
                                        {{-- Would you recommend this customer to other businesses? --}}
                                    </th>
                                    <td>
                                        {{$detail->customer_recommendation}}
                                        {{-- @if ($detail->customer_recommendation == 1)
                                            Yes
                                        @else
                                            No
                                        @endif --}}
                                    </td>
                                </tr>
                                @endif
                                @if ($detail->customer_recommendation_2)
                                <tr>
                                    <th>
                                        {{$detail->ques_customer_recommendation_2}}
                                        {{-- Would you recommend this customer to other businesses? --}}
                                    </th>
                                    <td>
                                        {{$detail->customer_recommendation_2}}
                                    </td>
                                </tr>
                                @endif
                                @if ($detail->customer_recommendation_3)
                                <tr>
                                    <th>
                                        {{$detail->ques_customer_recommendation_3}}
                                        {{-- Would you recommend this customer to other businesses? --}}
                                    </th>
                                    <td>
                                        {{$detail->customer_recommendation_3}}
                                    </td>
                                </tr>
                                @endif
                                @if ($detail->customer_description)
                                <tr>
                                    <th>
                                        {{$detail->ques_customer_description_1}}
                                        {{-- Description --}}
                                    </th>
                                    <td>{{ $detail->customer_description ?? '' }}</td>
                                </tr>
                                @endif
                                @if ($detail->customer_description_2)
                                <tr>
                                    <th>
                                        {{$detail->ques_customer_description_2}}
                                        {{-- Description --}}
                                    </th>
                                    <td>{{ $detail->customer_description_2 ?? '' }}</td>
                                </tr>
                                @endif
                                @if ($detail->customer_description_3)
                                <tr>
                                    <th>
                                        {{$detail->ques_customer_description_3}}
                                        {{-- Description --}}
                                    </th>
                                    <td>{{ $detail->customer_description_3 ?? '' }}</td>
                                </tr>
                                @endif


                                    {{-- <tr>
                                        <th>Review Status</th>
                                        <td>
                                            <a href="{{ route('review-status', ['id' => $detail->id]) }}">
                                                @if ($detail->status == 1)
                                                    <button class="btn btn-info btn-sm" id="status"><i
                                                            class="fa fa-shield"></i> Approved</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm" id="status"><i
                                                            class="fa fa-thumbs-down"></i> Not Approved</button>
                                                @endif
                                            </a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    {{-- ======== TO SEARCH DATA FROM API =========== --}}
                    <div class="card-body">
                        <div id="searchloader" class="loader"></div>
                        <form method="post" action="{{ route('search-live-customers') }}" class="form"
                            id="searchdataform">
                            @csrf
                            <div class="form-group">
                                <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    API<span> Search</span></h4>
                                <div class="row cstm-input-feild mt-5">
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="first_name" placeholder="First Name.*"
                                            class="inputSearch" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="last_name" placeholder="Last Name.*" class="inputSearch"
                                            required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="hidden" name="review_id" value="{{ $detail->id ?? '' }}">
                                        <input type="hidden" name="user_id" value="{{ $detail->user_id ?? '' }}">
                                    </div>
                                </div>

                                {{-- <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">

                                    </div> --}}
                                {{-- <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                        data-wow-delay="0.5s">

                                    </div> --}}

                                {{-- <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input type="text" name="address" placeholder="Address.*" class="inputSearch">
                                        </div>
                                        <div class="col-lg-6 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input type="tel" id="phone12" name="contact" placeholder="Phone No."
                                                class="inputSearch">
                                        </div>
                                        <div class="col-lg-6 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input type="email" name="email" placeholder="Email." class="inputSearch">
                                        </div>
                                        --}}

                                <div class="col-lg-12 mb-3 mt-4">
                                    <a href="#"><button type="submit" class="btn btn-primary"
                                            data-wow-duration="1s" data-wow-delay="0.5s">Search
                                            Now</button></a>
                                </div>
                        </form>
                        <div class="row mt-5">
                            @if (isset($liveSearchdata['persons']) && count($liveSearchdata['persons']) > 0)
                                <h3 style="text-align: center;">API Results</h3>
                                <br>
                                @php
                                    $hasMatchingResults = false;
                                @endphp
                                @foreach ($liveSearchdata['persons'] as $key => $person)
                                    @if (Auth::check())
                                        {{-- Add your comparison logic here --}}
                                        @if (isset($customers) &&
                                                $customers->first_name === $person['name']['firstName'] &&
                                                $customers->last_name === $person['name']['lastName']
                                        )
                                            <div class="col-lg-3 col-sm-12 col-md-6 wow animated fadeInLeft d-flex justify-content-around"
                                                data-wow-duration="1s" data-wow-delay="0.5s">
                                                <button class="toggle cstm-btn" onclick="customerdetails('#')">
                                                    <div class="InnerBox">

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
                                                </button>
                                            </div>
                                            @php
                                                $hasMatchingResults = true;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if (!$hasMatchingResults)
                                    <h6 style="text-align: center;">There are no matching results related to your search !
                                    </h6>
                                @endif
                            @endif

                            {{-- @if (isset($liveSearchdata['persons']) && count($liveSearchdata['persons']) > 0)
                                <h3 style="text-align: center;">API Results</h3>
                                <br>
                                @foreach ($liveSearchdata['persons'] as $key => $person)
                                    <div class="col-lg-3 col-sm-12 col-md-6 wow animated fadeInLeft d-flex justify-content-around"
                                        data-wow-duration="
                                        1s"
                                        data-wow-delay="0.5s">
                                        <button class="toggle cstm-btn" onclick="customerdetails('#')">
                                            <div class="InnerBox">

                                                @if (Auth::check())
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
                                                @endif

                                            </div>
                                        </button>
                                    </div>
                                @endforeach
                                @else
                            <h6 style="text-align: center;">No search result found !</h6>
                            @endif --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#searchdataform').on('submit', function(event) {
                $('#searchloader').show();

                // Disable submit button
                $('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Hide loader
                        $('#searchloader').hide();

                        // Enable submit button
                        $('button[type="submit"]').prop('disabled', false);

                        // Handle the response, e.g., update a result div
                        // $('#result').html(response);
                        // Optionally, display a success message to the user

                        Swal.fire({
                            icon: 'success',
                            title: 'Search Successful',
                            text: 'Your search results are ready!',
                        });

                    },
                    error: function(xhr, status, error) {
                        // Hide loader
                        $('#searchloader').hide();

                        // Enable submit button
                        $('button[type="submit"]').prop('disabled', false);

                        // Display an error message using SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Search Error',
                            text: 'An error occurred during the search. Please try again.',
                        });
                    }
                });
            });
        });
    </script>

@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
