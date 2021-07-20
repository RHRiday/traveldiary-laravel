<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlaceRequest extends FormRequest
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
            'name' => ['required', ],
            'location' => ['required', ],
            'type' => ['required', ],
            'checkpoint' => ['required', ],
            'budget' => ['required', ],
            'description' => ['required', ],
            'direction' => ['required', ],
            'image' => ['required',],
            'image.*' => ['image'],
        ];
    }
}
