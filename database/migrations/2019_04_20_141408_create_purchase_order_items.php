<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->integer('purchase_order_id')->unsigned(); #fk
            $table->integer('inventory_id')->unsigned(); #fk
            $table->integer('qty');
            ##$table->timestamps();
            
            $table->foreign('purchase_order_id')->references('purchase_order_id')->on('purchase_orders');
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
        Schema::dropIfExists('purchase_order_items');
    }
}
