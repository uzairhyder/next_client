
<?php $__env->startSection('title', 'Payment'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        #pageloader {
            background: rgb(129 129 129 / 17%);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            top: 0;
            left: 0;
        }

        #pageloader img {
            left: 50%;
            position: absolute;
            top: 50%;

            transform: translate(-50%, -50%);
            filter: grayscale(1);
        }

        .btn-group,
        .btn-group-vertical {
            z-index: 1 !important;
        }

        .paymentTop {
            padding: 100px 0px 10px 0px;
        }

        .forget-password-text {
            padding-bottom: 10px;
            font-family: "Gilroy-ExtraBold";
        }

        section.paymentImage {
            width: 100%;
            height: 100%;
            background-position: center !important;
            background-size: 100% 100% !important;
            background-repeat: no-repeat !important;
            background: url('<?php echo e(asset('front_assets/images/1x/banner1.png')); ?>');
        }
    </style>
    <div id="pageloader">
        <img src="<?php echo e(asset('front_assets/images/Spinner.gif')); ?>" alt="processing..." />
    </div>
    <!-- ================================== Payment =============================== -->
    <section class="paymentImage">
        <div class="payment-main">
            <div class="container">
                <div class="payment-wrapper">
                    <div class="">
                        <div class="">

                            <div class="row">
                                <aside class="col-lg-8 mx-auto">
                                    <!-- ============== COMPONENT PAYMENT MINI =============== -->
                                    

                                    <!-- ============== COMPONENT PAYMENT MINI .// =============== -->


                                    <div class="col-lg-8 mx-auto mt-5 text-center paymentTop">
                                        <h1 class="forget-password-text pt-5 text mb-3">Proceed To Payment</h1>
                                        <div class="paymentWrap d-flex justify-content-center">
                                            <div class="btn-group paymentBtnGroup btn-group-justified"
                                                data-toggle="buttons">

                                                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token"
                                                    id="_token" />
                                                <form id="regiterForm">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="d-flex justify-content-center mt3 mb5 wow bounceIn">
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                    </div>



                                </aside> <!-- col.// -->
                            </div> <!-- row.// --><br><br>
                        </div> <!-- container end.// -->
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script
        src="https://www.paypal.com/sdk/js?client-id=Ae-EHs_cy-mc2roPWWlikaQrfUs4Uxr7DGiMIQBUiyJfTH1C5wPDS2V3_Tpo-DLGt2ENELAOsku36YaF&vault=true&intent=subscription"
        data-sdk-integration-source="button-factory"></script>


    <script>
        var planLocalId = '<?php echo e($package->id); ?>';
        var plan_id_array = [null, 'P-6RK89593HU0005914MQXTQSA', 'P-7HD77584DG004432NMQXTSCA', 'P-9KR84362NW885261NMQXTT4A',
            'P-5CD347348D080803SMQXTVOQ', 'P-6FC34169JN8074052MQXTWMA', 'P-4VR598325X7757835MQXTXDA'
        ];


        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
                return actions.subscription.create({
                    'plan_id': plan_id_array[planLocalId]
                });
            },
            onApprove: function(data, actions) {
                //   console.log(details);

                $.ajax({
                    url: "<?php echo e(route('signupsubscription-payment')); ?>",
                    type: 'GET',
                    data: data,
                    success: function(data) {
                        $("#pageloader").fadeIn();
                        if (data.status == 200) {
                            console.log(data)
                            // swal({
                            //     title: "Dear User!",
                            //     text: 'You have successfully purchased the plan',
                            //     type: "success",
                            //     icon: "success",
                            // }).then(function() {
                            //     location.href = "<?php echo e(route('customer-search')); ?>";
                            // });
                            setTimeout(() => {
                                window.location.href = "<?php echo e(env('APP_URL')); ?>login?msg=true";
                            }, 500);
                        } else {

                            swal({
                                title: "Dear User!",
                                text: 'Something went wrong!, Please try again',
                                type: "error",
                                icon: "error",
                            }).then(function() {
                                location.href = "<?php echo e(route('customer-search')); ?>";
                            });

                        }


                    }

                });
                console.log('Transaction completed');
            }
        }).render('#paypal-button-container'); // Renders the PayPal button
    </script>


    <script type="text/javascript">
        $("#regiterForm").submit(function() {

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\next_client\resources\views/frontend/signuppayment.blade.php ENDPATH**/ ?>