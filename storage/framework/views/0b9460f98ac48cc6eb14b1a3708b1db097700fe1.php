 <?php
 $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
 ?>

 <section class="footer mt-4">
     <div class="container pt-5 pb-5">
         <div class="row d-flex justify-content-around">
             <div class="col-lg-3 col-md-12 col-sm-12 search">
                 <div class="footer-img">
                     <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(url('public/logos/'.$logo->image)); ?>" alt=""></a>

                 </div>
             </div>
             <div class="col-lg-3 col-md-12 col-sm-12 ">
                 <p>Pages</p>
                 <ul class="p-0">
                     <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                     <li><a href="<?php echo e(route('customer-search')); ?>">Search Our Database</a></li>
                     <?php if(Auth::check() && Auth::id()): ?>
                        <li><a href="<?php echo e(route('review')); ?>">Review</a></li>
                     <?php endif; ?>
                    <?php if(!Auth::check()): ?>
                        <li><a href="<?php echo e(route('login')); ?>">Member Login</a></li>
                    <?php endif; ?>
                     <li><a href="<?php echo e(route('faq')); ?>">FAQ’s</a></li>
                     <li><a href="<?php echo e(route('how-it-works')); ?>">How It works</a></li>
                     <li><a href="<?php echo e(route('terms.and.conditions')); ?>">Term & Condition</a></li>
                 </ul>
             </div>
             <div class="col-lg-3 col-md-12 col-sm-12">
                 <p>Social Links</p>
                 <div class="d-flex footer-icon">
                     <div>
                         <span><a href="<?php echo e($social->instagram ?? ''); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></span>

                     </div>
                     <div>
                         <span><a href="<?php echo e($social->twitter ?? ''); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></span>

                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-12 col-sm-12 footerCont">
                 <p>Contact Us</p>
                 <ul class="p-0">
                     <li class="footer-ancher"><i class="fa-solid fa-phone p"></i><a href="tel:<?php echo e($config->contact ?? ''); ?>"><?php echo e($config->contact ?? ''); ?></a></li>


                     <li><i class="fa-solid fa-envelope"></i><a href="mailto:<?php echo e($config->email ?? ''); ?>"><?php echo e($config->email ?? ''); ?></a></li>


                     <li><i class="fa-solid fa-location-dot"></i><a href="<?php echo e($config->map_link ?? ''); ?>" target="_blank"> <?php echo e($config->address ?? ''); ?>.</a></li>

                 </ul>
             </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 text-center ">
                     <span class="for-theme-link pt-1">
                        <?php echo e($config->copy_right ?? ''); ?> <?php echo date("Y"); ?> Designed &amp; Developed by
                         <a href="https://conceptionmasters.com/" target="_blank">
                             Conception Masters
                         </a>
                     </span>
                 </div>
             </div>
         </div>
     </div>
 </section>
<?php /**PATH E:\xampp\htdocs\next_client\resources\views/frontend/common/footer.blade.php ENDPATH**/ ?>