<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name', 'iso_2', 'iso_3', 'symbol'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
