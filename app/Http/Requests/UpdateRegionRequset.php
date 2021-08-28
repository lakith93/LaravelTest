<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegionRequset extends FormRequest
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
            'zone_id' => 'required',
            'code' => 'required',
            'name' => 'required|unique:regions'
        ];
    }

    public function messages()
    {
        return [
            'zone_id.required' => 'required',
            'code.required' => 'Region Code is required',
            'name.required' => 'Region Name is required'
        ];
    }
}
