<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPORequset extends FormRequest
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
            'region_id' => 'required',
            'territory_id' => 'required',
            'po_number' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'region_id.required' => 'Region must be selected',
            'territory_id.required' => 'Territory must be selected',
            'po_number.required' => 'PO Number is required',
            'from_date.required' => 'From date is required',
            'to_date.required' => 'To date is required',
        ];
    }
}
