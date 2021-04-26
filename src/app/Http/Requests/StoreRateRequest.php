<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'minimum_price' => 'required|numeric',
            'km_price' => 'required|numeric',
            'minute_price' => 'required|numeric',
            'free_km_quantity' => 'required|integer',
            'free_minunte_quantity' => 'required|integer'
        ];
    }
}
