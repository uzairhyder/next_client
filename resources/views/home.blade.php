@extends('admin_dashboard.layouts.master')

@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="text-align: center">Welcome To Admin Dashboard</h1>
        </div>
    </div>
</div>
<br><br>


<div class="container-fluid">
    <div class="row">

         <div class="col-sm-6 col-xl-3 col-lg-6">
             <a href="{{route('user-index')}}">
                <div class="card o-hidden">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                            <div class="media-body"><span class="m-0">Users</span>
                                @if($user_count > 0)
                                <h4 class="mb-0 counter">{{ $user_count ?? '' }}</h4><i class="icon-bg" data-feather="user-plus"></i>
                                @else
                                <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="user-plus"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
             </a>
         </div>

            <div class="col-sm-6 col-xl-3 col-lg-6">
                <a href="{{route('customer-reviews')}}">
                <div class="card o-hidden">
                    <div class="bg-secondary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                <div class="media-body"><span class="m-0">Reviews</span>
                                    @if($review_count > 0)
                                        <h4 class="mb-0 counter">{{ $review_count ?? '' }}</h4><i class="icon-bg" data-feather="database"></i>
                                    @else
                                        <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="database"></i>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
              </a>
            </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
          <a href="{{route('customers')}}">
            <div class="card o-hidden">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                        <div class="media-body"><span class="m-0">Subscribers</span>
                            @if($subscribers_count > 0)
                                <h4 class="mb-0 counter">{{ $subscribers_count ?? '' }}</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                            @else
                                <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
          <a href="{{route('contact-index')}}">
            <div class="card o-hidden">
                <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                        <div class="media-body"><span class="m-0">Messages</span>
                            @if($inquiry_count > 0)
                                <h4 class="mb-0 counter">{{ $inquiry_count ?? '' }}</h4><i class="icon-bg" data-feather="message-circle"></i>
                            @else
                                <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="message-circle"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
    </div>
</div>

<div class="row">
    {{-- <div class="col-xl-2 col-lg-12 xl-50 calendar-sec box-col-6">
    </div> --}}
    <div class="col-xl-6 col-lg-12 xl-50 calendar-sec box-col-6">
        <div class="card gradient-primary o-hidden">
            <div class="card-body">
                <div class="setting-dot">
                    <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                </div>
                <div class="default-datepicker">
                    <div class="datepicker-here" data-language="en"></div>
                </div>
                <span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small"> </span></span></span>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-2 col-lg-12 xl-50 calendar-sec box-col-6">
    </div> --}}
</div>



<script type="text/javascript">
	var session_layout = '{{ session()->get('layout') }}';
</script>

@endsection

@section('script')
<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>

<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>


@endsection

