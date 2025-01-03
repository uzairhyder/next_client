<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BackendModels\Package;
use App\Http\Requests\Package as RequestsPackage;
use App\Http\Requests\EditPackage as RequestsEditPackage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::get();
        return view('admin_dashboard.packages.index',compact('packages'));
    }
    public function create(){
        return view('admin_dashboard.packages.create');
    }
    public function store(RequestsPackage $request){
        $validated = $request->validated();
        Package::create($validated);
        $notification = array('message' => 'Package Created Successfully! ', 'alert-type' => 'success');
        return redirect()->route('package.index')->with($notification);
    }
    public function  edit($id){
        $packages = Package::find($id);
        if(!empty($packages)){
            return view('admin_dashboard.packages.edit',compact('packages'));
        }else{
            return view('frontend.404');
        }
    }

    public function show( Request $request, $id)
    {
        $detail = Package::where('id',$id)->first();
        if(!empty($detail)){
            return view('admin_dashboard.packages.detail',get_defined_vars());
        }else {
            return view('frontend.404');
        }
    }
    public function update(RequestsEditPackage $request ,$id){
        // return $request->all();
        $validated = $request->validated();
        $packages = Package::find($id);

        // for extracting integers from string
        // $geeks = $request->description;
        // preg_match_all('!\d+!', $geeks, $matches);
        // foreach($matches as $values){
        //      return $values;
        // }
        if($request->has('image')){
                $old_image_path = public_path() . '/images/' . $packages->image;
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $image->move(public_path('images'), $filename);
                $packages->image = $filename;
                if (File::exists($old_image_path)){
                File::delete($old_image_path);
            }
        }

        $packages->update($request->all());
        $notification = array('message' => 'Package Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('package.index')->with($notification);
    }
    public function destroy(Request $request,$id){
        $id = $request->id;
        Package::where('id', $id)->delete();
        return response()->json(['status'=>'200']);
    }
    public function status(Request $request,$id){
        $user_status = Package::find($id);
        if($user_status->status == 0){
            $user_status->status =1;
        }else {
            $user_status->status =0;
        }
        $user_status->save();
        $notification = array('message' => 'Package Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('package.index')->with($notification);
    }

}
