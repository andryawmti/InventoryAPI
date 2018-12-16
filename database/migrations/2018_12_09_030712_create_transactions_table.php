<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaction_category_id')->index();
            $table->unsignedInteger('customer_id')->index()->nullable();
            $table->unsignedInteger('distributor_id')->index()->nullable();
            $table->string('delivery_cost', 30);
            $table->string('sub_total', 30);
            $table->string('total', 30);
            $table->string('status', 25);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->foreign('transaction_category_id')
                ->references('id')
                ->on('transaction_categories');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->foreign('distributor_id')
                ->references('id')
                ->on('distributors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
