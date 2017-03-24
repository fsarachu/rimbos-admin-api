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
            'date' => 'required|date_format:"Y-m-d"',
            'trip' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'description' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'invoice_number' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'currency_id' => 'required|exists:currencies,id',
            'amount_in_original_currency' => 'required|numeric',
            'one_dollar_rate' => 'required|numeric|min:0.01',
            'image' => 'image',
            'include_rut' => 'boolean',
            'assign_anii' => 'boolean',
            'personal_spending' => 'boolean'
        ];
    }
}
