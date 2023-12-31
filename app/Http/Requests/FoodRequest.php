<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
            'cat_id' => 'numeric|min:1',
            'price' => 'required|numeric',
            'img' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'Food name is required',
            'name.string' => 'Food name must be a string',
            'img.required' => 'You must upload an image',
            'name_ar.required' => 'Arabic name is required',
            'name_ar.string' => 'Arabic name must be a string',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'cat_id.min' => 'You must select a category',
        ];
    }
}
