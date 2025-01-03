@extends('admin_dashboard.layouts.master')
@section('content')
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
                        <h5>Edit User Details</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('user-index') }}">Back</a></div>

                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('user-update', $users->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf

                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <input type="hidden" name="prev_password" value="{{ $users->password }}">

                                @if (!empty($update_user_profile))
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @if (!empty($update_user_profile->profile_image))
                                                    <img src="{{ url('public/profiles/' . $update_user_profile->profile_image) }}"
                                                        alt=""
                                                        style="object-fit:contain; width:120px; height:100px;"> <br><br><br>
                                                @endif
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
                                                    value="{{ $update_user_profile->first_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" placeholder="Enter Last Name"
                                                    data-bs-original-title="" title="" name="last_name"
                                                    value="{{ $update_user_profile->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Email</label>
                                                <input class="form-control" type="email" placeholder="Enter Email"
                                                    data-bs-original-title="" title="" name="email"
                                                    value="{{ $update_user_profile->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>D.O.B</label>
                                                <input class="form-control" type="date" placeholder="Enter D.O.B"
                                                    data-bs-original-title="" title="" name="date_of_birth"
                                                    value="{{ $update_user_profile->date_of_birth }}">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Business Name</label>
                                                @if ($update_user_profile->industry_id == null)
                                                    <input type="text" name="industry_name"
                                                        value="{{ $update_user_profile->business_name }}">
                                                    {{-- <option
                                                            value="{{ $update_user_profile->business_name ? 'selected' : '' }}">
                                                            {{ $update_user_profile->business_name }}</option> --}}
                                                @else
                                                    <select name="industry_id" id="" class="form-control"
                                                        onChange="check(this);">
                                                        <option
                                                            value="{{ $update_user_profile->industry_id ? 'selected' : '' }}">
                                                            {{ !empty($update_user_profile->industryProfile->industry_type) ? $update_user_profile->industryProfile->industry_type : 'Select Business Name' }}
                                                @endif
                                                {{-- <option value="{{ $update_user_profile->industry_id }}">
                                                        {{ !empty($update_user_profile->industryProfile->industry_type) ? $update_user_profile->industryProfile->industry_type : 'Select Business Name' }}
                                                    </option> --}}
                                                @foreach ($industries as $value)
                                                     {{-- <option disabled selected>Select Business Name</option>  --}}
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->industry_type ?? null }}
                                                    </option>
                                                @endforeach
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
                                                    value="{{ $update_user_profile->business_license }}">
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
                                                    value="{{ $update_user_profile->business_information }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @if (!empty($update_user_profile->business_license_copy))
                                                    <img src="{{ url('public/business_licenses/' . $update_user_profile->business_license_copy) }}"
                                                        alt="" height="100px" width="100px"
                                                        style="object-fit: contain;">
                                                    <br><br><br>
                                                    {{-- <iframe   src="{{ url('public/business_licenses/' . $update_user_profile->business_license_copy) }}">
                                            </iframe> --}}
                                                @else
                                                    <img src="{{ asset('front_assets/images/1x/No-image.jpg') }}"
                                                        width="100px" height="100px" alt="">
                                                @endif
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
                                                    name="contact" value="{{ $update_user_profile->contact }}">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address"
                                                    data-bs-original-title="" title="" name="address"
                                                    value="{{ $update_user_profile->address }}">
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
                                                    value="{{ $update_user_profile->postal_code }}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============ OLD DATA ================= --}}
                                @else
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @if (!empty($users->profile_image))
                                                    <img src="{{ url('public/profiles/' . $users->profile_image) }}"
                                                        alt=""
                                                        style="object-fit:contain; width:120px; height:100px;">
                                                    <br><br><br>
                                                @endif
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
                                                    value="{{ $users->first_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" placeholder="Enter Last Name"
                                                    data-bs-original-title="" title="" name="last_name"
                                                    value="{{ $users->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Email</label>
                                                <input class="form-control" type="email" placeholder="Enter Email"
                                                    data-bs-original-title="" title="" name="email"
                                                    value="{{ $users->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>D.O.B</label>
                                                <input class="form-control" type="date" placeholder="Enter D.O.B"
                                                    data-bs-original-title="" title="" name="date_of_birth"
                                                    value="{{ $users->date_of_birth }}">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Business Name</label>
                                                <select name="industry_id" id="" class="form-control"
                                                    onChange="check(this);">
                                                    @if ($users->industry_id == null)
                                                        <option value="{{ $users->business_name }}">
                                                            {{ $users->business_name }}</option>
                                                        {{-- <option value="">
                                                            <input type="text" name="industry_name"
                                                                value="{{ $users->business_name }}">
                                                        </option> --}}
                                                    @else
                                                        <option value="{{ $users->industry_id }}">
                                                            {{ $users->industry->industry_type ?? null }}</option>
                                                    @endif
                                                    @foreach ($industries as $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->industry_type ?? null }}
                                                        </option>
                                                    @endforeach
                                                    <option value="0">Other</option>
                                                </select>
                                                {{-- <input class="form-control" type="text"
                                                    placeholder="Enter Business Name" data-bs-original-title=""
                                                    title="" name="business_name"
                                                    value="{{ $users->business_name }}"> --}}
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
                                                    value="{{ $users->business_license }}">
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
                                                    value="{{ $users->business_information }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                @if (!empty($users->business_license_copy))
                                                    <img src="{{ url('public/business_licenses/' . $users->business_license_copy) }}"
                                                        alt="" height="100px" width="100px"
                                                        style="object-fit: contain;">
                                                    <br><br><br>
                                                    {{-- <iframe   src="{{ url('public/business_licenses/' . $users->business_license_copy) }}">
                                            </iframe> --}}
                                                @else
                                                    <img src="{{ asset('front_assets/images/1x/No-image.jpg') }}"
                                                        width="100px" height="100px" alt="">
                                                @endif
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
                                                    name="contact" value="{{ $users->contact }}">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address"
                                                    data-bs-original-title="" title="" name="address"
                                                    value="{{ $users->address }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Postal Code</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Postal code" data-bs-original-title=""
                                                    title="" name="postal code" value="{{ $users->postal_code }}">
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
                                                        @if ($users->type == 1)
                                                            <label class="switch">
                                                                <input type="checkbox" id="togBtn"
                                                                    value="{{ $users->type }}" name="user_status"
                                                                    checked>
                                                                <div class="slider round"></div>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" id="togBtn"
                                                                    value="{{ $users->type }}" name="user_status">
                                                                <div class="slider round"></div>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                @endif
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" id="updateuser"
                                                class="btn btn-success me-3">Update</button>
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
@endsection
