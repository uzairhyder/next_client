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
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">Review Details</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Review</li>
    <li class="breadcrumb-item active"> Management</li>
@endsection

@section('content')
    <style>
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
    </style>



    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="for-back">
                        <a class="btn btn-success" href="{{ route('customer-reviews') }}" data-bs-original-title=""
                            title="">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <tbody>
                                    <tr>
                                        <th>User Name</th>
                                        <td>{{ $detail->get_user->name ?? '' }}</td>
                                    </tr>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- ======== TO SEARCH DATA FROM API =========== --}}
                    {{-- <div class="card-body">
                        <div class="container">
                            <form method="post" action="{{ route('search-customers') }}" class="form">
                                @csrf
                                <div class="form-group">
                                    <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                        Customer<span>
                                            Search</span></h4>
                                    <div class="col-lg-6 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="text" name="first_name" placeholder="First Name.*"
                                            class="inputSearch">
                                    </div>
                                    <div class="col-lg-6 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="text" name="last_name" placeholder="Last Name.*"
                                            class="inputSearch">
                                    </div>


                                    <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
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
                                    <div class="col-lg-12 mb-3 mt-4 text-center">
                                        <a href="#"><button type="submit" class="Btn wow animated bounceIn"
                                                data-wow-duration="1s" data-wow-delay="0.5s">Search
                                                Now</button></a>
                                    </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
