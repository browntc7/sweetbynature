<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    // explictly defining table name
    protected $table = 'inventory';

    protected $primaryKey = 'inventory_id';

    public function purchaseOrderItems(){
        return $this->hasMany('App\PurchaseOrderItems', 'inventory_id', 'inventory_id');
    }

    public function productionOrderItems(){
        return $this->hasMany('App\ProductionOrderItems', 'production_order_id', 'production_order_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }
}
