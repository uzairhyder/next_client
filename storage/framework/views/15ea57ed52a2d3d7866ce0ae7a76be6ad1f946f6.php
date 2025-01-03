<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        

                        <h5>Page Content List </h5>
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
                                                aria-label="Details: activate to sort column ascending"> Page name</th>
                                                 <th class="sorting" tabindex="0" aria-controls="basic-1" aria-label="Details: activate to sort column ascending">Section</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Image</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td>
                                                    <?php echo e($value->id ?? null); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($value->get_page->page_name ?? null); ?>

                                                </td>
                                                 <td>
                                                    <?php if($value->id !=5): ?>
                                                     <?php echo e($value->title1 .' '.  $value->title2.' '. $value->title3 ?? null); ?>

                                                    <?php endif; ?>
                                                    <?php if($value->id == 5): ?>
                                                        Video Section
                                                    <?php endif; ?>

                                                 </td>
                                                
                                                    <td class="d-flex">
                                                        <div class="" style="width:150px; height:100px;margin:0px 6px;">
                                                            <img src="<?php echo e(url('public/banner/' . $value->banner_image)); ?>"
                                                                alt=""
                                                                height="100%" width="100%"
                                                                    style="object-fit:contain;">
                                                        </div>
                                                    </td>
                                                

                                                <td>
                                                    

                                                    <a href="<?php echo e(route('page-content.edit', $value->id)); ?>"> <button
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

            $(".deletepage").on("click", function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "<?php echo e(route('page-content.destroy', 'id')); ?>",
                    data: {
                        "id": id,
                        "_token": "<?php echo e(csrf_token()); ?>"
                    },
                    type: 'DELETE',
                    success: function(result) {
                        toastr.success('Banner Image  Deleted Sucessfully');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/admin_dashboard/banners/index.blade.php ENDPATH**/ ?>