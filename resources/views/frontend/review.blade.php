    @extends('frontend.layout')
    @section('title', 'Review')

    @section('content')
        <style>
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
        </style>

        <!--Banner  -->
        {{-- for after --}}
        <section class="banner1 d-flex justify-content-center align-items-center w-100 searchData">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <div class="text-div">
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star checked"></i>
                            <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                            <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                {{ $banner_review->title1 ?? '' }}<span>
                                    {{ $banner_review->title2 ?? '' }} <br>{{ $banner_review->title3 ?? '' }}</span>
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 pt-5">
                        <div class="inner-img wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="innerDiv position-relative">
                                <img src="{{ url('public/banner', $banner_review->banner_image) }}" alt="">
                                <div class="firstDiv  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="{{ asset('front_assets/images/1x/overlayImg.png') }}" alt="">
                                </div>
                                <div class="lastDiv  wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="{{ asset('front_assets/images/1x/overlayImg1.png') }}" alt="">
                                </div>
                            </div>
                            <!-- <img src="../imgaes/1x/banner-inner.png" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sectionCstm">
            <div class="container">
                <form id="customerreview" class="form">
                    @csrf
                    <div class="row">
                        <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Tell Us About
                            <span class="fontstyling">Your Experience</span>
                        </h4>
                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <input type="text" placeholder="{{ $query[0]->title }}" name="first_name"
                                class="inputSearch" required>
                        </div>
                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <input type="text" placeholder="{{ $query[1]->title }}" name="last_name" class="inputSearch" required>
                        </div>
                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <input type="email" placeholder="{{ $query[2]->title }}" name="email" class="inputSearch" required>
                        </div>
                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <input type="tel" id="phone12" name="contact" placeholder="{{ $query[3]->title }}"
                                class="inputSearch" required>
                        </div>
                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <input type="text" placeholder="{{ $query[4]->title }}" name="address" class="inputSearch" required>
                        </div>

                        @if ($query[5]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="How would you rate this customer?" class="inputSearch"> -->
                                <label for="">{{ $query[5]->title }}</label>
                                {{-- -How would you rate this customer? --}}
                            </div>
                            <div class="rating activeRating1">
                                <input type="radio" id="star5" name="customer_rating" value="5" />
                                <label class="star" for="star5">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="star4" name="customer_rating" value="4" />
                                <label class="star" for="star4">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="star3" name="customer_rating" value="3" />
                                <label class="star" for="star3">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="star2" name="customer_rating" value="2" />
                                <label class="star" for="star2">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="star1" name="customer_rating" value="1" />
                                <label class="star" for="star1">
                                    <div class="fa fa-star"></div>
                                </label>
                            </div>
                        @endif
                        {{-- custome create --}}
                        @if ($query[11]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="How would you rate this customer?" class="inputSearch"> -->
                                <label for="">{{ $query[11]->title }}</label>
                                {{-- -How would you rate this customer? --}}
                            </div>
                            <div class="rating activeRating2">
                                <input type="radio" id="rating_2_star5" name="customer_rating_2" value="5" />
                                <label class="star" for="rating_2_star5">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_2_star4" name="customer_rating_2" value="4" />
                                <label class="star" for="rating_2_star4">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_2_star3" name="customer_rating_2" value="3" />
                                <label class="star" for="rating_2_star3">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_2_star2" name="customer_rating_2" value="2" />
                                <label class="star" for="rating_2_star2">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_2_star1" name="customer_rating_2" value="1" />
                                <label class="star" for="rating_2_star1">
                                    <div class="fa fa-star"></div>
                                </label>
                            </div>
                        @endif
                        @if ($query[12]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="How would you rate this customer?" class="inputSearch"> -->
                                <label for="">{{ $query[12]->title }}</label>
                                {{-- -How would you rate this customer? --}}
                            </div>
                            <div class="rating activeRating3">
                                <input type="radio" id="rating_3_star5" name="customer_rating_3" value="5" />
                                <label class="star" for="rating_3_star5">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_3_star4" name="customer_rating_3" value="4" />
                                <label class="star" for="rating_3_star4">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_3_star3" name="customer_rating_3" value="3" />
                                <label class="star" for="rating_3_star3">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_3_star2" name="customer_rating_3" value="2" />
                                <label class="star" for="rating_3_star2">
                                    <div class="fa fa-star"></div>
                                </label>
                                <input type="radio" id="rating_3_star1" name="customer_rating_3" value="1" />
                                <label class="star" for="rating_3_star1">
                                    <div class="fa fa-star"></div>
                                </label>
                            </div>
                        @endif
                        {{-- end --}}
                        @if ($query[6]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Was the customer easy to work with?" class="inputSearch"> -->
                                <label for="">{{ $query[6]->title }}</label>
                                {{-- --Was the customer easy to work with? --}}
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test1" value="{{ $query[6]->answer }}" name="customer_work"
                                            checked>
                                        <label for="test1">{{ $query[6]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" value="{{ $query[6]->answer2 }}" id="test2" name="customer_work">
                                        <label for="test2">{{ $query[6]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        @if ($query[13]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Was the customer easy to work with?" class="inputSearch"> -->
                                <label for="">{{ $query[13]->title }}</label>
                                {{-- --Was the customer easy to work with? --}}
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test13" value="{{ $query[13]->answer }}" name="customer_work_2"
                                            checked>
                                        <label for="test13">{{ $query[13]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" value="{{ $query[13]->answer2 }}" id="test23" name="customer_work_2">
                                        <label for="test23">{{ $query[13]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif

                        {{-- custom customer easy --}}
                        @if ($query[14]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <label for="">{{ $query[14]->title }}</label>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test14" value="{{ $query[14]->answer }}" name="customer_work_3"
                                            checked>
                                        <label for="test14">{{ $query[14]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" value="{{ $query[14]->answer2 }}" id="test15" name="customer_work_3">
                                        <label for="test15">{{ $query[14]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- end --}}
                        @if ($query[7]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Did the customer pay on time?" class="inputSearch"> -->
                                <label for="">{{ $query[7]->title }}</label>
                                {{-- --Did the customer pay on time? --}}
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test3" value="{{ $query[7]->answer }}" name="customer_payment_time"
                                            checked>
                                        <label for="test3">{{ $query[7]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test4" value="{{ $query[7]->answer2 }}"
                                            name="customer_payment_time">
                                        <label for="test4">{{ $query[7]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- custom customer pay --}}
                        @if ($query[15]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <label for="">{{ $query[15]->title }}</label>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_payment_time_2" value="{{ $query[15]->answer }}"
                                            name="customer_payment_time_2" checked>
                                        <label for="customer_payment_time_2">{{ $query[15]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_payment_time_2_2" value="{{ $query[15]->answer2 }}"
                                            name="customer_payment_time_2">
                                        <label for="customer_payment_time_2_2">{{ $query[15]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- end --}}
                        {{-- custom customer pay --}}
                        @if ($query[16]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <label for="">{{ $query[16]->title }}</label>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_payment_time_3" value="{{ $query[16]->answer }}"
                                            name="customer_payment_time_3" checked>
                                        <label for="customer_payment_time_3">{{ $query[16]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_payment_time_3_2" value="{{ $query[16]->answer2 }}"
                                            name="customer_payment_time_3">
                                        <label for="customer_payment_time_3_2">{{ $query[16]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- end --}}
                        @if ($query[8]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="inputSearch"> -->
                                <label for="" class="inputSearch">{{ $query[8]->title }}</label>
                                {{-- Would you recommend this customer to other businesses? --}}
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test5" value="{{ $query[8]->answer }}"
                                            name="customer_recommendation" checked>
                                        <label for="test5">{{ $query[8]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="test6" value="{{ $query[8]->answer2 }}"
                                            name="customer_recommendation">
                                        <label for="test6">{{ $query[8]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- other bussines --}}
                        @if ($query[17]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="inputSearch"> -->
                                <label for="" class="inputSearch">{{ $query[17]->title }}</label>
                                {{-- Would you recommend this customer to other businesses? --}}
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_recommendation_2" value="{{ $query[17]->answer }}"
                                            name="customer_recommendation_2" checked>
                                        <label for="customer_recommendation_2">{{ $query[17]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_recommendation_26" value="{{ $query[17]->answer2 }}"
                                            name="customer_recommendation_2">
                                        <label for="customer_recommendation_26">{{ $query[17]->answer2 }}</label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- end --}}
                        {{-- other bussiness --}}
                        @if ($query[18]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="inputSearch"> -->
                                <label for="" class="inputSearch">{{ $query[18]->title }}</label>
                                {{-- Would you recommend this customer to other businesses? --}}
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_recommendation_3" value="{{ $query[18]->answer }}"
                                            name="customer_recommendation_3" checked>
                                        <label for="customer_recommendation_3">{{ $query[18]->answer }}</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <p>
                                        <input type="radio" id="customer_recommendation_36" value="{{ $query[18]->answer2 }}"
                                            name="customer_recommendation_3">
                                        <label for="customer_recommendation_36">
                                            {{ $query[18]->answer2 }}
                                        </label>
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- end --}}
                        {{-- description --}}
                        @if ($query[9]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <textarea type="message" name="customer_description" id="" cols="85" rows="7"
                                    placeholder="{{ $query[9]->title }}"></textarea>
                            </div>
                        @endif
                        @if ($query[19]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <textarea type="message" name="customer_description_2" id="" cols="85" rows="7"
                                    placeholder="{{ $query[19]->title }}"></textarea>
                            </div>
                        @endif
                        @if ($query[20]->status == 1)
                            <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <textarea type="message" name="customer_description_3" id="" cols="85" rows="7"
                                    placeholder="{{ $query[20]->title }}"></textarea>
                            </div>
                        @endif
                        {{-- description end --}}

                        <div class="d-flex justify-content-end align-items-center col-lg-12 accept  wow animated fadeInLeft"
                            data-wow-duration="1s" data-wow-delay="0.5s">
                            <p>
                                <input type="checkbox" id="test7" value="1" name="accept_terms"
                                    class="form-check-input">
                                <label for="test7"><a href="{{ route('terms.and.conditions') }}"
                                        style="text-decoration: none;">{{ $query[10]->title }}</a></label>
                                {{-- --Accept Term & Condition --}}
                            </p>
                        </div>
                        <div class="col-lg-12 mb-3 text-center">
                            <a href="javascript:void(0)"><button type="submit" class="Btnlogin wow animated bounceIn"
                                    data-wow-duration="1s" data-wow-delay="0.5s">Save</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <script type="text/javascript">
            document.getElementById('phone12').addEventListener('input', function(e) {
                var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
            });

            let rating = document.getElementsByName('rating');
            rating.forEach((e) => {
                e.addEventListener('click', function() {
                    console.log(e.value);
                })
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function() {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $("#customerreview").on('submit', function(e) {


var customer_rating = $("input[name=customer_rating]").is(":checked");
var customer_rating_2 = $("input[name=customer_rating_2]").is(":checked");
var customer_rating_3 = $("input[name=customer_rating_3]").is(":checked");
console.log('customer_rating')
console.log($("div").hasClass("activeRating2"));
console.log('customer_rating')

if($("div").hasClass("activeRating1") && customer_rating==false){
    toastr.error('Rating must be selected');
    return false
}
if($("div").hasClass("activeRating2") && customer_rating_2==false){
    toastr.error('Rating must be selected');
    return false
}
if($("div").hasClass("activeRating3") && customer_rating_3==false){
    toastr.error('Rating must be selected');
    return false
}

                    e.preventDefault();
                    //  var form = $("#register");
                    e.stopImmediatePropagation();
                    var form = $("#customerreview").closest("form");
                    var formData = new FormData(form[0]);

                    $.ajax({
                        url: "{{ route('customer-review') }}",
                        type: 'POST',
                        data: formData,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        //  beforeSend: function() {
                        //      $("#preloader").css('display','block');
                        //  },
                        success: function(response, data) {
                            //   $("#preloader").css('display','none');
                            if (response.status == 400) {
                                $.each(response.errors, function(prefix, val) {
                                    toastr.error(val[0]);
                                });
                            }
                            if (response.status == 409) {
                                swal({
                                    title: "Review!",
                                    text: response.message,
                                    type: "error",
                                    icon: "error",
                                }).then(function() {});
                            }
                            if (response.status == 419) {
                                swal({
                                    title: "Admin!",
                                    text: response.message,
                                    type: "error",
                                    icon: "error",
                                }).then(function() {});
                            }

                            if (response.status == 200) {
                                swal({
                                    title: "Review!",
                                    text: response.message,
                                    type: "success",
                                    icon: "success",
                                }).then(function() {

                                });
                                $('#customerreview')[0].reset();

                            }
                        }

                    });

                });
            });
        </script>
    @endsection
