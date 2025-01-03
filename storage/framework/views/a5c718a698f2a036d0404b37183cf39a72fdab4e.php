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
                                    
                                    <input id="first_name" type="text"
                                        class="inputSearch <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name"
                                        value="<?php echo e($editreview->first_name); ?>" required autocomplete="first_name"
                                        autofocus>
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
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input value="<?php echo e($editreview->last_name); ?>" required type="text"
                                        placeholder="Last Name" name="last_name" class="inputSearch">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input value="<?php echo e($editreview->email); ?>" required type="email" placeholder="Email"
                                        name="email" class="inputSearch">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input value="<?php echo e($editreview->contact); ?>" required type="tel" id="phone12"
                                        name="contact" placeholder="Contact No." class="inputSearch">
                                </div>
                                <div class="col-lg-12 mb-3 mt-3" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <input value="<?php echo e($editreview->address); ?>" required type="text"
                                        placeholder="Address" name="address" class="inputSearch">
                                </div>

                                <div style="text-align: start;">

                                    <div class="rating">
                                        <input type="radio" id="star5" name="customer_rating" value="5"  <?php if($editreview->customer_rating == 5): ?> checked <?php endif; ?> />
                                        <label class="star" for="star5"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star4" name="customer_rating" value="4"  <?php if($editreview->customer_rating == 4): ?> checked <?php endif; ?> />
                                        <label class="star" for="star4"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star3" name="customer_rating" value="3"  <?php if($editreview->customer_rating == 3): ?> checked <?php endif; ?> />
                                        <label class="star" for="star3"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star2" name="customer_rating" value="2"  <?php if($editreview->customer_rating == 2): ?> checked <?php endif; ?> />
                                        <label class="star" for="star2"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star1" name="customer_rating" value="1"  <?php if($editreview->customer_rating == 1): ?> checked <?php endif; ?> />
                                        <label class="star" for="star1"><i class="fa fa-star"></i></label>
                                    </div>

                                    
                                </div>


                                <div class="col-lg-12 mb-3 mt-3 label " data-wow-duration="1s" data-wow-delay="0.5s">
                                    

                                    <label for="">Was the customer easy to work with?</label>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-check mb-4  radio-css" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <p>
                                            <input name="customer_work" required type="radio" id="test1" value="1"  <?php if($editreview->working_with_customer == 1 ): ?> checked  <?php endif; ?>>
                                            <label for="test1">Yes</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <p>
                                            <input name="customer_work" required type="radio"
                                                value="2" id="test2" <?php if($editreview->working_with_customer == 2 ): ?> checked  <?php endif; ?>>
                                            <label for="test2">No</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3 mt-3  label" data-wow-duration="1s" data-wow-delay="0.5s">

                                    <label for="">Did the customer pay on time?</label>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                        data-wow-delay="0.5s">


                                        <p>
                                            

                                    <input required type="radio" id="test3" value="1"
                                                name="customer_payment_time" <?php if($editreview->customer_pay_time == 1 ): ?> checked  <?php endif; ?>>
                                            <label for="test3">Yes</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-check mb-4  radio-css" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <p>
                                            <input required  type="radio" id="test4" value="2"
                                                name="customer_payment_time" <?php if($editreview->customer_pay_time == 2 ): ?> checked  <?php endif; ?>>
                                            <label for="test4">No</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3 mt-3 label" data-wow-duration="1s" data-wow-delay="0.5s">

                                    <label for="" class="inputSearch">Would you recommend this
                                        customer to other businesses?</label>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-check mb-4  radio-css" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <p>
                                            <input required type="radio" id="test5" value="1"
                                                name="customer_recommendation" <?php if($editreview->customer_recommendation == 1 ): ?> checked  <?php endif; ?>>
                                            <label for="test5">Yes</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-check mb-4 radio-css" data-wow-duration="1s"
                                        data-wow-delay="0.5s">
                                        <p>
                                            
                                            <input required type="radio" id="test6" value="2"
                                                name="customer_recommendation" <?php if($editreview->customer_recommendation == 2 ): ?> checked  <?php endif; ?> >
                                            <label for="test6">No</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3 mt-3 " data-wow-duration="1s" data-wow-delay="0.5s">
                                    <textarea type="message" name="customer_description" id="" cols="85" rows="7"
                                        placeholder="Description..." style="width: 100%"><?php echo e($editreview->customer_description); ?></textarea>
                                </div>

                                

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

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/user_dashboard/edit-user-given-reviews.blade.php ENDPATH**/ ?>