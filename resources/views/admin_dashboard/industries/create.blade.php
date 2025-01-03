@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Industry</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('industry-index') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('industry-create-post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Industry Type</label>
                                            <input class="form-control" type="text" placeholder="Enter Business Type"
                                                data-bs-original-title="" title="" name="industry_type"
                                                value="{{ old('industry_type') }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea class="form-control editor" name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div> --}}
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" id="" class="btn btn-success me-3">Add</button>
                                            {{-- <a class="btn btn-danger" href="{{ route('industry-index') }}"
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
@endsection
