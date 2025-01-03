<?php $__env->startSection('title','Search Database'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('search')): ?>
<script type="text/javascript">
    swal("Search!", "Please enter at least one field to search !", "error");
</script>
<?php endif; ?>

<?php if(Session::has('admin')): ?>
<script type="text/javascript">
    swal("Admin!", "You are logged in as admin please logout first !", "error");

</script>
<?php endif; ?>

<style>
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(180, 180, 180, 0.75);
        z-index: 9999;
        display: none;
    }

    .loader::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 50px;
        margin-top: -25px;
        margin-left: -25px;
        border: 3px solid transparent;
        border-top: 3px solid #156aa1;
        border-radius: 50%;
        animation: spin 1.5s linear infinite;
    }

    @keyframes  spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>


<!--Banner  -->
<section class="banner2 d-flex justify-content-center align-items-center w-100 searchData">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-sm-12 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="text-div">
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star checked"></i>
                    <i class="fa-sharp fa-solid fa-star-half-stroke checked"></i>
                    <h1><?php echo e($search_data->title1 ?? ''); ?> <span>
                           <?php echo e($search_data->title2 ?? ''); ?> <br><?php echo e($search_data->title3 ?? ''); ?></span>
                    </h1>
                    
                        <?php echo $search_data->description ?? ''; ?>

                            
                    
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 pt-5">
                <div class="inner-img wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="innerDiv position-relative">
                        <img src="<?php echo e(url('public/banner',$search_data->banner_image)); ?>" alt="">
                        <div class="firstDiv  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo e(asset('front_assets/images/1x/overlayImg.png')); ?>" alt="">
                        </div>
                        <div class="lastDiv  wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?php echo e(asset('front_assets/images/1x/overlayImg1.png')); ?>" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- search our database -->

 <section class="sectionCstm">
     <div class="container">
        <div id="searchloader" class="loader"></div>

         <form method="post" action="<?php echo e(route('search-customers')); ?>" class="form" id="searchdataform">
            <?php echo csrf_field(); ?>
             <div class="row d-flex justify-content-center align-items-center">
                 <h4 class="wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Customer<span>
                         Search</span></h4>
                 <div class="col-lg-6 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="text" name="first_name" placeholder="First Name.*" class="inputSearch" required>
                 </div>
                 <div class="col-lg-6 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="text" name="last_name" placeholder="Last Name.*" class="inputSearch" required>
                 </div>
                 <div class="col-lg-12 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="text" name="address" placeholder="Address" class="inputSearch">
                 </div>
                 <div class="col-lg-6 mb-3 mt-3 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="tel" id="phone12" name="contact" placeholder="Phone No." class="inputSearch">
                 </div>
                 <div class="col-lg-6 mb-3 mt-3 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                     <input type="email" name="email" placeholder="Email." class="inputSearch">
                 </div>
                 <div class="col-lg-12 mb-3 mt-4 text-center">
                     <a href="#"><button type="submit" class="Btn wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Search
                             Now</button></a>
                 </div>
         </form>
     </div>
     </div>
 </section>


 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#searchdataform').on('submit', function(event) {
            $('#searchloader').show();

            // Disable submit button
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Hide loader
                    $('#searchloader').hide();

                    // Enable submit button
                    $('button[type="submit"]').prop('disabled', false);

                    // Handle the response, e.g., update a result div
                    // $('#result').html(response);
                    // Optionally, display a success message to the user

                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Search Successful',
                    //     text: 'Your search results are ready!',
                    // });

                },
                error: function(xhr, status, error) {
                    // Hide loader
                    $('#searchloader').hide();

                    // Enable submit button
                    $('button[type="submit"]').prop('disabled', false);

                    // Display an error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Search Error',
                        text: 'An error occurred during the search. Please try again.',
                    });
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

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\nextclient\resources\views/frontend/search-our-databse.blade.php ENDPATH**/ ?>