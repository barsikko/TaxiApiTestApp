<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'brand' => 'max:255',
            'model' => 'max:255',
            'plate_number' => 'max:255',
            'color' => 'max:255',
            'manufacture_year' => 'date_format:Y',
        ];
    }
}
