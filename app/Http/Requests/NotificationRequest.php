<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'body' => 'required|string',
            'body_ar' => 'required|string',
            'img' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Notification title is required',
            'title.string' => 'Notification title must be a string',
            'img.required' => 'You must upload an image',
            'title_ar.required' => 'Arabic name is required',
            'title_ar.string' => 'Arabic name must be a string',
            'body.required' => 'Notification body is required',
            'body.string' => 'Notification body must be a string',
            'body_ar.required' => 'Arabic body is required',
            'body_ar.string' => 'Arabic body must be a string',
        ];
    }
}
