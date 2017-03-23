<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('currencies')->insert([
            'name' => 'Dólares',
            'iso_2' => 'us',
            'iso_3' => 'USD',
            'symbol' => '$'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Pesos Uruguayos',
            'iso_2' => 'uy',
            'iso_3' => 'UYU',
            'symbol' => '$'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Pesos Argentinos',
            'iso_2' => 'ar',
            'iso_3' => 'ARS',
            'symbol' => '$'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Reales',
            'iso_2' => 'br',
            'iso_3' => 'BRL',
            'symbol' => 'R$'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Pesos Mexicanos',
            'iso_2' => 'mx',
            'iso_3' => 'MXN',
            'symbol' => '$'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Guaraníes',
            'iso_2' => 'py',
            'iso_3' => 'PYG',
            'symbol' => '₲'
        ]);

        DB::table('currencies')->insert([
            'name' => 'Soles',
            'iso_2' => 'pe',
            'iso_3' => 'PEN',
            'symbol' => 'S/'
        ]);

    }
}
