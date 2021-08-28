<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZoneRequset extends FormRequest
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
            'code' => 'required|unique:zones',
            'long_des' => 'required',
            'short_des' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Zone Code is required',
            'long_des.required' => 'Zone Long Description is required',
            'short_des.required' => 'Zone Short Description is required'
        ];
    }
}
