 <?php
    $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
    $config = App\Models\BackendModels\Configuration::first();
    $social = App\Models\BackendModels\Social::first();
 ?>
<?php $__env->startSection('title','404'); ?>

<?php echo $__env->make('frontend.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<body>

    <?php echo $__env->make('frontend.common.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="d-flex justify-content-center align-items-center contactBanner signDiv" style="background:url(<?php echo e(asset('front_assets/images/1x/conBanner.png')); ?>)">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                        <div class="contactBannerDiv">
                            <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                                    404</span>
                            </h1>
                        </div>
                    </div>
                    <div id="userlogin" class="signForm ">
                        <div class="col-md-8 offset-md-2">
                            <p class="sub-content">The page you are attempting to reach is currently not available. This may be because the page does not exist or has been moved.</p>
                        </div>

                        <?php if(!Auth::check() || Auth::check() && Auth::user()->role  != 1): ?>
                        <div class="point d-flex justify-content-center mt-5">
                            <a href="<?php echo e(route('home')); ?>">
                                <button type="button" class="Btn">BACK TO HOME PAGE</button></a>
                        </div>
                        <?php endif; ?>

                        <?php if(Auth::check() && Auth::user()->role == 1): ?>
                        <div class="point d-flex justify-content-center mt-5">
                            <a href="<?php echo e(route('admin-home')); ?>">
                                <button type="button" class="Btn">BACK TO DASHBOARD</button></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php echo $__env->make('frontend.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </html>
</body>




<?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/frontend/404.blade.php ENDPATH**/ ?>