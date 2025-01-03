@include('frontend.common.head')
<body>
      <div id="preloader">
          <div id="loader"></div>
      </div>

    @include('frontend.common.navbar')


    @yield('content')


  @include('frontend.common.footer')





<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','success') }}"
      switch(type){
         case 'info':
         toastr.info(" {{ Session::get('message') }} ");
         break;
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
    <script src="{{ asset('front_assets/js/main.js') }}"></script>


    {{-- hadi ali work --}}

     <script>
         /***************     ------- hover video play start -----   ***************/

         var figure = $(".video-box").hover(hoverVideo, hideVideo);

         function hoverVideo(e) {
             $('video', this).get(0).play();
         }

         function hideVideo(e) {
             $('video', this).get(0).pause();
         }

         /***************     ------- hover video play start  -----   ***************/
         $('body').on('hidden.bs.modal', '.modal', function() {
             $('.for-pause-video').trigger('pause');
         });



    </script>
    @stack('scripts')
</body>
