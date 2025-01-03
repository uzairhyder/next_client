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
                        <h5>Industries List </h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('industry-create') }}">Add</a></div>

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
                                                aria-label="Details: activate to sort column ascending">Industry Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Status</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Trust Status</th> --}}

                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($industries as $value)
                                            <tr role="row" class="odd">
                                                <td>
                                                    {{ $loop->iteration ?? null }}
                                                </td>
                                                <td>
                                                    {{ $value->industry_type }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('industry-status', ['id' => $value->id]) }}">
                                                        @if ($value->status == 1)
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        @endif
                                                    </a>
                                                </td>


                                                <td class="d-flex">
                                                    {{-- <button class="btn btn-danger btn-xs"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        onclick="confirmDelete('{{ $value->id }}')">Delete</button> --}}
                                                    <a href="{{ route('industry-edit', ['id' => $value->id]) }}"> <button
                                                            class="btn btn-success btn-xs add-margin-for-space"
                                                            type="button" data-original-title="btn btn-danger btn-xs "
                                                            title="" data-bs-original-title="">Edit</button></a>
                                                </td>
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
    </script>



    {{-- @if (Session::has('Update_Faqs'))
    <script>
        toastr.success('Faqs Updated', '{{ Session::get('Update_Faqs') }}', 'success')
    </script>
@endif --}}
@endsection
