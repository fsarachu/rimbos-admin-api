<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurvey extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'question' => [
                'required',
                'string',
                'max:255',
            ],
            'extra_comments_title' => [
                'present',
                'nullable',
                'string',
                'max:255',
            ],
            'event_id' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
