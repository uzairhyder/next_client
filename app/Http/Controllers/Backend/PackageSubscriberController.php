<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BackendModels\PackageSubscription;
use App\Models\BackendModels\Package;
use Illuminate\Http\Request;
use DB;

class PackageSubscriberController extends Controller
{
    public function index(Request $request)
    {
     // $subscribers = PackageSubscription::where('cancel_status', 0)->with('get_user.industry')
        // ->orderBy('id', 'asc')->latest('id')->get()->unique('user_id');
        // $subscribers = PackageSubscription::with('get_user')->get();
          $subscribers = PackageSubscription::select('package_subscriptions.*')
        ->where('cancel_status', 0)
        ->with('get_user.industry')
        ->whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('package_subscriptions')
                ->groupBy('user_id');
        })
        ->get();
        // $subscribers = PackageSubscription::with('get_user.industry')->orderBy('id', 'asc')->latest('id')->get()->unique('user_id');
        return view('admin_dashboard.packagesubscribers.index', get_defined_vars());
    }

    public function showsubscriber(Request $request, $id)
    {
         $detail = PackageSubscription::where('id', $id)->first();

        $member_packages  = Package::where('status', 1)->get();
        if (!empty($detail)) {
            return view('admin_dashboard.packagesubscribers.detail', get_defined_vars());
        } else {
            return view('frontend.404');
        }
    }
}
