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
            $table->integer('country_id');
            $table->text('description');
            $table->string('business_name');
            $table->string('invoice_number');
            $table->integer('category_id');
            $table->integer('payment_method_id');
            $table->integer('currency_id');
            $table->decimal('amount_in_original_currency');
            $table->decimal('one_dollar_rate');
            $table->decimal('amount_in_dollars');
            $table->decimal('actual_paid_amount');
            $table->string('image_url');
            $table->boolean('include_rut')->default(false);
            $table->boolean('assign_anii')->default(false);
            $table->boolean('personal_spending')->default(false);
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
