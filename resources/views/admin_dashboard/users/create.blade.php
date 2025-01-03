@extends('admin_dashboard.layouts.master')
@section('content')
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

        @keyframes spin {
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
                        <h5></h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('user-index') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('user-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
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
                                                value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Last Name"
                                                data-bs-original-title="" title="" name="last_name"
                                                value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" placeholder="Enter Email"
                                                data-bs-original-title="" title="" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>D.O.B</label>
                                            <input class="form-control" type="date" placeholder="D.O.B"
                                                data-bs-original-title="" title="" name="date_of_birth"
                                                value="{{ old('date_of_birth') }}">

                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Business Name</label>
                                            <select name="industry_id" id="" class="form-control"
                                                onChange="check(this);">
                                                <option value="">
                                                    Select Business Name
                                                </option>
                                                @foreach ($industries as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->industry_type ?? null }}
                                                    </option>
                                                @endforeach
                                                <option value="0">Other</option>

                                            </select>
                                            {{-- <input class="form-control" type="text" placeholder="Enter Business Name"
                                                data-bs-original-title="" title="" name="business_name"
                                                value="{{ old('business_name') }}"> --}}

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
                                            <input class="form-control" type="text" placeholder="Enter Business License"
                                                data-bs-original-title="" title="" name="business_license"
                                                value="{{ old('business_license') }}">

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
                                                value="{{ old('business_information') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
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
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" placeholder="Enter Password"
                                                data-bs-original-title="" title="" name="password"
                                                value="{{ old('password') }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Confirm Password</label>
                                            <input class="form-control" type="password" placeholder="Enter Password"
                                                data-bs-original-title="" title="" name="confirm_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" id="createuser"
                                                class="btn btn-success me-3">Add</button>
                                            {{-- <a class="btn btn-danger" href="{{ route('user-index') }}"
                                                data-bs-original-title="" title="">Cancel</a> --}}
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

    <!-- {{-- script start --}} -->

    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>

    <script>
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
        function check(elem) {
            // use one of possible conditions
            // if (elem.value == 'Other')
            if (elem.value == 0) {
                document.getElementById("other-div").style.display = 'block';
            } else {
                document.getElementById("other-div").style.display = 'none';
            }
        }
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
        $("#createuser").on('click', function() {
            $("#preloader").css('display', 'block');
        });
    </script>
@endsection
