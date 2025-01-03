<?php $__env->startSection('title','How It Works'); ?>

<?php $__env->startSection('content'); ?>

<!--Banner  -->
<section class="d-flex justify-content-center contactBanner signDiv" style="background:url(<?php echo e(asset('front_assets/images/1x/conBanner.png')); ?>)">

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                <div class="contactBannerDiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                    <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                            <?php echo e($terms->title ?? ''); ?></span>


                    </h1>
                </div>
            </div>
            <div class="col-lg-12">
                <p class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo $terms->description ?? ''; ?></p>

            </div>
        </div>
    </div>
</section>
<!--  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/frontend/how-it-works.blade.php ENDPATH**/ ?>