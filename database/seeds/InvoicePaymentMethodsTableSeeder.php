<?php

use Illuminate\Database\Seeder;

class InvoicePaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Efectivo (Moneda Local)'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Efectivo (U$S)'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Tarjeta de crédito MD'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Tarjeta de crédito MD LUPS'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Tarjeta de débito ITAU'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Banco BROU'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Banco ITAU'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Paypal'
        ]);

        DB::table('invoice_payment_methods')->insert([
            'name' => 'Otro'
        ]);

    }
}
