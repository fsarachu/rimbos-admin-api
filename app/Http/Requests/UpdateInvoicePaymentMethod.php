<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoicePaymentMethod extends FormRequest
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
        $method_id = $this->route('invoice_payment_method')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:invoice_payment_methods,name,' . $method_id,
            ],
        ];
    }
}
