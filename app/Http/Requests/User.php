<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
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

            'confirm_password' => 'required|same:password',
            'password' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ],
            'business_license_copy' => 'required|max:5000000',
            'business_information' => 'required',
            'business_license' => 'required|max:200',
            'industry_id' => 'required',
            'industry_name' => 'required_if:industry_id,0',
            // 'date_of_birth' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email|max:100',
            'last_name' => 'required|max:35',
            'first_name' => 'required|max:35',

        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Password Field is required',
            'confirm_password.required' => 'Confirm Password Field is required',
            'business_license_copy.required' => 'Business License Copy Field is required',
            'business_information.required' => 'Business Information Field is required',
            'business_license.required' => 'Business License Field is required',
            'industry_id.required' => 'Business Name Field is required',
            'industry_name.required_if' => 'Business Name Field is required',
            // 'date_of_birth.required' => 'Date of birth Field is required',
            'email.required' => 'Email Field is required',
            'last_name.required' => 'Last Name Field is required',
            'first_name.required' => 'First Name Field is required',
        ];
    }
}
