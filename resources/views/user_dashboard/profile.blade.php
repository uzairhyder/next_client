@include('user_dashboard.common.favicon')
@extends('frontend.layout')

<section class="profileSection">
    <div class="order-list1 py-5" id="paddingSmall">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('user_dashboard.common.sidebar')
            @if (Session::has('update'))
                <script type="text/javascript">
                    swal("Profile!", "{{ Session::get('update') }}", "success");
                </script>
            @endif
            @if (Session::has('update'))
                <script type="text/javascript">
                    swal("Profile!", "{{ Session::get('update') }}", "success");
                </script>
            @endif
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

                    </nav>
                    <!-- moblie navbar -->
                    @include('user_dashboard.common.mobile_sidebar')

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="">
                            <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                         <form action="{{ route('update-profile') }}" method="POST" class="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- @dd(Auth::user()->profile_status = 0) --}}
                                    @if (!empty($update_user_profile))

                                        <div class="row">
                                            <div class="col-lg-3">
                                                @if (!empty($update_user_profile->profile_image ?? ''))
                                                    <div class="profile">
                                                        <img src="{{ url('public/profiles/' . $update_user_profile->profile_image ?? '') }}"
                                                            id="output" alt="">
                                                    </div>
                                                    <input type="hidden" name="old_image" value="{{$update_user_profile->profile_image}}">
                                                @else
                                                    <div class="profile">
                                                        <img src="{{ asset('front_assets/images/1x/No-image.jpg') }}"
                                                            id="output" alt="">
                                                    </div>
                                                @endif
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
                                                        value="{{ $update_user_profile->first_name }}" />
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="first_name" class="form-control"
                                                                value="{{ $update_user_profile->first_name }}"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="last_name" class="form-control"
                                                                value="{{ $update_user_profile->last_name }}"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="Last Name">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $update_user_profile->email }}"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="Email" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="date" name="date_of_birth"
                                                                value="{{ $update_user_profile->date_of_birth }}"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="D.O.B">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <select name="industry_id" id="" class="selectOne"
                                                                onChange="check(this);">
                                                                @if ($update_user_profile->industry_id == null)
                                                                    <option
                                                                        value="{{ $update_user_profile->business_name }}">
                                                                        {{ $update_user_profile->business_name }}
                                                                    </option>
                                                                @else
                                                                    <option
                                                                        value="{{ $update_user_profile->industry_id }}">
                                                                        {{ $update_user_profile->industryProfile->industry_type }}
                                                                    </option>
                                                                @endif
                                                                @foreach ($industries as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->industry_type }}</option>
                                                                @endforeach
                                                                <option value="0">Other</option>
                                                            </select>
                                                            {{-- <input type="text" name="business_name"
                                                                value="{{ $update_user_profile->business_name }}"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Business Name"> --}}

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
                                                                value="{{ $update_user_profile->business_license }}"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Business License#">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="tel" id="phone12"
                                                                value="{{ $update_user_profile->contact }}"
                                                                name="contact" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                placeholder="Contact No.">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="text" name="address"
                                                                value="{{ $update_user_profile->address }}"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="Address">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <input type="number" name="postal_code"
                                                                value="{{ $update_user_profile->postal_code }}"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Postal Code">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <textarea type="message" name="business_information" id="" cols="85" rows="7"
                                                                placeholder="Business Information" style="height: 221px;">{{ $update_user_profile->business_information }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-8">

                                                            <div class="mb-3">
                                                                <input type="file" name="business_license_copy"
                                                                    class="saveBtn form-control"
                                                                    accept="image/*,.pdf,.doc,.docx,.txt">
                                                                <input type="hidden" name="old_business_license_copy_image" value="{{$update_user_profile->business_license_copy}}">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            @if ($update_user_profile->business_license_copy)
                                                                <a type="button"
                                                                    href="{{ asset('business_licenses/' . $update_user_profile->business_license_copy ?? '') }}"
                                                                    class="saveBtn"
                                                                    download>{{ $update_user_profile->business_license_copy }}</a>
                                                            @else
                                                                no file available
                                                            @endif

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

                            {{-- @dd($update_user_profile) --}}
                        @else
                            <div class="row">
                                <div class="col-lg-3">
                                    @if (!empty(Auth::user()->profile_image))
                                        <div class="profile">
                                            <img src="{{ url('public/profiles/' . Auth::user()->profile_image) }}"
                                                id="output" alt="">
                                                <input type="hidden" name="old_image" value="{{Auth::user()->profile_image}}">

                                        </div>
                                    @else
                                        <div class="profile">
                                            <img src="{{ asset('front_assets/images/1x/No-image.jpg') }}"
                                                id="output" alt="">
                                        </div>
                                    @endif
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
                                            value="{{ Auth::user()->first_name }}" />
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="first_name" class="form-control"
                                                    value="{{ Auth::user()->first_name }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="last_name" class="form-control"
                                                    value="{{ Auth::user()->last_name }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Last Name" required>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ Auth::user()->email }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="date" name="date_of_birth"
                                                    value="{{ Auth::user()->date_of_birth }}" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="D.O.B">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <select name="industry_id" id="" class="selectOne"
                                                    onChange="check(this);">
                                                    @if (Auth::user()->industry_id == null)
                                                        <option value="{{ Auth::user()->business_name }}">
                                                            {{-- This is profile --}}
                                                            {{ Auth::user()->business_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ Auth::user()->industry_id }}">
                                                            {{ Auth::user()->industry->industry_type }}
                                                        </option>
                                                    @endif

                                                    @foreach ($industries as $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->industry_type }}</option>
                                                    @endforeach
                                                    <option value="0">Other</option>
                                                </select>
                                                {{-- <input type="text" name="business_name"
                                                        value="{{ Auth::user()->industry->industry_type }}"
                                                        class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="Business Name"> --}}

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
                                                    value="{{ Auth::user()->business_license }}" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Business License#" required>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="tel" id="phone12"
                                                    value="{{ Auth::user()->contact }}" name="contact"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Contact No.">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="address"
                                                    value="{{ Auth::user()->address }}" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Address">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="number" name="postal_code"
                                                    value="{{ Auth::user()->postal_code }}" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="Postal Code">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <textarea type="message" name="business_information" id="" cols="85" rows="7"
                                                    placeholder="Business Information" style="height: 221px;">{{ Auth::user()->business_information }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="mb-3">
                                                    <input type="file" name="business_license_copy"
                                                        class="saveBtn form-control"
                                                        accept="image/*,.pdf,.doc,.docx,.txt">
                                                        <input type="hidden" name="old_business_license_copy_image" value="{{ Auth::user()->business_license_copy }}">

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                @if (Auth::user()->business_license_copy)
                                                    <a type="button"
                                                        href="{{ asset('business_licenses/' . Auth::user()->business_license_copy ?? '') }}"
                                                        class="saveBtn"
                                                        download>{{ Auth::user()->business_license_copy }}</a>
                                                @else
                                                    no file available
                                                @endif

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
                        @endif

                        {{-- <h1>{{ $update_user_profile->first_name }}</h1> --}}
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
                if ('{{ Auth::user()->profile_image }}') {
                    output.src = "{{ url('public/profiles/' . Auth::user()->profile_image) }}";
                } else {
                    output.src = "{{ asset('front_assets/images/1x/No-image.jpg') }}";
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
            if ('{{ Auth::user()->profile_image }}') {
                output.src = "{{ url('public/profiles/' . Auth::user()->profile_image) }}";
            } else {
                output.src = "{{ asset('front_assets/images/1x/No-image.jpg') }}";
            }
            this.value = '';

        }
    });
</script>
