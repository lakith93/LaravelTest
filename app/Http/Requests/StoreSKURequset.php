<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSKURequset extends FormRequest
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
            'code' => 'required|unique:regions',
            'name' => 'required',
            'mrp' => 'required',
            'dis_price' => 'required',
            'weight' => 'required',
            'volume' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'SKU Code is required',
            'name.required' => 'SKU Name is required',
            'mrp.required' => 'MRP is required',
            'dis_price.required' => 'Distributor Price is required',
            'weight.required' => 'Weight is required',
            'volume.required' => 'Volume is required',
        ];
    }
}
