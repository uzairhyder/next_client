<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        

                        <h5>Configurations List </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table class="display dataTable no-footer" id="basic-1" role="grid"
                                    aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                S.NO</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Copyright</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Contact</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td>
                                                   <?php echo e($value->id); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($value->copy_right); ?>

                                                </td>

                                                <td>
                                                    <?php echo e($value->email); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($value->address); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($value->contact); ?>

                                                </td>
                                                <td>
                                                    

                                                    <a href="<?php echo e(route('configuration.edit', $value->id)); ?>"> <button
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">Edit</button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>.


        <script>
            $(document).ready(function() {

                toastr.options = {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': false,
                    'positionClass': 'toast-top-right',
                    'preventDuplicates': false,
                    'showDuration': '1000',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut',
                }

                $(".deleteconfiguration").on("click", function() {
                    var id = $(this).attr("data-id");
                    $.ajax({
                        url: "<?php echo e(route('configuration.destroy',"id")); ?>",
                        data: {
                            "id": id,
                            // '_method': 'DELETE',
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        type: 'DELETE',
                        success: function(result) {
                            toastr.success('Configuration Delete Sucessfully');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                });
            })
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/admin_dashboard/configuration/index.blade.php ENDPATH**/ ?>