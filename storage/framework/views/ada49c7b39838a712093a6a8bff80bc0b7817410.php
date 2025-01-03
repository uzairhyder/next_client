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
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details"></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Edit Review</li>
    <li class="breadcrumb-item active"> Management</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .Btnlogin {
            border-radius: 20px;
            padding: 8px 61px;
            border: none;
            background-color: #003d70;
            font-weight: bold;
            color: #fff;
            border: 1px solid #003D70;
        }

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

        .dsaveButton a {
            color: #232ca9 !important;
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Review Details</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="<?php echo e(route('customer-reviews')); ?>">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">

                            <form method="POST" action="<?php echo e(route('update-customer-review', $editreview->id)); ?>"
                                class="form-group">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <input type="hidden"name="status" class="form-control"
                                        value="<?php echo e($editreview->status); ?>">
                                    <h4 class="" data-wow-duration="1s" data-wow-delay="0.5s">Tell Us About
                                        <span class="fontstyling">Your Experience</span>
                                    </h4>
                                    <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <input type="text" placeholder="First Name" name="first_name"
                                            class="form-control" value="<?php echo e($editreview->first_name); ?>">

                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <input type="text" placeholder="Last Name" name="last_name" class="form-control"
                                            value="<?php echo e($editreview->last_name); ?>">
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <input type="email" placeholder="Email" name="email" class="form-control"
                                            value="<?php echo e($editreview->email); ?>">
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <input type="tel" id="phone12" name="contact" placeholder="Contact No."
                                            class="form-control" value="<?php echo e($editreview->contact); ?>">
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <input type="text" placeholder="Address" name="address" class="form-control"
                                            value="<?php echo e($editreview->address); ?>">
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <label for="">How would you rate this customer?</label>
                                    </div>

                                    <div class="rating">
                                        <input type="radio" id="star5" name="customer_rating" value="5"
                                            <?php if($editreview->customer_rating == 5): ?> checked <?php endif; ?> />
                                        <label class="star" for="star5"><span class="fa fa-star"></span></label>
                                        <input type="radio" id="star4" name="customer_rating" value="4"
                                            <?php if($editreview->customer_rating == 4): ?> checked <?php endif; ?> />
                                        <label class="star" for="star4"><span class="fa fa-star"></span></label>
                                        <input type="radio" id="star3" name="customer_rating" value="3"
                                            <?php if($editreview->customer_rating == 3): ?> checked <?php endif; ?> />
                                        <label class="star" for="star3"><span class="fa fa-star"></span></label>
                                        <input type="radio" id="star2" name="customer_rating" value="2"
                                            <?php if($editreview->customer_rating == 2): ?> checked <?php endif; ?> />
                                        <label class="star" for="star2"><span class="fa fa-star"></span></label>
                                        <input type="radio" id="star1" name="customer_rating" value="1"
                                            <?php if($editreview->customer_rating == 1): ?> checked <?php endif; ?> />
                                        <label class="star" for="star1"><span class="fa fa-star"></span></label>
                                    </div>

                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="form-control">Was the customer easy to work
                                            with?</label>
                                    </div>

                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work" required type="radio" id="test1"
                                                    value="1" <?php if($editreview->working_with_customer == 1): ?> checked <?php endif; ?>>
                                                <label for="test1">Yes</label>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">

                                            <p>
                                                <input name="customer_work" required type="radio" value="2"
                                                    id="test2" <?php if($editreview->working_with_customer == 2): ?> checked <?php endif; ?>>
                                                <label for="test2">No</label>
                                            </p>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="form-control">Did the customer pay on time?</label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">


                                            <p>
                                                <input required type="radio" id="test3" value="1"
                                                    name="customer_payment_time"
                                                    <?php if($editreview->customer_pay_time == 1): ?> checked <?php endif; ?>>
                                                <label for="test3">Yes</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="test4" value="2"
                                                    name="customer_payment_time"
                                                    <?php if($editreview->customer_pay_time == 2): ?> checked <?php endif; ?>>
                                                <label for="test4">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s" data-wow-delay="0.5s">

                                        <label for="" class="form-control">Would you recommend this customer to
                                            other businesses?</label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="test5" value="1"
                                                    name="customer_recommendation"
                                                    <?php if($editreview->customer_recommendation == 1): ?> checked <?php endif; ?>>
                                                <label for="test5">Yes</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">

                                            <p>
                                                <input required type="radio" id="test6" value="2"
                                                    name="customer_recommendation"
                                                    <?php if($editreview->customer_recommendation == 2): ?> checked <?php endif; ?>>
                                                <label for="test6">No</label>
                                            </p>
                                        </div>
                                    </div>

                                    <textarea class="form-control" type="message" name="customer_description" id="" cols="120"
                                        rows="7" placeholder="Description..."><?php echo e($editreview->customer_description); ?></textarea>
                                    
                                    <br>
                                    <div class="col-lg-12 mb-3 text-center">
                                        <a href="javascript:void(0)"><button type="submit" class="Btnlogin bounceIn"
                                                data-wow-duration="1s" data-wow-delay="0.5s">Save</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/jquery.barrating.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/rating-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/product-list-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/admin_dashboard/reviews/edit.blade.php ENDPATH**/ ?>