<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>

</style>
    <div class="container-fluid p-0" >
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card logincolor" style="background-image:url(<?php echo e(asset('front_assets/images/1x/banner.png')); ?>)">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                
                                <h4 class="align-center">Next Client Admin Dashboard</h4>
                                
                                <p>Enter your email & password to login</p>
                                <!-- Email Address -->

                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Test@gmail.com">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="*********">
                                </div>

                                <!-- Remember Me -->
                                <div class="form-group mb-0">

                                    <?php if(Route::has('register')): ?>
                                        
                                    <?php endif; ?>
                                    <button class="btn btn-primary btn-block" type="submit">Log in</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/auth/login.blade.php ENDPATH**/ ?>