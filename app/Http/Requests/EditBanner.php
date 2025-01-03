<?php

namespace App\Http\Requests;

use App\Models\BackendModels\Banner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditBanner extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $banner_id = $request->input('banner_id');
        $banner = Banner::find($banner_id);
        return [
            //
            'id' =>'required,'.$banner->id,
            'banner_image'=>'mimes:jpeg,png,jpg,svg','max:3000',
            'title1' =>'max:150',
            'title2' =>'max:150',
            'title3' =>'max:1000',
            'title4' =>'max:150',
            'title5' =>'max:150',
            'title6' =>'max:150',
            'title7' =>'max:150',
            // 'page_id'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'banner_image.required' => 'Image  Field is required',
            // 'page_id.required'=> 'Page Name  Field is required',
        ];
    }
}
