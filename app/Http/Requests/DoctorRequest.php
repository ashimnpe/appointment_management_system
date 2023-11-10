<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $doctor = $this->route('doctor');
        // dd($doctor);
        if ($this->isMethod('PUT')) {
            return [
                'first_name' => 'required|string',
                'middle_name' => 'nullable|string',
                'last_name' => 'required|string',
                'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => [
                    'required',
                    Rule::unique('doctors')->ignore($doctor),
                ],
                'license_no' => 'required|integer',
                'nepali_dob' => 'required',
                'english_dob' => 'required',
                'specialization' => 'required|string',
                'province' => 'required|string',
                'district' => 'required|string',
                'municipality' => 'required|string',
                'ward' => 'integer',
                'city' => 'required|string',
                'tole' => 'required|string',
                'contact' => 'required',
                'role' => 'required',
                'gender' => 'required',
                'status' => 'required',

                'level' => 'required',
                'institution' => 'required',
                'completion_date' => 'required',
                'adcompletion_date' => 'required',
                'board' => 'required',
                'marks' => 'required',

                'organization_name' => 'required',
                'position' => 'required',
                'job_description' => 'required|max:255',
                'start_date' => 'required',
                'end_date' => 'required',
            ];
        }
        return [
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'license_no' => 'required|integer',
            'nepali_dob'=> 'required',
            'english_dob'=> 'required',
            'specialization'=> 'required|string',
            'province'=> 'required|string',
            'district'=> 'required|string',
            'municipality'=> 'required|string',
            'ward'=> 'integer',
            'city'=> 'required|string',
            'tole'=> 'required|string',
            'contact'=> 'required',
            'role' => 'required',
            'gender' => 'required',
            'status' => 'required',

            'level' => 'required',
            'institution' => 'required',
            'completion_date' => 'required',
            'adcompletion_date' => 'required',
            'board' => 'required',
            'marks' => 'required',

            'organization_name' => 'required|',
            'position' => 'required|',
            'job_description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
}

    // old request for doctor
    // $rules = [
    //     'first_name' => 'required|string',
    //     'middle_name' => 'nullable|string',
    //     'last_name' => 'required|string',
    //     'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
    //     'email' => 'required|email|unique:users',
    //     'password' => 'required|confirmed',
    //     'license_no' => 'required|integer',
    //     'nepali_dob'=> 'required',
    //     'english_dob'=> 'required',
    //     'specialization'=> 'required|string',
    //     'province'=> 'required|string',
    //     'district'=> 'required|string',
    //     'municipality'=> 'required|string',
    //     'ward'=> 'integer|string',
    //     'city'=> 'required|string',
    //     'tole'=> 'required|string',
    //     'contact'=> 'required|integer',
    //     'role' => 'required',
    //     'gender' => 'required',
    //     'status' => 'required',
    //     'level' => 'required',
    //     'institution' => 'required|string',
    //     'completion_date' => 'required',
    //     'board' => 'required|string',
    //     'marks' => 'required|string',
    //     'organization_name' => 'required|string',
    //     'position' => 'required|string',
    //     'job_description' => 'required|string',
    //     'start_date' => 'required',
    //     'end_date' => 'required',
    // ];

    // if (!$this->isMethod('PUT')) {
    //     // Remove the 'password' rule for non-POST requests (editing)
    //     // unset($rules['password']);
    //     unset($rules['image']);
    // }

    // return $rules;

