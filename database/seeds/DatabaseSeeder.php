<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(InvoiceCategoriesTableSeeder::class);
        $this->call(InvoicePaymentMethodsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
