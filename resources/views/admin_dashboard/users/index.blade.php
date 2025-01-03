@extends('admin_dashboard.layouts.master')
@section('content')
    <style>
        .add-margin-for-space {
            margin: 0px 6px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Users List </h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('user-create') }}">Add</a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table data-order='[[ 0, "desc" ]]' class="display dataTable no-footer" id="basic-1"
                                    role="grid" aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                S.NO</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Business Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Created at</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Status</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Trust Status</th> --}}

                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Profile Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $value)
                                            <tr role="row" class="odd">
                                                <td>
                                                    {{ $loop->iteration ?? null }}
                                                </td>

                                                @if ($value->profile_status == 0)
                                                <td>
                                                    {{ $value->profileUpdates->first_name ?? $value->first_name }}
                                                    {{ $value->profileUpdates->last_name ?? $value->last_name }}
                                                </td>
                                                @endif
                                                @if ($value->profile_status == 1)
                                                <td>
                                                    {{ $value->first_name }}
                                                    {{ $value->last_name  }}
                                                </td>
                                                @endif
                                                <td>
                                                    {{ $value->email }}
                                                </td>
                                                <td>
                                                    @if ($value->industry_id == null)
                                                        {{ $value->business_name }}
                                                    @else
                                                        {{ $value->industry->industry_type ?? null }}
                                                    @endif

                                                </td>
                                                {{-- <td>{{ date('j-M-Y', strtotime($value->created_at)) ?? '' }}</td> --}}
                                                <td>{{ date('j-M-Y g:i A', strtotime($value->created_at)) ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('user-status', ['id' => $value->id]) }}">
                                                        @if ($value->status == 1)
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        @elseif ($value->status == 2)
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        @elseif ($value->status == 0)
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        @endif
                                                    </a>
                                                </td>

                                                {{-- ====== trusted user ==== --}}
                                                {{-- <td>
                                                    <a href="{{ route('user-trust-type', ['id' => $value->id]) }}">
                                                        @if ($value->type == 1)
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-lock"></i></button>
                                                        @endif
                                                    </a>
                                                </td> --}}

                                                {{-- <td>
                                                    <a href="{{ route('user-trust-type', ['id' => $value->id]) }}">
                                                        @if ($value->profile_status == 1)
                                                        <button class="btn btn-info btn-sm" id="status"><i class="fa fa-thumbs-up"></i></button>
                                                        @else
                                                        <button class="btn btn-danger btn-sm" id="status"><i class="fa fa-lock"></i></button>
                                                        @endif
                                                    </a>
                                                </td> --}}
                                                <td class="d-flex">
                                                    <button class="btn btn-danger btn-xs"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        onclick="confirmDelete('{{ $value->id }}')">Delete</button>
                                                    <a href="{{ route('user-edit', $value->id) }}"> <button
                                                            class="btn btn-success btn-xs add-margin-for-space"
                                                            type="button" data-original-title="btn btn-danger btn-xs "
                                                            title="" data-bs-original-title="">Edit</button></a>

                                                    <a href="{{ route('user-view', $value->id) }}"> <button
                                                            class="btn btn-success btn-xs add-margin-for-space"
                                                            type="button" data-original-title="btn btn-danger btn-xs"
                                                            title="" data-bs-original-title="">View</button></a>

                                                    {{-- @foreach ($subscribers as $user_package)
                                                        @if ($user_package->cancel_status == 0)
                                                            @if ($user_package->user_id == $value->id)
                                                                <a href="{{ route('subscriber-view', $user_package->id) }}">
                                                                    <button class="btn btn-primary btn-xs" type="button"
                                                                        data-original-title="btn btn-primary btn-xs"
                                                                        data-toggle="tooltip"
                                                                        title="Clients search package points subscriber"
                                                                        data-bs-original-title="">Subscriber</button>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-lock"></i> Canceled</button>
                                                        @endif
                                                    @endforeach --}}
                                                    {{-- @foreach ($get_ProfileUpdate as $user_profile)
                                                                @if ($user_profile->profile_status == 0)
                                                                <a href="{{ route('user-profile-update', $user_profile->profile_status) }}"> <button
                                                                    class="btn btn-info btn-xs" type="button"
                                                                    data-original-title="btn btn-primary btn-xs"
                                                                    data-toggle="tooltip" title="Clients search package points subscriber"
                                                                    data-bs-original-title="">Not Approved</button></a>
                                                            @endif
                                                            {{-- @if ($user_profile->profile_status == 1)
                                                                <a href="{{ route('user-profile-update', $user_profile->profile_status) }}"> <button
                                                                    class="btn btn-success btn-xs" type="button"
                                                                    data-original-title="btn btn-primary btn-xs"
                                                                    data-toggle="tooltip" title="Clients search package points subscriber"
                                                                    data-bs-original-title="">Approved</button></a>

                                                            @endif
                                                        @endforeach --}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.profile.details.to.update', $value->id) }}">
                                                        @if ($value->profile_status == 1)
                                                            <button class="btn btn-danger btn-sm" type="button" data-original-title="btn btn-danger btn-xs"
                                                            title="" data-bs-original-title="">
                                                                <i class="fa fa-lock"></i>Not Approved
                                                            </button>
                                                        @endif
                                                    </a>

                                                    {{-- its the latest work  --}}
                                                    {{-- <a href="{{ route('user-profile-update', ['id' => $value->id]) }}">
                                                        @if ($value->profile_status == 1)
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-lock"></i> Not Approved</button>
                                                        @endif
                                                    </a> --}}

                                                    {{-- @if ($value->profile_status == 1)
                                                    <button class="btn btn-info btn-sm" id="status"><i class="fa fa-thumbs-up"></i> Approved</button>
                                                    @endif --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>.
    <script>
        // $(document).ready(function() {

        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': false,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }

        //     $(".deleteuser").on("click", function() {
        //         var id = $(this).attr("data-id");
        //         $.ajax({
        //             url: "{{ route('user-delete', 'id') }}",
        //             data: {
        //                 "id": id,
        //                 '_method': 'DELETE',
        //                 "_token": "{{ csrf_token() }}"
        //             },
        //             // method: 'DELETE',
        //             success: function(result) {
        //                 toastr.success('User Delete Sucessfully');
        //                 setTimeout(() => {
        //                     location.reload();
        //                 }, 1000);
        //             }
        //         });
        //     });
        // })


        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
                if (result.isConfirmed == true) {
                    $.ajax({
                        url: "{{ route('user-delete') }}",
                        type: "GET",
                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function() {
                            setTimeout(() => {
                                location.reload();
                            }, 500);
                            swal("Done!", "It was succesfully deleted!", "success");

                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                };
            });

        }
    </script>



    {{-- @if (Session::has('Update_Faqs'))
    <script>
        toastr.success('Faqs Updated', '{{ Session::get('Update_Faqs') }}', 'success')
    </script>
@endif --}}
@endsection
