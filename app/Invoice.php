<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'date',
        'trip',
        'description',
        'business_name',
        'invoice_number',
        'amount_in_original_currency',
        'one_dollar_rate',
        'amount_in_dollars',
        'actual_paid_amount',
        'include_rut',
        'assign_anii',
        'personal_spending',
        'category_id',
        'country_id',
        'currency_id',
        'payment_method_id',
        'user_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'date' => 'string',
        'trip' => 'string',
        'description' => 'string',
        'business_name' => 'string',
        'invoice_number' => 'string',
        'amount_in_original_currency' => 'float',
        'one_dollar_rate' => 'float',
        'amount_in_dollars' => 'float',
        'actual_paid_amount' => 'float',
        'image_url' => 'string',
        'include_rut' => 'bool',
        'assign_anii' => 'bool',
        'personal_spending' => 'bool',
        'category_id' => 'integer',
        'country_id' => 'integer',
        'currency_id' => 'integer',
        'payment_method_id' => 'integer',
        'user_id' => 'integer',
        'created_at' => 'string',
        'updated_at' => 'string',
    ];

    public function category()
    {
        return $this->belongsTo(InvoiceCategory::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(InvoicePaymentMethod::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
