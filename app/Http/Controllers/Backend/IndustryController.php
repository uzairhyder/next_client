<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BackendModels\IndustriesName;
use App\Models\BackendModels\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    //
    public function index()
    {
        $industries = Industry::all();
        return view('admin_dashboard.industries.index', compact('industries'));
    }

    public function industry_create()
    {
        return view('admin_dashboard.industries.create');
    }

    public function industry_add(Request $request)
    {
        $request->validate([
            'industry_type' => 'required|max:200|string',
        ]);

        $industry_type = new Industry();
        $industry_type->industry_type = $request->industry_type;
        $industry_type->status = 1;
        $industry_type->save();
        $notification = array('message' => 'Industry Record Inserted Successfully! ', 'alert-type' => 'success');
        return redirect()->route('industry-index')->with($notification);
    }

    public function industry_edit($id)
    {
        $industries = Industry::find($id);
        return view('admin_dashboard.industries.edit', compact('industries'));
    }

    public function industry_update(Request $request, $id)
    {
        $industries = Industry::find($id);
        $industries->industry_type = $request->industry_type;
        $industries->update();

        $notification = array('message' => 'Industry Record Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('industry-index')->with($notification);
    }

    public function status(Request $request, $id)
    {
        $industry_status = Industry::find($id);
        if ($industry_status->status == 0) {
            $industry_status->status = 1;
        } elseif ($industry_status->status == 1) {
            $industry_status->status = 0;
        }
        $industry_status->save();
        $notification = array('message' => 'Industry Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('industry-index')->with($notification);
    }

    //    public function delete(Request $request){
    //         $id = $request->id;
    //         $industry = Industry::where('id', $id)->first();
    //         $industry->delete();
    //         return response()->json(['status'=>'200']);

    //     }



}
