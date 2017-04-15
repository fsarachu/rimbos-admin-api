<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoice extends FormRequest
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
            'date' => [
                'required',
                'date_format:"Y-m-d"',
            ],
            'trip' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'present',
                'nullable',
                'string',
                'max:255',
            ],
            'business_name' => [
                'required',
                'string',
                'max:255',
            ],
            'invoice_number' => [
                'required',
                'string',
                'max:255',
            ],
            'amount_in_original_currency' => [
                'required',
                'numeric',
            ],
            'one_dollar_rate' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'include_rut' => [
                'required',
                'boolean',
            ],
            'assign_anii' => [
                'required',
                'boolean',
            ],
            'personal_spending' => [
                'required',
                'boolean',
            ],
            'category_id' => [
                'required',
                'exists:invoice_categories,id',
            ],
            'country_id' => [
                'required',
                'exists:countries,id',
            ],
            'currency_id' => [
                'required',
                'exists:currencies,id',
            ],
            'payment_method_id' => [
                'required',
                'exists:invoice_payment_methods,id',
            ],
        ];
    }
}
