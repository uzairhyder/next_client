<?php
    $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
?>

<style>
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(180, 180, 180, 0.75);
        z-index: 9999;
        display: none;
    }

    .loader::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 50px;
        margin-top: -25px;
        margin-left: -25px;
        border: 3px solid transparent;
        border-top: 3px solid #156aa1;
        border-radius: 50%;
        animation: spin 1.5s linear infinite;
    }

    @keyframes  spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    .point p::after {
        /* top: 0px; */
        content: "\2713";
        position: absolute;
        left: 0;
        transform: rotate(18deg);
        font-weight: 900;

    }

    .point {
        margin-left: 0rem ;

    }

    .point p {
        margin-left: 30px;
    }


    .point li::after {
    /* top: 0px; */
        content: "\2713";
        position: absolute;
        left: 0;
        transform: rotate(18deg);
        font-weight: 900;
        margin-left: 1.5rem;
    }

    .point {
        margin-left: 0rem;
    }

    .point ul {
        margin-left: 30px;
    }

    .for-fonts {
       font-family: 'Gilroy-Light';
       color: #333333;
       font-size: 1.2rem;
       margin-left: 2.5rem
    }

    .for-margin {
        margin-left: 3.5rem;
    }

    button.iconSearch {
    padding: 10px;
    background-color: #ffffff;
    color: #0b7dda;
    font-size: 17px;
    border-left: none;
    cursor: pointer;
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    box-shadow: rgb(0 0 0 / 16%) 8px 19px 33px;
    border: none;
}
input.iconSearchField {
    padding: 10px;
    font-size: 14px;
    border: 1px solid grey;
    width: 70%;
    background: #f1f1f1;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    border: none;
    box-shadow: rgb(0 0 0 / 13%) 8px 19px 33px;
    outline: none;
}
</style>
<div id="searchloadernavbar" class="loader"></div>

  <header class="header" id="navbar-fixed-top">
      <div class="container">
          <nav class="destop-nav-bar">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="logo">
                      <a href="<?php echo e(route('home')); ?>"> <img src="<?php echo e(url('public/logos/'.$logo->image)); ?>" alt="img"></a>
                  </div>
                  <div class="link">
                      <div class="d-flex justify-content-end">
                          <a href="<?php echo e(route('home')); ?>" class="header_links <?php echo e(Request::routeIs('home') ? 'active' : ''); ?>">Home</a>

                          <a href="<?php echo e(route('customer-search')); ?>" class="header_links <?php echo e(Request::routeIs('customer-search') ? 'active' : ''); ?>">Search Our Database</a>
                          <?php if(Auth::id()): ?>
                            <a href="<?php echo e(route('review')); ?>" class="header_links <?php echo e(Request::routeIs('review') ? 'active' : ''); ?>">Review</a>
                          <?php endif; ?>
                           <?php if(!Auth::check()): ?>
                            <a href="<?php echo e(route('login')); ?>" class="header_links <?php echo e(Request::routeIs('login') ? 'active' : ''); ?>">Member Login</a>
                            <a href="<?php echo e(route('signup')); ?>" class="header_links <?php echo e(Request::routeIs('signup') ? 'active' : ''); ?>">Become a Member</a>
                           <?php endif; ?>
                            <?php if(Auth::check() && Auth::user()->role  == 1): ?>
                            <a href="<?php echo e(route('login')); ?>" class="header_links <?php echo e(Request::routeIs('login') ? 'active' : ''); ?>">Member Login</a>
                            <a href="<?php echo e(route('signup')); ?>" class="header_links <?php echo e(Request::routeIs('signup') ? 'active' : ''); ?>">Become a Member</a>
                            <?php endif; ?>
                          <a href="<?php echo e(route('faq')); ?>" class="header_links <?php echo e(Request::routeIs('faq') ? 'active' : ''); ?>">FAQ’s</a>
                          <a href="<?php echo e(route('contact')); ?>" class="header_links <?php echo e(Request::routeIs('contact') ? 'active' : ''); ?>" class="header_links <?php echo e(Request::routeIs('contact') ? 'active' : ''); ?>">Contact Us</a>
                            <?php if(Auth::check() && Auth::user()->role == 2): ?>
                               <a href="<?php echo e(route('user-logout')); ?>" class="header_links" class="header_links">Logout</a>
                              <a href="<?php echo e(route('profile')); ?>"><img src="<?php echo e(asset('front_assets/images/1x/person.png')); ?>" alt=""></a>
                            <?php endif; ?>
                            <form method="post" action="<?php echo e(route('search-customers')); ?>" class="example wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s" id="navbarsearchdataform">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="iconSearch"><i class="fa fa-search"></i></button>
                                <input type="search" placeholder="Search Here" name="search" class="iconSearchField">
                            </form>
                      </div>
                  </div>
              </div>
          </nav>
      </div>
      <!-- moblie navbar -->
      <div id="main-content">
          <div id="title"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(url('public/logos/'.$logo->image)); ?>" alt=""></a></div>

      </div>
      <div id="btn" class="">
          <div id="top"></div>
          <div id="middle"></div>
          <div id="bottom"></div>
      </div>
      <div id="box" class="">
          <div id="items">
              <div class="imglogo"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(url('public/logos/'.$logo->image)); ?>" alt="asasa"></a></div>
              <div class="item"><a href="<?php echo e(route('home')); ?>" class="header_links <?php echo e(Request::routeIs('home') ? 'active' : ''); ?>">Home</a></div>
              <div class="item"><a href="<?php echo e(route('customer-search')); ?>" class="header_links <?php echo e(Request::routeIs('customer-search') ? 'active' : ''); ?>">Search Our
                      Database</a></div>
                <?php if(Auth::id()): ?>
                    <div class="item"><a href="<?php echo e(route('review')); ?>" class="header_links <?php echo e(Request::routeIs('review') ? 'active' : ''); ?>">Review</a>
                    </div>
                <?php endif; ?>
                 <?php if(!Auth::check()): ?>
                 <div class="item">
                    <a href="<?php echo e(route('login')); ?>" class="header_links <?php echo e(Request::routeIs('login') ? 'active' : ''); ?>">Member Login</a> <br><br>
                    <a href="<?php echo e(route('signup')); ?>" class="header_links <?php echo e(Request::routeIs('signup') ? 'active' : ''); ?>">Become a Member</a>
                 </div>
                 <?php endif; ?>
                 <?php if(Auth::check() && Auth::user()->role == 1): ?>
                 <div class="item">
                    <a href="<?php echo e(route('login')); ?>" class="header_links <?php echo e(Request::routeIs('login') ? 'active' : ''); ?>">Member Login</a> <br><br>
                    <a href="<?php echo e(route('signup')); ?>" class="header_links <?php echo e(Request::routeIs('signup') ? 'active' : ''); ?>">Become a Member</a>
                 </div>
                 <?php endif; ?>


                 
              <div class="item"><a href="<?php echo e(route('faq')); ?>" class="header_links <?php echo e(Request::routeIs('faq') ? 'active' : ''); ?>">FAQ’s</a></div>
              <div class="item"><a href="<?php echo e(route('contact')); ?>" class="header_links <?php echo e(Request::routeIs('contact') ? 'active' : ''); ?>">Contant Us</a></div>
                <?php if(Auth::check() && Auth::user()->role == 2): ?>
                 <div class="item"><a href="<?php echo e(route('user-logout')); ?>" class="header_links">Logout</a></div>
                <div class="item"> <a href="<?php echo e(route('profile')); ?>"><img src="<?php echo e(asset('front_assets/images/1x/person.png')); ?>" alt=""></a>
                </div>
                <?php endif; ?>
          </div>
      </div>
  </header>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
        $('#navbarsearchdataform').on('submit', function(event) {
            $('#searchloadernavbar').show();

            // Disable submit button
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Hide loader
                    $('#searchloadernavbar').hide();

                    // Enable submit button
                    $('button[type="submit"]').prop('disabled', false);

                    // Handle the response, e.g., update a result div
                    // $('#result').html(response);
                    // Optionally, display a success message to the user
                    if (response.status == 305) {
                        swal({
                            title: "Authentication !",
                            text: response.message,
                            type: "error",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "<?php echo e(route('login')); ?>";
                        });

                    }


                },
                error: function(xhr, status, error) {
                    // Hide loader
                    $('#searchloadernavbar').hide();

                    // Enable submit button
                    $('button[type="submit"]').prop('disabled', false);

                    // Display an error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Search Error',
                        text: 'An error occurred during the search. Please try again.',
                    });
                }
            });
        });
    });
</script>
<?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/frontend/common/navbar.blade.php ENDPATH**/ ?>