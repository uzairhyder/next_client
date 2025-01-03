<?php $__env->startSection('title', 'Packages'); ?>

<?php $__env->startSection('content'); ?>
    
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    
    
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
                                Exlpore Packages</span>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="pkgSection">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center cardCol">

                        <label class="w-100">
                            <input type="text" name="package"hidden>
                            <div class="card Package-card p-card" onclick="get_package('<?php echo e($value->id); ?>')">
                                <div class="cstm-card-background">
                                    <img src="<?php echo e(asset('images/' . $value->image)); ?>" alt="">
                                </div>

                                <div class="pakagesInner wow animated fadeInLeft p-card" data-wow-duration="1s"
                                    data-wow-delay="0.5s">
                                    <div class="pakagesInner">
                                        <div class="divMon">
                                            <h4><?php echo e($value->title ?? ''); ?></h4>
                                            <?php if($value->id != 7): ?>
                                                <span>$<?php echo e($value->price ?? ''); ?></span>
                                            <?php endif; ?>
                                            <p><?php echo $value->description ?? ''; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-12 mb-3 mt-4 text-center" id="showBtn">
                    
                </div>
            </div>
        </div>
    </section>
    <!--  -->




<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function get_package(id) {
            if (id == 7) {

                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('usersignup-package')); ?>",
                    data: {
                        "id": id
                    },
                    beforeSend: function() {
                        $("#preloader").css('display', 'block');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            console.log(response.status);
                            window.location.href = "<?php echo e(route('signup')); ?>";
                            // setTimeout(() => {
                            //     window.location.href = "<?php echo e(env('APP_URL')); ?>login?msg=true";
                            // }, 500);

                            // var currentUrl = window.location.href;
                            // var subscriptionRoute = "<?php echo e(route('packages')); ?>";

                            // if (currentUrl != subscriptionRoute) {
                            //     swal({
                            //         title: "Signup!",
                            //         text: response.message,
                            //         type: "success",
                            //         icon: "success",
                            //     }).then(function() {
                            //         window.location.href = "<?php echo e(route('login')); ?>";
                            //     });
                            // } else {
                            //     window.location.href = "<?php echo e(route('login')); ?>";
                            // }


                        }


                    }
                });
            } else {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('usersignup-package')); ?>",
                    data: {
                        "id": id
                    },
                    beforeSend: function() {
                        $("#preloader").css('display', 'block');
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            console.log(response.status);
                            window.location.href = "<?php echo e(route('signup')); ?>";
                            // toastr.success('Package (' + response.title + ' ' + response.price +
                            //     ') has been selected, successfully!');
                            // $("#preloader").css('display', 'none');
                            // $("#payment_redirect").attr("href", "<?php echo e(route('signuppaypal-amount-update')); ?>");
                            // .then(function() {
                            //     window.location.href = "<?php echo e(route('signuppaypal-amount-update')); ?>";
                            // });

                        }


                    }
                });

            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/frontend/exlpore-packages.blade.php ENDPATH**/ ?>