<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'iso_2', 'iso_3'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
