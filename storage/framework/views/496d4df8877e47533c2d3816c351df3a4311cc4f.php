<?php $__env->startSection('content'); ?>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <style>
        .footer {
            margin-left: -20px !important;
        }
    </style>


    <style>
        /* preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
            z-index: 10000;
            display: none;
        }

        #loader {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            width: 130px;
            height: 130px;
            margin: -75px 0 0 -75px;
            border-radius: 50%;
            border: 3px solid transparent;
            /* border-top-color: #c8a180; */
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        #loader:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #606060;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }

        #loader:after {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #2386d8;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes  spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>


    <div id="preloader">
        <div id="loader"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User Details</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="<?php echo e(route('user-index')); ?>">Back</a></div>

                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="<?php echo e(route('user-update', $users->id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="user_id" value="<?php echo e($users->id); ?>">
                                <input type="hidden" name="prev_password" value="<?php echo e($users->password); ?>">

                                <?php if(!empty($update_user_profile)): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <?php if(!empty($update_user_profile->profile_image)): ?>
                                                    <img src="<?php echo e(url('public/profiles/' . $update_user_profile->profile_image)); ?>"
                                                        alt=""
                                                        style="object-fit:contain; width:120px; height:100px;"> <br><br><br>
                                                <?php endif; ?>
                                                <label for="">User Profile Image </label>
                                                <input class="form-control" id="userfile" type="file"
                                                    placeholder="Enter Business Information" data-bs-original-title=""
                                                    title="" name="profile_image">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" placeholder="Enter First Name"
                                                    data-bs-original-title="" title="" name="first_name"
                                                    value="<?php echo e($update_user_profile->first_name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" placeholder="Enter Last Name"
                                                    data-bs-original-title="" title="" name="last_name"
                                                    value="<?php echo e($update_user_profile->last_name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Email</label>
                                                <input class="form-control" type="email" placeholder="Enter Email"
                                                    data-bs-original-title="" title="" name="email"
                                                    value="<?php echo e($update_user_profile->email); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Business Name</label>
                                                <?php if($update_user_profile->industry_id == null): ?>
                                                    <input type="text" name="industry_name"
                                                        value="<?php echo e($update_user_profile->business_name); ?>">
                                                    
                                                <?php else: ?>
                                                    <select name="industry_id" id="" class="form-control"
                                                        onChange="check(this);">
                                                        <option
                                                            value="<?php echo e($update_user_profile->industry_id ? 'selected' : ''); ?>">
                                                            <?php echo e(!empty($update_user_profile->industryProfile->industry_type) ? $update_user_profile->industryProfile->industry_type : 'Select Business Name'); ?>

                                                <?php endif; ?>
                                                
                                                <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <option value="<?php echo e($value->id); ?>">
                                                        <?php echo e($value->industry_type ?? null); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <option value="0">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="other-div" style="display:none;">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Other</label>
                                                <input class="form-control" type="text" name="industry_name"
                                                    placeholder="Other">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Business License</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Business License" data-bs-original-title=""
                                                    title="" name="business_license"
                                                    value="<?php echo e($update_user_profile->business_license); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Business Information</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Business Information" data-bs-original-title=""
                                                    title="" name="business_information"
                                                    value="<?php echo e($update_user_profile->business_information); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <?php if(!empty($update_user_profile->business_license_copy)): ?>
                                                    <img src="<?php echo e(url('public/business_licenses/' . $update_user_profile->business_license_copy)); ?>"
                                                        alt="" height="100px" width="100px"
                                                        style="object-fit: contain;">
                                                    <br><br><br>
                                                    
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>"
                                                        width="100px" height="100px" alt="">
                                                <?php endif; ?>
                                                <label for="">Upload Copy of Business License </label>
                                                <input class="form-control" id="uploadFile" type="file"
                                                    placeholder="Enter Business Information" data-bs-original-title=""
                                                    title="" name="business_license_copy">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Contact</label>
                                                <input class="form-control" id="phone12" type="tel"
                                                    placeholder="Enter Contact" data-bs-original-title="" title=""
                                                    name="contact" value="<?php echo e($update_user_profile->contact); ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address"
                                                    data-bs-original-title="" title="" name="address"
                                                    value="<?php echo e($update_user_profile->address); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Postal Code</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Postal code" data-bs-original-title=""
                                                    title="" name="postal code"
                                                    value="<?php echo e($update_user_profile->postal_code); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <?php if(!empty($users->profile_image)): ?>
                                                    <img src="<?php echo e(url('public/profiles/' . $users->profile_image)); ?>"
                                                        alt=""
                                                        style="object-fit:contain; width:120px; height:100px;">
                                                    <br><br><br>
                                                <?php endif; ?>
                                                <label for="">User Profile Image </label>
                                                <input class="form-control" id="userfile" type="file"
                                                    placeholder="Enter Business Information" data-bs-original-title=""
                                                    title="" name="profile_image">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" placeholder="Enter First Name"
                                                    data-bs-original-title="" title="" name="first_name"
                                                    value="<?php echo e($users->first_name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" placeholder="Enter Last Name"
                                                    data-bs-original-title="" title="" name="last_name"
                                                    value="<?php echo e($users->last_name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Email</label>
                                                <input class="form-control" type="email" placeholder="Enter Email"
                                                    data-bs-original-title="" title="" name="email"
                                                    value="<?php echo e($users->email); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Business Name</label>
                                                <select name="industry_id" id="" class="form-control"
                                                    onChange="check(this);">
                                                    <?php if($users->industry_id == null): ?>
                                                        <option value="<?php echo e($users->business_name); ?>">
                                                            <?php echo e($users->business_name); ?></option>
                                                        
                                                    <?php else: ?>
                                                        <option value="<?php echo e($users->industry_id); ?>">
                                                            <?php echo e($users->industry->industry_type ?? null); ?></option>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>">
                                                            <?php echo e($value->industry_type ?? null); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="0">Other</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="other-div" style="display:none;">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Other</label>
                                                <input class="form-control" type="text" name="industry_name"
                                                    placeholder="Other">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Business License</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Business License" data-bs-original-title=""
                                                    title="" name="business_license"
                                                    value="<?php echo e($users->business_license); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Business Information</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Business Information" data-bs-original-title=""
                                                    title="" name="business_information"
                                                    value="<?php echo e($users->business_information); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <?php if(!empty($users->business_license_copy)): ?>
                                                    <img src="<?php echo e(url('public/business_licenses/' . $users->business_license_copy)); ?>"
                                                        alt="" height="100px" width="100px"
                                                        style="object-fit: contain;">
                                                    <br><br><br>
                                                    
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('front_assets/images/1x/No-image.jpg')); ?>"
                                                        width="100px" height="100px" alt="">
                                                <?php endif; ?>
                                                <label for="">Upload Copy of Business License </label>
                                                <input class="form-control" id="uploadFile" type="file"
                                                    placeholder="Enter Business Information" data-bs-original-title=""
                                                    title="" name="business_license_copy">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Contact</label>
                                                <input class="form-control" id="phone12" type="tel"
                                                    placeholder="Enter Contact" data-bs-original-title="" title=""
                                                    name="contact" value="<?php echo e($users->contact); ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address"
                                                    data-bs-original-title="" title="" name="address"
                                                    value="<?php echo e($users->address); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Postal Code</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Postal code" data-bs-original-title=""
                                                    title="" name="postal code" value="<?php echo e($users->postal_code); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Password</label>
                                                <input class="form-control" type="password" placeholder="Enter  Password"
                                                    data-bs-original-title="" title="" name="password">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="">Confirm Password</label>
                                                    <input class="form-control" type="password"
                                                        placeholder="Confirm Password" data-bs-original-title=""
                                                        title="" name="confirm_password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label for="">Trust Status</label>
                                                    <div class="mb-3">
                                                        <?php if($users->type == 1): ?>
                                                            <label class="switch">
                                                                <input type="checkbox" id="togBtn"
                                                                    value="<?php echo e($users->type); ?>" name="user_status"
                                                                    checked>
                                                                <div class="slider round"></div>
                                                            </label>
                                                        <?php else: ?>
                                                            <label class="switch">
                                                                <input type="checkbox" id="togBtn"
                                                                    value="<?php echo e($users->type); ?>" name="user_status">
                                                                <div class="slider round"></div>
                                                            </label>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" id="updateuser"
                                                class="btn btn-success me-3">Update</button>
                                            
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
        $("#uploadFile").on("change", function() {
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
        $("#userfile").on("change", function() {
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
        $("#updateuser").on('click', function() {
            $("#preloader").css('display', 'block');
        });
    </script>
    <script>
        $("#togBtn").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 1);
            } else {
                $(this).attr('value', 0);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/admin_dashboard/users/edit.blade.php ENDPATH**/ ?>