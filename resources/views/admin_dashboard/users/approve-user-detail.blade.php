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
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">User Details to Update Profile</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active"> Management</li>
@endsection

@section('content')
    <style>
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
    </style>
    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="for-back">
                        <a class="btn btn-success" href="{{ route('user-index') }}" data-bs-original-title=""
                            title="">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            {{-- <table class="display" id="basic-1">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>User Profile Image</th>
                                        <td>
                                            <div class="profile">
                                                @if (!empty($detail->profile_image ?? ''))
                                                    <img src="{{ url('public/profiles/' . $detail->profile_image ?? '') }}"
                                                        width="100px" height="100px" style="object-fit: contain;"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('front_assets/images/1x/No-image.jpg') }}"
                                                        width="100px" height="100px" alt="">
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $detail->first_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $detail->last_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $detail->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{ $detail->contact ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ date('j-M-Y g:i A', strtotime($detail->created_at)) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $detail->address ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Postal code</th>
                                        <td>{{ $detail->postal_code ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Business Name</th>
                                        <td>{{ $detail->industryProfile->industry_type ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Business License</th>
                                        <td>{{ $detail->business_license ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Business Information</th>
                                        <td>{{ $detail->business_information ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>

                                        <th>Copy of Business License</th>
                                        <td>

                                                {{ $detail->business_license_copy ??'N/A'}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Apprroved</th>
                                        <td>
                                            <a href="{{ route('user-profile-update', ['id' => $detail->user_id]) }}">
                                                    <button class="btn btn-danger btn-sm" id="status"><i
                                                            class="fa fa-lock"></i> Not Approved
                                                    </button>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table> --}}
                            <table class="display" id="basic-1">
                                <tbody>
                                    @if ($detail)
                                        @if ($detail->profile_image !== $detail->get_userprofile->profile_image)
                                            <tr>
                                                <th>User Profile Image</th>
                                                <td>
                                                    <div class="profile">
                                                        @if (!empty($detail->profile_image ?? ''))
                                                            <img src="{{ url('public/profiles/' . $detail->profile_image ?? '') }}"
                                                                width="100px" height="100px" style="object-fit: contain;" alt="">
                                                        @else
                                                            <img src="{{ asset('front_assets/images/1x/No-image.jpg') }}" width="100px"
                                                                height="100px" alt="">
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($detail->first_name !== $detail->get_userprofile->first_name)
                                            <tr>
                                                <th>First Name</th>
                                                <td>{{ $detail->first_name }}</td>
                                            </tr>
                                        @endif
                                        @if ($detail->last_name !== $detail->get_userprofile->last_name)
                                            <tr>
                                                <th>Last Name</th>
                                                <td>{{ $detail->last_name }}</td>
                                            </tr>
                                        @endif
                                        <!-- Repeat the same pattern for other fields -->
                                        @if ($detail->email !== $detail->get_userprofile->email)
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $detail->email }}</td>
                                            </tr>
                                        @endif
                                        @if ($detail->contact !== $detail->get_userprofile->contact)
                                            <tr>
                                                <th>Contact</th>
                                                <td>{{ $detail->contact }}</td>
                                            </tr>
                                        @endif
                                        {{-- @if ($detail->created_at !== $detail->get_userprofile->created_at)
                                            <tr>
                                                <th>Created At</th>
                                                <td>{{ date('j-M-Y g:i A', strtotime($detail->created_at)) ?? '' }}</td>
                                            </tr>
                                        @endif --}}
                                        <!-- Continue repeating for other fields -->
                                        @if ($detail->business_license !== $detail->get_userprofile->business_license)
                                            <tr>
                                                <th>Business License</th>
                                                <td>{{ $detail->business_license }}</td>
                                            </tr>
                                        @endif
                                        @if ($detail->business_information !== $detail->get_userprofile->business_information)
                                            <tr>
                                                <th>Business Information</th>
                                                <td>{{ $detail->business_information }}</td>
                                            </tr>
                                        @endif
                                        @if ($detail->business_license_copy !== $detail->get_userprofile->business_license_copy)
                                            <tr>
                                                <th>Copy of Business License</th>
                                                <td>{{ $detail->business_license_copy ?? 'N/A' }}</td>
                                            </tr>
                                        @endif
                                        <!-- Add the last row outside the if block -->
                                        <tr>
                                            <th>Apprroved</th>
                                            <td>
                                                <a href="{{ route('user-profile-update', ['id' => $detail->user_id]) }}">
                                                    <button class="btn btn-danger btn-sm" id="status"><i class="fa fa-lock"></i> Not Approved
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
