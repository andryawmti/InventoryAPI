<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id')->index();
            $table->unsignedInteger('unit_id')->index();
            $table->string('name', 150);
            $table->string('buy_price', 30);
            $table->string('sell_price', 30);
            $table->integer('stock');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories');
            $table->foreign('unit_id')
                ->references('id')
                ->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
