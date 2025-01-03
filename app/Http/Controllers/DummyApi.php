<?php

namespace App\Http\Controllers;

use App\Models\BackendModels\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;

class DummyApi extends Controller
{
    public function users_data($id=null){
        $show = $id?User::find($id):User::all();
        // $show = User::all();
        return $show;
    }
    public function byname_users_data($name=null){
        $show = $name?User::where('name',$name)->first():User::all();
        // $show = User::all();
        return $show;
    }
    public function users_inquiry(Request $request){
        $add_data = new Inquiry();
        $add_data->name = $request->name;
        $add_data->email = $request->email;
        $add_data->contact = $request->contact;
        $add_data->message = $request->message;
        $add_data->save();
        // return $add_data;
        return ["Inserted"=>"done"];


    }
    public function users_inquiry_detele($id){
        $add_data = Inquiry::find($id);
        $add_data->delete();
        // return $add_data;
        return ["Inserted"=>"data deleted"];
    }
    public function seacrh_data(Request $request,$searchkey=null){
        $keyword = $searchkey;
        $users = $keyword?User::where('name', 'like', '%' . $keyword . '%')->get():User::all();
        if ($users->isEmpty()) {
            return 'no result found';
        } else {
            return $users;
        }
    }
}
