<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FrontendModels\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
        $subscriptions = Subscription::get();
        return view('admin_dashboard.subscriptions.index',compact('subscriptions'));
    }
    public function delete(Request $request,$id){
        $id = $request->id;
        Subscription::where('id', $id)->delete();
        return response()->json(['status'=>'200']);

    }
}
