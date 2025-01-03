<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BackendModels\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(){
        $inquiries = Inquiry::get();
        return view('admin_dashboard.inquiry.index',compact('inquiries'));
    }

    public function deletecontact(Request $request){
        // return $request->all();
        $id = $request->id;
        $contact = Inquiry::where('id',$id)->first();
        // return $contact;
        $contact->delete();
        $notification = array('message' => 'Inquiry Deleted Successfully ! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function showcontact($id){
        $detail = Inquiry::where('id',$id)->first();
        if(!empty($detail)){
            return view('admin_dashboard.inquiry.detail',compact('detail'));
        }else {
            return view('frontend.404');
        }
    }
}