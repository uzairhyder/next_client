 
 <?php $__env->startSection('title','FAQ'); ?>

 <?php $__env->startSection('content'); ?>

 <!--Banner  -->
 <section class="d-flex justify-content-center align-items-center contactBanner faqsDiv" >

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
                             FAQ’s</span>
                     </h1>
                 </div>
             </div>
             <div class="col-lg-10 mx-auto col-sm-12 col-md-12">
                 <div class="accordion" id="accordionExample">

                     <div class="mt-5 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingOne">
                                 <button class="accordion-button " type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     <?php echo e($firstOrder->questions); ?>

                                 </button>
                             </h2>
                             <div id="collapseTwo" class="accordion-collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p><?php echo $firstOrder->answer ?? ''; ?></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-10 mx-auto col-sm-12 col-md-12">
                  <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="accordion" id="accordionExample">
                     <div class="mt-3  wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                         <div class="accordion-item" id="accordionDiv">
                             <h2 class="accordion-header" id="headingOne<?php echo e($faq->id); ?>">
                                 <button class="accordion-button collapsed" type="button" id="accordionDivBtn" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo e($faq->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo e($faq->questions ?? ''); ?>

                                 </button>
                             </h2>
                             <div id="collapseOne<?php echo e($faq->id); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                     <p><?php echo $faq->answer ?? ''; ?></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     
                 </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
         </div>
     </div>
 </section>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/frontend/faqs.blade.php ENDPATH**/ ?>