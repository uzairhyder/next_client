    
<?php $__env->startSection('title','Review'); ?>

<?php $__env->startSection('content'); ?>
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
                    <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo e($banner_review->title1 ?? ''); ?><span>
                            <?php echo e($banner_review->title2 ?? ''); ?> <br><?php echo e($banner_review->title3 ?? ''); ?></span>
                    </h1>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 pt-5">
                <div class="inner-img wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="innerDiv position-relative">
                        <img src="<?php echo e(url('public/banner',$banner_review->banner_image)); ?>" alt="">
                        <div class="firstDiv  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo e(asset('front_assets/images/1x/overlayImg.png')); ?>" alt="">
                        </div>
                        <div class="lastDiv  wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo e(asset('front_assets/images/1x/overlayImg1.png')); ?>" alt="">

                        </div>
                    </div>
                    <!-- <img src="../imgaes/1x/banner-inner.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
<!--  -->
<section class="sectionCstm">
    <div class="container">
        <form id="customerreview" class="form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Tell Us About
                    <span class="fontstyling">Your Experience</span></h4>

                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="text" placeholder="First Name" name="first_name" class="inputSearch">
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="text" placeholder="Last Name" name="last_name" class="inputSearch">
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="email" placeholder="Email" name="email" class="inputSearch">
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="tel" id="phone12" name="contact" placeholder="Contact No." class="inputSearch">
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="text" placeholder="Address" name="address" class="inputSearch">
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s" data-wow-delay="0.5s">
                    <!-- <input type="text" placeholder="How would you rate this customer?" class="inputSearch"> -->
                    <label for="">How would you rate this customer?</label>
                </div>
                

                <div class="rating">
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

                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s" data-wow-delay="0.5s">
                    <!-- <input type="text" placeholder="Was the customer easy to work with?" class="inputSearch"> -->
                    <label for="">Was the customer easy to work with?</label>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <!-- <input type="radio" value="yes" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pb-2 pr-2 ">Yes</label> -->
                        <p>
                            <input type="radio" id="test1" value="1" name="customer_work" checked>
                            <label for="test1">Yes</label>
                        </p>
                        <!-- <p>
                            <input type="radio" id="test2" name="radio-group">
                            <label for="test2">No</label>
                          </p> -->
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <!-- <input type="radio" value="no" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pb-2 pr-2">No</label> -->
                        <p>
                            <input type="radio" value="2" id="test2" name="customer_work">
                            <label for="test2">No</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight label" data-wow-duration="1s" data-wow-delay="0.5s">
                    <!-- <input type="text" placeholder="Did the customer pay on time?" class="inputSearch"> -->
                    <label for="">Did the customer pay on time?</label>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <!-- <input type="radio" value="yes" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pb-2 pr-2 ">Yes</label> -->
                        <p>
                            <input type="radio" id="test3" value="1" name="customer_payment_time" checked>
                            <label for="test3">Yes</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <!-- <input type="radio" value="no" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pb-2 pr-2">No</label> -->
                        <p>
                            <input type="radio" id="test4" value="2" name="customer_payment_time">

                            <label for="test4">No</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s" data-wow-delay="0.5s">
                    <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="inputSearch"> -->
                    <label for="" class="inputSearch">Would you recommend this customer to other businesses?</label>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <!-- <input type="radio" value="yes" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pb-2 pr-2 ">Yes</label> -->
                        <p>
                            <input type="radio" id="test5" value="1" name="customer_recommendation" checked>
                            <label for="test5">Yes</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s" data-wow-delay="0.5s">

                        <!-- <input type="radio" value="no" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pb-2 pr-2">No</label> -->
                        <p>
                            <input type="radio" id="test6" value="2" name="customer_recommendation">
                            <label for="test6">No</label>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <textarea type="message" name="customer_description" id="" cols="85" rows="7" placeholder="Description..."></textarea>
                </div>
                <div class="d-flex justify-content-end align-items-center col-lg-12 accept  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <!-- <input type="radio" value="no" class="checkbox" name="radio-stacked" id="yessuffer" required="">
                        <label for="" class="pr-2">Accept Term & Condition</label>      -->
                    <p>
                        <input type="checkbox" id="test7" value="1" name="accept_terms" class="form-check-input">
                        <label for="test7">Accept Term & Condition</label>
                    </p>
                </div>
                <div class="col-lg-12 mb-3 text-center">
                    <a href="javascript:void(0)"><button type="submit" class="Btnlogin wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Save</button></a>
                </div>
            </div>
        </form>
    </div>
</section>
<!--  -->
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
    })

</script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>


<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#customerreview").on('submit', function(e) {

            e.preventDefault();
            //  var form = $("#register");
            e.stopImmediatePropagation();
            var form = $("#customerreview").closest("form");
            var formData = new FormData(form[0]);

            $.ajax({
                url: "<?php echo e(route('customer-review')); ?>"
                , type: 'POST'
                , data: formData
                , dataType: "json"
                , processData: false
                , contentType: false
                ,
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
                            title: "Review!"
                            , text: response.message
                            , type: "error"
                            , icon: "error"
                        , }).then(function() {});
                    }
                    if (response.status == 419) {
                        swal({
                        title: "Admin!"
                        , text: response.message
                        , type: "error"
                        , icon: "error"
                        , }).then(function() {});
                    }

                    if (response.status == 200) {
                        swal({
                            title: "Review!"
                            , text: response.message
                            , type: "success"
                            , icon: "success"
                        , }).then(function() {

                        });
                        $('#customerreview')[0].reset();

                    }
                }

            });

        });
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/frontend/review.blade.php ENDPATH**/ ?>