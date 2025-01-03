<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Page Contents</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="<?php echo e(route('page-content.index')); ?>">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="<?php echo e(route('page-content.update', $banners->id)); ?>" method="POST"
                                enctype="multipart/form-data">

                                
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="banner_id" value="<?php echo e($banners->id); ?>">
                                <input type="hidden" name="page_id" value="<?php echo e($banners->page_id); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Page Name</label>
                                            <select name="page_id" for="exampleFormControlInput10"
                                                class="form-control btn-square type" id="service" readonly disabled>
                                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($service->id); ?>"
                                                        <?php echo e($service->id == $banners->page_id ? 'selected' : ''); ?>

                                                        class="form-control btn-square" id="exampleFormControlInput10">
                                                        <?php echo e($service->page_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php if($banners->id != 5): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Section Name</label>
                                                <input class="form-control" type="text" data-bs-original-title=""
                                                    title="" name=""
                                                    value="<?php echo e($banners->title1 . ' ' . $banners->title2 . ' ' . $banners->title3); ?>"
                                                    readonly>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($banners->id == 5): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Section Name</label>
                                                <input class="form-control" type="text" data-bs-original-title=""
                                                    title="" name="" value="Video Section" readonly>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($banners->id == 7): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title</label>
                                                <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                    data-bs-original-title="" title="" name="title1"
                                                    value="<?php echo e($banners->title1); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($banners->id == 3): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Title1</label>
                                            <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                data-bs-original-title="" title="" name="title1"
                                                value="<?php echo e($banners->title1); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Title2</label>
                                            <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                data-bs-original-title="" title="" name="title2"
                                                value="<?php echo e($banners->title2); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Title3</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter  Title Name" data-bs-original-title=""
                                                title="" name="title3" value="<?php echo e($banners->title3); ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                                <?php if($banners->id == 4): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title1</label>
                                                <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                    data-bs-original-title="" title="" name="title1"
                                                    value="<?php echo e($banners->title1); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title2</label>
                                                <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                    data-bs-original-title="" title="" name="title2"
                                                    value="<?php echo e($banners->title2); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if($banners->id != 5 && $banners->id != 7 && $banners->id != 3 && $banners->id != 4): ?>


                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title1</label>
                                                <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                    data-bs-original-title="" title="" name="title1"
                                                    value="<?php echo e($banners->title1); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title2</label>
                                                <input class="form-control" type="text" placeholder="Enter  Title Name"
                                                    data-bs-original-title="" title="" name="title2"
                                                    value="<?php echo e($banners->title2); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title3</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter  Title Name" data-bs-original-title=""
                                                    title="" name="title3" value="<?php echo e($banners->title3); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($banners->id != 9 && $banners->id != 8 && $banners->id != 7): ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Title4</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter  Title Name" data-bs-original-title=""
                                                        title="" name="title4" value="<?php echo e($banners->title4); ?>"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($banners->id != 6): ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label>Title5</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter  Title Name" data-bs-original-title=""
                                                            title="" name="title5" value="<?php echo e($banners->title5); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label>Title6</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter  Title Name" data-bs-original-title=""
                                                            title="" name="title6" value="<?php echo e($banners->title6); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php if(
                                    $banners->id != 7 &&
                                        $banners->id != 5 &&
                                        $banners->id != 6 &&
                                        $banners->id != 1 &&
                                        $banners->id != 4 &&
                                        $banners->id != 8 &&
                                        $banners->id != 9 &&
                                        $banners->id != 3): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Title7</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter  Title Name" data-bs-original-title=""
                                                    title="" name="title7" value="<?php echo e($banners->title7); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($banners->id == 5): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Upload Video</label>
                                                <input class="form-control" id="videoupload" type="file"
                                                    placeholder="Video" data-bs-original-title="" title=""
                                                    name="video" value="<?php echo e($banners->video); ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <video width="200" height="150" controls autoplay>
                                        <source src="<?php echo e(url('public/video/', $banners->video)); ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <input class="form-control" id="imagesupport" type="file"
                                                placeholder="Upload Banner Image" data-bs-original-title=""
                                                title="" name="banner_image">

                                        </div>
                                    </div>
                                </div>
                                <img src="<?php echo e(url('public/banner/' . $banners->banner_image)); ?>"
                                    style="object-fit:contain; width:120px; height:100px;margin:0px 6px;" alt=""
                                    height="100%" width="100%" style="object-fit:contain;"> <br><br><br>
                                <br>
                                
                                
                                
                                

                                <?php if($banners->id == 1 || $banners->id == 3 || $banners->id == 4 || $banners->id == 8): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Description</label>
                                                <textarea class="form-control editor" name="description" id="" cols="30" rows="10"><?php echo e($banners->description); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
    <?php $__env->startPush('scripts'); ?>
        <script>
            $("#imagesupport").on("change", function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var type = input.files[0].type; // image/jpg, image/png, image/jpeg...
                    // allow jpg, png, jpeg, bmp, gif, ico
                    var type_reg = /^image\/(jpg|png|jpeg|bmp|gif|ico|webp)$/;
                    if (type_reg.test(type)) {} else {
                        toastr.error("You must select an image file only.")
                        this.value = '';
                    }
                }

                if (this.files[0].size > 3145728) {
                    toastr.error("Please Upload file less than 3 Mb")
                    $(this).val('');
                }
            });
        </script>


        <script>
            $("#videoupload").on("change", function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var type = input.files[0].type;
                    var type_reg = /^video\/(mp4)$/;
                    if (type_reg.test(type)) {} else {
                        toastr.error("You must select a mp4 video file only.")
                        this.value = '';
                    }
                }
                console.log(this.files[0].size);
                if (this.files[0].size > 36700160) {
                    toastr.error("Please Upload file less than 35 Mb")
                    $(this).val('');
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/admin_dashboard/banners/edit.blade.php ENDPATH**/ ?>