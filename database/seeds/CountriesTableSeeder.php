<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->insert([
            'name' => 'Argentina',
            'iso_2' => 'ar',
            'iso_3' => 'ARG'
        ]);

        DB::table('countries')->insert([
            'name' => 'Bolivia',
            'iso_2' => 'bo',
            'iso_3' => 'BOL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Brasil',
            'iso_2' => 'br',
            'iso_3' => 'BRA'
        ]);

        DB::table('countries')->insert([
            'name' => 'Chile',
            'iso_2' => 'cl',
            'iso_3' => 'CHL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Colombia',
            'iso_2' => 'co',
            'iso_3' => 'COL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Costa Rica',
            'iso_2' => 'cr',
            'iso_3' => 'CRI'
        ]);

        DB::table('countries')->insert([
            'name' => 'Cuba',
            'iso_2' => 'cu',
            'iso_3' => 'CUB'
        ]);

        DB::table('countries')->insert([
            'name' => 'Ecuador',
            'iso_2' => 'ec',
            'iso_3' => 'ECU'
        ]);

        DB::table('countries')->insert([
            'name' => 'El Salvador',
            'iso_2' => 'sv',
            'iso_3' => 'SLV'
        ]);

        DB::table('countries')->insert([
            'name' => 'Guatemala',
            'iso_2' => 'gt',
            'iso_3' => 'GTM'
        ]);

        DB::table('countries')->insert([
            'name' => 'Haití',
            'iso_2' => 'ht',
            'iso_3' => 'HTI'
        ]);

        DB::table('countries')->insert([
            'name' => 'Honduras',
            'iso_2' => 'hn',
            'iso_3' => 'HND'
        ]);

        DB::table('countries')->insert([
            'name' => 'México',
            'iso_2' => 'mx',
            'iso_3' => 'MEX'
        ]);

        DB::table('countries')->insert([
            'name' => 'Nicaragua',
            'iso_2' => 'ni',
            'iso_3' => 'NIC'
        ]);

        DB::table('countries')->insert([
            'name' => 'Panamá',
            'iso_2' => 'pa',
            'iso_3' => 'PAN'
        ]);

        DB::table('countries')->insert([
            'name' => 'Paraguay',
            'iso_2' => 'py',
            'iso_3' => 'PRY'
        ]);

        DB::table('countries')->insert([
            'name' => 'Perú',
            'iso_2' => 'pe',
            'iso_3' => 'PER'
        ]);

        DB::table('countries')->insert([
            'name' => 'Puerto Rico',
            'iso_2' => 'pr',
            'iso_3' => 'PRI'
        ]);

        DB::table('countries')->insert([
            'name' => 'República Dominicana',
            'iso_2' => 'do',
            'iso_3' => 'DOM'
        ]);

        DB::table('countries')->insert([
            'name' => 'Uruguay',
            'iso_2' => 'uy',
            'iso_3' => 'URY'
        ]);

        DB::table('countries')->insert([
            'name' => 'Venezuela',
            'iso_2' => 've',
            'iso_3' => 'VEN'
        ]);

    }
}
