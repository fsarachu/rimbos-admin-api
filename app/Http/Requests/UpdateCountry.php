<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountry extends FormRequest
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
        $country_id = $this->route('country')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'iso_2' => [
                'required',
                'string',
                'max:2',
                'unique:countries,iso_2,'.$country_id,
            ],
            'iso_3' => [
                'required',
                'string',
                'max:3',
                'unique:countries,iso_3,'.$country_id,
            ]
        ];
    }
}
