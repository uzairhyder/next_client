<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>


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

    @keyframes  spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    .point p::after {
        /* top: 0px; */
        content: "\2713";
        position: absolute;
        left: 0;
        transform: rotate(18deg);
        font-weight: 900;

    }

    .point {
        margin-left: 0rem ;

    }

    .point p {
        margin-left: 30px;
    }


    .point li::after {
    /* top: 0px; */
        content: "\2713";
        position: absolute;
        left: 0;
        transform: rotate(18deg);
        font-weight: 900;
        margin-left: 1.5rem;
    }

    .point {
        margin-left: 0rem;
    }

    .point ul {
        margin-left: 30px;
    }

    .for-fonts {
       font-family: 'Gilroy-Light';
       color: #333333;
       font-size: 1.2rem;
       margin-left: 2.5rem
    }

    .for-margin {
        margin-left: 3.5rem;
    }


</style>
<?php if(Session::has('message')): ?>
<script type="text/javascript">
    swal("Logout!", "<?php echo e(Session::get('message')); ?>", "success");
</script>
<?php echo e(Session::forget('message')); ?>


<?php endif; ?>

<?php if(Session::has('search')): ?>
<script type="text/javascript">
    swal("Search!", "Please enter at least one field to search !", "error");

</script>
<?php endif; ?>

<?php if(Session::has('admin')): ?>
<script type="text/javascript">
    swal("Admin!", "You are logged in as admin please logout first !", "error");

</script>
<?php endif; ?>



<!--Banner  -->
<section class="banner d-flex justify-content-center align-items-center w-100">
    <div class="container mt-5 pt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="text-div wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h1><span><?php echo e($banners->title1 ?? ''); ?></span> <?php echo e($banners->title2 ?? ''); ?><br> <?php echo e($banners->title3 ?? ''); ?> <span><?php echo e($banners->title4 ?? ''); ?></span>
                        <?php echo e($banners->title5 ?? ''); ?></h1><br>
                    <h1><span><?php echo e($banners->title6 ?? ''); ?></span>
                    </h1>
                    <?php echo $banners->description ?? ''; ?>


                </div>
                <div class="d-flex align-item-center mb-5 BtnGroup">
                    <div class="exploreBtndiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><a href="<?php echo e(route('explore-packages')); ?>">

                            <button type="button" class="Btn">Explore Now</button></a></div>
                    <div class="sign-div wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><a href="<?php echo e(route('contact')); ?>"><button class="Btn" type="button">
                                Contact Us</button></a></div>

                            </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="inner-img wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="innerDiv position-relative">

                        <img src="<?php echo e(url('public/banner/' . $banners->banner_image ??'')); ?>" alt="">
                        <div class="firstDiv  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo e(asset('front_assets/images/1x/overlayImg.png')); ?>" alt="">
                        </div>
                        <div class="lastDiv  wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo e(asset('front_assets/images/1x/overlayImg1.png')); ?>" alt="">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 mx-auto d-flex justify-content-center Search">
                <div id="homeseacrhloader" class="loader"></div>
                <form method="post" action="<?php echo e(route('search-customers')); ?>" class="example wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s" id="searchdataform">
                    <?php echo csrf_field(); ?>
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="search" placeholder="Search Here" name="search">
                </form>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="second-section mt-3">
    <div class="container">
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-6 col-sm-12">
                <div class="innerDivSectionTwo wow animated fadeInLeft position-relative" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="<?php echo e(url('public/banner/' . $second_section->banner_image ??'')); ?>" alt="">
                    <div class="firstDivSectionTwo  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="<?php echo e(asset('front_assets/images/1x/overlayImg1.png')); ?>" alt="">
                    </div>
                    <div class="lastDivSectionTwo  wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="<?php echo e(asset('front_assets/images/1x/overlayImg.png')); ?>" alt="">

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="text-div wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h2><span><?php echo e($second_section->title1 ?? ''); ?></span></h2>
                    <p><?php echo e($second_section->title2 ?? ''); ?></p>
                    <span><?php echo e($second_section->title3 ?? ''); ?></span>
                    <br>
                    <div class="point position-relative for-margin">
                            <div class="right-icon">
                                <?php echo $second_section->description; ?>

                            </div>

                        

                        <?php if(!Auth::check() || Auth::check() && Auth::user()->role == 1 ): ?>
                        <a href="<?php echo e(route('signup')); ?>">
                            <button type="button" class="Btn">Create An Account</button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
