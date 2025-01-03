@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Industry</h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('industry-index') }}">Back</a></div>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form action="{{ route('industry-update', ['id' => $industries->id]) }}" method="POST">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Industry Type</label>
                                            <input class="form-control" type="text" placeholder="Enter Industry Type"
                                                data-bs-original-title="" title="" name="industry_type"
                                                value="{{ $industries->industry_type }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" class="btn btn-success me-3">Update</button>
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
    <script>
        $("#points").keyup(function(e) {
            var num = this.value.match(/^\d+$/);
            if (num === null || num == 0) {
                this.value = "";
            }
        });
    </script>
@endsection
