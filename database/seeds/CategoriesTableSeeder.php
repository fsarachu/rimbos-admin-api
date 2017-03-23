<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'name' => 'Transporte'
        ]);

        DB::table('categories')->insert([
            'name' => 'Alimentos'
        ]);

        DB::table('categories')->insert([
            'name' => 'Alojamiento'
        ]);

        DB::table('categories')->insert([
            'name' => 'Servicios'
        ]);

        DB::table('categories')->insert([
            'name' => 'Promoción'
        ]);

        DB::table('categories')->insert([
            'name' => 'Otros'
        ]);

    }
}
