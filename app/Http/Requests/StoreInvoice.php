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
        return false;
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
            'country' => 'required|exists:countries,id',
            'description' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'invoice_number' => 'nullable|string|max:255',
            'category' => 'required|exists:categories,id',
            'payment_method' => 'required|exists:payment_methods,id',
            'currency' => 'required|exists:currencies,id',
            'amount_in_original_currency' => 'required|numeric',
            'one_dollar_rate' => 'required|numeric',
            'image' => 'image',
            'include_rut' => 'boolean',
            'assign_anii' => 'boolean',
            'personal_spending' => 'boolean'
        ];
    }
}
