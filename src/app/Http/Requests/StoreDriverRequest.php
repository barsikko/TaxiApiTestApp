<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'name' => 'required|max:100',
            'f_name' => 'required|max:100',
            'l_name' => 'max:100',
            'birth_day' => 'required|date_format:Y.m.d',
            'license_num' => 'required|max:255',
            'end_license_date' => 'required|date'
        ];
    }
}
