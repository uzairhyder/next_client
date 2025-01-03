 
 <?php $__env->startSection('title','Change Password'); ?>
 <?php $__env->startSection('content'); ?>

 <!--Banner  -->
 <section class="d-flex justify-content-center align-items-center contactBanner forgetpassword">

     <div class="container mt-5">
         <div class="row d-flex justify-content-center align-items-center">
             <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                 <div class="contactBannerDiv  wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star checked"></i>
                     <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                     <h1 class="mt-3 wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                             Change Password</span>
                     </h1>
                 </div>
             </div>
             <form id="changepassword" action="" class="signForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                 <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                     
                 </div>
                 <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="password" name="password" placeholder="New Password" class="eyeDiv" id="password" value="<?php echo e(old('password')); ?>">
                     <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye"></i>
                 </div>
                 <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="password" name="confirm_password" placeholder="Confirm New Password" class="eyeDiv" id="password2" value="<?php echo e(old('confirm_password')); ?>">
                     <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye2"></i>
                 </div>
                 <div class="col-lg-12 mb-3 mt-4 text-center">
                     <button type="submit" class="Btnlogin wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Send</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!--  -->

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
         const passwordField2 = document.querySelector("#password2");
         const eyeIcon2 = document.querySelector("#eye2");
         eye2.addEventListener("click", function() {
             this.classList.toggle("fa-eye-slash");
             const type = passwordField2.getAttribute("type") === "password" ? "text" : "password";
             passwordField2.setAttribute("type", type);
         })

     </script>

     <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

     <script>
         $(document).ready(function() {
             var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
             $("#changepassword").on('submit', function(e) {
                 e.preventDefault();
                 var form = $("#changepassword");
                 $.ajax({
                     url: "<?php echo e(route('update-newpassword')); ?>"
                     , type: 'POST'
                     , data: form.serialize()
                     , dataType: 'JSON',

                     success: function(response, data) {
                         if (response.status == 400) {
                             $.each(response.errors, function(prefix, val) {
                                 toastr.error(val[0]);
                             });
                         }
                         if (response.status == 200) {
                             swal({
                                 title: "Password!"
                                 , text: response.message
                                 , type: "success"
                                 , icon: "success"
                             , }).then(function() {
                                 window.location.href = "<?php echo e(route('login')); ?>";
                             });
                             $('#forgetpassword')[0].reset();
                         }
                         if (response.status == 303) {
                         swal({
                            title: "Invalid!"
                            , text: response.message
                            , type: "error"
                            , icon: "error"
                            , }).then(function() {});
                            $('#forgetpassword')[0].reset();
                         }

                         if (response.status == 404) {
                             swal({
                                 title: "Invalid!"
                                 , text: response.message
                                 , type: "error"
                                 , icon: "error"
                             , }).then(function() {});
                             $('#forgetpassword')[0].reset();
                         }
                          if (response.status == 401) {
                            swal({
                            title: "Invalid!"
                            , text: response.message
                            , type: "error"
                            , icon: "error"
                            , }).then(function() {});
                            // $('#forgetpassword')[0].reset();
                          }


                     }

                 });

             });
         });

     </script>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/frontend/change-password.blade.php ENDPATH**/ ?>