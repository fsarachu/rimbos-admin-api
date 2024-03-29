<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyAnswer extends FormRequest
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
            'rating' => [
                'required',
                'integer',
                'between:1,5'
            ],
            'extra_comments' => [
                'present',
                'nullable',
                'string',
                'max:255',
            ],
            'user_id' => [
                'present',
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
