<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnsignedConstraintsToFkColumnsOnInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->integer('country_id')->unsigned()->change();
            $table->integer('category_id')->unsigned()->change();
            $table->integer('payment_method_id')->unsigned()->change();
            $table->integer('currency_id')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->integer('country_id')->change();
            $table->integer('category_id')->change();
            $table->integer('payment_method_id')->change();
            $table->integer('currency_id')->change();
        });
    }
}
