<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_order_items', function (Blueprint $table) {
            $table->integer('production_order_id')->unsigned(); #fk 
            $table->integer('inventory_id')->unsigned(); #fk
            $table->double('input_quantity');
            ##$table->timestamps();


            $table->foreign('production_order_id')->references('production_order_id')->on('production_orders');
            $table->foreign('inventory_id')->references('inventory_id')->on('inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_order_items');
    }
}
