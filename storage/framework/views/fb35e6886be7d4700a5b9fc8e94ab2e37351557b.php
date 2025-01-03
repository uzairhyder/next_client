<?php echo $__env->make('user_dashboard.common.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title', 'Dashboard'); ?>

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
                    <div class="container-fluid">
                        <div class="">
                            <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <h3 class="mt-4">Package Details</h3>
                                    <?php if(!empty($purchase_package->cancel_status) &&
                                            ($purchase_package->cancel_status == 1 || $purchase_package->cancel_status == 2)): ?>
                                        <?php if($purchase_package->cancel_status == 1): ?>
                                            <p>Your Package has been cancelled by Admin
                                                
                                                 and your remaining points
                                                <?php if(!empty($purchase_package)): ?>
                                                <?php if($purchase_package->package_points == 'unlimited' || $purchase_package->previous_points == 'unlimited'): ?>
                                                    <b>Unlimited/<?php echo e($purchase_package->get_package->package_points ?? ''); ?>

                                                    </b>
                                                <?php else: ?>
                                                    <b>
                                                        
                                                        : <?php echo e($purchase_package->package_points + ($purchase_package->previous_points ?? 0)); ?>.00
                                                    </b>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <b>N/A</b>
                                            <?php endif; ?>
                                        </p>
                                        <?php elseif($purchase_package->cancel_status == 2): ?>
                                            <p>You have cancelled package but it's valid till
                                                <b>
                                                <?php echo e(date('j-M-Y', strtotime($purchase_package->end_date)) ?? ''); ?></b>
                                                and remaining points
                                            <?php if(!empty($purchase_package)): ?>
                                                <?php if($purchase_package->package_points == 'unlimited' || $purchase_package->previous_points == 'unlimited'): ?>
                                                    <b>Unlimited/<?php echo e($purchase_package->get_package->package_points ?? ''); ?>

                                                    </b>
                                                <?php else: ?>
                                                    <b>
                                                        
                                                        :<?php echo e($purchase_package->package_points + ($purchase_package->previous_points ?? 0)); ?>

                                                    </b>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <b>N/A</b>
                                            <?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                        <div class="col-lg-9">
                                            <div class="mb-4 mt-4">
                                                <button type="button" class="updateBtn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    onclick="get_cancel_packageid('<?php echo e($purchase_package->package_id); ?>')">Update
                                                    Package</button>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3>Package Name</h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3><?php echo e($purchase_package->get_package->title ?? 'N/A'); ?></h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3>Type</h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3><?php echo $purchase_package->get_package->description ?? 'N/A'; ?></h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3>Date Of Active</h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <?php if(!empty($purchase_package->start_date)): ?>
                                                <h3><?php echo e(date('j-M-Y', strtotime($purchase_package->start_date)) ?? ''); ?>

                                                </h3>
                                            <?php else: ?>
                                                <h3>N/A</h3>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3>Date Of Expiration</h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <?php if(!empty($purchase_package->end_date)): ?>
                                                <h3><?php echo e(date('j-M-Y', strtotime($purchase_package->end_date)) ?? ''); ?>

                                                </h3>
                                            <?php else: ?>
                                                <h3>N/A</h3>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <h3>Points</h3>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <?php if(!empty($purchase_package)): ?>
                                                <?php if($purchase_package->package_points == 'unlimited' || $purchase_package->previous_points == 'unlimited'): ?>
                                                    <h3>Unlimited/<?php echo e($purchase_package->get_package->package_points ?? ''); ?>

                                                    </h3>
                                                <?php else: ?>
                                                    <h3>
                                                        
                                                        Total:<?php echo e($purchase_package->package_points + ($purchase_package->previous_points ?? 0)); ?>

                                                    </h3>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <h3>N/A</h3>
                                            <?php endif; ?>

                                            
                                        </div>
                                        <div class="col-lg-9 d-flex">
                                            <div class="mb-4 mt-4">
                                                <button type="button" class="updateBtn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    onclick="get_old_packageid('<?php echo e($purchase_package->package_id ?? 0); ?>')">Update
                                                    Package</button>
                                            </div>
                                            <div class="mb-4 mt-4">
                                                <a href="<?php echo e(route('cancel-purchase-package', $purchase_package->subscriptionID ?? '')); ?>"
                                                    id="delete"><button class="updateBtn" type="button"
                                                        data-original-title="btn btn-danger btn-xs">
                                                        Cancel</button></a>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="btn-closeDiv">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="btnClose"></button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Package Update</h5>
            </div>
            <div class="modal-body">
                <div class="container" id="Csmcontainer">
                    <div class="row">
                        <?php $__currentLoopData = $member_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->id != 7): ?>
                                <div
                                    class="col-lg-4 col-md-12 col-sm-6 d-flex justify-content-center align-items-center cardCol mb-4">
                                    <label for="p1<?php echo e($value->id); ?>" class="w-100">
                                        <input type="radio" name="package" id="p1<?php echo e($value->id); ?>" hidden>
                                        <div class="card Package-card p-card" onclick="get_package('<?php echo e($value->id); ?>')">
                                            <div class="cstm-card-background">
                                                <img src="<?php echo e(asset('images/' . $value->image)); ?>" alt="">
                                            </div>
                                            <div class="pakagesInner wow animated fadeInLeft p-card" data-wow-duration="1s"
                                                data-wow-delay="0.5s">
                                                <div class="pakagesInner">
                                                    <div class="divMon">
                                                        <h4><?php echo e($value->title ?? ''); ?></h4>
                                                        <?php if($value->id != 7): ?>
                                                            <span>$<?php echo e($value->price ?? ''); ?></span>
                                                        <?php endif; ?>
                                                        <p><?php echo $value->description ?? ''; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12 text-center">
                            <a href="" id="payment_redirect">
                                <button type="button" class="updateBtn" onclick>Update</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>

    function get_old_packageid(old_packageid) {
        console.log(old_packageid);
        $.ajax({
            url: "<?php echo e(route('store-old-purchase-package-id')); ?>",
            type: "GET",
            data: {
                id: old_packageid
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.success('Your Current Package is (' + response.title + ' ' + response.price +
                        ')', 'success');
                    // $("#payment_redirect").attr("href","<?php echo e(route('paypal-amount-update')); ?>");

                }
            },
        });
    }

    function get_cancel_packageid(old_packageid) {
        console.log(old_packageid);
        $.ajax({
            url: "<?php echo e(route('store-old-purchase-package-id')); ?>",
            type: "GET",
            data: {
                id: old_packageid
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.info('Your Previous Package was (' + response.title + ' ' + response.price +
                        ')', 'Canceled package info');
                    // $("#payment_redirect").attr("href","<?php echo e(route('paypal-amount-update')); ?>");
                }
            },
        });
    }

    function get_package(id) {

        $.ajax({
            url: "<?php echo e(route('update-purchase-package')); ?>",
            type: "GET",
            data: {
                id: id
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.success('Package (' + response.title + ' ' + response.price +
                        ') has been selected, successfully!', 'success');
                    $("#payment_redirect").attr("href", "<?php echo e(route('paypal-amount-update')); ?>");

                }
            },
        });



    }
    $("#payment_redirect").on("click", function() {
        // console.alert("payment");
        if (!$("#payment_redirect").attr("href")) {
            toastr.info('Please Select any Package first');
        }
    });


    function purchasepackage(id) {
        $.ajax({
            url: "<?php echo e(route('purchase-package')); ?>",
            type: "GET",
            data: {
                id: id
            },
            beforeSend: function() {
                $("#preloader").css('display', 'block');
            },
            success: function(response) {
                $("#preloader").css('display', 'none');
                if (response.status == 200) {
                    swal({
                        title: "Package!",
                        text: response.message,
                        type: "success",
                        icon: "success",

                    }).then(function() {
                        window.location.href = "<?php echo e(route('purchased-package')); ?>";
                    });
                } else {
                    swal({
                        title: "Package!",
                        text: 'Some thing went wrong !',
                        type: "error",
                        icon: "error",

                    }).then(function() {
                        window.location.href = "<?php echo e(route('purchased-package')); ?>";

                    });

                }
            }

        });
    }

</script>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/user_dashboard/user-packages.blade.php ENDPATH**/ ?>