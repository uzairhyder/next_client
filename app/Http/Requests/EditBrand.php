<?php

namespace App\Http\Requests;

use App\Models\BackendModels\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditBrand extends FormRequest
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
        $brand_id = $request->input('brand_id');
        $brand = Brand::find($brand_id);
        return [
            'id' => 'required,'.$brand->id,
            'brand_name'=>'required|max:50,'.$brand->id,
            'main_category_id' => 'required',
            'parent_category_id' => 'required',
        ];
    }

    public function messages()
    {
            return[
                'brand_name.required' => 'Brand Name Field is required',
                'main_category_id.required' => 'Main Category Field is required',
                'parent_category_id' => 'Parent Category Field is required',
            ];
    }
}
