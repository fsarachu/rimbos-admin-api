<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('trip');
            $table->string('description')->nullable();
            $table->string('business_name');
            $table->string('invoice_number');
            $table->decimal('amount_in_original_currency', 20, 2);
            $table->decimal('one_dollar_rate', 20, 2);
            $table->decimal('amount_in_dollars', 20, 2);
            $table->decimal('actual_paid_amount', 20, 2);
            $table->string('image_url', 2000)->nullable();
            $table->boolean('include_rut');
            $table->boolean('assign_anii');
            $table->boolean('personal_spending');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('currency_id')->unsigned()->index();
            $table->integer('payment_method_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
