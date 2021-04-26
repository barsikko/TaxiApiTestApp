<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
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
            'rate_id' => 'required|integer',
            'from_address' => 'max:255',
            'to_address' => 'max:255',
            'from_coordinates' => 'required|max:100|regex:/^\d{2,3}\.\d+,\d{2,3}\.\d+$/',
            'to_coordinates' => 'required|max:100|regex:/^\d{2,3}\.\d+,\d{2,3}\.\d+$/',
        ];
    }
}
