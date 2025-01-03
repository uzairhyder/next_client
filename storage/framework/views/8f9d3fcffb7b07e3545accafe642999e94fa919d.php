<?php $__env->startSection('title','Forget-Password'); ?>
<?php $__env->startSection('content'); ?>
<!--Banner  -->
<section class="d-flex justify-content-center align-items-center contactBanner forgetpassword">

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                <div class="contactBannerDiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                    <h1 class="mt-3 wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                            Forget Password</span>
                    </h1>
                </div>
            </div>
            <form  id="forgetpassword" class="signForm">
                <?php echo csrf_field(); ?>
                <div class="mb-3 col-lg-10 mx-auto col-sm-12 d-flex justify-content-center align-items-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="email" id="email" name="email" placeholder="Email">
                    
                     <div class="counterNumber">
                         
                     </div>
                </div>
                
                <div class="col-lg-12 mb-3 mt-4 text-center">
                    <button type="submit" class="Btnlogin wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Send</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script>
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#forgetpassword").on('submit', function(e) {
                e.preventDefault();
                var form = $("#forgetpassword");
                $.ajax({
                    url: "<?php echo e(route('forget')); ?>",
                     type: 'POST',
                     data: form.serialize(),
                     dataType: 'JSON',
                      beforeSend: function() {
                         $("#preloader").css('display','block');
                     },
                    success: function(response, data) {
                        $("#preloader").css('display','none');
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }if(response.status == 200){
                            swal({
                             title: "Reset!",
                             text: response.message,
                             type: "success",
                             icon: "success",
                             }).then(function() {

                             });
                            // $('.resendButton').text('Resend');
                            $('.resendButton').attr("disabled", true);
                            $("#cd-seconds").removeAttr('style');
                            let timer = function (date) {
                            let timer = Math.round(new Date(date).getTime()/1000) - Math.round(new Date().getTime()/1000);
                            let minutes, seconds;
                            var startTime = new Date().getTime();
                            var interval = setInterval(function () {
                            if (--timer < 0) { timer=0; } days=parseInt(timer / 60 / 60 / 24, 10); hours=parseInt((timer / 60 / 60) % 24, 10); minutes=parseInt((timer / 60) % 60, 10); seconds=parseInt(timer % 60, 10); days=days < 10 ? "0" + days : days; hours=hours < 10 ? "0" + hours : hours; minutes=minutes < 10 ? "0" + minutes : minutes; seconds=seconds < 10 ? "0" + seconds : seconds; if(new Date().getTime() - startTime> 60000){
                                clearInterval(interval);
                                $('.resendButton').attr("disabled", false);
                                $('.resendButton').text('Resend');
                                $("#cd-seconds").css("display","none");
                                }
                                document.getElementById('cd-seconds').innerHTML = seconds;
                                },1000);

                                }
                                //using the function
                                
                                const tomorrow = new Date()
                                tomorrow.setDate(tomorrow.getDate() + 1)
                                timer(tomorrow);
                                
                                
                                // toastr.success('Please check email for verification code !');
                                $('#forgetpassword')[0].reset();
                        }
                         if(response.status == 305){
                         swal({
                            title: "Inactive!",
                            text: response.message,
                            type: "error",
                            icon: "error",
                         }).then(function() {});
                         // $('#forgetpassword')[0].reset();
                         }
                          if(response.status == 306){
                            swal({
                            title: "Admin!",
                            text: response.message,
                            type: "error",
                            icon: "error",
                            }).then(function() {});
                          // $('#forgetpassword')[0].reset();
                          }
                        if(response.status == 404){
                            swal({
                            title: "Invalid!",
                            text: response.message,
                            type: "error",
                            icon: "error",
                            }).then(function() {});
                            // $('#forgetpassword')[0].reset();
                        }
                        if(response.status == 419){
                            swal({
                            title: "Admin!",
                            text: response.message,
                            type: "error",
                            icon: "error",
                            }).then(function() {});
                        // $('#forgetpassword')[0].reset();
                        }

                    }

                });

            });
        });

    </script>

    <script>
        jQuery(document).ready(function() {
            $('.resendButton').on('click', function() {
                var email = $("#email").val();
                console.log(email);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                    , type: "GET"
                    , url: "<?php echo e(route('verify-email-register')); ?>"
                    , data: {
                        'email': email
                    },

                    beforeSend: function() {
                        $("#preloaderSmall").removeClass('loader-active');
                    }
                    , success: function(response) {
                        $("#preloaderSmall").addClass('loader-active');
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }
                        if (response.status == 200) {
                            // $('.resendButton').text('Resend');
                            $('.resendButton').attr("disabled", true);
                            $("#cd-seconds").removeAttr('style');
                            let timer = function(date) {
                                let timer = Math.round(new Date(date).getTime() / 1000) - Math.round(new Date().getTime() / 1000);
                                let minutes, seconds;
                                var startTime = new Date().getTime();
                                var interval = setInterval(function() {
                                    if (--timer < 0) {
                                        timer = 0;
                                    }
                                    days = parseInt(timer / 60 / 60 / 24, 10);
                                    hours = parseInt((timer / 60 / 60) % 24, 10);
                                    minutes = parseInt((timer / 60) % 60, 10);
                                    seconds = parseInt(timer % 60, 10);

                                    days = days < 10 ? "0" + days : days;
                                    hours = hours < 10 ? "0" + hours : hours;
                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;
                                    if (new Date().getTime() - startTime > 60000) {
                                        clearInterval(interval);
                                        $('.resendButton').attr("disabled", false);
                                        $('.resendButton').text('Resend');
                                        $("#cd-seconds").css("display", "none");
                                    }

                                    document.getElementById('cd-seconds').innerHTML = seconds;
                                }, 1000);

                            }
                            //using the function

                            const tomorrow = new Date()
                            tomorrow.setDate(tomorrow.getDate() + 1)
                            timer(tomorrow)
                             swal({
                                title: "Reset!",
                                text: response.message,
                                type: "success",
                                icon: "success",
                             })
                              $('#forgetpassword')[0].reset();

                            // toastr.success('Please Check email to verify otp');
                        }

                    }
                });
            });
        });

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/frontend/forget-password.blade.php ENDPATH**/ ?>