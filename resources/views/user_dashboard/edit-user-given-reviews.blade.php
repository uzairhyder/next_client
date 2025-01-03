@include('user_dashboard.common.favicon')

@extends('frontend.layout')
@section('title', 'Dashboard')
{{-- <style>
    .checked {
        color: #d98d08 !important;
    }
</style> --}}
<style>
    .Btnlogin {
        border-radius: 20px;
        padding: 8px 61px;
        border: none;
        background-color: #003d70;
        font-weight: bold;
        color: #fff;
        border: 1px solid #003D70;
    }

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


    .for-back {
        display: flex;
        padding: 10px 30px;
        border-bottom: 1px solid #ecf3fa;
        flex-direction: row-reverse;
    }
</style>
<section class="profileSection">
    <div class="order-list1 py-5" id="paddingSmall">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('user_dashboard.common.sidebar')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">


                    </nav>
                    <!-- moblie navbar -->
                    @include('user_dashboard.common.mobile_sidebar')

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <div class="container-fluid">
                        <form method="POST" action="{{ route('update-usergiven-reviews', $editreview->id) }}">
                            @csrf
                            <div class="row sectionCstm">
                                <h4 style="text-align: start;" data-wow-duration="1s" data-wow-delay="0.5s">Edit User
                                    Review
                                </h4>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="text" placeholder="First Name" name="first_name" class="inputSearch"
                                        value="{{ $editreview->first_name }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="text" placeholder="Last Name" name="last_name" class="inputSearch"
                                        value="{{ $editreview->last_name }}">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="email" placeholder="Email" name="email" class="inputSearch"
                                        value="{{ $editreview->email }}">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="tel" id="phone12" name="contact" placeholder="Contact No."
                                        class="inputSearch" value="{{ $editreview->contact }}">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="text" placeholder="Address" name="address" class="inputSearch"
                                        value="{{ $editreview->address }}">
                                </div>

                                <div style="text-align: start;">
                                    @if ($editreview->customer_rating)
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="inputSearch">{{ $editreview->ques_customer_rating }}
                                                {{-- How would you rate this customer? --}}
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="star5" name="customer_rating" value="5"
                                                @if ($editreview->customer_rating == 5) checked @endif />
                                            <label class="star" for="star5"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star4" name="customer_rating" value="4"
                                                @if ($editreview->customer_rating == 4) checked @endif />
                                            <label class="star" for="star4"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star3" name="customer_rating" value="3"
                                                @if ($editreview->customer_rating == 3) checked @endif />
                                            <label class="star" for="star3"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star2" name="customer_rating" value="2"
                                                @if ($editreview->customer_rating == 2) checked @endif />
                                            <label class="star" for="star2"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star1" name="customer_rating" value="1"
                                                @if ($editreview->customer_rating == 1) checked @endif />
                                            <label class="star" for="star1"><i class="fa fa-star"></i></label>
                                        </div>
                                    @endif
                                    @if ($editreview->customer_rating_2)
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="inputSearch">{{ $editreview->ques_customer_rating_2 }}
                                                {{-- How would you rate this customer? --}}
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="rating_2star5" name="customer_rating_2"
                                                value="5" @if ($editreview->customer_rating_2 == 5) checked @endif />
                                            <label class="star" for="rating_2star5"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star4" name="customer_rating_2"
                                                value="4" @if ($editreview->customer_rating_2 == 4) checked @endif />
                                            <label class="star" for="rating_2star4"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star3" name="customer_rating_2"
                                                value="3" @if ($editreview->customer_rating_2 == 3) checked @endif />
                                            <label class="star" for="rating_2star3"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star2" name="customer_rating_2"
                                                value="2" @if ($editreview->customer_rating_2 == 2) checked @endif />
                                            <label class="star" for="rating_2star2"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star1" name="customer_rating_2"
                                                value="1" @if ($editreview->customer_rating_2 == 1) checked @endif />
                                            <label class="star" for="rating_2star1"><i class="fa fa-star"></i></label>
                                        </div>
                                    @endif


                                    @if ($editreview->customer_rating_3)
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="inputSearch">{{ $editreview->ques_customer_rating_3 }}
                                                {{-- How would you rate this customer? --}}
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="rating_star5" name="customer_rating_3"
                                                value="5" @if ($editreview->customer_rating_3 == 5) checked @endif />
                                            <label class="star" for="rating_star5"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star4" name="customer_rating_3"
                                                value="4" @if ($editreview->customer_rating_3 == 4) checked @endif />
                                            <label class="star" for="rating_star4"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star3" name="customer_rating_3"
                                                value="3" @if ($editreview->customer_rating_3 == 3) checked @endif />
                                            <label class="star" for="rating_star3"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star2" name="customer_rating_3"
                                                value="2" @if ($editreview->customer_rating_3 == 2) checked @endif />
                                            <label class="star" for="rating_star2"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star1" name="customer_rating_3"
                                                value="1" @if ($editreview->customer_rating_3 == 1) checked @endif />
                                            <label class="star" for="rating_star1"><i class="fa fa-star"></i></label>
                                        </div>
                                    @endif
                                </div>
                                @if ($editreview->working_with_customer)
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{ $editreview->ques_customer_work_1 }}
                                            {{-- Was the customer easy to work with? --}}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work" required type="radio" id="test1"
                                                    value="{{ $editreview->working_with_customer }}" checked>
                                                <label for="test1">
                                                    {{-- Yes --}}
                                                    {{ $editreview->working_with_customer }}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work" required type="radio"
                                                    value="{{ $editreview->uncheck_customer_work_1 }}"
                                                    id="test2">
                                                <label for="test2">
                                                    {{ $editreview->uncheck_customer_work_1 }}
                                                    {{-- No --}}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                @if ($editreview->customer_work_2)
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{ $editreview->ques_customer_work_2 }}
                                            {{-- Was the customer easy to work with? --}}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work_2" required type="radio"
                                                    id="customer_work_2" value="{{ $editreview->customer_work_2 }}"
                                                    checked>
                                                <label for="customer_work_2">
                                                    {{ $editreview->customer_work_2 }}
                                                    {{-- No --}}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work_2" required type="radio"
                                                    value="{{ $editreview->uncheck_customer_work_2 }}"
                                                    id="customer_work_2test2">
                                                <label for="customer_work_2test2">
                                                    {{ $editreview->uncheck_customer_work_2 }}
                                                    {{-- No --}}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_work_3)
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{ $editreview->ques_customer_work_3 }}
                                            {{-- Was the customer easy to work with? --}}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work_3" required type="radio"
                                                    id="customer_work_3" value="{{ $editreview->customer_work_3 }}"
                                                    checked>
                                                <label for="customer_work_3">
                                                    {{ $editreview->customer_work_3 }}
                                                    {{-- Yes --}}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work_3" required type="radio"
                                                    value=" {{ $editreview->uncheck_customer_work_3 }}"
                                                    id="customer_work_3test2">
                                                <label for="customer_work_3test2">
                                                    {{ $editreview->uncheck_customer_work_3 }}
                                                    {{-- No --}}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_pay_time)
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{-- Did the customer pay on time? --}}
                                            {{ $editreview->ques_customer_pay_time_1 }}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time"
                                                    value="{{ $editreview->customer_pay_time }}"
                                                    name="customer_payment_time" checked>
                                                <label for="customer_payment_time">
                                                    {{ $editreview->customer_pay_time }}
                                                    {{-- Yes --}}
                                                </label>
                                                {{-- <label for="test3">Yes</label> --}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_timetest1"
                                                    value=" {{ $editreview->uncheck_customer_pay_time_1 }}"
                                                    name="customer_payment_time">
                                                <label for="customer_payment_timetest1">
                                                    {{ $editreview->uncheck_customer_pay_time_1 }}
                                                    {{-- No --}}
                                                </label>
                                                {{-- <label for="test4">No</label> --}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_pay_time_2)
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{-- Did the customer pay on time? --}}
                                            {{ $editreview->ques_customer_pay_time_2 }}

                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_2"
                                                    value="{{ $editreview->customer_pay_time_2 }}"
                                                    name="customer_payment_time_2" checked>

                                                <label for="customer_payment_time_2">
                                                    {{-- Yes --}}
                                                    {{ $editreview->customer_pay_time_2 }}
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_2test4"
                                                    value=" {{ $editreview->uncheck_customer_pay_time_2 }}"
                                                    name="customer_payment_time_2">
                                                <label for="customer_payment_time_2test4">
                                                    {{ $editreview->uncheck_customer_pay_time_2 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_pay_time_3)
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{-- Did the customer pay on time? --}}
                                            {{ $editreview->ques_customer_pay_time_3 }}

                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_3"
                                                    value="{{ $editreview->customer_pay_time_3 }}"
                                                    name="customer_payment_time_3" checked>
                                                <label for="customer_payment_time_3">
                                                    {{ $editreview->customer_pay_time_3 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_4"
                                                    value=" {{ $editreview->uncheck_customer_pay_time_3 }}"
                                                    name="customer_payment_time_3">
                                                <label for="customer_payment_time_4">
                                                    {{ $editreview->uncheck_customer_pay_time_3 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_recommendation)
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{ $editreview->ques_customer_recommendation_1 }}
                                            {{-- Would you recommend this customer to
                                            other businesses? --}}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendationds"
                                                    value="{{ $editreview->customer_recommendation_2 }}"
                                                    name="customer_recommendation" checked>
                                                {{-- <input required type="radio" id="customer_recommendationds" value="{{$editreview->customer_recommendation}}"
                                                        name="customer_recommendation" checked> --}}
                                                <label for="customer_recommendationds">
                                                    {{ $editreview->customer_recommendation }}</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_ans"
                                                    value="{{ $editreview->uncheck_customer_recommendation_1 }}"
                                                    name="customer_recommendation">
                                                <label for="customer_recommendation_ans">
                                                    {{ $editreview->uncheck_customer_recommendation_1 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_recommendation_2)
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{ $editreview->ques_customer_recommendation_2 }}
                                            {{-- Would you recommend this customer to
                                        other businesses? --}}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_2"
                                                    value="{{ $editreview->customer_recommendation_2 }}"
                                                    name="customer_recommendation_2" checked>
                                                <label for="customer_recommendation_2">
                                                    {{ $editreview->customer_recommendation_2 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_2test6"
                                                    value=" {{ $editreview->uncheck_customer_recommendation_2 }}"
                                                    name="customer_recommendation_2">
                                                <label for="customer_recommendation_2test6">
                                                    {{ $editreview->uncheck_customer_recommendation_2 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_recommendation_3)
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            {{ $editreview->ques_customer_recommendation_3 }}
                                            {{-- Would you recommend this customer to
                                    other businesses? --}}
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_3"
                                                    value="
                                                    {{ $editreview->customer_recommendation_3 }}"
                                                    name="customer_recommendation_3" checked>
                                                <label
                                                    for="customer_recommendation_3">{{ $editreview->customer_recommendation_3 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_3test6"
                                                    value=" {{ $editreview->uncheck_customer_recommendation_3 }}"
                                                    name="customer_recommendation_3">
                                                <label for="customer_recommendation_3test6">
                                                    {{ $editreview->uncheck_customer_recommendation_3 }}</label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($editreview->customer_description)
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea class="inputSearch" type="message" name="customer_description" id="" cols="120"
                                        rows="7" placeholder="{{ $editreview->ques_customer_description_1 }}">{{ $editreview->customer_description }}</textarea>
                                </div>
                                        @endif
                                @if ($editreview->customer_description_2)
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea class="inputSearch" type="message" name="customer_description_2" id="" cols="120"
                                        rows="7" placeholder="{{ $editreview->ques_customer_description_2 }}">{{ $editreview->customer_description_2 }}</textarea>
                                </div>
                                        @endif
                                @if ($editreview->customer_description_3)
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea class="inputSearch" type="message" name="customer_description_3" id="" cols="120"
                                        rows="7" placeholder="{{ $editreview->ques_customer_description_3 }}">{{ $editreview->customer_description_3 }}</textarea>
                                </div>
                                        @endif
                                <br>
                                <div class="col-lg-12 mb-3 mt-3">
                                    <a href="javascript:void(0)"><button type="submit" class="Btnlogin "
                                            data-wow-duration="1s" data-wow-delay="0.5s">Update</button></a>
                                </div>
                            </div>
                        </form>

                        {{-- === Hassan work === --}}


                        {{-- <div class="row sectionCstm ">
                            <h4 style="text-align: start;" data-wow-duration="1s" data-wow-delay="0.5s">Edit User
                                Review
                            </h4>

                            <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                <input type="text" placeholder="First Name" name="first_name"
                                    class="inputSearch">
                            </div>
                            <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                <input type="text" placeholder="Last Name" name="last_name" class="inputSearch">
                            </div>
                            <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                <input type="email" placeholder="Email" name="email" class="inputSearch">
                            </div>
                            <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                <input type="tel" id="phone12" name="contact" placeholder="Contact No."
                                    class="inputSearch">
                            </div>
                            <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                <input type="text" placeholder="Address" name="address" class="inputSearch">
                            </div>
                            <div class="col-lg-12 mb-3 mt-3  label" data-wow-duration="1s" data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="How would you rate this customer?" class="inputSearch"> -->
                                <label for="">How would you rate this customer?</label>
                            </div>

                            <div style="text-align: start;">
                                <div class="rating">
                                    <input type="radio" id="star1" name="customer_rating" value="1">
                                    <label class="star" for="star1">
                                        <div class="fa fa-star"></div>
                                    </label>
                                    <input type="radio" id="star2" name="customer_rating" value="2">
                                    <label class="star" for="star2">
                                        <div class="fa fa-star"></div>
                                    </label>

                                    <input type="radio" id="star3" name="customer_rating" value="3">
                                    <label class="star" for="star3">
                                        <div class="fa fa-star"></div>
                                    </label>
                                    <input type="radio" id="star4" name="customer_rating" value="4">
                                    <label class="star" for="star4">
                                        <div class="fa fa-star"></div>
                                    </label>
                                    <input type="radio" id="star5" name="customer_rating" value="5">
                                    <label class="star" for="star5">
                                        <div class="fa fa-star"></div>
                                    </label>

                                </div>
                            </div>

                            <div class="col-lg-12 mb-3 mt-3 label " data-wow-duration="1s" data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Was the customer easy to work with?" class="inputSearch"> -->
                                <label for="">Was the customer easy to work with?</label>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4  radio-css" data-wow-duration="1s" data-wow-delay="0.5s">


                                    <p>
                                        <input type="radio" id="test1" value="1" name="customer_work"
                                            checked="">
                                        <label for="test1">Yes</label>
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                                    <p>
                                        <input type="radio" value="2" id="test2" name="customer_work">
                                        <label for="test2">No</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3 mt-3  label" data-wow-duration="1s" data-wow-delay="0.5s">

                                <label for="">Did the customer pay on time?</label>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                                    <p>
                                        <input type="radio" id="test3" value="1"
                                            name="customer_payment_time" checked="">
                                        <label for="test3">Yes</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4  radio-css" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test4" value="2"
                                            name="customer_payment_time">

                                        <label for="test4">No</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s" data-wow-delay="0.5s">
                                <label for="" class="inputSearch">Would you recommend this customer to other
                                    businesses?</label>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4  radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                                    <p>
                                        <input type="radio" id="test5" value="1"
                                            name="customer_recommendation" checked="">
                                        <label for="test5">Yes</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 radio-css" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test6" value="2"
                                            name="customer_recommendation">
                                        <label for="test6">No</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                <textarea type="message" name="customer_description" id="" cols="85" rows="7"
                                    placeholder="Description..." style="width: 100%"></textarea>
                            </div>

                            <div class="col-lg-12 mb-3 mt-3">
                                <a href="javascript:void(0)"><button type="submit" class="Btnlogin "
                                        data-wow-duration="1s" data-wow-delay="0.5s">Update</button></a>
                            </div>
                        </div> --}}
                    </div>

                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
</section>



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
                        window.location.href = "{{ route('purchased-package') }}";
                    });
                } else {
                    swal({
                        title: "Package!",
                        text: 'Some thing went wrong !',
                        type: "error",
                        icon: "error",

                    }).then(function() {
                        window.location.href = "{{ route('purchased-package') }}";

                    });

                }
            }

        });
    }
</script>
