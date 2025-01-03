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
                                    <?php if($editreview->customer_rating): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="form-control"><?php echo e($editreview->ques_customer_rating); ?>

                                                
                                            </label>
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
                                    <?php endif; ?>
                                    <?php if($editreview->customer_rating_2): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="form-control"><?php echo e($editreview->ques_customer_rating_2); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="star5" name="customer_rating_2" value="5"
                                                <?php if($editreview->customer_rating_2 == 5): ?> checked <?php endif; ?> />
                                            <label class="star" for="star5"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star4" name="customer_rating_2" value="4"
                                                <?php if($editreview->customer_rating_2 == 4): ?> checked <?php endif; ?> />
                                            <label class="star" for="star4"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star3" name="customer_rating_2" value="3"
                                                <?php if($editreview->customer_rating_2 == 3): ?> checked <?php endif; ?> />
                                            <label class="star" for="star3"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star2" name="customer_rating_2" value="2"
                                                <?php if($editreview->customer_rating_2 == 2): ?> checked <?php endif; ?> />
                                            <label class="star" for="star2"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star1" name="customer_rating_2" value="1"
                                                <?php if($editreview->customer_rating_2 == 1): ?> checked <?php endif; ?> />
                                            <label class="star" for="star1"><span class="fa fa-star"></span></label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_rating_3): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="form-control"><?php echo e($editreview->ques_customer_rating_3); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="star5" name="customer_rating_3" value="5"
                                                <?php if($editreview->customer_rating_3 == 5): ?> checked <?php endif; ?> />
                                            <label class="star" for="star5"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star4" name="customer_rating_3" value="4"
                                                <?php if($editreview->customer_rating_3 == 4): ?> checked <?php endif; ?> />
                                            <label class="star" for="star4"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star3" name="customer_rating_3" value="3"
                                                <?php if($editreview->customer_rating_3 == 3): ?> checked <?php endif; ?> />
                                            <label class="star" for="star3"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star2" name="customer_rating_3" value="2"
                                                <?php if($editreview->customer_rating_3 == 2): ?> checked <?php endif; ?> />
                                            <label class="star" for="star2"><span class="fa fa-star"></span></label>
                                            <input type="radio" id="star1" name="customer_rating_3" value="1"
                                                <?php if($editreview->customer_rating_3 == 1): ?> checked <?php endif; ?> />
                                            <label class="star" for="star1"><span class="fa fa-star"></span></label>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($editreview->working_with_customer): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                <?php echo e($editreview->ques_customer_work_1); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input name="customer_work" required type="radio" id="test1"
                                                        value="<?php echo e($editreview->working_with_customer); ?>" checked>
                                                    <label for="test1">
                                                        
                                                        <?php echo e($editreview->working_with_customer); ?>

                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input name="customer_work" required type="radio" value="<?php echo e($editreview->uncheck_customer_work_1); ?>"
                                                        id="test2" >
                                                    <label for="test2">
                                                        <?php echo e($editreview->uncheck_customer_work_1); ?>

                                                        
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($editreview->customer_work_2): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                <?php echo e($editreview->ques_customer_work_2); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input name="customer_work_2" required type="radio" id="customer_work_2"
                                                    value="<?php echo e($editreview->customer_work_2); ?>" checked>
                                                    <label for="customer_work_2">
                                                        <?php echo e($editreview->customer_work_2); ?>

                                                        
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input name="customer_work_2" required type="radio"   value="<?php echo e($editreview->uncheck_customer_work_2); ?>" 
                                                        id="customer_work_2test2" >
                                                    <label for="customer_work_2test2">
                                                        <?php echo e($editreview->uncheck_customer_work_2); ?>

                                                        
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_work_3): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                <?php echo e($editreview->ques_customer_work_3); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input name="customer_work_3" required type="radio" id="customer_work_3"
                                                    value="<?php echo e($editreview->customer_work_3); ?>" checked>
                                                    <label for="customer_work_3">
                                                        <?php echo e($editreview->customer_work_3); ?>

                                                        
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input name="customer_work_3" required type="radio" value=" <?php echo e($editreview->uncheck_customer_work_3); ?>"
                                                        id="customer_work_3test2" >
                                                    <label for="customer_work_3test2">
                                                        <?php echo e($editreview->uncheck_customer_work_3); ?>

                                                        
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_pay_time): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                
                                                <?php echo e($editreview->ques_customer_pay_time_1); ?>

                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_payment_time" value="<?php echo e($editreview->customer_pay_time); ?>"
                                                        name="customer_payment_time"
                                                       checked>
                                                        <label for="customer_payment_time">
                                                            <?php echo e($editreview->customer_pay_time); ?>

                                                            
                                                        </label>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="tcustomer_payment_timeest4" value=" <?php echo e($editreview->uncheck_customer_pay_time_1); ?>"
                                                        name="customer_payment_time"
                                                       >
                                                        <label for="customer_payment_timetest1">
                                                            <?php echo e($editreview->uncheck_customer_pay_time_1); ?>

                                                            
                                                        </label>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_pay_time_2): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                
                                                <?php echo e($editreview->ques_customer_pay_time_2); ?>


                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_payment_time_2" value="<?php echo e($editreview->customer_pay_time_2); ?>"
                                                        name="customer_payment_time_2"
                                                      checked>
                                                        
                                                    <label for="customer_payment_time_2">
                                                        
                                                        <?php echo e($editreview->customer_pay_time_2); ?>

                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_payment_time_2test4" value=" <?php echo e($editreview->uncheck_customer_pay_time_2); ?>"
                                                        name="customer_payment_time_2"
                                                    >
                                                    <label for="customer_payment_time_2test4">  <?php echo e($editreview->uncheck_customer_pay_time_2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_pay_time_3): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                
                                                <?php echo e($editreview->ques_customer_pay_time_3); ?>


                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_payment_time_3" value="<?php echo e($editreview->customer_pay_time_3); ?>"
                                                        name="customer_payment_time_3"
                                                        checked>
                                                    <label for="customer_payment_time_3"> <?php echo e($editreview->customer_pay_time_3); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_payment_time_4" value=" <?php echo e($editreview->uncheck_customer_pay_time_3); ?>"
                                                        name="customer_payment_time_3">
                                                    <label for="customer_payment_time_4"> <?php echo e($editreview->uncheck_customer_pay_time_3); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_recommendation): ?>
                                        <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                <?php echo e($editreview->ques_customer_recommendation_1); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_recommendationds" value="<?php echo e($editreview->customer_recommendation_2); ?>"
                                                    name="customer_recommendation"
                                                   checked>
                                                    
                                                    <label for="customer_recommendationds"> <?php echo e($editreview->customer_recommendation); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_recommendation_ans" value="<?php echo e($editreview->uncheck_customer_recommendation_1); ?>"
                                                        name="customer_recommendation">
                                                    <label for="customer_recommendation_ans">  <?php echo e($editreview->uncheck_customer_recommendation_1); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_recommendation_2): ?>
                                        <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                <?php echo e($editreview->ques_customer_recommendation_2); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_recommendation_2" value="<?php echo e($editreview->customer_recommendation_2); ?>"
                                                        name="customer_recommendation_2"
                                                       checked>
                                                    <label for="customer_recommendation_2"> <?php echo e($editreview->customer_recommendation_2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_recommendation_2test6" value=" <?php echo e($editreview->uncheck_customer_recommendation_2); ?>"
                                                        name="customer_recommendation_2"
                                                   >
                                                    <label for="customer_recommendation_2test6">  <?php echo e($editreview->uncheck_customer_recommendation_2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_recommendation_3): ?>
                                        <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control">
                                                <?php echo e($editreview->ques_customer_recommendation_3); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_recommendation_3" value="
                                                    <?php echo e($editreview->customer_recommendation_3); ?>" 
                                                        name="customer_recommendation_3" checked>
                                                    <label for="customer_recommendation_3"><?php echo e($editreview->customer_recommendation_3); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input required type="radio" id="customer_recommendation_3test6" value=" <?php echo e($editreview->uncheck_customer_recommendation_3); ?>"
                                                        name="customer_recommendation_3"
                                                     >
                                                    <label for="customer_recommendation_3test6"> <?php echo e($editreview->uncheck_customer_recommendation_3); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_description): ?>
                                        <textarea class="form-control" type="message" name="customer_description" id="" cols="120"
                                            rows="7" placeholder="<?php echo e($editreview->ques_customer_description_1); ?>"><?php echo e($editreview->customer_description); ?></textarea>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_description_2): ?>
                                        <textarea class="form-control" type="message" name="customer_description_2" id="" cols="120"
                                            rows="7" placeholder="<?php echo e($editreview->ques_customer_description_2); ?>"><?php echo e($editreview->customer_description_2); ?></textarea>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_description_3): ?>
                                        <textarea class="form-control" type="message" name="customer_description_3" id="" cols="120"
                                            rows="7" placeholder="<?php echo e($editreview->ques_customer_description_3); ?>"><?php echo e($editreview->customer_description_3); ?></textarea>
                                    <?php endif; ?>
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

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/admin_dashboard/reviews/edit.blade.php ENDPATH**/ ?>