<?php echo $__env->make('frontend.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
      <div id="preloader">
          <div id="loader"></div>
      </div>

    <?php echo $__env->make('frontend.common.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>


  <?php echo $__env->make('frontend.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
      <?php if(Session::has('message')): ?>
      var type = "<?php echo e(Session::get('alert-type','success')); ?>"
      switch(type){
         case 'info':
         toastr.info(" <?php echo e(Session::get('message')); ?> ");
         break;
         case 'success':
         toastr.success(" <?php echo e(Session::get('message')); ?> ");
         break;
         case 'warning':
         toastr.warning(" <?php echo e(Session::get('message')); ?> ");
         break;
         case 'error':
         toastr.error(" <?php echo e(Session::get('message')); ?> ");
         break;
      }
      <?php endif; ?>
      </script>


    <?php if($errors->any()): ?>

    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        toastr.error('<?php echo e($error); ?>');
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- jquery -->
    
    <script src="<?php echo e(asset('front_assets/js/jquery.min.js')); ?>"></script>
    <!-- bootstrap jquery -->
    

     <script src="<?php echo e(asset('front_assets/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Butter js -->
    
    <script src="<?php echo e(asset('front_assets/js/butter.js')); ?>"></script>


    <!-- wow js -->
    

    <script src="<?php echo e(asset('front_assets/js/wow.js')); ?>"></script>

    <!-- custom js -->
    
    <script src="<?php echo e(asset('front_assets/js/main.js')); ?>"></script>


    

     <script>
         /***************     ------- hover video play start -----   ***************/

         var figure = $(".video-box").hover(hoverVideo, hideVideo);

         function hoverVideo(e) {
             $('video', this).get(0).play();
         }

         function hideVideo(e) {
             $('video', this).get(0).pause();
         }

         /***************     ------- hover video play start  -----   ***************/
         $('body').on('hidden.bs.modal', '.modal', function() {
             $('.for-pause-video').trigger('pause');
         });



    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
<?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/frontend/layout.blade.php ENDPATH**/ ?>