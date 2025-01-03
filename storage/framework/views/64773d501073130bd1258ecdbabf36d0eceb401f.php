<?php echo $__env->make('user_dashboard.common.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<style>
    .for-right-decrease .eyeicon {
        right: 180px;
    }

</style>
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
                    <div class="col-lg-12">
                        <form id="newpassword" action="" class="form1">
                            <?php echo csrf_field(); ?>
                            <h3 class="mt-4">Change Password</h3>
                            <div class="col-lg-9 d-flex align-items-center position-relative for-right-decrease">
                                <input id="password" type="password" class="form-control eyeDiv" name="old_password" placeholder="Old Password">
                                <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye"></i>
                            </div>
                            <div class="col-lg-9 mt-4 d-flex align-items-center position-relative for-right-decrease">
                                <input id="password2" type="password" class="form-control eyeDiv" name="password" placeholder="New Password">
                                <i class="fa fa-eye eyeicon" aria-hidden="true" id="eye2"></i>
                            </div>
                            
                            <div class="col-lg-9">
                                <div class="mb-4 mt-4">
                                    <button type="submit" class="saveBtn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
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


<script src="https://code.jquery.com/jquery-3.5.0.js"></script>


<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#newpassword").on('submit', function(e) {
            e.preventDefault();
            var form = $("#newpassword");
            $.ajax({
                url: "<?php echo e(route('update-password')); ?>"
                , type: 'POST'
                , data: form.serialize()
                , dataType: 'JSON',
                //   beforeSend: function() {
                //      $("#preloaderSmall").removeClass('loader-active');
                //  },
                success: function(response, data) {
                    //  $("#preloaderSmall").addClass('loader-active');
                    if (response.status == 400) {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error(val[0]);
                        });
                    }
                    if (response.status == 200) {
                        swal({
                            title: "Password!"
                            , text: response.message
                            , type: "success"
                            , icon: "success"
                        , }).then(function() {});
                        $('#changepassword')[0].reset();
                    }
                    if (response.status == 502) {

                        swal({
                            title: "Password!"
                            , text: response.message
                            , type: "error"
                            , icon: "error"
                        , }).then(function() {});
                        $('#newpassword')[0].reset();

                    }
                }

            });

        });
    });

</script>

<script>
    // $('body').on('hidden.bs.modal', '.modal', function() {
    //     $('.for-pause-video').trigger('pause');
    // });
    const passwordField = document.querySelector("#password");
    const eyeIcon = document.querySelector("#eye");
    eye.addEventListener("click", function() {
        this.classList.toggle("fa-eye-slash");
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
    })
    const passwordField2 = document.querySelector("#password2");
    const eyeIcon2 = document.querySelector("#eye2");
    eye2.addEventListener("click", function() {
        this.classList.toggle("fa-eye-slash");
        const type = passwordField2.getAttribute("type") === "password" ? "text" : "password";
        passwordField2.setAttribute("type", type);
    })

    //  const passwordField3 = document.querySelector("#password3");
    //  const eyeIcon3 = document.querySelector("#eye3");
    //  eye3.addEventListener("click", function() {
    //  this.classList.toggle("fa-eye-slash");
    //  const type = passwordField2.getAttribute("type") === "password" ? "text" : "password";
    //  passwordField2.setAttribute("type", type);
    //  })


</script>


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/user_dashboard/change-password.blade.php ENDPATH**/ ?>