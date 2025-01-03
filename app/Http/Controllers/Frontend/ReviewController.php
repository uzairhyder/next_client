<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BackendModels\PackageSubscription;
use App\Models\BackendModels\Review;
use App\Models\FrontendModels\SearchHistory;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function review(Request $request)
    {

        $reviews = Review::with('get_user.industry')->get();
        return view('admin_dashboard.reviews.index', get_defined_vars());
    }
    public function addCustomerReviews(Request $request)
    {
        // $detail = Review::where('id',$id)->first();

        $query = Question::get();
        return view('admin_dashboard.reviews.add', get_defined_vars());
    }


    public function store_customerreview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accept_terms' => 'required',
            'customer_description' => 'required',
            'customer_recommendation' => 'required',
            'customer_payment_time' => 'required',
            'customer_work' => 'required',
            // 'customer_rating' => 'required',
            'address' => 'required|max:200',
            'contact' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'last_name' => 'required|max:35',
            'first_name' => 'required|max:35',
        ]);
        // dd($request->all());
        // if (Auth::user()->role == 1) {
        //     return response()->json([
        //         'status' => 419,
        //         'message' => 'You are logged in as admin please logout first !'
        //     ]);
        // }
        if ($validator->fails()) {

            $notification = array('message' => 'feilds are required ! ', 'alert-type' => 'error');
            return redirect()->back()->with($notification);

        }else {
            $query = Question::get();

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

            // $review = new Review();
            // $review->user_id = Auth::id();
            // $review->user_name  = Auth::user()->name;
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
            $review->status = 1;
            $review->save();
            $notification = array('message' => 'Reviews added successfully ! ', 'alert-type' => 'success');
            return redirect()->route('customer-reviews')->with($notification);
            // return back()->with('update', 'Reeviews added successfully !');
        }
    }

    public function edit_customerreview($id)
    {
        $query = Question::get();
        // dd($id);
        $editreview  = Review::where('id', $id)->first();

        if (!empty($editreview)) {
            return view('admin_dashboard.reviews.edit', get_defined_vars());
        } else {
            return view('frontend.404');
        }
    }
    public function update_customerreview(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'accept_terms' => 'required',
            'customer_description' => 'required',
            'customer_recommendation' => 'required',
            'customer_payment_time' => 'required',
            'customer_work' => 'required',
            // 'customer_rating' => 'required',
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


   // checked save
  // end
        

        $review->status = $request->status;
        $review->save();
        $notification = array('message' => 'reviews updated successfully!', 'alert-type' => 'success');
        return redirect()->route('customer-reviews')->with($notification);

        // return redirect()->route('customer-reviews')->with('message', 'reviews updated successfully!');
    }
    public function reviewdetail(Request $request, $id)
    {
        $detail = Review::where('id', $id)->first();
        if (!empty($detail)) {
            return view('admin_dashboard.reviews.detail', get_defined_vars());
        } else {
            return view('frontend.404');
        }
    }
    public function reviewSearchdetail(Request $request, $id)
    {
        $query = Question::get();
        $detail = Review::where('id', $id)->first();
        if (!empty($detail)) {
            return view('admin_dashboard.reviews.search-detail', get_defined_vars());
        } else {
            return view('frontend.404');
        }
    }
    public function deletereview(Request $request)
    {
        $id = $request->id;
        $contact = Review::where('id', $id)->first();
        $contact->delete();
        $notification = array('message' => 'Review Deleted Successfully ! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function reviewstatus(Request $request, $id)
    {
        $review_status = Review::find($id);
        if ($review_status->status == 0) {
            $review_status->status = 1;
        } else {
            $review_status->status = 0;
        }
        $review_status->save();
        $notification = array('message' => 'Review Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
        // $notification = array('message' => 'Review Status Updated Successfully! ', 'alert-type' => 'success');
        // return redirect()->route('customer-reviews')->with($notification);
    }
    public function searchlivecustomer(Request $request)
    {
            // dd($request->all());
            $detail = Review::where('id', $request->review_id)->first();
            if (empty($request->first_name || $request->last_name || $request->address || $request->contact ||
            $request->email)) {
            return back()->with('search', 'Please enter at least one field to search');
            } else {
            $customers = Review::where(
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
            )->first();
            // dd($customers);

            $package_cancel_status = PackageSubscription::where('user_id', Auth::id())
                ->where('end_date', '>=', date('Y-m-d'))
                ->latest('id')
                ->first();

            // dd($customers);

            $user_SearchHistory_status = false;
            //=== This will check if package has cancelled
            if ($package_cancel_status && isset($package_cancel_status->cancel_status)) {
                if ($package_cancel_status->cancel_status == 2) {
                    // dd('cancel == 2');
                    foreach ($customers as $result) {
                        $searchHistory = SearchHistory::where('user_id', $request->user_id)
                            ->where('review_id', $request->review_id)
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
                $searchHistory = SearchHistory::where('user_id', $request->user_id)
                    ->where('review_id', $request->review_id)
                    ->first();
                if ($searchHistory) {
                    $user_SearchHistory_status = true;
                    break;
                }
            }
            //=== This will check if package has less 0

            $customer_points = PackageSubscription::where('user_id', $request->user_id)
                ->where('end_date', '>=', date('Y-m-d'))
                ->latest('id')
                ->first();
            if (!empty($customer_points)) {
                $all_points = is_numeric($customer_points->package_points) ? $customer_points->package_points : 0;
                $all_points += is_numeric($customer_points->package_response) ? $customer_points->package_response : 0;
                $points = $all_points;
            }


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
            ])->post('https://api.galaxysearchapi.com/PersonSearch',$searchParams);

            // return $response->json();
            $liveSearchdata = $response->json();
            return view('admin_dashboard.reviews.search-detail', get_defined_vars());

        }
    }
}
