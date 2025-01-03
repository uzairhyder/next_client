<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProfileUpdate;
use Illuminate\Support\Carbon;
use App\Models\BackendModels\Faq;
use Illuminate\Support\Facades\DB;
use App\Models\FrontendModels\Cart;
use App\Http\Controllers\Controller;
use App\Models\BackendModels\Banner;
use App\Models\BackendModels\Review;
use App\Models\BackendModels\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\BackendModels\Inquiry;
use App\Models\BackendModels\Package;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\BackendModels\Configuration;
use App\Models\BackendModels\Industry;
use App\Models\BackendModels\PrivacyPolicy;
use App\Models\BackendModels\ParentCategory;
use App\Models\BackendModels\TermsCondition;

use App\Models\FrontendModels\OtpVerification;
use App\Models\BackendModels\PackageSubscription;
use App\Models\Question;

class FrontendController extends Controller
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
        $banners = Banner::where('section_name', 'home-banner')->first();
        $second_section = Banner::where('section_name', 'second-section')->first();
        $third_section = Banner::where('section_name', 'third-section')->first();
        $video_section = Banner::where('section_name', 'video-section')->first();
        $sell = Banner::where('section_name', 'sell-section')->first();
        $contact_section = Banner::where('section_name', 'contact')->first();

        return view('frontend.index', get_defined_vars());
    }

    public function customersearch(Request $request)
    {
        $search_data = Banner::where('section_name', 'search-banner')->first();
        return view('frontend.search-our-databse', get_defined_vars());
    }

    public function review(Request $request)
    {
        $banner_review = Banner::where('section_name', 'banner-review')->first();
        $query = Question::get();
        //  orderBy('id','Desc')->
        if (Auth::check()) {
            return view('frontend.review', get_defined_vars());
        } else {
            return back();
        }
    }

    public function signup(Request $request)
    {
        if (!Auth::check() || Auth::check() && Auth::user()->role == 1) {
            $industries = Industry::where('status', 1)->get();
            if (session()->has('package_id')) {
                $id = session()->get('package_id');
                session()->forget('package_id');
                $package_id = Package::where('id', $id)->first();
            } else {
                $package_id = null;
            }
            return view('frontend.signup', compact('industries', 'package_id'));
        } else {
            return back();
        }
    }

    public function login(Request $request)
    {
        if ($request->msg) {
            // dd("here")l
            return view('frontend.login')->with('free_register', 'Account created successfully !');
        }
        if (!Auth::check() || Auth::check() && Auth::user()->role == 1) {

            return view('frontend.login');
        } else {
            return back();
        }
    }

    public function forgtepassword(Request $request)
    {
        if (!Auth::check() || Auth::check() && Auth::user()->role == 1) {
            return view('frontend.forget-password');
        } else {
            return back();
        }
    }

    public function faqs(Request $request)
    {
        $faq_list = Faq::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get()->skip(1);
        $firstOrder = $faq_list->first();
        return view('frontend.faqs', get_defined_vars());
    }
    public function contact(Request $request)
    {
        return view('frontend.contact-us');
    }
    public function packages(Request $request)
    {
        if (Session::has('signup')) {
            $packages  = Package::where('status', 1)->get();
            return view('frontend.packages', get_defined_vars());
        } else {
            // The subscription session is not set, redirect to the home page
            return redirect()->route('home');
        }
    }

    public function explore_packages(Request $request)
    {
        $packages  = Package::where('status', 1)->get();
        return view('frontend.exlpore-packages', get_defined_vars());
    }

    public function changepassword(Request $request, $token)
    {
        return view('frontend.change-password', ['token' => $token]);
    }
    public function updatenewpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'confirm_password' => 'required|same:password',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
            'email' => 'required|email|exists:users',
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }
        $user_check  = User::where('email', $request->email)->first();
        if (!empty($user_check)) {
            $updatePassword = DB::table('password_resets')
                ->where(['email' => $request->email, 'token' => $request->token])->latest()
                ->first();

            if (!$updatePassword)
                return response()->json([
                    'status' => 303,
                    'message' => 'Invalid Token !'
                ]);
            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email' => $request->email])->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Password updated successfully !'
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'User with this email does not exist !'
            ]);
        }
    }
    public function howitworks(Request $request)
    {
        $terms = TermsCondition::find(1);
        return view('frontend.how-it-works', get_defined_vars());
    }
    public function termsandconditions(Request $request)
    {
        // dd('terms');
        $terms = TermsCondition::find(2);
        return view('frontend.terms-and-conditions', get_defined_vars());
    }
    public function payment(Request $request)
    {
        return view('frontend.payment');
    }
    public function searchresult(Request $request)
    {
        return view('frontend.search-results');
    }


    public function inquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'contact' => 'required|max:20',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'name' => 'required|max:35',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->contact = $request->contact;
            $inquiry->message = $request->message;
            $inquiry->save();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'message' => $request->message,
            ];

            $business_name = null;

            //  $view = view('frontend.emails.contact_mail');
            //  dd($view->render());
            $email_user = $request->email;
            Mail::send(
                'frontend.emails.user_query',
                ['data' => $data],

                function ($message) use ($email_user) {

                    $message
                        ->to($email_user)->subject('Query');
                }
            );


            $email_admin = 'djoy62471@gmail.com';
            Mail::send(
                'frontend.emails.contact_mail',
                ['data' => $data],

                function ($message) use ($email_admin) {

                    $message
                        ->to($email_admin)->subject('Query');
                }
            );


            return response()->json([
                'status' => 200,
                'message' => 'Your Query has been sent successfully!'
            ]);
        }
    }



    public function registeruser(Request $request)
    {
        // dd($request->all());

        $validation = [
            'business_license_copy' => 'required|max:5000000',
            'industry_id' => 'required',
            'business_license' => 'required|max:200',
            'business_information' => 'required',
            'confirmed' => 'required:with|same:password',
            'password' => ['required', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email|max:100',
            'last_name' => 'required|max:35',
            'first_name' => 'required|max:35'
        ];

        if ($request->industry_id == 0) {
            $validation['industry_name'] = 'required';
        }

        $message = [
            'industry_name.required' => 'The business name field is required.',
        ];

        $validator = Validator::make($request->all(), $validation, $message);

        if (Auth::check() && Auth::user()->role  == 1) {
            return response()->json([
                'status' => 419,
                'message' => 'You are logged in as admin please logout first ! '
            ]);
        }

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }

        // if ($request->industry_id == 0) {
        //     $business_name = $request->industry_name;
        //     $industry_id = null;
        // } else {
        //     $business_name = null;
        //     $industry_id = $request->industry_id;
        // }
        // $user = new User();
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->slug = Str::slug($request->first_name . ' ' . $request->last_name, "-");
        // $user->name = $request->first_name . ' ' . $request->last_name;
        // $user->email = $request->email;
        // $user->date_of_birth = $request->date_of_birth;
        // $user->password = Hash::make($request->password);
        // $user->industry_id = $industry_id;
        // $user->business_name = $business_name;
        // $user->business_license = $request->business_license;
        // $user->business_information = $request->business_information;
        // $user->role = 2;
        // $user->status = 0;
        // if ($request->business_license_copy) {
        //     $filename = time() . '.' . $request->business_license_copy->extension();
        //     $request->business_license_copy->move(public_path('business_licenses'), $filename);
        //     $user->business_license_copy = $filename;
        // }

        // $data = [
        //     'name' => $request->first_name,
        // ];
        // $email_user = $request->email;
        // Mail::send(
        //     'frontend.emails.user_email',
        //     ['data' => $data],
        //     function ($message) use ($email_user) {
        //         $message
        //             ->to($email_user)->subject('Welcome');
        //     }
        // );
        // $user->save();

        // return response()->json([
        //     'status' => 200,
        //     'message' => 'Account created successfully !'
        // ]);

        // if ($request->business_license_copy) {
        //     $filename = time() . '.' . $request->business_license_copy->extension();
        //     $request->business_license_copy->move(public_path('business_licenses'), $filename);
        //     $image = $filename;
        // }


        $image = '';
        if ($request->hasFile('business_license_copy')) {
            $file = $request->file('business_license_copy');
            $originalName = $file->getClientOriginalName();
            $file->move(public_path('business_licenses'), $originalName);
            $image = $originalName;
        }

        $user = $request->all();
        $user['business_license_copy'] = $image;
        Session::put('signup', $user);
        $user_register = session()->get('signup');
        $package_id = $request->package_id;
        // $package_id = session()->get('package_id');
        // session()->forget('package_id');
        return response()->json([
            'status' => 100,
            'message' => 'Account created successfully !',
            'user_register' => $user_register,
            'package_id' => $package_id

        ]);
        // session()->put('success', 'Account created successfully');
    }

    public function userlogin(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'password' => "required",
            'email' => "required|regex:/(.+)@(.+)\.(.+)/i|max:100",

        ]);

        if (Auth::check() && Auth::user()->role == 1) {
            return response()->json([
                'status' => 419,
                'message' => 'You are logged in as admin please logout first ! '
            ]);
        }
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $credentials = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1,
                'role' => 2,
            ]);


            $user_status = User::where('email', $request->email)->first();
            if (User::where('email', $request->email)->exists()) {
                if ($credentials) {
                    if (Auth::check() && Auth::user()->role == 2) {
                        return response()->json([
                            'status' => 200,
                            'message' => 'Login Successfully !'
                        ]);
                    } else {
                        return response()->json([
                            'status' => 305,
                            'message' => 'You are not allowed to login here !'
                        ]);
                    }
                }
                if ($user_status->status == 0) {
                    return response()->json([
                        'status' => 205,
                        'message' => 'Your account is not approve from admin side !'
                    ]);
                }
                if ($user_status->status == 2) {
                    return response()->json([
                        'status' => 210,
                        'message' => 'Your account has been suspended please contact admin!'
                    ]);
                } else {
                    return response()->json([
                        'status' => 300,
                        'message' => 'Invalid Credentials !'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'You are not registered in Next Client !'
                ]);
            }
        }
    }

    public function userlogout(Request $request)
    {

        Session::flush();
        Auth::logout();
        return redirect()->route('/')->with('logout');
    }

    // forget Password work
    public function forget(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|regex:/(.+)@(.+)\.(.+)/i|max:100",
        ]);

        if (Auth::check() && Auth::user()->role == 1) {
            return response()->json([
                'status' => 419,
                'message' => 'You are logged in as admin please logout first !'
            ]);
        }



        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }

        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if ($user->status == 0) {
                return response()->json([
                    'status' => 305,
                    'message' => 'Your account is not approve from admin side !'
                ]);
            }
        }


        $token = Str::random(64);
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        if (!empty($user)) {
            $check_admin = User::where('email', $request->email)->first();
            if ($check_admin->role == 1) {
                return response()->json([
                    'status' => 306,
                    'message' => 'You can not reset your password from here !'
                ]);
            }

            $data = [
                'email' => $request->email,
                'name' => $user->name,
            ];
            $email_user = $request->email;
            Mail::send(
                'frontend.emails.reset_mail',
                ['token' => $token, 'data' => $data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user)->subject('Reset Password');
                }
            );
            return response()->json([
                'status' => 200,
                'message' => 'We have sent you an email to reset password !'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User with this email does not exist'
            ]);
        }
    }

    public function verifyemail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|regex:/(.+)@(.+)\.(.+)/i|max:100",
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }
        $user = User::where('email', $request->email)->first();

        $token = Str::random(64);
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        if (!empty($user)) {
            $data = [
                'email' => $request->email,
                'name' => $user->name,
            ];
            $email_user = $request->email;
            Mail::send(
                'frontend.emails.reset_mail',
                ['token' => $token, 'data' => $data],
                function ($message) use ($email_user) {
                    $message
                        ->to($email_user, 'Reset Password')->subject('Reset Password');
                }
            );
            return response()->json([
                'status' => 200,
                'message' => 'We have sent you an email to reset password !'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User with this email does not exist'
            ]);
        }
    }


    // home page search

    public function homesearch(Request $request)
    {

        if (Auth::check() && Auth::user()->role == 1) {
            return back()->with('admin', 'You are logged in as admin please logout first!');
        }
        if (Auth::id()) {
            $customer_points = PackageSubscription::where('user_id', Auth::id())->first();
            if (!empty($customer_points)) {
                $points = $customer_points->package_points;
            }
        }

        //  dd('here');

        if (empty($request->search)) {
            return redirect()->route('home')->with('search', 'Please enter at least one field to search');
        } else {
            $customers = Review::where(
                'first_name',
                'LIKE',
                '%' . $request->search . '%'
            )->where('status', 1)->orWhere(
                'last_name',
                'LIKE',
                '%' . $request->search . '%'
            )->where('status', 1)->orWhere(
                'address',
                'LIKE',
                '%' . $request->search . '%'
            )->where('status', 1)->orWhere(
                'contact',
                'LIKE',
                '%' . $request->search . '%'
            )->where('status', 1)->orWhere(
                'email',
                'LIKE',
                '%' . $request->search . '%'
            )->where('status', 1)->get();
            return view('frontend.search-results', get_defined_vars());
        }
    }
}
