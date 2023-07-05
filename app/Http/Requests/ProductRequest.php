<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'description' => 'required|string',
            'description_ar' => 'required|string',
            'cat_id' => 'numeric|min:1',
            'case_id' => 'array',
            'price' => 'required|numeric',
            'weight' => 'required|string',
            'quantity' => 'required|numeric',
            'img' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Product name is required',
            'name.string' => 'Product name must be a string',
            'name_ar.required' => 'Arabic name is required',
            'name_ar.string' => 'Arabic name must be a string',
            'img.required' => 'You must upload an image',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description_ar.required' => 'Arabic description is required',
            'description_ar.string' => 'Arabic description must be a string',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'cat_id.min' => 'You must select a category',
            'weight.required' => 'Price is required',
            'weight.numeric' => 'Price must be a number',
            'case_id.array' => 'You must choose only one medical case at least',
            'quantity.required' => 'Price is required',
            'quantity.numeric' => 'Price must be a number',
        ];
    }
}
