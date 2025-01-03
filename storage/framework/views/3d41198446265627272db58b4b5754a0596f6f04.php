<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form theme-form">
                        <form id="" action="<?php echo e(route('question.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Question</label>
                                        <input class="form-control" type="text" placeholder="Enter Your Question" data-bs-original-title="" title="" name="title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="">Answer</label>
                                        <input class="form-control" type="text" placeholder="Enter Your Answer" data-bs-original-title="" title="" name="answer" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="">Second Answer</label>
                                        <input class="form-control" type="text" placeholder="Enter Your Answer" data-bs-original-title="" title="" name="answer2" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Status</label>
                                    <div class="mb-3">
                                   
                            <select name="status" id="cars">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>
                        </div>
                    </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <button type="submit" id="" class="btn btn-success me-3">Add</button>
                                        <a class="btn btn-danger" href="<?php echo e(route('faqs.index')); ?>" data-bs-original-title="" title="">Cancel</a>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/admin_dashboard/reviews_question/create.blade.php ENDPATH**/ ?>