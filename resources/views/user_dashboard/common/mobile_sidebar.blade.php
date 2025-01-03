 @php
    $favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
 @endphp
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">


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

 <div id="main-content1">
     <!-- <div id="titl1e"><a href="./../../index.html"><img src="../imgaes/N_C_logo.png" alt=""></a></div> -->
 </div>
 <div id="btn1" class="">
     <div id="top1"></div>
     <div id="middle1"></div>
     <div id="bottom1"></div>
 </div>
 <div id="box1" class="">
     <div id="items1">
         <div class="item1 {{ Request::routeIs('profile') ? 'activeMob' : '' }}">

             <a href="{{ route('profile') }}" class="header_links">

                 <div class="d-flex justify-content-center align-items-center">
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
         </div>
         <div class="item1 {{ Request::routeIs('purchased-package') ? 'activeMob' : '' }}">
             <a href="{{ route('purchased-package') }}" class="header_links">

                 <div class="d-flex justify-content-center align-items-center">
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
         </div>
         <div class="item1 {{ Request::routeIs('change-password') ? 'activeMob' : '' }}">
             <a href="{{ route('change-password') }}" class="header_links">
                 <div class="d-flex justify-content-center align-items-center">
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
         </div>
         <div class="item1">
             <a href="{{ route('user-logout') }}" class="header_links">

                 <div class="d-flex justify-content-center align-items-center">
                     <div class="imgSvg">
                         <img src="{{ asset('front_assets/images/SVG/logout.svg') }}" alt="">
                     </div>
                     <div class="imgSvgText"><span>Logout</span></div>
                 </div>
             </a>
         </div>
     </div>
 </div>
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

 {{-- @if($errors->any())

 @foreach($errors->all() as $error)
 <script>
     toastr.error('{{$error}}');

 </script>
 @endforeach
 @endif --}}

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


