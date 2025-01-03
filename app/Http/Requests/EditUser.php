<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditUser extends FormRequest
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
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        return [
            'id' => 'required,' . $user->id,
            'password' => [
                'min:8',
                'nullable',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
            'confirm_password' => 'same:password',
            // 'business_license_copy' => 'max:5000000',
            'business_information' => 'required',
            'business_license' => 'required|max:200',
            'industry_id' => 'max:200',
            'industry_name' => 'required_if:industry_id,0',
            // 'date_of_birth' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'last_name' => 'required|max:35',
            'first_name' => 'required|max:35',
            // 'industry_name' => 'required_if:industry_id,0',

        ];
    }
    public function messages()
    {
        return [

            // 'business_license_copy.required' => 'Business License Copy Field is required',
            'business_information.required' => 'Business Information Field is required',
            'business_license.required' => 'Business License Field is required',
            'industry_id.required' => 'Business Name Field is required',
            'industry_name.required_if' => 'Business Name Field is required',
            // 'date_of_birth.required' => 'Date of birth Field is required',
            'email.required' => 'Email Field is required',
            'last_name.required' => 'Last Name Field is required',
            'first_name.required' => 'First Name Field is required',
            // 'industry_name.required_if' => 'The Business name field is required',
        ];
    }
}
