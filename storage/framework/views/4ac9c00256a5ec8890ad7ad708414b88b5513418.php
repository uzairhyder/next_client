<?php echo $__env->make('user_dashboard.common.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title', 'Dashboard'); ?>

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


    .for-back {
        display: flex;
        padding: 10px 30px;
        border-bottom: 1px solid #ecf3fa;
        flex-direction: row-reverse;
    }
</style>
<section class="profileSection">
    <div class="order-list1 py-5" id="paddingSmall">
        <div id="wrapper">
            <!-- Sidebar -->
            <?php echo $__env->make('user_dashboard.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">


                    </nav>
                    <!-- moblie navbar -->
                    <?php echo $__env->make('user_dashboard.common.mobile_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <div class="container-fluid">
                        <form method="POST" action="<?php echo e(route('update-usergiven-reviews', $editreview->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row sectionCstm">
                                <h4 style="text-align: start;" data-wow-duration="1s" data-wow-delay="0.5s">Edit User
                                    Review
                                </h4>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="text" placeholder="First Name" name="first_name" class="inputSearch"
                                        value="<?php echo e($editreview->first_name); ?>">
                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="text" placeholder="Last Name" name="last_name" class="inputSearch"
                                        value="<?php echo e($editreview->last_name); ?>">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="email" placeholder="Email" name="email" class="inputSearch"
                                        value="<?php echo e($editreview->email); ?>">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="tel" id="phone12" name="contact" placeholder="Contact No."
                                        class="inputSearch" value="<?php echo e($editreview->contact); ?>">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input type="text" placeholder="Address" name="address" class="inputSearch"
                                        value="<?php echo e($editreview->address); ?>">
                                </div>

                                <div style="text-align: start;">
                                    <?php if($editreview->customer_rating): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="inputSearch"><?php echo e($editreview->ques_customer_rating); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="star5" name="customer_rating" value="5"
                                                <?php if($editreview->customer_rating == 5): ?> checked <?php endif; ?> />
                                            <label class="star" for="star5"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star4" name="customer_rating" value="4"
                                                <?php if($editreview->customer_rating == 4): ?> checked <?php endif; ?> />
                                            <label class="star" for="star4"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star3" name="customer_rating" value="3"
                                                <?php if($editreview->customer_rating == 3): ?> checked <?php endif; ?> />
                                            <label class="star" for="star3"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star2" name="customer_rating" value="2"
                                                <?php if($editreview->customer_rating == 2): ?> checked <?php endif; ?> />
                                            <label class="star" for="star2"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="star1" name="customer_rating" value="1"
                                                <?php if($editreview->customer_rating == 1): ?> checked <?php endif; ?> />
                                            <label class="star" for="star1"><i class="fa fa-star"></i></label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($editreview->customer_rating_2): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="inputSearch"><?php echo e($editreview->ques_customer_rating_2); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="rating_2star5" name="customer_rating_2"
                                                value="5" <?php if($editreview->customer_rating_2 == 5): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_2star5"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star4" name="customer_rating_2"
                                                value="4" <?php if($editreview->customer_rating_2 == 4): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_2star4"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star3" name="customer_rating_2"
                                                value="3" <?php if($editreview->customer_rating_2 == 3): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_2star3"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star2" name="customer_rating_2"
                                                value="2" <?php if($editreview->customer_rating_2 == 2): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_2star2"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_2star1" name="customer_rating_2"
                                                value="1" <?php if($editreview->customer_rating_2 == 1): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_2star1"><i class="fa fa-star"></i></label>
                                        </div>
                                    <?php endif; ?>


                                    <?php if($editreview->customer_rating_3): ?>
                                        <div class="col-lg-12 mb-3 mt-3 fadeInLeft label" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <label for=""
                                                class="inputSearch"><?php echo e($editreview->ques_customer_rating_3); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="rating">
                                            <input type="radio" id="rating_star5" name="customer_rating_3"
                                                value="5" <?php if($editreview->customer_rating_3 == 5): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_star5"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star4" name="customer_rating_3"
                                                value="4" <?php if($editreview->customer_rating_3 == 4): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_star4"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star3" name="customer_rating_3"
                                                value="3" <?php if($editreview->customer_rating_3 == 3): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_star3"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star2" name="customer_rating_3"
                                                value="2" <?php if($editreview->customer_rating_3 == 2): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_star2"><i class="fa fa-star"></i></label>
                                            <input type="radio" id="rating_star1" name="customer_rating_3"
                                                value="1" <?php if($editreview->customer_rating_3 == 1): ?> checked <?php endif; ?> />
                                            <label class="star" for="rating_star1"><i class="fa fa-star"></i></label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if($editreview->working_with_customer): ?>
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
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
                                                <input name="customer_work" required type="radio"
                                                    value="<?php echo e($editreview->uncheck_customer_work_1); ?>"
                                                    id="test2">
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
                                        <label for="" class="inputSearch">
                                            <?php echo e($editreview->ques_customer_work_2); ?>

                                            
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work_2" required type="radio"
                                                    id="customer_work_2" value="<?php echo e($editreview->customer_work_2); ?>"
                                                    checked>
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
                                                <input name="customer_work_2" required type="radio"
                                                    value="<?php echo e($editreview->uncheck_customer_work_2); ?>"
                                                    id="customer_work_2test2">
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
                                        <label for="" class="inputSearch">
                                            <?php echo e($editreview->ques_customer_work_3); ?>

                                            
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input name="customer_work_3" required type="radio"
                                                    id="customer_work_3" value="<?php echo e($editreview->customer_work_3); ?>"
                                                    checked>
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
                                                <input name="customer_work_3" required type="radio"
                                                    value=" <?php echo e($editreview->uncheck_customer_work_3); ?>"
                                                    id="customer_work_3test2">
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
                                        <label for="" class="inputSearch">
                                            
                                            <?php echo e($editreview->ques_customer_pay_time_1); ?>

                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time"
                                                    value="<?php echo e($editreview->customer_pay_time); ?>"
                                                    name="customer_payment_time" checked>
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
                                                <input required type="radio" id="customer_payment_timetest1"
                                                    value=" <?php echo e($editreview->uncheck_customer_pay_time_1); ?>"
                                                    name="customer_payment_time">
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
                                        <label for="" class="inputSearch">
                                            
                                            <?php echo e($editreview->ques_customer_pay_time_2); ?>


                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_2"
                                                    value="<?php echo e($editreview->customer_pay_time_2); ?>"
                                                    name="customer_payment_time_2" checked>

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
                                                <input required type="radio" id="customer_payment_time_2test4"
                                                    value=" <?php echo e($editreview->uncheck_customer_pay_time_2); ?>"
                                                    name="customer_payment_time_2">
                                                <label for="customer_payment_time_2test4">
                                                    <?php echo e($editreview->uncheck_customer_pay_time_2); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($editreview->customer_pay_time_3): ?>
                                    <div class="col-lg-12 mb-3 mt-3 fadeInLeft label " data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            
                                            <?php echo e($editreview->ques_customer_pay_time_3); ?>


                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_3"
                                                    value="<?php echo e($editreview->customer_pay_time_3); ?>"
                                                    name="customer_payment_time_3" checked>
                                                <label for="customer_payment_time_3">
                                                    <?php echo e($editreview->customer_pay_time_3); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_payment_time_4"
                                                    value=" <?php echo e($editreview->uncheck_customer_pay_time_3); ?>"
                                                    name="customer_payment_time_3">
                                                <label for="customer_payment_time_4">
                                                    <?php echo e($editreview->uncheck_customer_pay_time_3); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($editreview->customer_recommendation): ?>
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            <?php echo e($editreview->ques_customer_recommendation_1); ?>

                                            
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendationds"
                                                    value="<?php echo e($editreview->customer_recommendation_2); ?>"
                                                    name="customer_recommendation" checked>
                                                
                                                <label for="customer_recommendationds">
                                                    <?php echo e($editreview->customer_recommendation); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_ans"
                                                    value="<?php echo e($editreview->uncheck_customer_recommendation_1); ?>"
                                                    name="customer_recommendation">
                                                <label for="customer_recommendation_ans">
                                                    <?php echo e($editreview->uncheck_customer_recommendation_1); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($editreview->customer_recommendation_2): ?>
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            <?php echo e($editreview->ques_customer_recommendation_2); ?>

                                            
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_2"
                                                    value="<?php echo e($editreview->customer_recommendation_2); ?>"
                                                    name="customer_recommendation_2" checked>
                                                <label for="customer_recommendation_2">
                                                    <?php echo e($editreview->customer_recommendation_2); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_2test6"
                                                    value=" <?php echo e($editreview->uncheck_customer_recommendation_2); ?>"
                                                    name="customer_recommendation_2">
                                                <label for="customer_recommendation_2test6">
                                                    <?php echo e($editreview->uncheck_customer_recommendation_2); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($editreview->customer_recommendation_3): ?>
                                    <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <label for="" class="inputSearch">
                                            <?php echo e($editreview->ques_customer_recommendation_3); ?>

                                            
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_3"
                                                    value="
                                                    <?php echo e($editreview->customer_recommendation_3); ?>"
                                                    name="customer_recommendation_3" checked>
                                                <label
                                                    for="customer_recommendation_3"><?php echo e($editreview->customer_recommendation_3); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                            data-wow-delay="0.5s">
                                            <p>
                                                <input required type="radio" id="customer_recommendation_3test6"
                                                    value=" <?php echo e($editreview->uncheck_customer_recommendation_3); ?>"
                                                    name="customer_recommendation_3">
                                                <label for="customer_recommendation_3test6">
                                                    <?php echo e($editreview->uncheck_customer_recommendation_3); ?></label>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($editreview->customer_description): ?>
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea class="inputSearch" type="message" name="customer_description" id="" cols="120"
                                        rows="7" placeholder="<?php echo e($editreview->ques_customer_description_1); ?>"><?php echo e($editreview->customer_description); ?></textarea>
                                </div>
                                        <?php endif; ?>
                                <?php if($editreview->customer_description_2): ?>
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea class="inputSearch" type="message" name="customer_description_2" id="" cols="120"
                                        rows="7" placeholder="<?php echo e($editreview->ques_customer_description_2); ?>"><?php echo e($editreview->customer_description_2); ?></textarea>
                                </div>
                                        <?php endif; ?>
                                <?php if($editreview->customer_description_3): ?>
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea class="inputSearch" type="message" name="customer_description_3" id="" cols="120"
                                        rows="7" placeholder="<?php echo e($editreview->ques_customer_description_3); ?>"><?php echo e($editreview->customer_description_3); ?></textarea>
                                </div>
                                        <?php endif; ?>
                                <br>
                                <div class="col-lg-12 mb-3 mt-3">
                                    <a href="javascript:void(0)"><button type="submit" class="Btnlogin "
                                            data-wow-duration="1s" data-wow-delay="0.5s">Update</button></a>
                                </div>
                            </div>
                        </form>

                        


                        
                    </div>

                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
</section>



<script>
    function purchasepackage(id) {
        $.ajax({
            url: "<?php echo e(route('purchase-package')); ?>",
            type: "GET",
            data: {
                id: id
            },
            beforeSend: function() {
                $("#preloader").css('display', 'block');
            },
            success: function(response) {
                $("#preloader").css('display', 'none');
                if (response.status == 200) {
                    swal({
                        title: "Package!",
                        text: response.message,
                        type: "success",
                        icon: "success",

                    }).then(function() {
                        window.location.href = "<?php echo e(route('purchased-package')); ?>";
                    });
                } else {
                    swal({
                        title: "Package!",
                        text: 'Some thing went wrong !',
                        type: "error",
                        icon: "error",

                    }).then(function() {
                        window.location.href = "<?php echo e(route('purchased-package')); ?>";

                    });

                }
            }

        });
    }
</script>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/user_dashboard/edit-user-given-reviews.blade.php ENDPATH**/ ?>