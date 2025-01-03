<?php
    $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
?>

<style>
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
                            <form method="GET" action="<?php echo e(route('search-customers')); ?>" class="example wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
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

<?php /**PATH C:\xampp\htdocs\next_client\resources\views/frontend/common/navbar.blade.php ENDPATH**/ ?>