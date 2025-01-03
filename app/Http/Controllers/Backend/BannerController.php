<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Banner as RequestsBanner;
use App\Http\Requests\EditBanner as RequestsEditBanner;
use App\Models\BackendModels\Banner;
use App\Models\BackendModels\Page;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners  = Banner::get();
        return view('admin_dashboard.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages  = Page::where('status',1)->get();
        return view('admin_dashboard.banners.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsBanner $request)
    {
        // return $request->all();
        $banners = $request->validated();
        $banners = new Banner();
        $banners->page_id = $request->page_id;
        $banners->title1 = $request->title1;
        $banners->title2 = $request->title2;
        $banners->title3 = $request->title3;
        $banners->title4 = $request->title4;
        $banners->title5 = $request->title5;
        $banners->title6 = $request->title6;
        $banners->title7 = $request->title7;
        $banners->page_id = $request->page_id;
        if($request->banner_image){
        $filename = time() . '.' . $request->banner_image->extension();
        $request->banner_image->move(public_path('banner'), $filename);
        $banners->banner_image = $filename;
        }
        // $images = [];
        // if($request->hasfile('banner_image'))
        //  {
        //     foreach($request->file('banner_image') as $file)
        //     {
        //         $name = time().rand(1,100).'.'.$file->extension();
        //         $file->move(public_path('banner'), $name);
        //         $images[] = $name;
        //     }
        // }
        // $banner->banner_image = json_encode($images);
        $banners->save();
        $notification = array('message' => 'Banner Image Added Successfully! ', 'alert-type' => 'success');
        return redirect()->route('page-content.index')->with($notification);
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
        $pages  = Page::where('status',1)->get();
        $banners = Banner::find($id);
        if(!empty($banners)){
            return view('admin_dashboard.banners.edit',compact('banners','pages'));
        }else{
            return view('frontend.404');
        }
        // return $banners;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEditBanner $request, $id)
    {
        // return $request->all();
        $banners = $request->validated();
        $banners = Banner::find($id);
        if ($request->hasFile('banner_image')) {
            File::delete(public_path('banner/'.$banners->banner_image));
        }
         if ($request->hasFile('video')) {
            File::delete(public_path('video/'.$banners->video));
         }
        // if($id==1){
            $banners->page_id = $request->page_id;
            $banners->title1 = $request->title1;
            $banners->title2 = $request->title2;
            $banners->title3 = $request->title3;
            $banners->title4 = $request->title4;
            $banners->title5 = $request->title5;
            $banners->title6 = $request->title6;
            $banners->title7 = $request->title7;
            $banners->page_id = $request->page_id;
            $banners->description = $request->description;
            if($request->banner_image){
                $filename = time() . '.' . $request->banner_image->extension();
                $request->banner_image->move(public_path('banner'), $filename);
                $banners->banner_image = $filename;
            }
             if($request->video){
                $filename = time() . '.' . $request->video->extension();
                $request->video->move(public_path('video'), $filename);
                $banners->video = $filename;
             }
        // }

        $banners->save();
        $notification = array('message' => 'Page Content Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('page-content.index')->with($notification);
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
        $banners =  Banner::where('id', $id)->first();
            File::delete(public_path('banner/'.$request->banner_image));

        $banners->delete();
        return response()->json(['status'=>'200']);
    }

    public function status(Request $request,$id){
        $user_status = Banner::find($id);
        if($user_status->status == 0){
            $user_status->status =1;
        }else {
            $user_status->status =0;
        }
        $user_status->save();
        $notification = array('message' => 'Banner Image Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('page-content.index')->with($notification);
    }
}
