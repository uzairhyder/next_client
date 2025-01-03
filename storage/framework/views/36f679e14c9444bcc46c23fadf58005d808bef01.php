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
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">Review Details</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Review</li>
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

        /* review css */
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
                        <a class="btn btn-success" href="<?php echo e(route('customer-reviews')); ?>" data-bs-original-title=""
                            title="">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <tbody>
                                    <tr>
                                        <th>User Name</th>
                                        <td><?php echo e($detail->get_user->name ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <td><?php echo e($detail->first_name ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td><?php echo e($detail->last_name ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo e($detail->email ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td><?php echo e($detail->contact ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td><?php echo e(date('j-M-Y g:i A', strtotime($detail->created_at)) ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo e($detail->address ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>How would you rate this customer?</th>
                                        <td>
                                            <div class="rating">
                                                <input type="radio" id="star5" name="customer_rating" value="5"
                                                    disabled <?php if($detail->customer_rating == 5): ?> checked <?php endif; ?> />
                                                <label class="star" for="star5"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star4" name="customer_rating" value="4"
                                                    disabled <?php if($detail->customer_rating == 4): ?> checked <?php endif; ?> />
                                                <label class="star" for="star4"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star3" name="customer_rating" value="3"
                                                    disabled <?php if($detail->customer_rating == 3): ?> checked <?php endif; ?> />
                                                <label class="star" for="star3"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star2" name="customer_rating" value="2"
                                                    disabled <?php if($detail->customer_rating == 2): ?> checked <?php endif; ?> />
                                                <label class="star" for="star2"><span
                                                        class="fa fa-star"></span></label>
                                                <input type="radio" id="star1" name="customer_rating" value="1"
                                                    disabled <?php if($detail->customer_rating == 1): ?> checked <?php endif; ?> />
                                                <label class="star" for="star1"><span
                                                        class="fa fa-star"></span></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Was the customer easy to work with?</th>
                                        <td>
                                            <?php if($detail->working_with_customer == 1): ?>
                                                Yes
                                            <?php else: ?>
                                                No
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Did the customer pay on time?</th>
                                        <td>
                                            <?php if($detail->customer_pay_time == 1): ?>
                                                Yes
                                            <?php else: ?>
                                                No
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Would you recommend this customer to other businesses?</th>
                                        <td>
                                            <?php if($detail->customer_recommendation == 1): ?>
                                                Yes
                                            <?php else: ?>
                                                No
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo e($detail->customer_description ?? ''); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/admin_dashboard/reviews/detail.blade.php ENDPATH**/ ?>