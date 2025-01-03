<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermsCondition extends FormRequest
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
            //
            'description'=>'required',
            'title'=>'required|max:100',
        ];
    }

    public function messages()
    {
            return[
                'description.required' => 'Description field is required',
                'title.required' => 'Title field is required',
            ];
    }
}