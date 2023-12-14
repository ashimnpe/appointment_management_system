<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name'=>'required',
            'order'=>'required|integer',
            'type'=>'required',
            'module_id'=>'nullable',
            'page_id'=>'nullable',
            'external_link'=>'nullable',
            'status'=>'nullable'
        ];
    }
}
