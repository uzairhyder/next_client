@extends('admin_dashboard.layouts.master')
@section('content')
    <style>
        .footer {
            margin-left: -20px !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Configurations</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('configuration.index') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('configuration.update', $copyright->id) }}"
                                method="POST">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="configuration_id" value="{{ $copyright->id }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Copy Right</label>
                                            <input class="form-control" type="text" placeholder="Enter Your Name"
                                                data-bs-original-title="" title="" name="copy_right"
                                                value="{{ $copyright->copy_right }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Contact</label>
                                            <input class="form-control" type="tel" id="phone12"
                                                placeholder="Enter Your Contact" data-bs-original-title="" title=""
                                                name="contact" value="{{ $copyright->contact }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" placeholder="Enter Your Email"
                                                data-bs-original-title="" title="" name="email"
                                                value="{{ $copyright->email }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address"
                                                    data-bs-original-title="" title="" name="address"
                                                    value="{{ $copyright->address }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="">Map Link</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter Embeded Map Link" data-bs-original-title=""
                                                    title="" name="map_link" value="{{ $copyright->map_link }}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Short Description</label>
                                            <textarea class="form-control editor" name="short_description" id="" cols="30" rows="10">{!! $copyright->short_description !!}</textarea>
                                        </div>
                                    </div>
                                </div> --}}
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <button type="submit" class="btn btn-success me-3">Update</button>
                                                {{-- <a class="btn btn-danger" href="{{ route('configuration.index') }}"
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
@endsection
