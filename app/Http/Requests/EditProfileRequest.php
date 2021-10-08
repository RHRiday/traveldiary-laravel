<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'password' => ['nullable', 'min:6', 'max:20'],
            'dp' => ['nullable', 'max:2048'],
            'cp' => ['nullable', 'max:2048'],
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
            'name.*' => 'A name should be between 3 to 255 characters',
            'password.*' => 'Password should be between 6 to 20 characters',
            'dp.max' => 'Profile image should not be larger than 2048 KB',
            'cp.max' => 'Cover should not be larger than 2048 KB',
        ];
    }
}
