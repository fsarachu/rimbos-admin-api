<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceCategory extends FormRequest
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
        $category_id = $this->route('invoice_category')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:invoice_categories,id,' . $category_id,
            ],
        ];
    }
}
