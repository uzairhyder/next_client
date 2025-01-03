<?php $__env->startSection('title','Contact Us'); ?>
<?php $__env->startSection('content'); ?>

<!--Banner  -->
<section class="d-flex justify-content-center align-items-center contactBanner">

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-sm-12 d-flex justify-content-center mt-2">
                <div class="contactBannerDiv wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                    <h1 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s"><span>
                            Contact Us</span>
                    </h1>
                </div>
            </div>

            <form class="contForm" id="contactform">
                <?php echo csrf_field(); ?>
                <div class="mb-3 col-lg-7 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="text" placeholder="Name" name="name" class="text-light" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="mb-3 col-lg-7 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="email" placeholder="Email" name="email" class="text-light" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="mb-3 col-lg-7 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="tel" id="phone12" placeholder="Phone No." name="contact" class="text-light" value="<?php echo e(old('contact')); ?>">
                </div>
                <div class="mb-3 col-lg-7 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <input type="text" placeholder="Reason for reaching out to us" name="message" class="text-light" value="<?php echo e(old('message')); ?>">
                </div>
                <div class="col-lg-12 mb-3 mt-4 text-center">
                    <button type="submit" class="Btn wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Submit</button>
                </div>
            </form>

        </div>
    </div>
</section>
<!--  -->
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>


<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#contactform").on('submit', function(e) {
            e.preventDefault();
            var form = $("#contactform");
            $.ajax({
                url: 'inquiry'
                , type: 'GET'
                , data: form.serialize()
                , dataType: 'JSON',
               beforeSend: function(){
                     $("#preloader").css('display','block');
               },
                success: function(response, data) {
                   $("#preloader").css('display','none');
                    if (response.status == 400) {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error(val[0]);
                        });
                    } else {
                        swal({
                            title: "Query!"
                            , text: response.message
                            , type: "success"
                            , icon: "success"
                        , }).then(function() {});

                        $('#contactform')[0].reset();
                    }
                }

            });

        });
    });

</script>

 <script type="text/javascript">
     document.getElementById('phone12').addEventListener('input', function(e) {
         var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
         e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
     });

 </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/frontend/contact-us.blade.php ENDPATH**/ ?>