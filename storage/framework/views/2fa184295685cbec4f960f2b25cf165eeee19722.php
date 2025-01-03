<?php $__env->startSection('content'); ?>
    <style>
        .threeButtons {
            display: flex;
            gap: 6px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Review List </h5>
                        <a class="btn btn-success" href="<?php echo e(route('add-customer-reviews')); ?>" data-bs-original-title=""
                            title="">Add Review</a>
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
                                                aria-label="Details: activate to sort column ascending">Business Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Contact</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Address</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Search to Compare</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Created at</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td>
                                                    <?php echo e($loop->iteration ?? null); ?>

                                                </td>

                                                <?php if(!$value->get_user): ?>
                                                    <td><?php echo e($value->get_user->business_name ?? null); ?></td>
                                                <?php else: ?>
                                                    <td><?php echo e($value->get_user->industry->industry_type ?? null); ?></td>
                                                <?php endif; ?>

                                                
                                                

                                                <td>
                                                    <?php echo e($value->name ?? null); ?>

                                                    
                                                </td>

                                                <td>
                                                    <?php echo $value->email ?? null; ?>

                                                </td>
                                                <td>
                                                    <?php echo $value->contact ?? null; ?>

                                                </td>
                                                <td>
                                                    <?php echo $value->address ?? null; ?>

                                                </td>
                                                

                                                <td>
                                                    <a href="<?php echo e(route('review-status', ['id' => $value->id])); ?>">
                                                        <?php if($value->status == 1): ?>
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-shield"></i></button>
                                                        <?php else: ?>
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        <?php endif; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('reviews-search-detail', $value->id)); ?>"> <button
                                                        class="btn btn-success btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title=""
                                                        data-bs-original-title="">Compare</button></a>
                                                </td>
                                                <td><?php echo e(date('j-M-Y g:i A', strtotime($value->created_at)) ?? ''); ?></td>
                                                <td class="threeButtons">
                                                    <button class="btn btn-danger btn-xs"
                                                        onclick="confirmDelete('<?php echo e($value->id); ?>')"
                                                        data-original-title="btn btn-danger btn-xs">Delete</button>
                                                    <a href="<?php echo e(route('edit-customer-review', $value->id)); ?>"> <button
                                                            class="btn btn-primary btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">Edit</button></a>
                                                    <a href="<?php echo e(route('reviews-detail', $value->id)); ?>"> <button
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                        url: "<?php echo e(route('delete-review')); ?>",
                        type: "GET",
                        data: {
                            "id": id,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function() {
                            setTimeout(() => {
                                location.reload();
                            }, 500);
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

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/admin_dashboard/reviews/index.blade.php ENDPATH**/ ?>