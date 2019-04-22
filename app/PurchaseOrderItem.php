<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    // explictly defining table name
    protected $table = 'purchase_order_items';
    #protected $primaryKey = null; #removed having an issue with seeding db
    public $timestamps = false;

    public function purchaseOrder(){
        return $this->belongsTo('App\PurchaseOrder', 'purchase_order_id', 'purchase_order_id');
    }

    public function inventory(){
        return $this->belongsTo('App\Inventory', 'inventory_id', 'inventory_id');
    }


}
