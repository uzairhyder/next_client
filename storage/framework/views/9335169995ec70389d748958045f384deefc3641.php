<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Package Subscribers List </h5>
                        <div class=""></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table data-order='[[ 0, "desc" ]]' class="display dataTable no-footer" id="basic-1"
                                    role="grid" aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                S.NO</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Name</th>

                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Email</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Business Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Created at</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td>
                                                    <?php echo e($loop->iteration ?? null); ?>

                                                </td>
                                                <td>
                                                    
                                                    
                                                    <?php echo e(ucwords(strtolower($value->get_user->first_name))); ?> <?php echo e(ucwords(strtolower($value->get_user->last_name))); ?>


                                                </td>
                                           
                                                <td>
                                                    <?php echo $value->get_user->email ?? null; ?>

                                                </td>
                                                
                                                <td>
                                                    <?php if(is_object($value->get_user)): ?>
                                                        <?php if($value->get_user->industry_id == null): ?>
                                                            <?php echo e($value->get_user->business_name ?? null); ?>

                                                        <?php else: ?>
                                                            <?php echo e($value->get_user->industry->industry_type ?? null); ?>

                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php echo e(null); ?> <!-- Handle the case when $value->get_user is not an object -->
                                                    <?php endif; ?>
                                                </td>

                                                
                                                
                                                
                                                <td><?php echo e(date('j-M-Y g:i A', strtotime($value->start_date)) ?? ''); ?></td>


                                                <td>
                                                    

                                                    <a href="<?php echo e(route('subscriber-view', $value->id)); ?>"> <button
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">View</button></a>
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
        // $(document).ready(function() {

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


        // })

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
                if (result.isConfirmed == true) {
                    $.ajax({
                        url: "<?php echo e(route('delete-contact')); ?>",
                        type: "GET",
                        data: {
                            "id": id,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function() {
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                            swal("Done!", "It was succesfully deleted!", "success");

                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                };

            });

        }
    </script>


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/admin_dashboard/packagesubscribers/index.blade.php ENDPATH**/ ?>