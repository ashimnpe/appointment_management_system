<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'level' => 'required',
            'institution' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'board' => 'required|string',
            'marks' => 'required|string'
        ];
    }
}
