<?php

use Illuminate\Database\Seeder;

class InvoiceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('invoice_categories')->insert([
            'name' => 'Transporte'
        ]);

        DB::table('invoice_categories')->insert([
            'name' => 'Alimentos'
        ]);

        DB::table('invoice_categories')->insert([
            'name' => 'Alojamiento'
        ]);

        DB::table('invoice_categories')->insert([
            'name' => 'Servicios'
        ]);

        DB::table('invoice_categories')->insert([
            'name' => 'Promoción'
        ]);

        DB::table('invoice_categories')->insert([
            'name' => 'Otros'
        ]);

    }
}
