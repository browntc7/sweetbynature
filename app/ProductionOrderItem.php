<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrderItem extends Model
{
    // explictly defining table name
    protected $table = 'production_order_items';
    protected $primaryKey = null;
    public $timestamps = false;

    public function productionOrder(){
        return $this->belongsTo('App\ProductionOrder', 'production_order_id', 'production_order_id');
    }

    public function inventory(){
        return $this->belongsTo('App\Inventory', 'inventory_id', 'inventory_id');
    }
}
