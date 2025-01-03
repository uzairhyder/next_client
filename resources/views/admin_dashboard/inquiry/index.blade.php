@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Query List </h5>
                        <div class=""></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table data-order='[[ 0, "desc" ]]' class="display dataTable no-footer" id="basic-1" role="grid"
                                    aria-describedby="basic-1_info">
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
                                                aria-label="Details: activate to sort column ascending"> Contact</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Message</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inquiries as $value)
                                            <tr role="row" class="odd">
                                                <td>
                                                    {{ $loop->iteration ?? null }}
                                                </td>
                                                <td>
                                                    {{ $value->name ?? null }}
                                                </td>

                                                <td>
                                                    {!! $value->email ?? null !!}
                                                </td>
                                                <td>
                                                    {!! $value->contact ?? null !!}
                                                </td>
                                                <td>
                                                    {!! Str::limit($value->message,30) ?? null !!}
                                                </td>
                                                <td>
                                                        <button class="btn btn-danger btn-xs" onclick="confirmDelete('{{ $value->id }}')"
                                                            data-original-title="btn btn-danger btn-xs">Delete</button>

                                                    <a href="{{ route('view-inquiry', $value->id) }}"> <button
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">View</button></a>
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
                    url: "{{route('delete-contact')}}",
                    type: "GET",
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}"
                    },
                 success: function () {
                      setTimeout(() => {
                      location.reload();
                      }, 500);
                    swal("Done!","It was succesfully deleted!","success");
                 }
                 });
                 }else{
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                };

             });
    }
        </script>



    @endsection
