<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Brand extends FormRequest
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
    public function rules()
    {
        return [

            'brand_name'=>'required|max:50',
            'main_category_id' => 'required',
            'parent_category_id' => 'required',
        ];
    }

    public function messages()
    {
            return[
                'brand_name.required' => 'Brand Name Field is required',
                'main_category_id.required' => 'Main Category Field is required',
                'parent_category_id.required' => 'Parent Category Field is required',
            ];
    }
}
