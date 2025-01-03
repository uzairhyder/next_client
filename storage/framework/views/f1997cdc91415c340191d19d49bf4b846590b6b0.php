<?php $__env->startSection('title', 'Member Signup'); ?>
<?php $__env->startSection('content'); ?>

    <!--Banner  -->
    <section class="d-flex justify-content-center align-items-center contactBanner">


        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                    <div class="contactBannerDiv">
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                        <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                                Sign Up</span>
                        </h1>
                    </div>
                </div>

                <form action="" id="register" class="signForm mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="text" name="first_name" placeholder="First Name">
                    </div>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="text" name="last_name" placeholder="Last Name">

                    </div>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="password" name="password" placeholder="Create Password" class="eyeDiv" id="password">
                        <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye"></i>
                    </div>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="password" name="confirmed" placeholder="Confirm Password" class="eyeDiv"
                            id="password2">
                        <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye2"></i>
                    </div>

                    

                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <select name="industry_id" id="" class="select form-select" onChange="check(this);"
                            aria-label="Default select example">
                            <option value="">Select Business Name</option>
                            <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->industry_type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value="0">Other</option>
                        </select>
                        
                    </div>
                    

                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <div id="other-div2" style="display:none;">
                            <input type="text" name="industry_name" placeholder="Other">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="text" name="business_license" placeholder="Business License#">
                    </div>

                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <textarea type="message" name="business_information" id="" cols="85" rows="7"
                            placeholder="Business Information"></textarea>
                    </div>
                    <div class="fileUpload business_copy_align">
                        <div>
                            <input type="file" name="business_license_copy" id="uploadFile"
                                accept="image/*,.pdf,.doc,.docx,.txt">
                            <label for="uploadFile"
                                class="w-100 d-flex justify-content-center align-items-center text-center"><span
                                    class="spanPlus">+</span> Upload Copy Of
                                Business License
                        </div>
                        
                    </div>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="hidden" name="package_id" placeholder="Package Id"
                            value="<?php echo e($package_id->id ?? null); ?>">
                    </div>
                    <div class="col-lg-10 mx-auto mb-3 mt-4 text-center col-sm-12">
                        <a href="#"><button type="submit" class="Btn wow animated bounceIn"
                                data-wow-duration="1s" data-wow-delay="0.5s">Create Account</button></a>
                        <P class="signPara">Already have an account? <a href="<?php echo e(route('login')); ?>">Sign In </a>
                        </P>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Toggle password visibility for the first input field
            $("#eye").click(function() {
                var passwordInput = $("#password");
                var type = passwordInput.attr("type");
                if (type === "password") {
                    passwordInput.attr("type", "text");
                } else {
                    passwordInput.attr("type", "password");
                }
            });

            // Toggle password visibility for the second input field
            $("#eye2").click(function() {
                var passwordInput = $("#password2");
                var type = passwordInput.attr("type");
                if (type === "password") {
                    passwordInput.attr("type", "text");
                } else {
                    passwordInput.attr("type", "password");
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function check(elem) {
            // use one of possible conditions
            // if (elem.value == 'Other')
            if (elem.value == 0) {
                document.getElementById("other-div2").style.display = 'block';
            } else {
                document.getElementById("other-div2").style.display = 'none';
            }
        }
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#register").on('submit', function(e) {
                e.preventDefault();
                //  var form = $("#register");
                e.stopImmediatePropagation();
                var form = $("#register").closest("form");
                var formData = new FormData(form[0]);
                $.ajax({
                    url: "<?php echo e(route('register')); ?>",
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    processData: false,
                    contentType: false,

                    beforeSend: function() {
                        $("#preloader").css('display', 'block');
                    },
                    success: function(response, data) {
                        $("#preloader").css('display', 'none');
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }
                        if (response.status == 409) {
                            swal({
                                title: "Signup!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                        }
                        if (response.status == 419) {
                            swal({
                                title: "Admin!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                        }
                        if (response.status == 100) {
                            if (response.package_id != null) {
                                $('#register')[0].reset();
                                if (response.package_id == 7) {
                                    $.ajax({
                                        type: "GET",
                                        url: "<?php echo e(route('free-package')); ?>",
                                        beforeSend: function() {
                                            $("#preloader").css('display', 'block');
                                        },
                                        success: function(response) {
                                            if (response.status == 200) {
                                                console.log(response.status);
                                                setTimeout(() => {
                                                    window.location.href =
                                                        "<?php echo e(env('APP_URL')); ?>login?msg=true";
                                                }, 500);
                                            }
                                        }
                                    });
                                } else {
                                    $.ajax({
                                        type: "GET",
                                        url: "<?php echo e(route('free-package')); ?>",
                                        beforeSend: function() {
                                            $("#preloader").css('display', 'block');
                                        },
                                        success: function(response) {
                                            if (response.status == 200) {
                                                console.log(response.status);
                                                window.location.href =
                                                    "<?php echo e(route('signuppaypal-amount-update')); ?>";
                                            }

                                        }
                                    });
                                }


                                // window.location.href = "<?php echo e(route('free-package')); ?>";
                            } else {
                                $('#register')[0].reset();

                                window.location.href = "<?php echo e(route('packages')); ?>";
                            }
                        }
                        // if (response.status == 200) {
                        //     console.log(response.status);
                        //     setTimeout(() => {
                        //         window.location.href =
                        //             "<?php echo e(env('APP_URL')); ?>login?msg=true";
                        //     }, 500);
                        // setTimeout(() => {
                        //     window.location.href =
                        //         "<?php echo e(env('APP_URL')); ?>login?msg=true";
                        // }, 500);
                        // // swal({
                        // //     title: "Signup!",
                        // //     text: response.message,
                        // //     type: "success",
                        // //     icon: "success",
                        // // })
                        // // .then(function() {
                        // //     window.location.href =  "<?php echo e(route('purchase-package')); ?>";
                        // // });
                        // // console.log(response.user_register)
                        // $('#register')[0].reset();

                        // window.location.href = "<?php echo e(route('packages')); ?>";
                        // }

                    }

                });

            });
        });
    </script>
    <script>
        $("#uploadFile").on("change", function() {
            var input = this;
            if (input.files && input.files[0]) {
                var type = input.files[0].type; // image/jpg, image/png, image/jpeg...
                // allow jpg, png, jpeg, bmp, gif, ico
                var fileName = input.files[0].name;
                console.log(fileName);
                // var type_reg = /^image\/(jpg|png|jpeg|bmp|gif|ico|webp|pdf|doc|docx|txt)$/;
                var type_reg = /^((?!application\/zip).)*$/i;
                if (type_reg.test(type)) {
                    // Set the label text to include the file name
                    var label = $(input).siblings("label");
                    label.text("Uploaded Copy Of Business License: " + fileName);
                } else {
                    swal({
                        title: "Image!",
                        text: "You must select an image file only.You selected: " + fileName,
                        type: "error",
                        icon: "error",
                    }).then(function() {});

                    // toastr.error("You must select an image file only.")
                    this.value = '';
                }
            }

            if (this.files[0].size > 3145728) {
                swal({
                    title: "Image!",
                    text: "Please Upload file less than 3 Mb.",
                    type: "error",
                    icon: "error",
                }).then(function() {});
                // toastr.error("Please Upload file less than 3 Mb")
                $(this).val('');
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/frontend/signup.blade.php ENDPATH**/ ?>