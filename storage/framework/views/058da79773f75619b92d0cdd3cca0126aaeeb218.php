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
                        <h5></h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="<?php echo e(route('customer-reviews')); ?>">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">

                            <form method="POST" action="<?php echo e(route('store-customer-review')); ?>" class="form-group">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <h4 class="bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Tell Us About
                                        <span class="fontstyling">Your Experience</span>
                                    </h4>
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="text" placeholder="<?php echo e($query[0]->title); ?>" name="first_name"
                                        class="form-control" required>
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="text" placeholder="<?php echo e($query[1]->title); ?>" name="last_name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="email" placeholder="<?php echo e($query[2]->title); ?>" name="email" class="form-control" required>
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="tel" id="phone12" name="contact" placeholder="<?php echo e($query[3]->title); ?>"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <input type="text" placeholder="<?php echo e($query[4]->title); ?>" name="address" class="form-control" required>
                                    </div>
            
                                    <?php if($query[5]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="How would you rate this customer?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[5]->title); ?></label>
                                            
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="star5" name="customer_rating" value="5" />
                                            <label class="star" for="star5">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="star4" name="customer_rating" value="4" />
                                            <label class="star" for="star4">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="star3" name="customer_rating" value="3" />
                                            <label class="star" for="star3">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="star2" name="customer_rating" value="2" />
                                            <label class="star" for="star2">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="star1" name="customer_rating" value="1" />
                                            <label class="star" for="star1">
                                                <div class="fa fa-star"></div>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($query[11]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="How would you rate this customer?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[11]->title); ?></label>
                                            
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="rating_2_star5" name="customer_rating_2" value="5" />
                                            <label class="star" for="rating_2_star5">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_2_star4" name="customer_rating_2" value="4" />
                                            <label class="star" for="rating_2_star4">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_2_star3" name="customer_rating_2" value="3" />
                                            <label class="star" for="rating_2_star3">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_2_star2" name="customer_rating_2" value="2" />
                                            <label class="star" for="rating_2_star2">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_2_star1" name="customer_rating_2" value="1" />
                                            <label class="star" for="rating_2_star1">
                                                <div class="fa fa-star"></div>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($query[12]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="How would you rate this customer?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[12]->title); ?></label>
                                            
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="rating_3_star5" name="customer_rating_3" value="5" />
                                            <label class="star" for="rating_3_star5">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_3_star4" name="customer_rating_3" value="4" />
                                            <label class="star" for="rating_3_star4">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_3_star3" name="customer_rating_3" value="3" />
                                            <label class="star" for="rating_3_star3">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_3_star2" name="customer_rating_3" value="2" />
                                            <label class="star" for="rating_3_star2">
                                                <div class="fa fa-star"></div>
                                            </label>
                                            <input type="radio" id="rating_3_star1" name="customer_rating_3" value="1" />
                                            <label class="star" for="rating_3_star1">
                                                <div class="fa fa-star"></div>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($query[6]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="Was the customer easy to work with?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[6]->title); ?></label>
                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test1" value="<?php echo e($query[6]->answer); ?>" name="customer_work"
                                                        checked>
                                                    <label for="test1"><?php echo e($query[6]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" value="<?php echo e($query[6]->answer2); ?>" id="test2" name="customer_work">
                                                    <label for="test2"><?php echo e($query[6]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($query[13]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="Was the customer easy to work with?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[13]->title); ?></label>
                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test13" value="<?php echo e($query[13]->answer); ?>" name="customer_work_2"
                                                        checked>
                                                    <label for="test13"><?php echo e($query[13]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" value="<?php echo e($query[13]->answer2); ?>" id="test23" name="customer_work_2">
                                                    <label for="test23"><?php echo e($query[13]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
            
                                    
                                    <?php if($query[14]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label " data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control"><?php echo e($query[14]->title); ?></label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test14" value="<?php echo e($query[14]->answer); ?>" name="customer_work_3"
                                                        checked>
                                                    <label for="test14"><?php echo e($query[14]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" value="<?php echo e($query[14]->answer2); ?>" id="test15" name="customer_work_3">
                                                    <label for="test15"><?php echo e($query[14]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($query[7]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s" >
                                            <!-- <input type="text" placeholder="Did the customer pay on time?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[7]->title); ?></label>
                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test3" value="<?php echo e($query[7]->answer); ?>" name="customer_payment_time"
                                                        checked>
                                                    <label for="test3"><?php echo e($query[7]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test4" value="<?php echo e($query[7]->answer2); ?>"
                                                        name="customer_payment_time">
                                                    <label for="test4"><?php echo e($query[7]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($query[15]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control"><?php echo e($query[15]->title); ?></label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_payment_time_2" value="<?php echo e($query[15]->answer); ?>"
                                                        name="customer_payment_time_2" checked>
                                                    <label for="customer_payment_time_2"><?php echo e($query[15]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_payment_time_2_2" value="<?php echo e($query[15]->answer2); ?>"
                                                        name="customer_payment_time_2">
                                                    <label for="customer_payment_time_2_2"><?php echo e($query[15]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    
                                    <?php if($query[16]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for="" class="form-control"><?php echo e($query[16]->title); ?></label>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_payment_time_3" value="<?php echo e($query[16]->answer); ?>"
                                                        name="customer_payment_time_3" checked>
                                                    <label for="customer_payment_time_3"><?php echo e($query[16]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_payment_time_3_2" value="<?php echo e($query[16]->answer2); ?>"
                                                        name="customer_payment_time_3">
                                                    <label for="customer_payment_time_3_2"><?php echo e($query[16]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($query[8]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s" class="form-control">
                                            <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[8]->title); ?></label>
                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test5" value="<?php echo e($query[8]->answer); ?>"
                                                        name="customer_recommendation" checked>
                                                    <label for="test5"><?php echo e($query[8]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="test6" value="<?php echo e($query[8]->answer2); ?>"
                                                        name="customer_recommendation">
                                                    <label for="test6"><?php echo e($query[8]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($query[17]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[17]->title); ?></label>
                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_recommendation_2" value="<?php echo e($query[17]->answer); ?>"
                                                        name="customer_recommendation_2" checked>
                                                    <label for="customer_recommendation_2"><?php echo e($query[17]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_recommendation_26" value="<?php echo e($query[17]->answer2); ?>"
                                                        name="customer_recommendation_2">
                                                    <label for="customer_recommendation_26"><?php echo e($query[17]->answer2); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    
                                    <?php if($query[18]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <!-- <input type="text" placeholder="Would you recommend this customer to other businesses?" class="form-control"> -->
                                            <label for="" class="form-control"><?php echo e($query[18]->title); ?></label>
                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInRight radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_recommendation_3" value="<?php echo e($query[18]->answer); ?>"
                                                        name="customer_recommendation_3" checked>
                                                    <label for="customer_recommendation_3"><?php echo e($query[18]->answer); ?></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-check mb-4 wow animated fadeInLeft radio-css" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <p>
                                                    <input type="radio" id="customer_recommendation_36" value="<?php echo e($query[18]->answer2); ?>"
                                                        name="customer_recommendation_3">
                                                    <label for="customer_recommendation_36">
                                                        <?php echo e($query[18]->answer2); ?>

                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    
                                    <?php if($query[9]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <textarea type="message" class="form-control" name="customer_description" id="" cols="85" rows="7"
                                                placeholder="<?php echo e($query[9]->title); ?>"></textarea>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($query[19]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <textarea type="message" class="form-control" name="customer_description" id="" cols="85" rows="7"
                                                placeholder="<?php echo e($query[19]->title); ?>"></textarea>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($query[20]->status == 1): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <textarea type="message" class="form-control" name="customer_description" id="" cols="85" rows="7"
                                                placeholder="<?php echo e($query[20]->title); ?>"></textarea>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="d-flex justify-content-end align-items-center mt-2 col-lg-12 accept  fadeInLeft"
                                    data-wow-duration="1s" data-wow-delay="0.5s">

                                    <p>
                                        <input type="checkbox" id="test7" value="1" name="accept_terms"
                                            class="form-check-input">
                                        <label for="test7">Accept Term & Condition</label>
                                    </p>
                                </div>
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

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/admin_dashboard/reviews/add.blade.php ENDPATH**/ ?>