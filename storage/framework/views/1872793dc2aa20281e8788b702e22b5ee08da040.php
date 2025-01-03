<?php
    $favicon = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
?>
<style>
    .fa-lg {
        width: 20px;
        height: 20px;
        font-size: 16px;
        margin-right: 6px;
    }
</style>
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="<?php echo e(route('admin-home')); ?>"><img class="img-fluid for-light"
                    src="<?php echo e(url('public/logos/' . $favicon->image)); ?>" alt="" width="100px" height="100px"
                    style="background: lightgray"><img class="img-fluid for-dark"
                    src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?php echo e(route('admin-home')); ?>"><img class="img-fluid"
                    src="<?php echo e(url('public/logos/' . $favicon->image)); ?>" alt="" width="100px" height="100px"
                    style="object-fit: contain"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="<?php echo e(route('admin-home')); ?>">

                            
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title"
                            href="<?php echo e(route('home')); ?>" target="_blank"><span
                                class="lan-3
                            "><i class="fa fa-globe fa-lg"
                                    aria-hidden="true"></i> Go To Website</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == 'admin-home'? 'active': ''); ?>

                            <?php echo e(Route::currentRouteName() == 'admin-home' ? 'active' : ''); ?>"
                            href="<?php echo e(route('admin-home')); ?>"><span class="lan-3
                            "><i
                                    class="fa fa-home fa-lg" aria-hidden="true"></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title  <?php echo e(Route::currentRouteName() == 'logo.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'logo.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'page-content.index' ? 'active' : ''); ?>  <?php echo e(Route::currentRouteName() == 'page-content.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'banner.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'banner.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'privacy-policy.index' ? 'active' : ''); ?>  <?php echo e(Route::currentRouteName() == 'privacy-policy.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'terms-conditions.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'terms-conditions.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'page.index' ? 'active' : ''); ?>  <?php echo e(Route::currentRouteName() == 'page.edit' ? 'active' : ''); ?>"
                            href="#">
                            <span class="lan-3 "><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i> Layout
                                Management</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == 'admin/cms'? 'down': 'right'); ?>

                                    "></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:<?php echo e(request()->route()->getPrefix() == 'admin/cms'? 'block;': 'none;'); ?>

                            ">
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'logo.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'logo.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('logo.index')); ?>">Add Logo</a>
                            </li>
                            

                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'page-content.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'page-content.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('page-content.index')); ?>">Page Content</a>


                            </li>
                            
                            

                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'terms-conditions.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'terms-conditions.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('terms-conditions.index')); ?>">Term & Condition </a>
                            </li>

                            
                        </ul>
                    </li>

                    

                    





                    
                    

                    
                    
                    
                    

                    

                    

                    

                    
                    
                    

                    
                    
                    

                    


                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'faqs.index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'faqs.create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'faqs.edit' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'faqs.show' ? 'active' : ''); ?>"
                            href="<?php echo e(route('faqs.index')); ?>">
                            <span class="lan-3"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i> Faq
                                Management </span>

                        </a>
                    </li>
                    

                    
                    
                    

                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'industry-index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'industry-create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'industry-edit' ? 'active' : ''); ?>"
                            href="<?php echo e(route('industry-index')); ?>"><span class="lan-3"><i
                                    class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Industry Management </span>
                        </a>
                    </li>
                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'package.index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'package.create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'package.edit' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'package.show' ? 'active' : ''); ?>"
                            href="<?php echo e(route('package.index')); ?>"><span class="lan-3"><i
                                    class="fa fa-picture-o fa-lg"aria-hidden="false"></i> Package Management </span>
                        </a>
                    </li>
                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'customers' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'subscriber-view' ? 'active' : ''); ?>"
                            href="<?php echo e(route('customers')); ?>"><span class="lan-3"><i
                                    class="fa fa-users fa-lg"aria-hidden="false"></i> Subscriber
                                Management </span>
                        </a>
                    </li>
                    

                    
                    
                    

                    
                    
                    

                    

                    

                    


                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'user-index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'user-create' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'user-edit' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'user-view' ? 'active' : ''); ?>"
                             href="<?php echo e(route('user-index')); ?>"> <span class="lan-3"><i
                                    class="fa fa-users fa-lg" aria-hidden="false"></i> User Management </span>
                        </a>
                    </li>
                    

                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'customer-reviews' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'reviews-detail' ? 'active' : ''); ?>"
                            href="<?php echo e(route('customer-reviews')); ?>"> <span class="lan-3"><i
                                    class="fa fa-comments fa-lg" aria-hidden="true"></i> Review Management </span>
                        </a>
                    </li>
                    

<li class="sidebar-list">
    <label class="badge badge-success"></label><a
        class="sidebar-link sidebar-title
    <?php echo e(Route::currentRouteName() == 'question.list' ? 'active' : ''); ?>

    <?php echo e(Route::currentRouteName() == 'question.edit' ? 'active' : ''); ?>"
        href="<?php echo e(route('question.list')); ?>"> <span class="lan-3"><i
                class="fa fa-comments fa-lg" aria-hidden="true"></i> Reviews Question</span>
    </a>
</li>

                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title
                        <?php echo e(Route::currentRouteName() == 'contact-index' ? 'active' : ''); ?>

                        <?php echo e(Route::currentRouteName() == 'view-inquiry' ? 'active' : ''); ?>"
                            href="<?php echo e(route('contact-index')); ?>">
                            <span class="lan-3"><i class="fa fa-phone fa-lg" aria-hidden="true"></i> Query
                                Management </span>
                        </a>
                    </li>
                    

                    
                    
                    
                    
                    
                    

                    
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title <?php echo e(Route::currentRouteName() == 'configuration.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'configuration.edit' ? 'active' : ''); ?>

                            <?php echo e(Route::currentRouteName() == 'social.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'social.edit' ? 'active' : ''); ?>"
                            href="#">
                            <span class="lan-3"><i class="fa fa-file-text-o fa-lg" aria-hidden="false"></i>
                                Configurations</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == 'admin/configuration'? 'down': 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:<?php echo e(request()->route()->getPrefix() == 'admin/configuration'? 'block;': 'none;'); ?>">
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'configuration.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'configuration.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('configuration.index')); ?>">Configurations</a>
                            </li>
                            <li>
                                <a class="lan-4 <?php echo e(Route::currentRouteName() == 'social.index' ? 'active' : ''); ?> <?php echo e(Route::currentRouteName() == 'social.edit' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('social.index')); ?>">Social Links</a>
                            </li>
                        </ul>
                    </li>

                    

                    

                    
                    
                    
                    
                    

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/admin_dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>