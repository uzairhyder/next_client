@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Logo</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('logo.index') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('logo.update', $logos->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="logo_id" value="{{ $logos->id }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Image Type</label>
                                            <input class="form-control" type="text" placeholder="Enter  Logo Type"
                                                data-bs-original-title="" title="" name="type"
                                                value="{{ $logos->type }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Upload Logo Image</label>
                                            <input class="form-control" type="file" placeholder="Upload  Image"
                                                data-bs-original-title="" title="" name="logo_image">
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ url('public/logos/' . $logos->image) }}" alt="" height="100px"
                                    width="100px" style="object-fit: contain; background: lightgray"> <br><br><br>


                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" class="btn btn-success me-3">Update</button>
                                            {{-- <a class="btn btn-danger" href="{{ route('logo.index') }}" data-bs-original-title="" title="">Cancel</a> --}}
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
    @push('scripts')
        {{-- <script>
    $("input[type='file']").on("change", function () {
        if(this.files[0].size > 3000000) {
            toastr.error("Please Upload file less than 3 Mb")
            $(this).val('');
        }
    });
    </script> --}}

        <script>
            $("input[type='file']").on("change", function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var type = input.files[0].type; // image/jpg, image/png, image/jpeg...
                    // allow jpg, png, jpeg, bmp, gif, ico
                    var type_reg = /^image\/(jpg|png|jpeg|bmp|gif|ico|webp|svg)$/;
                    if (type_reg.test(type)) {} else {
                        toastr.error("You must select an image file only.")
                        this.value = '';
                    }
                }
                if (this.files[0].size > 3000000) {
                    toastr.error("Please Upload file less than 3 Mb")
                    $(this).val('');
                }
            });
        </script>
    @endpush
@endsection
