<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceCategory extends Model
{
    protected $fillable = ['name'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
