<?php

namespace App\Http\Controllers\Frontend;

use PDO;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProfileUpdate;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\BackendModels\Banner;
use App\Models\BackendModels\Review;
use App\Models\BackendModels\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\BackendModels\Package;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\BackendModels\Configuration;
use App\Models\BackendModels\Industry;
use App\Models\BackendModels\ParentCategory;
use App\Models\FrontendModels\SearchHistory;
use App\Models\BackendModels\PackageSubscription;
use App\Models\Question;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Http;


class UserDashboardController extends Controller
{
    public function __construct()
    {
        $config = Configuration::first();
        $social = Social::first();
        $main = ParentCategory::with('get_main_cat', 'get_sub_cat')->where('status', 1)->get();
        view::share(get_defined_vars());
    }
    public function index()
    {
        if (Auth::check()) {
            $update_user_profile = ProfileUpdate::where('user_id', Auth::id())->where('profile_status', 1)->with('get_userprofile')->first();
            $industries = Industry::where('status', 1)->get();

            // dd($update_user_profile);
            return view('user_dashboard.profile', compact('industries'), get_defined_vars());
        }
        return back();
    }

    public function purchasepackages(Request $request)
    {
        if (Auth::check()) {
            $member_packages  = Package::where('status', 1)->get();
            //  $purchase_package = PackageSubscription::where('user_id', Auth::id())->with('get_package')->first();
            $purchase_package = PackageSubscription::where('user_id', Auth::id())->where('status', 0)->with('get_package')->latest('id')->first();
            //  $canceledpackage = PackageSubscription::where('user_id', Auth::id())->where('status',0)->where('cancel_status', 1)->with('get_package')->first();

            //    return $canceledpackage->package_id;
            //  return $purchase_package->status;
            return view('user_dashboard.user-packages', get_defined_vars());
        }
        return back();
    }
    public function user_given_reviews(Request $request)
    {
        if (Auth::check() && Auth::user()->type == 1) {
            // Retrieve all reviews for the currently logged-in user
            $userReviews = Review::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            return view('user_dashboard.user-given-reviews', get_defined_vars());
        } elseif (Auth::check()) {
            $userReviews = Review::where('user_id', Auth::id())->where('status', 1)->get();
            return view('user_dashboard.user-given-reviews', get_defined_vars());
        }
        return back();
    }
    public function customerreview(Request $request)
    {
   

        $validator = Validator::make($request->all(), [
            'accept_terms' => 'required',
            'customer_description' => 'required',
            'customer_recommendation' => 'required',
            'customer_payment_time' => 'required',
            'customer_work' => 'required',
            'customer_rating' => 'required',
            'address' => 'required|max:200',
            'contact' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'last_name' => 'required|max:35',
            'first_name' => 'required|max:35',
        ]);
        // if (Auth::user()->role == 1) {
        //     return response()->json([
        //         'status' => 419,
        //         'message' => 'You are logged in as admin please logout first !'
        //     ]);
        // }
        $query = Question::get();
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->toArray()]);
        } else {
            $review = new Review();
            $review->user_id = Auth::id();
            $review->user_name  = Auth::user()->name;
            $review->first_name = $request->first_name;
            $review->last_name = $request->last_name;
            $review->name = $request->first_name . ' ' . $request->last_name;
            $review->email = $request->email;
            $review->contact = $request->contact;
            $review->address = $request->address;
            $review->customer_rating = $request->customer_rating;
            $review->customer_rating_2 = $request->customer_rating_2;
            $review->customer_rating_3  = $request->customer_rating_3;
            $review->working_with_customer = $request->customer_work;
            $review->customer_work_2 = $request->customer_work_2;
            $review->customer_work_3  = $request->customer_work_3;
            $review->customer_pay_time = $request->customer_payment_time;
            $review->customer_pay_time_2 = $request->customer_payment_time_2;
            $review->customer_pay_time_3  = $request->customer_payment_time_3;
            $review->customer_recommendation = $request->customer_recommendation;
            $review->customer_recommendation_2 = $request->customer_recommendation_2;
            $review->customer_recommendation_3  = $request->customer_recommendation_3;
            $review->customer_description = $request->customer_description;
            $review->customer_description_2 = $request->customer_description_2;
            $review->customer_description_3 = $request->customer_description_3;
            // question save
            $review->ques_first_name =        $query[0]->title;
            $review->ques_last_name =         $query[1]->title;
            $review->ques_email =             $query[2]->title;
            $review->ques_contact =           $query[3]->title;
            $review->ques_address =           $query[4]->title;
            $review->ques_customer_rating   = $query[5]->title;
            $review->ques_customer_rating_2 = $query[11]->title;
            $review->ques_customer_rating_3 = $query[12]->title;
            $review->ques_customer_work_1   = $query[6]->title;
            $review->ques_customer_work_2 =   $query[13]->title;
            $review->ques_customer_work_3 =   $query[14]->title;
            $review->ques_customer_pay_time_1 = $query[7]->title;
            $review->ques_customer_pay_time_2 = $query[15]->title;
            $review->ques_customer_pay_time_3  = $query[16]->title;
            $review->ques_customer_recommendation_1 = $query[8]->title;
            $review->ques_customer_recommendation_2 = $query[17]->title;
            $review->ques_customer_recommendation_3  = $query[18]->title;
            $review->ques_customer_description_1 = $query[9]->title;
            $review->ques_customer_description_2 = $query[19]->title;
            $review->ques_customer_description_3 = $query[20]->title;
            // end
            // checked save
            $review->uncheck_customer_work_1   = $query[6]->answer == $request->customer_work ? $query[6]->answer2 : $query[6]->answer;
            $review->uncheck_customer_work_2 =   $query[13]->answer == $request->customer_work_2 ? $query[13]->answer2 : $query[13]->answer;
            $review->uncheck_customer_work_3 =   $query[14]->answer == $request->customer_work_3 ? $query[14]->answer2 : $query[14]->answer;
            $review->uncheck_customer_pay_time_1 = $query[7]->answer == $request->customer_payment_time ? $query[7]->answer2 : $query[7]->answer;
            $review->uncheck_customer_pay_time_2 = $query[15]->answer == $request->customer_payment_time_2 ? $query[15]->answer2 : $query[15]->answer;
            $review->uncheck_customer_pay_time_3  = $query[16]->answer == $request->customer_payment_time_3 ? $query[16]->answer2 : $query[16]->answer;
            $review->uncheck_customer_recommendation_1 = $query[8]->answer == $request->customer_recommendation ? $query[8]->answer2 : $query[8]->answer;
            $review->uncheck_customer_recommendation_2 = $query[17]->answer == $request->customer_recommendation_2 ? $query[17]->answer2 : $query[17]->answer;
            $review->uncheck_customer_recommendation_3  = $query[18]->answer == $request->customer_recommendation_3 ? $query[18]->answer2 : $query[18]->answer;
            // end
            if (Auth::user()->type == 1) {
                $review->status = 1;
            } else {
                $review->status = 0;
            }
            $review->save();
            return response()->json([
                'status' => 200,
                'message' => 'You have successfully review a customer !'
            ]);
        }
    }
    public function edit_user_given_reviews($id)
    {
        $editreview = Review::findOrFail($id);
          $query = Question::get();
        return view('user_dashboard.edit-user-given-reviews', compact('editreview'));
    }

     public function update_user_given_reviews(Request $request, $id)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'accept_terms' => 'required',
            'customer_description' => 'required',
            'customer_recommendation' => 'required',
            'customer_payment_time' => 'required',
            'customer_work' => 'required',
            'customer_rating' => 'required',
            'address' => 'required|max:200',
            'contact' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'last_name' => 'required|max:35',
            'first_name' => 'required|max:35',
        ]);

        // dd($request->all());
        $review = Review::find($request->id);
        $review->first_name = $request->first_name;
        $review->last_name = $request->last_name;
        $review->name = $request->first_name . ' ' . $request->last_name;
        $review->email = $request->email;
        $review->contact = $request->contact;
        $review->address = $request->address;
        $review->customer_rating = $request->customer_rating;
        $review->customer_rating_2 = $request->customer_rating_2;
        $review->customer_rating_3 = $request->customer_rating_3;
        $review->uncheck_customer_work_1   =  $request->customer_work!=$review->working_with_customer ? $review->working_with_customer : $review->uncheck_customer_work_1;
        $review->uncheck_customer_work_2 =   $request->customer_work_2!=$review->customer_work_2 ? $review->customer_work_2 : $review->uncheck_customer_work_2;
        $review->uncheck_customer_work_3 =  $request->customer_work_3!=$review->customer_work_3 ? $review->customer_work_3 : $review->uncheck_customer_work_3;
        $review->uncheck_customer_pay_time_1 = $request->customer_payment_time!=$review->customer_pay_time ? $review->customer_pay_time : $review->uncheck_customer_pay_time_1;
        $review->uncheck_customer_pay_time_2 = $request->customer_payment_time_2!=$review->customer_pay_time_2 ? $review->customer_pay_time_2 : $review->uncheck_customer_pay_time_2;
        $review->uncheck_customer_pay_time_3  = $request->customer_payment_time_3!=$review->customer_pay_time_3 ? $review->customer_pay_time_3 : $review->uncheck_customer_pay_time_3;
        $review->uncheck_customer_recommendation_1 = $request->customer_recommendation!=$review->customer_recommendation ? $review->customer_recommendation : $review->uncheck_customer_recommendation_1;
        $review->uncheck_customer_recommendation_2 = $request->customer_recommendation_2!=$review->customer_recommendation_2 ? $review->customer_recommendation_2 : $review->uncheck_customer_recommendation_2;
        $review->uncheck_customer_recommendation_3  = $request->customer_recommendation_3!=$review->customer_recommendation_3 ? $review->customer_recommendation_3 : $review->uncheck_customer_recommendation_3;
        $review->working_with_customer = $request->customer_work;
        $review->customer_pay_time = $request->customer_payment_time;
        $review->customer_recommendation = $request->customer_recommendation;
        $review->customer_description = $request->customer_description;
        $review->customer_work_2 = $request->customer_work_2;
        $review->customer_work_3  = $request->customer_work_3;
        $review->customer_pay_time_2 = $request->customer_payment_time_2;
        $review->customer_pay_time_3  = $request->customer_payment_time_3;
        $review->customer_recommendation_2 = $request->customer_recommendation_2;
        $review->customer_recommendation_3  = $request->customer_recommendation_3;
        $review->customer_description_2 = $request->customer_description_2;
        $review->customer_description_3 = $request->customer_description_3;

        // $review = Review::find($request->id);
        // $review->first_name = $request->first_name;
        // $review->last_name = $request->last_name;
        // $review->name = $request->first_name . ' ' . $request->last_name;
        // $review->email = $request->email;
        // $review->contact = $request->contact;
        // $review->address = $request->address;
        // $review->customer_rating = $request->customer_rating;
        // $review->working_with_customer = $request->customer_work;
        // $review->customer_pay_time = $request->customer_payment_time;
        // $review->customer_recommendation = $request->customer_recommendation;
        // $review->customer_description = $request->customer_description;
        // $review->status = Auth::user()->status;

        // if (Auth::user()->type == 1)
        //      {
        //     $review->status = 1;
        //      }else{
        //     $review->status = 0;
        //      }
        $review->save();
        // $notification = array('message' =>'reviews deleted successfully!' , 'alert-type'=>'success' );
        // return redirect()->route('user-given-reviews')->with($notification);

        return redirect()->route('user-given-reviews')->with('message', 'reviews updated successfully!');
    }
    public function delete_user_given_reviews($id)
    {
        $editreview = Review::findOrFail($id);
        $editreview->delete();
        // $notification = array('message' =>'reviews deleted successfully!' , 'alert-type'=>'success' );
        return redirect()->route('user-given-reviews');
    }
    public function changepassword(Request $request)
    {
        if (Auth::check()) {
            return view('user_dashboard.change-password');
        }
    }

    public function updateprofile(Request $request)
    {
        // dd($request->all());

        $validation = $request->validate(
            [
                'business_information' => 'required',
                // 'postal_code' => 'required|max:15',
                // 'address' => 'required|max:200',
                // 'contact' => 'required|min:14',
                'industry_id' => 'required|max:200',
                'business_license' => 'required|max:200',
                // 'date_of_birth' => 'required',
                // 'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
                'last_name' => 'required|max:35',
                'first_name' => 'required|max:35',
                'industry_name' => 'required_if:industry_id,0'
            ],
            [
                'industry_id.required' => 'The Business name field is required',
                'industry_name.required_if' => 'The Business name field is required'
            ]
        );

        if ($request->industry_id == 0) {
            $validation['industry_name'] = 'required';
        }
        if ($request->hasFile('business_license_copy')) {
            // dd('image  business_license_copy');
            $file = $request->file('business_license_copy');
            $originalName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $filenamebusiness_license_copy = $originalName . '.' . $fileExtension;
            $file->move(public_path('business_licenses'), $filenamebusiness_license_copy);
        } else {
            // dd('image not found of  business_license_copy');
            $filenamebusiness_license_copy = $request->old_business_license_copy_image;
        }


        // if ($request->hasFile('business_license_copy')) {
        //     $filename = time() . '.' . $request->business_license_copy->getClientOriginalExtension();
        //     $request->business_license_copy->move(public_path('business_licenses'), $filename);
        // }

        if ($request->profile_image) {
            // dd('image found');
            $filenameprofile_image = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profiles'), $filenameprofile_image);
        } else {
            // dd('image not found');

            $filenameprofile_image = $request->old_image;
        }

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

        ProfileUpdate::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
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

        $update_user  = User::where('id', Auth::id())->first();
        $update_user->profile_status = 1;
        $update_user->save();
        return back()->with('update', 'Profile will be update onces Admin Approved !');
    }

    public function updateuserpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $user = User::where('id', Auth::id())->first();
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Password updated successfully !'
                ]);
            }
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'status' => 502,
                    'message' => 'Invalid Old password !'
                ]);
            }
        }
    }

    public function userlogout()
    {
        Session::flush();
        Auth::logout();
        $notification = array('message' => 'Logout Successfully ! ', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }

    // public function searchcustomer1(Request $request)
    // {
    //     // Check for admin role and redirect if needed
    //     if (Auth::check() && Auth::user()->role == 1) {
    //         return redirect()->route('customer-search')->with('admin', 'You are logged in as admin please logout first!');
    //     }

    //     // Get the current user's package status
    //     $package_cancel_status = PackageSubscription::where('user_id', Auth::id())
    //         ->where('end_date', '>=', date('Y-m-d'))
    //         ->latest('id')
    //         ->first();

    //     $user_SearchHistory_status = false;

    //     // Check if the package status is cancel_status = 2
    //     if ($package_cancel_status && $package_cancel_status->cancel_status == 2) {
    //         $checkCustomersStatus = Review::where(function ($query) use ($request) {
    //             $query->where('first_name', 'LIKE', '%' . $request->first_name . '%')
    //                 ->orWhere('last_name', 'LIKE', '%' . $request->last_name . '%')
    //                 ->orWhere('address', 'LIKE', '%' . $request->address . '%')
    //                 ->orWhere('contact', 'LIKE', '%' . $request->contact . '%')
    //                 ->orWhere('email', 'LIKE', '%' . $request->email . '%');
    //         })->where('status', 1)->get();

    //         foreach ($checkCustomersStatus as $result) {
    //             $searchHistory = SearchHistory::where('user_id', Auth::id())
    //                 ->where('review_id', $result->id)
    //                 ->first();
    //             if ($searchHistory) {
    //                 $user_SearchHistory_status = true;
    //                 break;
    //             }
    //         }
    //     } elseif ($package_cancel_status && $package_cancel_status->cancel_status == 1) {
    //         // You can add logic here for the case when the package is canceled by an admin (cancel_status = 1).
    //         // $package_canceled_by_admin = true; // Example
    //     }

    //     // Get current user's package points
    //     $points = 0;
    //     if (Auth::id()) {
    //         $customer_points = PackageSubscription::where('user_id', Auth::id())
    //             ->where('end_date', '>=', date('Y-m-d'))
    //             ->latest('id')
    //             ->first();
    //         if ($customer_points) {
    //             $points = (int)$customer_points->package_points + (int)$customer_points->package_response;
    //         }
    //     }

    //     // Search customers based on provided fields
    //     $searchFields = ['first_name', 'last_name', 'address', 'contact', 'email'];
    //     $customers = Review::where('status', 1);

    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $customers->where(function ($query) use ($searchFields, $search) {
    //             foreach ($searchFields as $field) {
    //                 $query->orWhere($field, 'LIKE', '%' . $search . '%');
    //             }
    //         });
    //     } else {
    //         foreach ($searchFields as $field) {
    //             if ($request->has($field)) {
    //                 $customers->where($field, 'LIKE', '%' . $request->input($field) . '%');
    //             }
    //         }
    //     }

    //     $customers = $customers->get();

    //     // Handle cases for redirect with error message
    //     if ($request->has('search') && empty($customers->count())) {
    //         return redirect()->route('home')->with('search', 'No results found.');
    //     } elseif (!$request->has('search') && empty($request->except('_token'))) {
    //         return back()->with('search', 'Please enter at least one field to search');
    //     }

    //     return view('frontend.search-results', compact('customers', 'user_SearchHistory_status', 'points'));
    // }

    public function searchcustomer(Request $request)
    {
        // dd($request->all());
        $searchTerms = explode(" ", $request->search);
        $searchfirst_name = $searchTerms[0] ?? '';
        $searchlast_name = $searchTerms[1] ?? '';
        // dd($searchTerms);
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->route('customer-search')->with('admin', 'You are logged in as admin please logout first!');
        }

        $search_data = Banner::where('section_name', 'search-banner')->first();

        if ($search = $request->search) {
            if (!empty($request->search)) {
                // ================ THIS CODE WILL  SEARCH FROM DATABSAE ===============//
                    $customers = Review::where(function ($query) use ($search) {
                    $query->where('first_name', 'LIKE', '%' . $search . '%');
                    $query->orWhere('name', 'LIKE', '%' . $search . '%');
                    $query->orWhere('last_name', 'LIKE', '%' . $search . '%');
                    $query->orWhere('address', 'LIKE', '%' . $search . '%');
                    $query->orWhere('contact', 'LIKE', '%' . $search . '%');
                    $query->orWhere('email', 'LIKE', '%' . $search . '%');
                })->where('status', 1)->get();
                
                // $customers = Review::where(
                //     'first_name',
                //     'LIKE',
                //     '%' . $searchfirst_name . '%'
                // )->where('status', 1)->orWhere(
                //     'name',
                //     'LIKE',
                //     '%' . $searchlast_name . '%'
                // )->where('status', 1)->orWhere(
                //     'last_name',
                //     'LIKE',
                //     '%' . $request->search . '%'
                // )->where('status', 1)->orWhere(
                //     'address',
                //     'LIKE',
                //     '%' . $request->search . '%'
                // )->where('status', 1)->orWhere(
                //     'contact',
                //     'LIKE',
                //     '%' . $request->search . '%'
                // )->where('status', 1)->orWhere(
                //     'email',
                //     'LIKE',
                //     '%' . $request->search . '%'
                // )->where('status', 1)->get();
                
                $package_cancel_status = PackageSubscription::where('user_id', Auth::id())
                    ->where('end_date', '>=', date('Y-m-d'))
                    ->latest('id')
                    ->first();
                // dd($package_cancel_status);

                $user_SearchHistory_status = false;
                //=== This will check if package has cancelled
                if ($package_cancel_status && isset($package_cancel_status->cancel_status)) {
                    if ($package_cancel_status->cancel_status == 2) {
                        // dd('cancel == 2');
                        foreach ($customers as $result) {
                            $searchHistory = SearchHistory::where('user_id', Auth::id())
                                ->where('review_id', $result->id)
                                ->first();
                            if ($searchHistory) {
                                $user_SearchHistory_status = true;
                                break;
                            }
                        }
                    } elseif ($package_cancel_status->cancel_status == 1) {
                        // You can add logic here for the case when the package is canceled by an admin (cancel_status = 1).
                        return response()->json([
                            'status' => 202,
                            'message' => 'Your Package has expired, kindly update!'
                        ]);
                    }
                }

                //=== This will check if package has expired but user has already bought this search review
                $user_SearchHistory_status = false;
                foreach ($customers as $result) {
                    $searchHistory = SearchHistory::where('user_id', Auth::id())
                        ->where('review_id', $result->id)
                        ->first();
                    if ($searchHistory) {
                        $user_SearchHistory_status = true;
                        break;
                    }
                }

                //=== This will check if package has less 0
                $customer_points = PackageSubscription::where('user_id', Auth::id())
                    ->where('end_date', '>=', date('Y-m-d'))
                    ->latest('id')
                    ->first();
                // dd($customer_points);
                if (!empty($customer_points)) {
                    if ($customer_points->package_points == "unlimited") {
                        $unlimitedPoints = true;
                    } else {
                        $all_points = is_numeric($customer_points->package_points) ? $customer_points->package_points : 0;
                        $all_points += is_numeric($customer_points->package_response) ? $customer_points->package_response : 0;
                        $points = $all_points;
                    }
                    // dd($points); // or do whatever you want with $unlimitedPoints or $points
                }
                // dd($request->all());
                // ================ THIS WILL SEARCH FROM LIVE API ===============//

                $apiKey = '156456a12bee46d1b8cd207adab2c7fd';
                $apiGalaxyname = 'next';
                $apiGalaxytype = 'Person';

                $searchParams = [
                    "FirstName" => $searchfirst_name,
                    "LastName" => $searchlast_name,
                    "AddressLine2" => $request->search,
                    'Limit' => 10 // Add a 'Limit' parameter to specify the number of records to retrieve.
                ];

                $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                    'galaxy-ap-name' => $apiGalaxyname,
                    'galaxy-ap-password' => $apiKey,
                    'galaxy-search-type' => $apiGalaxytype,
                ])->post('https://api.galaxysearchapi.com/PersonSearch', $searchParams);

                // return $response->json();
                // $liveSearchdata = $response->json();
                // dd($customers);
                // return $customers;
                // dd(isset($customers) && count($customers) > 0);

                if (isset($customers) && count($customers) > 0) {
                    // dd('status == 1');

                    // HERE BOTH API AND USER REVIEW DATA WILL BE SHOWN BECAUSE STATUS == 1
                    $liveSearchdata = $response->json();
                    // return $liveSearchdata['persons'][0]['addresses'][0]['fullAddress'];
                    return view('frontend.random-search-results', get_defined_vars());

                    // return response()->json(['liveSearchdata' => $liveSearchdata['persons'][0]['name']['firstName']]);
                } else {
                    // dd('status == 0');

                    // THIS IS WHERE ONLY API DATA WILL BE SHOWN BECAUSE OF USER REVIEW STATUS IS OFF
                    // dd($request->all());
                    // ================ THIS WILL SEARCH FROM LIVE API ===============//

                    $apiKey = '156456a12bee46d1b8cd207adab2c7fd';
                    $apiGalaxyname = 'next';
                    $apiGalaxytype = 'Person';
                    $searchParams = [
                        "FirstName" => $searchfirst_name,
                        "LastName" => $searchlast_name,
                        "AddressLine2" => $request->search,
                        'Limit' => 10 // Add a 'Limit' parameter to specify the number of records to retrieve.
                    ];

                    $response = Http::withHeaders([
                        'accept' => 'application/json',
                        'content-type' => 'application/json',
                        'galaxy-ap-name' => $apiGalaxyname,
                        'galaxy-ap-password' => $apiKey,
                        'galaxy-search-type' => $apiGalaxytype,
                    ])->post('https://api.galaxysearchapi.com/PersonSearch', $searchParams);
                    $liveSearchdata = $response->json();
                    return view('frontend.only-api-random-search-results', get_defined_vars());
                }
            } else {
                return redirect()->route('home')->with('search', 'Please enter at least one field to search');
            }
        } else {

            if (empty($request->first_name || $request->last_name || $request->address || $request->contact ||
                $request->email)) {
                return back()->with('search', 'Please enter at least one field to search');
            } else {

                // dd($request->all());
                // dd('form search');


                $customers = Review::where('status', 1)->where(
                    'first_name',
                    'LIKE',
                    '%' . $request->first_name . '%'
                )->where(
                    'last_name',
                    'LIKE',
                    '%' . $request->last_name . '%'
                )->where(
                    'address',
                    'LIKE',
                    '%' . $request->address . '%'
                )->where(
                    'contact',
                    'LIKE',
                    '%' . $request->contact . '%'
                )->where(
                    'email',
                    'LIKE',
                    '%' . $request->email . '%'
                )->get();

                $package_cancel_status = PackageSubscription::where('user_id', Auth::id())
                    ->where('end_date', '>=', date('Y-m-d'))
                    ->latest('id')
                    ->first();
                // dd($package_cancel_status);

                $user_SearchHistory_status = false;
                //=== This will check if package has cancelled
                if ($package_cancel_status && isset($package_cancel_status->cancel_status)) {
                    if ($package_cancel_status->cancel_status == 2) {
                        // dd('cancel == 2');
                        foreach ($customers as $result) {
                            $searchHistory = SearchHistory::where('user_id', Auth::id())
                                ->where('review_id', $result->id)
                                ->first();
                            if ($searchHistory) {
                                $user_SearchHistory_status = true;
                                break;
                            }
                        }
                    } elseif ($package_cancel_status->cancel_status == 1) {
                        // You can add logic here for the case when the package is canceled by an admin (cancel_status = 1).
                        return response()->json([
                            'status' => 202,
                            'message' => 'Your Package has expired, kindly update!'
                        ]);
                    }
                }

                //=== This will check if package has expired but user has already bought this search review
                $user_SearchHistory_status = false;
                foreach ($customers as $result) {
                    $searchHistory = SearchHistory::where('user_id', Auth::id())
                        ->where('review_id', $result->id)
                        ->first();
                    if ($searchHistory) {
                        $user_SearchHistory_status = true;
                        break;
                    }
                }

                //=== This will check if package has less 0

                $customer_points = PackageSubscription::where('user_id', Auth::id())
                    ->where('end_date', '>=', date('Y-m-d'))
                    ->latest('id')
                    ->first();
                // dd($customer_points);
                if (!empty($customer_points)) {
                    if ($customer_points->package_points == "unlimited") {
                        $unlimitedPoints = true;
                    } else {
                        $all_points = is_numeric($customer_points->package_points) ? $customer_points->package_points : 0;
                        $all_points += is_numeric($customer_points->package_response) ? $customer_points->package_response : 0;
                        $points = $all_points;
                    }
                    // dd($points); // or do whatever you want with $unlimitedPoints or $points
                }
                // dd($request->all());

                // ================ THIS WILL SEARCH FROM LIVE API ===============//

                $apiKey = '156456a12bee46d1b8cd207adab2c7fd';
                $apiGalaxyname = 'next';
                $apiGalaxytype = 'Person';
                $searchParams = [
                    "FirstName" => $request->first_name,
                    "LastName" => $request->last_name,
                    "AddressLine2" => $request->address,
                    'Limit' => 10 // Add a 'Limit' parameter to specify the number of records to retrieve.
                ];

                $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                    'galaxy-ap-name' => $apiGalaxyname,
                    'galaxy-ap-password' => $apiKey,
                    'galaxy-search-type' => $apiGalaxytype,
                ])->post('https://api.galaxysearchapi.com/PersonSearch', $searchParams);

                // return $response->json();
                // $liveSearchdata = $response->json();
                // return $customers;

                // dd(isset($customers) && count($customers) > 0);

                if (isset($customers) && count($customers) > 0) {

                    // dd('status == 1');
                    // dd('form search status == 1');

                    // HERE BOTH API AND USER REVIEW DATA WILL BE SHOWN BECAUSE STATUS == 1
                    $liveSearchdata = $response->json();
                    return view('frontend.search-results', get_defined_vars());
                    // return $liveSearchdata['persons'][0]['addresses'][0]['fullAddress'];
                    // return view('frontend.live-search-results', get_defined_vars());
                    // return response()->json(['liveSearchdata' => $liveSearchdata['persons'][0]['name']['firstName']]);

                } else {
                    // dd('status == 0');
                    // dd('form search status == 0');

                    // THIS IS WHERE ONLY API DATA WILL BE SHOWN BECAUSE OF USER REVIEW STATUS IS OFF
                    // dd($request->all());
                    // ================ THIS WILL SEARCH FROM LIVE API ===============//

                    $apiKey = '156456a12bee46d1b8cd207adab2c7fd';
                    $apiGalaxyname = 'next';
                    $apiGalaxytype = 'Person';
                    $searchParams = [
                        "FirstName" => $request->first_name,
                        "LastName" => $request->last_name,
                        "AddressLine2" => $request->address,
                        'Limit' => 10 // Add a 'Limit' parameter to specify the number of records to retrieve.
                    ];

                    $response = Http::withHeaders([
                        'accept' => 'application/json',
                        'content-type' => 'application/json',
                        'galaxy-ap-name' => $apiGalaxyname,
                        'galaxy-ap-password' => $apiKey,
                        'galaxy-search-type' => $apiGalaxytype,
                    ])->post('https://api.galaxysearchapi.com/PersonSearch', $searchParams);
                    $liveSearchdata = $response->json();
                    return view('frontend.only-api-search-results', get_defined_vars());
                }

                return view('frontend.search-results', get_defined_vars());
            }
        }
    }

    public function customers(Request $request)
    {

        // dd('after click here');

        if (!Auth::check()) {
            return response()->json([
                'status' => 305,
                'message' => 'Please Login first to view details!'
            ]);
        }

        // Continue with your code for authenticated users
        if (Auth::check() && Auth::user()->role == 1) {
            return response()->json([
                'status' => 306,
                'message' => 'You are logged in as admin please logout first !'
            ]);
        }
        $check_package = PackageSubscription::where('user_id', Auth::id())->latest('id')
            ->first();
        // $check_package = PackageSubscription::where('user_id', Auth::id())->first();
        if (empty($check_package->package_id)) {

            // dd('cond 0 1');

            return response()->json([
                'status' => 404,
                'message' => 'Please purchase package to view details !'
            ]);
        }

        $check_points = PackageSubscription::where('user_id', Auth::id())
            ->latest('id')
            ->first();

        if ($check_points->end_date < Carbon::now()) {
            // dd('cond 0 2');

            return response()->json([
                'status' => 202,
                'message' => 'Your Package has expired, kindly update!'
            ]);
        }

        $customer_points = PackageSubscription::where('user_id', Auth::id())
            ->latest('id')
            ->first();
        if ($customer_points->package_points == "unlimited") {
            $unlimitedPoints = $customer_points->package_points == "unlimited";
            // dd($unlimitedPoints);
            $search = Review::where('id', $request->id)->first();
            $customer_history = new SearchHistory();
            $customer_history->user_id = Auth::id();
            $customer_history->review_id = $search->id;
            $customer_history->save();
            $customer = Review::where('id', $request->id)->first();
 return response()->json(['status' => 200,
                'customer' => $customer,
                'unlimitedPoints' => $unlimitedPoints,
                'html' => view('frontend.random_search_results_view',get_defined_vars())->render(),
            ]);
                
            // return response()->json([
            //     'status' => 200,
            //     'customer' => $customer,
            //     'unlimitedPoints' => $unlimitedPoints
            // ]);
        }
        $package_cancel_status = PackageSubscription::where('user_id', Auth::id())
            ->where('end_date', '>=', date('Y-m-d'))
            ->latest('id')
            ->first();

        if ($package_cancel_status && isset($package_cancel_status->cancel_status)) {

            if ($package_cancel_status->cancel_status == 2) {
                // Actions to perform when cancel_status is 2
                // dd('here');
                $customer_points = PackageSubscription::where('user_id', Auth::id())
                    ->where('end_date', '>=', date('Y-m-d'))
                    ->latest('id')
                    ->first();
                $search = Review::where('id', $request->id)->first();
                $searchHistory = SearchHistory::where('user_id', Auth::id())
                    ->where('review_id', $request->id)
                    ->first();
                if (!empty($customer_points)) {

                    $all_points = is_numeric($customer_points->package_points) ? $customer_points->package_points : 0;
                    $all_points += is_numeric($customer_points->package_response) ? $customer_points->package_response : 0;
                    $points = $all_points;
                    // dd($points);
                    if ($points > 0) {
                        $check_status = SearchHistory::where('user_id', Auth::id())
                            ->where('review_id', $request->id)
                            ->first();
                        $check_pointsto_reduce = PackageSubscription::where('user_id', Auth::id())
                            ->latest('id')
                            ->first();
                        if ($check_pointsto_reduce->package_points != 'unlimited') {
                            if (empty($check_status->review_id) || $check_status->review_id != $request->id) {
                                $totalPoints = $check_pointsto_reduce->package_points + $check_pointsto_reduce->previous_points;
                                $result = $totalPoints - 1;
                                $check_pointsto_reduce->package_points = $result;
                                $check_pointsto_reduce->save();
                            }
                        }

                        $search = Review::where('id', $request->id)->first();
                        $customer_history = new SearchHistory();
                        $customer_history->user_id = Auth::id();
                        $customer_history->review_id = $request->id;
                        $customer_history->save();
                        $customer = Review::where('id', $request->id)->first();

                        return response()->json([
                            'status' => 200,
                            'customer' => $customer
                        ]);
                    } else {
                        return response()->json([
                            'status' => 202,
                            'message' => 'Your Package has expired, kindly update!'
                        ]);
                    }
                }

                $search = Review::where('id', $request->id)->first();
                $searchHistory = SearchHistory::where('user_id', Auth::id())
                    ->where('review_id', $search->id)
                    ->first();
                if ($searchHistory) {
                    $customer_history = new SearchHistory();
                    $customer_history->user_id = Auth::id();
                    $customer_history->review_id = $search->id;
                    $customer_history->save();
                    $customer = Review::where('id', $request->id)->first();
                    return response()->json([
                        'status' => 200,
                        'customer' => $customer
                    ]);
                } else {
                    return response()->json([
                        'status' => 202,
                        'message' => 'Your Package has expired, kindly update!'
                    ]);
                }
            } elseif ($package_cancel_status->cancel_status == 1) {
                return response()->json([
                    'status' => 205,
                    'message' => 'Your Package has been canceled by admin. Kindly update your package!'
                ]);
            }
        } else {
            // Handle the case when $package_cancel_status is null or cancel_status is not set.
            $check_status = SearchHistory::where('user_id', Auth::id())
                ->where('review_id', $request->id)
                ->first();

            if ($check_points->package_points > 0) {

                if ($check_points->package_points != 'unlimited') {
                    if (empty($check_status->review_id) || $check_status->review_id != $request->id) {
                        $totalPoints = $check_points->package_points + $check_points->previous_points;
                        $result = $totalPoints - 1;
                        $check_points->package_points = $result;
                        $check_points->save();
                    }
                }

                $search = Review::where('id', $request->id)->first();
                $customer_history = new SearchHistory();
                $customer_history->user_id = Auth::id();
                $customer_history->review_id = $search->id;
                $customer_history->save();
                $customer = Review::where('id', $request->id)->first();

                return response()->json([
                    'status' => 200,
                    'customer' => $customer
                ]);
            } else {
                // dd('cond 0 Kindly update your package');

                return response()->json([
                    'status' => 205,
                    'message' => 'Your Package points have ended. Kindly update your package!'
                ]);
            }
        }

        ///======== Common search check if already exist
        $search = Review::where('id', $request->id)->first();
        $searchHistory = SearchHistory::where('user_id', Auth::id())
            ->where('review_id', $search->id)
            ->first();
        if ($searchHistory) {
            // dd('after click here');
            $customer_history = new SearchHistory();
            $customer_history->user_id = Auth::id();
            $customer_history->review_id = $search->id;
            $customer_history->save();
            $customer = Review::where('id', $search->id)->first();
            return response()->json([
                'status' => 200,
                'customer' => $customer
            ]);
        } else {
            // dd('after click not found in Seach-History');
            ///======== Common search check if less then 0  and also not found in Seach-History

            $check_status = SearchHistory::where('user_id', Auth::id())
                ->where('review_id', $request->id)
                ->first();

            if ($check_points->package_points > 0) {

                // dd('cond 0 3');
                if ($check_points->package_points != 'unlimited') {
                    if (empty($check_status->review_id) || $check_status->review_id != $request->id) {
                        $totalPoints = $check_points->package_points + $check_points->previous_points;
                        $result = $totalPoints - 1;
                        $check_points->package_points = $result;
                        $check_points->save();
                    }
                }

                $search = Review::where('id', $request->id)->first();
                $customer_history = new SearchHistory();
                $customer_history->user_id = Auth::id();
                $customer_history->review_id = $search->id;
                $customer_history->save();
                $customer = Review::where('id', $request->id)->first();

                return response()->json([
                    'status' => 200,
                    'customer' => $customer
                ]);
            } else {
                // dd('cond 0 Kindly update your package');

                return response()->json([
                    'status' => 205,
                    'message' => 'Your Package points have ended. Kindly update your package!'
                ]);
            }
        }
    }
    // ====== this what to save later =====
    public function pay_amount(Request $request)
    {
        // dd($request->all());
        $package = Package::find(session()->get('package_id'));
        return view('frontend.payment', get_defined_vars());
    }
    public function store_package_payment(Request $request)
    {

        // dd($request->id);
        $user = Session::get('user');
        $purchase  = Package::where('id', session()->get('package_id'))->first();
        // whole month and year date from today onwards62w5
        $dt = Carbon::now();
        $whole_month = $dt->addMonth()->subDays(1);
        $whole_year = Carbon::now()->addYear()->subDays(1);
        $check_user_package  = PackageSubscription::where('user_id', Auth::id())->where('status', 0)->latest('id')->first();

        if (!empty($check_user_package)) {
            $check_user_package->user_id = Auth::id();
            $check_user_package->package_id = $purchase->id;
            $check_user_package->package_points = $purchase->package_points;
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

            $email_user = Auth::user()->email;
            Mail::send(
                'frontend.emails.package_mail',
                ['data' => $data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user)->subject('Subscription');
                }
            );
            return response()->json([
                'status' => 200,
                'message' => 'You have successfully purchased a plan !'
            ]);
        } else {
            $buy_package = new PackageSubscription();
            $buy_package->user_id = Auth::id();
            $buy_package->package_id = $purchase->id;
            $buy_package->package_points = $purchase->package_points;
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
            $email_user = Auth::user()->email;
            Mail::send(
                'frontend.emails.package_mail',
                ['data' => $data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user, 'Subscription')->subject('Subscription');
                }
            );
            return response()->json([
                'status' => 200,
                'message' => 'You have successfully purchased a plan !'
            ]);
        }
    }
    public function purchasepackage(Request $request)
    {
        // return $request->id;
        // dd(session()->put('package_id', $request->id));
        session()->put('package_id', $request->id);
        if (session()->has('package_id')) {
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
        session()->put('newpackage_id', $request->id);
        session()->put('package_id', $request->id);
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

    public function storeoldpaypalamountid(Request $request)
    {
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

    public function updatepaypalamount(Request $request)
    {
        $package = Package::find(session()->get('newpackage_id'));
        session()->put('updatepackage_id', $package->id);
        return view('user_dashboard.payment', get_defined_vars());
    }

    public function subcriptionupdatepaypal_payment(Request $request)
    {
        $oldgetPackage = Session()->get('oldpackage_id');
        $updatepackage = Session()->get('newpackage_id');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        //dd($updatepackage);
        // return $provider;
        $packageSubs = PackageSubscription::where('package_id', $oldgetPackage)->where('user_id', Auth::id())->where('status', 0)->first();
        // dd($packageSubs);
        if ($packageSubs != null) {
            if ($packageSubs->cancel_status == 1 || $packageSubs->cancel_status == 2) {
                session()->put('previous_package_points', 0);
            } else {
                session()->put('previous_package_points', $packageSubs->package_points);
            }
            if (empty($response)) {
                PackageSubscription::where('subscriptionID', $packageSubs->subscriptionID)
                    ->where('user_id', Auth::id())->update(['status' => 1]);
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
        $check_user_package  = PackageSubscription::where('user_id', Auth::id())->where('status', 0)->first();
        if (!empty($check_user_package)) {
            $check_user_package->user_id = Auth::id();
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

            $email_user = Auth::user()->email;
            Mail::send(
                'frontend.emails.package_mail',
                ['data' => $data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user)->subject('Subscription');
                }
            );
            return response()->json([
                'status' => 200,
                'message' => 'You have successfully updated a plan!'
            ]);
        } else {

            $buy_package = new PackageSubscription();
            $buy_package->user_id = Auth::id();
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
            $email_user = Auth::user()->email;
            Mail::send(
                'frontend.emails.package_mail',
                ['data' => $data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user, 'Subscription')->subject('Subscription');
                }
            );
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

    public function free_package(Request $request)
    {
        if ($request->id == null) {
            $id = session()->get('newpackage_id');
        } else {
            $id = $request->id;
        }
        $session = Session::get('signup');
        if ($session['industry_id'] == 0) {
            $business_name = $session['industry_name'];
            $industry_id = null;
        } else {
            $business_name = null;
            $industry_id = $session['industry_id'];
        }

        $user = new User();
        $user->first_name = $session['first_name'];
        $user->last_name = $session['last_name'];
        $user->slug = Str::slug($session['first_name'] . ' ' . $session['last_name'], "-");
        $user->name = $session['first_name'] . ' ' . $session['last_name'];
        $user->email = $session['email'];
        $user->password = Hash::make($session['password']);
        $user->industry_id = $industry_id;
        $user->business_name = $business_name;
        $user->business_license = $session['business_license'];
        $user->business_information = $session['business_information'];
        $user->role = 2;
        $user->status = 0;
        $user->business_license_copy = $session['business_license_copy'];
        $data = [
            'name' => $session['first_name'],
        ];
        $email_user = $session['email'];
        Mail::send(
            'frontend.emails.user_email',
            ['data' => $data],
            function ($message) use ($email_user) {
                $message
                    ->to($email_user)->subject('Welcome');
            }
        );
        $res = $user->save();
        $dt = Carbon::now();
        $whole_month = $dt->addMonth()->subDays(1);
        $whole_year = Carbon::now()->addYear()->subDays(1);
        if ($res) {
            $newuser = User::latest('created_at')->first();
            $package = Package::find($id);
            if ($package->id == 7) {
                $package_subscription = new PackageSubscription();
                $package_subscription->user_id = $newuser->id;
                $package_subscription->name = $package->title;
                $package_subscription->package_id = $package->id;
                $package_subscription->status = $package->status;
                if ($package->id == 1 || $package->id == 2 || $package->id == 3) {
                    $package_subscription->start_date = Carbon::now();
                    $package_subscription->end_date = $whole_month;
                } else {
                    $package_subscription->start_date = Carbon::now();
                    $package_subscription->end_date = $whole_year;
                }
                $result = $package_subscription->save();
                if ($result) {
                    Session::forget('signup');
                    Session::forget('newpackage_id');
                    return response()->json([
                        'status' => 200,
                        'message' => 'Account created successfully !'
                    ]);
                }
            } else {
                Session::put('newpackage_id', $package->id);
                Session::put('user_id', $newuser->id);
                return response()->json([
                    'status' => 200,
                    'title' => $package->title,
                    'price' => $package->price
                ]);
                // Session::put('newpackage_id', $package->id);
                // dd(session()->get('user_id'));
            }
        }
    }

    public function cancelSubscription(Request $request, $subscriptionID)
    {
        // dd($subscriptionID);
        // $packageSubs = PackageSubscription::where('subscriptionID', $subscriptionID)->orderBy('id', 'desc')->first();
        // $transactionid = $subscriptionID;
        // $amount = $packageSubs->package_amount;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $provider->cancelSubscription($subscriptionID, 'Not satisfied with the service');


        $object = PackageSubscription::where('subscriptionID', $subscriptionID)->first();
        // $object = PackageSubscription::where('subscriptionID', $subscriptionID)->latest('id')->first();
        $object->status = 0;
        $object->cancel_status = 2;
        $object->save();
        $notification = array('message' => 'Your package Cancelled Successfully', 'alert-type' => 'success');
        return redirect()->route('purchased-package')->with($notification);
    }

    public function signupsubscription_payment(Request $request)
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

    public function signuppaypalamount(Request $request)
    {
        $package = Package::find(session()->get('newpackage_id'));
        session()->put('updatepackage_id', $package->id);
        return view('frontend.signuppayment', get_defined_vars());
    }
}
