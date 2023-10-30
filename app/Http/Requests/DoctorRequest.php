<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Contracts\Validation\Rule;
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
        // $doctors = $this->route('id');
        $rules = [
            'first_name' => 'required|string',
            'middle_name' => 'string',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'license_no' => 'required|integer',
            'nepali_dob'=> 'required|date',
            'english_dob'=> 'required|date',
            'department'=> 'required|string',
            'specialization'=> 'required|string',
            'province'=> 'required|string',
            'district'=> 'required|string',
            'municipality'=> 'required|string',
            'ward'=> 'integer|string',
            'city'=> 'required|string',
            'tole'=> 'required|string',
            'contact'=> 'required|integer',
            'role' => 'required|string',
            'gender' => 'required',
            'status' => 'required',
        ];


        if (!$this->isMethod('post')) {
            // Remove the 'password' rule for non-POST requests (editing)
            unset($rules['password']);
            unset($rules['image']);
        }

        return $rules;

    }
}