<!-- third section -->
<section class="third-section">
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-6 col-sm-12 d-flex justify-content-center align-item-center">
                <div class="text-div wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h2><span><?php echo e($third_section->title1 ?? ''); ?></span></h2>
                    <h3><?php echo e($third_section->title2 ?? ''); ?></h3>
                    <div class="">
                        <div class="right-icon for-fonts">
                            
                                <?php echo $third_section->description; ?>

                            
                        </div>
                        
            </div>
            <div class="d-flex align-item-center pt-4 mt-5">

                 <?php if(!Auth::check() || Auth::check() && Auth::user()->role == 1 ): ?>

                <div class="exploreBtndiv"><a href="<?php echo e(route('signup')); ?>">

                        <button type="button" class="Btn">Become a Member</button></a></div>
                 <?php endif; ?>
                <div class="sign-div"><a href="<?php echo e(route('explore-packages')); ?>"><button class="Btn" type="button">
                            Explore Packages</button></a></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12 d-flex justify-content-center align-item-center">
        <div class="innerDivSectionTwo wow animated fadeInLeft position-relative" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="<?php echo e(url('public/banner/' . $third_section->banner_image)); ?>" alt="">
            <div class="firstDivSectionTwo  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?php echo e(asset('front_assets/images/1x/overlayImg1.png')); ?>" alt="">

            </div>
            <div class="lastDivSectionTwo  wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?php echo e(asset('front_assets/images/1x/overlayImg.png')); ?>" alt="">
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!--  -->
<!-- forth vedio section -->
<section class="vedioBg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-0 p-0">
                <div class="card text-center">
                    <div class="video-box-width" style="background-image:url(<?php echo e(url('public/banner',$video_section->banner_image)); ?>)">
                        <a href="<?php echo e(url('public/video',$video_section->video)); ?>" id="video1" class="popup-btn" data-video="<?php echo e(url('public/video',$video_section->video)); ?>" data-bs-toggle="modal" data-bs-target="#videoModal1">
                            <div class="video-box">
                                <video id="background-video" class="position-relative myvideos" loop="" muted="">
                                    <source src="<?php echo e(url('public/video',$video_section->video)); ?>" type="video/mp4">
                                </video>
                                <div class="overlay">
                                    <div class="play-font">
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--  -->
<!-- fifth section -->
<section class="fifthSection">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-sm-12">
                <div class="fifthSecdiv">
                    <h4 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo e($sell->title1 ?? ''); ?>

                        <span><?php echo e($sell->title2 ?? ''); ?> <br></span><?php echo e($sell->title3 ?? ''); ?> <br>
                        <?php echo e($sell->title4 ?? ''); ?>

                    </h4>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 zIndex">
                <div class="image3Div wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="<?php echo e(url('public/banner',$sell->banner_image)); ?>" alt="">
                </div>

            </div>
        </div>
    </div>

    <div class="whiteDiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">

         <?php if(!Auth::check() || Auth::check() && Auth::user()->role == 1 ): ?>

        <div class="whiteDivBtn BtnZindex">
            <a href="<?php echo e(route('signup')); ?>"><button type="button" class="Btn">Become a Member</button></a>
        </div>
         <?php endif; ?>
    </div>

</section>

<!--  -->
<!-- Contant Section -->
<section class="contantSection" style="background:url(<?php echo e(url('public/banner',$contact_section->banner_image)); ?>)">
    <div class="contantSectionFirstDiv">
        <img src="<?php echo e(asset('front_assets/images/1x/layer1.png')); ?>" alt="">
    </div>
    <div class="contantSectionLastDiv">
        <img src="<?php echo e(asset('front_assets/images/1x/layer1.png')); ?>" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="inputFeild">
                    <h3 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo e($contact_section->title1 ?? ''); ?>


                    </h3>
                </div>
                <form class="contactForm" id="contactform" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 col-lg-7 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="text" placeholder="Full Name" name="name" class="text-light" value="<?php echo e(old('name')); ?>" required>
                    </div>
                    <div class="mb-3 col-lg-7 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="email" placeholder="Email" name="email" class="text-light" value="<?php echo e(old('email')); ?>" required>

                    </div>
                    <div class="mb-3 col-lg-7 wow animated fadeInLeft">
                        <input type="tel" id="phone12" placeholder="Contact No." name="contact" class="text-light" value="<?php echo e(old('contact')); ?>" required>

                    </div>

                    <div class="mb-3 col-lg-7 wow animated fadeInRight">
                        <textarea type="message" name="message" id="" name="message" cols="85" rows="7" placeholder="Message" class="text-light" required><?php echo e(old('message')); ?></textarea>
                    </div>
                    <div class="mb-3 col-lg-7">
                        <a><button type="submit" class="btnCont wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Send</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>





<?php echo $__env->make('frontend.common.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#contactform").on('submit', function(e) {
            e.preventDefault();
            var form = $("#contactform");
            $.ajax({
                url: 'inquiry'
                , type: 'GET'
                , data: form.serialize()
                , dataType: 'JSON',
                  beforeSend: function() {
                      $("#preloader").css('display','block');
                 },
                success: function(response, data) {
                    $("#preloader").css('display','none');
                    if (response.status == 400) {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error(val[0]);
                        });
                    } else {
                        swal({
                            title: "Query!"
                            , text: response.message
                            , type: "success"
                            , icon: "success"
                        , }).then(function() {});
                        $('#contactform')[0].reset();
                    }
                }

            });

        });
    });

</script>

<script type="text/javascript">
    document.getElementById('phone12').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#searchdataform').on('submit', function(event) {
            $('#homeseacrhloader').show();

            // Disable submit button
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Hide loader
                    $('#homeseacrhloader').hide();

                    // Enable submit button
                    $('button[type="submit"]').prop('disabled', false);

                    // Handle the response, e.g., update a result div
                    // $('#result').html(response);
                    // Optionally, display a success message to the user

                },
                error: function(xhr, status, error) {
                    // Hide loader
                    $('#homeseacrhloader').hide();

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\next_client\resources\views/frontend/index.blade.php ENDPATH**/ ?>