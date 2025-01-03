<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ConfigurationController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\IndustryController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\PackageSubscriberController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PrivacyPolicyController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\TermsConditionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\QuestionController;
use App\Models\BackendModels\PackageSubscription;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Question\Question;

// Auth::routes();
Route::get('admin', function () {
    return view('auth.login');
})->name('/');

Route::post('/login', [AdminController::class, 'login'])->name('login');

// ADMIN PANEL ROUTES---------------------------------------
Route::group(['middleware' => ['preventBackHistory', 'adminmiddleware'], 'prefix' => 'admin'], function () {
    // DASHBOARD
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-home');
    Route::post('logout', [AdminController::class, 'adminlogout'])->name('logout');
    // api resources
    // Route::apiResources(['logo' => 'App\Http\Controllers\Backend\LogoController']);
    Route::apiResources(['homecontent' => 'App\Http\Controllers\Backend\HomeController']);
    Route::apiResources(['gallery' => 'App\Http\Controllers\Backend\GalleryController']);


    Route::get('question-list', [QuestionController::class, 'index'])->name('question.list');
    Route::get('question-create', [QuestionController::class, 'create'])->name('question.create');
    Route::post('question-store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('question-edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('question-update', [QuestionController::class, 'update'])->name('question.update');
    Route::get('question-action/{id}', [QuestionController::class, 'action'])->name('question.status');

    // faqs route
    Route::resource('faqs', FaqController::class);
    Route::get('faqs-delete', [FaqController::class, 'deletefaq'])->name('faqs-delete');
    Route::get('faqs-status/{id}', [FaqController::class, 'status'])->name('faqs-status');
    // Inquiry route
    Route::get('contact-index', [InquiryController::class, 'index'])->name('contact-index');
    Route::get('delete-contact', [InquiryController::class, 'deletecontact'])->name('delete-contact');
    Route::get('view-inquiry/{id}', [InquiryController::class, 'showcontact'])->name('view-inquiry');
    // Package Management Routes
    Route::resource('package', PackageController::class);
    Route::get('package-status/{id}', [PackageController::class, 'status'])->name('package-status');
    // Package Subscriber users
    Route::get('customers', [PackageSubscriberController::class, 'index'])->name('customers');
    Route::get('subscriber-view/{id}', [PackageSubscriberController::class, 'showsubscriber'])->name('subscriber-view');

    // Configurations
    Route::group(['prefix' => 'configuration'], function () {
        Route::resource('configuration', ConfigurationController::class);
        Route::resource('social', SocialController::class);
    });



    Route::get('customer-reviews', [ReviewController::class, 'review'])->name('customer-reviews');
    Route::get('add-customer-reviews', [ReviewController::class, 'addCustomerReviews'])->name('add-customer-reviews');
    Route::post('store-customer-review', [ReviewController::class, 'store_customerreview'])->name('store-customer-review');
    Route::get('edit-customer-review/{id}', [ReviewController::class, 'edit_customerreview'])->name('edit-customer-review');
    Route::post('update-customer-review/{id}', [ReviewController::class, 'update_customerreview'])->name('update-customer-review');
    Route::get('reviews-detail/{id}', [ReviewController::class, 'reviewdetail'])->name('reviews-detail');
    Route::get('reviews-search-detail/{id}', [ReviewController::class, 'reviewSearchdetail'])->name('reviews-search-detail');
    Route::get('delete-review', [ReviewController::class, 'deletereview'])->name('delete-review');
    Route::get('review-status/{id}', [ReviewController::class, 'reviewstatus'])->name('review-status');
    Route::post('search-live-customers', [ReviewController::class, 'searchlivecustomer'])->name('search-live-customers');


    // Service
    Route::resource('service', ServiceController::class);
    // Page Content routes
    Route::group(['prefix' => 'cms'], function () {
        Route::resource('logo', LogoController::class);
        // Route::resource('page-content',PageContentController::class);
        Route::resource('terms-conditions', TermsConditionController::class);
        Route::resource('privacy-policy', PrivacyPolicyController::class);
        Route::resource('page-content', BannerController::class);
        Route::resource('page', PageController::class);
        Route::resource('offers', OfferController::class);
    });




    // Pages route
    Route::get('page-status/{id}', [PageController::class, 'status'])->name('page-status');

    // User Management
    Route::get('user-index', [UserController::class, 'index'])->name('user-index');
    Route::get('user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::get('user-delete', [UserController::class, 'delete'])->name('user-delete');
    Route::get('user-status/{id}', [UserController::class, 'status'])->name('user-status');
    Route::get('user-trust-type/{id}', [UserController::class, 'trust_type'])->name('user-trust-type');
    Route::get('user-profile-update/{id}', [UserController::class, 'user_profile_update'])->name('user-profile-update');
    Route::get('user-view/{id}', [UserController::class, 'show'])->name('user-view');
    Route::get('user-profile-details-to-update/{id}', [UserController::class, 'profileDetailstoUpdate'])->name('user.profile.details.to.update');
    Route::get('admin-cancel-purchase-package/{subscriptionID}', [UserController::class, 'admincancelSubscription'])->name('admincancel-purchase-package');
    Route::get('adminstore-old-purchase-package-id', [UserController::class, 'storeoldpaypalamountid'])->name('adminstore-old-purchase-package-id');
    Route::get('adminupdate-purchase-package', [UserController::class, 'updatepurchasepackage'])->name('adminupdate-purchase-package');

    Route::post('subcription_updatepaypal_payment', [UserController::class, 'update_points'])->name('adminsubcription_updatepaypal_payment');
    Route::get('adminpaypal-amount-update', [UserController::class, 'updatepaypalamount'])->name('adminpaypal-amount-update');
    // Route::get('adminupdate-purchase-package/{id}', [UserController::class, 'updatepurchasepackage'])->name('adminupdate-purchase-package');
    // Route::get('adminpaypal-amount-update', [UserController::class, 'updatepaypalamount'])->name('adminpaypal-amount-update');
    // Route::get('subcription_updatepaypal_payment', [UserDashboardController::class, 'adminsubcriptionupdatepaypal_payment'])->name('adminsubcription_updatepaypal_payment');


    // Industry Management
    Route::get('industries', [IndustryController::class, 'index'])->name('industry-index');
    Route::get('industry-create', [IndustryController::class, 'industry_create'])->name('industry-create');
    Route::post('industry-create', [IndustryController::class, 'industry_add'])->name('industry-create-post');
    Route::get('industry-edit/{id}', [IndustryController::class, 'industry_edit'])->name('industry-edit');
    Route::post('industry-update/{id}', [IndustryController::class, 'industry_update'])->name('industry-update');
    Route::get('industry-status/{id}', [IndustryController::class, 'status'])->name('industry-status');
    //  Route::get('industry-delete', [IndustryController::class, 'delete'])->name('industry-delete');
    // simple route
    Route::get('/create_content', [App\Http\Controllers\Backend\HomeController::class, 'create_view'])->name('create_content');
});

// Frontend Routes

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('customer-search', [FrontendController::class, 'customersearch'])->name('customer-search');
Route::get('review', [FrontendController::class, 'review'])->name('review');
Route::get('signup', [FrontendController::class, 'signup'])->name('signup');
Route::post('register', [FrontendController::class, 'registeruser'])->name('register');
Route::get('login', [FrontendController::class, 'login'])->name('login');
Route::post('user-login', [FrontendController::class, 'userlogin'])->name('user-login');
Route::get('forget-password', [FrontendController::class, 'forgtepassword'])->name('forget-password');
Route::post('forget', [FrontendController::class, 'forget'])->name('forget');
Route::get('updatepassword/{token}', [FrontendController::class, 'changepassword'])->name('updatepassword');
Route::post('update-newpassword', [FrontendController::class, 'updatenewpassword'])->name('update-newpassword');
Route::get('faq', [FrontendController::class, 'faqs'])->name('faq');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('inquiry', [FrontendController::class, 'inquiry'])->name('inquiry');
Route::get('packages', [FrontendController::class, 'packages'])->name('packages');
Route::get('explore-packages', [FrontendController::class, 'explore_packages'])->name('explore-packages');
Route::get('how-it-works', [FrontendController::class, 'howitworks'])->name('how-it-works');
Route::get('terms-and-conditions', [FrontendController::class, 'termsandconditions'])->name('terms.and.conditions');
Route::get('payment', [FrontendController::class, 'payment'])->name('payment');
Route::get('search-results', [FrontendController::class, 'searchresult'])->name('search-results');
Route::get('verify-email-register', [FrontendController::class, 'verifyemail'])->name('verify-email-register');
Route::post('search-customers', [UserDashboardController::class, 'searchcustomer'])->name('search-customers');
Route::get('search', [FrontendController::class, 'search'])->name('search');
Route::get('customer-detail', [UserDashboardController::class, 'customers'])->name('customer-detail');

Route::post('customer-review', [UserDashboardController::class, 'customerreview'])->name('customer-review');
// Route::get('home-search',[FrontendController::class,'homesearch'])->name('home-search');
Route::get('free-package', [UserDashboardController::class, 'free_package'])->name('free-package');
Route::get('signup-paypal-userpayment', [UserDashboardController::class, 'signuppaypalamount'])->name('signuppaypal-amount-update');
Route::get('signupsubcription-paypal-payment', [UserDashboardController::class, 'signupsubscription_payment'])->name('signupsubscription-payment');
Route::get('usersignup-package', [UserDashboardController::class, 'updatepurchasepackage'])->name('usersignup-package');



// User Dashboard Routes

Route::middleware(['preventBackHistory', 'usermiddleware'])->group(function () {

    Route::get('profile', [UserDashboardController::class, 'index'])->name('profile');
    Route::post('update-profile', [UserDashboardController::class, 'updateprofile'])->name('update-profile');
    Route::get('purchased-package', [UserDashboardController::class, 'purchasepackages'])->name('purchased-package');
    Route::get('user-given-reviews', [UserDashboardController::class, 'user_given_reviews'])->name('user-given-reviews');
    Route::get('edit-usergiven-reviews/{id}', [UserDashboardController::class, 'edit_user_given_reviews'])->name('edit-usergiven-reviews');
    Route::post('update-usergiven-reviews/{id}', [UserDashboardController::class, 'update_user_given_reviews'])->name('update-usergiven-reviews');
    Route::get('delete-usergiven-reviews/{id}', [UserDashboardController::class, 'delete_user_given_reviews'])->name('delete-usergiven-reviews');
    Route::get('change-password', [UserDashboardController::class, 'changepassword'])->name('change-password');
    Route::post('update-password', [UserDashboardController::class, 'updateuserpassword'])->name('update-password');
    Route::get('user-logout', [UserDashboardController::class, 'userlogout'])->name('user-logout');
    Route::get('purchase-package', [UserDashboardController::class, 'purchasepackage'])->name('purchase-package');
    Route::get('update-purchase-package', [UserDashboardController::class, 'updatepurchasepackage'])->name('update-purchase-package');
    Route::get('store-old-purchase-package-id', [UserDashboardController::class, 'storeoldpaypalamountid'])->name('store-old-purchase-package-id');
    Route::get('paypal-amount-update', [UserDashboardController::class, 'updatepaypalamount'])->name('paypal-amount-update');
    Route::get('subcription_updatepaypal_payment', [UserDashboardController::class, 'subcriptionupdatepaypal_payment'])->name('subcription_updatepaypal_payment');
    Route::get('/pay-amount', [UserDashboardController::class, 'pay_amount'])->name('pay_amount');
    Route::get('store-package-payment', [UserDashboardController::class, 'store_package_payment'])->name('store_package_payment');
    Route::get('cancel-purchase-package/{subscriptionID}', [UserDashboardController::class, 'cancelSubscription'])->name('cancel-purchase-package');
});

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return view('frontend.cache');
})->name('clear.cache');

Route::get('/delete-database', function () {
    Artisan::call('migrate:fresh');
    $notification = array('message' => 'Database deleted successfully', 'alert-type' => 'success');
    return redirect()->route('home')->with($notification);
});

Route::any('{url}', function () {
    return view('frontend.404');
})->where('url', '.*');
