<?php $__env->startSection('title', 'Member Login'); ?>

<?php $__env->startSection('content'); ?>
    <section class="d-flex justify-content-center align-items-center contactBanner signDiv"
        style="background:url(<?php echo e(asset('front_assets/images/1x/conBanner.png')); ?>)">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                    <div class="contactBannerDiv">
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star checked"></i>
                        <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                        <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                                Log In</span>
                        </h1>
                    </div>
                </div>
                <form id="userlogin" class="signForm ">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 mt-5 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="password" name="password" placeholder="Password" class="eyeDiv" id="password">
                        <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye"></i>
                    </div>
                    <div class="d-flex justify-content-end col-lg-9 col-md-9">
                        <p><a href="<?php echo e(route('forget-password')); ?>">Forget Password?</a></p>
                    </div>
                    <div class="col-lg-12 mb-3 mt-4 text-center">
                        <button type="submit" class="Btnlogin">Log In</button>
                    </div>
                    <div class="col-lg-12 mb-3 mt-2 text-center signDivp">
                        <P>Don't have an account?<a href="<?php echo e(route('signup')); ?>"> Sign Up </a></P>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script src="<?php echo e(asset('front_assets/js/jquery.min.js')); ?>"></script>
    <script>
        $('body').on('hidden.bs.modal', '.modal', function() {
            $('.for-pause-video').trigger('pause');
        });
        const passwordField = document.querySelector("#password");
        const eyeIcon = document.querySelector("#eye");
        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash");
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        })
    </script>
    


    <script>
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#userlogin").on('submit', function(e) {
                e.preventDefault();
                var form = $("#userlogin");
                $.ajax({
                    url: "<?php echo e(route('user-login')); ?>",
                    type: 'POST',
                    data: form.serialize(),
                    dataType: 'JSON',
                    //   beforeSend: function() {
                    //      $("#preloaderSmall").removeClass('loader-active');
                    //  },
                    success: function(response, data) {
                        //  $("#preloaderSmall").addClass('loader-active');
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }
                        if (response.status == 404) {
                            swal({
                                title: "Invalid!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                            //  $('#userlogin')[0].reset();
                        }
                        if (response.status == 200) {
                            swal({
                                title: "Login!",
                                text: response.message,
                                type: "success",
                                icon: "success",
                            }).then(function() {
                                window.location.href = "<?php echo e(route('profile')); ?>";
                            });
                            $('#userlogin')[0].reset();
                        }
                        if (response.status == 205) {
                            swal({
                                title: "Inactive!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                            // $('#userlogin')[0].reset();
                        }
                        if (response.status == 210) {
                            swal({
                                title: "Suspend!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                            // $('#userlogin')[0].reset();
                        }
                        if (response.status == 300) {
                            swal({
                                title: "Invalid!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                        }

                        if (response.status == 409) {
                            swal({
                                title: "Admin!",
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

                        if (response.status == 305) {
                            swal({
                                title: "Admin!",
                                text: response.message,
                                type: "error",
                                icon: "error",
                            }).then(function() {});
                        }


                        // else {

                        // }
                    }
                });

            });
        });
    </script>





    
    

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php if(request()->get('msg')): ?>
            <script>
                swal({
                    title: 'Registration Successful!',
                    text: 'Account created successfully !',
                    type: 'success',
                    icon: 'success'
                }).then(function() {
                    window.location.href = '<?php echo e(route('login')); ?>';
                });
            </script>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/frontend/login.blade.php ENDPATH**/ ?>