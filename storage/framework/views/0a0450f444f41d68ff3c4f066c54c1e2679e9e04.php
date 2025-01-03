<?php echo $__env->make('user_dashboard.common.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title','Dashboard'); ?>


<style>
    .checked {
  color: #d98d08 !important;
}
.btn-primary {
    color: #fff;
    background-color: #29abe2 !important;
    border-color: #29abe2 !important;
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
<!-- Datatable CSS -->


    <div class="container-fluid">

            <div id="exampleOne_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="table-responsive">
                    <h4>User Reviews</h4>
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                
                                <th>Rating</th>
                                
                                
                                
                                <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>

                            <?php if(count($userReviews) == 0): ?>
                            <tr>
                              <td colspan="12" align="center">No data available</td>
                            </tr>
                          <?php else: ?>
                            <?php $__currentLoopData = $userReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($review->name); ?></td>
                                    <td><?php echo e($review->email); ?></td>
                                    <td><?php echo e($review->contact); ?></td>
                                    
                                    <td>

                                        <?php if($review->customer_rating): ?>
                                        
                                        <span class="fa fa-star<?php echo e($review->customer_rating >= 1 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($review->customer_rating >= 2 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($review->customer_rating >= 3 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($review->customer_rating >= 4 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($review->customer_rating == 5 ? ' checked' : ''); ?>"></span>
                                        <?php else: ?>
                                            no rating found
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('edit-usergiven-reviews', $review->id)); ?>" class="btn btn-primary">Edit</a>
                                        <a id="delete" href="<?php echo e(route('delete-usergiven-reviews', $review->id)); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                    
                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>



    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
  $('#exampleOne_wrapper').DataTable();
});
  </script>
</section>



<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/user_dashboard/user-given-reviews.blade.php ENDPATH**/ ?>