@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Package</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('package.index') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('package.update', $packages->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="package_id" value="{{ $packages->id }}">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Title</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Your Package Title" data-bs-original-title=""
                                                title="" name="title" value="{{ $packages->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Price</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Your Package Price" data-bs-original-title=""
                                                title="" name="price" value="{{ $packages->price }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Package Points</label>
                                            <input class="form-control" id="points" type="text"
                                                placeholder="Enter Your Package Points" data-bs-original-title=""
                                                title="" name="package_points"
                                                value="{{ $packages->package_points ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Upload Image</label>
                                            <input class="form-control" id="points" type="file"
                                                placeholder="Enter Your Package Points" data-bs-original-title=""
                                                title="" name="image">
                                            <img src="{{ asset('images/' . $packages->image) }}" alt=""
                                                width="60px" height="60px">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Description</label>
                                            <textarea class="form-control editor" name="description" id="" cols="30" rows="10">{!! $packages->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" class="btn btn-success me-3">Update</button>
                                            {{-- <a class="btn btn-danger" href="{{ route('package.index') }}"
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
    <script>
        $("#points").keyup(function(e) {
            var num = this.value.match(/^\d+$/);
            if (num === null || num == 0) {
                this.value = "";
            }
        });
    </script>
@endsection
