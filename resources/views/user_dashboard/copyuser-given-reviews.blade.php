@include('user_dashboard.common.favicon')

@extends('frontend.layout')
@section('title','Dashboard')
<style>
    .checked {
  color: #d98d08 !important;
}

</style>

<section class="profileSection">
    <div class="order-list1 py-5" id="paddingSmall">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('user_dashboard.common.sidebar')
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

            <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="table-responsive">
                    <h4>User Reviews</h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                {{-- <th>Address</th> --}}
                                <th>Rating</th>
                                {{-- <th>Description</th> --}}
                                {{-- <th>Working with Customer</th> --}}
                                {{-- <th>Payment Time</th>
                                <th>Recommendation</th> --}}
                                <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>

                            @if(count($userReviews) == 0)
                            <tr>
                              <td colspan="12" align="center">No data available</td>
                            </tr>
                          @else
                            @foreach($userReviews as $review)
                                <tr>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>{{ $review->contact }}</td>
                                    {{-- <td>{{ $review->address }}</td> --}}
                                    <td>

                                        @if ($review->customer_rating)
                                        {{-- @dd($review->customer_rating) --}}
                                        <span class="fa fa-star{{ $review->customer_rating >= 1 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $review->customer_rating >= 2 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $review->customer_rating >= 3 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $review->customer_rating >= 4 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $review->customer_rating == 5 ? ' checked' : '' }}"></span>
                                        @else
                                            no rating found
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit-usergiven-reviews', $review->id) }}" class="btn btn-primary">Edit</a>
                                        <a id="delete" href="{{ route('delete-usergiven-reviews', $review->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                    {{-- <td>{{ $review->customer_description }}</td>
                                    <td>{{ $review->working_with_customer }}</td> --}}
                                    {{-- <td>{{ $review->customer_pay_time }}</td>
                                    <td>{{ $review->customer_recommendation }}</td> --}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

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


