<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalCaseRequest extends FormRequest
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
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'img' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Medical Case name is required',
            'name.string' => 'Medical Case name must be a string',
            'name_ar.required' => 'Arabic name is required',
            'name_ar.string' => 'Arabic name must be a string',
        ];
    }
}
