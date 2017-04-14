<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrency extends FormRequest
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
        $currency_id = $this->route('currency')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'iso_2' => [
                'required',
                'string',
                'max:2',
                'unique:countries,iso_2,' . $currency_id,
            ],
            'iso_3' => [
                'required',
                'string',
                'max:3',
                'unique:countries,iso_2,' . $currency_id,
            ],
            'symbol' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
