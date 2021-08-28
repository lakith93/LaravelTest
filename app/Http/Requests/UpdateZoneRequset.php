<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateZoneRequset extends FormRequest
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
            'long_des' => 'required',
            'short_des' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'long_des.required' => 'Zone Long Description is required',
            'short_des.required' => 'Zone Short Description is required'
        ];
    }
}
