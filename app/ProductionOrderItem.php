<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrderItem extends Model
{
    // explictly defining table name
    protected $table = 'production_order_items';
    public $timestamps = false;
    protected $fillable = ['production_order_id', 'inventory_id', 'inputy_quantity'];

    #protected $primaryKey = null; #removed having an issue with seeding db

    public function productionOrder(){
        return $this->belongsTo('App\ProductionOrder', 'production_order_id', 'production_order_id');
    }

    public function inventory(){
        return $this->belongsTo('App\Inventory', 'inventory_id', 'inventory_id');
    }
}
