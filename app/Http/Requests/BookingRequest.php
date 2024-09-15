<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'nullable|unique:users',
            'contact' => 'required',
            'address' => 'required',
            'dob_bs' => 'required',
            'dob_ad' => 'required',
            'gender' => 'required',
            'remarks' => 'nullable',
            // 'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
