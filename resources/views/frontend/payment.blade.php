@extends('frontend.layout')
@section('title', 'Payment')

@section('content')
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
            background: url('{{ asset('front_assets/images/1x/banner1.png') }}');
        }
    </style>
    <div id="pageloader">
        <img src="{{ asset('front_assets/images/Spinner.gif') }}" alt="processing..." />
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
                                    {{-- <article class="card">
                                     <div class="card-body">
                                         <h5 class="card-title text-center">Payment Form</h5>
                                         <form role="form">
                                             <div class="container">
                                                 <div class="row">
                                                     <div class="paymentCont">
                                                         <div class="headingWrap">
                                                             <h3 class="headingTop text-center py-3">Select Your Payment Method</h3>
                                                         </div>
                                                         <div class="row">
                                                             <div class="paymentWrap">
                                                                 <div class="btn-group paymentBtnGrou  d-flex justify-content-center" data-toggle="buttons">
                                                                     <div class="col-lg-3 d-flex justify-content-center">
                                                                         <label for="c1" class="btn paymentMethod">
                                                                             <input type="radio" name="options" id="c1" hidden checked>
                                                                             <div class="method visa"></div>
                                                                         </label>
                                                                     </div>
                                                                     <div class="col-lg-3 d-flex justify-content-center">
                                                                         <label for="c2" class="btn paymentMethod">
                                                                             <input type="radio" name="options" id="c2" hidden>
                                                                             <div class="method master-card"></div>

                                                                         </label>
                                                                     </div>
                                                                     <div class="col-lg-3 d-flex justify-content-center">
                                                                         <label for="c3" class="btn paymentMethod">
                                                                             <input type="radio" name="options" id="c3" hidden>
                                                                             <div class="method amex"></div>
                                                                         </label>
                                                                     </div>
                                                                     <!-- <div class="col-lg-3 d-flex justify-content-center">
                                                                                    <label class="btn paymentMethod">
                                                                                        <div class="method vishwa"></div>
                                                                                       <input type="radio" name="options" id="c4" hidden>
                                                                                   </label>
                                                                                 </div> -->
                                                                     <div class="col-lg-3 d-flex justify-content-center">
                                                                         <label for="c5" class="btn paymentMethod pay-p">
                                                                             <input type="radio" name="options" id="c5" hidden>
                                                                             <div class="method paypal"></div>
                                                                         </label>
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                         </div>


                                                     </div>

                                                 </div>
                                             </div>
                                             <div class="col-lg-12 mb-3">
                                                 <label class="form-label">Card Holder's Name</label>
                                                 <div class="input-group">
                                                     <div class="input-group-prepend">
                                                         <span class="input-group-text py-3"><i class="fa fa-user"></i></span>
                                                     </div>
                                                     <input type="text" class="form-control" name="username" placeholder="Ex. John Smith" required="">
                                                 </div> <!-- input-group.// -->
                                             </div>

                                             <div class="col-lg-12 mb-3"> <label class="form-label">Card Number</label>
                                                 <div class="input-group"> <input type="text" class="form-control py-2" id="cardNumber" name="cardNumber">
                                                     <span class="input-group-text"> <i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp; <i class="fab fa-cc-mastercard"></i> </span>
                                                 </div>
                                                 <!-- input-group end.// -->
                                             </div> <!-- col end.// -->
                                             <div class="row mb-4">
                                                 <div class="col-lg-auto mb-3"> <label class="form-label">
                                                         Expiration </label>
                                                     <div class="input-group"> <select class="form-select py-2" style="width: 120px;">
                                                             <option value="0">MM</option>
                                                             <option value="1">01 - January</option>
                                                             <option value="2">02 - February</option>
                                                             <option value="3">03 - March</option>
                                                         </select>
                                                         <select class="form-select py-2" style="width: 120px;">
                                                             <option value="1">YY</option>
                                                             <option value="2">2018</option>
                                                             <option value="3">2019</option>
                                                         </select>
                                                     </div>
                                                 </div> <!-- col end.// -->
                                                 <div class="col-lg-3"> <label class="form-label cvv" data-bs-toggle="tooltip" data-bs-html="true" title="3 digits on back side of the card"> CVV
                                                         <i class="fa fa-question-circle"></i>
                                                     </label> <input type="text" class="form-control py-2" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" placeholder="CVV">
                                                 </div> <!-- col end.// -->
                                             </div> <!-- row end.// -->
                                             <div class="mt-4 pb-4 text-center">
                                                 <a href="javascript:void(0);" class="w-100">
                                                     <button type="submit" class="btn">
                                                         Pay <span class="amount">$900</span>
                                                     </button>
                                                 </a>
                                             </div>
                                         </form>
                                     </div>
                                 </article> --}}

                                    <!-- ============== COMPONENT PAYMENT MINI .// =============== -->


                                    <div class="col-lg-8 mx-auto mt-5 text-center paymentTop">
                                        <h1 class="forget-password-text pt-5 text mb-3">Proceed To Payment</h1>
                                        <div class="paymentWrap d-flex justify-content-center">
                                            <div class="btn-group paymentBtnGroup btn-group-justified"
                                                data-toggle="buttons">

                                                <input type="hidden" value="{{ csrf_token() }}" name="_token"
                                                    id="_token" />
                                                <form id="regiterForm">
                                                    {{ csrf_field() }}
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
        var planLocalId = '{{ $package->id }}';
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
                    url: "{{ route('store_package_payment') }}",
                    type: 'GET',
                    data: data,
                    success: function(data) {
                        $("#pageloader").fadeIn();
                        if (data.status == 200) {
                            console.log(data)
                            swal({
                                title: "Dear User!",
                                text: 'You have successfully purchased the plan',
                                type: "success",
                                icon: "success",
                            }).then(function() {
                                location.href = "{{ route('customer-search') }}";
                            });
                        } else {

                            swal({
                                title: "Dear User!",
                                text: 'Something went wrong!, Please try again',
                                type: "error",
                                icon: "error",
                            }).then(function() {
                                location.href = "{{ route('customer-search') }}";
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
@endsection
