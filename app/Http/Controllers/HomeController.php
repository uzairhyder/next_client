<?php

namespace App\Http\Controllers;

use App\Models\BackendModels\Inquiry;
use App\Models\BackendModels\Configuration;

use Illuminate\Http\Request;
use App\Models\BackendModels\Logo;
use App\Models\BackendModels\PackageSubscription;
use App\Models\BackendModels\Product;
use App\Models\BackendModels\Review;
use App\Models\FrontendModels\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

// $GLOBALS = array(
//     "navLogo" => Logo::where("type", "navLogo")->first()->image,
//     "favicon" => Logo::where("type", "favicon")->first()->image,
//     "footerLogo" => Logo::where("type", "footerLogo")->first()->image
// );
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $logoManager;

    public function __construct()
    {
        $this->middleware('auth');
        global $GLOBALS;
        // $this->logoManager = & $GLOBALS;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inquiry_count = Inquiry::count();
        $user_count = User::where('role','!=',1)->count();
        $review_count  = Review::count();
        $subscribers = PackageSubscription::select('package_subscriptions.*')
        ->where('cancel_status', 0)
        ->with('get_user.industry')
        ->whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('package_subscriptions')
                ->groupBy('user_id');
        })
        ->get();
         $subscribers_count  = count($subscribers);
        return view('home',get_defined_vars());
    }




}
