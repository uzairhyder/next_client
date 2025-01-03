@extends('admin_dashboard.layouts.master')
@section('content')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">

@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <!-- <h3>Inquiry Details</h3> -->
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">Subscriber Details</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Package Subscriber</li>
    <li class="breadcrumb-item active"> Management</li>
@endsection

@section('content')
    <style>
        .pakagesInner {
            width: 320px;
            height: 260px;
            overflow: hidden;
        }

        .deteleButton {
            background-color: #C1272D;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .deteleButton a {
            color: #fff !important;
        }

        .editButton {
            background-color: #22B573;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .editButton a {
            color: #fff !important;
        }

        .round-cstm-btn-green {
            border-radius: 30px !important;
            padding: 10px 20px !important;
            font-family: Poppins-Regular;
            background-color: #00a808 !important;
            border: none;
        }

        .round-cstm-btn-red a,
        .round-cstm-btn-green a {
            color: #fff;
            font-size: 14px;
        }

        .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
            height: 100% !important;
        }

        .for-back {
            display: flex;
            padding: 10px 30px;
            border-bottom: 1px solid #ecf3fa;
            flex-direction: row-reverse;
        }

        /* modal css */
        .modal-title {
            color: #fff;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            text-align: center !important;
            font-family: 'Gilroy-Bold';
            font-size: 2rem;
        }

        .btn-close {
            padding: 10px !important;
            transform: rotate(177deg);
            background-image: url('{{ asset('assets/images/other-images/close.svg') }}') !important;
            margin-right: 10px !important;
        }

        .btn-closeDiv {
            width: 100%;
            display: flex;
            justify-content: end;
        }

        .modal-header {
            border-bottom: none !important;
            justify-content: center !important;
        }

        .modal-content {
            /* background-image: url("../images/SVG/modalimg.svg"); */
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 30px !important;
            padding-bottom: 150px;
            background-color: #003d70 !important;
        }

        .divMon h4 {
            color: #ffff;
            font-family: 'Gilroy-Bold';
        }

        .divMon span {
            color: #ffff;
            font-family: 'Gilroy-Bold';
            font-size: 2rem;
        }

        .divMon p {
            color: #ffff;
            font-family: 'Gilroy-Bold';
            font-size: 1.5rem;
        }

        .Package-card1 {

            transition: 0.4s all ease-in-out;
        }

        #Csmcontainer .card .Package-card1 {
            transition: 0.4s all ease-in-out;

        }

        [type=radio]:checked+.Package-card1 {
            cursor: pointer;
            /* transform: scale(1.1); */
            transition: 0.2s all ease-in-out;
            border: 5px solid #fff !important;
            border-radius: 22px;
        }

        */ #Csmcontainer .pakagesInner {
            position: absolute;
            width: 325px;
            height: 255px;
            /* margin-bottom: 3rem; */
            z-index: 0;
            cursor: pointer;

        }

        input.inputField {
            width: 100%;
            margin-bottom: 16px;
            border: 1px solid #8080804a !important;
        }

        button.btn.submitButton {
            background-color: #29ABE2;
            color: #fff;
        }

        .pkgSection label {
            display: flex;
            justify-content: center;

        }

        .pakagesInner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url('{{ asset('assets/images/other-images/pakagesinnerbg.png') }}');
            z-index: -2;
        }

        .pakagesInner.p-card {
            position: sticky;
        }


        .divMon {
            padding: 2rem;
        }

        .btn-close {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: 0.25em 0.25em;
            color: #000;
            background: transparent url('{{ asset('assets/images/other-images/close.svg') }}');
            border-radius: 0.25rem;
            opacity: .5;
        }

        .updateBtnn {
            color: #003D70;
            background-color: #fff;
            font-family: 'Gilroy-Bold';
            border: none;
            border-radius: 31px;
            padding: 7px 30px;
            font-size: 14px;
            border: 1px solid #003D70;
            margin-left: 1.5rem;
        }

        .card-input-element {
            display: none;
        }

        .card-input {
            margin: 10px;
            border: 5px solid transparent !important;
            border-radius: 22px;
            position: relative;
        }

        .card-input:hover {
            cursor: pointer;
        }

        .card-input-element:checked+.card-input {
            cursor: pointer !important;
            transition: 0.2s all ease-in-out !important;
            border: 5px solid #fff !important;
            border-radius: 22px !important;
        }

        button.updateButton {
            border-radius: 20px;
            padding: 8px 31px;
            border: none;
            background-color: #fff;
            font-family: 'Gilroy-Bold';
            font-weight: bold;
            color: #0071BC;
            border: 1px solid #003D70;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="for-back">

                        <a class="btn btn-success" href="{{ route('customers') }}" data-bs-original-title=""
                            title="">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $detail->get_user->first_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $detail->get_user->last_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $detail->get_user->email ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{ $detail->get_user->contact ?? 'no contact found' }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th>Created At</th>
                                        <td>{{ date('j-M-Y g:i A', strtotime($detail->created_at)) ?? '' }}</td>
                                    </tr> --}}

                                    <tr>
                                        <th>Package Name</th>
                                        <td>{{ $detail->get_package->title ?? '' }}</td>
                                    </tr>

                                    {{-- @dd(!$detail->get_package->title == "Free Sign up"); --}}
                                    @if ($detail->get_package->title == "Free Sign up")
                                    <tr>
                                        <th>Package Start Date</th>
                                        <td>{{ date('j-M-Y g:i A', strtotime($detail->start_date)) ?? '' }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th>Package Price</th>
                                        <td>${{ $detail->get_package->price ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Package Description</th>
                                        <td>{!! $detail->get_package->description ?? '' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Package Start Date</th>
                                        <td>{{ date('j-M-Y g:i A', strtotime($detail->start_date)) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Package End Date</th>
                                        <td>{{ date('j-M-Y g:i A', strtotime($detail->end_date)) ?? '' }}</td>
                                    </tr>
                                    @endif

                                    <tr>
                                        <th>Package Total Points</th>
                                        <td>
                                            {{-- {{ $detail->get_package->package_points ?? '' }} --}}
                                            @if (!empty($detail))
                                            @if ($detail->package_points == 'unlimited' || $detail->previous_points == 'unlimited')
                                                <b>Unlimited/{{ $detail->get_package->package_points ?? '' }}
                                                </b>
                                            @else
                                            {{ $detail->package_points + ($detail->previous_points ?? 0) }}
                                            @endif
                                        @else
                                            <b>N/A</b>
                                        @endif
                                        </td>
                                    </tr>

                                    {{-- <tr>
                                        <th>Package Remaining Points</th>
                                        <td>{{ $detail->package_points }}</td>
                                    </tr> --}}

                                    <tr>
                                        <th>Cancel User Package</th>
                                        <td class="">
                                            @if ($detail->cancel_status == 0)
                                            <a href="{{ route('admincancel-purchase-package', $detail->subscriptionID ?? '') }}"
                                                id="delete"><button class="btn btn-danger mr-2" type="button"
                                                    data-original-title="btn btn-danger btn-xs">
                                                    Cancel</button></a>
                                            @else
                                            <button class="btn btn-info mr-2" type="button"
                                                    data-original-title="btn btn-danger btn-xs">
                                                    Canceled</button>
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Update User Package Points</th>
                                        <td>
                                            <form id="myForm">
                                                <!-- Form fields -->
                                                <input type="text" name="points" class="inputField">
                                                <input type="hidden" name="user_id" value="{{ $detail->user_id }}">
                                                <input type="hidden" name="package_id" value="{{ $detail->package_id }}">

                                                <!-- Submit button -->
                                                <button type="button" onclick="submitForm()"
                                                    class="btn submitButton">Submit</button>
                                            </form>
                                            {{-- <form id="insertForm">
                                                <input type="text" name="points" class="form-control" id="points">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </form> --}}
                                            {{-- <div class="mb-4 mt-4">
                                                <button type="button" class="updateBtn btn btn-success"
                                                    data-bs-toggle="modal" data-bs-target="#myModal"
                                                    onclick="get_old_packageid('{{ $detail->package_id ?? 0 }}')">Update
                                                    Package</button>
                                            </div> --}}
                                        </td>

                                    </tr>

                                    {{-- <a href="{{ route('update-purchased-package', ['id1' => $detail->package_id, 'id2'=> $detail->user_id]) }}"><button
                                                    class="btn btn-success mr-2" type="button"
                                                    data-original-title="btn btn-danger btn-xs">
                                                    Update</button></a> --}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>



    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Package Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="conatiner">
                        <div class="row">
                            @foreach ($member_packages as $value)
                                @if ($value->id != 7)
                                    <div class="col-lg-4">
                                        <label>
                                            <input type="radio" name="product" class="card-input-element" />
                                            <div class="Package-card p-card card-input">
                                                <div class="pakagesInner p-card"
                                                    onclick="get_package('{{ $value->id }}', '{{ $detail->user_id ?? 0 }}')">
                                                    {{-- <div class="cstm-card-background">
                                                        <img src="{{ asset('images/' . $value->image) }}" alt="">
                                                    </div> --}}
                                                    <div class="pakagesInner">
                                                        <div class="divMon">
                                                            <h4>{{ $value->title ?? '' }}</h4>
                                                            <span>${{ $value->price ?? '' }}</span>
                                                            <p>{!! $value->description ?? '' !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-lg-12 text-center mt-4">
                                <a href="" id="payment_redirect"><button type="button"
                                        class="updateButton">Update</button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <script>
        function get_old_packageid(old_packageid) {
            // alert(old_packageid, user_id);
            console.log(old_packageid, user_id);
            // console.log(user_id);
            $.ajax({
                url: "{{ route('adminstore-old-purchase-package-id') }}",
                type: "GET",
                data: {
                    id: old_packageid
                },
                success: function(response) {
                    if (response.status == 200) {
                        toastr.success('Your Current Package is (' + response.title + ' ' + response.price +
                            ')', 'success');
                        // $("#payment_redirect").attr("href","{{ route('paypal-amount-update') }}");

                    }
                },
            });
        }

        function get_package(id, user_id) {
            console.log(id, user_id);

            $.ajax({
                url: "{{ route('adminupdate-purchase-package') }}",
                type: "GET",
                data: {
                    id: id,
                    user_id: user_id
                },
                success: function(response) {
                    if (response.status == 200) {
                        toastr.success('Package (' + response.title + ' ' + response.price +
                            ') has been selected, successfully!', 'success');
                        $("#payment_redirect").attr("href",
                            "{{ route('adminpaypal-amount-update') }}");

                    }
                },
            });



        }

        $("#payment_redirect").on("click", function() {
            // console.alert("payment");
            if (!$("#payment_redirect").attr("href")) {
                toastr.info('Please Select any Package first');
            }
        });
    </script> --}}
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function submitForm() {
                var form = $('#myForm');

                $.ajax({
                    url: "{{ route('adminsubcription_updatepaypal_payment') }}",
                    type: 'POST',
                    data: form.serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                title: "Dear User!",
                                text: 'You have successfully Update the plan',
                                type: "success",
                                icon: "success",
                            }).then(function() {
                                location.href = "{{ route('customers') }}";
                            });
                            // console.log(data)
                            return false;
                            // console.log(data)
                            location.href = "{{ route('customers') }}";

                        }
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }
                    },
                    error: function(xhr) {
                        // Handle any errors during the AJAX request
                        console.log(xhr.responseText);
                    }
                });
            }
        </script>
    @endpush
@endsection

@section('script')

    <script script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    </script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
</script>
