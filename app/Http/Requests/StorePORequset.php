<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePORequset extends FormRequest
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
            'territory_id' => 'required',
            'distributor_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'zone_id.required' => 'Zone must be selected',
            'region_id.required' => 'Region must be selected',
            'territory_id.required' => 'Territory must be selected',
            'distributor_id.required' => 'Distributor must be selected'
        ];
    }
}
