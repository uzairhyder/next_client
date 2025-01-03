<?php
    $favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
    //   dd($favicon)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
     <link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">

     <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/style.css')); ?>">
    <!-- bootstrap 5 -->

    <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/bootstrap.min.css')); ?>">

    <!-- Butter js -->
    <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/butter.css')); ?>">

    <!-- wow css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



    <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/wow.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <title>NC || Dashboard</title>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
                 <!-- Heading -->
                 <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item">
                     <a href="<?php echo e(route('profile')); ?>" class="nav-link collapsed <?php echo e(Request::routeIs('profile') ? 'active12' : ''); ?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                <?php if(Route::currentRouteName() == 'profile'): ?>
                                    <img src="<?php echo e(asset('front_assets/images/SVG/purple.svg')); ?>" alt="">
                                <?php else: ?>
                                   <img src="<?php echo e(asset('front_assets/images/SVG/profile.svg')); ?>" alt="">
                                <?php endif; ?>
                             </div>
                             <div class="imgSvgText"><span>Profile</span></div>
                         </div>
                     </a>
                 </li>


                 <!-- Nav Item - Utilities Collapse Menu -->
                 <li class="nav-item">
                     <a href=" <?php echo e(route('purchased-package')); ?>" class="nav-link collapsed <?php echo e(Request::routeIs('purchased-package') ? 'active12' : ''); ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                 <?php if(Route::currentRouteName() == 'purchased-package'): ?>
                                    <img src="<?php echo e(asset('front_assets/images/SVG/purplepackage.svg')); ?>" alt="">
                                 <?php else: ?>
                                    <img src="<?php echo e(asset('front_assets/images/SVG/package1.svg')); ?>" alt="">
                                 <?php endif; ?>
                             </div>
                             <div class="imgSvgText"><span>Package</span></div>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item">
                    <a href=" <?php echo e(route('user-given-reviews')); ?>" class="nav-link collapsed <?php echo e(Request::routeIs('user-given-reviews') ? 'active12' : ''); ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

                        <div class="d-flex align-items-center">
                            <div class="imgSvg">
                                <?php if(Route::currentRouteName() == 'user-given-reviews'): ?>
                                <img src="<?php echo e(asset('front_assets/images/SVG/purplepackage.svg')); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(asset('front_assets/images/SVG/package1.svg')); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="imgSvgText"><span>Reviews</span></div>
                        </div>
                    </a>
                </li>
                 <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item">
                     <a href="<?php echo e(route('change-password')); ?>" class="nav-link collapsed <?php echo e(Request::routeIs('change-password') ? 'active12' : ''); ?>" data-toggle=" collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">

                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                 <?php if(Route::currentRouteName() == 'change-password'): ?>
                                    <img src="<?php echo e(asset('front_assets/images/SVG/purplelock.svg')); ?>" alt="">
                                 <?php else: ?>
                                   <img src="<?php echo e(asset('front_assets/images/SVG/lock.svg')); ?>" alt="">
                                 <?php endif; ?>
                             </div>
                             <div class="imgSvgText"><span>Change Password</span></div>
                         </div>
                     </a>
                 </li>

                 <!-- Nav Item - Charts -->
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(route('user-logout')); ?>">
                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                 <img src="<?php echo e(asset('front_assets/images/SVG/logout.svg')); ?>" alt="">
                             </div>
                             <div class="imgSvgText"><span>Logout</span></div>
                         </div>
                     </a>
                 </li>

                 <!-- Sidebar Toggler (Sidebar) -->
                 <div class="text-center d-none d-md-inline">
                     <button class="rounded-circle border-0" id="sidebarToggle"></button>
                 </div>
</ul>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type','info')); ?>"
    switch (type) {
        //    case 'info':
        //    toastr.info(" <?php echo e(Session::get('message')); ?> ");
        //    break;
        case 'success':
            toastr.success(" <?php echo e(Session::get('message')); ?> ");
            break;
        case 'warning':
            toastr.warning(" <?php echo e(Session::get('message')); ?> ");
            break;
        case 'error':
            toastr.error(" <?php echo e(Session::get('message')); ?> ");
            break;
    }
    <?php endif; ?>

</script>

<?php if($errors->any()): ?>

<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<script>
    toastr.error('<?php echo e($error); ?>');

</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<!-- jquery -->

<script src="<?php echo e(asset('front_assets/js/jquery.min.js')); ?>"></script>
<!-- bootstrap jquery -->


<script src="<?php echo e(asset('front_assets/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Butter js -->

<script src="<?php echo e(asset('front_assets/js/butter.js')); ?>"></script>


<!-- wow js -->


<script src="<?php echo e(asset('front_assets/js/wow.js')); ?>"></script>

<!-- custom js -->


</body>

<?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/user_dashboard/common/sidebar.blade.php ENDPATH**/ ?>