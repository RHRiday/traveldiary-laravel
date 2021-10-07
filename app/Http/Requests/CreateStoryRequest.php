<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoryRequest extends FormRequest
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
            'title' => ['required',],
            'story' => ['required',],
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png|max:2048',
        ];
    }

    /**
     * Show the validation message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.*.max' => 'Some (or one) of your images may be larger than 2048 KB',
        ];
    }
}
