@include('user_dashboard.common.favicon')

@extends('frontend.layout')
@section('title', 'Dashboard')
<style>
    .checked {
        color: #d98d08 !important;
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
                        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <div class="container">

                                <form method="POST" action="{{ route('update-usergiven-reviews', $editreview->id) }}"
                                    class="form">
                                    @csrf

                                    <div class="row">
                                        <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                            Edit User Review</h4>

                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            {{-- <input type="text" placeholder="First Name" name="first_name" class="inputSearch"> --}}
                                            <input id="first_name" type="text"
                                                class="inputSearch @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ $editreview->first_name }}" required
                                                autocomplete="first_name" autofocus>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input value="{{ $editreview->last_name }}" required type="text"
                                                placeholder="Last Name" name="last_name" class="inputSearch">
                                        </div>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input value="{{ $editreview->email }}" required type="email"
                                                placeholder="Email" name="email" class="inputSearch">
                                        </div>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input value="{{ $editreview->contact }}" required type="tel"
                                                id="phone12" name="contact" placeholder="Contact No."
                                                class="inputSearch">
                                        </div>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <input value="{{ $editreview->address }}" required type="text"
                                                placeholder="Address" name="address" class="inputSearch">
                                        </div>

                                        {{-- <div class="memberStar">
                     <i class="fa-sharp fa-solid fa-star"></i>
                     <i class="fa-sharp fa-solid fa-star"></i>
                     <i class="fa-sharp fa-solid fa-star"></i>
                     <i class="fa-sharp fa-solid fa-star"></i>
                     <i class="fa-sharp fa-solid fa-star last"></i>
                 </div> --}}

                                        <div class="rating">
                                            <input required type="radio" id="star5" name="customer_rating"
                                                value="1"
                                                {{ $editreview->customer_rating == '1' ? 'checked' : '' }} />
                                            <label class="star" for="star5">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <input required type="radio" id="star4" name="customer_rating"
                                                value="2"
                                                {{ $editreview->customer_rating == '2' ? 'checked' : '' }} />
                                            <label class="star" for="star4">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <input required type="radio" id="star3" name="customer_rating"
                                                value="3"
                                                {{ $editreview->customer_rating == '3' ? 'checked' : '' }} />
                                            <label class="star" for="star3">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <input required type="radio" id="star2" name="customer_rating"
                                                value="4"
                                                {{ $editreview->customer_rating == '4' ? 'checked' : '' }} />
                                            <label class="star" for="star2">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <input required type="radio" id="star1" name="customer_rating"
                                                value="5"
                                                {{ $editreview->customer_rating == '5' ? 'checked' : '' }} />
                                            <label class="star" for="star1">
                                                <i class="fa fa-star"></i>
                                            </label>
                                        </div>


                                        {{-- <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s" data-wow-delay="0.5s">

                    <label for="">Was the customer easy to work with?</label>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <p>
                            <input value="{{ $editreview->customer_work }}" required type="radio" id="test1" value="1" name="customer_work" checked>
                            <label for="test1">Yes</label>
                        </p>

                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <p>
                            <input value="{{ $editreview->customer_work }}" required type="radio" value="2" id="test2" name="customer_work">
                            <label for="test2">No</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s" data-wow-delay="0.5s">

                    <label for="">Did the customer pay on time?</label>
                </div> --}}
                                        {{-- <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s" data-wow-delay="0.5s">


                        <p>
                            <input value="{{ $editreview->first_name }}" required type="radio" id="test3" value="1" name="customer_payment_time" checked>
                            <label for="test3">Yes</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <p>
                            <input value="{{ $editreview->first_name }}" required type="radio" id="test4" value="2" name="customer_payment_time">

                            <label for="test4">No</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s" data-wow-delay="0.5s">

                    <label for="" class="inputSearch">Would you recommend this customer to other businesses?</label>
                </div> --}}
                                        {{-- <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                    " required="">
                        <label for="" class="pb-2 pr-2 ">Yes</label> -->
                        <p>
                            <input value="{{ $editreview->customer_recommendation }}" required type="radio" id="test5" value="1" name="customer_recommendation" checked>
                            <label for="test5">Yes</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s" data-wow-delay="0.5s">


                        <p>
                            <input value="{{ $editreview->first_name }}" required type="radio" id="test6" value="2" name="customer_recommendation">
                            <label for="test6">No</label>
                        </p>
                    </div>
                </div> --}}
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight"
                                            data-wow-duration="1s" data-wow-delay="0.5s">
                                            <textarea type="message" name="customer_description" id="" cols="85" rows="7"
                                                placeholder="Description...">{{ $editreview->customer_description }}</textarea>
                                        </div>
                                        {{-- <div class="d-flex justify-content-end align-items-center col-lg-12 accept  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <p>
                        <input value="{{ $editreview->accept_terms }}" required type="checkbox" id="test7" value="1" name="accept_terms" class="form-check-input">
                        <label for="test7">Accept Term & Condition</label>
                    </p>
                </div> --}}
                                        <div class="col-lg-12 mb-3 text-center">
                                            <a href="javascript:void(0)"><button type="submit"
                                                    class="Btnlogin wow animated bounceIn" data-wow-duration="1s"
                                                    data-wow-delay="0.5s">Save</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
