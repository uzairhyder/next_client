@php
    $favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
    //   dd($favicon)
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="{{url('public/logos/'.$favicon->image)}}">
     <link rel="icon" type="image/x-icon" href="{{url('public/logos/'.$favicon->image)}}">

     <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <!-- bootstrap 5 -->

    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">

    <!-- Butter js -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/butter.css') }}">

    <!-- wow css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



    <link rel="stylesheet" href="{{ asset('front_assets/css/wow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <title>NC || Dashboard</title>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
                 <!-- Heading -->
                 <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item">
                     <a href="{{ route('profile') }}" class="nav-link collapsed {{ Request::routeIs('profile') ? 'active12' : '' }}" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                @if (Route::currentRouteName() == 'profile')
                                    <img src="{{ asset('front_assets/images/SVG/purple.svg') }}" alt="">
                                @else
                                   <img src="{{ asset('front_assets/images/SVG/profile.svg') }}" alt="">
                                @endif
                             </div>
                             <div class="imgSvgText"><span>Profile</span></div>
                         </div>
                     </a>
                 </li>


                 <!-- Nav Item - Utilities Collapse Menu -->
                 <li class="nav-item">
                     <a href=" {{ route('purchased-package') }}" class="nav-link collapsed {{ Request::routeIs('purchased-package') ? 'active12' : '' }}" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                 @if (Route::currentRouteName() == 'purchased-package')
                                    <img src="{{ asset('front_assets/images/SVG/purplepackage.svg') }}" alt="">
                                 @else
                                    <img src="{{ asset('front_assets/images/SVG/package1.svg') }}" alt="">
                                 @endif
                             </div>
                             <div class="imgSvgText"><span>Package</span></div>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item">
                    <a href=" {{ route('user-given-reviews') }}" class="nav-link collapsed {{ Request::routeIs('user-given-reviews') ? 'active12' : '' }}" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

                        <div class="d-flex align-items-center">
                            <div class="imgSvg">
                                @if (Route::currentRouteName() == 'user-given-reviews')
                                <img src="{{ asset('front_assets/images/SVG/purplepackage.svg') }}" alt="">
                                @else
                                <img src="{{ asset('front_assets/images/SVG/package1.svg') }}" alt="">
                                @endif
                            </div>
                            <div class="imgSvgText"><span>Reviews</span></div>
                        </div>
                    </a>
                </li>
                 <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item">
                     <a href="{{ route('change-password') }}" class="nav-link collapsed {{ Request::routeIs('change-password') ? 'active12' : '' }}" data-toggle=" collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">

                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                 @if (Route::currentRouteName() == 'change-password')
                                    <img src="{{ asset('front_assets/images/SVG/purplelock.svg') }}" alt="">
                                 @else
                                   <img src="{{ asset('front_assets/images/SVG/lock.svg') }}" alt="">
                                 @endif
                             </div>
                             <div class="imgSvgText"><span>Change Password</span></div>
                         </div>
                     </a>
                 </li>

                 <!-- Nav Item - Charts -->
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('user-logout') }}">
                         <div class="d-flex align-items-center">
                             <div class="imgSvg">
                                 <img src="{{ asset('front_assets/images/SVG/logout.svg') }}" alt="">
                             </div>
                             <div class="imgSvgText"><span>Logout</span></div>
                         </div>
                     </a>
                 </li>

                 <!-- Sidebar Toggler (Sidebar) -->
                 <div class="text-center d-none d-md-inline">
                     <button class="rounded-circle border-0" id="sidebarToggle"></button>
                 </div>
</ul>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        //    case 'info':
        //    toastr.info(" {{ Session::get('message') }} ");
        //    break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif

</script>

@if($errors->any())

@foreach($errors->all() as $error)
<script>
    toastr.error('{{$error}}');

</script>
@endforeach
@endif

<!-- jquery -->
{{-- <script src="./assets/js/jquery.min.js"></script> --}}
<script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
<!-- bootstrap jquery -->
{{-- <script src="./assets/js/bootstrap.bundle.min.js"></script> --}}

<script src="{{ asset('front_assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Butter js -->
{{-- <script src="./assets/js/butter.js"></script> --}}
<script src="{{ asset('front_assets/js/butter.js') }}"></script>


<!-- wow js -->
{{-- <script src="./assets/js/wow.js"></script> --}}

<script src="{{ asset('front_assets/js/wow.js') }}"></script>

<!-- custom js -->
{{-- <script src="./assets/js/main.js"></script> --}}

</body>

