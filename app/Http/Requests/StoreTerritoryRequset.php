<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerritoryRequset extends FormRequest
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
            'region_id' => 'required',
            'code' => 'required|unique:regions',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'zone_id.required' => 'required',
            'region_id.required' => 'required',
            'code.required' => 'Territory Code is required',
            'name.required' => 'Territory Name is required'
        ];
    }
}
