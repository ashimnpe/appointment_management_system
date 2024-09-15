<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = $this->route('user');
        if($this->method('PUT')){

            return [
                'name' => 'required|string',
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($user),
                ],
                'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'role' => 'required',
                'status' => 'required'
            ];
        }
        else{
            return [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|confirmed',
                'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'role' => 'required',
                'status' => 'required'
            ];
        }
    }

}
