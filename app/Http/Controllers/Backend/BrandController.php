<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Brand as RequestsBrand;
use App\Http\Requests\EditBrand as RequestsEditBrand;
use App\Models\BackendModels\Brand;
use App\Models\BackendModels\MainCategory;
use App\Models\BackendModels\ParentCategory;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin_dashboard.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = ParentCategory::where('status',1)->get();
        return view('admin_dashboard.brands.create',compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsBrand $request)
    {
        $brand = $request->validated();
        $brand = new Brand();
        $brand->parent_category_id = $request->parent_category_id;
        $brand->main_category_id = $request->main_category_id;
        $brand->brand_name = $request->brand_name;
        $brand->slug = Str::slug($request->brand_name,"-");
        $brand->status = 1;
        $brand->save();
        $notification = array('message' => 'Brand Added Successfully! ', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::find($id);
        $parent_categories = ParentCategory::where('status',1)->get();
        return view('admin_dashboard.brands.edit',compact('brands','parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEditBrand $request, $id)
    {
        $brand = $request->validated();
        $brand = Brand::find($id);
        $brand->parent_category_id = $request->parent_category_id;
        $brand->main_category_id = $request->main_category_id;
        $brand->brand_name = $request->brand_name;
        $brand->slug = Str::slug($request->brand_name,"-");
        $brand->save();
        $notification = array('message' => 'Brand Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id = $request->id;
        Brand::where('id', $id)->delete();
        return response()->json(['status'=>'200']);
    }
    public function status(Request $request,$id){
        $user_status = Brand::find($id);
        if($user_status->status == 0){
            $user_status->status =1;
        }else {
            $user_status->status =0;
        }
        $user_status->save();
        $notification = array('message' => 'Brand Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }

    public function maincategory(Request $request){
        $maincategory = MainCategory::where('parent_category_id',$request->id)->get();
        if(count($maincategory) > 0)
        {
            return response()->json([
                'status' => 200,
                'maincategory'=> $maincategory
            ]);
        }else{
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function brand(Request $request){
        // dd('here');
        // dd($request->id);
        $brand = Brand::where('parent_category_id',$request->id)->get();
        if(count($brand) > 0)
        {
            return response()->json([
                'status' => 200,
                'brand'=> $brand
            ]);
        }else{
            return response()->json([
                'status' => 404,
            ]);
        }
    }
}
