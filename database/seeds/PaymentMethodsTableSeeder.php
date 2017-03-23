<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('payment_methods')->insert([
            'name' => 'Efectivo (Moneda Local)'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Efectivo (U$S)'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Tarjeta de crédito MD'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Tarjeta de crédito MD LUPS'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Tarjeta de débito ITAU'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Banco BROU'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Banco ITAU'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Paypal'
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Otro'
        ]);

    }
}
