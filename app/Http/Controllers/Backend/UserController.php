<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\ProfileUpdate;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\BackendModels\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\BackendModels\Package;
use App\Models\BackendModels\Industry;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\User as RequestsUser;
use App\Models\BackendModels\PackageSubscription;
use App\Http\Requests\EditUser as RequestsEditUserr;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
         $users = User::where('role', '!=', 1)->with('profileUpdates')->get();
        $subscribers = PackageSubscription::where('status', 0)->where('cancel_status', 0)->with('get_user')->get();
        // $get_ProfileUpdate = ProfileUpdate::with('get_userprofile')->get();
        return view('admin_dashboard.users.index', compact('users', 'subscribers'));
    }
    public function create()
    {
        $industries = Industry::where('status', 1)->get();
        return view('admin_dashboard.users.create', compact('industries'));
    }
    public function store(RequestsUser $request)
    {

        $user = $request->validated();
        $check_user = User::where('email', $request->email)->first();
        if (!empty($check_user)) {
            $notification = array('message' => 'User with this email already exist! ', 'alert-type' => 'error');
            return back()->with($notification);
        }
        $user = $request->validated();
        $user = $request->validated();
        if ($request->industry_id == 0) {
            $business_name = $request->industry_name;
            $industry_id = null;
        } else {
            $business_name = null;
            $industry_id = $request->industry_id;
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name . " " . $request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->slug = Str::slug($request->first_name . " " . $request->last_name, "-");
        $user->password = Hash::make($request->password);
        $user->business_name = $business_name;
        $user->business_information = $request->business_information;
        $user->business_license = $request->business_license;
        $user->industry_id = $industry_id;
        // $user->date_of_birth = $request->date_of_birth;
        $user->role = 2;
        $user->status = 1;
        if ($request->business_license_copy) {
            $filename = time() . '.' . $request->business_license_copy->extension();
            $request->business_license_copy->move(public_path('business_licenses'), $filename);
            $user->business_license_copy = $filename;
        }
        if ($request->profile_image) {
            $filename = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profiles'), $filename);
            $user->profile_image = $filename;
        }
        $user->save();

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            // 'date_of_birth' => $request->date_of_birth,
            'business_name' => $request->business_name,
            'business_license' => $request->business_license,
            'business_information' => $request->business_information,
            'password' => $request->password,
        ];

        $email_user = $request->email;

        Mail::send(
            'frontend.emails.signup_mail',
            ['data' => $data],
            function ($message) use ($email_user) {
                $message
                    ->to($email_user)->subject('New User');
            }
        );


        $notification = array('message' => 'User Created Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }

    public function show(Request $request, $id)
    {
        // dd($id);
        // $detail = User::where('id', $id)->first();
         $detail = User::where('id', $id)->with('profileUpdates','industry')->first();
        // dd($detail);
        if (!empty($detail)) {
            return view('admin_dashboard.users.detail', get_defined_vars());

        } else {
            return view('frontend.404');
        }
    }
    public function profileDetailstoUpdate(Request $request, $id)
    {
        // $detail = User::where('id', $id)->first();
         $detail = ProfileUpdate::where('user_id', $id)->where('profile_status', 0)->with('get_userprofile','industryProfile')->first();
        //   $industries = Industry::where('id', $detail->industry_id)->first();
        if (!empty($detail)) {
            return view('admin_dashboard.users.approve-user-detail', get_defined_vars());
        } else {
            return view('frontend.404');
        }
    }

    public function edit($id)
    {
        $users = User::find($id);
        $industries = Industry::where('status', 1)->get();
        if (!empty($users)) {
            $update_user_profile = ProfileUpdate::where('user_id', $id)->first();
            return view('admin_dashboard.users.edit', get_defined_vars());
        } else {
            return view('frontend.404');
        }
    }


    public function update(RequestsEditUserr $request, $id)
    {
        // dd($request->all());
        $user = $request->validated();
        // dd(gettype($request->industry_id));
        if (is_numeric($request->industry_id)) {
            if ($request->industry_id == 0) {
                $business_name = $request->industry_name;
                $industry_id = null;
            } else {
                $business_name = null;
                $industry_id = $request->industry_id;
            }
        } else {
            $business_name = $request->industry_id;
            $industry_id = null;
        }

        $user = User::find($id);
        $user->industry_id = $request->industry_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name . " " . $request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->slug = Str::slug($request->first_name . " " . $request->last_name, "-");
        if (empty($request->password)) {
            $user->password = $request->prev_password;
        } else {
            $user->password = Hash::make($request->password);
        }
        $user->business_name = $business_name;
        $user->industry_id = $industry_id;
        $user->business_information = $request->business_information;
        $user->business_license = $request->business_license;
        // $user->date_of_birth = $request->date_of_birth;
        $user->role = 2;
        $user->status = 1;
        if ($request->hasFile('business_license_copy')) {
            // dd('image  business_license_copy');
            $file = $request->file('business_license_copy');
            $originalName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $filenamebusiness_license_copy = $originalName . '.' . $fileExtension;
            $file->move(public_path('business_licenses'), $filenamebusiness_license_copy);
        }else{
            // dd('image not found of  business_license_copy');
            $filenamebusiness_license_copy = $request->old_business_license_copy_image;
        }

        if ($request->profile_image) {
            // dd('image found');
            $filenameprofile_image = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profiles'), $filenameprofile_image);
        }else{
            // dd('image not found');

            $filenameprofile_image = $request->old_image;
        }
        if ($request->has('user_status') && $request->user_status == 1) {
            $user->type = 1;
        } else {
            $user->type = 0;
        }
        $user->save();

        // Here to Update on ProfileUpdate Model


        ProfileUpdate::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'profile_status' => 0,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'slug' => Str::slug($request->first_name . ' ' . $request->last_name),
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'contact' => $request->contact,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'industry_id' => $industry_id,
                'business_name' => $business_name,
                'business_license' => $request->business_license,
                'business_information' => $request->business_information,
                'business_license_copy' => isset($filenamebusiness_license_copy) ? $filenamebusiness_license_copy : ($request->business_license_copy ?? null),
                'profile_image' => isset($filenameprofile_image) ? $filenameprofile_image : ($request->profile_image ?? null),
            ]
        );


        // End of ProfileUpdate Model Code
        if ($request->password) {
            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            $email_user = $request->email;
            Mail::send(
                'frontend.emails.credentials_mail',
                ['data' => $data],
                function ($message) use ($email_user) {
                    $message->to($email_user)->subject('New Credentials');
                }
            );
        }

        $notification = array('message' => 'User Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $user->delete();
        $user_packages = PackageSubscription::where('user_id', $user->id)->first();
        if (!empty($user_packages)) {
            $user_packages->delete();
        }
        return response()->json(['status' => '200']);
    }
    public function status(Request $request, $id)
    {
        $user_status = User::find($id);
        if ($user_status->status == 0) {
            $user_status->status = 1;
        } elseif ($user_status->status == 1) {
            $user_status->status = 2;
        } elseif ($user_status->status == 2) {
            $user_status->status = 1;
        }
        $user_status->save();
        $notification = array('message' => 'User Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }

    public function trust_type(Request $request, $id)
    {
        $user_type = User::find($id);
        if ($user_type->type == 0) {
            $user_type->type = 1;
        } else {
            $user_type->type = 0;
        }
        $user_type->save();
        $reviews = Review::where('user_id', $id)->get();
        foreach ($reviews as $review) {
            $review->status = 1;
            $review->save();
        }
        $notification = array('message' => 'User Trust status updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }

    public function user_profile_update(Request $request, $id)
    {
        // dd($id);
        $user_profile_status = User::find($id);
        if ($user_profile_status->profile_status == 0) {
            $user_profile_status->profile_status = 1;
        } else {
            $user_profile_status->profile_status = 0;
        }
        $user_profile_status->save();

        $user_ProfileUpdates = ProfileUpdate::where('user_id', $id)->first();
        if ($user_ProfileUpdates->profile_status == 0) {
            $user_ProfileUpdates->profile_status = 1;
        } else {
            $user_ProfileUpdates->profile_status = 0;
        }
        $user_ProfileUpdates->save();
        $notification = array('message' => 'User Profile Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }

    public function admincancelSubscription(Request $request, $subscriptionID)
    {
        // dd($subscriptionID);
        // $packageSubs = PackageSubscription::where('subscriptionID', $subscriptionID)->orderBy('id', 'desc')->first();
        // $transactionid = $subscriptionID;
        // $amount = $packageSubs->package_amount;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $provider->cancelSubscription($subscriptionID, 'Not satisfied with the service');

        $object = PackageSubscription::where('subscriptionID', $subscriptionID)->latest('id')->first();
        $object->status = 0;
        $object->cancel_status = 1;
        if ($object->end_date > now()) {
            $object->end_date = now()->subDay(); // Set the end date to one day before the current date
        }
        $object->package_points = 0;
        $object->previous_points = 0;
        $object->save();

        $notification = array('message' => 'Your Subscription Canceled Successfully ', 'alert-type' => 'success');
        return redirect()->route('customers')->with($notification);

        // return redirect()->route('user-index')->with($notification);
    }


    public function storeoldpaypalamountid(Request $request)
    {
        // session()->flush('oldpackage_id');
        session()->put('oldpackage_id', $request->id);
        if (session()->has('oldpackage_id')) {
            $package = Package::find($request->id);
            return response()->json([
                'status' => 200,
                'title' => $package->title,
                'price' => $package->price,
            ]);
        } else {
            return response()->json([
                'status' => 400
            ]);
        }
    }

    public function updatepurchasepackage(Request $request)
    {

        // return $request->id;
        // dd(session()->put('package_id', $request->id));
        // session()->flush('newpackage_id');
        // session()->flush('user_id');

        session()->put('newpackage_id', $request->id);
        session()->put('user_id', $request->user_id);

        if (session()->has('newpackage_id')) {
            $package = Package::find($request->id);
            return response()->json([
                'status' => 200,
                'title' => $package->title,
                'price' => $package->price,
            ]);
        } else {
            return response()->json([
                'status' => 400
            ]);
        }
    }

    public function adminsubcriptionupdatepaypal_payment(Request $request)
    {
        $oldgetPackage = Session()->get('oldpackage_id');
        $updatepackage = Session()->get('newpackage_id');
        $user_id = Session()->get('user_id');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        //dd($updatepackage);
        // return $provider;
        $packageSubs = PackageSubscription::where('package_id', $oldgetPackage)->where('user_id', $user_id)->where('status', 0)->first();
        // dd($packageSubs);
        if ($packageSubs != null) {
            if ($packageSubs->cancel_status == 1 || $packageSubs->cancel_status == 2) {
                session()->put('previous_package_points', 0);
            } else {
                session()->put('previous_package_points', $packageSubs->package_points);
            }
            if (empty($response)) {
                PackageSubscription::where('subscriptionID', $packageSubs->subscriptionID)
                    ->where('user_id', $user_id)->update(['status' => 1]);
                $response = $provider->cancelSubscription(
                    json_decode($packageSubs->package_response)->subscriptionID,
                    'cancel Subscription'
                );
            }
        }
        // dd($updatepackage);
        $purchase  = Package::where('id', Session()->get('newpackage_id'))->first();
        // dd($purchase);
        // whole month and year date from today onwards
        $dt = Carbon::now();
        $whole_month = $dt->addMonth()->subDays(1);
        $whole_year = Carbon::now()->addYear()->subDays(1);
        $check_user_package  = PackageSubscription::where('user_id', $user_id)->where('status', 0)->first();
        if (!empty($check_user_package)) {
            $check_user_package->user_id = $user_id;
            $check_user_package->package_id = $purchase->id;
            $check_user_package->package_points = $purchase->package_points;
            $check_user_package->previous_points = Session()->get('previous_package_points');
            $check_user_package->package_response = json_encode($request->all());
            $check_user_package->orderID = $request->orderID;
            $check_user_package->subscriptionID = $request->subscriptionID;
            if ($purchase->id == 1 || $purchase->id == 2 || $purchase->id == 3) {
                $check_user_package->start_date = Carbon::now();
                $check_user_package->end_date = $whole_month;
            } else {
                $check_user_package->start_date = Carbon::now();
                $check_user_package->end_date = $whole_year;
            }
            $check_user_package->save();

            // email to user
            $data = [
                'first_name' => $check_user_package->get_user->first_name ?? '',
                'last_name' => $check_user_package->get_user->last_name ?? '',
                'email' => $check_user_package->get_user->email ?? '',
                'package_name' => $check_user_package->get_package->title ?? '',
                'start_date' => date('j-M-Y', strtotime($check_user_package->start_date)),
                'end_date' => date('j-M-Y', strtotime($check_user_package->end_date)),
                'package_price' => $check_user_package->get_package->price ?? '',
                'package_points' => $check_user_package->get_package->package_points ?? '',
                'package_description' => $check_user_package->get_package->description ?? ''
            ];

            // $email_user = $user_id->email;
            // Mail::send(
            //     'frontend.emails.package_mail',
            //     ['data' => $data],
            //     function ($message) use ($email_user) {
            //         $message
            //             ->to($email_user)->subject('Subscription');
            //     }
            // );
            return response()->json([
                'status' => 200,
                'message' => 'You have successfully updated a plan!'
            ]);
        } else {

            $buy_package = new PackageSubscription();
            $buy_package->user_id = $user_id;
            $buy_package->package_id = $purchase->id;
            $buy_package->package_points = $purchase->package_points;
            $buy_package->previous_points = Session()->get('previous_package_points');
            $buy_package->package_response = json_encode($request->all());
            $buy_package->orderID = $request->orderID;
            $buy_package->subscriptionID = $request->subscriptionID;
            if ($purchase->id == 1 || $purchase->id == 2 || $purchase->id == 3) {
                $buy_package->start_date = Carbon::now();
                $buy_package->end_date = $whole_month;
            } else {
                $buy_package->start_date = Carbon::now();
                $buy_package->end_date = $whole_year;
            }
            $buy_package->save();

            $data = [
                'first_name' => $buy_package->get_user->first_name ?? '',
                'last_name' => $buy_package->get_user->last_name ?? '',
                'email' => $buy_package->get_user->email ?? '',
                'package_name' => $buy_package->get_package->title ?? '',
                'start_date' => date('j-M-Y', strtotime($buy_package->start_date)),
                'end_date' => date('j-M-Y', strtotime($buy_package->end_date)),
                'package_price' => $buy_package->get_package->price ?? '',
                'package_points' => $buy_package->get_package->package_points ?? '',
                'package_description' => $buy_package->get_package->description ?? ''
            ];
            // $email_user = Auth::user()->email;
            // Mail::send(
            //     'frontend.emails.package_mail',
            //     ['data' => $data],
            //     function ($message) use ($email_user) {
            //         $message
            //             ->to($email_user, 'Subscription')->subject('Subscription');
            //     }
            // );
        }

        session()->forget('newpackage_id');
        session()->forget('oldpackage_id');
        session()->forget('updatepackage_id');
        session()->forget('previous_package_points');
        return response()->json([
            'status' => 200
        ]);

        // return  $get_package = Package::find($updatepackage);
        // $pkjUpdated = new PackageSubscription();
        // $pkjUpdated->user_id = Auth::id();
        // $pkjUpdated->package_id = $get_package->id;
        // $pkjUpdated->name = Auth::user()->name;
        // $pkjUpdated->package_amount = $get_package->package_amount;
        // $pkjUpdated->package_response = $get_package->package_response;
        // $pkjUpdated->orderID = $get_package->orderID;
        // $pkjUpdated->subscriptionID = $get_package->subscriptionID;
        // $pkjUpdated->status = 0;
        // $pkjUpdated->save();
        // PackageSubscription::create([
        //     'user_id' => Auth::id(),
        //     'package_id' => $get_package->id,
        //     'name' => Auth::user()->name,
        //     'package_amount' => $get_package->amount,
        //     'package_response' => json_encode($request->all()),
        //     'orderID' => $request->orderID,
        //     'subscriptionID' => $request->subscriptionID,
        //     'status' => 0,
        // ]);

        // session()->forget('newpackage_id');
        // session()->forget('oldpackage_id');
        // session()->forget('updatepackage_id');
        // return response()->json([
        //     'status' => 200
        // ]);
    }

    public function updatepaypalamount(Request $request)
    {
        $package = Package::find(session()->get('newpackage_id'));
        session()->put('updatepackage_id', $package->id);
        return view('admin_dashboard.packagesubscribers.payment', get_defined_vars());
    }

    public function update_points(Request $request)
    {
        $validater = Validator::make($request->all(), [
            'points' => 'required|numeric',
            // Add more validation rules for other fields if needed
        ]);

        if ($validater->fails()) {
            // Handle validation errors
            return response()->json(
                ['status' => 400, 'errors' => $validater->errors()->toArray()]
            );
        }
        $validatedData = $request->validate([
            'points' => 'required|numeric',
        ]);

        $packageSubs = PackageSubscription::where('package_id', $request->package_id)->where('user_id', $request->user_id)->where('status', 0)->first();
        $points = $packageSubs->package_points
            + $validatedData['points'];
        $packageSubs->package_points = $points;
        $packageSubs->update();
        return response()->json([
            'status' => 200
        ]);


    }
}
