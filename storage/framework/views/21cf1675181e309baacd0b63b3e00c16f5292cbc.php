<?php echo $__env->make('user_dashboard.common.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="profileSection">
    <div class="order-list1 py-5" id="paddingSmall">
        <div id="wrapper">
            <!-- Sidebar -->
            <?php echo $__env->make('user_dashboard.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(Session::has('update')): ?>
                <script type="text/javascript">
                    swal("Profile!", "<?php echo e(Session::get('update')); ?>", "success");
                </script>
            <?php endif; ?>
            <?php if(Session::has('update')): ?>
                <script type="text/javascript">
                    swal("Profile!", "<?php echo e(Session::get('update')); ?>", "success");
                </script>
            <?php endif; ?>
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
                         <form action="<?php echo e(route('update-profile')); ?>" method="POST" class="form"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    
                                    <?php if(!empty($update_user_profile)): ?>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <?php if(!empty($update_user_profile->profile_image ?? '')): ?>
                                                    <div class="profile">
                                                        <img src="<?php echo e(url('public/profiles/' . $update_user_profile->profile_image ?? '')); ?>"
                                                            id="output" alt="">
                                                    </div>
                                                    <input type="hidden" name="old_image" value="<?php echo e($update_user_profile->profile_image); ?>">
                                                <?php else: ?>
                                                    <div class="profile">
                                                        <img src="<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>"
                                                            id="output" alt="">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="mt-3 fileLable">
                                                    <!-- <input type="file" name="" id="">
                                               <button type="file" class="changeBtn">Change</button> -->
                                                    <input type="file" name="profile_image" id="uploadFile"
                                                        onchange="loadFile(event)">
                                                    <label for="uploadFile"
                                                        class="d-flex justify-content-center align-items-center text-center changeBtn">
                                                        Change
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">

                                                <h3>Profile Info</h3>
                                                <div class="row">
                                                    <input type="hidden" name="profile_status"
                                                        value="<?php echo e($update_user_profile->first_name); ?>" />
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="first_name" class="form-control"
                                                                value="<?php echo e($update_user_profile->first_name); ?>"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="last_name" class="form-control"
                                                                value="<?php echo e($update_user_profile->last_name); ?>"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="Last Name">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="email" name="email" class="form-control"
                                                                value="<?php echo e($update_user_profile->email); ?>"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="Email" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="date" name="date_of_birth"
                                                                value="<?php echo e($update_user_profile->date_of_birth); ?>"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="D.O.B">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <select name="industry_id" id="" class="selectOne"
                                                                onChange="check(this);">
                                                                <?php if($update_user_profile->industry_id == null): ?>
                                                                    <option
                                                                        value="<?php echo e($update_user_profile->business_name); ?>">
                                                                        <?php echo e($update_user_profile->business_name); ?>

                                                                    </option>
                                                                <?php else: ?>
                                                                    <option
                                                                        value="<?php echo e($update_user_profile->industry_id); ?>">
                                                                        <?php echo e($update_user_profile->industryProfile->industry_type); ?>

                                                                    </option>
                                                                <?php endif; ?>
                                                                <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value->id); ?>">
                                                                        <?php echo e($value->industry_type); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="0">Other</option>
                                                            </select>
                                                            

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div id="other-div" style="display:none;">
                                                                <input type="text" name="industry_name"
                                                                    class="form-control" placeholder="Other">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="business_license"
                                                                value="<?php echo e($update_user_profile->business_license); ?>"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Business License#">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="tel" id="phone12"
                                                                value="<?php echo e($update_user_profile->contact); ?>"
                                                                name="contact" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="Contact No.">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="address"
                                                                value="<?php echo e($update_user_profile->address); ?>"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="Address">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="number" name="postal_code"
                                                                value="<?php echo e($update_user_profile->postal_code); ?>"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Postal Code">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <textarea type="message" name="business_information" id="" cols="85" rows="7"
                                                                placeholder="Business Information" style="height: 221px;"><?php echo e($update_user_profile->business_information); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-8">

                                                            <div class="mb-3">
                                                                <input type="file" name="business_license_copy"
                                                                    class="saveBtn form-control"
                                                                    accept="image/*,.pdf,.doc,.docx,.txt">
                                                                <input type="hidden" name="old_business_license_copy_image" value="<?php echo e($update_user_profile->business_license_copy); ?>">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <?php if($update_user_profile->business_license_copy): ?>
                                                                <a type="button"
                                                                    href="<?php echo e(asset('business_licenses/' . $update_user_profile->business_license_copy ?? '')); ?>"
                                                                    class="saveBtn"
                                                                    download><?php echo e($update_user_profile->business_license_copy); ?></a>
                                                            <?php else: ?>
                                                                no file available
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <button type="submit" class="saveBtn">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                            
                        <?php else: ?>
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php if(!empty(Auth::user()->profile_image)): ?>
                                        <div class="profile">
                                            <img src="<?php echo e(url('public/profiles/' . Auth::user()->profile_image)); ?>"
                                                id="output" alt="">
                                                <input type="hidden" name="old_image" value="<?php echo e(Auth::user()->profile_image); ?>">

                                        </div>
                                    <?php else: ?>
                                        <div class="profile">
                                            <img src="<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>"
                                                id="output" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="mt-3 fileLable">
                                        <!-- <input type="file" name="" id="">
                                                    <button type="file" class="changeBtn">Change</button> -->
                                        <input type="file" name="profile_image" id="uploadFile"
                                            onchange="loadFile(event)">
                                        <label for="uploadFile"
                                            class="d-flex justify-content-center align-items-center text-center changeBtn">
                                            Change
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-9">

                                    <h3>Profile Info</h3>
                                    <div class="row">
                                        <input type="hidden" name="profile_status"
                                            value="<?php echo e(Auth::user()->first_name); ?>" />
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="first_name" class="form-control"
                                                    value="<?php echo e(Auth::user()->first_name); ?>" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="last_name" class="form-control"
                                                    value="<?php echo e(Auth::user()->last_name); ?>" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Last Name" required>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    value="<?php echo e(Auth::user()->email); ?>" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="date" name="date_of_birth"
                                                    value="<?php echo e(Auth::user()->date_of_birth); ?>" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="D.O.B">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <select name="industry_id" id="" class="selectOne"
                                                    onChange="check(this);">
                                                    <?php if(Auth::user()->industry_id == null): ?>
                                                        <option value="<?php echo e(Auth::user()->business_name); ?>">
                                                            
                                                            <?php echo e(Auth::user()->business_name); ?>

                                                        </option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e(Auth::user()->industry_id); ?>">
                                                            <?php echo e(Auth::user()->industry->industry_type); ?>

                                                        </option>
                                                    <?php endif; ?>

                                                    <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>">
                                                            <?php echo e($value->industry_type); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="0">Other</option>
                                                </select>
                                                

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <div id="other-div" style="display:none;">
                                                    <input type="text" name="industry_name" class="form-control"
                                                        placeholder="Other">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="business_license"
                                                    value="<?php echo e(Auth::user()->business_license); ?>" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Business License#" required>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="tel" id="phone12"
                                                    value="<?php echo e(Auth::user()->contact); ?>" name="contact"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Contact No.">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="address"
                                                    value="<?php echo e(Auth::user()->address); ?>" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Address">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="number" name="postal_code"
                                                    value="<?php echo e(Auth::user()->postal_code); ?>" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Postal Code">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <textarea type="message" name="business_information" id="" cols="85" rows="7"
                                                    placeholder="Business Information" style="height: 221px;"><?php echo e(Auth::user()->business_information); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">

                                                <div class="mb-3">
                                                    <input type="file" name="business_license_copy"
                                                        class="saveBtn form-control"
                                                        accept="image/*,.pdf,.doc,.docx,.txt">
                                                        <input type="hidden" name="old_business_license_copy_image" value="<?php echo e(Auth::user()->business_license_copy); ?>">

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <?php if(Auth::user()->business_license_copy): ?>
                                                    <a type="button"
                                                        href="<?php echo e(asset('business_licenses/' . Auth::user()->business_license_copy ?? '')); ?>"
                                                        class="saveBtn"
                                                        download><?php echo e(Auth::user()->business_license_copy); ?></a>
                                                <?php else: ?>
                                                    no file available
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <button type="submit" class="saveBtn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        
                        </form>
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

<script type="text/javascript">
    document.getElementById('phone12').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>

<script>
    function check(elem) {
        // use one of possible conditions
        // if (elem.value == 'Other')
        if (elem.value == 0) {
            document.getElementById("other-div").style.display = 'block';
        } else {
            document.getElementById("other-div").style.display = 'none';
        }
    }

    // function check(elem) {
    //     // use one of possible conditions
    //     // if (elem.value == 'Other')
    //     if (elem.value == 24) {
    //         document.getElementById("other-div1").style.display = 'block';
    //     } else {
    //         document.getElementById("other-div1").style.display = 'none';
    //     }
    // }
    $("#uploadFile").on("change", function() {
        var input = this;
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);

        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
        if (input.files && input.files[0]) {
            var type = input.files[0].type; // image/jpg, image/png, image/jpeg...
            // allow jpg, png, jpeg, bmp, gif, ico
            var type_reg = /^image\/(jpg|png|jpeg|bmp|gif|ico|webp)$/;
            if (type_reg.test(type)) {} else {
                swal({
                    title: "Image!",
                    text: "You must select an image file only !",
                    type: "error",
                    icon: "error",
                }).then(function() {});
                if ('<?php echo e(Auth::user()->profile_image); ?>') {
                    output.src = "<?php echo e(url('public/profiles/' . Auth::user()->profile_image)); ?>";
                } else {
                    output.src = "<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>";
                }
                this.value = '';
            }
        }
        if (this.files[0].size > 3145728) {
            swal({
                title: "Size!",
                text: "Please Upload file less than 3 Mb.",
                type: "error",
                icon: "error",
            }).then(function() {});
            if ('<?php echo e(Auth::user()->profile_image); ?>') {
                output.src = "<?php echo e(url('public/profiles/' . Auth::user()->profile_image)); ?>";
            } else {
                output.src = "<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>";
            }
            this.value = '';

        }
    });
</script>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/user_dashboard/profile.blade.php ENDPATH**/ ?>