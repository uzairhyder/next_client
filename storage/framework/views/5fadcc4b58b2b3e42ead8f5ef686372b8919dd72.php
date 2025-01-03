<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <!-- <h3>Inquiry Details</h3> -->
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">User Details to Update Profile</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active"> Management</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
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

        .deteleButton a {
            color: #fff !important;
        }

        .editButton {
            background-color: #22B573;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .editButton a {
            color: #fff !important;
        }

        .round-cstm-btn-green {
            border-radius: 30px !important;
            padding: 10px 20px !important;
            font-family: Poppins-Regular;
            background-color: #00a808 !important;
            border: none;
        }

        .round-cstm-btn-red a,
        .round-cstm-btn-green a {
            color: #fff;
            font-size: 14px;
        }

        .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
            height: 100% !important;
        }

        .for-back {
            display: flex;
            padding: 10px 30px;
            border-bottom: 1px solid #ecf3fa;
            flex-direction: row-reverse;
        }
    </style>
    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="for-back">
                        <a class="btn btn-success" href="<?php echo e(route('user-index')); ?>" data-bs-original-title=""
                            title="">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            
                            <table class="display" id="basic-1">
                                <tbody>
                                    <?php if($detail): ?>
                                        <?php if($detail->profile_image !== $detail->get_userprofile->profile_image): ?>
                                            <tr>
                                                <th>User Profile Image</th>
                                                <td>
                                                    <div class="profile">
                                                        <?php if(!empty($detail->profile_image ?? '')): ?>
                                                            <img src="<?php echo e(url('public/profiles/' . $detail->profile_image ?? '')); ?>"
                                                                width="100px" height="100px" style="object-fit: contain;" alt="">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>" width="100px"
                                                                height="100px" alt="">
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($detail->first_name !== $detail->get_userprofile->first_name): ?>
                                            <tr>
                                                <th>First Name</th>
                                                <td><?php echo e($detail->first_name); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($detail->last_name !== $detail->get_userprofile->last_name): ?>
                                            <tr>
                                                <th>Last Name</th>
                                                <td><?php echo e($detail->last_name); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <!-- Repeat the same pattern for other fields -->
                                        <?php if($detail->email !== $detail->get_userprofile->email): ?>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo e($detail->email); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($detail->contact !== $detail->get_userprofile->contact): ?>
                                            <tr>
                                                <th>Contact</th>
                                                <td><?php echo e($detail->contact); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <!-- Continue repeating for other fields -->
                                        <?php if($detail->business_license !== $detail->get_userprofile->business_license): ?>
                                            <tr>
                                                <th>Business License</th>
                                                <td><?php echo e($detail->business_license); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($detail->business_information !== $detail->get_userprofile->business_information): ?>
                                            <tr>
                                                <th>Business Information</th>
                                                <td><?php echo e($detail->business_information); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($detail->business_license_copy !== $detail->get_userprofile->business_license_copy): ?>
                                            <tr>
                                                <th>Copy of Business License</th>
                                                <td><?php echo e($detail->business_license_copy ?? 'N/A'); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <!-- Add the last row outside the if block -->
                                        <tr>
                                            <th>Apprroved</th>
                                            <td>
                                                <a href="<?php echo e(route('user-profile-update', ['id' => $detail->user_id])); ?>">
                                                    <button class="btn btn-danger btn-sm" id="status"><i class="fa fa-lock"></i> Not Approved
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/jquery.barrating.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/rating-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/product-list-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/admin_dashboard/users/approve-user-detail.blade.php ENDPATH**/ ?>