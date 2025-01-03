<?php $__env->startSection('content'); ?>
    <style>
        .footer {
            margin-left: -20px !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Configurations</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="<?php echo e(route('configuration.index')); ?>">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="<?php echo e(route('configuration.update', $copyright->id)); ?>"
                                method="POST">
                                
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="configuration_id" value="<?php echo e($copyright->id); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Copy Right</label>
                                            <input class="form-control" type="text" placeholder="Enter Your Name"
                                                data-bs-original-title="" title="" name="copy_right"
                                                value="<?php echo e($copyright->copy_right); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Contact</label>
                                            <input class="form-control" type="tel" id="phone12"
                                                placeholder="Enter Your Contact" data-bs-original-title="" title=""
                                                name="contact" value="<?php echo e($copyright->contact); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" placeholder="Enter Your Email"
                                                data-bs-original-title="" title="" name="email"
                                                value="<?php echo e($copyright->email); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address"
                                                    data-bs-original-title="" title="" name="address"
                                                    value="<?php echo e($copyright->address); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Map Link</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Embeded Map Link" data-bs-original-title=""
                                                    title="" name="map_link" value="<?php echo e($copyright->map_link); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <button type="submit" class="btn btn-success me-3">Update</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/admin_dashboard/configuration/edit.blade.php ENDPATH**/ ?>